<?php
  class livreure extends connection{
    private $CIN;
    private $Nom;
    private $Prenom;
    private $Tele;
    private $Email;
    private $MDP;
    private $Image;
     function LivreurProperties($CIN,$Nom,$Prenom,$Tele,$Email,$MDP,$Image)
      {
       
        $this->CIN = $CIN;
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Tele = $Tele;
        $this->Email = $Email;
        $this->MDP = $MDP;
        $this->Image = $Image;
   

      }
       function setLivreur()
    {
       $stm = $this->connect()->prepare("INSERT INTO livreur(CIN,Nom,Prenom,Tele,Email,MDP,Image) VALUES('$this->CIN','$this->Nom','$this->Prenom','$this->Tele','$this->Email','$this->MDP','$this->Image')") ;
        $stm->execute();
        $rows = $stm->rowCount();
        
        
    }
    function checkitem($CIN){
   
        $stm = $this->connect()->prepare("select CIN from livreur where CIN= ? ");
        $stm->execute(array($CIN));
        $count =$stm->rowCount();
        return $count;
    
      }
    function getAllLivreure(){
        $stm = $this->connect()->prepare('SELECT * from livreur');
        $stm->execute();
        $rows=$stm ->fetchAll();
          return $rows;
      }
      function getAllLivreureEdite($CIN){
        $stm = $this->connect()->prepare('SELECT * FROM `livreur` WHERE CIN=?');
        $stm->execute(array($CIN));
        $rows=$stm ->fetchAll();
          return $rows;
      }
       function UpdateLivr($CIN,$Nom,$Prenom,$Tele,$Email,$MDP,$Image){
    $stm = $this->connect()->prepare("UPDATE livreur set Nom=?,Prenom=?,Tele=?,Email=?,MDP=?,image=? where CIN=? ");
    $stm->execute(array($Nom,$Prenom,$Tele,$Email,$MDP,$Image,$CIN));
    $count =$stm->rowCount();
     
      }
      function SupprimerLivr($CIN){
      
          $stm = $this->connect()->prepare('DELETE FROM livreur WHERE livreur.CIN = ?');
          $stm->execute(array($CIN));
          $rows3=$stm ->rowCount();
           
         
       
       
      }

  }
?>