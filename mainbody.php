
   <?php
   include 'db.php';

  ?>

   <div class="mainbody">
   
    <?php
       $query="select * from posts order by rand() LIMIT 0,5";
       
       $run_query=mysqli_query($conn,$query);
       
       while($row=mysqli_fetch_array($run_query))
       {
           $post_id=$row['posts_id'];
           $post_title=$row['posts_title'];
           $post_date=$row['posts_date'];
           $post_author=$row['post_author'];
           $post_content=substr($row['post_content'],0,300);
           $post_img=$row['post_img'];
     
       ?>
      <h2>
          <a href="pages.php?posts_id=<?php echo $post_id;?>">
          <?php echo $post_title;?>
          </a>
      </h2> 
       <p>Publishd on:&nbsp;&nbsp;<b><?php  echo date("l"); echo "-"; echo $post_date;?></b></p>
       <p align="right">Posted By:&#9755;&nbsp;&nbsp;<b><?php echo $post_author; ?></b></p>
       <center><img src="images/<?php echo $post_img; ?>" style="width:600px;height:250px;"></center>
       <p align="justify"><?php echo $post_content; ?></p>
       <p align="right"><a href="pages.php?posts_id=<?php echo $post_id;?>">Read more</a></p>
       <?php } ?>
       
       
    
</div>