<script src="assets/admin/plugins/bootstrap-toastr/toastr.min.js"></script>

<!-- Nhập Liệu -->
@if($errors->has('txtEmail'))
<script type="text/javascript">
    toastr['error']('{{$errors->first("txtEmail")}}', '{{__("notify.titleErrorMessage")}}')
</script>
@endif
@if($errors->has('txtUserName'))
<script type="text/javascript">
    toastr['error']('{{$errors->first("txtUserName")}}', '{{__("notify.titleErrorMessage")}}')
</script>
@endif
<script>
  @if(Session::has('message'))
    var type = "{{Session::get('alert-type', 'info')}}";
    switch(type){
        case 'info':
            toastr.info("{{Session::get('message')}}", "{{__('notify.titleInfoMessage')}}", {timeOut: 5000}, toastr.options.closeButton = true);
            break;
        
        case 'warning':
            toastr.warning("{{Session::get('message')}}", "{{__('notify.titleWarningMessage')}}", {timeOut: 5000}, toastr.options.closeButton = true);
            break;

        case 'success':
            toastr.success("{{Session::get('message')}}", "{{__('notify.titleSuccessMessage')}}", {timeOut: 5000}, toastr.options.closeButton = true);

            break;

        case 'error':
            toastr.error("{{Session::get('message')}}", "{{__('notify.titleErrorMessage')}}", {timeOut: 5000}, toastr.options.closeButton = true);
            break;
    }
  @endif
</script>