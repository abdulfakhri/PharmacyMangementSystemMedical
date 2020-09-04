<!DOCTYPE html>
<html>
<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /spages/login.php');
}
include('../c/db/connection.php');
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 80px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
<?php

if(isset($_POST['chat'])) {


        $name = $_SESSION['name'];
	$username = $_SESSION['username'];
	$message = $_POST['msg'];
	
	
	

	
          $sql="INSERT INTO chat_messages(user,userid,message) VALUES('$name','$username','$message')";
			
		
		
	if (mysqli_query($mysqli, $sql)) {
    //echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
          $to = "inc.academy.share@gmail.com";
          $subject = "DrugStore System Client Sent You A Message";
          $txt = $message;
          $headers = "From: system@irontin.com" . "\r\n" .
          "CC: contact@irontin.com";

          mail($to,$subject,$txt,$headers);      
		 $msg="Message Sent";
		 
       // header('Refresh: 0.01; url=/v/home.php');
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    echo "Not Registered, Try Again Now";
    header('Refresh: 0.01; url=/spages/signup.php');
}

mysqli_close($mysqli);
	
}
       
?>


<button class="open-button" onclick="openForm()">Chat With System</button>

<div class="chat-popup" id="myForm">
  <form method="POST" action="" class="form-container">
    <p></p>
    <hr>
    
    <hr>
     <?php echo $msg; ?>
    
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn" name="chat">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>


<!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>