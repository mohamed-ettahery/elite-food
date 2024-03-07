<?php
$a =0;
$b=0;
$c=0;
$ExtentionValide=0;
$ExtentionValide2=0;
$Pro = new produit();
$blog = new blog();
$rows= $blog->getAllBlog();

$rows1=$Pro->getcategories();


// foreach ($rows1 as $key => $value) {
// // 	echo("<pre>");
// // print_r($rows1[0]);
// // echo("</pre>");
// 	echo $rows1[$key][1];
// }
if($_SERVER['REQUEST_METHOD']=="POST"){
	
	if(isset($_GET["AddBlog"]) && isset($_POST['title']) && isset($_POST['author']) &&  isset($_POST['b_date'])  && isset($_POST['description'])){
		
                $title=$_POST['title'];
                $author=$_POST['author'];
                $b_date=$_POST['b_date'];
                $description=$_POST['description'];
                $Imagename = $_FILES['Image']['name'];
  				$ImageTmp = $_FILES['Image']['tmp_name'];
  				$arrayExtension = array("png","jpg","jpg");
  				$explo=explode('.', $Imagename);
  				$ImageExtension = strtolower(end($explo));
  				
               
                if(in_array($ImageExtension, $arrayExtension)){
                	$Image=rand(0,1000).'_'.$Imagename;
                    move_uploaded_file($ImageTmp, "img\blogs\\".$Image);#deplace un file vers une destination
                    
                    
			    
	              
	   
				        $blog->blogProperties($Image,$title,$author,$b_date,$description);
						$blog->setblog();
	                    global $b;
	                    $b=1;
			
		            
	             }elseif(empty($Imagename)){
                   $Image="BlogDefault.png";
                  
	               
	       
				        $blog->blogProperties($Image,$title,$author,$b_date,$description);
						$blog->setblog();
	                    global $b;
	                    $b=1;
			
		            
	             }else{
                   $ExtentionValide=1;

                 }
	}elseif(isset($_GET["EditeBlog"]) && isset($_POST['id']) && isset($_POST['title']) && isset($_POST['author']) &&  isset($_POST['b_date'])   && isset($_POST['description']))
	{
		
		        $id=$_POST["id"];
			    $title=$_POST['title'];
                $author=$_POST['author'];
                $b_date=$_POST['b_date'];
                $description=$_POST['description'];
                $Imagename = $_FILES['Image']['name'];
             
              
                $fileImg="img\blogs\\".$Imagename;
               
                if(file_exists($fileImg)){
                
                	$blog->UpdateBlog($id,$title,$author,$b_date,$_POST['Image'],$description);
					global $c;
       			    $c=1;
       			    
                

                }else{
                	
                    $ImageTmp = $_FILES['Image']['tmp_name'];
	  				$arrayExtension = array("png","jpg","jpg");
	  				$explo=explode('.', $Imagename);
	  				$ImageExtension = strtolower(end($explo));
  				     if(in_array($ImageExtension, $arrayExtension)){
                	$Image=rand(0,1000).'_'.$Imagename;

                    move_uploaded_file($ImageTmp, "img\blogs\\".$Image);#deplace un file vers une destination
                    $blog->UpdateBlog($id,$title,$author,$b_date,$Image,$description);
                    global $c;
       			    $c=1;
       			    
			      
	             }else{

                	$ExtentionValide2=1;
                	 echo ('<script>window.open("?Blog&EditeBlog&ExtentionValide2=1&NumBlog='.$id.'","_self");</script>');
                	 echo $ExtentionValide2;
                  }
                }


	}
}
if(isset($_GET['AddBlog'])){ ?>
	<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-plus"></i> ADD Blog</h3>
		</div>
            <form class="Login" method="post" action="Index.php?Blog&AddBlog" enctype="multipart/form-data">
					<?php if($b==1){
						echo "<div class='alert alert-success ' role='alert'>
						          Blog Bien Ajouter!
						      </div>";
					}elseif($ExtentionValide==1){
						echo "<div class='alert alert-danger' role='alert'>
								  Merci de saisir une image de extension PNG ou JPG ou JPEG!
							  </div>";
					} ?>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Title Blog</label>
				    <input  type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Author</label>
				    <input  type="text" name="author" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Date</label>
				    <input  type="date" name="b_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				 
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Image Blog</label>
				    
						  <input type="file" style="display: block;" name="Image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
						 
					
				  </div>
				  <div class="mb-3">
				    <label for="exampleInputPassword1" class="form-label">Description</label>
				    <textarea  required name="description" value="descriptionn" class="form-control" id="exampleInputPassword1"></textarea> 
				  </div>
				  <a class="btn btn-primary" href="?Blog"><i class="fas fa-angle-left"></i> Return</a>
				  <input style="float: right;" type="submit"  class="btn btn-success" value="Add" name="mm">
				  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
			</form>

<?php }elseif(isset($_GET['EditeBlog'])){
if(isset($_GET['NumBlog'])){
	?>
<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="far fa-edit"></i>  Blog</h3>
		</div>
		<?php
            $rowsEdite=$blog->getAllBlogsEdite($_GET['NumBlog']);
			// print_r($rowsEdite);
			foreach($rowsEdite as $key ){ ?>
            <form class="Login" method="post" action="Index.php?Blog&EditeBlog" enctype="multipart/form-data">
				<?php if(isset($_GET['ExtentionValide2'])){
					if($_GET['ExtentionValide2']==1){
						echo "<div class='alert alert-danger' role='alert'>
								  Merci de saisir une image de extension PNG ou JPG ou JPEG!
							  </div>";
					}
				}   ?>
					  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">title</label>
					    <input  type="text" name="title" class="form-control" value="<?php echo ($key["title"]); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" >
					   
				      </div>
				      <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">author</label>
					    <input  type="text" name="author" class="form-control" value="<?php echo ($key["author"]); ?>"  id="exampleInputEmail1" aria-describedby="emailHelp" >
				   
			  		  </div>
			  		  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Date</label>
					    <input  type="text" name="b_date" class="form-control" value="<?php echo ($key["b_date"]); ?>"  id="exampleInputEmail1" aria-describedby="emailHelp" >
				   
			  		  </div>
				  	  
					  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Image Blog</label>
					    <?php echo "<img id='ImageEdite' style='width: 94px; height: 94px; display: block;' src='img\blogs\\".$key["image"]."' />"; ?>
							  <input type="file" id="FileEdite" style="display: none;" value="<?php echo ($key["image"]); ?>" name="Image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							 
						
					  </div>
					  
					  <div class="mb-3">
					    <label for="exampleInputPassword1" class="form-label" >Description</label>
					    <input type="hidden" value="<?php echo ($key["description"]); ?>"  id="txt2">
					    <input type="hidden" name="id" value="<?php echo ($key["id"]); ?>">
					    <input type="hidden" name="Image" value="<?php echo ($key["image"]); ?>">
					    <textarea name="description"  value="" class="form-control" id="txtDes"></textarea> 
					    <script>
					    	var txt1=document.getElementById("txtDes");
					    	var txt2=document.getElementById("txt2");
					    	txt1.textContent=txt2.value;
					    </script>
					    
					  </div>
					  <a class="btn btn-primary" href="?Blog"><i class="fas fa-angle-left"></i> Return</a>
					  <input style="float: right;"  type="submit"  class="btn btn-success" value="Edit" name="mm">
					  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
			</form>
	        <?php } }else{ ?>

	        	 <form class="Login" method="post" action="Index.php?Blog&EditeBlog">
				    <?php if($c==1){
						echo "<div class='alert alert-success ' role='alert'>
						          Blog Bien Modifier! </br> redirection...
						      </div>";
						      // echo " <script>
						      // 	window.setTimeout(window.open('?Categories','_self'), 900000000000000000000000000000000000000000);
						      // </script>";
						      echo "<meta http-equiv='refresh' content='3 ; url=Index.php?Blog'>";
					}  ?>
					
			</form>
	        <?php }
}elseif(isset($_GET['SNumBlog'])){
	$var = $_GET['SNumBlog'];
	$blog->SupprimerBlog($var);

} else{ ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="far fa-newspaper"></i> Blog</h3>
		</div>
		<div class="col-xl-12">

	      <div class="Table-Commande">
	      	<?php
	      	 if(sizeof($rows)>0){
             ?>

	        <table class="table table1">
	        	<thead>
		                  <tr>
		                    <th scope="col">ID Blog</th>
		                    <th scope="col">Title</th>
		                    <th scope="col">Author</th>
		                    <th scope="col">Image</th>
		              
		                  </tr>
		                </thead>
		                <tbody>
		              <?php
		              foreach($rows as $key){
		                  echo "<tr>";
		                  echo "<td> " .$key['id'] ." </td>";
		                  echo "<td> " .$key['title'] ." </td>";
		                  echo "<td> " .$key['author'] ." </td>";
		                 
		               
		                  echo "<td><img style='width: 98px; height: 88px; border: 1px solid;' class='Img-responsive ' src='img\blogs\\".$key["image"]."' /></td>";
		                 
		                  

		        echo "<td style='width: 214px;'>
		              <a href='Index.php?Blog&SNumBlog=".$key['id']."' class='confirme btn btn-danger'><i class=' fas fa-trash-alt'></i> Delete</a> 
		              <a href='?Blog&EditeBlog&NumBlog=".$key['id']."' class='btn btn-success'><i class='far fa-edit'></i> Edit</a>";

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
		  <a href="Index.php?Blog&AddBlog" class="btn btn-primary"><i class="fa fa-plus"></i>Add New Blog</a>
	    </div>
	</div>
   </div>
<?php } ?>
