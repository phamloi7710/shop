// upload file
// $(document).ready(function(){
// 	$('#lfm').filemanager('image');
// 	var domain = "{{url('')}}/uploads";
// 	$('#lfm').filemanager('image', {prefix: domain});
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