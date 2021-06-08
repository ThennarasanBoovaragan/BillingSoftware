<?php include "../includes/db.php"; 

		$id=$_GET['id'];
        $query="DELETE FROM register WHERE invnum='$id'";
        $delete_query=mysqli_query($connection,$query);
        header('location:reports.php?action=success');

;?>
