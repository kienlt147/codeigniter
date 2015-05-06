$(function() {
  var editor = CKEDITOR.replace('description');
    CKFinder.setupCKEditor(editor, '/codeIgniter/public/ckfinder/');
    $(":file").filestyle({icon: false});
    var fileTypes = ['jpg', 'jpeg', 'png'];
    function readURL(input) {
        if (input.files && input.files[0]) {
            var extension = input.files[0].name.split('.').pop().toLowerCase(), isSuccess = fileTypes.indexOf(extension) > -1;
            var file_size = ~~(input.files[0].size/1024);
            if (!isSuccess) {
                alert('Hình ảnh phải có định dạng là JPG, JPEG, PNG');
                return;
            }
            if (file_size >= 500) {
                alert('Kích cỡ hình ảnh không được quá 5M');
                return;
            }
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show_image').attr('src', e.target.result);
                $('#hidden_image').val(e.target.result);
                $('#type_image').val(extension);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function(){
        readURL(this);
    });
});