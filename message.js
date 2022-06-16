//Variables
    var data; var invoker; var message_id; var event_id; var user_id; var seats_remaining;

    //Get Events on page load
    getMessageDetails();
    expandMessage();
    expandContent();

    //    Reply to Message
function replyToMessage(){
    $('.replyToMessage').click(function(){
        message_id = $(this).attr('id');
        submitReply(message_id);
        });
    }

function submitReply(message_id){
    $(".responseForm").submit(function(event){
        //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $(".responseErrorMessage").hide();
        
        event.stopImmediatePropagation();
        event.preventDefault();
        
        data = $(this).serializeArray();
        data.push({name:'message_id', value:message_id});

                $.ajax({
                    url: "./php/sendresponse.php",
                    type: "POST",
                    //we need to send the current note w/ its id to the php file
                     data: data,
        //        Ajax call successful: show error or success message
                    success: function(returnedData){
                        $("#spinner").hide();
                        if(returnedData){
                            $(".responseErrorMessage").html(returnedData);
                            $(".responseErrorMessage").slideDown();
                        }else{
                            //Reset Form
                            $(".responseForm")[0].reset();
                            getMessageDetails();
                        }
                    },
                    //        Ajax Call fails: show ajax call error
                    error: function(){
                        $("#spinner").hide();
                        $(".responseErrorMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
                        $(".responseErrorMessage").slideDown();
                    }
                });
    });
}

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
                        $(".messageActionBtnContainer").html(returnedData);
                        $(".messageActionBtnContainer").fadeIn();
                    }else{
                        var url = "messages.php";
                        $(location).attr('href', url);
                    }
                },
                error: function(){
                    $(".messageActionBtnContainer").text("There was an issue with updating the message in the database.");
                    $(".messageActionBtnContainer").fadeIn();
                }
            });
        });
    }

//    Save Message
function saveMessage(){
    $('.saveMessage').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/savemessage.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {message_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $(".messageActionBtnContainer").html(returnedData);
                        $(".messageActionBtnContainer").fadeIn();
                    }else{
                        getMessageDetails();
                    }
                },
                error: function(){
                    $(".messageActionBtnContainer").text("There was an issue with updating the message in the database.");
                    $(".messageActionBtnContainer").fadeIn();
                }
            });
        });
    }


//    Accept Booking
function acceptBooking(){
    $('.acceptBtn').click(function(event){
        event.stopImmediatePropagation();
        event.preventDefault();
        
        event_id = $(this).data('event_id');
        user_id = $(this).data('user_id');
        message_id = $(this).data('message_id');
        
            $.ajax({
                url: "./php/acceptbooking.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {user_id:user_id, event_id:event_id, message_id:message_id},
                success: function(returnedData){
                    if(returnedData){
                        $(".acceptBookingErrorMessage").html(returnedData);
                        $(".acceptBookingErrorMessage").fadeIn();
                    }else{
                        getMessageDetails();
                    }
                },
                error: function(){
                    $(".acceptBookingErrorMessage").text("There was an issue with updating the booking status in the database.");
                    $(".acceptBookingErrorMessage").fadeIn();
                }
            });
        });
    }

//    Decline Booking
function declineBooking(){
    $('.declineBtn').click(function(event){
        event.stopImmediatePropagation();
        event.preventDefault();
        
        event_id = $(this).data('event_id');
        console.log(event_id);
        user_id = $(this).data('user_id');
        console.log(user_id);
        message_id = $(this).data('message_id');
        console.log(message_id);
            $.ajax({
                url: "./php/declinebooking.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {user_id:user_id, event_id:event_id, message_id:message_id},
                success: function(returnedData){
                    if(returnedData){
                        $(".acceptBookingErrorMessage").html(returnedData);
                        $(".acceptBookingErrorMessage").fadeIn();
                    }else{
                        getMessageDetails();
                    }
                },
                error: function(){
                    $(".acceptBookingErrorMessage").text("There was an issue with updating the booking status in the database.");
                    $(".acceptBookingErrorMessage").fadeIn();
                }
            });
        });
    }

//    Accept Booking
function acceptFriend(){
    $('.acceptFBtn').click(function(event){
        event.stopImmediatePropagation();
        event.preventDefault();
        
        event_id = $(this).data('event_id');
        user_id = $(this).data('user_id');
        message_id = $(this).data('message_id');
        
            $.ajax({
                url: "./php/acceptfriend.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {user_id:user_id, event_id:event_id, message_id:message_id},
                success: function(returnedData){
                    if(returnedData){
                        $(".acceptFriendErrorMessage").html(returnedData);
                        $(".acceptFriendErrorMessage").fadeIn();
                    }else{
                        getMessageDetails();
                    }
                },
                error: function(){
                    $(".acceptFriendErrorMessage").text("There was an issue with updating the booking status in the database.");
                    $(".acceptFriendErrorMessage").fadeIn();
                }
            });
        });
    }

//    Decline Booking
function declineFriend(){
    $('.declineFBtn').click(function(event){
        event.stopImmediatePropagation();
        event.preventDefault();
        
        event_id = $(this).data('event_id');
        console.log(event_id);
        user_id = $(this).data('user_id');
        console.log(user_id);
        message_id = $(this).data('message_id');
        console.log(message_id);
            $.ajax({
                url: "./php/declinefriend.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {user_id:user_id, event_id:event_id, message_id:message_id},
                success: function(returnedData){
                    if(returnedData){
                        $(".acceptFriendErrorMessage").html(returnedData);
                        $(".acceptFriendErrorMessage").fadeIn();
                    }else{
                        getMessageDetails();
                    }
                },
                error: function(){
                    $(".acceptFriendErrorMessage").text("There was an issue with updating the booking status in the database.");
                    $(".acceptFriendErrorMessage").fadeIn();
                }
            });
        });
    }


function getMessageDetails(){
        //    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#singleMessageDetails").fadeOut();
    $.ajax({
        url: "./php/getmessagedetails.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#singleMessageDetails").html(returnedData);
            $("#singleMessageDetails").fadeIn();
            
            acceptBooking(); declineBooking(); acceptFriend(); declineFriend(); replyToMessage(); deleteMessage(); saveMessage();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#singleMessageDetails").html("<div class='alert alert-danger'>There was an error with the getMessageDetails Ajax call. Please try again</div>");
            $("#singleMessageDetails").fadeIn();
        }
    });
}
    

//Overflow Handlers

function expandMessage(){
    $('#messageContainer').on('click', '.commentsExpander', function(){
        const $expandableArea = $(this).siblings('.commentsExpandable');
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
function expandContent(){
    $('#messageContainer').on('click', '[data-js-expander]', expand);
    function expand () {
        const $self = $(this);
        const expanderButton = $self.find('button');
        const $expandableArea = $self.siblings('[data-js-expandable]');
        const $expandableParentArea = $self.parents('[data-js-expandable]');
        const $expandableInnerHeight = $expandableArea.find('[data-js-expandable-inner]').height();

        if (expanderButton.hasClass('expandable__btn--active')) {
            expanderButton.removeClass('expandable__btn--active');
            $expandableArea.attr('style', '');
        } else {
            expanderButton.addClass('expandable__btn--active');
            $expandableArea.css('max-height', $expandableInnerHeight);
            $expandableParentArea.css('max-height', 'none');
        }
    }
}






















