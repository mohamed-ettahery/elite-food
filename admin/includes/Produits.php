<?php
$a =0;
$b=0;
$c=0;
$ExtentionValide=0;
$ExtentionValide2=0;
$Pro = new produit();
$rows= $Pro->getAllProduits();

$rows1=$Pro->getcategories();


// foreach ($rows1 as $key => $value) {
// // 	echo("<pre>");
// // print_r($rows1[0]);
// // echo("</pre>");
// 	echo $rows1[$key][1];
// }
if($_SERVER['REQUEST_METHOD']=="POST"){
	
	if(isset($_GET["AddProduits"]) && isset($_POST['Name']) && isset($_POST['Prix']) &&  isset($_POST['IDCategorie'])  && isset($_POST['description'])){
		
                $Nom=$_POST['Name'];
                $Prix=$_POST['Prix'];
                $IDCategorie=$_POST['IDCategorie'];
                $description=$_POST['description'];
                $Imagename = $_FILES['Image']['name'];
  				$ImageTmp = $_FILES['Image']['tmp_name'];
  				$arrayExtension = array("png","jpg","jpg");
  				$explo=explode('.', $Imagename);
  				$ImageExtension = strtolower(end($explo));
  				
               
                if(in_array($ImageExtension, $arrayExtension)){
                	$Image=rand(0,1000).'_'.$Imagename;
                    move_uploaded_file($ImageTmp, "img\products\\".$Image);#deplace un file vers une destination
                    
                    
			        $countcheck =$Pro->checkitem($Nom);
	                if($countcheck==0) {
	       
				        $Pro->ProduitProperties($Nom,$Prix,$IDCategorie,$Image,$description);
						$Pro->setProduit();
	                    global $b;
	                    $b=1;
			
		            }else{
						global $a;
						$a = 1;
               }
	             }elseif(empty($Imagename)){
                   $Image="foodefault.png";
                   $countcheck =$Pro->checkitem($Nom);
	                if($countcheck==0) {
	       
				        $Pro->ProduitProperties($Nom,$Prix,$IDCategorie,$Image,$description);
						$Pro->setProduit();
	                    global $b;
	                    $b=1;
			
		            }else{
						global $a;
						$a = 1;
                     }
	             }else{
                   $ExtentionValide=1;

                 }
	}elseif(isset($_GET["EditeProduits"]) && isset($_POST['id']) && isset($_POST['Name']) && isset($_POST['Prix']) &&  isset($_POST['IDCategorie'])  && isset($_POST['description']))
	{
		
		        $id=$_POST["id"];
			    $Nom=$_POST['Name'];
                $Prix=$_POST['Prix'];
                $IDCategorie=$_POST['IDCategorie'];
                $description=$_POST['description'];
                $Imagename = $_FILES['Image']['name'];
             
              
                $fileImg="img\products\\".$Imagename;
               
                if(file_exists($fileImg)){
                	$Pro->UpdatePro($id,$Nom,$Prix,$IDCategorie,$_POST['Image'],$description);
					global $c;
       			    $c=1;
       			    
                

                }else{
                    $ImageTmp = $_FILES['Image']['tmp_name'];
	  				$arrayExtension = array("png","jpg","jpg");
	  				$explo=explode('.', $Imagename);
	  				$ImageExtension = strtolower(end($explo));
  				     if(in_array($ImageExtension, $arrayExtension)){
                	$Image=rand(0,1000).'_'.$Imagename;
                    move_uploaded_file($ImageTmp, "img\products\\".$Image);#deplace un file vers une destination
                    $Pro->UpdatePro($id,$Nom,$Prix,$IDCategorie,$Image,$description);
                    global $c;
       			    $c=1;
       			    
			      
	             }else{

                	$ExtentionValide2=1;
                	 echo ('<script>window.open("?Produits&EditeProduits&ExtentionValide2=1&NumProduits='.$id.'","_self");</script>');
                	 echo $ExtentionValide2;
                  }
                }


	}
}
if(isset($_GET['AddProduits'])){ ?>
	<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-plus"></i> Add Dishes</h3>
		</div>
            <form class="Login" method="post" action="Index.php?Produits&AddProduits" enctype="multipart/form-data">
					<?php if($a==1){
						echo "<div class='alert alert-danger' role='alert'>
								  Ce Produit et deja existe!
							  </div>";
					}elseif($b==1){
						echo "<div class='alert alert-success ' role='alert'>
						          Produit Ajouter!
						      </div>";
					}elseif($ExtentionValide==1){
						echo "<div class='alert alert-danger' role='alert'>
								  Merci de saisir une image de extension PNG ou JPG ou JPEG!
							  </div>";
					} ?>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Name</label>
				    <input  type="text" name="Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Price</label>
				    <input  type="text" name="Prix" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Category</label>
                    <select name="IDCategorie" class="form-control">
                    	<option value="0">Categorie</option>
                    	<?php

                    	foreach ($rows1 as $key => $value) {
							
							echo "<option value=".$rows1[$key][0].">" . $rows1[$key][1] ."</option>";
						}
                    	?>
                    </select>
				   
				   
				  </div>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Image</label>
				    
						  <input type="file" style="display: block;" name="Image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
						 
					
				  </div>
				  <div class="mb-3">
				    <label for="exampleInputPassword1" class="form-label">Description</label>
				    <textarea  required name="description" value="descriptionn" class="form-control" id="exampleInputPassword1"></textarea> 
				  </div>
				  <a class="btn btn-primary" href="?Produits"><i class="fas fa-angle-left"></i> Return</a>
				  <input style="float: right;" type="submit"  class="btn btn-success" value="Add" name="mm">
				  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
			</form>

<?php }elseif(isset($_GET['EditeProduits'])){
if(isset($_GET['NumProduits'])){
	?>
	<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-edit"></i> Edit Dishes</h3>
		</div>
		<?php
            $rowsEdite=$Pro->getAllProduitsEdite($_GET['NumProduits']);
			// print_r($rowsEdite);
			foreach($rowsEdite as $key ){ ?>
            <form class="Login" method="post" action="Index.php?Produits&EditeProduits" enctype="multipart/form-data">
				<?php if(isset($_GET['ExtentionValide2'])){
					if($_GET['ExtentionValide2']==1){
						echo "<div class='alert alert-danger' role='alert'>
								  Merci de saisir une image de extension PNG ou JPG ou JPEG!
							  </div>";
					}
				}   ?>
					  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Name</label>
					    <input  type="text" name="Name" class="form-control" value="<?php echo ($key["Name"]); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" >
					   
				      </div>
				      <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Price</label>
					    <input  type="text" name="Prix" class="form-control" value="<?php echo ($key["Prix"]); ?>"  id="exampleInputEmail1" aria-describedby="emailHelp" >
				   
			  		  </div>
				  	  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Category</label>

	                    <select name="IDCategorie" value="<?php echo ($key["IDCategorie"]); ?>" class="form-control">
	                    	
	                    	<?php

	                    	foreach ($rows1 as $key1 => $value) {
								if($rows1[$key1][0]==$key["IDCategorie"]){
									
									echo "<option selected value=".$rows1[$key1][0].">" . $rows1[$key1][1] ."</option>";
								}else{
									echo "<option value=".$rows1[$key1][0].">" . $rows1[$key1][1] ."</option>";
								}
								
							}
	                    	?>
	                    </select>
				   
				      </div>
					  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Image</label>
					    <?php echo "<img id='ImageEdite' style='width: 94px; height: 94px; display: block;' src='img\products\\".$key["Image"]."' />"; ?>
							  <input type="file" id="FileEdite" style="display: none;" value="<?php echo ($key["Image"]); ?>" name="Image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							 
						
					  </div>
					  
					  <div class="mb-3">
					    <label for="exampleInputPassword1" class="form-label" >Description</label>
					    <input type="hidden" value="<?php echo ($key["description"]); ?>"  id="txt2">
					    <input type="hidden" name="id" value="<?php echo ($key["id"]); ?>">
					    <input type="hidden" name="Image" value="<?php echo ($key["Image"]); ?>">
					    <textarea name="description"  value="" class="form-control" id="txtDes"></textarea> 
					    <script>
					    	var txt1=document.getElementById("txtDes");
					    	var txt2=document.getElementById("txt2");
					    	txt1.textContent=txt2.value;
					    </script>
					    
					  </div>
					  <a class="btn btn-primary" href="?Produits"><i class="fas fa-angle-left"></i> Return</a>
					  <input style="float: right;"  type="submit"  class="btn btn-success" value="Edit" name="mm">
					  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
			</form>
	        <?php } }else{ ?>

	        	 <form class="Login" method="post" action="Index.php?Produits&EditeProduits">
				    <?php if($c==1){
						echo "<div class='alert alert-success ' role='alert'>
						          Produit Bien Modifier! </br> redirection...
						      </div>";
						      // echo " <script>
						      // 	window.setTimeout(window.open('?Categories','_self'), 900000000000000000000000000000000000000000);
						      // </script>";
						      echo "<meta http-equiv='refresh' content='3 ; url=Index.php?Produits'>";
					}  ?>
					
			</form>
	        <?php }
}elseif(isset($_GET['SNumProduits'])){
	$var = $_GET['SNumProduits'];
	$Pro->SupprimerProduit($var);

} else{ ?>
<div class="container-fluid">
	<div class="row" style="    margin-bottom: 3%;">
		<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-utensils"></i> Dishes</h3>
		</div>
		<div class="col-xl-12" style="    height: 450px;">

	      <div class="Table-Commande" style="height:90%; margin-bottom: 12px;">
	      	<?php
	      	 if(sizeof($rows)>0){
             ?>

	        <table class="table table1">
	        	<thead>
		                  <tr>
		                    <th scope="col">ID</th>
		                    <th scope="col">Name</th>
		                    <th scope="col">Price</th>
		                    <th scope="col">Category</th>
		                    <th scope="col">Image</th>
		              
		                  </tr>
		                </thead>
		                <tbody>
		              <?php
		              foreach($rows as $key){
		                  echo "<tr>";
		                  echo "<td> " .$key['id'] ." </td>";
		                  echo "<td> " .$key['Name'] ." </td>";
		                  echo "<td> " .$key['Prix'] ." </td>";
		                  echo "<td> " .$key[4] ." </td>";
		                  // echo "<td><img src='img\products\\'".$key['Image']".' /> </td>";
		                  echo "<td><img style='width: 98px; height: 88px; border: 1px solid;' class='Img-responsive ' src='img\products\\".$key["Image"]."' /></td>";
		                 
		                  

		        echo "<td style='width: 214px;'><a href='Index.php?Produits&SNumProduits=".$key['id']."' class='confirme btn btn-danger'><i class=' fas fa-trash-alt'></i> Delete</a> <a href='?Produits&EditeProduits&NumProduits=".$key['id']."' class='btn btn-success'><i class='far fa-edit'></i> Edit</a>";

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
		  <a href="Index.php?Produits&AddProduits" class="btn btn-primary"><i class="fa fa-plus"></i>Add New Dishes</a>
	    </div>
	</div>
   </div>
<?php } ?>