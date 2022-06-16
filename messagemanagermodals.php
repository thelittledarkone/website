<!--        Send Message Modal-->
        <form method="post" id="sendMessageForm">
            <div class="modal" id="sendMessageModal" role="dialog" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="sendMessageModalLabel">Send Message:</h4>
                        </div>
                        <div class="modal-body">
<!--                            Add Event message for php file-->
                            <div id="sendMessageMessage"></div>
<!--                            Send Message form-->
                            <div class="form-group">
                                <label class="input-group-text" for="messageType">Message Type:</label>
                                <select class="custom-select" id="messageType" name="messageType">
                                    <option selected>Choose...</option>
                                    <option value="q">Question</option>
                                    <option value="z">Feedback</option>
                                    <option value="o">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="messageSubject" class="sr-only">Subject</label>
                                <input class="form-control" type="text" id="messageSubject" name="messageSubject" placeholder="Subject" maxlength="50">  
                            </div> 
                            <div class="form-group">
                                <label for="messageContent">Message: </label>
                                <textarea name="messageContent" class="form-control" id="messageContent" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="sendMessage" type="submit" value="Send Message">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
      
        <!--        Send Booking Request Modal-->
        <form method="post" id="sendBookingRequestForm">
            <div class="modal" id="sendBookingRequestModal" role="dialog" aria-labelledby="sendBookingRequestModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="sendBookingRequestModalLabel">Request Seat:</h4>
                        </div>
                        <div class="modal-body">
<!--                            Add Event message for php file-->
                            <div id="sendBookingRequestMessage"></div>
<!--                            Send Message form-->
                            <div class="form-group">
                                <label for="bookingMessage">Add Message? <i>(optional)</i> </label>
                                <textarea name="bookingMessage" class="form-control" id="bookingMessage" rows="5"></textarea>
                            </div>
                            <div>By clicking the 'Request Seat' button, you are accepting that you wish to book a seat to this event. The event organiser will be in contact with you to let you know if you have been assigned a seat at the table.</div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="bookseat" type="submit" value="Request Seat">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>