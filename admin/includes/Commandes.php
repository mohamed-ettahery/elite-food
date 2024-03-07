<?php 
$SuppColm=0;
 $Com = new commande();
 $rows= $Com->GetAllCommande();

 $rows2 = $Com->GetCommandeNotLiv();
 $rows3 =$Com->GetCinLiv();
 if(isset($_GET['NumCommande'])){
  $var = $_GET['NumCommande'];
  $Com->SupprimerCommande($var);
 global $SuppColm;
 $SuppColm=1;
 
 }


 if(isset($_GET["CommandeAttend"])){
      if(isset($_POST['CinLiv']) && isset($_POST['NumeC'])){
  $CINLiv= $_POST['CinLiv'];
  $NumeC= $_POST['NumeC'];
  
  $Com->UpdateCommandLiv($NumeC,$CINLiv);
  ?>
  <div style="width: 500px;margin: 102px auto;">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-12">
                <div class='alert alert-success ' role='alert'>
                      Commande Bien Modifier! </br> redirection...
              </div>
              </div>
            </div>
          </div>
        </div>
  <?php
 
                  echo "<meta http-equiv='refresh' content='3 ; url=Index.php?Commandes&CommandeAttend'>";
  
   }else{

   
   ?>
   <div class="col-xl-12">
      <h3 class="h3 mb-0 text-gray-800"><i class="fas fa-hourglass-start"></i> Orders Attend</h3>
    </div>
    <div class="col-xl-12">
      <div class="Table-Commande">
        <table class="JJ table table1">
          <thead>
            <tr>
              <th>Number</th>
              <th>Order Date</th>
              <th>Dilevery</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
            <?php
                  foreach($rows2 as $key){
                    echo "<form method='post' action='Index.php?Commandes&CommandeAttend'>";
                      echo "<tr class='TT'>";
                      echo "<td style='width: 180px;'> " .$key['Numero'] ." </td>";
                      echo "<td> " .$key['DateCommande'] ." </td>";
                      echo "<input type='hidden' name='NumeC' value='".$key['Numero']."' >";
                      // echo "<input type='text' class='CINL' name='CINLiv' id='P7' >";
                      echo "<td style='width: 215px;'>"; 
                      echo "<select  class='form-control selectLL' name='CinLiv' >";
                       echo "<option value='none'>Selection</option>";
                        foreach($rows3 as $key){
                          echo " <option value='".$key["CIN"]."'>".$key["CIN"]."</option>";
                        };
                       

                      echo"</select>";
                      echo "<td>";

                     echo "<input class='btn btn-success' type='submit' name='CC' value='Update'>";


                                                  echo "</td>";

                      echo "</tr>";
                     echo " </form>";
                  }
                ?>
           

          </tbody>
        </table>
      </div>
      <a class="btn btn-primary" href="?Commandes"><i class="fas fa-angle-left"></i> retoure</a>
    </div>
   <?php }
 }else{
  

?>
<div class="container-fluid">
	<div class="row">
    <div class="col-xl-12">
      <h3 class="h3 mb-0 text-gray-800"><i class="fas fa-shopping-bag"></i> Orders</h3>
    </div>
    <?php if($SuppColm==1){
      ?>
      <div class="col-xl-12">
        <div class='alert alert-success ' role='alert'>
                      Commande Bien Supprimer! </br> redirection...
        </div>
      </div>
      <?php
      
                  echo "<meta http-equiv='refresh' content='2 ; url=Index.php?Commandes'>";
    } ?>
		<div class="col-xl-12">
      <div class="Table-Commande" >
        <table class="table table1">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Number</th>
                                                    <th scope="col">Client</th>
                                                    <th scope="col">Order Date</th>
                                                    <th scope="col">Dilevery</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Status</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                              <?php
                                              foreach($rows as $key){
                                                  echo "<tr>";
                                                  echo "<td> " .$key['Numero'] ." </td>";
                                                  echo "<td> " .$key['Client'] ." </td>";
                                                  echo "<td> " .$key['DateCommande'] ." </td>";
                                                  echo "<td> " .$key['livreure'] ." </td>";
                                                  echo "<td> " .$key['Totale'] ." </td>";
                                                  echo "<td style='color:white;position: relative;'>";
                                                  if($key['status']=='Paye'){
                                                      echo "<span style='padding: 4px; left: 30px;;border-radius: red;border-radius: 9px;background-color:#1cc88a'> "                                                                   .$key['status'] ." </span>";
                                                  }else if($key['status']=='Not Paye'){
                                                      echo "<span style='padding: 4px;left: 30px;; border-radius: red;border-radius: 9px;background-color:#f73535'> "                                                                   .$key['status'] ." </span>";
                                                  }else{
                                                       echo "<span style='padding: 4px;left: 30px;; border-radius: red;border-radius: 9px;background-color:orange'> "                                                                   .$key['status'] ." </span>";
                                                  }
                                        echo "<td><a href='Index.php?Commandes&NumCommande=".$key['Numero']."' class='btn btn-danger'><i class='fas fa-trash-alt'></i> Delete</a>";

                                                  echo "</td>";
                                                  echo "</tr>";
                                                 
                                              }
                                            ?>
                                              
                                                  
                                                </tbody>
                                                </table>
      </div>
      <a href="Index.php?Commandes&CommandeAttend" class="btn btn-primary"><i class="fas fa-hourglass-start"></i> Orders Attend</a>
			


    <!-- Start table of commande Attend -->
    
    
      <!-- <input type="hidden" name="CINLiv" id="P7" > -->

    
    
   
		</div>
	</div>
	
</div>
<?php } ?>


