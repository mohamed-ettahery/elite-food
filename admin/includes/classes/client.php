<?php
   
  class client extends connection{
      private $CIN ;
      private $Nom;
      private $Prenom;
      private $Adresse;
      private $Tele;
      private $Sex;
      private $Ville;
      private $Email;
      private $DateNaissance;
      private $MDP;
      private $Active;
      function getAllClients(){
        $stm = $this->connect()->prepare('SELECT * FROM client');
        $stm->execute();
        $rows=$stm ->fetchAll();
          return $rows;
      }
      function ActiveClient($CIN){
        $stm = $this->connect()->prepare('UPDATE client set Active=1 where CIN=? ');
        $stm->execute(array($CIN));
        $rows=$stm ->rowCount();
          // echo "<script>alert('Client bien Active')</script>";


        return $rows;
      }
      function DesactiveClient($CIN){
        $stm = $this->connect()->prepare('UPDATE client set Active=0 where CIN=? ');
        $stm->execute(array($CIN));
        $rows=$stm ->rowCount();
          // echo "<script>alert('Client bien Active')</script>";
        return $rows;
      }
      function CommandeValide($CIN){
         $stm = $this->connect()->prepare('SELECT count(CinClient) from commande where CinClient=? AND LivreurValide is not null  ');
         $stm->execute(array($CIN));
         $count=$stm->fetchColumn();
         return $count;
      }function CountCommandeCliet($CIN){
         $stm = $this->connect()->prepare('SELECT count(CinClient) from commande where CinClient=? ');
         $stm->execute(array($CIN));
         $count=$stm->fetchColumn();
         return $count;
      }
      function CountAttendCommande($CIN){
         $stm = $this->connect()->prepare('SELECT count(CinClient) from commande where CinClient=? AND CINLivreure is not null and  LivreureRetour is  null and LivreurValide is  null or CinClient=? and CINLivreure is  null ');
         $stm->execute(array($CIN,$CIN));
         $count=$stm->fetchColumn();
         return $count;
      }
      
      function CommandeNonValide($CIN){
         $stm = $this->connect()->prepare('SELECT count(CinClient) from commande where CinClient=? AND LivreureRetour is not null  ');
         $stm->execute(array($CIN));
         $count=$stm->fetchColumn();
         return $count;
      }
      function SupprimerClient($CIN){
      
          $stm = $this->connect()->prepare('DELETE FROM client WHERE client.CIN = ?');
          $stm->execute(array($CIN));
          $rows3=$stm ->rowCount();
           // echo '<script>window.open("?Clients","_self");</script>';
         
       
       
      }
      function getAllClientsP($CIN){
        $stm = $this->connect()->prepare('SELECT * FROM client where CIN=?');
        $stm->execute(array($CIN));
        $rows=$stm ->fetchAll();
          return $rows;
      }
  }
?>