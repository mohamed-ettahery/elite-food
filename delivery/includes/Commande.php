
<?php 
require "includes/classes/livreure.php";
$CINS=$_SESSION['IDLivreure'];
$Livr=new livreure();
$ronws=$Livr->CommandeNonLivre($CINS);
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(isset($_GET['CommandValid'])){
    if(empty($_POST['Motif'])){
      $Livr->CommandeUpdateValid($CINS,$_POST['Numero']);
      echo '<script>window.open("Index.php?Commande","_self");</script>';
    }else{
      $Livr->CommandeUpdateNValid($CINS,$_POST['Numero'],$_POST['Motif']);
      echo '<script>window.open("Index.php?Commande","_self");</script>';
    }
    // echo $_POST['Motif'];
    // echo $_POST['Numero'];
    
  }
}
?>
<input type="hidden" name="CINLiv" value=<?php echo $CINS ?>>
	<div class="CommandeNonLivre">
		<div class="container-fluid">

	<div class="row">
    
		<div class="col-xl-12">
			     
      <div class="Table-Commande">
      	<?php
			     if(sizeof($ronws)>0)
                                              foreach($ronws as $key){
        
                                              	?>
        <table class="table table1">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Numero</th>
                                                    <th scope="col">Nom</th>
                                                    <th scope="col">Prenom</th>
                                                    <th scope="col">Adresse</th>
                                                    <th scope="col">Tele</th>
                                                    <th style="width: 16px;" scope="col">Motif</th>
                                                   
                                                  </tr>
                                                </thead>
                                                <tbody>
                                         
                                              	<form id="form2" method="post" action="Index.php?Commande&CommandValid">
                                              
                                              	
                                              	<?php
                                                  echo "<tr>";
                                                  echo "<td> " .$key['Numero'] ." </td>";
                                                  echo "<td> " .$key['Nom'] ." </td>";
                                                  echo "<td> " .$key['Prenom'] ." </td>";
                                                  echo "<td> " .$key['Adresse'] ." </td>";
                                                  echo "<td> " .$key['Tele'] ." </td>";
                                                  echo "<td><input  type='hidden' name='Motif'></input><textarea  class='form-control' style='    width: 233px;height: 73px;'></textarea>

 
                                                  </td>";

                                              
                                        echo "<td style='width: 138px;' class='BTNValid'>
                                        <input class='btn btn-danger' type='submit' value='No'/>
                                       
                                        <input class='btn btn-success' type='submit' value='Yes'/>";
                                    

                                                  echo "</td>";
                                                   echo "<input type='hidden' name='Numero' value=".$key['Numero'].">";
                                                   
                                                  echo "</tr>";
                                                 ?>
                                                 </form>
                                             </form>

                                              
                                              
                                                  
                                                </tbody>
                                                </table>
                                                  <?php }else{echo "<h1>No Orders</h1>";
  } ?>
      </div>

     
			


    <!-- Start table of commande Attend -->
    
    
      <!-- <input type="hidden" name="CINLiv" id="P7" > -->

    
    
   
		</div>
	</div>
	
</div>
	</div>
