var invoker; var data; var edition;

expandContent(); expandMessage(); getGameDetails();
//getLinks();

function getGameDetails(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#profilePageDetails").fadeOut();
    $.ajax({
        url: "./php/getgamedetails.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#profilePageDetails").html(returnedData);
            $("#profilePageDetails").fadeIn();
            
            unlike(); like(); clickEdition(); getGameEvents(); getGameReviews();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#profilePageDetails").html("<div class='alert alert-danger'>There was an error with the getEvents Ajax call. Please try again</div>");
            $("#profilePageDetails").fadeIn();
        }
    });
}

function getGameEvents(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#myEvents").fadeOut();
    $.ajax({
        url: "./php/getgameevents.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#myEvents").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            
            $("#myEvents").fadeIn();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#myEvents").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $("#myEvents").fadeIn();
        }
    });
}

function getGameReviews(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $(".userReviews").fadeOut();
    $.ajax({
        url: "./php/getgamereviews.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $(".userReviews").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            
            $(".userReviews").fadeIn();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $(".userReviews").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $(".userReviews").fadeIn();
        }
    });
}


//    Unlike
function unlike(){
    $('.unlike').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/unlike.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {game_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#errorMessages").html(returnedData);
                        $("#errorMessages").fadeIn();
                    }else{
                        getGameDetails();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }

//    Like
function like(){
    $('.like').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/like.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {game_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#errorMessages").html(returnedData);
                        $("#errorMessages").fadeIn();
                    }else{
                        getGameDetails();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }

//    Edition
function clickEdition(){
    $('#editionBtn').click(function(){
        edition = $('#edition').val();
        window.location.href = 'editionpage.php?edition_id=' + edition;
        });
    }


$("#updateDetailsForm").submit(function(event){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#updateDetailsMessage").hide();

    //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
    //    collect user inputs
        data = $(this).serializeArray();
        
    //    send them to signup.php using ajax
        $.ajax({
            url: "./php/updategamedetails.php",
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
                //Reload Page
                getGameDetails();
            }
        },
    //        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#updateDetailsMessage").html("<div class='alert alert-danger'>There was an error with the addEvents Ajax call. Please try again</div>");
            $("#updateDetailsMessage").slideDown();
        }
    });
});

$("#addEditionForm").submit(function(event){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#addEditionMessage").hide();

    //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
    //    collect user inputs
        data = $(this).serializeArray();
        
    //    send them to signup.php using ajax
        $.ajax({
            url: "./php/addedition.php",
            type: "POST",
            data: data,
    //        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            if(returnedData){
                $("#addEditionMessage").html(returnedData);
                $("#addEditionMessage").slideDown();
            }else{
                //Hide Modal
                $("#addEditionModal").modal('hide');
                //Reset Form
                $("#addEditionForm")[0].reset();
                //Reload Page
                getGameDetails();
            }
        },
    //        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#addEditionMessage").html("<div class='alert alert-danger'>There was an error with the addEvents Ajax call. Please try again</div>");
            $("#addEditionMessage").slideDown();
        }
    });
});

$("#reviewForm").submit(function(event){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#addReviewMessage").hide();

    //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
    //    collect user inputs
        data = $(this).serializeArray();
        
    //    send them to signup.php using ajax
        $.ajax({
            url: "./php/reviewgame.php",
            type: "POST",
            data: data,
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                if(returnedData){
                    $("#addReviewMessage").html(returnedData);
                    $("#addReviewMessage").slideDown();
                }else{
                    //Hide Modal
                    $("#reviewModal").modal('hide');
                    //Reset Form
                    $("#reviewForm")[0].reset();
                    getGameDetails();
                }
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#addReviewMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
                $("#addReviewMessage").slideDown();
            }
        });
});

//Send Message Ajax call
$("#sendMessageModal").on('show.bs.modal', function(event){
    invoker = $(event.relatedTarget);
    
    $("#sendMessageForm").submit(function(event){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#sendMessageMessage").hide();

    //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
    //    collect user inputs
        data = $(this).serializeArray();
        data.push({name:'event_id', value:invoker.data('event_id')});
    //    send them to signup.php using ajax
        $.ajax({
            url: "./php/sendmessage.php",
            type: "POST",
            data: data,
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                if(returnedData){
                    $("#sendMessageMessage").html(returnedData);
                    $("#sendMessageMessage").slideDown();
                }else{
                    //Hide Modal
                    $("#sendMessageModal").modal('hide');
                    //Reset Form
                    $("#sendMessageForm")[0].reset();
                }
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#sendMessageMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
                $("#sendMessageMessage").slideDown();
            }
        });
    });
});

//Send Message Ajax call
$("#sendBookingRequestModal").on('show.bs.modal', function(event){
    invoker = $(event.relatedTarget);
    
    $("#sendBookingRequestForm").submit(function(event){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#sendBookingRequestMessage").hide();

    //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
    //    collect user inputs
        data = $(this).serializeArray();
        data.push({name:'event_id', value:invoker.data('event_id')});
    //    send them to signup.php using ajax
        $.ajax({
            url: "./php/sendbookingrequest.php",
            type: "POST",
            data: data,
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                if(returnedData){
                    $("#sendBookingRequestMessage").html(returnedData);
                    $("#sendBookingRequestMessage").slideDown();
                }else{
                    //Hide Modal
                    $("#sendBookingRequestModal").modal('hide');
                    //Reset Form
                    $("#sendBookingRequestForm")[0].reset();
                }
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#sendBookingRequestMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
                $("#sendBookingRequestMessage").slideDown();
            }
        });
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
        url: "./php/updategamepicture.php",
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
        const $expandableInnerHeight = $expandableArea.find('.innerContent').height();

        if (expanderButton.hasClass('expandable__btn--active')) {
            expanderButton.removeClass('expandable__btn--active');
            $expandableArea.attr('style', '');
        } else {
            expanderButton.addClass('expandable__btn--active');
            $expandableArea.css('max-height', $expandableInnerHeight);
        }
    }
}

//Overflow Handlers
function expandMessage(){
    $('#profileContainer').on('click', '.gameInfoExpander', function(){
        const $expandableArea = $(this).siblings('.gameInfoExpandable');
        const expanderButton = $(this).find('button');
        expand ($expandableArea, expanderButton);
    });
    $('#profileContainer').on('click', '.infoExpander', function(){
        const $expandableArea = $(this).siblings('.infoExpandable');
        const expanderButton = $(this).find('button');
        expand ($expandableArea, expanderButton);
    });
    $('#profileContainer').on('click', '.playerExpander', function(){
        const $expandableArea = $(this).siblings('.playerExpandable');
        const expanderButton = $(this).find('button');
        expand ($expandableArea, expanderButton);
    });
    
    
    function expand (x, y) {
        const $expandableInnerHeight = x.find('[data-js-expandable-inner]').height();

        if (y.hasClass('expandable__btn--active')) {
            y.removeClass('expandable__btn--active');
            x.attr('style', '');
        } else {
            y.addClass('expandable__btn--active');
            x.css('max-height', $expandableInnerHeight);
        }
    }
}




