<?php


$ActiveC=-1;
$DesactiveC=-1;
$Client = new client();
$rows= $Client->getAllClients();
// $rowsClient =$Client->getAllClientsP($_GET["CINClient"]);
// print "<pre>";
// print_r($rowsClient);
// print "</pre>";
// foreach ($rowsClient as $key => $value) {
// // 	print "<pre>";
// // print_r($rowsClient[$key]);
// // print "</pre>";

// 	echo $key['CIN'][$value];
// }
// // echo $rowsClient[0][0];
?>
<?php
   if (isset($_GET["Stats"])) {
   	if(isset($_GET["CINClient"])){
   		$countCValide =$Client->CommandeValide($_GET["CINClient"]);
   		

   		$countCNonValide =$Client->CommandeNonValide($_GET["CINClient"]);
   		

        $countsCommandes =$Client->CountCommandeCliet($_GET["CINClient"]);
        
        $countAttendCommande =$Client->CountAttendCommande($_GET["CINClient"]);
   	
          if($countsCommandes>0){
          	$V1=($countCValide*360)/$countsCommandes;
          	$VN2=($countCNonValide*360)/$countsCommandes;
          	$VA1=($countAttendCommande*360)/$countsCommandes;

          }

   		
       ?>
<div class="statesClient">      
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-poll"></i> Stats</h3>
		</div>
		<div class="col-xl-4 col-lg-4">
    <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Orders Completed</h6>
            <div class="dropdown no-arrow">
                
            </div>
        </div>
                                <!-- Card Body -->
        <div class="card-body states">
        	
        		
        			<div class="chart-pie pt-4 pb-2">
	            <p style="display:none;" id="P1"><?php echo $V1 ?></p>
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
            </div>
            </div>
                               
        </div>
    </div>
</div>
		<div class="col-xl-4 col-lg-4">
    <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Orders Attend</h6>
            <div class="dropdown no-arrow">
                
            </div>
        </div>
                                <!-- Card Body -->
        <div class="card-body states">
        	
        		
        			<div class="chart-pie pt-4 pb-2">
	            <p style="display:none;" id="PA1"><?php echo $VA1 ?></p>
	            <div class="progress blue">
		          <span class="progress-left">
		              <span id="ValideA1"
		                    class="Attend progress-bar">
		              </span>
		          </span>
		          <span class="progress-right">
		             <span 
		                   id="ValideA2"
		                   class="Attend progress-bar">
		             </span>           
		          </span>                       
                  <Label ID="LabelA4" runat="server" class="progress-value"></Label>
            </div>
            </div>
                               
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-4">
    <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Orders Returned</h6>
            <div class="dropdown no-arrow">
                
            </div>
        </div>
                                <!-- Card Body -->
        <div class="card-body states">
        	
        		
        			<div class="chart-pie pt-4 pb-2">
	            <p style="display:none;" id="P2"><?php echo $VN2 ?></p>
	            <div class="progress blue">
		          <span class="progress-left">
		              <span id="ValideN1"
		                    class="NonValide progress-bar">
		              </span>
		          </span>
		          <span class="progress-right">
		             <span 
		                   id="ValideN2"
		                   class="NonValide progress-bar">
		             </span>           
		          </span>                       
                  <Label ID="LabelN4" runat="server" class="progress-value"></Label>
            </div>
            </div>
        	            
        </div>
    </div>
</div>
	</div>
</div>       
</div> 
<a style="margin-left: 23px;" class="btn btn-primary" href="?Clients"><i class="fas fa-angle-left"></i> Return</a>
       <?php
   	}
   }elseif(isset($_GET["VoirClient"])){
   	 if(isset($_GET["CINClient"])){
   	 	$rowsClient =$Client->getAllClientsP($_GET["CINClient"]);
   	 	?>
   	 	<div class="DonneClient">
   	 		<div class="container-fluid">
   	 			<?php foreach ($rowsClient as $key) {
   	 							
   	 						?>
   	 			<div class="row">
   	 				<div class="col-xl-4 col-sm-12">
   	 					<div style="     margin-left: 38px;   position: relative;width: 252px;height: 308px;overflow: hidden;">
   	 					 <?php echo "<img style='position: absolute;width: 100%;height: 100%;'class='rounded float-start' alt='...' src='..\Images\uploads\profiles\\".$key[11]."'>"; ?>
                        
                           
   	 					</div>
   	 				</div>
   	 				<div class="col-xl-8 col-sm-12">
   	 					<div class="donneText">
   	 						
   	 					<div class="ContenuP"  style="background-color:#e9eaee">
   	 					<div class="Contenu">
   	 						<label>CIN:</label>
   	 						<label> <?php echo $key[0]; ?> </label>
   	 					</div>
   	 					<div class="Contenu">
   	 						<label>Last Name:</label>
   	 						<label> <?php echo $key[1];?> </label>
   	 					</div>
   	 					</div>

   	 					<div class="ContenuP">
   	 					<div class="Contenu">
   	 						<label>First Name:</label>
   	 						<label> <?php echo $key[2]; ?> </label>
   	 					</div>
   	 					<div class="Contenu">
   	 						<label>Address:</label>
   	 						<label> <?php echo$key[3]; ?> </label>
   	 					</div>
   	 				    </div>

   	 				    <div class="ContenuP"  style="background-color:#e9eaee">
   	 					<div class="Contenu">
   	 						<label>Phone:</label>
   	 						<label> <?php echo$key[4]; ?> </label>
   	 					</div>
   	 					<div class="Contenu">
   	 						<label>Genre:</label>
   	 						<label> <?php echo$key[5]; ?> </label>
   	 					</div>
   	 				    </div>

   	 				    <div class="ContenuP" >
   	 					<div class="Contenu">
   	 						<label>City:</label>
   	 						<label> <?php echo$key[6]; ?> </label>
   	 					</div>
   	 					<div class="Contenu">
   	 						<label>Email:</label>
   	 						<label><?php echo$key[7]; ?> </label>
   	 					</div>
   	 				    </div>
   	 				    <div class="ContenuP"  style="background-color:#e9eaee">
   	 					<div class="Contenu">
   	 						<label>Birthday:</label>
   	 						<label> <?php echo$key[8]; ?> </label>
   	 					</div>
   	 					
   	 				    </div>
   	 					</div>
   	 				
   	 				</div>
   	 			</div>
   	 			<?php } ?>
   	 		</div>
   	 	</div>
   	 <?php }
   	 //Suppression de Client
   }elseif(isset($_GET["DeleteClient"])){
      if(isset($_GET["CINClient"])){
      	$Client->SupprimerClient($_GET["CINClient"]);
        ?>
        <div style="width: 500px;margin: 102px auto;">
        	<div class="container-fluid">
          	<div class="row">
          		<div class="col-xl-12">
          			<div class='alert alert-success ' role='alert'>
						          Client Bien Supprimer! </br> redirection...
			        </div>
          		</div>
          	</div>
          </div>
        </div>
          <?php
       
    
      	                   
						      echo "<meta http-equiv='refresh' content='3 ; url=Index.php?Clients'>"; 
      	
      }
      //table par defaut
   }else{
    if(isset($_GET["ActiveClient"])){
   	if(isset($_GET["CINClient"])){
   		if($Client->ActiveClient($_GET["CINClient"])>0){
           $ActiveC=1;
   		}else{
   			$ActiveC=0;
   		}
   		
   	}
   }elseif(isset($_GET["DesactiveClient"])){
   	if(isset($_GET["CINClient"])){
   		if($Client->DesactiveClient($_GET["CINClient"])>0){
           $DesactiveC=1;
   		}else{
   			$DesactiveC=0;
   		}
   		
   	}
   }
   
 ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-user"></i> Clients</h3>
		</div>
		<div class="col-xl-12">
		<?php if($ActiveC==1){
			echo "<div class='alert alert-success ' role='alert'>
						          Client Bien Active 
						      </div>";
			echo "<meta http-equiv='refresh' content='2 ; url=Index.php?Clients'>";
		}elseif($ActiveC==0){
			echo "<div class='alert alert-danger ' role='alert'>
						          Non Active
						      </div>";
		}elseif($DesactiveC==1){
            echo "<div class='alert alert-success ' role='alert'>
						          Client Bien Desactive 
						      </div>";
			echo "<meta http-equiv='refresh' content='2 ; url=Index.php?Clients'>";
		}elseif($DesactiveC==0){
            echo "<div class='alert alert-danger ' role='alert'>
						          Non Desactive 
						      </div>";
		} ?>
	</div>
		<div class="col-xl-12">

	      <div class="Table-Commande">
	      	<?php
	      	 if(sizeof($rows)>0){
             ?>

	        <table class="table table1">
	        	<thead>
		                  <tr>
		              
		                    <th scope="col">CIN </th>
		                    <th scope="col">Last Name </th>
		                    <th scope="col">First Name </th>
		                    <th scope="col">Address </th>
		                    <th scope="col">Genre </th>
		                    <th scope="col">City </th>
		                    <th scope="col">Email</th>
		                  </tr>
		                </thead>
		                <tbody>
		              <?php
		              foreach($rows as $key){
		                  echo "<tr>";
		                   
		                  echo "<td> " .$key['CIN'] ." </td>";
		                  echo "<td> " .$key['Nom'] ." </td>";
		                  echo "<td> " .$key['Prenom'] ." </td>";
		                  echo "<td> " .$key['Adresse'] ." </td>";
		                  echo "<td> " .$key['Sex'] ." </td>";
		                  echo "<td> " .$key['Ville'] ." </td>";
		                  echo "<td> " .$key['Email'] ." </td>";
                          if($key['Active']==0){
                          	echo "<td style='width: 214px;'>
                          	      <a title='Delete' href='Index.php?Clients&DeleteClient&CINClient=".$key['CIN']."' class='confirme btn btn-danger'><i class=' fas fa-trash-alt'></i></a> 
                          	      
                          	      <a title='Active' href='?Clients&ActiveClient&CINClient=".$key['CIN']."' class='btn btn-primary'><i class='far fa-check-circle'></i></a>

                          	      <a title='Voir' href='?Clients&VoirClient&CINClient=".$key['CIN']."' class='btn btn-success'><i class='far fa-eye'></i></a>
                          	      ";
                          }else{
                          	echo "<td style='width: 214px;'>
                          	      <a title='Delete' href='Index.php?Clients&DeleteClient&CINClient=".$key['CIN']."' class='confirme btn btn-danger'><i class=' fas fa-trash-alt'></i></a>

                          	      <a title='Desactive' href='?Clients&DesactiveClient&CINClient=".$key['CIN']."' class='btn btn-warning'><i class='fas fa-ban'></i></a>

                          	      <a title='State' href='?Clients&Stats&CINClient=".$key['CIN']."' class='btn btn-info'><i class='fas fa-poll'></i></a>

                          	      <a title='Voir' href='?Clients&VoirClient&CINClient=".$key['CIN']."' class='btn btn-success'><i class='far fa-eye'></i></a>
                          	      
                          	      ";
                          }
		                  
		                  
		                 
		                  

		       

		                  echo "</td>";
		                  echo "</tr>";
		                 
		              }
		            ?>
		              
		                  
		                </tbody>
	        </table>
	         <?php }else{
	         	echo "<h1>Existe pas</h1>";
	         }?>
		  </div>
		  
	    </div>
	</div>
   </div>
   <?php } ?>