<?php
require "../../admin/includes/connection.php";
$term = mysqli_real_escape_string($cnx,$_GET['term']);
$sql = "SELECT * FROM produit WHERE Name LIKE '$term%'";
$query = mysqli_query($cnx, $sql);
$result = [];
while($data = mysqli_fetch_array($query))
{
    $result[] = $data['Name'];
}
echo json_encode($result);
?>