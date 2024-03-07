<?php


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


	}elseif(isset($_GET["AddCat"])){
                $NomCate=$_POST['Nom'];
		    	$descriptionCate=$_POST['description'];
		    	//verification de existe deja de categories par nom
		        $countcheck =$Cate->checkitem($NomCate);
		        $CateADD = new categorie($NomCate,$descriptionCate);
		        CateADD->Ajouter();
               
	}

}
if(isset($_GET['AddCat'])){ ?>
            <form class="Login" method="post" action="Index.php?Categories&AddCat">
					
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Nom Categorie</label>
				    <input  type="text" name="Nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  <div class="mb-3">
				    <label for="exampleInputPassword1" class="form-label">Description</label>
				    <textarea type="password" required name="description" class="form-control" id="exampleInputPassword1"></textarea> 
				  </div>
				  <a class="btn btn-primary" href="?Categories"><i class="fas fa-angle-left"></i> retoure</a>
				  <input style="float: right;" type="submit"  class="btn btn-success" value="Ajouter" name="mm">
				  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
			</form>

<?php }elseif(isset($_GET['EditeCate'])){

	        if(isset($_GET['NumCategorie'])){
            $rowsEdite=$Cate->getAllCategoriesEdite($_GET['NumCategorie']);
			print_r($rowsEdite);
			foreach($rowsEdite as $key ){ ?>
            <form class="Login" method="post" action="Index.php?Categories&EditeCate">
				
					  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Nom Categorie</label>
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
					  <a class="btn btn-primary" href="?Categories"><i class="fas fa-angle-left"></i> retoure</a>
					  <input style="float: right;"  type="submit"  class="btn btn-success" value="Modifier" name="mm">
					  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
			</form>
	        <?php } }else{ ?>

	        	 <form class="Login" method="post" action="Index.php?Categories&EditeCate">
				    <?php if($c==1){
						echo "<div class='alert alert-success ' role='alert'>
						          Categorie Bien Modifier! </br> redirection...
						      </div>";
						   
						    
					}  ?>
					
			</form>
	        <?php }

	         
            
 }
elseif(isset($_GET['SNumCategorie'])){
	     	$var = $_GET['SNumCategorie'];
		  	$Cate->SupprimerCategorie($var);

		
}else{
?>
 <div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">

	      <div class="Table-Commande">
	      	<?php
	      	 if(sizeof($rows)>0){
             ?>

	        <table class="table table1">
	        	<thead>
		                  <tr>
		                    <th scope="col">ID Categorie</th>
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
		                  

		        echo "<td style='width: 214px;'><a href='Index.php?Categories&SNumCategorie=".$key['ID']."' class='confirme btn btn-danger'><i class=' fas fa-trash-alt'></i> Delete</a> <a href='?Categories&EditeCate&NumCategorie=".$key['ID']."' class='btn btn-success'><i class='far fa-edit'></i> Edite</a>";

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
		  <a href="Index.php?Categories&AddCat" class="btn btn-primary"><i class="fa fa-plus"></i>Ajouter nouvelle Categories</a>
	    </div>
	</div>
   </div>
<?php } ?>