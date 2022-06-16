//Variables
    var data;

//Get Messages on page load
getMessages(); expandContent();
deleteAll(); deleteAllQuestions(); deleteAllSent();

//    'Delete All' Functions
function deleteAll(){
    $('.deleteAll').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/deleteallmessages.php",
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

function deleteAllQuestions(){
    $('.deleteAllQuestions').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/deleteallquestions.php",
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

function deleteAllSent(){
    $('.deleteAllSent').click(function(){
            $.ajax({
                url: "./php/deleteallsent.php",
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

//    Save Message
function markRead(){
    $('.markRead').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/markread.php",
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

    function getMessages(){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#allMessages").fadeOut();
        $("#allQuestions").fadeOut();
        $("#otherMessages").fadeOut();
        $("#sentMessages").fadeOut();
        $.ajax({
            url: "./php/getmessages.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#allMessages").html(returnedData);
                $("#allMessages").fadeIn();
                                
                markRead();
                saveMessage();
                deleteMessage();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#allMessages").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#allMessages").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getquestions.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#allQuestions").html(returnedData);
                $("#allQuestions").fadeIn();
                
                markRead();
                saveMessage();
                deleteMessage();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#allQuestions").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#allQuestions").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getfeedback.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#allFeedback").html(returnedData);
                $("#allFeedback").fadeIn();
                
                markRead();
                saveMessage();
                deleteMessage();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#allFeedback").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#allFeedback").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getsaved.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#savedMessages").html(returnedData);
                $("#savedMessages").fadeIn();
                
                deleteMessage();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#savedMessages").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#savedMessages").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getread.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#readMessages").html(returnedData);
                $("#readMessages").fadeIn();
                
                saveMessage();
                deleteMessage();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#readMessages").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#readMessages").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getothermessages.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#otherMessages").html(returnedData);
                $("#otherMessages").fadeIn();
                
                markRead();
                saveMessage();
                deleteMessage();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#otherMessages").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#otherMessages").fadeIn();
            }
        });
        $.ajax({
            url: "./php/getsentmessages.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#sentMessages").html(returnedData);
                $("#sentMessages").fadeIn();
                
                saveMessage();
                deleteMessage();
                
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#sentMessages").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#sentMessages").fadeIn();
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






















