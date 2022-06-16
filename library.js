//Variables
    var data;

//Get Messages on page load
getLibrary();

    function getLibrary(){
    //    Show Spinner
        $("#spinner").show();
    //    Hide Results
        $("#myLibrary").fadeOut();
        $.ajax({
            url: "./php/getlibrary.php",
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                $("#spinner").hide();
                $("#myLibrary").html(returnedData);
                $("#myLibrary").fadeIn();
                clickDownload();
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#myLibrary").html("<div class='alert alert-danger'>There was an error with the getLibrary Ajax call. Please try again</div>");
                $("#myLibrary").fadeIn();
            }
        });
    }

function clickDownload(){
    $('.downloadpdf').click(function(){
        data = $(this).attr('id');
        $.ajax({
            url: "./php/markdownloaded.php",
            type: "POST",
            data: {product_id:data},
    //        Ajax call successful: show error or success message
            success: function(returnedData){
                if(returnedData){
                    $("#myLibrary").html(returnedData);
                    $("#myLibrary").fadeIn();
                }else{
                    getLibrary();
                }
            },
    //        Ajax Call fails: show ajax call error
            error: function(){
                $("#spinner").hide();
                $("#myLibrary").html("<div class='alert alert-danger'>There was an error with the getLibrary Ajax call. Please try again</div>");
                $("#myLibrary").fadeIn();
            }
        });
    });
}
