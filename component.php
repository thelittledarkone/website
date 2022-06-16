<?php
function component($productName, $productPrice, $productImage){
    $element = '
        <div class="col-md-3 col-sm-6">
                  <form action="shop.php" method="post">
                      <div class="panel panel-warning">
                          <div class="panel-heading">
                              <img src="' . $productImage . '" alt="Image1" class="img-fluid card-image-top shopItem">
                          </div>
                          <div class="panel-body">
                              <h5 class="panel-title">' . $productName . '</h5>
                              <h6><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></h6>
                              <p class="panel-text">
                                  A disciption of each item and a brief synopsis of any book.
                              </p>
                              <h5>
                                  <small><s class="text-secondary">£5.00</s></small>
                                  <span class="price">£' . $productPrice . '</span>
                              </h5>
                              <button type="submit" name="add" class="btn">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                          </div>
                      </div>                  
                  </form>
              </div>
    ';
    echo $element;
}

function cartElement($productName, $productPrice, $productImage){
    $element = '
        <form action="cart.php" method="get" class="cart-items">
             <div class="bordered">
                 <div class="row">
                     <div class="col-md-3 col-md-offset-0 col-xs-8 col-xs-offset-2 cartPicture">
                         <img src="'.$productImage.'">
                     </div>
                     <div class="col-md-6 col-md-offset-0 col-xs-8 col-xs-offset-2 cartCard">
                         <h5>'.$productName.'</h5>
                         <small class="text-secondary">Seller: thelittledarkone</small>
                         <h5>'.$productPrice.'</h5>
                         <button type="submit" class="btn btn-warning">Save for Later</button>
                         <button type="submit" class="btn btn-danger" name="remove">Remove</button>
                     </div>
                     <div class="col-md-3 col-md-offset-0 col-xs-8 col-xs-offset-2 plusMinus">
                         <div>
                             <button type="button" class="btn btn-danger"><i class="fas fa-minus"></i></button>
                             <input type="text" value="1" class="form-control cartAmount">
                             <button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button>
                         </div>
                     </div>
                </div>
            </div>
        </form>
    ';
    echo $element;
}
?>