//Variables
    var data; var seats;

    //Get Events on page load
    getPlayers();
//    expandContent();


//    Declare Winners
function declareWinner(){
    $('.declareWinner').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/declarewinner.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {player_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $(".actionBtnContainer").html(returnedData);
                        $(".actionBtnContainer").fadeIn();
                    }else{
                        getPlayers();
                    }
                },
                error: function(){
                    $(".actionBtnContainer").text("There was an issue with updating the message in the database.");
                    $(".actionBtnContainer").fadeIn();
                }
            });
        });
    }

//    Declare Winners
function declareWinner(){
    $('.declareWinner').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/declarewinner.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {player_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $(".actionBtnContainer").html(returnedData);
                        $(".actionBtnContainer").fadeIn();
                    }else{
                        getPlayers();
                    }
                },
                error: function(){
                    $(".actionBtnContainer").text("There was an issue with updating the message in the database.");
                    $(".actionBtnContainer").fadeIn();
                }
            });
        });
    }

function getPlayers(){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#messageContainer").fadeOut();
        seats = $("#tournieseats").attr('value');
        
    if(seats == 8){
       $.ajax({
            url: "./php/gettournplayers.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#messageContainer").html(returnedData);
                $("#messageContainer").fadeIn();
                
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#messageContainer").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#messageContainer").fadeIn();
            }
        });
    }else if(seats == 16){
       $.ajax({
            url: "./php/gettournplayers16.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#messageContainer").html(returnedData);
                $("#messageContainer").fadeIn();
                
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#messageContainer").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#messageContainer").fadeIn();
            }
        });
    }else if(seats == 32){
       $.ajax({
            url: "./php/gettournplayers32.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#messageContainer").html(returnedData);
                $("#messageContainer").fadeIn();
                
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#messageContainer").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#messageContainer").fadeIn();
            }
        });
    }else if(seats == 64){
       $.ajax({
            url: "./php/gettournplayers64.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#messageContainer").html(returnedData);
                $("#messageContainer").fadeIn();
                
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#messageContainer").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#messageContainer").fadeIn();
            }
        });
    } 
}


//function expandContent(){
//    $('#messageContainer').on('click', '[data-js-expander]', expand);
//    function expand () {
//        const $self = $(this);
//        const expanderButton = $self.find('button');
//        const $expandableArea = $self.siblings('[data-js-expandable]');
//        const $expandableInnerHeight = $expandableArea.find('[data-js-expandable-inner]').height();
//
//        if (expanderButton.hasClass('expandable__btn--active')) {
//            expanderButton.removeClass('expandable__btn--active');
//            $expandableArea.attr('style', '');
//        } else {
//            expanderButton.addClass('expandable__btn--active');
//            $expandableArea.css('max-height', $expandableInnerHeight);
//        }
//    }
//}
