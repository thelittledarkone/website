//Variables
var data; var radius; var addressLatitude; var myEvent; var eventAddress; var invoker;

//tester();

//Get Events on page load
getEventsNearMe(); clickRadius(); expandMessage(); expandContent();

function getEventsNearMe(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#myNearbyEvents").fadeOut();
    $.ajax({
        url: "./php/geteventsnear.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#myNearbyEvents").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            $("#myNearbyEvents").fadeIn();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#myNearbyEvents").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $("#myNearbyEvents").fadeIn();
        }
    });
}

//    Radius
function clickRadius(){
    $('#radiusBtn').click(function(){
        radius = $('#radius').val();
            $.ajax({
                url: "./php/geteventsnear.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {radius:radius},
                success: function(returnedData){
                    $("#myNearbyEvents").html(returnedData);
        //            $("#eventsNearMeResults").fadeIn();
                    $("#myNearbyEvents").fadeIn();
                },
        //        Ajax Call fails: show ajax call error
                error: function(){
                    $("#myNearbyEvents").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                    $("#myNearbyEvents").fadeIn();
                }
            });
        });
    }

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

//Overflow Handlers
function expandMessage(){
    $('#myContainer').on('click', '.gameInfoExpander', function(){
        const $expandableArea = $(this).siblings('.gameInfoExpandable');
        const expanderButton = $(this).find('button');
        expand ($expandableArea, expanderButton);
    });
    $('#myContainer').on('click', '.infoExpander', function(){
        const $expandableArea = $(this).siblings('.infoExpandable');
        const expanderButton = $(this).find('button');
        expand ($expandableArea, expanderButton);
    });
    $('#myContainer').on('click', '.playerExpander', function(){
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
function expandContent(){
    $('#myContainer').on('click', '[data-js-expander]', expand);
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

//function tester(){
////    Show Spinner
//    $("#spinner").show();
////    Hide Results
//    $("#tester").fadeOut();
//    $.ajax({
//        url: "./php/eventcalendar.php",
////        Ajax call successful: show error or success message
//        success: function(returnedData){
//            $("#spinner").hide();
//            $("#tester").html(returnedData);
//            $("#tester").fadeIn();
//        },
////        Ajax Call fails: show ajax call error
//        error: function(){
//            $("#spinner").hide();
//            $("#tester").html("<div class='alert alert-danger'>There was an error with the getEvents Ajax call. Please try again</div>");
//            $("#tester").fadeIn();
//        }
//    });
//}
