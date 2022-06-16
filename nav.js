var data;
expandProfileBarContent(); clickSearch(); 

//search input return function
var input = document.getElementById("search");
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("searchBtn").click();
  }
});

//Search Functions
$(function() {
    $("#search").autocomplete({
        source: "./php/autocompletesearch.php",
        minLength: 3,
        select: function( event, ui ) {
            event.preventDefault();
            $("#search").val(ui.item.value);
        }
    });
});

function clickSearch(){
    $('#searchBtn').click(function(){
        data = $('#search').val();
        window.location.href = 'searchpage.php?data=' + data;
        });
    
    }

//Profile Bar Expander
function expandProfileBarContent(){
    $('body').on('click', '[data-js-nav-expander]', expand);
    function expand () {
        const $self = $(this);
        const expanderButton = $self.find('img');
        const collapsedButton = $('.mycalenderbutton').find('button');
        const collapsedCalButton = $('.eventcalenderbutton').find('button');
        const $expandableArea = $('.profileExpandable');
        const $collapsibleArea = $('.calenderExpandable');
        const $collapsibleCalArea = $('.eventCalenderExpandable');
        const $expandableInnerWidth = '300px';
        const $expandableInnerHeight = $expandableArea.find('[data-js-expandable-inner]').height();

        if (expanderButton.hasClass('expandable__btn--active')) {
            expanderButton.removeClass('expandable__btn--active');
            $expandableArea.attr('style', '');
        } else {
            expanderButton.addClass('expandable__btn--active');
            $expandableArea.css('max-width', $expandableInnerWidth);
            $expandableArea.css('max-height', $expandableInnerHeight);
            
            collapsedButton.removeClass('expandable__btn--active');
            $collapsibleArea.attr('style', '');
            
            collapsedCalButton.show();
            $collapsibleCalArea.attr('style', '');
        }
    }
}








