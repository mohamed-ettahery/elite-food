<?php
  class blog extends connection{
    private $id;
    private $image;
    private $title;
    private $author;
    private $b_date;
    private $description;
    function blogProperties($image,$title,$author,$b_date,$description)
      {
       
        $this->image = $image;
        $this->title = $title;
        $this->author = $author;
        $this->b_date = $b_date;
        $this->description = $description;
   

      }
       function setblog()
    {
       $stm = $this->connect()->prepare("INSERT INTO blog(image,title,author,b_date,description) VALUES('$this->image','$this->title','$this->author','$this->b_date','$this->description')") ;
        $stm->execute();
        $rows = $stm->rowCount();
        
    }
    function getAllBlog(){
        $stm = $this->connect()->prepare('SELECT * FROM blog');
        $stm->execute();
        $rows=$stm ->fetchAll();
          return $rows;
      }
      function getAllBlogsEdite($ID){
        $stm = $this->connect()->prepare('SELECT * FROM `blog` WHERE id=?');
        $stm->execute(array($ID));
        $rows=$stm ->fetchAll();
          return $rows;
      }
      function UpdateBlog($id,$title,$author,$b_date,$image,$description){
    $stm = $this->connect()->prepare("UPDATE blog set title=?,author=?,b_date=?,image=?,description=? where id=? ");
    $stm->execute(array($title,$author,$b_date,$image,$description,$id));
    $count =$stm->rowCount();
     
      }
      function SupprimerBlog($NumB){
      
          $stm = $this->connect()->prepare('DELETE FROM blog WHERE blog.id = ?');
          $stm->execute(array($NumB));
          $rows3=$stm ->rowCount();
           echo '<script>window.open("?Blog","_self");</script>';
         
       
       
      }
  }
?>