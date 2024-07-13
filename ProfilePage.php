<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user_name=$_GET['user_name'];
//$home=$_GET['home'];

if (!isset($_SESSION['f_uname'])) {

    header("Location: index.php");
    exit;
}

$db = mysqli_connect("localhost", "root", "", "learnsync");
$username = $_SESSION['f_uname'];
$_SESSION['comment_name'] = $username;
$query = "SELECT * FROM mod_reg WHERE username = '$username' AND privilege='moderator'";
$result = mysqli_query($db, $query);
$isModerator = mysqli_num_rows($result) > 0;

$query = "SELECT * FROM registration WHERE username = '$username'AND privilege='student'";
$result = mysqli_query($db, $query);
$rowss_1 = mysqli_fetch_array($result); 
$isStudent = mysqli_num_rows($result) > 0;
if ($isModerator)
{
	$mod_is=1;
}
else
{
	$mod_is=0;
	$profile_pic = $rowss_1['profile_photo'];
	$full_name=$rowss_1['name'];

}

                       

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./ProfilePage.css?<?php echo time();?>F" />
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
    <div class="profile-page2">
      <div class="profile-page-child3"></div>
      <div class="profile-page-child4"></div>
      <img
        class="profile-pic-icon5"
        alt=""
        src="profile_pics/<?php echo $profile_pic ?>"
      />

      <div class="rectangle-parent6">
        <div class="frame-child40"></div>
        <img
          class="logo-icon11"
          alt=""
          src="./public/logo3@2x.png"
        />

        <div class="frame-child41"></div>
        <img class="search-icon7" alt="" src="./public/search3@2x.png" />

        <div class="search7">Search</div>
        <div class="currently-live6">CURRENTLY LIVE</div>
        <img class="frame-child42" alt="" src="./public/ellipse-14@2x.png" />

        <img class="frame-child43" alt="" src="./public/ellipse-24@2x.png" />

        <div class="channel-16">Channel 1</div>
        <div class="channel-26">Channel 2</div>
      </div>
      <div class="adam-walker2"><?php echo $full_name?></div>
      <button class="edit-profile4" id="editProfile">
        <div class="edit-profile-inner"></div>
        <div class="edit-profile5">Edit profile</div>
      </button>
      <!--<div class="bio2">BIO</div>-->
      <!--<div class="posts6">
        <b class="b2">100</b>
        <div class="posts7">Posts</div>
      </div>
      <div class="subs2">
        <b class="k4">0</b>
        <div class="subscribers2">Subscribers</div>
      </div>
      <div class="followers2">
        <b class="k4">0</b>
        <div class="subscribers2">Following</div>
      </div>-->
      <div class="profile-page-child5"></div>
      <div class="posts8">POSTS</div>
      <div class="nav-bar4">
        <div class="nav-bar-child2"></div>
        <button class="home-btn5" autofocus="{true}" id="Home">
          <div class="home-btn-child3"></div>
          <img class="exterior-icon5" alt="" src="./public/exterior1@2x.png" />
        </button>
        
        <div class="notes-btn5" id="notesBtnContainer2">
          <div class="notes-btn-child3"></div>
          <img class="notes-icon5" alt="" src="./public/notes1@2x.png" />
        </div>
        
        <div class="chat-btn5" id="stream">
          <div class="chat-btn-child3"></div>
          <img
            class="chat-bubble-icon5"
            alt=""
            src="./public/chat-bubble1@2x.png"
          />
        </div>
        
      </div>
      <div class="content-share3">
	  
	  <?php
  $db = mysqli_connect("localhost", "root", "", "learnsync");
   
  $result = mysqli_query($db, "SELECT * FROM content_sharing");
   $count=0;
     
							
    while ($row = mysqli_fetch_array($result)) { 
	$varic=$row['id'];
	$results=mysqli_query($db, "SELECT * FROM content_sharing where id= $varic ");
							$rows = mysqli_fetch_array($results); 
							$likes=$rows['likes'];
	                        $dislikes=$rows['dislikes'];
	                        $file_path = "files/" . $rows['address'];
		
		$resultss=mysqli_query($db, "SELECT * FROM content_sharing INNER JOIN registration ON content_sharing.username = registration.username where id= $varic");		
                       							$rowss = mysqli_fetch_array($resultss); 
		               $username = $rowss['name'];
					   $u_username = $rowss['username'];
					   $content_profile_pic=$rowss['profile_photo'];
	if ($row['type'] == "photo" AND $row['username']==$user_name) {
                 
                         
	?>
	<a href = "<?php echo $file_path; ?>" target="_blank" >
        <div class="post10">
          <img class="post-child23" alt="" src="./public/ellipse-222@2x.png" />

          <div class="post-child24"></div>
          
          <div class="hyperlink1" id="hyperlinkContainer">
            <img
              class="hyperlink-item"
              alt=""
              src="<?php echo $file_path; ?>"
            />

            <div class="supervised-learning-algorithms11">
<?php echo $row['description']; ?>             </div>
            
          </div>
          <div class="john-doe27"><?php echo $username; ?></div>
          
          
          <div class="share16">
            <img class="share-icon19" alt="" src="./public/share2@2x.png" />

            <div class="div81">30</div>
          </div>
          <div class="like15">
            <img class="fire-icon18" alt="" src="./public/fire2@2x.png" />

            <div class="div82"><?php echo $likes; ?></div>
          </div>
          <div class="dislike15">
            <img
              class="icon-favorite-dislike-1-rewar9"
              alt=""
              src="./public/-icon-favorite-dislike-1-reward-down-thumb-hand-social-media-dislike-rating1.svg"
            />

            <div class="div83"><?php echo $dislikes; ?></div>
          </div>
          <img class="post-child28" alt="" src="profile_pics/<?php echo $content_profile_pic; ?>" />
</a>
<a href = "assign8.php?user_name=<?php echo $u_username; ?>&id=<?php echo $varic; ?>"  >
          <button class="comment-btn9" >
            <div class="comment-btn-child7"></div>
            <div class="delete6">DELETE</div>
          </button>
		  </a>
        </div>
		<?php } ?>
<?php     if ($row['type'] == "video" AND $row['username']==$user_name) {  ?> 
        <div class="photo-post3">
          <div class="photo-post-child4"></div>
		  <a target="_blank" href = "<?php echo $file_path; ?>" >
          <div class="hyperlink23" id="hyperlink2Container">
            <img
              class="hyperlink2-child4"
              alt=""
              src="./public/play.jpeg"
            />

            
            <div class="i-will-be12">
<?php echo $row['description']; ?>
            </div>
          </div>
          <div class="john-doe28"><?php echo $username; ?></div>
          <div class="share17">
            <img class="share-icon19" alt="" src="./public/share2@2x.png" />

            <div class="div81">30</div>
          </div>
          <div class="like16">
            <img class="fire-icon18" alt="" src="./public/fire2@2x.png" />

            <div class="div82"><?php echo $likes; ?></div>
          </div>
          <div class="dislike16">
            <img
              class="icon-favorite-dislike-1-rewar10"
              alt=""
              src="./public/-icon-favorite-dislike-1-reward-down-thumb-hand-social-media-dislike-rating1.svg"
            />

            <div class="div87"><?php echo $dislikes; ?></div>
          </div>
          <img
            class="photo-post-child5"
            alt=""
            src="profile_pics/<?php echo $content_profile_pic; ?>"
          />
</a>
<a href = "assign8.php?user_name=<?php echo $u_username; ?>&id=<?php echo $varic; ?>"  >
          <button class="comment-btn10" autofocus="{true}" >
            <div class="comment-btn-child7"></div>
            <div class="delete6">DELETE</div>
          </button>
		  </a>
        </div>
	<?php } ?>
		<?php     if ($row['type'] == "text" AND $row['username']==$user_name) {  ?> 
       <div class="wym-post3">
          <div class="photo-post-child4"></div>
          <div class="share17">
            <img class="share-icon19" alt="" src="./public/share2@2x.png" />

            <div class="div81">30</div>
          </div>
          <div class="like16">
            <img class="fire-icon18" alt="" src="./public/fire2@2x.png" />

            <div class="div82"><?php echo $likes; ?></div>
          </div>
          <div class="dislike16">
            <img
              class="icon-favorite-dislike-1-rewar10"
              alt=""
              src="./public/-icon-favorite-dislike-1-reward-down-thumb-hand-social-media-dislike-rating1.svg"
            />

            <div class="div87"><?php echo $dislikes; ?></div>
          </div>
          <div class="hyperlink33" id="hyperlink3Container">
            
            <div class="i-will-be13">
             <?php echo $row['description']; ?>
            </div>
            <div class="john-doe29"><?php echo $username; ?></div>
            <img
              class="hyperlink3-child1"
              alt=""
              src="profile_pics/<?php echo $content_profile_pic; ?>"
            />
          </div>
		  </a>
<a href = "assign8.php?user_name=<?php echo $u_username; ?>&id=<?php echo $varic; ?>"  >
          <button class="comment-btn11" >
            <div class="comment-btn-child7"></div>
            <div class="delete6">DELETE</div>
          </button>
		  </a>
        </div>
	<?php } }?>
      </div>
    </div>
<form action="assign7.php" method="POST" enctype="multipart/form-data">

    <div id="profilePopup" class="popup-overlay" style="display: none">
	
	<input type="hidden" id="user_name" name="user_name" value="<?php echo $user_name;?>">
	
      <div class="profile-popup">
        <div class="profile-popup-child"></div>
        <div class="profile-popup-item"></div>
        <img
          class="logo-icon12"
          alt=""
          src="./public/logo4@2x.png"
        />

      <!--  <div class="title5">
          <input
            class="title-item"
            name="title"
            placeholder="ENTER TITLE"
            type="text"
          />

          <div class="name">USERNAME</div>
        </div> -->
       <!-- <div class="domain-group">
          <select class="domain2" autofocus="{true}" form>
            <option value="rather not say">rather not say</option>
            <option value="male">male</option>
            <option value="female">female</option>
            <option value="other">other</option>
          </select>
          <div class="gender">GENDER</div>
        </div>-->
		<div class="upload-parent1">
          <div class="upload3" required="{true}">
            <label class="label3" for="file-410:180">
              <div class="upload-child1">Click Here</div>
            </label>
            <input class="input3" type="file" name="myfile" id="file-410:180" />
          </div>
          <div class="profile-picture">PROFILE PICTURE</div>
        </div>
		
        <button class="submit5" id="submit">
          <div class="submit-child2"></div>
          <div class="submit6">SUBMIT</div>
        </button>
        
        <div class="author2">
          <input
		    name="p_name"
            class="author-item"
            placeholder="<?php echo $full_name?>"
			value="<?php echo $full_name?>"
            type="text"
          />

          <div class="name">NAME</div>
        </div>
		</form>
        <!--<div class="description10">
          <textarea
            class="description-child2"
            placeholder="ENTER DESCRIPTION"
            autofocus="{true}"
            form
          >
          </textarea>
          <div class="name">BIO</div>
        </div>-->
      </div>
	  
    </div>
</form>
    <script>
	
	var homeBtn = document.getElementById("Home");
      if (homeBtn) {
        homeBtn.addEventListener("click", function (e) {
          window.location.href = "./index2.php";
        });
      }
	  var stream=  document.getElementById("stream");
      if (stream) {
        stream.addEventListener("click", function (e) {
          window.location.href = "./lobby.php";
        });
      }
      var popuplogoImage = document.getElementById("popuplogoImage");
      if (popuplogoImage) {
        popuplogoImage.addEventListener("click", function (e) {
          window.location.href = "./Main.html";
        });
      }
      
      var popupsUBMIT = document.getElementById("submit");
      if (popupsUBMIT) {
        popupsUBMIT.addEventListener("click", function (e) {
          var popup = e.currentTarget.parentNode;
          function isOverlay(node) {
            return !!(
              node &&
              node.classList &&
              node.classList.contains("popup-overlay")
            );
          }
          while (popup && !isOverlay(popup)) {
            popup = popup.parentNode;
          }
          if (isOverlay(popup)) {
            popup.style.display = "none";
          }
        });
      }
      
      var logoImage2 = document.getElementById("logoImage2");
      if (logoImage2) {
        logoImage2.addEventListener("click", function (e) {
          window.location.href = "./Main.html";
        });
      }
      
      var editProfile = document.getElementById("editProfile");
      if (editProfile) {
        editProfile.addEventListener("click", function () {
          var popup = document.getElementById("profilePopup");
          if (!popup) return;
          var popupStyle = popup.style;
          if (popupStyle) {
            popupStyle.display = "flex";
            popupStyle.zIndex = 100;
            popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
            popupStyle.alignItems = "center";
            popupStyle.justifyContent = "center";
          }
          popup.setAttribute("closable", "");
      
          var onClick =
            popup.onClick ||
            function (e) {
              if (e.target === popup && popup.hasAttribute("closable")) {
                popupStyle.display = "none";
              }
            };
          popup.addEventListener("click", onClick);
        });
      }
      
      var friendsBtnContainer2 = document.getElementById("friendsBtnContainer2");
      if (friendsBtnContainer2) {
        friendsBtnContainer2.addEventListener("click", function (e) {
          window.location.href = "./Frame5.html";
        });
      }
      
      var notesBtnContainer2 = document.getElementById("notesBtnContainer2");
      if (notesBtnContainer2) {
        notesBtnContainer2.addEventListener("click", function (e) {
          window.location.href = "./NoteSharing2.php?mod=0";
        });
      }
      
     
	 
      
      var commentBtn = document.getElementById("commentBtn");
      if (commentBtn) {
        commentBtn.addEventListener("click", function (e) {
          window.open("./CommentPg2.html");
        });
      }
      
      var hyperlink2Container = document.getElementById("hyperlink2Container");
      if (hyperlink2Container) {
        hyperlink2Container.addEventListener("click", function (e) {
          window.location.href = "./Frame5.html";
        });
      }
      
      var commentBtn1 = document.getElementById("commentBtn1");
      if (commentBtn1) {
        commentBtn1.addEventListener("click", function (e) {
          window.open("./CommentPg2.html");
        });
      }
      
      var hyperlink3Container = document.getElementById("hyperlink3Container");
      if (hyperlink3Container) {
        hyperlink3Container.addEventListener("click", function (e) {
          window.location.href = "./Frame5.html";
        });
      }
      
      var commentBtn2 = document.getElementById("commentBtn2");
      if (commentBtn2) {
        commentBtn2.addEventListener("click", function (e) {
          window.open("./CommentPg3.html");
        });
      }
      </script>
  </body>
</html>
