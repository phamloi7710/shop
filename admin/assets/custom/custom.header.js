$(document).ready(function(){
    $('.selectImage').filemanager('image');
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/uploads';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=1200,height=800');
        window.SetUrl = cb;
    };
    $(".txtName").keyup(function(){
        $(".txtNameShow").html($(this).val());
    });
    $(".txtEmail").keyup(function(){
        $(".txtEmailShow").html($(this).val());
    });
    $(".txtUsername").keyup(function(){
        $(".txtUsernameShow").html($(this).val());
    });
    $(".txtPhone").keyup(function(){
        $(".txtPhoneShow").html($(this).val());
    });
    $(".sltGroup").change(function(){
        $(".txtGroupShow").html($(".sltGroup :selected").text());
    });
    $(".deleteImage").click(function(){
        $(".imagePreview").attr('src','');
        $(".imagePreview").attr('src','assets/images/no-image.jpg');
        $("#image").val('');
    });
$(document).ready(function(){
    $(".alert").delay(5000).slideUp();
})
$(document).ready(function(){
    var jvalidate = $("#jvalidate").validate({
    ignore: [],
    rules: {                                            
            txtName: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
            },
            txtUserName: {
                    required: true,
                    minlength: 3,
                    maxlength: 20,
            },
            txtEmail: {
                    required: true,
                    minlength: 3,
                    maxlength: 50,
                    email: true
            },
            txtPhone: {
                    required: true,
                    minlength: 8,
                    maxlength: 15,
            },
            txtPassword: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
            },
            'txtRePassword': {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                    equalTo: "#password"
            },
            txtOldPassword: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
            },
            txtNewPassword: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
            },
            'txtReNewPassword': {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                    equalTo: "#password"
            },
            sltGroup: {
                required: true
            }
        }                                        
    }); 
});
});




var row = 0;
function addAttribute(){
    html = '<tr id="AttributeRow'+row+'">';
    html += '<td><input type="text" name="txtAttributeName[]" class="form-control" placeholder="Tên Thuộc Tính"></td>';
    html += '<td><input type="text" name="txtAttributePriceWareHouse[]" class="form-control" placeholder="Giá Nhập Kho"></td>';
    html += '<td><input type="text" name="txtAttributePriceSell[]" class="form-control" placeholder="Giá Bán"></td>';
    html += '<td><input type="text" name="txtAttributePriceSale[]" class="form-control" placeholder="Giá Khuyến Mãi"></td>';
    html += '<td><input type="text" name="txtAttributeQty[]" class="form-control" placeholder="Số Lượng"></td>';
    html += '<td class="center">';
    html += '<a href="javascript:void(0)" onclick="$(\'#AttributeRow'+row+'\').remove();" title="Xóa" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>';
    html += '</td></tr>';
    $('#contentAttribute').append(html);

    row++;
}

