<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";
$mod_is=$_GET['mod_is'];

$db = mysqli_connect("localhost", "root", "", "learnsync");
$post_id=$_GET['id'];
$resultss=mysqli_query($db, "SELECT * FROM content_sharing INNER JOIN registration ON content_sharing.username = registration.username where id= $post_id");		
                       							$rowss = mysqli_fetch_array($resultss); 
		               $username = $rowss['name'];
    $results = mysqli_query($db, "SELECT * FROM content_sharing where id= $post_id");
$rows = mysqli_fetch_array($results);
   
  $result = mysqli_query($db, "SELECT * FROM content_sharing INNER JOIN comments ON content_sharing.id = comments.comment_id where content_sharing.id= $post_id");

     
							
    $row = mysqli_fetch_array($result);
	$author=$username;
	$title=$rows['description'];
	$profile_photo=$rowss['profile_photo'];
	$likes=$rows['likes'];
	$dislikes=$rows['dislikes'];
	$file_path = "files/" . $rows['address'];						
	                       /*$file_path = "files/" . $rows['address'];
		
		$resultss=mysqli_query($db, "SELECT * FROM content_sharing INNER JOIN registration ON content_sharing.username = registration.username where id= $varic");		
                       							$rowss = mysqli_fetch_array($resultss); 
		               $username = $rowss['name'];
					   if ($row['type'] == "photo") {*/
                        
                       
	?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./CommentPg3.css?<?php echo time();?>F" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Kadwa:wght@400;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=IBM Plex Sans Hebrew:wght@500&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Liberation Sans:wght@400&display=swap"
    />
  </head>
  <body>
  <a href = "index2.php" >
  <button onclick="window.close();" >Go Back</button>
</a>
    <div class="comment-pg-3">
	<div class="bg3"></div>
      <img class="bg-icon3" alt="" src="./public/bg.svg" />

      <div class="comment-pg-3-child"></div>
      <div class="john-doe21"><?php echo $author;?></div>
      <img class="comment-pg-3-item" alt="" src="profile_pics/<?php echo $profile_photo;?>" />

     <!-- <div class="div55">10/10/2023</div>
      <button class="share10">
        <img class="share-icon13" alt="" src="./public/share@2x.png" />

        <div class="div56">30</div>
      </button>-->
	  <form action="text_dislike_assign.php" method="POST" enctype="multipart/form-data">
	  <input type="hidden" id="content_id" name="content_id" value="<?php echo $post_id;?>">
      <button class="dislike9">
        <div class="div57"><?php echo $dislikes; ?></div>
        <img
          class="icon-thumbs-down5"
          alt=""
          src="./public/-icon-thumbs-down.svg"
        />
      </button>
	  </form>
	  <form action="text_like_assign.php" method="POST" enctype="multipart/form-data">
	  <input type="hidden" id="content_id" name="content_id" value="<?php echo $post_id;?>">
      <button class="like9">
        <img class="fire-icon12" alt="" src="./public/fire@2x.png" />

        <div class="div58"><?php echo $likes; ?></div>
      </button>
	  </form>
      <div class="comment-section5">
        <div class="comment-section-child3"></div>
        <div class="comments8">COMMENTS</div>
        <div class="comment-read3" <?php if ($mod_is==1) echo 'style="height: 314px;"'; ?>>
         <!-- <div class="comment-read-section5"></div>-->
		  <?php
$db = mysqli_connect("localhost", "root", "", "learnsync");   
  $result = mysqli_query($db, "SELECT content_sharing.id,comments.id,username,description,type,address,content_sharing.date,comment_id,comment_author,comment,date(comments.date) as comment_date FROM content_sharing INNER JOIN comments ON content_sharing.id = comments.comment_id where content_sharing.id= $post_id");
  
while ($row = mysqli_fetch_array($result)) { 
$varic=$row['id'];
$resultss=mysqli_query($db, "SELECT * FROM comments INNER JOIN registration ON comments.comment_author = registration.username where id= $varic");		
                       							$rowss = mysqli_fetch_array($resultss); 
		               $username = $rowss['name'];
   $comment_author=$username;
   $profile_photo=$rowss['profile_photo'];
   $comment=$row['comment'];
   $date=$row['comment_date'];
	/*$varic=$row['id'];
	
	
	$results=mysqli_query($db, "SELECT * FROM content_sharing where id= $varic");
							$rows = mysqli_fetch_array($results); 
	                        $file_path = "files/" . $rows['address'];
		
		$resultss=mysqli_query($db, "SELECT * FROM content_sharing INNER JOIN registration ON content_sharing.username = registration.username where id= $varic");		
                       							$rowss = mysqli_fetch_array($resultss); 
		               $username = $rowss['name'];
					   if ($row['type'] == "photo") { */
     
							
    					
	                      
                        
                       
	?>
		  
		  
          <div class="comment15">
            <div class="comment1-child8"></div>
            <div class="john-doe22"><?php echo $comment_author;?></div>
            <img
              class="comment1-child9"
              alt=""
              src="profile_pics/<?php echo $profile_photo;?>"
            />

            <div class="div59"><?php echo $date;?></div>
            <div class="comments-description5"><?php echo $comment;?></div>
          </div>
		  <?php } ?>
        </div>
      </div>
      <div class="text1">
        <div class="text-item"></div>
        <div class="post-description1"><?php echo $title;?></div>
      </div>
	  <form action="assign5.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" id="content_id" name="content_id" value="<?php echo $post_id;?>">
		<input type="hidden" id="comment_author" name="comment_author" value="<?php echo $_SESSION['comment_user_name'];?>">
      <input
	  name="description" <?php if ($mod_is==1) echo 'style="display: none;"'; ?>
        class="comment-write5"
        placeholder="Enter you comments here"
        type="text"
        
      />

      <button <?php if ($mod_is==1) echo 'style="display: none;"'; ?> class="send-btn5" id="submit">
        <div class="send5"></div>
        <img <?php if ($mod_is==1) echo 'style="display: none;"'; ?> class="icon-send5" alt="" src="./public/-icon-send.svg" />
      </button>
	  </form>
    </div>
  </body>
</html>
