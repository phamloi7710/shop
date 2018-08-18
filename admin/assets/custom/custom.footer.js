// ckeditor
var options = {
    filebrowserImageBrowseUrl: '/uploads?type=Images',
    filebrowserImageUploadUrl: '/uploads/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/uploads?type=Files',
    filebrowserUploadUrl: '/uploads/upload?type=Files&_token='
  };
  CKEDITOR.replace('ckeditor', options);



// add image product
  var row = 0;
    function addImage(){
        html = '<div id="image-row'+row+'" class="col-md-3" style="margin-top: 20px;">';
        html += '<div class="image view view-first">';
        html += '<img id="previewImageProduct'+row+'" style="width: 100%; display: block;" src="assets/images/no-image.jpg">';
        html += '<input id="imageProduct'+row+'" name="imageData[]" class="form-control" type="hidden">';
        html += '<div class="mask no-caption">';
        html += '<div class="tools tools-bottom">';
        html += '<a href="#" data-input="imageProduct'+row+'" data-preview="previewImageProduct'+row+'" class="selectImage'+row+'" data-toggle="tooltip" data-placement="top" data-original-title="{{__("general.selectImage")}}"><i class="fa fa-plus"></i></a>';
        html += '<a href="javascript:;" onclick="$(\'#image-row' + row + '\').remove();"><i class="fa fa-trash"></i></a>';
        html += '</div></div></div></div>';
        html += '<script>$(".selectImage'+row+'").filemanager("image");';
        html += 'var lfm = function(options, cb) {';
        html += 'var route_prefix = (options && options.prefix) ? options.prefix : "/uploads";';
        html += 'window.open(route_prefix + "?type=" + options.type || "file", "FileManager", "width=1200,height=800");';
        html += 'window.SetUrl = cb;';
        html += '};';
        $('#contentImage').append(html);

        row++;
    }