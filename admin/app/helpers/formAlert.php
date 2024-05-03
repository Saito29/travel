<!-- Alert Errors-->
<!--Alert for user creation-->
<?php if(!empty($acmsg)):?>
<div class="alert <?php echo $css_class?> d-flex align-items-center alert-dismissible fade show w-100" role="alert">
    <?php echo $icon?>
    <strong><?php echo $acmsg?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif;?>

<?php if(!empty($msg)):?>
<div class="alert <?php echo $css_class?> d-flex align-items-center alert-dismissible fade show w-100" role="alert">
    <?php echo $icon?>
    <strong><?php echo $msg?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif;?>

<?php if(!empty($msg2)):?>
<div class="alert <?php echo $css_class?> d-flex align-items-center alert-dismissible fade show w-100" role="alert">
    <?php echo $icon?>
    <strong><?php echo $msg2?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif;?>

<?php if(!empty($msg3)):?>
<div class="alert <?php echo $css_class?> d-flex align-items-center alert-dismissible fade show w-100" role="alert">
    <?php echo $icon?>
    <strong><?php echo $msg3?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif;?>

<?php if(!empty($msg4)):?>
<div class="alert <?php echo $css_class?> d-flex align-items-center alert-dismissible fade show w-100" role="alert">
    <?php echo $icon?>
    <strong><?php echo $msg4?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif;?>

<!--Error Required message -->
<?php if(count($errors) > 0):?>
<?php foreach($errors as $error):?>
<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show w-100" role="alert" style="text-align: justify;">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path>
    </svg>    
    <strong><?php echo $error?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endforeach;?>
<?php endif;?>

<!--End of Alert Errors -->
