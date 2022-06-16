var invoker; var data;

expandContent(); getDetails(); getEvents(); getEventsAttending(); getRegEventsAttending(); getOpenEventsAttending(); getRegOpenEventsAttending(); getRegEvents();
//getLinks();

function getDetails(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#profilePageDetails").fadeOut();
    $.ajax({
        url: "./php/getdetails.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#profilePageDetails").html(returnedData);
            $("#profilePageDetails").fadeIn();
            
            unfriend(); follow(); unfollow(); upvotePlayer(); downvotePlayer(); upvoteHost(); downvoteHost();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#profilePageDetails").html("<div class='alert alert-danger'>There was an error with the getEvents Ajax call. Please try again</div>");
            $("#profilePageDetails").fadeIn();
        }
    });
}

function getEvents(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#myEvents").fadeOut();
    $.ajax({
        url: "./php/getprofileevents.php",
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

function getRegEvents(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#myRegEvents").fadeOut();
    $.ajax({
        url: "./php/getprofilereghostevents.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#myRegEvents").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            
            $("#myRegEvents").fadeIn();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#myRegEvents").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $("#myRegEvents").fadeIn();
        }
    });
}

function getEventsAttending(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#myAttendEvents").fadeOut();
    $.ajax({
        url: "./php/getprofileeventsattending.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#myAttendEvents").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            
            $("#myAttendEvents").fadeIn();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#myAttendEvents").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $("#myAttendEvents").fadeIn();
        }
    });
}

function getRegEventsAttending(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#myRegAttendEvents").fadeOut();
    $.ajax({
        url: "./php/getprofileregevents.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#myRegAttendEvents").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            
            $("#myRegAttendEvents").fadeIn();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#myRegAttendEvents").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $("#myRegAttendEvents").fadeIn();
        }
    });
}

function getOpenEventsAttending(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#myOpenAttendEvents").fadeOut();
    $.ajax({
        url: "./php/getprofileopeneventsattending.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#myOpenAttendEvents").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            
            $("#myOpenAttendEvents").fadeIn();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#myOpenAttendEvents").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $("#myOpenAttendEvents").fadeIn();
        }
    });
}

function getRegOpenEventsAttending(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#myRegOpenAttendEvents").fadeOut();
    $.ajax({
        url: "./php/getprofileregopenevents.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#myRegOpenAttendEvents").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            
            $("#myRegOpenAttendEvents").fadeIn();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#myRegOpenAttendEvents").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $("#myRegOpenAttendEvents").fadeIn();
        }
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
                        getDetails();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }

//    Follow
function follow(){
    $('.follow').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/follow.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {friend_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#errorMessages").html(returnedData);
                        $("#errorMessages").fadeIn();
                    }else{
                        getDetails();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }

//    Unfollow
function unfollow(){
    $('.unfollow').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/unfollow.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {friend_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#errorMessages").html(returnedData);
                        $("#errorMessages").fadeIn();
                    }else{
                        getDetails();
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
                        getDetails();
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
                        getDetails();
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
                        getDetails();
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
                        getDetails();
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
                    getDetails();
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
                    getDetails(); getEvents(); getEventsAttending(); getRegEventsAttending(); getOpenEventsAttending(); getRegOpenEventsAttending();
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





