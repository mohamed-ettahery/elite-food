<?php
  class categorie extends connection{
        private $ID;
        private $Nom;
        private $description;
       
      function categorieProperties($Nom,$description)
      {
       
        $this->Nom = $Nom;
        $this->description = $description;
   

      }
       function setCategorie()
    {
       $stm = $this->connect()->prepare("INSERT INTO categorie(Nom,description) VALUES('$this->Nom','$this->description')") ;
        $stm->execute();
        $rows = $stm->rowCount();
        
    }
    
      //function pour recupere tous les categories
      function getAllCategories(){
        $stm = $this->connect()->prepare('SELECT * FROM `categorie`');
        $stm->execute();
        $rows=$stm ->fetchAll();
          return $rows;
      }

       //function pour recupere les categories a edite
      function getAllCategoriesEdite($ID){
        $stm = $this->connect()->prepare('SELECT * FROM `categorie` WHERE ID=?');
        $stm->execute(array($ID));
        $rows=$stm ->fetchAll();
          return $rows;
      }
     
      //function pour supprimer des Categories  
      function SupprimerCategorie($NumC){
      
          $stm = $this->connect()->prepare('DELETE FROM categorie WHERE categorie.ID = ?');
          $stm->execute(array($NumC));
          $rows3=$stm ->rowCount();
           echo '<script>window.open("?Categories","_self");</script>';
         
       
       
      }

      
  function checkitem($Nom){
   
    $stm = $this->connect()->prepare("select Nom from categorie where Nom= ? ");
    $stm->execute(array($Nom));
    $count =$stm->rowCount();
   return $count;
    
   }
   function UpdateCate($Nom,$Descrip,$ID){
    $stm = $this->connect()->prepare("UPDATE categorie set Nom=?,description=? where ID=? ");
    $stm->execute(array($Nom,$Descrip,$ID));
    $count =$stm->rowCount();
     
      }
   }
?>
    