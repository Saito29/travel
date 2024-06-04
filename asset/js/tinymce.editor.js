tinymce.init({
    selector: '.editor-comment',
    tabsize: 66,
    menubar: true,
    height: 500,
    license_key: 'gpl',
    plugins: [
      'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
      'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
      'insertdatetime', 'media', 'table', 'help', 'wordcount', 'autoresize',
    ],
    toolbar: 'undo redo | blocks | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat| fullscreen | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
  });

  tinymce.activeEditor.execCommand('mceAutoResize');