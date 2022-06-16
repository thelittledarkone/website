getProductDetails();

function getProductDetails(){
//    Show Spinner
    $("#spinner").show();
//    Hide Results
    $("#profilePageDetails").fadeOut();
    $.ajax({
        url: "./php/getproductdetails.php",
//        Ajax call successful: show error or success message
        success: function(returnedData){
            $("#spinner").hide();
            $("#profilePageDetails").html(returnedData);
            $("#profilePageDetails").fadeIn();
            
            addtocart();
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#spinner").hide();
            $("#profilePageDetails").html("<div class='alert alert-danger'>There was an error with the getEvents Ajax call. Please try again</div>");
            $("#profilePageDetails").fadeIn();
        }
    });
}

//    Add to Cart
function addtocart(){
    $('.addtocart').click(function(){
        itemdata = $(this).attr('id');
            $.ajax({
                url: "./php/addtocart.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {product_id:itemdata},
                success: function(){
                        location.reload();
                },
                error: function(){
                    $("#errorMessages").text("There was an issue with updating the message in the database.");
                    $("#errorMessages").fadeIn();
                }
            });
        });
    }