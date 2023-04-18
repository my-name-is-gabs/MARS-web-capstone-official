<?php
  include_once('../server/db_connection.php');
  if(empty($_SESSION['username'])){
    session_start();
  }
  $username = $_SESSION['username'];
?>
    
    
    <header class="relative w-full h-[50px] bg-Primary flex items-center top-0">
      <nav class="w-full sm:px-20 px-2 mx-auto flex justify-between items-center">
        <ul class="flex text-white">
          <li class="text-white">
            <span>M.A.R.S</span>
          </li>
          <li class="px-4 hover:underline">
            <a href="javascript:void(0)" id="openNav"
              ><i class="fas fa-bars text-white"></i
            ></a>
          </li>
          
        </ul>
        <div>
          <a href="../pages/info.php" class="text-white mx-3 hover:underline"
              ><i class="fas fa-info-circle text-md"></i> Info</a
            >
          <a href="../server/logoutAccount.php" class="text-white mx-3 hover:underline"
            ><i class="fas fa-sign-out-alt"></i> Log
            out</a
          >
        </div>
      </nav>
    </header>

    <aside id="sideNavigation" class="py-14">
      <a href="javascript:void(0)" class="absolute top-3 right-4" id="closeNav"
        ><i class="fas fa-times text-xl"></i
      ></a>
      <div class="nav-profile-pic-container text-center flex flex-col gap-2">
        <?php
          $query_image = mysqli_query($connection, "SELECT * FROM `{$_SESSION['username']}_user_profile`");
          if(mysqli_num_rows($query_image) !== 0) { 
            while($row = mysqli_fetch_assoc($query_image)) {
              echo "<img src='data:image;base64,".base64_encode($row['image'])."' alt='profile' class='rounded-full my-4' />" ;
            }  
          } else {
        ?>
          <img
            src="../assets/user.ico"
            alt="profile"
            class="rounded-full my-4"
          />
        <?php }?>
        <span class="text-lg">@<?php echo $username ?></span>
        <a href="../components/uploadPic.php" class="text-md hover:underline"><i class="fas fa-user-edit"></i> Edit Photo</a>
      </div>

      <nav class="mt-14">
        <ul class="flex flex-col gap-7">
          <li class="hover:underline">
            <a href="../pages/dash.php" class="text-xl"
              ><i class="fas fa-book text-2xl"></i> Study</a
            >
          </li>
          <li class="hover:underline">
            <a href="../pages/note.php" class="text-xl"
              ><i class="far fa-sticky-note text-2xl"></i> Notes (Beta)</a
            >
          </li>
          <li class="hover:underline">
            <a href="../pages/info.php" class="text-2xl"
              ><i class="fas fa-info-circle text-xl"></i> Info</a
            >
          </li>
          <li class="hover:underline">
            <a href="../pages/contactus.php" class="text-2xl"
              ><i class="fas fa-address-book text-xl"></i> Contact Us</a
            >
          </li>
        </ul>
      </nav>
    </aside>

    <script>
      const openNav = document.getElementById('openNav');
      const closeNav = document.getElementById('closeNav');
      const sideNav = document.getElementById('sideNavigation');

      openNav.addEventListener('click', () => {
        sideNav.style.left = '0%';
      });

      closeNav.addEventListener('click', () => {
        sideNav.style.left = '-1000%';
      });
    </script>

