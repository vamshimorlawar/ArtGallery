<?php 

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'artgallery');


$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$sql=mysqli_query($db,"SELECT  *  FROM  arts ");    
?>

<link rel="stylesheet" type="text/css" href="css/art.css">
 <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">

<div id="wrapper">

<div class="cart-icon-top">

</div>

<div class="cart-icon-bottom">
</div>

<div id="checkout">
  <a href="#"  class="checkout">CHECKOUT</a>  
</div>

<div id="sidebar">
    <a class="linkh" href="index.php">ARTIFY</a>
    <h3>CART</h3>
    <div id="cart">
        <span class="empty">No items in cart.</span>       
    </div>
    
    <h3>CATEGORIES</h3>
    <div class="checklist categories">
        <ul>
            <li><a href=""><span></span>Paintings</a></li>
            <li><a href=""><span></span>Masterpieces</a></li>
            <li><a href=""><span></span>Sculptures</a></li>
            <li><a href=""><span></span>Print Making</a></li>
            <li><a href=""><span></span>New Media</a></li>
            <li><a href=""><span></span>Jewelry</a></li>
            <li><a href=""><span></span>Collections</a></li>
            <li><a href=""><span></span>Bengal Art</a></li>
            <li><a href=""><span></span>Deal</a></li>
            <li><a href=""><span></span>Accessories</a></li>
        </ul>
    </div>
    
    <h3>COLORS</h3>
    <div class="checklist colors">
        <ul>
            <li><a href=""><span></span>Beige</a></li>
            <li><a href=""><span style="background:#222"></span>Black</a></li>
            <li><a href=""><span style="background:#6e8cd5"></span>Blue</a></li>
            <li><a href=""><span style="background:#f56060"></span>Brown</a></li>
            <li><a href=""><span style="background:#44c28d"></span>Green</a></li>
        </ul>
        
        <ul>
            <li><a href=""><span style="background:#999"></span>Grey</a></li>
            <li><a href=""><span style="background:#f79858"></span>Orange</a></li>
            <li><a href=""><span style="background:#b27ef8"></span>Purple</a></li>
            <li><a href=""><span style="background:#f56060"></span>Red</a></li>
            <li><a href=""><span style="background:#fff;border: 1px solid #e8e9eb;width:13px;height:13px;"></span>White</a></li>
        </ul>        
    </div>
    
     <h3>PRICE RANGE</h3>
     <img src="imgprice-range.png" alt="" />
</div>

<div id="grid-selector">
       <div id="grid-menu">
           View:
           <ul>                
               <li class="largeGrid"><a href=""></a></li>
               <li class="smallGrid"><a class="active" href=""></a></li>
           </ul>
       </div>
       
       Showing 1–9 of 48 results 
</div>

<div id="grid">

<?php while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){ ?>
    <div class="product">
        <div class="info-large">
            <h4><?php echo $row['alt']; ?></h4>
            <div class="sku">
                PAINTING ID: <strong>89256</strong>
            </div>
             
            <div class="price-big">
                <span>$99</span> $<?php echo $row['price']; ?>
            </div>
             
            
                                      
                         
        </div>
        <div class="make3D">
            <div class="product-front">
                <div class="shadow"></div>
                <img src="img/art/<?php echo $row['image'];?>" alt="" />
                <div class="image_overlay"></div>
                <div class="add_to_cart">Add to cart</div>               
                <div class="stats">         
                    <div class="stats-container">
                        <span class="product_price">$<?php echo $row['price']; ?></span>
                        <span class="product_name"><?php echo $row['alt']; ?></span>    
                                                                   
                        
                        <div class="product-options">
                       
                    </div>                       
                    </div>                         
                </div>
            </div>
        </div>  
    </div>
<?php }    ?>
</div>
</div>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/art.js"></script>
