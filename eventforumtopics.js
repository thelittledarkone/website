//Variables
var deleteMode = false;

deletemode(); loadtop();

$("#createTopicForm").submit(function(event){
    //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
    //    collect user inputs
        var datatopost = $(this).serializeArray();
    //    send them to signup.php using ajax
        $.ajax({
            url: "./php/createeventtopic.php",
            type: "POST",
            data: datatopost,
    //        Ajax call successful: show error or success message
            success: function(data){
                if(data){
                    $("#createTopicMessage").html(data);
                    setTimeout(function(){
                        $("#createTopicModal").modal('hide');
                        $("#createTopicForm")[0].reset();
                        loadtop();
                    }, 1000);
                }
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#createTopicMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
            }
        });
    });

function loadtop(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#forumBody").fadeOut();
    $.ajax({
        url: "./php/loadeventtop.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#forumBody").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            $("#forumBody").fadeIn();
            
            deleteTop();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#forumBody").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $("#forumBody").fadeIn();
        }
    });
}

function deleteTop(){
        $(".delete-top").click(function(){
            var deleteButton = $(this);
            $.ajax({
                url: "./php/deleteeventtop.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {id:deleteButton.prev().attr("id")},
                success: function(data){
                    if(data == 'error'){
                        $("#alertContent").text("There was an issue with deleting the note from the database.");
                        $("#alert").fadeIn();
                    }else{
                        deleteButton.parent().remove();
                        loadtop();
                    }
                },
                error: function(){
                    $("#alertContent").text("There was an issue with updating the note in the database.");
                    $("#alert").fadeIn();
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