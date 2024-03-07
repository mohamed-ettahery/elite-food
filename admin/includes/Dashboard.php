<?php
//  include 'connection.php';
$C1 = new connection();
$stm = $C1->connect()->prepare('select count(*) from Commande where LivreurValide is not null');
$stm->execute();
$donnees1 = $stm->fetch();
$stm = $C1->connect()->prepare('select count(*)from Commande');
$stm->execute();
$donnees2 = $stm->fetch();
//echo $donnees1[0]."ddddd".$donnees2[0];
if(!empty($donnees1[0]))
{
    $V1=($donnees1[0]*360)/$donnees2[0];
}
else
{
    $V1 = 0;
}

$stm = $C1->connect()->prepare('CALL `F2`()');
$stm->execute();
$rows=$stm ->fetchAll();

$stm = $C1->connect()->prepare('SELECT count(*) from commande ');
$stm->execute();
$Donne1 = $stm->fetch();


$stm = $C1->connect()->prepare('SELECT count(*) from commande where LivreurValide is not null');
$stm->execute();
$donne2 = $stm->fetch();
$CommandeV =$donne2[0];

$stm = $C1->connect()->prepare('SELECT count(*) from commande where LivreureRetour is not null ');
$stm->execute();
$donne3 = $stm->fetch();
$CommandeNV =$donne3[0];

$stm = $C1->connect()->prepare('SELECT count(*) from commande where CINLivreure is not null and  LivreureRetour is  null and LivreurValide is  null or CINLivreure is null ');
$stm->execute();
$donne4 = $stm->fetch();
$CommandeA =$donne4[0];
?>  
<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row DClient">

                        <!-- Client -->
                       
                        <div class="col-xl-3 col-md-6 mb-4 ">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                             <a href="?Clients">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Clients</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $stm = $C1->connect()->prepare('select * from                                                     client');
                                                $stm->execute();
                                                $NBClient = $stm->rowCount();
                                                echo $NBClient;
                                            ?>
                                            </div>
                                             </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   

                        <!-- Commandes-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="?Commandes">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                $stm = $C1->connect()->prepare('select * from                                                     commande');
                                                $stm->execute();
                                                $NBCommande = $stm->rowCount();
                                                echo $NBCommande;
                                            ?></div>
                                        </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comment -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="?Comment">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Comments
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
                                                $stm = $C1->connect()->prepare('select * from                                                     comments');
                                                $stm->execute();
                                                $NBcategorie = $stm->rowCount();
                                                echo $NBcategorie;
                                            ?></div>
                                                </div>
                                               
                                            </div>
                                        </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Produits -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="?Produits">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Dishes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                $stm = $C1->connect()->prepare('select * from                                                     produit');
                                                $stm->execute();
                                                $NBproduit = $stm->rowCount();
                                                echo $NBproduit;
                                            ?></div>
                                        </a>
                                        </div>
                                        <div class="col-auto">
                                            
                                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Last Orders</h6>
                                   
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" style="padding: 8px;">
                                    <div class="chart-area">
                                        <div  class="Table-Commande" style="padding: 0px;">
                                        <table class="table ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Number</th>
                                                <th scope="col">Orders Date</th>
                                                <th scope="col">CIN Client</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                              foreach($rows as $key){
                                                  echo "<tr>";
                                                  echo "<td> " .$key['Numero'] ." </td>";
                                                  echo "<td style='    width: 149px;'> " .$key['DateCommande'] ." </td>";
                                                  echo "<td style='width: 179px;'> " .$key['CinClient'] ." </td>";
                                                  echo "<td style='position: relative;'>";
                                                  if($key['status']=='Paye'){
                                                      echo "<span style='background-color:#1cc88a'> "                                                                   .$key['status'] ." </span>";
                                                  }else if($key['status']=='Not Paye'){
                                                      echo "<span style='background-color:#f73535'> "                                                                   .$key['status'] ." </span>";
                                                  }else{
                                                       echo "<span style='background-color:orange'> "                                                                   .$key['status'] ." </span>";
                                                  }
                                                  echo "</td>";
                                                  echo "</tr>";
                                                 
                                              }
                                            ?>
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Orders Stats</h6>
                                    <div class="dropdown no-arrow">
                                        
                                    </div>
                                </div>
                                <!-- Card Body -->
                              <div style="margin-top: 0px;" class="card-body states">
                                    
                                
            
                
                    <div class="chart-pie pt-4 pb-2">
                <!-- 
                <div class="progress blue">
                  <span class="progress-left">
                      <span id="Valide1"
                            class="Valide progress-bar">
                      </span>
                  </span>
                  <span class="progress-right">
                     <span 
                           id="Valide2"
                           class="Valide progress-bar">
                     </span>           
                  </span>                       
                  <Label ID="Label4" runat="server" class="progress-value"></Label>
            </div> -->
        <!--     
            <div  class="courb">
                <div id="CourbeV"></div>
                <div id="CourbeNV"></div>
                <div id="CourbeA"></div>
            </div> -->
            <p style="display:none;" id="CommandeV"><?php echo $CommandeV ?></p>
            <p style="display:none;" id="CommandeNV"><?php echo $CommandeNV ?></p>
            <p style="display:none;" id="CommandeA"><?php echo $CommandeA ?></p>
            <div class="Stats">
                                <div id="piechart_3d" style="width: 900px; height: 500px;"></div>

            </div>
            </div>
                      
                                    
                                    <div class="mt-4 text-center small">
                                        
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Completed
                                             <!-- <?php echo round(($CommandeV*100)/$Donne1[0],1)  ."%" ?> -->
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Refunded
                                            <!-- <?php echo round(($CommandeNV*100)/$Donne1[0],1) ."%" ?> -->

                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Attend
                                            <!-- <?php echo round(($CommandeA*100)/$Donne1[0],1) ."%" ?> -->
                                        </span>
                                    </div>
                                      
       
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                           
  
                            

                        </div>

                        
                    </div>

                </div>
