//Variables
var data; var addressLongitude; var addressLatitude; var myEvent; var eventAddress; var invoker;

//Get Events on page load
getAllEvents(); expandMessage(); expandContent();

//Create HERE map platform
var platform = new H.service.Platform({ 'apikey' : 'KIkmXroOdWQiWJRqhKLtIJJyp_zDfxDwW2vgUfFnlBI' });
//Create Geocoder
var geocoder = platform.getGeocodingService();

//Hide Date, Time and Checkbox from modal
$('.regular').hide(); $('.oneOff').hide(); $('.venue').hide(); $('.limitedSeats').hide(); $('.attendeeEdit').hide(); $('.editGame').hide();
$('.regularEdit').hide(); $('.oneOffEdit').hide(); $('.editVenue').hide(); $('.editLimitedSeats').hide();

//Select radio and show relevent elements
var myRadio = $('input[name="regular"]');

myRadio.click(function(){
    if($(this).is(':checked')){
       if($(this).val() == "Y"){
           $('.oneOff').hide(); $('.regular').show();
       }else{
           $('.regular').hide(); $('.oneOff').show();
       }
    }
});

//Select radio and show relevent elements for Edit Modal
var myRadio = $('input[name="editRegular"]');

myRadio.click(function(){
    if($(this).is(':checked')){
       if($(this).val() == "Y"){
           $('.oneOffEdit').hide(); $('.regularEdit').show();
       }else{
           $('.regularEdit').hide(); $('.oneOffEdit').show();
       }
    }
});

//Same as above but for the Address
var myRadio = $('input[name="eventAddress"]');

myRadio.click(function(){
    if($(this).is(':checked')){
       if($(this).val() == "H"){
           $('.venue').hide();
       }else{
           $('.venue').show();
       }
    }
});

//Same as above but for the Edit Address
var myRadio = $('input[name="editEventAddress"]');

myRadio.click(function(){
    if($(this).is(':checked')){
       if($(this).val() == "H"){
           $('.editVenue').hide();
       }else{
           $('.editVenue').show();
       }
    }
});

//Same as above but for the Edit Address
var myRadio = $('input[name="eventtype"]');

myRadio.click(function(){
    if($(this).is(':checked')){
       if($(this).val() == "l"){
           $('.limitedSeats').show();
       }else{
           $('.limitedSeats').hide();
       }
    }
});

//Same as above but for the Edit Address
var myRadio = $('input[name="editeventtype"]');

myRadio.click(function(){
    if($(this).is(':checked')){
       if($(this).val() == "l"){
           $('.editLimitedSeats').show();
       }else{
           $('.editLimitedSeats').hide();
       }
    }
});

//Same as above but for the Edit Address
var myRadio = $('input[name="editEventGame"]');

myRadio.click(function(){
    if($(this).is(':checked')){
       if($(this).val() == "C"){
           $('.editGame').show();
       }else{
           $('.editGame').hide();
       }
    }
});

//Autocomplete Functions
$(function() {
    $("#game").autocomplete({
        source: "./php/autocompletegame.php",
        minLength: 3,
        select: function( event, ui ) {
            event.preventDefault();
            $("#game").val(ui.item.value);
        }
    });
});
$(function() {
    $("#editGame").autocomplete({
        source: "./php/autocompletegame.php",
        minLength: 3,
        select: function( event, ui ) {
            event.preventDefault();
            $("#editGame").val(ui.item.value);
        }
    });
});
$(function() {
    $("#edition").autocomplete({
        source: "./php/autocompleteedition.php",
        minLength: 3,
        select: function( event, ui ) {
            event.preventDefault();
            $("#edition").val(ui.item.value);
        }
    });
});
$(function() {
    $("#editEdition").autocomplete({
        source: "./php/autocompleteedition.php",
        minLength: 3,
        select: function( event, ui ) {
            event.preventDefault();
            $("#editEdition").val(ui.item.value);
        }
    });
});

//Calendar
$('input[name="date"]').datepicker({
    numberOfMonths: 1,
    showAnim: "fadeIn",
    dateFormat: "D d M, yy",
//    showWeek: true, For adding the week number to the calendar
    altField: '#dbDate',
    altFormat: 'yy-mm-dd',
    minDate: +1,
    maxDate: "+12M"
});
$('input[name="editDate"]').datepicker({
    numberOfMonths: 1,
    showAnim: "fadeIn",
    dateFormat: "D d M, yy",
//    showWeek: true, For adding the week number to the calendar
    altField: '#editdbDate',
    altFormat: 'yy-mm-dd',
    minDate: +1,
    maxDate: "+12M"
});

//Ajax
//Click on Create Event Button
$("#addEventForm").submit(function(event){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#addEventMessage").hide();
    event.stopImmediatePropagation();
    event.preventDefault();
    data = $(this).serializeArray();
//    console.log(data);
    var eventAddressObject = data[0];
    var eventAddress = String(eventAddressObject['value']);
    if(eventAddress != 'H'){
        //get the address text
        addressArray = [data[1], data[2], data[3], data[4], data[5]];
        searchtext = Array.prototype.map.call(addressArray, function(item) { return item.value; }).join(", ");
        getEventCoordinates();
    }else{
        submitAddEventRequest();
    }
});


//Functions
function getEventCoordinates(){
    geocoder.geocode(
        {
        searchtext
        },
        function(result){
            addressLongitude = result.Response.View[0].Result[0].Location.DisplayPosition.Longitude;
            addressLatitude = result.Response.View[0].Result[0].Location.DisplayPosition.Latitude;
            data.push({name:'addressLongitude', value:addressLongitude});
            data.push({name:'addressLatitude', value:addressLatitude});
            submitAddEventRequest();
            
        }, alert
    );
}

function submitAddEventRequest(){
    $.ajax({
        url: "./php/addevents.php",
        type: "POST",
        data: data,
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            if(returnedData){
                $("#addEventMessage").html(returnedData);
                $("#addEventMessage").slideDown();
            }else{
                //Hide Modal
                $("#addEventModal").modal('hide');
                //Reset Form
                $("#addEventForm")[0].reset();
                //Hide Regular and One off elements
                $('.regular').hide(); $('.oneOff').hide(); $('.venue').hide(); $('.limitedSeats').hide();
                //Load Trips
                getAllEvents();
                
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#addEventMessage").html("<div class='alert alert-danger'>There was an error with the addEvents Ajax call. Please try again</div>");
            $("#addEventMessage").slideDown();
        }
    });
}

function getAllEvents(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#myEvents").fadeOut();
    $.ajax({
        url: "./php/getevents.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#myEvents").html(returnedData);
            $("#myEvents").fadeIn();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#myEvents").html("<div class='alert alert-danger'>There was an error with the getEvents Ajax call. Please try again</div>");
            $("#myEvents").fadeIn();
        }
    });
}

function formatModal(){
    if(myEvent['venue'] == "V"){
        $('#editVenue').prop('checked', true);
        $('#editVenueAddress1').val(myEvent['address']);
        $('#editVenueAddress2').val(myEvent['address2']);
        $('#editVenueDistrict').val(myEvent['district']);
        $('#editVenueCity').val(myEvent['city']);
        $('#editVenuePostcode').val(myEvent['postcode']);
        $('.editVenue').show();
    }else{
        $('#editHome').prop('checked', true);
        $('.editVenue').hide();
    }
    
    $('#editName').val(myEvent['event_name']);
    $('#editattendee').val(myEvent['attendees']);
    
    if(myEvent['event_type'] == "o"){
        $('#editOpen').prop('checked', true);
        $('.editLimitedSeats').hide();
    }else{
        $('#editLimited').prop('checked', true);
        $('#editSeats').val(myEvent['seatsavailable']);
        $('.editLimitedSeats').show();
    }
    
    $('#editEventInfo').val(myEvent['about_event']);
    
    if(myEvent['regular'] == "Y"){
        $('#editYes').prop('checked', true);
        $('#editMonday').prop('checked', myEvent['monday'] == "1"? true:false);
        $('#editTuesday').prop('checked', myEvent['tuesday'] == "1"? true:false);
        $('#editWednesday').prop('checked', myEvent['wednesday'] == "1"? true:false);
        $('#editThursday').prop('checked', myEvent['thursday'] == "1"? true:false);
        $('#editFriday').prop('checked', myEvent['friday'] == "1"? true:false);
        $('#editSaturday').prop('checked', myEvent['saturday'] == "1"? true:false);
        $('#editSunday').prop('checked', myEvent['sunday'] == "1"? true:false);
        $('input[name="editTime"]').val(myEvent['time']);
        $('.oneOffEdit').hide(); $('.regularEdit').show();
    }else{
        $('#editNo').prop('checked', true);
        $('.regularEdit').hide(); $('.oneOffEdit').show();
    }
}

function getEditEventCoordinates(){
    geocoder.geocode(
        {
        searchtext
        },
        function(result){
            addressLongitude = result.Response.View[0].Result[0].Location.DisplayPosition.Longitude;
            addressLatitude = result.Response.View[0].Result[0].Location.DisplayPosition.Latitude;
            data.push({name:'addressLongitude', value:addressLongitude});
            data.push({name:'addressLatitude', value:addressLatitude});
            submitEditEventRequest();
            
        }, alert
    );
}

function submitEditEventRequest(){
    $.ajax({
        url: "./php/updateevent.php",
        type: "POST",
        data: data,
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            if(returnedData){
                $("#editEventMessage").html(returnedData);
                $("#editEventMessage").slideDown();
            }else{
                //Hide Modal
                $("#editEventModal").modal('hide');
                //Reset Form
                $("#editEventsForm")[0].reset();
                //Load Trips
                getAllEvents();
                
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#editEventMessage").html("<div class='alert alert-danger'>There was an error with the editEvents Ajax call. Please try again</div>");
            $("#editEventMessage").slideDown();
        }
    });
}

//Click on Edit Button
$("#editEventModal").on('show.bs.modal', function(event){
    $("#editEventMessage").empty();
    invoker = $(event.relatedTarget);
    //Ajax Call to get Event details
    $.ajax({
        url: "./php/eventdetails.php",
        method: "POST",
        data: {event_id:invoker.data('event_id')},
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            if(returnedData){
                if(returnedData == "error"){
                    $("#editEventMessage").html("<div class='alert alert-danger'>There was an error with the editEvents Ajax call. Please try again</div>");
                    $("#editEventMessage").slideDown();
                }else{
                    myEvent = JSON.parse(returnedData);
                    //Fill the edit event form with the JSON data
                    formatModal();
                }
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#editEventMessage").html("<div class='alert alert-danger'>There was an error with the editTrips Ajax call. Please try again</div>");
            $("#editEventMessage").slideDown();
        }
    });
    
    $('#editEventsForm').submit(function(event){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#editEventMessage").hide();
//        $("#editEventMessage").empty();
        event.stopImmediatePropagation();
        event.preventDefault();
        data = $(this).serializeArray();
        data.push({name:'event_id', value:invoker.data('event_id')});
        var editEventAddressObject = data[0];
        var eventAddress = String(editEventAddressObject['value']);
        if(eventAddress != 'H'){
            //get the address text
            addressArray = [data[1], data[2], data[3], data[4], data[5]];
            searchtext = Array.prototype.map.call(addressArray, function(item) { return item.value; }).join(", ");
            getEditEventCoordinates();
        }else{
            submitEditEventRequest();
        }
        
    });
    
//    Delete Event
    $('#deleteEvent').click(function(){
        $.ajax({
            url: "./php/deleteevent.php",
            method: "POST",
            data: {event_id:invoker.data('event_id')},
//        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                if(returnedData){
                    $("#editEventMessage").html("<div class='alert alert-danger'>There was an error with the deleteEvents Ajax call. Please try again</div>");
                    $("#editEventMessage").slideDown();
                }else{
                    $("#editEventModal").modal('hide');
                    getAllEvents();
                    
                }
            },
//        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#editEventMessage").html("<div class='alert alert-danger'>There was an error with the editTrips Ajax call. Please try again</div>");
                $("#editEventMessage").slideDown();
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
