<?php
   require 'header.php';
?>
<main>
    <?php
      if(isset($_SESSION['userId']) && $_SESSION['userId'] == true){
          echo '<p>you are logged in</p>';
      }
      else{
        echo '<p>you are logged out</p>';
      }
    ?>
</main>
<?php
   require 'footer.php';
?>