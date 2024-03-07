<!--Start Sidebar -->
<div class="sidebar">
    <!--Start Products Category -->
    <div class="panel">
        <div class="panel-header">
            <h5 class="panel-title">Categories</h5>
        </div>
        <div class="panel-body">
            <ul class="list-unstyled">
            <li <?php if(!isset($_GET['idcat'])){echo "class='active'";} ?>><a href="<?php echo $_SERVER['PHP_SELF']; ?>" >ALL</a><span class="products-count"><?php 
              $countPro = count(get_From("*","produit"));
              echo $countPro;
            ?> Dishes</span></li>
            <?php
             $cats = get_From("*","categorie");
             foreach($cats as $cat)
             {
                 $cat_id = $cat['ID'];
                 $cat_name = $cat['Nom'];
                 $countPro = count(get_From("*","produit","WHERE IDCategorie = $cat_id"));
                 ?>
                   <li <?php if(isset($_GET['idcat'])&&$_GET['idcat']==$cat_id){echo "class='active'";} ?>><a href="shop.php?idcat=<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a><span class="products-count"><?php echo $countPro; ?> Dishes</span></li>
                 <?php
             } 
            ?>
            </ul>
        </div>
    </div>
    <!--End Products Category -->
        <!--Start  Best Sale -->
        <?php
        $bestSalePro = get_From("*","produit","ORDER BY rand() ASC LIMIT 1");
        foreach($bestSalePro as $pro)
        {
            $p_id = $pro['id'];
            $p_name = $pro['Name'];
            $p_price = $pro['Prix'];
            $p_img = $pro['Image'];
            ?>
                <div class="panel panel-best-sale">
                    <div class="panel-header">
                        <h5 class="panel-title"> Best Sale</h5>
                    </div>
                    <div class="panel-body">
                    <p class="desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam sunt sit.
                    </p>
                    <div class="img-box">
                        <img src="admin/img/products/<?php echo $p_img; ?>" alt=""/>
                    </div>
                    <h6 class="product-title"><?php echo $p_name; ?></h6>
                    <span class="price">$<?php echo $p_price; ?></span><span class="add"><a href="details.php?pid=<?php echo $p_id; ?>">Add</a></span>
                    </div>
                </div>
            <?php
        }
        ?>
    <!-- <div class="panel panel-best-sale">
        <div class="panel-header">
            <h5 class="panel-title"> Best Sale</h5>
        </div>
        <div class="panel-body">
          <p class="desc">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam sunt sit.
          </p>
          <div class="img-box">
              <img src="Images/home/chef2.png" alt=""/>
          </div>
          <h6 class="product-title">Product Title Here</h6>
          <span class="price">20$</span><span class="add"><a href="#">Add</a></span>
        </div>
    </div> -->
    <!--End  Best Sale -->
</div>
<!--End Sidebar -->
