var paymentValue; var itemdata; var sortdata;
    
loadproducts(); clickRefine();
    
function loadproducts(){

    $("#spinner").show();
    $("#products").fadeOut();
    $("#alert").fadeOut();
    
    $.ajax({
        url: "./php/loadproducts.php",
        success: function(data){
            $("#spinner").hide();
            $('#products').html(data);
            $("#products").fadeIn();
            
            addtocart();
        },
        error: function(){
            $("#alertContent").text("There was an error with the Ajax call");
            $("#alert").fadeIn();
        }
    });
}
    
//    Refine
function clickRefine(){
    $('#refineBtn').click(function(){
     
        $("#spinner").show();
        $("#products").fadeOut();
        $("#alert").fadeOut();
        
        itemdata = $('#refine').val();
        sortdata = $('#sortby').val();
            $.ajax({
                url: "./php/loadproducts.php",
                type: "POST",
                //we need to send the current note w/ its id to the php file
                data: {refine:itemdata, sort:sortdata},
                success: function(data){
                    $("#spinner").hide();
                    $('#products').html(data);
                    $("#products").fadeIn();
                },
        //        Ajax Call fails: show ajax call error
                error: function(){
                    $("#spinner").hide();
                    $("#alertContent").text("There was an error with the Ajax call");
                    $("#alert").fadeIn();
                }
            });
        });
    }
    
loadBasket();
    
function loadBasket(){
    ////    load basket from session variable: Ajax call to loadbasket.php    
        $.ajax({
            url: "./php/loadbasket.php",
            success: function(data){
                $('#cartItems').html(data);
                removeItem();
                $.ajax({
                    url: "./php/totalcost.php",
                    success: function(data){
                        $('.totalCost').html(data);
                        cartCount = $('input#cart_count_input').val();
                        cartCountFloat = parseFloat(cartCount);
                        paymentValue = $('input#paymentamount').val();
                        paymentValueFloat = parseFloat(paymentValue);
                       
                        if(cartCountFloat > 0 && paymentValueFloat > 0){
                            $('.paymentTitle').html("<h6 class='totals'>Pay With:</h6>");
                            initPayPalButton();
                        }else if(cartCountFloat > 0 && paymentValueFloat == 0){
                            $('.freeButton').html("<button class='btn btn-block btnDone freeItem'>Add to Library for Free!</button>");
                            
                            freeItem();
                        }
                        
                    },
                    error: function(){
                        $("#alertContent").text("There was an error with the Ajax call");
                        $("#alert").fadeIn();
                    }                
                });
            },
            error: function(){
                $("#alertContent").text("There was an error with the Ajax call");
                $("#alert").fadeIn();
            }
        });
}
    
    function initPayPalButton() {
      paypal.Buttons({
        style: {
            shape: 'rect',
            color: 'blue',
            layout: 'vertical',
            label: 'paypal',
        },

        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{"amount":{"currency_code":"GBP","value":paymentValue}}]
            });
        },

        onApprove: function(data, actions) {
           
//            Capture the funds an release products to library
            return actions.order.capture().then(function() {
//                Add items to library
                $.ajax({
                    url: "./php/addtolibrary.php",
                    success: function(returneddata){
                        if(returneddata){
                            $(".payErrors").html(returneddata);
                            $(".payErrors").slideDown();
                        }else{
                            window.location.replace("https://thelittledarkone.com/paymentsuccess.php");
                        }
                    },
                    error: function(){
                        $(".payErrors").text("There was an error with the Ajax call");
                        $(".payErrors").fadeIn();
                    }                
                });
            });
        },

        onError: function(err) {
            console.log(err);
        }
      }).render('#paypal-button-container');
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
    
    //    Remove Item
function removeItem(){
    $('.removeItem').click(function(){
        itemdata = $(this).attr('id');
            $.ajax({
                url: "./php/removeitem.php",
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
//    Free Item
function freeItem(){
    $('.freeItem').click(function(event){
        //    prevent default php processing
        event.stopImmediatePropagation();
        event.preventDefault();
        $.ajax({
            url: "./php/addtolibrary.php",
            success: function(data){
                if(data){
                    $(".payErrors").html(data);
                    $(".payErrors").slideDown();
                }else{
                    window.location.replace("https://thelittledarkone.com/paymentsuccess.php");
                }
            },
            error: function(){
                $(".payErrors").text("There was an error with the Ajax call");
                $(".payErrors").fadeIn();
            }                
        });
    });
}
