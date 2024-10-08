<!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/1jhkvs1dgso07gthij84cl3n089g7zidgzkmjx7t8ip0g3ae/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <!-- <script>
      tinymce.init({
        selector: '.html-editor',
        readonly: false,
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | forecolor backcolor', // Thêm 'forecolor' và 'backcolor' vào toolbar
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
          { value: 'hoang', title: 'hoang' },
          { value: 'hoanglongtpt1999@gmail.com', title: 'hoanglongtpt1999@gmail.com' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
      });
    </script> -->
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

<script>
    // Tạo một hàm để khởi tạo CKEditor với cấu hình tùy chỉnh
    function initializeCKEditor(elementId) {
        ClassicEditor
            .create(document.querySelector(`#${elementId}`), { 
                language: 'vi',
                ckfinder: {
                    uploadUrl: "{{ route('upload.image') }}?_token={{ csrf_token() }}"
                }
            })
            .catch(error => {
                console.error(error);
            });
    }

    // Khởi tạo CKEditor cho các trường cụ thể
    if (document.querySelector('#about')) {
        initializeCKEditor('about');
    }
    if (document.querySelector('#description')) {
        initializeCKEditor('description');
    }
    if (document.querySelector('#requirements')) {
        initializeCKEditor('requirements');
    }
    if (document.querySelector('#more_information')) {
        initializeCKEditor('more_information');
    }
    if (document.querySelector('#content')) {
        initializeCKEditor('content');
    }
</script>


    

