<?php
  class comment extends connection{
     function getAllComments(){
        $stm = $this->connect()->prepare('SELECT * FROM comments');
        $stm->execute();
        $rows=$stm ->fetchAll();
          return $rows;
      }
       function ActiveComment($id){
        $stm = $this->connect()->prepare('UPDATE comments set c_status=1 where id=? ');
        $stm->execute(array($id));
        $rows=$stm ->rowCount();
          // echo "<script>alert('Client bien Active')</script>";


        return $rows;
      }
      function SupprimerComment($id){
      
          $stm = $this->connect()->prepare('DELETE FROM comments WHERE comments.id = ?');
          $stm->execute(array($id));
          $rows3=$stm ->rowCount();
           // echo '<script>window.open("?Clients","_self");</script>';
         
       
       
      }
       function DesactiveComment($id){
        $stm = $this->connect()->prepare('UPDATE comments set c_status=0 where id=? ');
        $stm->execute(array($id));
        $rows=$stm ->rowCount();
          // echo "<script>alert('Client bien Active')</script>";
        return $rows;
      }

  }
?>