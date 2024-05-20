<!--=============== MAIN JS ===============-->
<script src="<?php echo BASE_URL.'/asset/js/main.js'?>"></script>

<!--================= JQuery Min js =================-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--=============== Pagination JS ================-->
<script src="<?php echo BASE_URL.'/asset/vendor/Pagination/pagination.js'?>"></script>
<script src="<?php echo BASE_URL.'/asset/vendor/Pagination/pagination.min.js'?>"></script>

<!--=============== Slick JS jquery ===============-->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!--summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
      $('#summernote').summernote({
        placeholder: 'Comment down here',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['codeview', 'help']]
        ]
      });
    </script>

<!--============== Customized JS ======================-->
<script src="<?php echo BASE_URL.'/asset/js/script.js'?>"></script>
