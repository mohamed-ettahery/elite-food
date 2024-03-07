<?php
// echo $_SERVER['REQUEST_METHOD'];
$a =0;
$b=0;
$c=0;
$Cate = new categorie();
$rows= $Cate->getAllCategories();
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_GET["EditeCate"]) && isset($_POST['Nom']) && isset($_POST['description']) && isset($_POST["ID"]))
	{
			    $NomCate=$_POST['Nom'];
       			$descriptionCate=$_POST['description'];
      			$ID=$_POST['ID'];
       			$Cate->UpdateCate($NomCate,$descriptionCate,$ID);
       			global $c;
       			$c=1;


	}elseif(isset($_GET["AddCat"]) && isset($_POST['Nom']) && isset($_POST['description']) ){
                $NomCate=$_POST['Nom'];
		    	$descriptionCate=$_POST['description'];
		    	//verification de existe deja de categories par nom
		        $countcheck =$Cate->checkitem($NomCate);
                if($countcheck==0) {
       
			        $Cate->categorieProperties($NomCate,$descriptionCate);
					$Cate->setCategorie();
                    global $b;
                    $b=1;
		
	            }else{
					global $a;
					$a = 1;
					
	            }
	}

}
if(isset($_GET['AddCat'])){ ?>
	<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-plus"></i> Add Categories</h3>
		</div>
            <form class="Login" method="post" action="Index.php?Categories&AddCat">
					<?php if($a==1){
						echo "<div class='alert alert-danger' role='alert'>
								  Ce Categorie et deja existe!
							  </div>";
					}elseif($b==1){
						echo "<div class='alert alert-success ' role='alert'>
						          Categorie Ajouter!
						      </div>";
					} ?>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Category Name</label>
				    <input  type="text" name="Nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  <div class="mb-3">
				    <label for="exampleInputPassword1" class="form-label">Description</label>
				    <textarea type="password" required name="description" class="form-control" id="exampleInputPassword1"></textarea> 
				  </div>
				  <a class="btn btn-primary" href="?Categories"><i class="fas fa-angle-left"></i> Return</a>
				  <input style="float: right;" type="submit"  class="btn btn-success" value="Add" name="mm">
				  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
			</form>

<?php }elseif(isset($_GET['EditeCate'])){
	?>
<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="far fa-edit"></i> Edit Category</h3>
		</div>
		<?php
	        if(isset($_GET['NumCategorie'])){
            $rowsEdite=$Cate->getAllCategoriesEdite($_GET['NumCategorie']);
		
			foreach($rowsEdite as $key ){ ?>
            <form class="Login" method="post" action="Index.php?Categories&EditeCate">
				
					  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Category Name</label>
					    <input type="text" name="Nom" value="<?php echo($key[1]) ; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
					    
					  </div>
					  <div class="mb-3">
					    <label for="exampleInputPassword1" class="form-label" >Description</label>
					    <input type="hidden" value="<?php echo ($key["description"]); ?>"  id="txt2">
					    <input type="hidden" name="ID" value="<?php echo ($key["ID"]); ?>">
					    <textarea name="description"  value="" class="form-control" id="txtDes"></textarea> 
					    <script>
					    	var txt1=document.getElementById("txtDes");
					    	var txt2=document.getElementById("txt2");
					    	txt1.textContent=txt2.value;
					    </script>
					    
					  </div>
					  <a class="btn btn-primary" href="?Categories"><i class="fas fa-angle-left"></i> Return</a>
					  <input style="float: right;"  type="submit"  class="btn btn-success" value="Edit" name="mm">
					  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
			</form>
	        <?php } }else{ ?>

	        	 <form class="Login" method="post" action="Index.php?Categories&EditeCate">
				    <?php if($c==1){
						echo "<div class='alert alert-success ' role='alert'>
						          Categorie Bien Modifier! </br> redirection...
						      </div>";
						      // echo " <script>
						      // 	window.setTimeout(window.open('?Categories','_self'), 900000000000000000000000000000000000000000);
						      // </script>";
						      echo "<meta http-equiv='refresh' content='3 ; url=Index.php?Categories'>";
					}  ?>
					
			</form>
	        <?php }

	         
            
 }
elseif(isset($_GET['SNumCategorie'])){
	     	$var = $_GET['SNumCategorie'];
		  	$Cate->SupprimerCategorie($var);

		
}else{
?>
<!-- Table par defaut de categories -->
 <div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-cubes"></i> Categories</h3>
		</div>
		<div class="col-xl-12">

	      <div class="Table-Commande">
	      	<?php
	      	 if(sizeof($rows)>0){
             ?>

	        <table class="table table1">
	        	<thead>
		                  <tr>
		                    <th scope="col">ID Category</th>
		                    <th scope="col">Name</th>
		                    <th scope="col">Description</th>
		              
		                  </tr>
		                </thead>
		                <tbody>
		              <?php
		              foreach($rows as $key){
		                  echo "<tr>";
		                  echo "<td> " .$key['ID'] ." </td>";
		                  echo "<td> " .$key['Nom'] ." </td>";
		                  echo "<td style='width:33%'><textarea class='form-control'> " .$key['description'] ."</textarea> </td>";
		                  

		        echo "<td style='width: 214px;'><a href='Index.php?Categories&SNumCategorie=".$key['ID']."' class='confirme btn btn-danger'><i class=' fas fa-trash-alt'></i> Delete</a> <a href='?Categories&EditeCate&NumCategorie=".$key['ID']."' class='btn btn-success'><i class='far fa-edit'></i> Edit</a>";

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
		  <a href="Index.php?Categories&AddCat" class="btn btn-primary"><i class="fa fa-plus"></i>Add New Category</a>
	    </div>
	</div>
   </div>
<?php } ?>