<?php
session_start();
/**
 * Connect to DB
 */
require_once("config/db_config.php");
if(strlen($_SESSION['email']) == 0){
  header("Location:index.php"); 
}else{
    /**
     * Test Db Config
     */
    if($dbh){
        /**
         * Get id form url
         */
        if(isset($_GET['id'])){
           /**
            * Select Query
            */
            $sql = "SELECT * FROM `teachers` WHERE id = :id";
            /**
             * prepare statement
             */
            $stmt = $dbh->prepare($sql);
            /**
             * Bind Param
             */
            $stmt->bindParam(':id', $_GET['id']);
            /**
             * Execute Query
             */
            $stmt->execute();
            /**
             * Fetch Single Row
             */
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            /**
             * Array key to valiable Con
             */
            extract($row);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile | <?php echo $name; ?></title>
    <!-- Main CSS-->

    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/teacher_view.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include_once('include/header.php') ?>
    <!-- Sidebar -->
    <?php include_once('include/sidebar.php') ?>

    <main class="app-content">
        <div class="app-title ">
            <div>
                <h1> <b><?php echo $name; ?> </b></h1>
                <p><?php echo $designation; ?></p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="deshboard.php"><i class="fa fa-home fa-lg"></i></a> </li>
                <li class="breadcrumb-item"><a href="teacher-show.php">Teachers</a></li>
                <li class="breadcrumb-item">View</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <table class="table table-hover">
                        <th></th>
                        <th>
                            <img src="<?php echo $image ?>" alt="!" height="200" />
                        </th>
                        </tr>
                        <tr>
                            <th>Teacher Name</th>
                            <th class="uppercase"><?php echo $name; ?></th>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <th class="uppercase"><?php echo $email; ?></th>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <th class="uppercase"><?php echo $phone; ?></th>
                        </tr>

                        <tr>
                            <th>Designation</th>
                            <th class="uppercase"><?php echo $designation; ?></th>
                        </tr>


                        <tr>
                            <th>Date of Birth</th>
                            <th class="uppercase"><?php 
                      $date = date('d-m-Y', strtotime($dob));
                      echo $date;
                      
                      ?></th>
                        </tr>


                        <tr>
                            <th>Gender</th>
                            <th class="uppercase"> <?php
                         if($gender == 1){
                            echo "Male";
                         }
                         else{
                            echo "Female";
                         }
                           
                           ?></th>
                        </tr>

                        <tr>
                            <th>Religion</th>
                            <th class="uppercase"><?php
                         if($religion == 1){
                            echo "Islam";
                         }
                         else if ($religion == 2) {
                            echo "Hindu";
                         }
                         else {
                             echo"Others";
                         }
                           
                           ?></th>
                        </tr>

                        <tr>
                            <th>Education Qualification:</th>
                            <th class="uppercase"><?php
                         if($e_qualification == 1)
                         {
                            echo "SSC";
                         }
                         else if ($e_qualification == 2) 
                         {
                            echo "HSC";
                         }
                         else if ($e_qualification == 3)
                         {
                             echo"Diploma";
                         }

                         else if ($e_qualification == 4)
                         {
                             echo"Bsc";
                         }

                         else if ($e_qualification == 5)
                         {
                             echo"BSS";
                         }

                         else if ($e_qualification == 6)
                         {
                             echo "MA";
                         }
                           
                           ?></th>
                        </tr>


                        <tr>
                            <th>Joining Date</th>
                            <th class="uppercase"><?php 
                      $date = date('d-m-Y', strtotime($joining_date));
                      echo $date;
                      
                      ?></th>
                        </tr>

                        <tr>
                            <th>Social Media</th>
                            <th>
                                <div class="social-menu">

                                    <ul>
                                        <li><a href="<?php echo $f_link; ?>" target="_blank"><i
                                                    class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?php echo $t_link; ?>" target="_blank"><i
                                                    class="fa fa-twitter"></i></a></li>
                                        <li><a href="<?php echo $i_link; ?>" target="_blank"><i
                                                    class="fa fa-instagram"></i></a></li>
                                        <li><a href="<?php echo $g_link; ?>" target="_blank"><i
                                                    class="fa fa-google-plus"></i></a></li>
                                        <li><a href="<?php echo $l_link; ?>" target="_blank"><i
                                                    class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>Teacher Description</th>
                            <th>


                                <div class="jumbotron jumbotron-fluid">
                                    <div class="container">
                                        <h1 class="display-4"><?php echo $short_description; ?></h1>
                                        <p class="lead"><?php echo $long_description; ?></p>
                                    </div>
                                </div>

                            </th>
                        </tr>





                        <th>Status:</th>
                        <th class="uppercase">
                            <?php
                         if($status == 1){
                            echo "<span class='text-success'>Active</span>";
                         }
                         else{
                            echo "<span class='text-danger'>Resigned</span>";
                         }
                           
                           ?>
                        </th>
                        </tr>

                    </table>
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