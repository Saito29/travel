const example_image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
  const xhr = new XMLHttpRequest();
  xhr.withCredentials = false;
  xhr.open('POST', 'postUpload.php');

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
  height: 500,
  license_key: 'gpl',
  images_upload_url: 'postUpload.php',
  images_upload_handler: example_image_upload_handler,
  toolbar_mode: 'sliding',
  file_picker_types: 'file image media',
  image_caption: true,
  image_advtab: true,
  image_uploadtab: true,
  images_files_types: 'jpeg,jpg,jpe,jfi,jif,jfif,png,gif,bmp,webp',
  images_upload_credentials: true,
  plugins: [
    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
    'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons'
  ],
  toolbar: 'undo redo | blocks | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | fullscreen emoticons',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
});