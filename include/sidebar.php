 <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
      <?php
    if(isset($_SESSION["image"])){
      ?>
      <img class="app-sidebar__user-avatar" src="<?php echo $_SESSION["image"];  ?>" alt="User Image" style="height: 70px; width: 70px;">
      <?php
    }
    else{
      ?>
    <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
   <?php  }?>
        <div>
        <?php
      if(isset($_SESSION["name"])){
        echo "<p class='app-sidebar__user-name'>".$_SESSION["name"]."</p>";
      }
      else{
      ?>
      <p class="app-sidebar__user-name">Error</p>
      <?php
      }
      ?>
          <p class="app-sidebar__user-designation">Adminstrator</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="deshboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Teachers</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          <li><a class="treeview-item" href="#"><i class="icon fa fa-user-plus"></i>Register New Teacher</a></li>
          <li><a class="treeview-item" href="#"><i class="icon fa fa-users"></i>View Teacher List</a></li>
           
          </ul>
        </li>
        </li>

        <!--  -->
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Course</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Create New Course</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i>View Course List</a></li>
            
          </ul>
        </li>
        <!--  -->
        <!--  -->
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Examination</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Create New Examination</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i>View Examination List</a></li>
            
          </ul>
        </li>
        <!--  -->
        
      </ul>
    </aside>