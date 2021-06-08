<?php

$connection=mysqli_connect('localhost','root','root','billing','3307');

$data = array();

if(isset($_GET["query"])){
    
    $query = "SELECT firstname,lastname FROM customers WHERE firstname LIKE '%".$_GET["query"]."%' ";
    
    $statement=mysqli_query($connection,$query);
    
    while($row=mysqli_fetch_assoc($statement)){
        $data[] = $row["firstname"];
        $data[] = $row["lastname"];
        
    }
    
}

 echo json_encode($data);

?>

<?php
$connection=mysqli_connect('localhost','root','root','billing','3307');
$data = array();

if(isset($_GET["query"])){
    
    $query = "SELECT product_name FROM stock WHERE product_name LIKE '%".$_GET["query"]."%' ";
    
    $statement=mysqli_query($connection,$query);
    
    while($row=mysqli_fetch_assoc($statement)){
        
        $data[] = $row["product_name"];
        
    }
    
}

 echo json_encode($data);


?>