<?php
class users extends connection
{
    function getAllUser()
    {
        $query = "SELECT * FROM users";
        $cnx = $this->connect();
        $stmt = $cnx->prepare($query);
        $stmt->execute();
        $run = $stmt -> fetchAll();
        if($run)
        {
            return $run;
        }
    }
}