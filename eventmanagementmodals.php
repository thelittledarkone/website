<!--        Add Events Modal-->
        <form method="post" id="addEventForm">
            <div class="modal" id="addEventModal" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="addEventModalLabel">New Event:</h4>
                        </div>
                        <div class="modal-body">
<!--                            Add Event message for php file-->
                            <div id="addEventMessage"></div>
<!--                            Create Event form-->
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="eventAddress" id="home" value="H">
                                    Use Home Address                          
                                </label>
                                <label>
                                    <input type="radio" name="eventAddress" id="venue" value="V">
                                    Use Venue Address                           
                                </label>
                            </div>
                            <div class="form-group venue">
                                <label for="venueAddress1" class="sr-only">Address 1</label>
                                <input class="form-control" type="text" id="venueAddress1" name="venueAddress1" placeholder="Address" maxlength="50">
                            </div>
                            <div class="form-group venue">
                                <label for="venueAddress2" class="sr-only">Address 2</label>
                                <input class="form-control" type="text" id="venueAddress2" name="venueAddress2" placeholder="Address Line 2" maxlength="50">
                            </div>
                            <div class="form-group venue">
                                <label for="venueDistrict" class="sr-only">District</label>
                                <input class="form-control" type="text" id="venueDistrict" name="venueDistrict" placeholder="District" maxlength="20">
                            </div>
                            <div class="form-group venue">
                                <label for="venueCity" class="sr-only">City</label>
                                <input class="form-control" type="text" id="venueCity" name="venueCity" placeholder="City" maxlength="20">
                            </div>
                            <div class="form-group venue">
                                <label for="venuePostcode" class="sr-only">Postcode</label>
                                <input class="form-control" type="text" id="venuePostcode" name="venuePostcode" placeholder="Post/Zip Code" maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Name of Event" maxlength="50">  
                            </div> 
                            <div class="form-group">
                                <label for="game" class="sr-only">Game</label>
                                <input class="form-control" type="text" id="game" name="game" placeholder="Game you are Playing" maxlength="50">  
                            </div> 
                            <div class="form-group">
                                <label for="edition" class="sr-only">Edition</label>
                                <input class="form-control" type="text" id="edition" name="edition" placeholder="What Edition/Set? (Optional)" maxlength="50">  
                            </div> 
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="eventtype" id="open" value="o" checked>
                                    Open Event                                
                                </label>
                                <label>
                                    <input type="radio" name="eventtype" id="limited" value="l">
                                    Limited Seating                                
                                </label>
                                <label>
                                    <input type="radio" name="eventtype" id="tournament" value="t">
                                    Tournament                                
                                </label>
                            </div>
                            <div class="form-group limitedSeats">
                                <label for="seats" class="sr-only">Places</label>
                                <input class="form-control" type="number" id="seats" name="seats" placeholder="Seats Available (Max: 8)">  
                            </div>
                            <div class="form-group tournamentseats">
                                <label for="tournseats" id="tournseatslabel" class="sr-only">Places</label>
                                <select name="tournseats" id="tournseats" class="form-control">
                                    <option value="" selected>Select Number of Places</option>
                                    <option value="8">8</option>         
                                    <option value="16">16</option>         
                                    <option value="32">32</option>         
                                    <option value="64">64</option>     
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="moreEventInfo">About the Event: </label>
                                <textarea name="moreEventInfo" class="form-control" id="moreEventInfo" rows="5" maxlength="300"></textarea>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="regular" id="yes" value="Y">
                                    Regular                                
                                </label>
                                <label>
                                    <input type="radio" name="regular" id="no" value="N">
                                    One-off                                
                                </label>
                            </div>
                            <div class="checkbox checkbox-inline regular">
                                <label>
                                    <input type="checkbox" name="monday" id="monday" value="1">
                                    Monday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="tuesday" id="tuesday" value="1">
                                    Tuesday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="wednesday" id="wednesday" value="1">
                                    Wednesday                              
                                </label>
                                <label>
                                    <input type="checkbox" name="thursday" id="thursday" value="1">
                                    Thursday                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="friday" id="friday" value="1">
                                    Friday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="saturday" id="saturday" value="1">
                                    Saturday                              
                                </label>
                                <label>
                                    <input type="checkbox" name="sunday" id="sunday" value="1">
                                    Sunday                               
                                </label>
                            </div>
                            <div class="form-group oneOff">
                                <label for="date" class="sr-only">Date</label>
                                <input class="form-control" readonly="readonly" id="date" name="date">
                                <input type="hidden" id="dbDate" name="dbDate">
                            </div>
                            <div class="form-group regular oneOff">
                                <label for="time" class="sr-only">Time</label>
                                <input class="form-control" type="time" id="time" name="time">  
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="createTrip" type="submit" value="Create Event">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        <!--        Edit Events Modal-->
        <form method="post" id="editEventsForm">
            <div class="modal" id="editEventModal" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="editEventModalLabel">Edit Event:</h4>
                        </div>
                        <div class="modal-body">
<!--                            Edit Trip message for php file-->
                            <div id="editEventMessage"></div>
                            
<!--                            Edit Trip form-->
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="editEventAddress" id="editHome" value="H">
                                    Use Home Address                          
                                </label>
                                <label>
                                    <input type="radio" name="editEventAddress" id="editVenue" value="V">
                                    Use Venue Address                           
                                </label>
                            </div>
                            <div class="form-group editVenue">
                                <label for="editVenueAddress1" class="sr-only">Address 1</label>
                                <input class="form-control" type="text" id="editVenueAddress1" name="editVenueAddress1" placeholder="Address" maxlength="50">
                            </div>
                            <div class="form-group editVenue">
                                <label for="editVenueAddress2" class="sr-only">Address 2</label>
                                <input class="form-control" type="text" id="editVenueAddress2" name="editVenueAddress2" placeholder="Address Line 2" maxlength="50">
                            </div>
                            <div class="form-group editVenue">
                                <label for="editVenueDistrict" class="sr-only">District</label>
                                <input class="form-control" type="text" id="editVenueDistrict" name="editVenueDistrict" placeholder="District" maxlength="20">
                            </div>
                            <div class="form-group editVenue">
                                <label for="editVenueCity" class="sr-only">City</label>
                                <input class="form-control" type="text" id="editVenueCity" name="editVenueCity" placeholder="City" maxlength="20">
                            </div>
                            <div class="form-group editVenue">
                                <label for="editVenuePostcode" class="sr-only">Postcode</label>
                                <input class="form-control" type="text" id="editVenuePostcode" name="editVenuePostcode" placeholder="Post/Zip Code" maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="editName" class="sr-only">Name</label>
                                <input class="form-control" type="text" id="editName" name="editName" placeholder="Name of Event" maxlength="50">  
                            </div> 
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="editEventGame" id="editChangeGame" value="C">
                                    Change Game                        
                                </label>
                                <label>
                                    <input type="radio" name="editEventGame" id="editLeaveGame" value="L">
                                    Leave Game as is                           
                                </label>
                            </div>
                            <div class="form-group editGame">
                                <label for="editGame" class="sr-only">Game</label>
                                <input class="form-control" type="text" id="editGame" name="editGame" placeholder="Game you are Playing" maxlength="50">  
                            </div> 
                            <div class="form-group editGame">
                                <label for="editEdition" class="sr-only">Edition</label>
                                <input class="form-control" type="text" id="editEdition" name="editEdition" placeholder="What Edition/Set? (Optional)" maxlength="50">  
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="editeventtype" id="editOpen" value="o">
                                    Open Event                                
                                </label>
                                <label>
                                    <input type="radio" name="editeventtype" id="editLimited" value="l">
                                    Limited Seating                                
                                </label>
                                <label>
                                    <input type="radio" name="editeventtype" id="edittournament" value="t">
                                    Tournament                                
                                </label>
                            </div>
                            <div class="form-group editLimitedSeats">
                                <label for="editSeats" class="sr-only">Places</label>
                                <input class="form-control" type="number" id="editSeats" name="editSeats" placeholder="Seats Available (Max: 8)">  
                            </div>
                            <div class="form-group edittournamentseats">
                                <label for="edittournseats" id="edittournseatslabel" class="sr-only">Places</label>
                                <select name="edittournseats" id="edittournseats" class="form-control">
                                    <option value="" selected>Select Number of Places</option>
                                    <option value="8">8</option>         
                                    <option value="16">16</option>         
                                    <option value="32">32</option>         
                                    <option value="64">64</option>     
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editEventInfo">About the Event: </label>
                                <textarea name="editEventInfo" class="form-control" id="editEventInfo" rows="5" maxlength="300"></textarea>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="editRegular" id="editYes" value="Y">
                                    Regular                                
                                </label>
                                <label>
                                    <input type="radio" name="editRegular" id="editNo" value="N">
                                    One-off                                
                                </label>
                            </div>
                            <div class="checkbox checkbox-inline regularEdit">
                                <label>
                                    <input type="checkbox" name="editMonday" id="editMonday" value="1">
                                    Monday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="editTuesday" id="editTuesday" value="1">
                                    Tuesday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="editWednesday" id="editWednesday" value="1">
                                    Wednesday                              
                                </label>
                                <label>
                                    <input type="checkbox" name="editThursday" id="editThursday" value="1">
                                    Thursday                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="editFriday" id="editFriday" value="1">
                                    Friday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="editSaturday" id="editSaturday" value="1">
                                    Saturday                              
                                </label>
                                <label>
                                    <input type="checkbox" name="editSunday" id="editSunday" value="1">
                                    Sunday                               
                                </label>
                            </div>
                            <div class="form-group oneOffEdit">
                                <label for="editDate" class="sr-only">Date</label>
                                <input class="form-control" readonly="readonly" id="editDate" name="editDate">
                                <input type="hidden" id="editdbDate" name="editdbDate">
                            </div>
                            <div class="form-group regularEdit oneOffEdit">
                                <label for="editTime" class="sr-only">Time</label>
                                <input class="form-control" type="time" id="editTime" name="editTime">  
                            </div>
                            <div class="form-group attendeeEdit">
                                <label for="editattendee" class="sr-only">Attendees</label>
                                <input class="form-control" type="number" id="editattendee" name="editattendee">  
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="editEvent" type="submit" value="Edit Event">
                            <input class="btn btn-danger" name="deleteEvent" id="deleteEvent" value="Delete" type="button">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>