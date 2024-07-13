<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";
$_SESSION['comment_user_name'] = $_SESSION['f_uname'];
$_SESSION['profile_name'] = $_SESSION['f_uname'];
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

}

                       

?>
<!DOCTYPE html>
<html>
<?php //if ($home==1) { ?>
<script type="text/javascript">
      window.history.forward();
    </script>
<?php //}?>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global2.css" />
    <link rel="stylesheet" href="./index2.css?<?php echo time();?>F" />
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
    <div class="main">
      <div class="main-child"></div>
      <div class="main-item"></div>
    <!--  <img class="doorbell-icon" alt="" src="./public/doorbell@2x.png" />-->

      <div class="adam-parent">
        <div class="adam"><?php echo $_SESSION['f_uname'];?></div>
       <!-- <div class="live">
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
        </div>-->
        <!--<div class="person">
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
        </div>-->
        <div class="wym" <?php if ($isModerator) echo 'style="display: none;"'; ?>>
          <div class="wym-child"></div>
          <img class="wym-item" alt="" src="profile_pics/<?php echo $profile_pic; ?>" />

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

            <div class="photos">PHOTOS</div>
          </button>
          <button class="live-vid-btn" id="liveVidBtn">
            <div class="photos-button-child"></div>
            <img
              class="video-record-icon"
              alt=""
              src="./public/video-record@2x.png"
            />

            <div class="live-video">VIDEO</div>
          </button>
        </div>
      </div>
	  <div class="rectangle-parent" data-animate-on-scroll>
        <div class="frame-child"></div>
        <img class="logo-icon" alt="" src="./public/logo@2x.png" />

        <div class="frame-item"></div>
        <img class="search-icon" alt="" src="./public/search@2x.png" />

        <div class="search">Search</div>
        <div class="currently-live">CURRENTLY LIVE</div>
        <img class="frame-inner" alt="" src="./public/ellipse-1@2x.png" />

        <img class="frame-child1" alt="" src="./public/ellipse-2@2x.png" />

        <div class="channel-1-live-container">
          <span class="channel-1">Channel 1 </span>
          <span class="live1">LIVE</span>
        </div>
        <div class="channel-2-live-container">
          <span class="channel-1">Channel 2 </span>
          <span class="live1">LIVE</span>
        </div>
      </div>
      <div class="content-share" <?php if ($isModerator) echo 'style="top: 100px;height: 723px;"'; ?>>
        <!--<div class="content-share-child"></div>-->
		<?php
  $db = mysqli_connect("localhost", "root", "", "learnsync");
   
  $result = mysqli_query($db, "SELECT * FROM content_sharing");

     
							
    while ($row = mysqli_fetch_array($result)) { 
	$varic=$row['id'];
	$results=mysqli_query($db, "SELECT * FROM content_sharing where id= $varic");
							$rows = mysqli_fetch_array($results); 
							$likes=$rows['likes'];
	                        $dislikes=$rows['dislikes'];
	                        $file_path = "files/" . $rows['address'];
		
		$resultss=mysqli_query($db, "SELECT * FROM content_sharing INNER JOIN registration ON content_sharing.username = registration.username where id= $varic");		
                       							$rowss = mysqli_fetch_array($resultss); 
		               $username = $rowss['name'];
					   $content_profile_pic=$rowss['profile_photo'];
					   if ($row['type'] == "photo") {
                        
                         
	?>
        <div class="post">
          <img class="post-child" alt="" src="./public/ellipse-20@2x.png" />
<a href = "<?php echo $file_path; ?>" target="_blank" >
          <div class="post-item"></div>
          <!--<div class="post-inner"></div>
          <div class="may">MAY</div>
          <div class="div">09</div>-->
          <div class="hyperlink" >
            <img
              class="hyperlink-child"
              alt=""
              src="<?php echo $file_path; ?>"
            />

            <div class="supervised-learning-algorithms">
              <?php echo $row['description']; ?>            </div>
            <!--<div class="thu-1000pm">Thu 10:00pm | Zoom Meeting</div>
            <div class="i-will-be">
              I will be covering the supervised learning algorithms on Thursday
              May 10th at 10:00pm
            </div>-->
          </div>
          <div class="john-doe"><?php echo $username; ?></div>
          <!--<div class="post-child1"></div>
          <div class="ellipse-div"></div>
          <div class="participants">Participants</div>
          <div class="div1">72</div>-->
          
          <div class="like">
            <img class="fire-icon" alt="" src="./public/fire@2x.png" />

            <div class="div3"><?php echo $likes; ?></div>
          </div>
          <div class="dislike">
            <img
              class="icon-favorite-dislike-1-rewar"
              alt=""
              src="./public/-icon-favorite-dislike-1-reward-down-thumb-hand-social-media-dislike-rating.svg"
            />

            <div class="div4"><?php echo $dislikes; ?></div>
          </div>
          <img class="ellipse-icon" alt="" src="profile_pics/<?php echo $content_profile_pic; ?>" />
		  </a>
		  <a href = "CommentPg1.php?id=<?php echo $varic; ?>&mod_is=<?php echo $mod_is; ?>"  >
          <button class="comment-btn" >
            <div class="comment-btn-child"></div>
            <div class="comments">COMMENTS</div>
          </button>
		  	</a>	  

        </div>
	<?php } ?>
<?php     if ($row['type'] == "video") { ?> 
        <div class="photo-post">
          <div class="photo-post-child"></div>
		  <a target="_blank" href = "<?php echo $file_path; ?>" >
          <!--<div class="hyperlink2" id="hyperlink2Container">-->
            <img
              class="hyperlink2-child"
              alt=""
              src="./public/play.jpeg"
            />

           <!-- <div class="hyperlink2-item"></div>
            <div class="may1">MAY</div>
            <div class="div5">09</div>-->
            <div class="i-will-be1">
             <?php echo $row['description']; ?>
            </div>
          <!--</div>-->
          <div class="john-doe1"><?php echo $username; ?></div>
          
          <div class="like1">
            <img class="fire-icon" alt="" src="./public/fire@2x.png" />

            <div class="div3"><?php echo $likes; ?></div>
          </div>
          <div class="dislike1">
            <img
              class="icon-favorite-dislike-1-rewar1"
              alt=""
              src="./public/-icon-favorite-dislike-1-reward-down-thumb-hand-social-media-dislike-rating1.svg"
            />

            <div class="div8"><?php echo $dislikes; ?></div>
          </div>
          <img
            class="photo-post-item"
            alt=""
            src="profile_pics/<?php echo $content_profile_pic; ?>"
          />
               </a>
           <a href = "CommentPg11.php?id=<?php echo $varic; ?>&mod_is=<?php echo $mod_is; ?>"  >
          <button class="comment-btn1" autofocus="{true}" >
            <div class="comment-btn-child"></div>
            <div class="comments">COMMENTS</div>
          </button>
		  </a>
        </div>
		<?php } ?>
		<?php     if ($row['type'] == "text") { ?> 

        <div class="wym-post">
          <div class="photo-post-child"></div>
          
          <div class="like1">
            <img class="fire-icon" alt="" src="./public/fire@2x.png" />

            <div class="div3"><?php echo $likes; ?></div>
          </div>
          <div class="dislike1">
            <img
              class="icon-favorite-dislike-1-rewar1"
              alt=""
              src="./public/-icon-favorite-dislike-1-reward-down-thumb-hand-social-media-dislike-rating1.svg"
            />

            <div class="div8"><?php echo $dislikes; ?></div>
          </div>
          <!--<div class="hyperlink3" id="hyperlink3Container">
            <div class="date">
              <div class="date-child"></div>
              <div class="may2">MAY</div>
              <div class="div12">09</div>
            </div>-->
            <div class="i-will-be2">
              <?php echo $row['description']; ?>
            </div>
            <div class="john-doe2"><?php echo $username; ?></div>
            <img
              class="hyperlink3-child"
              alt=""
              src="profile_pics/<?php echo $content_profile_pic; ?>"
            />
           <!--</div>-->
		  </a>
	       <a href = "CommentPg3.php?id=<?php echo $varic; ?>&mod_is=<?php echo $mod_is; ?>"  >
          <button class="comment-btn2" >
            <div class="comment-btn-child"></div>
            <div class="comments">COMMENTS</div>
          </button>
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
        
        <div class="notes-btn" id="notesBtnContainer">
          <div class="notes-btn-child"></div>
          <img class="notes-icon" alt="" src="./public/notes@2x.png" />
        </div>
        
        <div class="chat-btn" id="chatBtnContainer">
          <div class="chat-btn-child"></div>
          <img
            class="chat-bubble-icon"
            alt=""
            src="./public/chat-bubble@2x.png"
          />
        </div>
        
		<div class="admin-dash-btn" id="admindashBtnContainer" <?php if (!$isModerator) echo 'style="display: none;"'; ?>>
          <div class="admins-dash-btn-child"></div>
          <img class="clock-icon" alt="" src="./public/admin.png" />
        </div>
      </div>
      <img
        class="main-inner" <?php if ($isModerator) echo 'style="display: none;"'; ?>
        alt=""
        src="profile_pics/<?php echo $profile_pic; ?>"
        id="ellipseIcon"
      />

      <a href = "index.php">
      <div class="logout-button">
        <div class="logout-button-child"></div>
        <div class="logout">LOGOUT</div>
      </div>
	  </a>
    </div>

    <div id="woYMPopup" class="popup-overlay" style="display: none">
	<form action="assign6.php" method="POST" enctype="multipart/form-data">
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

        <div class="title3">
          <div class="username1"><?php echo $_SESSION['f_uname'];?></div>
        </div>
        <button class="submit4" id="submit">
          <div class="submit-inner"></div>
          <div class="post6">POST</div>
        </button>
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
        <img
          class="profile-pic-icon1"
          alt=""
          src="profile_pics/<?php echo $profile_pic; ?>"
        />
		</form>
      </div>
    </div>

    <div id="photoPopup" class="popup-overlay" style="display: none">
	<form action="assign2.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['f_uname'];?>">
      <div class="photo-popup">
        <div class="photo-popup-child"></div>
        <div class="photo-popup-item"></div>
        <img
          class="logo-icon10"
          alt=""
          src="./public/logo2@2x.png"
          id="popuplogoImage"
        />

        <div class="title5">
          <div class="username3"><?php echo $_SESSION['f_uname'];?></div>
        </div>
        <button class="submit6" id="submit">
          <div class="submit-child2"></div>
          <div class="post8">POST</div>
        </button>
        <div class="upload-parent1">
          <div class="upload3" required="{true}">
            <label class="label3" for="file-410:205">
<div class="upload-child1" style="text-align:center">Click to Upload</div>            </label>
            <input class="input3" type="file" name = "image" id="file-410:205" />
          </div>
          <div class="upload-picture">UPLOAD PICTURE</div>
        </div>
        <div class="description9">
          <textarea
		  name="description"
            class="description-child2"
            placeholder="ENTER DESCRIPTION"
            autofocus="{true}"
            
          >
          </textarea>
          <div class="username3">DESCRIPTION</div>
		  </form>
        </div>
        <img
          class="profile-pic-icon3"
          alt=""
          src="profile_pics/<?php echo $profile_pic; ?>"
        />
      </div>
    </div>

    <div id="vidPopup" class="popup-overlay" style="display: none">
      <div class="vid-popup">
        <div class="vid-popup-child"></div>
        <div class="vid-popup-item"></div>
        <img
          class="logo-icon9"
          alt=""
          src="./public/logo2@2x.png"
          id="popuplogoImage"
        />

        <div class="title4">
          <div class="username2">USERNAME</div>
        </div>
        <button class="submit5" id="submit">
          <div class="submit-child1"></div>
          <div class="post7">POST</div>
        </button>
        <div class="upload-container">
          <div class="upload2" required="{true}">
            <label class="label2" for="file-455:52">
              <div class="upload-inner"></div>
            </label>
            <input class="input2" type="file" id="file-455:52" />
          </div>
          <div class="upload-video">UPLOAD VIDEO</div>
        </div>
        <div class="description7">
          <textarea
            class="description-child1"
            placeholder="ENTER DESCRIPTION"
            autofocus="{true}"
            form
          >
          </textarea>
          <div class="username2">DESCRIPTION</div>
        </div>
        <img
          class="profile-pic-icon2"
          alt=""
          src="./public/profile-pic@2x.png"
        />
      </div>
    </div>

    <div id="commentPopup" class="popup-overlay" style="display: none">
      <div class="comment-popup">
        <div class="comment-popup-child"></div>
        <img
          class="comment-popup-item"
          alt=""
          src="./public/rectangle-115@2x.png"
        />

        <div class="supervised-learning-algorithms6">
          Supervised Learning Algorithms
        </div>
        <div class="john-doe11">John Doe</div>
        <img
          class="comment-popup-inner"
          alt=""
          src="./public/ellipse-20@2x.png"
        />

        <div class="i-will-be4">
          I will be covering the supervised learning algorithms on Thursday May
          10th at 10:00pm
        </div>
        <button class="share5">
          <img class="share-icon8" alt="" src="./public/share@2x.png" />

          <div class="div32">30</div>
        </button>
        <button class="dislike4">
          <div class="div33">5</div>
          <img
            class="icon-thumbs-down"
            alt=""
            src="./public/-icon-thumbs-down.svg"
          />
        </button>
        <button class="like4">
          <img class="fire-icon7" alt="" src="./public/fire@2x.png" />

          <div class="div34">12</div>
        </button>
        <div class="comment-popup-child1"></div>
        <div class="comment-popup-child2"></div>
        <div class="participants4">Participants</div>
        <div class="div35">72</div>
        <div class="comment-section">
          <div class="comment-section-child"></div>
          <div class="comments3">COMMENTS</div>
          <div class="comment-read">
            <div class="comment-read-section"></div>
            <div class="comment1">
              <div class="comment1-child"></div>
              <div class="john-doe12">John Doe</div>
              <img
                class="comment1-item"
                alt=""
                src="./public/ellipse-20@2x.png"
              />

              <div class="div36">10/10/2023</div>
              <div class="comments-description">comments description</div>
            </div>
          </div>
          <input
            class="comment-write"
            placeholder="Enter you comments here"
            type="text"
            alt
          />

          <button class="send-btn">
            <div class="send"></div>
            <img class="icon-send" alt="" src="./public/-icon-send.svg" />
          </button>
        </div>
      </div>
    </div>

    <div id="commentPopup2" class="popup-overlay" style="display: none">
      <div class="comment-popup-2">
        <div class="comment-popup-2-child"></div>
        <img
          class="comment-popup-2-item"
          alt=""
          src="./public/rectangle-115@2x.png"
        />

        <div class="supervised-learning-algorithms7">
          Supervised Learning Algorithms
        </div>
        <div class="john-doe13">John Doe</div>
        <img
          class="comment-popup-2-inner"
          alt=""
          src="./public/ellipse-20@2x.png"
        />

        <button class="share6">
          <img class="share-icon9" alt="" src="./public/share@2x.png" />

          <div class="div37">30</div>
        </button>
        <button class="dislike5">
          <div class="div38">5</div>
          <img
            class="icon-thumbs-down1"
            alt=""
            src="./public/-icon-thumbs-down.svg"
          />
        </button>
        <button class="like5">
          <img class="fire-icon8" alt="" src="./public/fire@2x.png" />

          <div class="div39">12</div>
        </button>
        <div class="comment-section1">
          <div class="comment-section-item"></div>
          <div class="comments4">COMMENTS</div>
          <div class="cmt-read">
            <div class="comment-read-section1"></div>
            <div class="comment11">
              <div class="comment1-inner"></div>
              <div class="john-doe14">John Doe</div>
              <img
                class="comment1-child1"
                alt=""
                src="./public/ellipse-20@2x.png"
              />

              <div class="div40">10/10/2023</div>
              <div class="comments-description1">comments description</div>
            </div>
          </div>
        </div>
        <input
          class="comment-write1"
          placeholder="Enter you comments here"
          type="text"
          alt
        />

        <button class="send-btn1">
          <div class="send1"></div>
          <img class="icon-send1" alt="" src="./public/-icon-send.svg" />
        </button>
      </div>
    </div>

    <div id="commentPopup3" class="popup-overlay" style="display: none">
      <div class="comment-popup-3">
        <div class="comment-popup-3-child"></div>
        <div class="john-doe15">John Doe</div>
        <img
          class="comment-popup-3-item"
          alt=""
          src="./public/ellipse-202@2x.png"
        />

        <div class="div41">10/10/2023</div>
        <button class="share7">
          <img class="share-icon10" alt="" src="./public/share@2x.png" />

          <div class="div42">30</div>
        </button>
        <button class="dislike6">
          <div class="div43">5</div>
          <img
            class="icon-thumbs-down2"
            alt=""
            src="./public/-icon-thumbs-down.svg"
          />
        </button>
        <button class="like6">
          <img class="fire-icon9" alt="" src="./public/fire@2x.png" />

          <div class="div44">12</div>
        </button>
        <div class="comment-section2">
          <div class="comment-section-inner"></div>
          <div class="comments5">COMMENTS</div>
          <div class="comment-read1">
            <div class="comment-read-section2"></div>
            <div class="comment12">
              <div class="comment1-child2"></div>
              <div class="john-doe16">John Doe</div>
              <img
                class="comment1-child3"
                alt=""
                src="./public/ellipse-20@2x.png"
              />

              <div class="div45">10/10/2023</div>
              <div class="comments-description2">comments description</div>
            </div>
          </div>
        </div>
        <div class="text">
          <div class="text-child"></div>
          <div class="post-description">post description</div>
        </div>
        <input
          class="comment-write2"
          placeholder="Enter you comments here"
          type="text"
          alt
        />

        <button class="send-btn2">
          <div class="send2"></div>
          <img class="icon-send2" alt="" src="./public/-icon-send.svg" />
        </button>
      </div>
    </div>

    <script>
	var admindashBtnContainer = document.getElementById("admindashBtnContainer");
      if (admindashBtnContainer) {
        admindashBtnContainer.addEventListener("click", function (e) {
          window.location.href = "./admin-dash.php";
        });
      }
	var chatBtnContainer = document.getElementById("chatBtnContainer");
      if (chatBtnContainer) {
        chatBtnContainer.addEventListener("click", function (e) {
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
      
      var liveVidBtn = document.getElementById("liveVidBtn");
      if (liveVidBtn) {
        liveVidBtn.addEventListener("click", function () {
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
      
      var hyperlinkContainer = document.getElementById("hyperlinkContainer");
      if (hyperlinkContainer) {
        hyperlinkContainer.addEventListener("click", function (e) {
          window.location.href = "./Frame5.html";
        });
      }
      
      var commentBtn = document.getElementById("commentBtn");
      if (commentBtn) {
        commentBtn.addEventListener("click", function () {
          var popup = document.getElementById("commentPopup");
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
      
      var hyperlink2Container = document.getElementById("hyperlink2Container");
      if (hyperlink2Container) {
        hyperlink2Container.addEventListener("click", function (e) {
          window.location.href = "./Frame5.html";
        });
      }
      
      var commentBtn1 = document.getElementById("commentBtn1");
      if (commentBtn1) {
        commentBtn1.addEventListener("click", function () {
          var popup = document.getElementById("commentPopup2");
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
      
      var hyperlink3Container = document.getElementById("hyperlink3Container");
      if (hyperlink3Container) {
        hyperlink3Container.addEventListener("click", function (e) {
          window.location.href = "./Frame5.html";
        });
      }
      
      var commentBtn2 = document.getElementById("commentBtn2");
      if (commentBtn2) {
        commentBtn2.addEventListener("click", function () {
          var popup = document.getElementById("commentPopup3");
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
      
      var friendsBtnContainer = document.getElementById("friendsBtnContainer");
      if (friendsBtnContainer) {
        friendsBtnContainer.addEventListener("click", function (e) {
          window.location.href = "./Frame5.html";
        });
      }
      
      var notesBtnContainer = document.getElementById("notesBtnContainer");
      if (notesBtnContainer) {
        notesBtnContainer.addEventListener("click", function (e) {
          window.location.href = "./NoteSharing2.php?mod=<?php echo $mod_is; ?>";
        });
      }
      
      var ellipseIcon = document.getElementById("ellipseIcon");
      if (ellipseIcon) {
        ellipseIcon.addEventListener("click", function (e) {
          window.location.href = "./ProfilePage.php?user_name=<?php echo $_SESSION['f_uname'];?>";
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
      </script>
  </body>
</html>
