getMyCalendar(); expandCalenderContent();

//Sticky Functions
document.addEventListener("DOMContentLoaded", function(){
      window.addEventListener('scroll', function() {
          if (window.scrollY > 100) {
               document.getElementById('mycalenderbutton').classList.add('mycalenderbuttonFixed');
              
              document.getElementById('mycalenderid').classList.add('calendersticky');
              
          } else {
              document.getElementById('mycalenderbutton').classList.remove('mycalenderbuttonFixed');
              document.getElementById('mycalenderid').classList.remove('calendersticky');
              
          } 
      });
    }); 

//Calendar Expander
function expandCalenderContent(){
    $('body').on('click', '.mycalenderbutton', expand);
    function expand () {
        const $self = $(this);
        const expanderButton = $self.find('button');
        const collapsedButton = $('[data-js-nav-expander]').find('img');
        const collapsedCalButton = $('.eventcalenderbutton').find('button');
        const $expandableArea = $('.calenderExpandable');
        const $collapsibleArea = $('.profileExpandable');
        const $collapsibleCalArea = $('.eventCalenderExpandable');
        const $expandableInnerWidth = '100%';
        const $expandableInnerHeight = '750px';

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

//My Calender
function getMyCalendar(){
  
var options = {
	events_source: '../php/mycalender.php',
	view: 'month',
    tmpl_path: 'calendar/tmpls/',
	tmpl_cache: false,
	day: 'now',
	onAfterEventsLoad: function(events) {
		if(!events) {
            return;
        }
	var list = $('#myeventlist');
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
	var calendar = $('#showMyEventCalendar').calendar(options);
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