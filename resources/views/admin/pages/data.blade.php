<script type="text/javascript">$(".deleteImage{{$value->id}}").click(function(){$(".imagePreview{{$value->id}}").attr("src","");$(".imagePreview{{$value->id}}").attr("src","assets/images/no-image.jpg");$("#image{{$value->id}}").val("")});$(".txtName{{$value->id}}").keyup(function(){$(".txtNameShow{{$value->id}}").html($(this).val())});$(".txtEmail{{$value->id}}").keyup(function(){$(".txtEmailShow{{$value->id}}").html($(this).val())});$(".txtUsername{{$value->id}}").keyup(function(){$(".txtUsernameShow{{$value->id}}").html($(this).val())});$(".txtPhone{{$value->id}}").keyup(function(){$(".txtPhoneShow{{$value->id}}").html($(this).val())});$(".sltGroup{{$value->id}}").change(function(){$(".txtGroupShow{{$value->id}}").html($(".sltGroup{{$value->id}} :selected").text())});</script>