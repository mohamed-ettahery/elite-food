<?php 
 $active='blog';
 include("includes/templates/header.php");
 $bid = isset($_GET['b_id']) && is_numeric($_GET['b_id'])?intval($_GET['b_id']):0;
 $count =  getCount("blog","WHERE id = $bid");
 if($count < 1)
 {
    //  header('location: index.php');
    echo "<script>window.open('blogs.php','_self');</script>";
    exit();
 }
 else
 {
     $query = "SELECT * FROM blog WHERE id = $bid";
     $stmt = $cnx->prepare($query);
     $stmt->execute();
     $blog = $stmt->fetch();
     $image = $blog['image'];
     $title = $blog['title'];
     $desc = $blog['description'];
     $date = $blog['b_date'];
     $countComments = getCount("comments","WHERE blog = $bid");
 }

 if(isset($_POST['add_comment']))
 {
     $comment = $_POST['comment'];
     $user = $_SESSION['userCIN'];

     if(InsertElements("comments","comment,c_user,blog","'$comment','$user',$bid"))
     {
        // echo "<script>alert('your comment added successfuly')</script>";
        echo "<script>window.open('blog.php?b_id=$bid','_self');</script>";
     }
     else
     {
         echo "<script>alert('Failed add comment')</script>";
         echo "<script>window.open('blog.php?b_id=$bid','_self');</script>";
     }
 }
?>
<!--Start Breadcrumb -->
<div class="Breadcrumb-content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="blogs.php">Blogs</a></li>
                <li><a href="blog.php" class="active">Blog</a></li>
            </ul>
        </div>
    </div>
</div>
<!--End Breadcrumb -->

<!-- Start Blogs Page -->
<div class="blogs-content">
 <div class="container">
    <div class="row">
            <div class="col-md-8">
            <div class="main-content">
                <!--Start Card-->
                <div class="card">
                    <img class="card-img-top" src="admin/img/blogs/<?php echo $image; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="blog-title"><a href="#"><?php echo $title; ?></a></h3>
                        <p class="para-desc">
                          <?php echo $desc; ?>
                        </p>
                        <h6><span><?php echo $date; ?></span><span><a href="#">| <?php echo $countComments; ?> Comments</a></span></h6>
                    </div>
                </div>
                <!-- <div class="card">
                    <img class="card-img-top" src="images/blog/blog_image01.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="blog-title"><a href="#">New Computer technologies helping childrens to learn faster with their studies</a></h3>
                        <p class="para-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, amet. Praesentium, dolorem possimus nulla dignissimos ratione in nostrum sit quisquam cum omnis ipsum excepturi fugiat officia vel animi tempore ab.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi dolor obcaecati voluptates earum repellendus accusamus, autem quisquam, consequatur blanditiis, sint maiores? Fugiat tenetur unde ad, possimus modi assumenda ipsam delectus.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae laborum, eos eaque unde sed suscipit consequatur voluptatum ipsam autem illum. Quod dicta, esse earum repellendus quae optio exercitationem reiciendis nulla.
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, quidem quisquam voluptas minima ea nihil suscipit tenetur nulla, ad eaque dignissimos nemo, rerum obcaecati? Animi perspiciatis magni quasi cumque soluta.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni aut minus, repellendus non mollitia, consectetur dicta est molestiae corporis vitae reiciendis labore veritatis tempore officia quis vero, laudantium facere quos?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quae libero doloribus eius. Doloribus aliquid suscipit aliquam eum amet rerum perferendis doloremque deleniti ratione, quod saepe quibusdam soluta fugiat asperiores.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eveniet totam provident expedita, consequuntur est obcaecati! Placeat enim explicabo cupiditate, voluptatibus labore, expedita vel nulla officia molestiae dolorem tempora perspiciatis?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. In, provident doloribus illo saepe eum cumque inventore quos officia, recusandae voluptates unde, dolore laborum explicabo eligendi nisi nobis incidunt cupiditate ducimus.
                        </p>
                        <h6><span>Jan 10, 2017</span><span><a href="#">| 10 Comments</a></span></h6>
                    </div>
                </div> -->
                <!--End card-->
                <!-- Start Comments Section-->
                <div class="comments-container">
                    <?php 
                     $comments = get_From("*","comments","WHERE blog = $bid AND c_status = 1");
                     $count = count($comments);
                     if($count<1)
                     {
                         echo "<p class='empty-comments'>No Comments To Show.</p>";
                     }
                     else
                     {
                         foreach($comments as $comment)
                         {
                             $cmnt = $comment['comment'];
                             $date = $comment['c_date'];
                             $cin_user = $comment['c_user'];

                             $query = "SELECT * FROM client WHERE CIN = '$cin_user'";
                             $stmt = $cnx->prepare($query);
                             $stmt->execute();
                             $user = $stmt->fetch();

                             $image = $user['Image'];
                             $username = $user['Prenom']." ".$user['Nom'];
                             ?>
                                <!-- Start Comment -->
                                <div class="row">
                                    <div class="col-3">
                                        <div class="img-box">
                                        <img src="Images/uploads/profiles/<?php echo $image; ?>"/>
                                        <h6 class="username"><?php echo $username; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="comment_box">
                                            <p class="comment"><?php echo $cmnt; ?></p>
                                            <p class="date"><?php echo $date; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Comment -->
                             <?php

                         }
                     }
                    ?>
                    <!-- Start Comment -->
                    <!-- <div class="row">
                        <div class="col-3">
                            <div class="img-box">
                               <img src="Images/uploads/profiles/default.png"/>
                               <h6 class="username">Mohamed Ettahery</h6>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="comment_box">
                                <p class="comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quam error ad iusto porro consequuntur maxime ipsa, aliquam placeat debitis, quaerat suscipit ducimus laborum! Atque ipsum voluptate animi itaque ea.</p>
                                <p class="date">02/05/2021</p>
                            </div>
                        </div>
                    </div> -->
                    <!-- End Comment -->
                    <!-- Start Add new Comment -->
                    <div class="add-comment-box">
                        <?php
                        if(!isset($_SESSION['user']))
                        {
                          echo "<p class='login-to-add-comment'><a href='login.php'>Sign in</a> or <a <a href='login.php?action=signup'>Sign up</a> To add new comment.</p>";
                        }
                        else
                        {
                        ?>
                        <form action="blog.php?b_id=<?php echo $bid; ?>" method="POST">
                            <textarea class="form-control comment-box" name="comment" placeholder="add new comment"></textarea>
                            <input type="submit" class="btn btn-danger btn-add-comment" name="add_comment" value="Add Comment"/>
                        </form>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- End Add new Comment -->
                </div>
                <!-- End Comments Section-->
            </div>
            </div>
            <div class="col-md-4">
                <div class="blog-aside">
                <!--Start Search-->
                <div class="search-section">
                 <form action="search.php" method="GET">
                    <input type="search" class="search-field"  placeholder="Search for blog  …" name="blog" title="Search for:"/>
                    <button class="btn-search"><i class="fa fa-search search-icon"></i></button>
                 </form>
                </div>
                <!--End Search-->
                <!--Start Popular Tags-->
                <div class="popular-tags">
                <h3>Popular Tags</h3>
                <ul class="list-unstyled">
                    <li><a href="search.php?term=Pizza">#<span>Pizza</span></a></li>
                    <li><a href="search.php?term=Pizza italie">#<span>Pizza italie</span></a></li>
                    <li><a href="search.php?term=Humberger">#<span>Humberger</span></a></li>
                    <li><a href="search.php?term=King Burger">#<span>King Burger</span></a></li>
                    <li><a href="search.php?term=Salade">#<span>Salade</span></a></li>
                    <li><a href="search.php?term=Fast food">#<span>Fast food</span></a></li>
                </ul>
                </div>
                <!--End Pobular Tags-->
                <!-- Start RECENT POST-->
                <div class="recent-post">
                <h3>Recent Post</h3>
                <ul class="list-unstyled">
                    <?php 
                     $blogs = get_From("*","blog","ORDER BY b_date DESC LIMIT 4");
                     foreach($blogs as $blog)
                     {
                         $id    = $blog['id'];
                         $image = $blog['image'];
                         $title = $blog['title'];
                         $date  = $blog['b_date'];
                         ?>
                            <li>
                                <a href="blog.php?b_id=<?php echo $id; ?>">
                                    <img src="admin/img/blogs/<?php echo $image; ?>"/>
                                    <h5><?php echo $title; ?></h5>
                                    <p><?php echo $date ?></p>
                                </a>
                            </li>
                         <?php
                     }
                    ?>
                    <!-- <li>
                    <a href="#">
                        <img src="images/blog/blog_image01.jpg"/>
                        <h5>Software giants merging for the future</h5>
                        <p>Jan 10, 2017</p>
                    </a>
                    </li> -->
                </ul>
                </div>
                <!-- End RECENT POST-->
                <!--Start Gallery instagram-->
                <div class="gallery-insta">
                <h3>Gallery Instagram</h3>
                <ul class=" list-unstyled gallery">
                    <li><a href="#"><img src="images/blog/blog_image01.jpg"/></a></li>
                    <li><a href="#"><img src="images/blog/blog_image02.jpg"/></a></li>
                    <li><a href="#"><img src="images/blog/blog_image03.jpg"/></a></li>
                    <li><a href="#"><img src="images/blog/blog_image04.jpg"/></a></li>
                    <li><a href="#"><img src="images/blog/blog_image05.jpg"/></a></li>
                    <li><a href="#"><img src="images/blog/blog_image06.jpg"/></a></li>
                    <li><a href="#"><img src="images/blog/blog_image07.jpg"/></a></li>
                    <li><a href="#"><img src="images/blog/blog_image08.jpg"/></a></li>
                    <li><a href="#"><img src="images/blog/blog_image09.jpg"/></a></li>
                </ul>
                </div>
                <!--End Gallery instagram-->
                <!--Start Social Bio-->
                <div class="social-bio">
                <h3>Social Bio</h3>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                </div>
                <!--End Social Bio-->
                <!--Start Recent Tweet-->
                <div class="recent-tweet">
                <h3>Recent Tweet</h3>
                <ul class="list-unstyled">
                    <li>
                    <i class="fa fa-twitter"></i>
                    <p>#lorem ipsum dolor sit amet,consectetur adipiscing elit<span class="tweet-link"><a href="#">http://bly/shotlinks.com</a></span></p>
                    <span class="tweet-date">MARCH 23, 2017</span>
                    </li>
                    <li>
                    <i class="fa fa-twitter"></i>
                    <p>#lorem ipsum dolor sit amet,consectetur adipiscing elit<span class="tweet-link"><a href="#">http://bly/shotlinks.com</a></span></p>
                    <span class="tweet-date">MARCH 23, 2017</span>
                    </li>
                    <li>
                    <i class="fa fa-twitter"></i>
                    <p>#lorem ipsum dolor sit amet,consectetur adipiscing elit<span class="tweet-link"><a href="#">http://bly/shotlinks.com</a></span></p>
                    <span class="tweet-date">MARCH 23, 2017</span>
                    </li>
                    <li>
                    <i class="fa fa-twitter"></i>
                    <p>#lorem ipsum dolor sit amet,consectetur adipiscing elit<span class="tweet-link"><a href="#">http://bly/shotlinks.com</a></span></p>
                    <span class="tweet-date">MARCH 23, 2017</span>
                    </li>
                </ul>
                </div>
                <!--End Recent Tweet-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart Page -->

<!-- Start Include footer-->
<?php include("includes/templates/footer.php"); ?>
<!--End Include footer -->
