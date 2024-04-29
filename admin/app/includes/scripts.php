<!--Bootsrap 5 Js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--================= JQuery Min js =================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--=================== SummerNote JS ===================
<script src="./plugin/Summernote-0.8.18-dist/summernote-lite.min.js"></script>-->

<!--
<script>
    //Summernote editor
$(document).ready(function() {
    $("#summernote").summernote({
        placeholder: 'Type Description',
        tabsize: 2,
        height: 300,                 // set editor height
        toolbar:[
            //group name and list of buttons group
            ['style',['style','bold','italic','underline','strikethrough','superscript',
            'subscript']],
            ['font',['fontname','fontsize','clear']],
            ['color',['color']],
            ['para',['paragraph','ol','ul']],
            ['height',['height']],
            ['link',['link','picture','video']],
            ['insert',['table','hr']],
            ['misc',['codeview','undo','redo','help']]
        ]
});
});
</script>-->

<!--DataTables-->
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>    
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
<script src="<?php echo BASE_URL.'/asset/js/dataTable.js'?>"></script>

<!--Tinymce Editor in Webcomponents if using cloud form-->
<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-webcomponent@1/dist/tinymce-webcomponent.min.js"></script>

<!--============== Customized JS ======================-->
<script src="<?php echo BASE_URL.'/asset/js/script.js'?>"></script>