<?php 
 $active='cart';
 include("includes/templates/header.php");

//  $query = "SELECT * FROM produit WHERE id = 3";
//  $stmt = $cnx->prepare($query);
//  $stmt->execute();
//  $pro_info = $stmt->fetch();

//  $pro_name = $pro_info['Name'];

//  echo "<script>alert('$pro_name');</script>";
?>
<!--Start Breadcrumb -->
<div class="Breadcrumb-content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="cart.php" class="active">Cart</a></li>
            </ul>
        </div>
    </div>
</div>
<!--End Breadcrumb -->

<?php
if(isset($_POST['delete']))
{
    $idp_delete = $_POST['delete'];
    $query = "DELETE FROM cart WHERE p_id = $idp_delete";
    $stmt = $cnx->prepare($query);
    $stmt -> execute();
    echo "<script>window.open('cart.php','_self');</script>";
} 
?>

<!-- Start Cart Page -->
<div class="cart-content">
 <div class="container">
 <div class="row">
        <div class="col-md-9">
            <div class="main-content">
                <h2 class="title">Shoping Cart</h2>
                <p>You currently have a <?php $ip = getIP(); echo getCount("cart","WHERE ip_addr = '$ip'"); ?> item(s) in your cart.</p>
                <?php
                 $count = getCount("cart","WHERE ip_addr = '$ip'");
                 if($count>0)
                 { 
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <!--Start Table Items-->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>SUb-Total</th>
                                <th>Delete</th>
                            </thead>
                            <?php
                             $query = "SELECT * FROM cart WHERE ip_addr = '$ip'";
                             $stmt = $cnx->prepare($query);
                             $stmt->execute();
                             $rows = $stmt->fetchAll();
                             $grand_Total = 0;
                             foreach($rows as $row)
                             {
                                 $p_id = $row['p_id'];
                                 $qty = $row['qty'];

                                 $query = "SELECT produit.*,categorie.Nom as 'catName' FROM produit INNER JOIN categorie ON categorie.id = produit.IDCategorie WHERE produit.id = $p_id";
                                 $stmt = $cnx->prepare($query);
                                 $stmt->execute();
                                 $produit = $stmt->fetch();

                                 $p_name = $produit['Name'];
                                 $p_img = $produit['Image'];
                                 $pcat_name = $produit['catName'];
                                 $p_price = $produit['Prix'];
                                 $sub_total = $p_price * $qty;
                                 $grand_Total += $sub_total;
                                 ?>
                                    <tbody>
                                        <td class="no-pad-td"><img src="admin/img/products/<?php echo $p_img; ?>"/><a href="#" class="pro-name"><?php echo $p_name; ?></a></td>
                                        <td><?php echo $pcat_name; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td>$<?php echo $p_price; ?></td>
                                        <td>$<?php echo $sub_total; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-danger btn-delete" name="delete" value="<?php echo $p_id; ?>"><i class="fa fa-close"></i></button>
                                        </td>   
                                    </tbody>
                                 <?php
                             }
                             ?>
                            <!-- <tbody>
                                <td class="no-pad-td"><img src="Images/home/chef2.png"/><a href="#" class="pro-name">Product Name</a></td>
                                <td>Humbergers</td>
                                <td>1</td>
                                <td>$100</td>
                                <td>$200</td>
                                <td>
                                    <button type="submit" class="btn btn-danger btn-delete" name="delete" value="1"><i class="fa fa-close"></i></button>
                                </td>   
                            </tbody> -->
                            <tr>
                                <td colspan="5"><strong>Total</strong></td>
                                <td colspan="2"><strong>$<?php echo $grand_Total; ?></strong></td>
                            </tr>
                        </table>
                    </div>
                    <!--End Table Items-->
                    <div class="btns-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="shop.php" class="btn btn-light"><i class="fa fa-chevron-left"></i> Continue Shopping</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="confirm_addr_order.php" class="btn btn-danger">Proceed Checkout <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                 }
                 else
                 {
                     echo "<p class='cart-empty'>Your Cart is Empty !</p>";
                 } 
                ?>
                <div class="products-maybe-like">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="maybe-box-title">
                                <h4>Dishes you maybe Like</h4>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <?php
                                        $query = "SELECT * FROM produit ORDER BY rand() LIMIT 3";
                                        $stmt = $cnx->prepare($query);
                                        $stmt->execute();
                                        $products = $stmt->fetchAll();
                                        foreach($products as $product)
                                        {
                                            $p_id = $product['id'];
                                            $p_name = $product['Name'];
                                            $p_img = $product['Image'];
                                            $p_price = $product['Prix'];

                                            ?>
                                                <div class="col-md-4">
                                                    <div class="box">
                                                        <div class="img-box">
                                                        <img src="admin/img/products/<?php echo $p_img; ?>" alt="<?php echo $p_name; ?>"/>
                                                        </div>
                                                        <h6 class="product-title"><?php echo $p_name; ?></h6>
                                                        <span class="price">$<?php echo $p_price; ?></span><span class="add"><a href="details.php?pid=<?php echo $p_id; ?>">Add</a></span>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                ?>
                                <!-- <div class="col-md-4">
                                    <div class="box">
                                        <div class="img-box">
                                        <img src="Images/home/chef2.png" alt=""/>
                                        </div>
                                        <h6 class="product-title">Product Title Here</h6>
                                        <span class="price">20$</span><span class="add"><a href="#">Add</a></span>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        //  $count = getCount("cart","WHERE ip_addr = '$ip'");
            if($count>0)
            { 
        ?>
        <div class="col-md-3">
            <div class="order-summary">
                <h3>Order Summary</h3>
                <p>Shipping and additional costs are calculated based on value you have entered</p>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Order Sub-Total</td>
                            <td><strong>$<?php echo $grand_Total; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Shipping and Handling</td>
                            <td><strong>$<?php $sAndH = 10; echo $sAndH; ?></strong></td>
                        </tr>
                        <tr>
                            <td>TAX</td>
                            <td><strong>$0</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>$<?php echo $grand_Total+$sAndH; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
            } 
        ?>
    </div>
 </div>
</div>
<!-- End Cart Page -->

<!-- Start Include footer-->
<?php include("includes/templates/footer.php"); ?>
<!--End Include footer -->
