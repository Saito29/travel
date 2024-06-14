tinymce.init({
  selector: '.mytextarea',
  plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  height: 650,
  license_key: 'ibwzlzvtiue1cnl2kujwtewutyd1oegqob2svdnyv38tndmq',
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  contextmenu: 'link image table',
  menu: {
    favs: {title: 'menu', items: 'codesample code visualaid | searchreplace | emoticons'}
  },
  menubar: 'favs file edit view insert format tools table help',
  content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
});