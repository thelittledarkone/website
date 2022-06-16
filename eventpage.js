var invoker; var data;

expandContent(); getEventDetails(); 
//getLinks();

function getEventDetails(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#eventPageDetails").fadeOut();
    $.ajax({
        url: "./php/geteventdetails.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#eventPageDetails").html(returnedData);
            $("#eventPageDetails").fadeIn();
            
            deleteEvent(); unfriend(); upvotePlayer(); downvotePlayer(); upvoteHost(); downvoteHost(); createEventForum(); removePlayer();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#eventPageDetails").html("<div class='alert alert-danger'>There was an error with the getEvents Ajax call. Please try again</div>");
            $("#eventPageDetails").fadeIn();
        }
    });
}

function deleteEvent(){
    $('.deleteEvent').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/deleteevent.php",
                method: "POST",
                data: {event_id:data},
    //        Ajax call successful: show error or success message
                success: function(returnedData){
                    $("#spinner").hide();
                    if(returnedData){
                        $("#eventMessage").html(returnedData);
                        $("#eventMessage").slideDown();
                    }else{
                        $("#eventMessage").modal('hide');
                        window.location.replace("https://thelittledarkone.com/detectadventure.php");

                    }
                },
    //        Ajax Call fails: show ajax call error
                error: function(){
                    $("#spinner").hide();
                    $("#eventMessage").html("<div class='alert alert-danger'>There was an error with the editTrips Ajax call. Please try again</div>");
                    $("#eventMessage").slideDown();
                }
            });
        });
     }

//    Unfriend
function unfriend(){
    $('.unfriend').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/unfriend.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {friend_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#errorMessages").html(returnedData);
                        $("#errorMessages").fadeIn();
                    }else{
                        getEventDetails();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }

//    Upvote Player
function upvotePlayer(){
    $('.playerUpvote').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/upvoteplayer.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {friend_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#errorMessages").html(returnedData);
                        $("#errorMessages").fadeIn();
                    }else{
                        getEventDetails();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }

//    Downvote Player
function downvotePlayer(){
    $('.playerDownvote').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/downvoteplayer.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {friend_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#errorMessages").html(returnedData);
                        $("#errorMessages").fadeIn();
                    }else{
                        getEventDetails();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }

//    Upvote Host
function upvoteHost(){
    $('.hostUpvote').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/upvotehost.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {friend_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#errorMessages").html(returnedData);
                        $("#errorMessages").fadeIn();
                    }else{
                        getEventDetails();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }

//    Downvote Host
function downvoteHost(){
    $('.hostDownvote').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/downvotehost.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {friend_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#errorMessages").html(returnedData);
                        $("#errorMessages").fadeIn();
                    }else{
                        getEventDetails();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }

//   Create Event Forum
function createEventForum(){
    $('.createForum').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/createeventforum.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {event_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#errorMessages").html(returnedData);
                        $("#errorMessages").fadeIn();
                    }else{
                        getEventDetails();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }

//    Radius
function removePlayer(){
    $('#radiusBtn').click(function(){
        data = $('#remove').val();
            $.ajax({
                url: "./php/removeplayer.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {player_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#errorMessages").html(returnedData);
                        $("#errorMessages").fadeIn();
                    }else{
                        getEventDetails();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }

//Send Friend Request Ajax call
$("#sendFriendRequestModal").on('show.bs.modal', function(event){
    invoker = $(event.relatedTarget);
    $("#sendFriendRequestForm").submit(function(event){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#sendFriendRequestMessage").hide();

    //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
    //    collect user inputs
        data = $(this).serializeArray();
        data.push({name:'friend_id', value:invoker.data('user_id')});
    //    send them to signup.php using ajax
        $.ajax({
            url: "./php/sendfriendrequest.php",
            type: "POST",
            data: data,
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                if(returnedData){
                    $("#sendFriendRequestMessage").html(returnedData);
                    $("#sendFriendRequestMessage").slideDown();
                }else{
                    //Hide Modal
                    $("#sendFriendRequestModal").modal('hide');
                    //Reset Form
                    $("#sendFriendRequestForm")[0].reset();
                }
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#sendFriendRequestMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
                $("#sendFriendRequestMessage").slideDown();
            }
        });
    });
});

//Create Party Ajax call
$("#createPartyModal").on('show.bs.modal', function(event){
    invoker = $(event.relatedTarget);
    $("#createPartyForm").submit(function(event){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#createPartyMessage").hide();

    //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
    //    collect user inputs
        data = $(this).serializeArray();
        data.push({name:'event_id', value:invoker.data('event_id')});
    //    send them to signup.php using ajax
        $.ajax({
            url: "./php/createparty.php",
            type: "POST",
            data: data,
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                if(returnedData){
                    $("#createPartyMessage").html(returnedData);
                    $("#createPartyMessage").slideDown();
                }else{
                    //Hide Modal
                    $("#createPartyModal").modal('hide');
                    //Reset Form
                    $("#createPartyForm")[0].reset();
                    getEventDetails();
                }
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#createPartyMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
                $("#createPartyMessage").slideDown();
            }
        });
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


function expandContent(){
    $('#messageContainer').on('click', '[data-js-expander]', expand);
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





