<?php
$ActiveC=-1;
$DesactiveC=-1;
$Comment = new comment();
$rows= $Comment->getAllComments();
if(isset($_GET["DeleteComment"])){
      if(isset($_GET["NumComment"])){
      	$Comment->SupprimerComment($_GET["NumComment"]);
        ?>
        <div style="width: 500px;margin: 102px auto;">
        	<div class="container-fluid">
          	<div class="row">
          		<div class="col-xl-12">
          			<div class='alert alert-success ' role='alert'>
						          Comment Bien Supprimer! </br> redirection...
			        </div>
          		</div>
          	</div>
          </div>
        </div>
          <?php
       
    
      	                   
						      echo "<meta http-equiv='refresh' content='3 ; url=Index.php?Comment'>"; 
      	
      }
   }
else{


	if(isset($_GET["ActiveComment"])){
   	if(isset($_GET["NumComment"])){
   		if($Comment->ActiveComment($_GET["NumComment"])>0){
           $ActiveC=1;
   		}else{
   			$ActiveC=0;
   		}
   		
   	}
   }elseif(isset($_GET["DesactiveComment"])){
   	if(isset($_GET["NumComment"])){
   		if($Comment->DesactiveComment($_GET["NumComment"])>0){
           $DesactiveC=1;
   		}else{
   			$DesactiveC=0;
   		}
   		
   	}
   }
?>
<div class="CommandeNonLivre">
		<div class="container-fluid">

	<div class="row">
		
    <div class="col-xl-12">
		<?php if($ActiveC==1){
			echo "<div class='alert alert-success ' role='alert'>
						          Comment Bien Active 
						      </div>";
			echo "<meta http-equiv='refresh' content='2 ; url=Index.php?Comment'>";
		}elseif($ActiveC==0){
			echo "<div class='alert alert-danger ' role='alert'>
						          Non Active
						      </div>";
		}elseif($DesactiveC==1){
            echo "<div class='alert alert-success ' role='alert'>
						          Comment Bien Desactive 
						      </div>";
			echo "<meta http-equiv='refresh' content='2 ; url=Index.php?Comment'>";
		}elseif($DesactiveC==0){
            echo "<div class='alert alert-danger ' role='alert'>
						          Non Desactive 
						      </div>";
		}  ?>
	</div>
	<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="far fa-comments"></i> Comments</h3>
		</div>
		<div class="col-xl-12">
			     
     
	      <div class="Table-Commande">
	      	<?php
	      	 if(sizeof($rows)>0){
             ?>

	        <table class="table table1">
	        	<thead>
		                  <tr>
		                    <th scope="col">id </th>
		                    <th scope="col">Date </th>
		                    <th scope="col">Client </th>
		                    <th scope="col">Blog </th>
		                    <th scope="col">Comment </th>
		              
		                  </tr>
		                </thead>
		                <tbody>
		              <?php
		              foreach($rows as $key){
		                  echo "<tr>";
		                  echo "<td> " .$key['id'] ." </td>";
		                  echo "<td> " .$key['c_date'] ." </td>";
		                  echo "<td> " .$key['c_user'] ." </td>";
		                  echo "<td> " .$key['blog'] ." </td>";
		                  echo "<td style='    width: 26%;'> <textarea class='form-control'>" .$key['comment'] ."</textarea>  </td>";
		               
                          if($key['c_status']==0){
                          	echo "<td style='width: 214px;'>
                          	      <a title='Delete' href='Index.php?Comment&DeleteComment&NumComment=".$key['id']."' class='confirme btn btn-danger'><i class=' fas fa-trash-alt'></i></a> 
                          	      
                          	      <a title='Active' href='?Comment&ActiveComment&NumComment=".$key['id']."' class='btn btn-primary'><i class='far fa-check-circle'></i></a>

                          	 
                          	      ";
                          }else{
                          	echo "<td style='width: 214px;'>
                          	      <a title='Delete' href='Index.php?Comment&DeleteComment&NumComment=".$key['id']."' class='confirme btn btn-danger'><i class=' fas fa-trash-alt'></i></a> 

                          	     <a title='Desactive' href='?Comment&DesactiveComment&NumComment=".$key['id']."' class='btn btn-warning'><i class='fas fa-ban'></i></a>
                          	      
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

     
			


    <!-- Start table of commande Attend -->
    
    
      <!-- <input type="hidden" name="CINLiv" id="P7" > -->

    
    
   
		</div>
	</div>
	
</div>
	</div>
	<?php } ?>