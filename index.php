<?php
include 'db.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css" type="text/css">
<style>

</style>
</head>
<body>

<div class="header">
  <h1>WELCOME TO MALALA.COM </h1>
</div>

<div style="overflow:auto">
  <div class="menu">
    <div class="menuitem">Content Management</div>
    <div class="menuitem"><a href="logout.php">Admin Logout</a></div>
    <div class="menuitem"><a href="index.php?view=view">View Post</a></div>
    <div class="menuitem"><a href="index.php">Insert-posts</a></div>
  </div>

  <div class="main">
   <center>
    <a href="index.php"><h2>Admin Panal Malala.com</h2></a>
    <p>Your Web site all content here.</p>
   
        <?php
      
      if(isset($_GET['view']))
      { 
          $i=1;
          $query="select * from posts order by 1 DESC";
       
       $run_query=mysqli_query($conn,$query);
        echo "
     <table width='800' align='center' border='3'>
        <tr>
            <td align='center' colspan='9' bgcolor='orange'>
               <h1>View All Posts</h1>
               
            </td>
            
        </tr>
        
        <tr>
           <th>Posts No</th>
           <th>Posts Title</th>
           <th>Posts Date</th>
           <th>Posts Author</th>
           <th>Posts Img</th>
           <th>Post Content</th>
           <th>Edit</th>
           <th>Delete</th>
        </tr> ";
       while($row=mysqli_fetch_array($run_query))
       {
         
           $post_id=$row['posts_id'];
           $post_title=$row['posts_title'];
           $post_date=$row['posts_date'];
           $post_author=$row['post_author'];
           $post_content=substr($row['post_content'],0,50);
           $post_img=$row['post_img'];
     
       ?>
         
        <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $post_title; ?></td>
            <td><?php echo $post_date; ?></td>
            <td><?php echo $post_author; ?></td>
            <td><center><img src="../images/<?php echo $post_img; ?>" style="width:100px;height:100px;"></center></td>
            <td><?php echo $post_content ?></td>
            <td> <a href="edit.php?post_id=<?php echo $post_id;?> ">Edit</a></td>
            <td> <a href="delete.php?post_id=<?php echo $post_id; ?>">Delete</a></td>
            
        </tr>
         
        <?php } }?>  
         
   <?php echo "</table>";?>  
     
      
     
</center>
  </div>

  <!--<div class="right">
    <h2>About</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
  </div> -->
</div>

<div style="background-color:#e5e5e5;text-align:center;padding:10px;margin-top:7px;">© copyright w3schools.com</div>

</body>
</html>