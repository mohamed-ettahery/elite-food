<?php 
 $active='blog';
 include("includes/templates/header.php");
?>
<!--Start Breadcrumb -->
<div class="Breadcrumb-content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="blogs.php" class="active">Blogs</a></li>
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
                <?php 
                $preview = 2;
                $start = isset($_GET['page'])&&is_numeric($_GET['page'])&&intval($_GET['page'])>1?(intval($_GET['page']) - 1)*$preview:0;
                $blogs = get_From("*","blog","LIMIT $start,$preview");
                foreach($blogs as $blog)
                {
                    $id = $blog['id'];
                    $image = $blog['image'];
                    $title = $blog['title'];
                    $date = $blog['b_date'];
                    $countComments = getCount("comments","WHERE blog = $id");

                    ?>
                        <!--Start Card-->
                        <div class="card">
                            <img class="card-img-top" src="admin/img/blogs/<?php echo $image; ?>" alt="Card image cap">
                            <div class="card-body">
                            <h3 class="blog-title"><a href="blog.php?b_id=<?php echo $id; ?>"><?php echo $title; ?></a></h3>
                            <h6><span><?php echo $date; ?></span><span><a href="blog.php?b_id=<?php echo $id; ?>">| <?php echo $countComments; ?> Comments</a></span></h6>
                            </div>
                        </div>
                        <!--End card-->
                    <?php
                }
                ?>
                <!--Start Card-->
                <!-- <div class="card">
                    <img class="card-img-top" src="images/blog/blog_image01.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h3 class="blog-title"><a href="#">New Computer technologies helping childrens to learn faster with their studies</a></h3>
                    <h6><span>Jan 10, 2017</span><span><a href="#">| 10 Comments</a></span></h6>
                    </div>
                </div> -->
                <!--End card-->
                <!--Start Pagination -->
                <div class="box-pagination">
                    <ul class="pagination">
                        <?php
                            $count = getCount("blog");
                            $res = ceil($count/$preview);
                            $page = isset($_GET['page'])&&is_numeric($_GET['page'])&&intval($_GET['page'])<=$res?intval($_GET['page']):1;
                            if($res>1)
                            {
                                $idcat = isset($_GET['idcat'])&&is_numeric($_GET['idcat'])?intval($_GET['idcat']):"";
                                echo "<li><a href='?page=1'";
                                  if($page == 1)
                                  {
                                      echo "class='active'";
                                  }
                                 echo ">First</a><li>";
                                for($i=2;$i<$res;$i++)
                                {
                                    echo "<li><a href='?page=$i'";
                                        if($page == $i)
                                        {
                                            echo "class='active'";
                                        }
                                    echo ">$i</a><li>";
                                }
                                echo "<li><a href='?page=$res'";
                                    if($page == $res)
                                    {
                                        echo "class='active'";
                                    }
                                echo ">Last</a><li>";
                            }
                           ?>
                    </ul>
                </div>
                <!--End Pagination -->
            </div>
            </div>
            <div class="col-md-4">
                <div class="blog-aside">
                <!--Start Search-->
                <div class="search-section">
                 <form action="search.php" method="GET">
                    <input type="search" class="search-field"  placeholder="Search for blog  …"  name="blog" title="Search for:"/>
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