//Variables
var data; var addressLongitude; var addressLatitude; var addressText;

prep_modal();

//Create HERE map platform
var platform = new H.service.Platform({ 'apikey' : 'KIkmXroOdWQiWJRqhKLtIJJyp_zDfxDwW2vgUfFnlBI' });
//Create Geocoder
var geocoder = platform.getGeocodingService();

//Ajax Call for sign up form
//Once form is submitted
$("#signupForm").submit(function(event){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#signupMessage").hide();
//    prevent default php processing
    event.preventDefault();
//    collect user inputs
    data = $(this).serializeArray();
    //get the address text
    addressArray = [data[6], data[7], data[8], data[9], data[10]];
    searchtext = Array.prototype.map.call(addressArray, function(item) { return item.value; }).join(", ");
    getAddressCoordinates();
});

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
            submitSignupRequest();
            
        }, alert
    );
}

function submitSignupRequest(){
    $.ajax({
        url: "../php/signup.php",
        type: "POST",
        data: data,
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            if(returnedData == "success"){
                window.location.replace("https://thelittledarkone.com/thankyou.php");
            }else if(returnedData){
                $("#signupMessage").html(returnedData);
                $("#signupMessage").slideDown();
            }else{
                window.location.replace("https://thelittledarkone.com/thankyou.php");
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#signupMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
            $("#signupMessage").slideDown();
        }
    });
}

function prep_modal()
{
  $(".modalMultiUser").each(function() {

  var element = this;
	var pages = $(this).find('.modal-split');

  if (pages.length != 0)
  {
    	pages.hide();
    	pages.eq(0).show();

    	var b_button = document.createElement("button");
                b_button.setAttribute("type","button");
          			b_button.setAttribute("class","btn btn-primary");
          			b_button.setAttribute("style","display: none;");
          			b_button.innerHTML = "Back";

    	var n_button = document.createElement("button");
                n_button.setAttribute("type","button");
          			n_button.setAttribute("class","btn btn-primary");
          			n_button.innerHTML = "Next";
      
      var s_button = document.createElement("button");
                s_button.setAttribute("type","submit");
          			s_button.setAttribute("class","btn btn-primary btnColor");
                    s_button.setAttribute("style","display: none;");
          			s_button.innerHTML = "Sign Up";

    	$(this).find('.modal-footer').append(b_button).append(n_button).append(s_button);
      
    	var page_track = 0;

    	$(n_button).click(function() {
        
            this.blur();

            if(page_track == 0)
            {
                $(b_button).show();
            }
            if(page_track == pages.length-2)
            {
                $(n_button).hide();
                $(s_button).show();
            }
//            if(page_track == pages.length-1)
//            {
//              $(element).find("form").submit();
//            }
            if(page_track < pages.length-1)
            {
                page_track++;

                pages.hide();
                pages.eq(page_track).show();
            }
    	});

    	$(b_button).click(function() {

    		if(page_track == 1)
    		{
    			$(b_button).hide();
                $(s_button).hide();
    		}

    		if(page_track == pages.length-1)
    		{
    			$(s_button).hide();
                $(n_button).show();
    		}

    		if(page_track > 0)
    		{
    			page_track--;

    			pages.hide();
    			pages.eq(page_track).show();
    		}
    	});
  }
  });
}

//Ajax call for login form
//Once form is submitted
$("#loginForm").submit(function(event){
//    prevent default php processing
    event.preventDefault();
//    collect user inputs
    var datatopost = $(this).serializeArray();
//    send them to login.php using ajax
    $.ajax({
        url: "../php/login.php",
        type: "POST",
        data: datatopost,
//        Ajax call successful
        success: function(data){
//            if php files returns a success: redirect user to notes page
            if(data == "success"){
                window.location.reload();
//            otherwise show error message
            }else{
                $('#loginMessage').html(data);
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#loginMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
        }
    });
});

//Ajax call for forgot password form
//Once form is submitted
$("#passwordForm").submit(function(event){
//    prevent default php processing
    event.preventDefault();
//    collect user inputs
    var datatopost = $(this).serializeArray();
//    send them to forgotpassword.php using ajax
    $.ajax({
        url: "../php/forgotpassword.php",
        type: "POST",
        data: datatopost,
//        Ajax call successful
        success: function(data){
            $('#passwordMessage').html(data);
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#passwordMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
        }
    });
});
