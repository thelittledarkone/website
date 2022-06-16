//Variables
var deleteMode = false;

expandReplyContent(); expandContent(); deletemode(); loadposts();

$("#replyForm").submit(function(event){
    //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
    //    collect user inputs
        var datatopost = $(this).serializeArray();
    //    send them to signup.php using ajax
        $.ajax({
            url: "./php/forumreply.php",
            type: "POST",
            data: datatopost,
    //        Ajax call successful: show error or success message
            success: function(data){
                if(data){
                    $("#replyForm")[0].reset();
                    loadposts();
                }
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#replyMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
            }
        });
    });

function loadposts(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#forumBody").fadeOut();
    $.ajax({
        url: "./php/loadposts.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#forumBody").html(returnedData);
//            $("#eventsNearMeResults").fadeIn();
            $("#forumBody").fadeIn();
            
            deletePost();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#forumBody").html("<div class='alert alert-danger'>There was an error with the getTrips Ajax call. Please try again</div>");
            $("#forumBody").fadeIn();
        }
    });
}

function deletePost(){
        $(".delete-post").click(function(){
            var deleteButton = $(this);
            $.ajax({
                url: "./php/deletepost.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {id:deleteButton.next().attr("id")},
                success: function(data){
                    if(data == 'error'){
                        $("#alertContent").text("There was an issue with deleting the note from the database.");
                        $("#alert").fadeIn();
                    }else{
                        deleteButton.parent().remove();
                        loadposts();
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

function expandReplyContent(){
    $('body').on('click', '[data-js-reply-expander]', expand);
    function expand () {
        const $self = $(this);
        const expanderButton = $self.find('button');
        const $expandableArea = $('.replyExpandable');
        const $expandableInnerWidth = '100%';
        const $expandableInnerHeight = $expandableArea.find('[data-js-expandable-inner]').height();

        if (expanderButton.hasClass('expandable__btn--active')) {
            expanderButton.removeClass('expandable__btn--active');
            $expandableArea.attr('style', '');
        } else {
            expanderButton.addClass('expandable__btn--active');
            $expandableArea.css('max-width', $expandableInnerWidth);
            $expandableArea.css('max-height', $expandableInnerHeight);
        }
    }
}

function expandContent(){
    $('#forumContainer').on('click', '[data-js-expander]', expand);
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