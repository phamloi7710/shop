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
    // upload file
// $(document).ready(function(){
//  $('#lfm').filemanager('image');
//  var domain = "{{url('')}}/uploads";
//  $('#lfm').filemanager('image', {prefix: domain});
// });
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
// giới hạn ký tự nhập vào
function CountLeft(field, count, max) {
    if (field.value.length > max)
    field.value = field.value.substring(0, max);
    else
    count.value = max - field.value.length;
}
function alertMsg(theURL,msg)
{
    if (confirm(msg))
    {
        window.location.href=theURL;
    }
    else
    {
        return false;
    }
}

});
