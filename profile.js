expandContent(); $('.addressInput').hide();

//Create HERE map platform
var platform = new H.service.Platform({ 'apikey' : 'KIkmXroOdWQiWJRqhKLtIJJyp_zDfxDwW2vgUfFnlBI' });
//Create Geocoder
var geocoder = platform.getGeocodingService();

var myRadio = $('input[name="editaddress"]');

myRadio.click(function(){
    if($(this).is(':checked')){
       if($(this).val() == "Y"){
           $('.addressInput').show();
       }else{
           $('.addressInput').hide();
       }
    }
});

$("#updateDetailsForm").submit(function(event){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#updateDetailsMessage").hide();
    event.stopImmediatePropagation();
    event.preventDefault();
    data = $(this).serializeArray();
//    console.log(data);
    var editAddressObject = data[0];
    var editAddress = String(editAddressObject['value']);
    if(editAddress != 'N'){
        //get the address text
        addressArray = [data[1], data[2], data[3], data[4], data[5]];
        searchtext = Array.prototype.map.call(addressArray, function(item) { return item.value; }).join(", ");
        getAddressCoordinates();
    }else{
        submitEditDetailsRequest();
    }
});


//Functions
function getAddressCoordinates(){
    geocoder.geocode(
        {
        searchtext
        },
        function(result){
            addressLongitude = result.Response.View[0].Result[0].Location.DisplayPosition.Longitude;
            addressLatitude = result.Response.View[0].Result[0].Location.DisplayPosition.Latitude;
            data.push({name:'addressLongitude', value:addressLongitude});
            data.push({name:'addressLatitude', value:addressLatitude});
            submitEditDetailsRequest();
            
        }, alert
    );
}

function submitEditDetailsRequest(){
    $.ajax({
        url: "./php/updatedetails.php",
        type: "POST",
        data: data,
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            if(returnedData){
                $("#updateDetailsMessage").html(returnedData);
                $("#updateDetailsMessage").slideDown();
            }else{
                //Hide Modal
                $("#updateDetailsModal").modal('hide');
                //Reset Form
                $("#updateDetailsForm")[0].reset();
                //Hide Regular and One off elements
                $('.addressInput').hide();
                //Reload Page
                location.reload();
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#updateDetailsMessage").html("<div class='alert alert-danger'>There was an error with the addEvents Ajax call. Please try again</div>");
            $("#updateDetailsMessage").slideDown();
        }
    });
}

//Privacy Settings
$("#updatePrivacyForm").submit(function(event){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#updatePrivacyMessage").hide();
//    prevent default php processing
    event.preventDefault();
//    collect user inputs
    var datatopost = $(this).serializeArray();
//    send them to signup.php using ajax
    $.ajax({
        url: "./php/updateprivacy.php",
        type: "POST",
        data: datatopost,
//        Ajax call successful: show error or success message
        success: function(data){
            $("#spinner").hide();
            if(data){
                $("#updatePrivacyMessage").html(data);
                $("#updatePrivacyMessage").slideDown();
            }else{
                location.reload();
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#updatePrivacyMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
            $("#updatePrivacyMessage").slideDown();
        }
    });
});

// Ajax call to update password
//Once form is submitted
$("#updatePasswordForm").submit(function(event){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#updatePasswordMessage").hide();
//    prevent default php processing
    event.preventDefault();
//    collect user inputs
    var datatopost = $(this).serializeArray();
//    send them to signup.php using ajax
    $.ajax({
        url: "./php/updatepassword.php",
        type: "POST",
        data: datatopost,
//        Ajax call successful: show error or success message
        success: function(data){
            $("#spinner").hide();
            if(data){
                $("#updatePasswordMessage").html(data);
                $("#updatePasswordMessage").slideDown();
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#updatePasswordMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
            $("#updatePasswordMessage").slideDown();
        }
    });
});

//Update Picture Preview
var file; var imageType; var imageSize; var wrongType;
$("#picture").change(function(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#updatePictureMessage").hide();
    
    file = this.files[0];
    imageType = file.type;
    imageSize = file.size;
    
//    Check Type
    var acceptableTypes = ["image/jpeg", "image/png", "image/jpg", "image/gif"];
    wrongType = ($.inArray(imageType, acceptableTypes) == -1);
    if(wrongType){
        $("#spinner").hide();
        $("#updatePictureMessage").html("<div class='alert alert-danger'>Only jpeg, png or jpg images are accepted!</div>");
        $("#updatePictureMessage").slideDown();
        return false;
    }
    
//    Check Size
    if(imageSize>3*1024*1024){
        $("#spinner").hide();
        $("#updatePictureMessage").html("<div class='alert alert-danger'>Please upload an image of less than 3mb</div>");
        $("#updatePictureMessage").slideDown();
        return false;
    }
    
//    The FileReader object will be used to convert our image to a binary string
    var reader = new FileReader();
//    callback
    reader.onload = updatePreview;
//    Start Read -> convert contents into data URL
    reader.readAsDataURL(file);
});

function updatePreview(event){
    $("#profilePic").attr("src", event.target.result);
}

//Update the Picture
$("#updatePictureForm").submit(function(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#updatePictureMessage").hide();
    
    event.stopImmediatePropagation();
    event.preventDefault();
    //File Missing
    if(!file){
        $("#spinner").hide();
        $("#updatePictureMessage").html("<div class='alert alert-danger'>Please upload an image!</div>");
        $("#updatePictureMessage").slideDown();
        return false;
    }
    //Wrong Type
    if(wrongType){
        $("#spinner").hide();
        $("#updatePictureMessage").html("<div class='alert alert-danger'>Only jpeg, png or jpg images are accepted!</div>");
        $("#updatePictureMessage").slideDown();
        return false;
    }
    //File Too Big
    if(imageSize>3*1024*1024){
        $("#spinner").hide();
        $("#updatePictureMessage").html("<div class='alert alert-danger'>Please upload an image of less than 3mb</div>");
        $("#updatePictureMessage").slideDown();
        return false;
    }
    
    $.ajax({
        url: "./php/updatepicture.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
//        Ajax call successful: show error or success message
        success: function(data){
            $("#spinner").hide();
            if(data){
                $("#updatePictureMessage").html(data);
                $("#updatePictureMessage").slideDown();
            }else{
                location.reload();
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#updatePictureMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
            $("#updatePictureMessage").slideDown();
        }
    });
    
});

function expandContent(){
    $('#profileContainer').on('click', '[data-js-expander]', expand);
    function expand () {
        const $self = $(this);
        const expanderButton = $self.find('button');
        const $expandableArea = $self.siblings('[data-js-expandable]');
        const $expandableInnerHeight = $expandableArea.find('[data-js-expandable-inner]').height();

        if (expanderButton.hasClass('expandable__btn--active')) {
            expanderButton.removeClass('expandable__btn--active');
            $expandableArea.attr('style', '');
        } else {
            expanderButton.addClass('expandable__btn--active');
            $expandableArea.css('max-height', $expandableInnerHeight);
        }
    }
}





