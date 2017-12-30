<?php

include 'db.php';

$delete_id = $_GET['post_id'];
$delete_query = "delete from posts where posts_id='$delete_id'";

if(mysqli_query($conn,$delete_query))
{
    echo "<script>window.open('index.php?deleted= A post has been delted ..','_self')</script>";
}

?>