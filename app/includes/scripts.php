<!--=============== MAIN JS ===============-->
<script src="<?php echo BASE_URL.'/asset/js/main.js'?>"></script>

<!--================= JQuery Min js =================-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--=============== Pagination JS ================-->
<script src="<?php echo BASE_URL.'/asset/vendor/Pagination/pagination.min.js'?>"></script>  

<!--=============== Slick JS jquery ===============-->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!--CK Editor-->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<!--============== Customized JS ======================-->
<script src="<?php echo BASE_URL.'/asset/js/scripts.js'?>"></script>

