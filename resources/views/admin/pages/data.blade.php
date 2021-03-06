$(document).ready(function () {
	$(".deleteImage{{$value->id}}").click(function () {
		$(".imagePreview{{$value->id}}").attr("src", "");
		$(".imagePreview{{$value->id}}").attr("src", "assets/images/no-image.jpg");
		$("#image{{$value->id}}").val("")
	});
	$(".txtName{{$value->id}}").keyup(function () {
		$(".txtNameShow{{$value->id}}").html($(this).val())
	});
	$(".txtEmail{{$value->id}}").keyup(function () {
		$(".txtEmailShow{{$value->id}}").html($(this).val())
	});
	$(".txtUsername{{$value->id}}").keyup(function () {
		$(".txtUsernameShow{{$value->id}}").html($(this).val())
	});
	$(".txtPhone{{$value->id}}").keyup(function () {
		$(".txtPhoneShow{{$value->id}}").html($(this).val())
	});
	$(".sltGroup{{$value->id}}").change(function () {
		$(".txtGroupShow{{$value->id}}").html($(".sltGroup{{$value->id}} :selected").text())
	});
	var a = $("#jvalidate{{$value->id}}").validate({
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
				maxlength: 11,
				number: true,
			},
			sltGroup: {
				required: true
			}
		}
	})
});