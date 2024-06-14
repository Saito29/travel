const example_image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', 'postAcceptor.php');
  
    xhr.upload.onprogress = (e) => {
      progress(e.loaded / e.total * 100);
    };
  
    xhr.onload = () => {
      if (xhr.status === 403) {
        reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
        return;
      }
  
      if (xhr.status < 200 || xhr.status >= 300) {
        reject('HTTP Error: ' + xhr.status);
        return;
      }
  
      const json = JSON.parse(xhr.responseText);
  
      if (!json || typeof json.location != 'string') {
        reject('Invalid JSON: ' + xhr.responseText);
        return;
      }
  
      resolve(json.location);
    };
  
    xhr.onerror = () => {
      reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
    };
  
    const formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());
  
    xhr.send(formData);
  });

tinymce.init({
    selector: '.mytextarea',
    images_upload_handler: example_image_upload_handler,
    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
    menubar: 'file edit view insert format tools table help',
    toolbar: "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
    height: 600,
    tabsize: 88,
    license_key: 'gpl',
    image_captions: true,
    image_advtab: true,
    image_uploadtab: true,
    importcss_append: true,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    images_file_types: 'jpeg,jpg,jpe,jfi,jif,jfif,png,gif,bmp,webp',
    images_upload_url: 'postAcceptor.php',
    file_picker_types: 'file image media',
    link_assume_external_targets: true,
    link_context_toolbar: true,
    /* enable title field in the Image dialog*/
    image_title: true,
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    /*
    URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
    images_upload_url: 'postAcceptor.php',
    here we add custom filepicker only to Image dialog
    */
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: (cb, value, meta) => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.addEventListener('change', (e) => {
        const file = e.target.files[0];

        const reader = new FileReader();
        reader.addEventListener('load', () => {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        const id = 'blobid' + (new Date()).getTime();
        const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        const base64 = reader.result.split(',')[1];
        const blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
    });
        reader.readAsDataURL(file);
    });

    input.click();
  },
  /* Media audio */
  audio_template_callback: (data) =>
    '<audio controls>\n' +
    `<source src="${data.source}"${data.sourcemime ? ` type="${data.sourcemime}"` : ''} />\n` +
    (data.altsource ? `<source src="${data.altsource}"${data.altsourcemime ? ` type="${data.altsourcemime}"` : ''} />\n` : '') +
    '</audio>',
    /* Media iframe */
    iframe_template_callback: (data) =>
    `<iframe title="${data.title}" width="${data.width}" height="${data.height}" src="${data.source}"></iframe>`,
    media_live_embeds: true,
    /* Media url solver */
    media_url_resolver: (data) => {
        return new Promise((resolve) => {
          if (data.url.indexOf('YOUR_SPECIAL_VIDEO_URL') !== -1) {
            const embedHtml = `<iframe src="${data.url}" width="400" height="400" ></iframe>`;
            resolve({ html: embedHtml });
          } else {
            resolve({ html: '' });
          }
        });
      },
      /* Media Video url */
    video_template_callback: (data) =>
        `<video width="${data.width}" height="${data.height}"${data.poster ? ` poster="${data.poster}"` : ''} controls="controls">\n` +
        `<source src="${data.source}"${data.sourcemime ? ` type="${data.sourcemime}"` : ''} />\n` +
        (data.altsource ? `<source src="${data.altsource}"${data.altsourcemime ? ` type="${data.altsourcemime}"` : ''} />\n` : '') +
        '</video>',
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image table',
    menu: {
        favs: {title: 'menu', items: 'codesample code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table help',
    content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
});