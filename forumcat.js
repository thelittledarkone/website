//Variables
var deleteMode = false;

loadcat();

//Once form is submitted
    $("#createCatForm").submit(function(event){
    //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
    //    collect user inputs
        var datatopost = $(this).serializeArray();
    //    send them to signup.php using ajax
        $.ajax({
            url: "./php/createcat.php",
            type: "POST",
            data: datatopost,
    //        Ajax call successful: show error or success message
            success: function(data){
                if(data){
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
        url: "./php/loadcat.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#forumBody").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            $("#forumBody").fadeIn();
            
            deletemode();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#forumBody").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $("#forumBody").fadeIn();
        }
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