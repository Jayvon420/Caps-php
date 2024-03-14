<?php
if(isset($_SESSION['error'])) :

?>

<div class="alert alert-danger alert-dismissible fade show col-md-3" role="alert">
            <strong>Hey!</strong> <?= $_SESSION['error']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
</div>


<?php
    unset($_SESSION['error']);
    endif;
?>