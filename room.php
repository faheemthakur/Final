<?php
ob_start();
session_start();
$con = mysqli_connect("localhost", "root", "", "learnsync");
if ($con->connect_error) {
    die("Failed to connect : " . $con->connect_error);
} else {
    $sql = "SELECT * FROM `streams` ;";
    $result = $con->query($sql);
}
$isModerator = false;
$username = $_SESSION['f_uname'];

$query = "SELECT * FROM mod_reg WHERE username = '$username' AND privilege='moderator'";
$res = mysqli_query($con, $query);
$isModerator = mysqli_num_rows($res) > 0;

// Check if the user is a student
$isStudent = false;
$query = "SELECT * FROM registration WHERE username = '$username'AND privilege='student'";
$res = mysqli_query($con, $query);
$isStudent = mysqli_num_rows($res) > 0;
?>

<!DOCTYPE html>
<html>
<head>
<script src="ckeditor/ckeditor.js"></script>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Room</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/main.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='styles/room.css'>
</head>
<body>


    <header id="nav">
       <div class="nav--list">
            <button id="members__button">
               <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 18v1h-24v-1h24zm0-6v1h-24v-1h24zm0-6v1h-24v-1h24z" fill="#ede0e0"><path d="M24 19h-24v-1h24v1zm0-6h-24v-1h24v1zm0-6h-24v-1h24v1z"/></svg>
            </button>
            <!--<a href="lobby.html"/>
                <h3 id="logo">
                    <img src="./images/logo.png" alt="Site Logo">
                    <span>Mumble</span>
                </h3>
            </a>-->
       </div>

        <div id="nav__links">
            <button id="chat__button"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="#ede0e0" clip-rule="evenodd"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-15.667-6l-5.333 4v-4h-3v-14.001l18 .001v14h-9.667zm-6.333-2h3v2l2.667-2h8.333v-10l-14-.001v10.001z"/></svg></button>
            <!-- <a class="nav__link" href="/">
                Lobby
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ede0e0" viewBox="0 0 24 24"><path d="M20 7.093v-5.093h-3v2.093l3 3zm4 5.907l-12-12-12 12h3v10h7v-5h4v5h7v-10h3zm-5 8h-3v-5h-8v5h-3v-10.26l7-6.912 7 6.99v10.182z"/></svg>
            </a> -->

        </div>
        <div>
        <button id="toggle-dash"<?php if (!$isModerator) echo 'style="display: none;"'; ?>>Admin Dashboard</button>
</div>
            <div id="admin-dashboard-popup" class="admin-dashboard-popup">
                <div class="admin-dashboard-content">
                    <h2>Admin Dashboard</h2>
                    <body>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Room Name</th>
        <th scope="col">Time Created</th>
        <th scope="col">Room Link</th> <!-- New column for Room Link -->
        <th scope="col">Actions</th> <!-- Column for Delete Action -->
      </tr>
    </thead>
    <tbody>
      <?php
      while ($rows = $result->fetch_assoc()) {
          // Construct the room link
          $roomCode = $rows['Room_name'];
          echo "
          <tr>
            <td>".$rows['Name']."</td>
            <td>".$rows['Room_name']."</td>
            <td>".$rows['Time_created']."</td>
            <td>
            <form id='lobby__form' data-name='".$rows['Name']."' data-room='".$rows['Room_name']."'>
              <input type='hidden' name='name' value='".$rows['Name']."'>
              <input type='hidden' name='room' value='".$rows['Room_name']."'>
              <button type='submit'>Enter Room</button>
            </form>
          </td>
            <td><a href='delete.php?Room_name=".$rows['Room_name']."'>Delete</a></td>
          </tr>";
      }
      ?>
    </tbody>
  </table>
  <script type="text/javascript" src="js/lobby.js"></script>
                </div>
                <span class="admin-dashboard-close">&times;</span>
            </div>
            <div class="participants-toggle">
                <input type="checkbox" id="toggle-members" class="toggle-input">
                <label for="toggle-members" class="toggle-label">Collapse Participants</label>
            </div>
            <div class="toggle-messages-btn">
            <button id="toggle-messages-btn">Toggle Messages</button>
        </div>
    </header>

    <main class="container">
        <div id="room__container">


            <section id="members__container">
                <div id="members__header">
                    <p>Participants</p>
                    <strong id="members__count">0</strong>
                </div>
                <div id="member__list">
                    <!-- Your member list content goes here -->
                </div>
            </section>

            </section>

            <section id="stream__container">

                <div id="stream__box">
   
                </div>

                <div id="streams__container"></div>
                <form id="editor">

	<textarea name="content" rows="5" cols="8"></textarea>
 <script>
 CKEDITOR.replace('content');
</script>
</form>
                <div class="stream__actions">
                    <button id="camera-btn" class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 4h-3v-1h3v1zm10.93 0l.812 1.219c.743 1.115 1.987 1.781 3.328 1.781h1.93v13h-20v-13h3.93c1.341 0 2.585-.666 3.328-1.781l.812-1.219h5.86zm1.07-2h-8l-1.406 2.109c-.371.557-.995.891-1.664.891h-5.93v17h24v-17h-3.93c-.669 0-1.293-.334-1.664-.891l-1.406-2.109zm-11 8c0-.552-.447-1-1-1s-1 .448-1 1 .447 1 1 1 1-.448 1-1zm7 0c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0-2c-2.761 0-5 2.239-5 5s2.239 5 5 5 5-2.239 5-5-2.239-5-5-5z"/></svg>
                    </button>
                    <button id="mic-btn" class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c1.103 0 2 .897 2 2v7c0 1.103-.897 2-2 2s-2-.897-2-2v-7c0-1.103.897-2 2-2zm0-2c-2.209 0-4 1.791-4 4v7c0 2.209 1.791 4 4 4s4-1.791 4-4v-7c0-2.209-1.791-4-4-4zm8 9v2c0 4.418-3.582 8-8 8s-8-3.582-8-8v-2h2v2c0 3.309 2.691 6 6 6s6-2.691 6-6v-2h2zm-7 13v-2h-2v2h-4v2h10v-2h-4z"/></svg>
                    </button>
                    <button id="screen-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 1v17h24v-17h-24zm22 15h-20v-13h20v13zm-6.599 4l2.599 3h-12l2.599-3h6.802z"/></svg>
                    </button>
                    <button id="record-btn">Start recording</button>
                    <button id="stop-record-btn">Stop recording</button>
                    <button id="download-btn">Download</button>
                    <button id="leave-btn" style="background-color: #FF5050;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 10v-5l8 7-8 7v-5h-8v-4h8zm-16-8v20h14v-2h-12v-16h12v-2h-14z"/></svg>
                    </button>
                </div>


                <button id="join-btn">Join Stream</button>
            </section>

            <section id="messages__container">
                <div id="messages"></div>
                <form id="message__form">
                    <input type="text" name="message" placeholder="Send a message...." />
                </form>
            </section>
            
        </div>
    </main>
    
</body>
<script type="text/javascript" src="js/AgoraRTC_N-4.11.0.js"></script>
<script type="text/javascript" src="js/agora-rtm-sdk-1.4.4.js"></script>
<script type="text/javascript" src="js/room.js"></script>
<script type="text/javascript" src="js/room_rtm.js"></script>
<script type="text/javascript" src="js/room_rtc.js"></script>
<script type="text/javascript" src="js/admin-popup.js"></script>
</html>