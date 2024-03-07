<?php
  class produit extends connection{
      
        private $id;
        private $Name;
        private $Prix;
        private $IDCategorie;
        private $Image;
        private $descriptionn;

         function ProduitProperties($Name,$Prix,$IDCategorie,$Image,$description)
      {
       
        $this->Name = $Name;
        $this->Prix = $Prix;
        $this->IDCategorie = $IDCategorie;
        $this->Image = $Image;
        $this->description = $description;
        
   

      }
       function setProduit()
    {
       $stm = $this->connect()->prepare("INSERT INTO produit(Name,Prix,IDCategorie,Image,description) VALUES('$this->Name','$this->Prix','$this->IDCategorie','$this->Image','$this->description')") ;
        $stm->execute();
        $rows = $stm->rowCount();
        
        
    }
        //function pour recupere tous les Produits
      function getAllProduits(){
        $stm = $this->connect()->prepare('SELECT produit.id,produit.Name,produit.Prix,produit.Image,categorie.Nom FROM produit INNER JOIN categorie ON categorie.ID=produit.IDCategorie');
        $stm->execute();
        $rows=$stm ->fetchAll();
          return $rows;
      }
      function getcategories(){
          
        $stm = $this->connect()->prepare('select categorie.ID,categorie.Nom from categorie');
        $stm->execute();
        $rows=$stm ->fetchAll();
          return $rows;
      }
      function checkitem($Nom){
   
        $stm = $this->connect()->prepare("select Nom from produit where Nom= ? ");
        $stm->execute(array($Nom));
        $count =$stm->rowCount();
        return $count;
    
      }
       //function pour recupere tous les Produit Editer
      function getAllProduitsEdite($ID){
        $stm = $this->connect()->prepare('SELECT * FROM `produit` WHERE id=?');
        $stm->execute(array($ID));
        $rows=$stm ->fetchAll();
          return $rows;
      }
       function UpdatePro($id,$Name,$Prix,$IDCategorie,$Image,$description){
    $stm = $this->connect()->prepare("UPDATE produit set Name=?,Prix=?,IDCategorie=?,Image=?,description=? where id=? ");
    $stm->execute(array($Name,$Prix,$IDCategorie,$Image,$description,$id));
    $count =$stm->rowCount();
     
      }
      //function pour supprimer des produits  
      function SupprimerProduit($NumP){
      
          $stm = $this->connect()->prepare('DELETE FROM produit WHERE produit.id = ?');
          $stm->execute(array($NumP));
          $rows3=$stm ->rowCount();
           echo '<script>window.open("?Produits","_self");</script>';
         
       
       
      }
  }
?>
    