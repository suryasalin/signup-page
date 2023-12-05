<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="..\style\style.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
        <?php 
             
             include("config.php");
             if(isset($_POST['submit'])){
               $email = mysqli_real_escape_string($con,$_POST['email']);
               $password = mysqli_real_escape_string($con,$_POST['password']);

               $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
               $row = mysqli_fetch_assoc($result);

               if(is_array($row) && !empty($row)){
                   $_SESSION['valid'] = $row['Email'];
                   $_SESSION['username'] = $row['Username'];
                   $_SESSION['age'] = $row['Age'];
                   $_SESSION['id'] = $row['Id'];
               }else{
                   echo "<div class='message'>
                     <p>Wrong Username or Password</p>
                      </div> <br>";
                  echo "<a href='index.php'><button class='btn'>Go Back</button>";
        
               }
               if(isset($_SESSION['valid'])){
                   header("Location: profile.php");
               }
             }else{

           
           ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                <form method="post" action="" class="discussion_form" id="discussion_form">
        <div class="discussion_label_div"><span class="discussion_label_span">Title</span><span class="discussion_label_arrow"><span></div>
        <div class="discussion_input_div"><input type="text" name="discussion_title" class="discussion_input" size="50" id="discussion_title"/></div>

        <div class="discussion_label_div"><span class="discussion_label_span">Subject</span><span class="discussion_label_arrow"><span></div>

        <div class="discussion_label_div"><span class="discussion_label_span">Discussion</span><span class="discussion_label_arrow"><span></div>
        <textarea rows="5" cols="50" name="discussion_textarea" class="discussion_input_textarea" placeholder="Open your discussion..." id="discussion_input_textarea"></textarea>
        <input type="button" name="discussion_submit_button" value="Assert" class="share_button" id="discussion_submit_button"/>
        <a href = "login.js> </a>
    </form>
                </div>
                <div class="links">
                    Don't have account? <a href="register.html">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>