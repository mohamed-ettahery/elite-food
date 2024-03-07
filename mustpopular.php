<?php 
 $active='mustpop';
 include("includes/templates/header.php");
?>
<!--Start Breadcrumb -->
<div class="Breadcrumb-content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="mustpopular.php" class="active">Must Popular</a></li>
            </ul>
        </div>
    </div>
</div>
<!--End Breadcrumb -->
<!-- Start Must Popular Page-->
<div class="must-popular">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include("includes/sidebar.php"); ?>
            </div>
            <div class="col-md-9">
                <div class="content">
                    <?php
                    $query = "SELECT produit.id,produit.Name,produit.Image,produit.Prix,produit.description,COUNT(detailcommande.ReferenceProduit) as 'count' FROM produit 
                    INNER JOIN detailcommande ON detailcommande.ReferenceProduit = produit.id
                    GROUP BY produit.id,produit.Name
                    ORDER BY count DESC LIMIT 5";
                    $stmt = $cnx->prepare($query);
                    $stmt->execute();
                    $products = $stmt->fetchAll();

                    foreach($products as $product)
                    {
                        $id = $product['id'];
                        $name = $product['Name'];
                        $price = $product['Prix'];
                        $image = $product['Image'];
                        $desc = $product['description'];
                        ?>

                            <div class="pop-product">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-box">
                                        <img src="admin/img/products/<?php echo $image; ?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc-info">
                                        <h3 class="title"><?php echo $name; ?></h3>
                                        <p class="prices"><span class="current-price">$<?php echo $price; ?></span><span class="old-price">$65.00</span></p>
                                        <p class="description">
                                           <?php echo $desc; ?>
                                        </p>
                                        <a href="details.php?pid=<?php echo $id;?>" class="add-btn">Add</a>
                                    </div>
                                </div>
                            
                            </div>
                            </div>

                        <?php
                    }
                     ?>
                        <!-- <div class="pop-product">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="img-box">
                                    <img src="Images/home/chef2.png" alt="" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="desc-info">
                                    <h3 class="title">Product Title Here</h3>
                                    <p class="prices"><span class="current-price">$40.00</span><span class="old-price">$65.00</span></p>
                                    <p class="description">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, id aliquid atque dignissimos architecto doloremque quis commodi dicta eos ducimus! Ex perferendis nemo ea repellat dicta! Voluptates distinctio nihil assumenda?
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur sapiente facilis eligendi quae vel aliquam voluptas accusantium.
                                    </p>
                                    <a href="#" class="add-btn">Add</a>
                                </div>
                            </div>
                        
                          </div>
                        </div>
                        <div class="pop-product">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="img-box">
                                    <img src="Images/home/chef2.png" alt="" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="desc-info">
                                    <h3 class="title">Product Title Here</h3>
                                    <p class="prices"><span class="current-price">$40.00</span><span class="old-price">$65.00</span></p>
                                    <p class="description">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, id aliquid atque dignissimos architecto doloremque quis commodi dicta eos ducimus! Ex perferendis nemo ea repellat dicta! Voluptates distinctio nihil assumenda?
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur sapiente facilis eligendi quae vel aliquam voluptas accusantium.
                                    </p>
                                    <a href="#" class="add-btn">Add</a>
                                </div>
                            </div>
                        
                          </div>
                        </div>
                        <div class="pop-product">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="img-box">
                                    <img src="Images/home/chef2.png" alt="" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="desc-info">
                                    <h3 class="title">Product Title Here</h3>
                                    <p class="prices"><span class="current-price">$40.00</span><span class="old-price">$65.00</span></p>
                                    <p class="description">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, id aliquid atque dignissimos architecto doloremque quis commodi dicta eos ducimus! Ex perferendis nemo ea repellat dicta! Voluptates distinctio nihil assumenda?
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur sapiente facilis eligendi quae vel aliquam voluptas accusantium.
                                    </p>
                                    <a href="#" class="add-btn">Add</a>
                                </div>
                            </div>
                        
                          </div>
                        </div>
                        <div class="pop-product">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="img-box">
                                    <img src="Images/home/chef2.png" alt="" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="desc-info">
                                    <h3 class="title">Product Title Here</h3>
                                    <p class="prices"><span class="current-price">$40.00</span><span class="old-price">$65.00</span></p>
                                    <p class="description">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, id aliquid atque dignissimos architecto doloremque quis commodi dicta eos ducimus! Ex perferendis nemo ea repellat dicta! Voluptates distinctio nihil assumenda?
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur sapiente facilis eligendi quae vel aliquam voluptas accusantium.
                                    </p>
                                    <a href="#" class="add-btn">Add</a>
                                </div>
                            </div>
                        
                          </div>
                        </div> -->
                    </div>
                    <!--Start Pagination -->
                    <!-- <div class="box-pagination">
                       <ul class="pagination">
                           <li><a href="#" class="active">First</a><li>
                           <li><a href="#">2</a><li>
                           <li><a href="#">3</a><li>
                           <li><a href="#">4</a><li>
                           <li><a href="#">Last</a><li>
                       </ul>
                    </div> -->
                    <!--End Pagination -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Must Popular-->

<!-- Start Include footer-->
<?php include("includes/templates/footer.php"); ?>
<!--End Include footer -->
