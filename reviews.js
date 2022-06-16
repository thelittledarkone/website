//Variables
    var data; var radius;

//Get Messages on page load
getReviews(); expandContent(); clickRadius();

    function getReviews(){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#gameReviews").fadeOut();
        $.ajax({
            url: "./php/getreviews.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#gameReviews").html(returnedData);
                $("#gameReviews").fadeIn();
                                
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#gameReviews").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
                $("#gameReviews").fadeIn();
            }
        });
    }
        
//    Radius
function clickRadius(){
    $('#radiusBtn').click(function(){
        radius = $('#radius').val();
            $.ajax({
                url: "./php/getreviews.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {radius:radius},
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
