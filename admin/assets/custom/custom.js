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
    
});
