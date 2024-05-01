<?php if(isset($_SESSION['messageAcc'])):?>
    <div class="alert <?php echo $_SESSION['css_class'];?> d-flex align-items-center alert-dismissible fade show w-auto mt-4" role="alert">
        <?php echo $_SESSION['icon'];?>
        <strong><?php echo $_SESSION['messageAcc'];?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php
            unset($_SESSION['messageAcc']);
            unset($_SESSION['css_class']);
            unset($_SESSION['icon']);
        ?>
    </div>
<?php endif; ?>