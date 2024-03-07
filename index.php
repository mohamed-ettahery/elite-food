<?php 
 $active='home';
 include("includes/templates/header.php");
// $numLett = array("One","Two","Three","Four","Five","Six","Seven","Eight");
//  for($i=0;$i<8;$i++)
//  {
//      $l = $numLett[$i];
//      $p = $i+1;
//      $query = "INSERT INTO produit(Name,Prix,IDCategorie,Image,description) VALUES('Salade sal$l','120',3,'s$p.jpg','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi provident delectus fugiat, corporis nemo vel asperiores pariatur assumenda nulla, adipisci quaerat libero, repellat temporibus consequuntur autem harum dolorem sapiente impedit. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi provident delectus fugiat, corporis nemo vel asperiores pariatur assumenda nulla, adipisci quaerat libero, repellat temporibus consequuntur autem harum dolorem sapiente impedit.')";
//      $stmt = $cnx->prepare($query);
//      if($stmt->execute())
//      {
//          echo "yes";
//      }
//  }

?>
<!--Start Front Section -->
<div class="front-section">
    <div class="row">
        <div class="col-4">
            <img src="Images/home/chef2.png" alt=""/>
        </div>
        <div class="col-8">
            <div class="description">
                <img src="Images/home/3zGJz.gif"/>
                <h6>BEST PRICES</h6>
                <h2>NEW DISHES</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores veritatis quam sed odit labore fuga itaque inventore ipsam tempore quo voluptas animi culpa cum, veniam atque, iste, eaque quod ducimus?</p>
                <a href="about.php" class="btn btn-danger">Read more</a>
            </div>
        </div>
    </div>
</div>
<!--End Front Section -->

<!--Start Presentation Boxes Section -->
<div class="presentation-boxes">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <i class="fa fa-truck"></i>
                    <h6>Free Delevery Worldwide</h6>
                    <p>In Anytime & Anyplace</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <i class="fa fa-map"></i>
                    <h6>Support 24/7</h6>
                    <p>Contact us 24 hours a day</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <i class="fa fa-check"></i>
                    <!-- <i class="far fa-hand-peace"></i> -->
                    <h6>100% secure Food</h6>
                    <p>Your Order are safe with us</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Presentation Boxes Section -->

<!--Start Best Products Section-->
<div class="best-products">
    <div class="chose-list">
        <ul class="list-unstyled">
            <li class="active" data-target="best-seller">Humbergers</li>
            <li data-target="most-view">Pizza</li>
            <li data-target="new-arrivals">Salade</li>
        </ul>
    </div>
    <div class="container">
        <div class="best-seller boss-box">
            <div class="row">
            <?php
             $query = "SELECT * FROM produit WHERE IDCategorie = 29 LIMIT 8";
             get_Eight_Products_List($query);
            ?>
            <!--
                <div class="col-md-3">
                    <div class="product-box">
                        <span class="reduction">
                            -10%
                        </span>
                        <div class="img-box">
                            <img src="Images/products/hamburger.jpg" alt=""/>
                        </div>
                        <div class="description">
                            <h6 class="product-title">Meta Sleviess Dress</h6>
                            <ul class="list-unstyled list-stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <p class="prices"><span class="new-price">$40.00</span><span class="old-price">$65.00</span></p>
                            <a href="#" class="btn btn-danger">View details</a>
                        </div>
                    </div>
                </div>
            -->
            </div>
        </div>


        <div class="most-view boss-box">
            <div class="row">
            <?php
             $query = "SELECT * FROM produit WHERE IDCategorie = 30 LIMIT 8";
             get_Eight_Products_List($query);
            ?>
                <!-- <div class="col-md-3">
                    <div class="product-box">
                        <span class="reduction">
                            -10%
                        </span>
                        <div class="img-box">
                            <img src="Images/products/pizza/p1.jpg" alt=""/>
                        </div>
                        <div class="description">
                            <h6 class="product-title">Meta Sleviess Dress</h6>
                            <ul class="list-unstyled list-stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <p class="prices"><span class="new-price">$40.00</span><span class="old-price">$65.00</span></p>
                            <a href="#" class="btn btn-danger">View details</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="new-arrivals boss-box">
            <div class="row">
            <?php
             $query = "SELECT * FROM produit WHERE IDCategorie = 31 LIMIT 8";
             get_Eight_Products_List($query);
            ?>
                <!-- <div class="col-md-3">
                    <div class="product-box">
                        <span class="reduction">
                            -10%
                        </span>
                        <div class="img-box">
                            <img src="Images/products/salade/s1.jpg" alt=""/>
                        </div>
                        <div class="description">
                            <h6 class="product-title">Meta Sleviess Dress</h6>
                            <ul class="list-unstyled list-stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <p class="prices"><span class="new-price">$40.00</span><span class="old-price">$65.00</span></p>
                            <a href="#" class="btn btn-danger">View details</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!--End Best Products Section-->

<!--Start Partnership-->
<div class="partnership text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="box">
                    <img src="Images/partnership/burgerKing.png" alt=""/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box">
                    <img src="Images/partnership/mcdonalds.png" alt=""/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box">
                    <img src="Images/partnership/kfc.png" alt=""/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box">
                    <img src="Images/partnership/pizzahut.png" alt=""/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box">
                    <img src="Images/partnership/burgerKing.png" alt=""/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box">
                    <img src="Images/partnership/los-pollos.png" alt=""/>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Partnership-->

<!--Start Our Blog -->
<div class="from-blog">
    <h2 class="text-center">From Our Blogs</h2>
    <div class="container-fluid">
        <div class="row">
            <?php
             $blogs = get_From("*","blog","ORDER BY rand() LIMIT 3");
            //  $count = count($blogs);
            //  echo "<script>alert('$count');</script>"; 
            //  echo "<script>window.open('index.php','_self');</script>";
            foreach($blogs as $blog)
            {
                $bid = $blog['id'];
                $image = $blog['image'];
                $title = $blog['title'];
                $date = $blog['b_date'];
                $desc = $blog['description'];
                ?>
                <div class="col-md-4">
                    <div class="blog-box">
                        <div class="box-img">
                            <img src="admin/img/blogs/<?php echo $image; ?>" alt=""/>
                        </div>
                        <div class="box-description">
                            <p class="date"><?php echo $date; ?></p>
                            <h5 class="title"><?php echo $title; ?></h5>
                            <p class="desc"><?php echo $desc; ?></p>
                            <a href="blog.php?b_id=<?php echo $bid; ?>" class="btn btn-dark">Read more!</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <!-- <div class="col-md-4">
                <div class="blog-box">
                    <div class="box-img">
                        <img src="Images/home/back3.jpg" alt=""/>
                    </div>
                    <div class="box-description">
                        <p class="date">03/05/2021</p>
                        <h5 class="title">Hot Summer Need Beutiful Sick Band</h5>
                        <p class="desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae doloremque, at consectetur, unde, eaque expedita distinctio maiores facilis deleniti veniam labore. Fugit eos, illo dolores fugiat quas suscipit sit ea!</p>
                        <a href="#" class="btn btn-dark">Read more!</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!--End Our Blog -->

<!-- Start Include footer-->
<?php include("includes/templates/footer.php"); ?>
<!--End Include footer -->
