<?php
session_start();
/**
 * Connect to DB
 */
require_once("config/db_config.php");
if(strlen($_SESSION['email']) == 0){
  header("Location:index.php");
}else{
  $sql = 'SELECT * FROM  `teachers` WHERE `status` = 1';
  $sql_c ='SELECT * FROM `course` WHERE `status`= 1';
  $sql_s ='SELECT * FROM `slider` WHERE `status`= 1';
  $sql_a ='SELECT * FROM `admin` WHERE `status`= 1'; 

  $stmt =$dbh->prepare($sql);
  $stmt_c =$dbh->prepare($sql_c);
  $stmt_s =$dbh->prepare($sql_s);
  $stmt_a =$dbh->prepare($sql_a);

  $stmt->execute();
  $stmt_c->execute();
  $stmt_s->execute();
  $stmt_a->execute();


  $active_teacher = $stmt->rowCount();
  $active_course = $stmt_c->rowCount();
  $active_slider = $stmt_s->rowCount();
  $active_admin = $stmt_a->rowCount();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deshboard | Admin</title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/dash_css.css"> -->
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include_once('include/header.php') ?>
    <!-- Sidebar -->
    <?php include_once('include/sidebar.php') ?>
  

  



    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="deshboard.php">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
      <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-user-secret fa-3x"></i>
            <div class="info">
              <h4>administrator</h4>
              <p><b><?php echo $active_admin;?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 ">
       
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"> </i>
      
            <div class="info">
           
              <h4>Active Teachers</h4>
             
              <p><b><?php echo $active_teacher?></b></p>
              
            </div>
            
          </div>
          
        </div>
        <div class="col-md-6 col-lg-3 ">
        
          <div class="widget-small info coloured-icon" ><i class="icon fa fa-slideshare  fa-3x"></i>
            <div class="info">
              <h4 class="">Active Students</h4>
              <p><b><?php echo $active_course; ?></b></p>
            </div>
          </div>
          
        </div>
        <div class="col-md-6 col-lg-3">
       
          <div class="widget-small warning coloured-icon"><i class="icon fa  fa-book fa-3x"></i>
            <div class="info">
              <h4>Active Examination</h4>
              <p><b><?php echo $active_slider; ?></b></p>
            </div>
          </div>
          
        </div>
        
      </div>
    
    </main>
  
   <!-- Footer -->
    <?php include_once('include/footer.php') ?>
  </body>
</html>
<?php
}
?>