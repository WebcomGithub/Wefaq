<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quill Editor Example</title>

  <!-- Quill CSS -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

 
</head>
<body>


  <form method="post" action="{{ route('test.save') }}">
    @csrf
    @method('post')
    <textarea name="description" id="description_een" rows="6"  class="form-control"></textarea>

  <input type="text" name="name">
  <input type="submit">
</form>

  <!-- Quill JS -->
  <script src="https://cdn.tiny.cloud/1/1urw5cscdnze9hew8gcr7tyxcb4b6u92tly1h2xe433kvw92/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

  <!-- إعدادات TinyMCE -->
  <script>
      const commonSettings = {
          height: 300,
          menubar: false,
          content_css: 'default',
          plugins: 'advlist autolink lists link charmap preview anchor ' +
                  'searchreplace visualblocks code fullscreen ' +
                  'insertdatetime media table code help wordcount',
          toolbar: 'undo redo | styles | bold italic underline forecolor backcolor | ' +
                  'alignleft aligncenter alignright alignjustify | ' +
                  'bullist numlist outdent indent | link image | removeformat | help',
          block_formats: 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3',
      };

      // ENGLISH
      tinymce.init({
          ...commonSettings,
          selector: '#description_een',
          directionality: 'ltr',
          language: 'en',
      });


  </script>

</body>
</html>
