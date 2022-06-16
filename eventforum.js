//Variables
var deleteMode = false; var data;

deletemode(); loadcat();

//Once form is submitted
    $("#createCatForm").submit(function(event){
    //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
    //    collect user inputs
        var datatopost = $(this).serializeArray();
    //    send them to signup.php using ajax
        $.ajax({
            url: "./php/createeventcat.php",
            type: "POST",
            data: datatopost,
    //        Ajax call successful: show error or success message
            success: function(returneddata){
                if(returneddata){
                    $("#createCatMessage").html(data);
                    setTimeout(function(){
                        $("#createCatModal").modal('hide');
                        $("#createCatForm")[0].reset();
                        loadcat();
                    }, 1000);
                }
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#createCatMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
            }
        });
    });

function loadcat(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#forumBody").fadeOut();
    $.ajax({
        url: "./php/loadeventcat.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#forumBody").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            $("#forumBody").fadeIn();
            
            deleteCat(); createEventForum();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#forumBody").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $("#forumBody").fadeIn();
        }
    });
}

function deleteCat(){
        $(".delete-cat").click(function(){
            var deleteButton = $(this);
            $.ajax({
                url: "./php/deleteeventcat.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {id:deleteButton.prev().attr("id")},
                success: function(returneddata){
                    if(returneddata == 'error'){
                        $("#alertContent").text("There was an issue with deleting the note from the database.");
                        $("#alert").fadeIn();
                    }else{
                        deleteButton.parent().remove();
                        loadcat();
                    }
                },
                error: function(){
                    $("#alertContent").text("There was an issue with updating the note in the database.");
                    $("#alert").fadeIn();
                }
            });
        });
    }

//   Create Event Forum
function createEventForum(){
    $('.createForum').click(function(){
        data = $(this).attr('id');
            $.ajax({
                url: "./php/createeventforum.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {event_id:data},
                success: function(returnedData){
                    if(returnedData){
                        $("#alertContent").html(returnedData);
                        $("#alertContent").fadeIn();
                    }else{
                        loadcat();
                    }
                },
                error: function(){
                    $("#alertContent").text("There was an issue with updating the message in the database.");
                    $("#alertContent").fadeIn();
                }
            });
        });
    }

function deletemode(){
    $(".delete").click(function(){
        if(deleteMode == false){
            deleteMode = true;
            $(".admin-only").show();
        }else{
            deleteMode = false;
            $(".admin-only").hide();
        }
    });
}