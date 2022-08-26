 <div class="flex-container"> 
  <div class="user-name">
    <?php
      echo "Welcome ". $_SESSION['username']."  ";
    ?>
  </div>
  <div class="logout">
    <?php
      echo "<a href='logoutform.php'>logout</a>";
    ?>
  </div>
</div>