<?php
require_once("config/db_config.php");
if($dbh){
$message = "";
if(isset($_POST['submit'])){
    
   


    $sql = 'INSERT INTO `admin`(`name`, `email`, `phone`, `password`, `image`) VALUES (:name, :email, :phone, :password, :image)';
    $stmt = $dbh->prepare($sql);

  
    
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':phone', $_POST['mobile']);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':image', $image);
    /**
     * File Upload
     */
    
    $t_dir = 'uploads/admin/';
    $temp = explode(".", $_FILES["image"]["name"]);
    $t_file = $t_dir . round(microtime(true)) . '.' . end($temp); /// random image name with current time
    if(move_uploaded_file($_FILES['image']['tmp_name'], $t_file)){
        $image = $t_file;
        /**
         * password match
         */
        if(!empty($_POST['password'] == $_POST['confirmpassword'])){
            /**
             * password Encription
             */
            $password = md5($_POST['password']);
            /**
             * Execute Query
             */
            if($stmt->execute()){
                $message = "Success!";
                header("Location:index.php");
            }
            else{
                $message = "!Ops Something wrong, please try again!!";
                // header("Location:register.php");
            }
        }
        else{
            $message = "Password not match!";
            // header("Location:register.php");
        }
    }
    else{
        $message = "!Ops image upload Fail.";
        // header("Location:register.php");
    }



    

}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register -  Admin</title>
  
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        
      </div>
      <div class="login-box2">
        <!-- <form action="" method="post" enctype="multipart/form-data"> -->
          
       
        <form name="regForm" action="" method="post" class="login-form" onsubmit="return validateForm()" enctype="multipart/form-data">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-users"></i>Register</h3>
           <div class="message text-danger"><?php if($message!="") { echo $message; } ?></div> 
          <div class="form-group">
            <label class="control-label">USERNAME <span class="text-danger">*</span></label>
            <input type="text" name="name" id="" class="form-control" placeholder="Name" autocomplete="off"
          
          </div>

          <div class="form-group">
            <label class="control-label">USER EMAIL <span class="text-danger">*</span></label>
            <input type="email" name="email" id="email_address" class="form-control " required placeholder="Email"
             data-parsley-type="email" data-parsley-trigger="focusout" data-parsley-checkemail 
             data-parsley-checkemail-message="Email Address already Exists" autocomplete="off" >
          </div>

          <div class="form-group">
            <label class="control-label">MOBILE <span class="text-danger">*</span></label>
            <input type="tel" name="mobile" id="" class="form-control" placeholder="Mobile Number"  autocomplete="off" >
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD <span class="text-danger">*</span></label>
            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" id="password"  >
          </div>
          <div class="form-group">
            <label class="control-label">RE-TYPE PASSWORD <span class="text-danger">*</span></label>
            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="RE-type Password" autocomplete="off"  >
            <span id='message'></span>
          </div>
          <div class="form-group">
            <label class="control-label">Image <span class="text-danger">*</span></label>
            <input type="file" name="image" id="" class="form-control" >
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN UP</button>
          </div>

        </form>
        <a href="index.php">Already have an account? Sign in Here</a>
      </div>
      
    </section>

   
    <!-- Essential javascripts for application to work-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>

     <!-- email validation -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.0/parsley.js"></script>
    
    <script>
  $(document).ready(function(){
      
    $('#email_address').parsley();

    window.ParsleyValidator.addValidator('checkemail', {
      validateString: function(value)
      {
        return $.ajax({
          url:'validation.php',
          method:"POST",
          data:{email:value},
          dataType:"json",
          success:function(data)
          {
            return true;
          }
        });
      }
    });

  });
</script>

    
    <script>
      $(document).ready(function(){
        $('#confirmpassword').on('keyup', function () {
          if ($('#password').val() == $('#confirmpassword').val()) {
            $('#message').html('Password Matched').css('color', 'green');
          } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
      });
    </script>


  </body>
</html>