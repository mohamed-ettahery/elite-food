<?php
require "includes/classes/connection.php";
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
    
    
      function getAllLivreureEdite($CIN){
        $stm = $this->connect()->prepare('SELECT * FROM `livreur` WHERE CIN=?');
        $stm->execute(array($CIN));
        $rows=$stm ->fetchAll();
          return $rows;
      }
      function UpdateLivrImg($CIN,$Image){
    $stm = $this->connect()->prepare("UPDATE livreur set image=? where CIN=? ");
    $stm->execute(array($Image,$CIN));
    $count =$stm->rowCount();
     
      }
       function UpdateLivr($CIN,$Nom,$Prenom,$Tele,$Email,$MDP){
    $stm = $this->connect()->prepare("UPDATE livreur set Nom=?,Prenom=?,Tele=?,Email=?,MDP=? where CIN=? ");
    $stm->execute(array($Nom,$Prenom,$Tele,$Email,$MDP,$CIN));
    $count =$stm->rowCount();
     
      }
      function CommandeNonLivre($CIN){
        $stm = $this->connect()->prepare("select commande.Numero,client.Nom,client.Prenom,client.Adresse,client.Tele FROM client
INNER JOIN commande on commande.CinClient=client.CIN
WHERE commande.CINLivreure =? AND commande.LivreurValide is null and commande.LivreureRetour is null  ");
    $stm->execute(array($CIN));
    $rows =$stm->fetchAll();
    return $rows;
      }
      function CommandeUpdateNValid($CIN,$Numero,$Motif){
        $stm = $this->connect()->prepare("UPDATE commande set Motif=?,LivreureRetour =?,DateLivraison=Now()where Numero =? ");
    $stm->execute(array($Motif,$CIN,$Numero));
    $count =$stm->rowCount();
      }
      function CommandeUpdateValid($CIN,$Numero){
        $stm = $this->connect()->prepare("UPDATE commande set LivreurValide =?,DateLivraison=Now() where Numero =? ");
    $stm->execute(array($CIN,$Numero));
    $count =$stm->rowCount();
      }
      function checkLivreur($Email,$Password){
        $stm = $this->connect()->prepare("select Email,CIN,MDP,Image,Nom,Prenom from livreur where Email = ? and MDP = ? ");
   $stm->execute(array($Email,$Password));
   $row = $stm->fetchAll();
   return $row;
      }

  }
?>