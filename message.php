 <?php
if(isset($_SESSION['message'])) :

?>

<div class="alert alert-success alert-dismissible fade show col-md-3" role="alert">
            <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
</div>



<?php
    unset($_SESSION['message']);
    endif;
?>