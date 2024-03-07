<?php
  class commande extends connection{
      //function pour recupere tous les commandes  
      function GetAllCommande(){
        
       $stm = $this->connect()->prepare('CALL `GetAllCommande`()');
        $stm->execute();
        $rows=$stm ->fetchAll();
          return $rows;
          
          
      }
      //function pour supprimer des commande  
      function SupprimerCommande($NumC){
        $stm = $this->connect()->prepare('DELETE FROM detailcommande WHERE detailcommande.NumCommande =?');
        $stm->execute(array($NumC));
        $rows=$stm ->rowCount();
        if($rows>=1){
          $stm = $this->connect()->prepare('DELETE FROM commande WHERE commande.Numero = ?');
        $stm->execute(array($NumC));
        $rows2=$stm ->rowCount();
         // header( "refresh:1;url=Index.php?Commandes" );
        // echo '<script>window.open("?Commandes","_self");</script>';

        return $rows2;
        }
      }

      //function pour recupere des commande na pas des livreure 
      function GetCommandeNotLiv(){
         $stm = $this->connect()->prepare('select Numero ,DateCommande from Commande where CINLivreure is null');
        $stm->execute();
        $rows=$stm ->fetchAll();
          return $rows;
      }
      //function pour recupere les CIN des Livreures
      function GetCinLiv(){
         $stm = $this->connect()->prepare('select CIN from livreur');
        $stm->execute();
        $rows=$stm ->fetchAll();
          return $rows;
      }
      //function pour Donner a un livreure une commande 
      function UpdateCommandLiv($Numero,$CIN){$stm =
        $this->connect()->prepare("Update commande set commande.CINLivreure =? where commande.Numero =?");
        $stm->execute(array($CIN,$Numero));
        $rows=$stm ->rowCount();
         // echo '<script>window.open("?Commandes","_self");</script>';
          
        
      }
  }
?>
    