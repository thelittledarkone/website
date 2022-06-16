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



function getMessages(){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#allBookings").fadeOut();
        $("#unresolvedB").fadeOut();
        $("#completeB").fadeOut();
        $("#myBookingRequests").fadeOut();
        $.ajax({
            url: "./php/getbookings.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#allBookings").html(returnedData);
                $("#allBookings").fadeIn();
                
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
            url: "./php/getunresolvedbookings.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#unresolvedB").html(returnedData);
                $("#unresolvedB").fadeIn();
                
                deleteMessage();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#unresolvedB").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#unresolvedB").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getcompletedbooking.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#completeB").html(returnedData);
                $("#completeB").fadeIn();
                
                deleteMessage();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#completeB").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#completeB").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getsentbooking.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#myBookingRequests").html(returnedData);
                $("#myBookingRequests").fadeIn();
                
                deleteMessage();
                
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#myBookingRequests").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#myBookingRequests").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getbookingresponses.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#myBookingResponses").html(returnedData);
                $("#myBookingResponses").fadeIn();
                
                deleteMessage();
                
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#myBookingResponses").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#myBookingResponses").fadeIn();
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
