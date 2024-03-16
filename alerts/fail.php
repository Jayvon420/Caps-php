<?php
if(isset($_SESSION['error'])) :

?>


<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>hey!</strong> <?= $_SESSION['error']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<?php
    unset($_SESSION['error']);
    endif;
?>