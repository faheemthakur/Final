<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";

if (!isset($_SESSION['f_uname'])) {

    header("Location: login.php");
    exit;
}

$db = mysqli_connect("localhost", "root", "", "learnsync");
$username = $_SESSION['f_uname'];

$query = "SELECT * FROM mod_reg WHERE username = '$username' AND privilege='moderator'";
$result = mysqli_query($db, $query);
$isModerator = mysqli_num_rows($result) > 0;

$query = "SELECT * FROM registration WHERE username = '$username'AND privilege='student'";
$result = mysqli_query($db, $query);
$isStudent = mysqli_num_rows($result) > 0;

?>

<!DOCTYPE html>
<html>
<script type="text/javascript">
      window.history.forward();
    </script>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./frontpg.css?<?php echo time();?>F" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=IBM Plex Sans Hebrew:wght@500&display=swap"
    />
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
  </head>
  <body>
    <div class="main">
      <div class="main-child"></div>
      <div class="main-item"></div>
      <img class="doorbell-icon" alt="" src="./public/doorbell@2x.png" />

      
      <div class="adam-parent">
        <div class="adam"><?php echo $_SESSION['f_uname'];?></div>
        <div class="live">
          <img
            class="live-child"
            alt=""
            src="./public/rectangle-14@2x.png"
            data-animate-on-scroll
          />

          <div class="live-item"></div>
          <div class="live-inner"></div>
          <div class="live-chat">Live Chat</div>
          <div class="people">200 People</div>
          <img class="account-icon" alt="" src="./public/account@2x.png" />

          <img class="multiply-icon" alt="" src="./public/multiply@2x.png" />

          <img class="settings-icon" alt="" src="./public/settings@2x.png" />

          <div class="rectangle-div"></div>
          <div class="add-your-comment">Add your comment</div>
          <img
            class="slightly-smiling-face"
            alt=""
            src="./public/slightly-smiling-face@2x.png"
          />

          <img class="sent-icon" alt="" src="./public/sent@2x.png" />
        </div>
        <div class="person">
          <div class="person-child"></div>
          <div class="sarah-houston">Sarah Houston</div>
          <div class="such-great-information">Such great information.</div>
        </div>
        <div class="person1">
          <div class="person-child"></div>
          <div class="sarah-houston">Suny Suka</div>
          <div class="such-great-information">Thanks for explaining</div>
        </div>
        <div class="person2">
          <div class="person-child"></div>
          <div class="sarah-houston">Arman Bahir</div>
          <div class="such-great-information">Wow keep it up</div>
        </div>
        <div class="frame-child"></div>
        <img class="frame-item" alt="" src="./public/ellipse-23@2x.png" />

        <button class="hyf-input" id="hYFInput"></button>
        <!--<button class="activity-button" autofocus="{true}">
          <div class="activity-button-child"></div>
         <img class="smiling-icon" alt="" src="./public/smiling@2x.png" />

          <div class="activity">ACTIVITY</div>
        </button>-->
        <button
          class="photos-button"
          autofocus="{true}"
          accept="image/*"
          id="photosButton"
        >
          <div class="photos-button-child"></div>
          <img class="camera-icon" alt="" src="./public/camera@2x.png" />

          <div class="photos">PHOTO/VIDEO</div>
        </button>
        <!--<button class="live-vid-btn">
          <div class="photos-button-child"></div>
          <img
            class="video-record-icon"
            alt=""
            src="./public/video-record@2x.png"
          />

          <div class="live-video">VIDEO</div>
        </button>-->
      </div>
      <div class="content-share">
        <!--<div class="content-share-child"></div>-->
		<?php
  $db = mysqli_connect("localhost", "root", "", "learnsync");
   
  $result = mysqli_query($db, "SELECT * FROM content_sharing");

     
							
    while ($row = mysqli_fetch_array($result)) { 
	$varic=$row['id'];
	$results=mysqli_query($db, "SELECT * FROM content_sharing where id= $varic");
							$rows = mysqli_fetch_array($results); 
	                        $file_path = "files/" . $rows['address'];
		
		$resultss=mysqli_query($db, "SELECT * FROM content_sharing INNER JOIN registration ON content_sharing.username = registration.username where id= $varic");		
                       							$rowss = mysqli_fetch_array($resultss); 
		               $username = $rowss['name'];
					   if ($row['type'] == "photo") {
                        
                         
	?>
        <div class="post" id="postContainer">
		
          <img class="post-child" alt="" src="./public/ellipse-20@2x.png" />

          <div class="post-item"></div>
		  
	<a href = "<?php echo $file_path; ?>" target="_blank" >
          <img class="post-inner" alt="" src="<?php echo $file_path; ?>"  />

          
          <div class="supervised-learning-algorithms">
          <?php echo $row['description']; ?>           </div>
          
          <div class="john-doe"><?php echo $username; ?></div>
          <div class="post-child2"></div>
          <div class="ellipse-div"></div>
          <div class="participants">Participants</div>
          <div class="div1">72</div>
          <div class="share">
            <img class="share-icon" alt="" src="./public/share@2x.png" />

            <div class="div2">30</div>
          </div>
          <div class="like">
            <img class="fire-icon" alt="" src="./public/fire@2x.png" />

            <div class="div3">12</div>
          </div>
          <div class="dislike">
            <img
              class="icon-favorite-dislike-1-rewar"
              alt=""
              src="./public/-icon-favorite-dislike-1-reward-down-thumb-hand-social-media-dislike-rating.svg"
            />

            <div class="div4">5</div>
          </div>
		  
          <img class="ellipse-icon" alt="" src="./public/ellipse-20@2x.png" />
		  </a>
		  </div>
		<?php }  ?>
         
		
                             
                 <?php     if ($row['type'] == "video") { ?> 
        <div class="photo-post" id="photoPostContainer">
          <div class="photo-post-child"></div>
		  <a target="_blank" href = "<?php echo $file_path; ?>" >
          <img
            class="photo-post-item"
            alt=""
            src="./public/play.jpeg"
          />

          <div class="photo-post-inner"></div>
          <div class="may1">MAY</div>
          <div class="div5">09</div>
          <div class="i-will-be1">
            <?php echo $row['description']; ?>
          </div>
          <div class="john-doe1"><?php echo $username; ?></div>
          <div class="share1">
            <img class="share-icon" alt="" src="./public/share@2x.png" />

            <div class="div2">30</div>
          </div>
          <div class="like1">
            <img class="fire-icon" alt="" src="./public/fire@2x.png" />

            <div class="div3">12</div>
          </div>
          <div class="dislike1">
            <img
              class="icon-favorite-dislike-1-rewar1"
              alt=""
              src="./public/-icon-favorite-dislike-1-reward-down-thumb-hand-social-media-dislike-rating.svg"
            />

            <div class="div8">5</div>
          </div>
          <img
            class="photo-post-child1"
            alt=""
            src="./public/ellipse-20@2x.png"
          />
        
		</a>
		</div>
	<?php }} ?>
	
      </div>
      <div class="nav-bar">
        <div class="nav-bar-child"></div>
        <button class="home-btn" autofocus="{true}" id="Home">
          <div class="home-btn-child"></div>
          <img class="exterior-icon" alt="" src="./public/exterior@2x.png" />
        </button>
        <div class="friends-btn" id="friendsBtnContainer">
          <div class="friends-btn-child"></div>
          <img class="people-icon" alt="" src="./public/people@2x.png" />
        </div>
        <div class="notes-btn" id="notesBtnContainer">
          <div class="notes-btn-child"></div>
          <img class="notes-icon" alt="" src="./public/notes@2x.png" />
        </div>
        <div class="category-btn">
          <div class="friends-btn-child"></div>
          <img class="category-icon" alt="" src="./public/category@2x.png" />
        </div>
        <div class="chat-btn" id="chatBtnContainer">
          <div class="chat-btn-child"></div>
          <img
            class="chat-bubble-icon"
            alt=""
            src="./public/chat-bubble@2x.png"
          />
        </div>
        <div class="clock-btn">
          <div class="friends-btn-child"></div>
          <img class="clock-icon" alt="" src="./public/clock@2x.png" />
        </div>
          <div class="admin-dash-btn" id="admindashBtnContainer" <?php if (!$isModerator) echo 'style="display: none;"'; ?>>
          <div class="admins-dash-btn-child"></div>
          <img class="clock-icon" alt="" src="./public/admin.png" />
        </div>
      </div>
      <img
        class="main-inner"
        alt=""
        src="./public/ellipse-22@2x.png"
        id="ellipseIcon"
      />

      <div class="rectangle-parent" data-animate-on-scroll>
        <div class="frame-inner"></div>
        <div class="frame-child1"></div>
        <div class="frame-child2"></div>
        <div class="frame-child3"></div>
        <div class="frame-child4"></div>
        <img class="logo-icon" alt="" src="./public/logo@2x.png" />

        <div class="frame-child5"></div>
        <img class="search-icon" alt="" src="./public/search@2x.png" />

        <div class="search">Search</div>
        <div class="currently-live">CURRENTLY LIVE</div>
        <img class="frame-child6" alt="" src="./public/ellipse-1@2x.png" />

        <img class="frame-child7" alt="" src="./public/ellipse-5@2x.png" />

        <img class="frame-child8" alt="" src="./public/ellipse-6@2x.png" />

        <img class="frame-child9" alt="" src="./public/ellipse-7@2x.png" />

        <img class="frame-child10" alt="" src="./public/ellipse-12@2x.png" />

        <img class="frame-child11" alt="" src="./public/ellipse-11@2x.png" />

        <img class="frame-child12" alt="" src="./public/ellipse-10@2x.png" />

        <img class="frame-child13" alt="" src="./public/ellipse-4@2x.png" />

        <img class="frame-child14" alt="" src="./public/ellipse-3@2x.png" />

        <img class="frame-child15" alt="" src="./public/ellipse-2@2x.png" />

        <div class="channel-1-live-container">
          <span class="channel-1">Channel 1 </span>
          <span class="live1">LIVE</span>
        </div>
        <div class="channel-2-live-container">
          <span class="channel-1">Channel 2 </span>
          <span class="live1">LIVE</span>
        </div>
        <div class="subscriptions">SUBSCRIPTIONS</div>
        <div class="friends">FRIENDS</div>
        <div class="john-doe2">John Doe</div>
        <div class="darrell-steward">Darrell Steward</div>
        <div class="brooklyn-simmons">Brooklyn Simmons</div>
        <div class="arlene-mccoy">Arlene McCoy</div>
        <div class="jerome-bell">Jerome Bell</div>
        <div class="kathryn-murphy">Kathryn Murphy</div>
        <div class="theresa-webb">Theresa Webb</div>
        <div class="darrell-steward1">Darrell Steward</div>
      </div>
	  <a href = "index.php">
      <div class="logout-button">
        <div class="logout-button-child"></div>
        <div class="logout">LOGOUT</div>
      </div>
	  </a>
    </div>

    <div id="woYMPopup" class="popup-overlay" style="display: none">
	<form action="assign2.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['f_uname'];?>">
      <div class="woym">
        <div class="woym-child"></div>
        <div class="woym-item"></div>
        <img
          class="logo-icon8"
          alt=""
          src="./public/logo2@2x.png"
          id="popuplogoImage"
        />

        <div class="title4">
          <div class="username2"><?php echo $_SESSION['f_uname'];?></div>
        </div>
        <button class="submit5" id="submit">
          <div class="submit-child1"></div>
          <div class="post6">POST</div>
        </button>
        <div class="description7">
          <textarea
            class="description-child1"
            placeholder="ENTER DESCRIPTION"
            autofocus="{true}"
          >
          </textarea>
          <div class="username2">DESCRIPTION</div>
		  </form>
        </div>
        <img
          class="profile-pic-icon1"
          alt=""
          src="./public/profile-pic@2x.png"
        />
      </div>
    </div>

    <div id="photoPopup" class="popup-overlay" style="display: none">
	<form action="assign2.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['f_uname'];?>">
      <div class="photo-popup">
        <div class="photo-popup-child"></div>
        <div class="photo-popup-item"></div>
        <img
          class="logo-icon7"
          alt=""
          src="./public/logo2@2x.png"
          id="popuplogoImage"
        />

        <div class="title3">
          <div class="username1"><?php echo $_SESSION['f_uname'];?></div>
        </div>
        <button class="submit4" id="submit">
          <div class="submit-inner"></div>
          <div class="post5">POST</div>
        </button>
        <div class="upload-container">
          <input class="upload2" required="{true}" type="file" name = "image" id="image" />

          <div class="upload-picture">UPLOAD PICTURE/Video</div>
        </div>
        <div class="description5">
          <textarea
		    name="description"
            class="rectangle-textarea"
            placeholder="ENTER DESCRIPTION"
            autofocus="{true}"
            
          >
          </textarea>
          <div class="username1">DESCRIPTION</div>
        </div>
       <!-- <img
          class="profile-pic-icon"
          alt=""
          src="./public/profile-pic@2x.png"
        />-->
      </div>
    </div>

    <script>
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
      
      var hYFInput = document.getElementById("hYFInput");
      if (hYFInput) {
        hYFInput.addEventListener("click", function () {
          var popup = document.getElementById("woYMPopup");
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
      
      var photosButton = document.getElementById("photosButton");
      if (photosButton) {
        photosButton.addEventListener("click", function () {
          var popup = document.getElementById("photoPopup");
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
      
      
      var chatBtnContainer = document.getElementById("chatBtnContainer");
      if (chatBtnContainer) {
        chatBtnContainer.addEventListener("click", function (e) {
          window.location.href = "./lobby.php";
        });
      }
      var notesBtnContainer = document.getElementById("notesBtnContainer");
      if (notesBtnContainer) {
        notesBtnContainer.addEventListener("click", function (e) {
          window.location.href = "./NoteSharing.php";
        });
      }
      
      var ellipseIcon = document.getElementById("ellipseIcon");
      if (ellipseIcon) {
        ellipseIcon.addEventListener("click", function (e) {
          window.location.href = "./ProfilePage.html";
        });
      }
      var admindashBtnContainer = document.getElementById("admindashBtnContainer");
      if (admindashBtnContainer) {
        admindashBtnContainer.addEventListener("click", function (e) {
          window.location.href = "./admin-dash.php";
        });
      }
      var scrollAnimElements = document.querySelectorAll("[data-animate-on-scroll]");
      var observer = new IntersectionObserver(
        (entries) => {
          for (const entry of entries) {
            if (entry.isIntersecting || entry.intersectionRatio > 0) {
              const targetElement = entry.target;
              targetElement.classList.add("animate");
              observer.unobserve(targetElement);
            }
          }
        },
        {
          threshold: 0.15,
        }
      );
      
      for (let i = 0; i < scrollAnimElements.length; i++) {
        observer.observe(scrollAnimElements[i]);
      }
Filevalidation = () => {
			const fi = document.getElementById('image');
			// Check if any file is selected.
			if (fi.files.length > 0) {
				for (const i = 0; i <= fi.files.length - 1; i++) {

					const fsize = fi.files.item(i).size;
					const file = Math.round((fsize / 1024));
					// The size of the file.
					if (file >= 1024) {
						alert(
		"File too Big, please select a file less than 4mb");
					} else if (file < 2048) {
						alert(
		"File too small, please select a file greater than 2mb");
					} else {
						document.getElementById('size').innerHTML = 
						'<b>'+ file + '</b> KB';
					}
				}
			}
		}
      </script>
  </body>
</html>
