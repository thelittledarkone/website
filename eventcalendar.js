var radius;

getEventCalendar(); expandEventCalenderContent(); collapseCalenderContent(); clickEventRadius();

//Sticky Functions
document.addEventListener("DOMContentLoaded", function(){
      window.addEventListener('scroll', function() {
          if (window.scrollY > 100) {
                document.getElementById('eventcalenderid').classList.add('calendersticky');
             
            
          } else {
              document.getElementById('eventcalenderid').classList.remove('calendersticky');
          } 
      });
    }); 


//Calendar Expander
function expandEventCalenderContent(){
    $('body').on('click', '.eventcalenderbutton', expand);
    function expand () {
        const $self = $(this);
        const expanderButton = $self.find('button');
        const closeButton = $('.eventclosecalenderbutton').find('button');
        const collapsedButton = $('[data-js-nav-expander]').find('button');
        const collapsedCalButton = $('.mycalenderbutton').find('button');
        const $expandableArea = $('.eventCalenderExpandable');
        const $collapsibleArea = $('.profileExpandable');
        const $collapsibleCalArea = $('.calenderExpandable');
        const $expandableInnerWidth = '100%';
        const $expandableInnerHeight = '750px';

        $expandableArea.css('max-width', $expandableInnerWidth);
        $expandableArea.css('max-height', $expandableInnerHeight);
        
        expanderButton.hide();
            
        collapsedButton.removeClass('expandable__btn--active');
        $collapsibleArea.attr('style', '');
            
        collapsedCalButton.removeClass('expandable__btn--active');
        $collapsibleCalArea.attr('style', '');
        
    }
}

//Calendar Collapser
function collapseCalenderContent(){
    $('body').on('click', '.eventclosecalenderbutton', expand);
    function expand () {
        const $self = $(this);
        const expanderButton = $('.eventcalenderbutton').find('button');
        const $expandableArea = $('.eventCalenderExpandable');

        expanderButton.show();
        $expandableArea.attr('style', '');
    }
}

//    Radius
function clickEventRadius(){
    $('#radiusBtn').click(function(){
        radius = $('#radius').val();
            
            $.ajax({
                url: "./php/setradius.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {radius:radius},
                success: function(returnedData){
                    $("#radiusmessage").html(returnedData);
        //            $("#eventsNearMeResults").fadeIn();
                    $("#radiusmessage").fadeIn();
                    getEventCalendar();
                },
        //        Ajax Call fails: show ajax call error
                error: function(){
                    $("#radiusmessage").html("<div class='alert alert-danger'>There was an error with the clickEventRadius Ajax call. Please try again</div>");
                    $("#radiusmessage").fadeIn();
                }
            });
        });
    }


//Event Calender
function getEventCalendar(){
  
var options = {
	events_source: '../php/eventcalendar.php',
	view: 'month',
    tmpl_path: 'calendar/tmpls/',
	tmpl_cache: false,
	day: 'now',
	onAfterEventsLoad: function(events) {
		if(!events) {
            return;
        }
	var list = $('#eventlist');
    list.html('');
    var idArray = [];
	$.each(events, function(key, val) {
        if($.inArray( val.id, idArray ) == -1){
            $(document.createElement('li'))
			.html('' + val.title + '')
			.appendTo(list);
        
            idArray.push(val.id);            
        }else{
            return true;
        }
        
		});
        
    },
	onAfterViewLoad: function(view) {
		$('.page-header h3').text(this.getTitle());
		$('.btn-group button').removeClass('active');
		$('button[data-calendar-view="' + view + '"]').addClass('active');
	},
	classes: {
		months: {
	       general: 'label'
        }
    }
};
	var calendar = $('#showEventCalendar').calendar(options);
	$('.btn-group button[data-calendar-nav]').each(function() {
		var $this = $(this);
		$this.click(function() {
			calendar.navigate($this.data('calendar-nav'));
		});
	});
	$('.btn-group button[data-calendar-view]').each(function() {
		var $this = $(this);
		$this.click(function() {
			calendar.view($this.data('calendar-view'));
		});
	});
	$('#first_day').change(function(){
		var value = $(this).val();
		value = value.length ? parseInt(value) : null;
		calendar.setOptions({first_day: value});
		calendar.view();
	});
	$('#language').change(function(){
		calendar.setLanguage($(this).val());
		calendar.view();
	});
	$('#events-in-modal').change(function(){
		var val = $(this).is(':checked') ? $(this).val() : null;
		calendar.setOptions({modal: val});
	});
	$('#format-12-hours').change(function(){
		var val = $(this).is(':checked') ? true : false;
		calendar.setOptions({format12: val});
		calendar.view();
	});
	$('#show_wbn').change(function(){
		var val = $(this).is(':checked') ? true : false;
		calendar.setOptions({display_week_numbers: val});
		calendar.view();
	});
	$('#show_wb').change(function(){
		var val = $(this).is(':checked') ? true : false;
		calendar.setOptions({weekbox: val});
		calendar.view();
	});	

};