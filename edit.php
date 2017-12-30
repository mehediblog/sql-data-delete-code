<?php
include 'db.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css" type="text/css">
<style>
input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
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
      if(isset($_GET['post_id'])){
$posts_id=$_GET['post_id'];
 
$query="select * from posts where posts_id='$posts_id'";
       
       $run_query=mysqli_query($conn,$query);
       
       while($row=mysqli_fetch_array($run_query))
       {
           $edit_id1=$row['posts_id'];
           $post_title=$row['posts_title'];
           $post_date=$row['posts_date'];
           $post_author=$row['post_author'];
           $post_content=$row['post_content'];
           $post_img=$row['post_img'];
     
       ?>
<form action="edit.php?edit_form=<?php echo $edit_id1;?>" method="POST" enctype="multipart/form-data">
  <table width='800' align='center' border='3'>
      
           <tr>
             <td align='center' colspan='9' bgcolor='orange'>
              <h1>Edit Post</h1>
               </td>
           </tr>
           
           <tr>
               <td>
                  <h2>POST TITLE</h2> 
               </td>
               <td>
                   <input type="text" name="post_title" value="<?php echo $post_title; ?>"/>
               </td>
           </tr>
           
            <tr>
               <td>
                  <h2>POST AUTHOR</h2> 
               </td>
               <td>
               <input type="text" name="post_author"  value="<?php echo $post_author; ?>"/>
               </td>
           </tr>
           
            <tr>
               <td>
                  <h2>POST IMAGE</h2> 
               </td>
               <td>
                  <input type="file" name="post_img"  value="<?php echo $post_title; ?>"/>
                  <img src="../images/<?php echo $post_img; ?>" style="width:100px;height:100px;">
               </td>
           </tr>
           
            <tr>
               <td>
                  <h2>POST CONTENT</h2> 
               </td>
               <td>
                <textarea name="post_content" cols="50" rows="20">
                     <?php echo $post_content; ?>
                </textarea>
               </td>
           </tr>
           
            <tr>
               
               <td colspan="2">
                   <input type="submit" name="submit" value="publish now">
               </td>
           </tr>
  
       
   </table>
         </form>
         
        
       
      <?php } } ?> 
     
      
     
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
   <?php
   //01736153010
  if(isset($_POST['submit']))
  {
      
      $update_id = @$_GET['edit_form'];
      $title= $_POST['post_title'];
     
      $author= $_POST['post_author'];
     
      $content= $_POST['post_content'];
      
      
      $post_img = $_FILES['post_img']['name'];
      
      $temp_name = $_FILES['post_img']['tmp_name'];
     
     
          move_uploaded_file($temp_name,"../images/$post_img");
           
      
          
          
          
      
           $update_query = "update posts set posts_title='$title',posts_date=NOW(),post_author='$author',post_img='$post_img',post_content='$content' where posts_id='$update_id'";
      $run_product = mysqli_query($conn,$update_query);
      if($run_product){
         // echo "<center><h1>Post has been published</h1></center>";
          echo "<script>window.open('edit.php?updated=Post has been Updated','_self')</script>";
    
      }
  
     
  }

?>
