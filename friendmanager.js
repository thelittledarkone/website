//Variables
    var data;

    //Get Events on page load
    getMessages();
    expandContent();
deleteAllUnresolvedBookings(); deleteAllCompletedBookings(); deleteAllSentBookings(); deleteAllBookingResponses(); deleteAllBookings();

//    Delete Message
function deleteMessage(){
    $('.deleteMessage').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/deletemessage.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {message_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $(".actionBtnContainer").html(returnedData);
                        $(".actionBtnContainer").fadeIn();
                    }else{
                        getMessages();
                    }
                },
                error: function(){
                    $(".actionBtnContainer").text("There was an issue with updating the message in the database.");
                    $(".actionBtnContainer").fadeIn();
                }
            });
        });
    }

//    'Delete All' Functions
function deleteAllBookings(){
    $('.deleteAllBookings').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/deleteallbookings.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {type:data},
                success: function(returnedData){
                    if(returnedData){
                        $(".actionBtnContainer").html(returnedData);
                        $(".actionBtnContainer").fadeIn();
                    }else{
                        getMessages();
                    }
                },
                error: function(){
                    $(".actionBtnContainer").text("There was an issue with updating the message in the database.");
                    $(".actionBtnContainer").fadeIn();
                }
            });
        });
    }

function deleteAllBookingResponses(){
    $('.deleteAllBookingResponses').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/deleteallbookingresponses.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {type:data},
                success: function(returnedData){
                    if(returnedData){
                        $(".actionBtnContainer").html(returnedData);
                        $(".actionBtnContainer").fadeIn();
                    }else{
                        getMessages();
                    }
                },
                error: function(){
                    $(".actionBtnContainer").text("There was an issue with updating the message in the database.");
                    $(".actionBtnContainer").fadeIn();
                }
            });
        });
    }

function deleteAllSentBookings(){
    $('.deleteAllBookingRequests').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/deleteallsentbookings.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {type:data},
                success: function(returnedData){
                    if(returnedData){
                        $(".actionBtnContainer").html(returnedData);
                        $(".actionBtnContainer").fadeIn();
                    }else{
                        getMessages();
                    }
                },
                error: function(){
                    $(".actionBtnContainer").text("There was an issue with updating the message in the database.");
                    $(".actionBtnContainer").fadeIn();
                }
            });
        });
    }

function deleteAllCompletedBookings(){
    $('.deleteAllCompletedBookings').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/deleteallcompletedbookings.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {type:data},
                success: function(returnedData){
                    if(returnedData){
                        $(".actionBtnContainer").html(returnedData);
                        $(".actionBtnContainer").fadeIn();
                    }else{
                        getMessages();
                    }
                },
                error: function(){
                    $(".actionBtnContainer").text("There was an issue with updating the message in the database.");
                    $(".actionBtnContainer").fadeIn();
                }
            });
        });
    }

function deleteAllUnresolvedBookings(){
    $('.deleteAllUnresolvedBookings').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/deleteallunresolvedbookings.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {type:data},
                success: function(returnedData){
                    if(returnedData){
                        $(".actionBtnContainer").html(returnedData);
                        $(".actionBtnContainer").fadeIn();
                    }else{
                        getMessages();
                    }
                },
                error: function(){
                    $(".actionBtnContainer").text("There was an issue with updating the message in the database.");
                    $(".actionBtnContainer").fadeIn();
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
                        getMessages();
                    }
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }


function getMessages(){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#allFriends").fadeOut();
        $("#myFriendRequests").fadeOut();
        $("#allFriendRequests").fadeOut();
        $("#unresolvedFR").fadeOut();
        $("#completeFR").fadeOut();
    
        $.ajax({
            url: "./php/getfriends.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#allFriends").html(returnedData);
                $("#allFriends").fadeIn();
                
                unfriend();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#allFriends").html("<div class='alert alert-danger'>There was an error with the getFR Ajax call. Please try again</div>");
                $("#allFriends").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getfriendrequests.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#allFriendRequests").html(returnedData);
                $("#allFriendRequests").fadeIn();
                
                deleteMessage();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#allBookings").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#allBookings").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getunresolvedfriend.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#unresolvedFR").html(returnedData);
                $("#unresolvedFR").fadeIn();
                
                deleteMessage();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#unresolvedFR").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#unresolvedFR").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getcompletedfriend.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#completeFR").html(returnedData);
                $("#completeFR").fadeIn();
                
                deleteMessage();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#completeFR").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#completeFR").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getsentfriend.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#myFriendRequests").html(returnedData);
                $("#myFriendRequests").fadeIn();
                
                deleteMessage();
                
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#myFriendRequests").html("<div class='alert alert-danger'>There was an error with the getFR Ajax call. Please try again</div>");
                $("#myFriendRequests").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getfriendresponses.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#myFriendResponses").html(returnedData);
                $("#myFriendResponses").fadeIn();
                
                deleteMessage();
                
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#myFriendResponses").html("<div class='alert alert-danger'>There was an error with the getFR Ajax call. Please try again</div>");
                $("#myFriendResponses").fadeIn();
            }
        });
        
    }


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
