<div class="inlineHeader">
        <a href="cart.php" class="shoppingCart">
            <i class="fas fa-shopping-cart" style="font-size:20px;"></i> Cart 
            <?php
            if(isset($_SESSION['cart'])){
                $count = count($_SESSION['cart']);
                echo '<span id="cart_count">'.$count.'</span>';
            }else{
                echo '<span id="cart_count">0</span>
                <input id="cart_count_input" value="0" hidden>';
            }
              ?>
        </a>
        <div id="searchContainer">
            <form class="form-inline" id="searchForm">
                <div class="form-group" id="searchFormInputs">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" placeholder="Search" name="search" id="search" class="searchInput">
                    <button class="btn btn-sm btnDone btnSearch" id="searchBtn" type="button">&#x1F50E;&#xFE0E;</button>
                </div>
            </form>
        </div>
</div>