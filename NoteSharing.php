<?php
ob_start ();
session_start();
require "php/config.php";
require_once "php/functions.php";
$mod=$_GET['mod'];

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
    <link rel="stylesheet" href="./NoteSharing.css?<?php echo time();?>" />
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
      href="https://fonts.googleapis.com/css2?family=Goldman:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Kadwa:wght@400&display=swap"
    />
  </head>
  <body>
    <div class="note-sharing">
      <div class="background">
        <img class="back2-icon" alt="" src="./public/back2.svg" />

        <div class="back1"></div>
      </div>
      <div class="nav-bar">
        <div class="nav-bar-child"></div>
        <button class="home-btn2" autofocus="{true}" id="Home">
          <div class="home-btn-inner"></div>
          <img class="exterior-icon2" alt="" src="./public/exterior@2x.png" />
        </button>
        <div class="friends-btn2">
          <div class="friends-btn-inner"></div>
          <img class="people-icon3" alt="" src="./public/people@2x.png" />
        </div>
        <div class="notes-btn2" id="notesBtnContainer">
          <div class="notes-btn-inner"></div>
          <img class="notes-icon2" alt="" src="./public/notes@2x.png" />
        </div>
        <div class="category-btn2">
          <div class="friends-btn-inner"></div>
          <img class="category-icon2" alt="" src="./public/category@2x.png" />
        </div>
				  

        <div class="chat-btn2">
          <div class="chat-btn-inner"></div>
          <img
            class="chat-bubble-icon2"
            alt=""
            src="./public/chat-bubble@2x.png"
          />
        </div>
        <div class="clock-btn2">
          <div class="friends-btn-inner"></div>
          <img class="clock-icon2" alt="" src="./public/clock@2x.png" />
        </div>
      </div>
      <select class="course-selector" required="{true}">
        <option value="Artificial Intelligence">Artificial Intelligence</option>
        <option value="Compiler Design">Compiler Design</option>
        <option value="FLAT">FLAT</option>
      </select>
      <div class="friend-list">
        <div class="friend-list-child"></div>
        <div class="friend-list-item"></div>
        
        
        <img
          class="logo-icon4"
          alt=""
          src="./public/logo@2x.png"
          id="logoImage"
        />

        <div class="friend-list-child3"></div>
        <img class="search-icon4" alt="" src="./public/search@2x.png" />

        <div class="search4">Search</div>
        <div class="currently-live3">CURRENTLY LIVE</div>
        <!--<img
          class="friend-list-child4"
          alt=""
          src="./public/ellipse-1@2x.png"
        />

        <img
          class="friend-list-child5"
          alt=""
          src="./public/ellipse-5@2x.png"
        />

        <img
          class="friend-list-child6"
          alt=""
          src="./public/ellipse-6@2x.png"
        />

        <img
          class="friend-list-child7"
          alt=""
          src="./public/ellipse-7@2x.png"
        />

        <img
          class="friend-list-child8"
          alt=""
          src="./public/ellipse-12@2x.png"
        />

        <img
          class="friend-list-child9"
          alt=""
          src="./public/ellipse-11@2x.png"
        />

        <img
          class="friend-list-child10"
          alt=""
          src="./public/ellipse-10@2x.png"
        />

        <img
          class="friend-list-child11"
          alt=""
          src="./public/ellipse-4@2x.png"
        />

        <img
          class="friend-list-child12"
          alt=""
          src="./public/ellipse-3@2x.png"
        />

        <img
          class="friend-list-child13"
          alt=""
          src="./public/ellipse-2@2x.png"
        />-->

        <div class="channel-1-live-container3">
          <span class="channel-13">Channel 1 </span>
          <span class="live8">LIVE</span>
        </div>
        <div class="channel-2-live-container3">
          <span class="channel-13">Channel 2 </span>
          <span class="live8">LIVE</span>
        </div>
       <!-- <div class="subscriptions3">SUBSCRIPTIONS</div>
        <div class="friends3">FRIENDS</div>
        <div class="john-doe6">John Doe</div>
        <div class="darrell-steward6">Darrell Steward</div>
        <div class="brooklyn-simmons3">Brooklyn Simmons</div>
        <div class="arlene-mccoy3">Arlene McCoy</div>
        <div class="jerome-bell5">Jerome Bell</div>
        <div class="kathryn-murphy3">Kathryn Murphy</div>
        <div class="theresa-webb3">Theresa Webb</div>
        <div class="darrell-steward7">Darrell Steward</div>
      </div>-->
	  
      		  
<div class="notes-sharing2">NOTES SHARING</div>
      <div class="post-share-section">
	      <div class="post-main-div" id="Post Main Div"></div>
    <?php
  $db = mysqli_connect("localhost", "root", "", "learnsync");
   
  $result = mysqli_query($db, "SELECT * FROM notes_table");

     
							
    while ($row = mysqli_fetch_array($result)) { 
	$varic=$row['id'];
	$results=mysqli_query($db, "SELECT * FROM notes_table where id= $varic");
							$rows = mysqli_fetch_array($results); 
	                        $file_path = "images/" . $rows['user_image'];
		
		$resultss=mysqli_query($db, "SELECT * FROM notes_table INNER JOIN registration ON notes_table.username = registration.username where id= $varic");		
                       							$rowss = mysqli_fetch_array($resultss); 
		               $username = $rowss['name'];
	?>
	
         <!-- <div class="post-share-section">
	       <div class="post-main-div" id="Post Main Div"></div> -->
             
         <div class="post5">
        <a href = "<?php echo $file_path; ?>" target="_blank">
      <img class="post-child21" alt="" src="./public/ellipse-20@2x.png" />
        <div class="post-background"></div>
		<?php if ($row['subject']=="Compiler Design") {
         echo "<img   src='images/compiler_design.png' class='post-child22' >";
          }
          if ($row['subject']=="Artificial Intelligence") {
             echo "<img   src='images/artificial_intelligence.png' class='post-child22' >";
                }
               if ($row['subject']=="FLAT") {
                 echo "<img   src='images/flat.jpeg' class='post-child22' >";
                     }

            ?>
          <!--<img
            class="post-child22"
            alt=""
            src="./public/rectangle-115@2x.png"
          />

          <div class="date">
            <div class="date-child"></div>
            <div class="may5">MAY</div>
            <div class="div21">09</div>
          </div>-->
          <div class="supervised-learning-algorithms4">
           <?php echo $row['user_title']; ?>          
          </div>
          <div class="the-following-are3">
                <?php echo $row['description']; ?>
          </div>
          <div class="john-doe7"><?php echo $username; ?></div>
		   
        </a>
        </div>
<?php }  ?>
        </div>
	  				 

      <button class="add-btn1" id="add" <?php if ($mod==1) echo 'style="display: none;"'; ?>>
        <div class="bg"></div>
        <img class="plus-icon1" alt="" src="./public/plus@2x.png" />
      </button>
    </div>

    <div id="framePopup" class="popup-overlay" style="display: none">
      <div class="rectangle-root">
        <div class="frame-child45"></div>
        <div class="frame-child46"></div>
        <!--<img
          class="logo-icon5"
          alt=""
          src="./public/logo2@2x.png"
          id="popuplogoImage"
        />-->
		<form action="assign.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['f_uname'];?>">
        <div class="title">
          <input
            class="title-child"
            name="title"
            placeholder="ENTER TITLE"
            type="text"
          />

          <div class="title1">TITLE</div>
        </div>
        <div class="domain-parent">
          <select name="subject" id="subject" class="domain" autofocus="{true}" >
            <option value="Artificial Intelligence">
              Artificial Intelligence
            </option>
            <option value="FLAT">FLAT</option>
            <option value="Compiler Design">Compiler Design</option>
          </select>
          <div class="domain1">DOMAIN</div>
        </div>
        <button class="submit" id="submit">
          <div class="submit-child"></div>
          <div type="submit" name="submit" value="Submit" class="submit1">SUBMIT</div>
        </button>
        <div class="upload-parent">
          <input class="upload" required="{true}" type="file" name = "image" />

          <div class="upload-file">UPLOAD FILE</div>
        </div>
        <!--<div class="author">
          <input name="name"
            class="author-child"
            placeholder="ENTER AUTHOR NAME"
            type="text"
          />

          <div class="title1">AUTHOR</div>
        </div>-->
        <div class="description2">
          <textarea
		    name="description"
            class="description-item"
            placeholder="ENTER DESCRIPTION"
            autofocus="{true}"
            
          >
          </textarea>
          <div class="title1">DESCRIPTION</div>
        </div>
      </div>
    </div>

    <script>
      var popuplogoImage = document.getElementById("popuplogoImage");
      if (popuplogoImage) {
        popuplogoImage.addEventListener("click", function (e) {
          window.location.href = "./Frame.html";
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
      
      var homeBtn = document.getElementById("Home");
      if (homeBtn) {
        homeBtn.addEventListener("click", function (e) {
          window.location.href = "./index2.php";
        });
      }
      
      var notesBtnContainer = document.getElementById("notesBtnContainer");
      if (notesBtnContainer) {
        notesBtnContainer.addEventListener("click", function (e) {
          window.location.href = "./Frame9.html";
        });
      }
      
      var logoImage = document.getElementById("logoImage");
      if (logoImage) {
        logoImage.addEventListener("click", function (e) {
          window.location.href = "./Frame.html";
        });
      }
      
      var addBtn = document.getElementById("add");
      if (addBtn) {
        addBtn.addEventListener("click", function () {
          var popup = document.getElementById("framePopup");
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
      </script>
  </body>
</html>
