<div class="scroll-to-top">
    <i class="fa fa-arrow-up"></i>
</div>
<footer>
    <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4>ELITE FOOD</h4>
                    <p style="color:#505050;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo, aut fuga quam odit quos dolores mollitia in quaerat.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-map"></i> Maarif,Casablanca,Morocco</li>
                        <li><i class="fa fa-envelope"></i> elite-food@efood.com</li>
                    </ul>
                </div>
                <div class="col-md-3">
                <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="cart.php">Shopping Cart</a><li>
                        <li><a href="shop.php">Shop</a><li>
                        <li><a href="blog.php">Blog</a><li>
                        <li><a href="contact.php">Contact us</a><li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>Find Us</h4>
                    <ul class="list-unstyled">
                        <li><stron>ELITE FOOD Media inc.<li>
                        <li>Casablanca</li>
                        <li>Maarif</li>
                        <li><a href="tel:05782632732">0578-2632732</a></li>
                        <li><a href="mailto:m-store@dev.com">elite-food@efood.com</a></li>
                        <li><a href="contact.php">Check Our Contact Page</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>Get The News</h4>
                    <p style="color:#505050;">Don't miss our latest update Dishes</p>
                    <?php
                    if(isset($_POST['subscribe']))
                    {
                        $url = $_SERVER['PHP_SELF'];
                        $email = $_POST['email'];
                        if(!CheckElement("*","newsleter","WHERE email = '$email'"))
                        {
                            if(InsertElements("newsleter","email","'$email'"))
                            {
                               
                                echo "<script>alert('Thank you for your subscribe');</script>"; 
                                echo "<script>window.open('$url','_self');</script>";
                            }
                            else
                            {
                                echo "<script>alert('Error Insert');</script>";
                                echo "<script>window.open('$url','_self');</script>";
                            }
                        }
                        else
                        {
                            echo "<script>alert('You are already subscribe with us');</script>";
                            echo "<script>window.open('$url','_self');</script>";
                        }
                    } 
                    ?>
                    <form action="" method="post">
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required/>
                            <span class="input-group-btn">
                                <input type="submit" value="subscribe" name="subscribe" class="btn btn-light"/>
                            </span>
                        </div>
                    </form>
                    <h4>Keep in Touch</h4>
                    <ul class="list-unstyled social-media">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright text-center">
    <div class="container">
        <P>ELITE-FOOD copyright &copy; 2021</p>
    </div>
</div>
  <script src="layouts/js/jquery-3.6.0.min.js"></script>
  <script src="layouts/js/bootstrap.min.js"></script>
  <script src="layouts/js/popper.min.js"></script>
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script src="layouts/js/front.js"></script>
 </body>
</html>