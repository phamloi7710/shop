@section('title')
{{__('general.products')}}
@stop
@extends('admin.general.master')
@section('content')
<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
            <h2> {{__('general.products')}}</h2>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".add-new"> {{__('general.addNew')}}</button>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade add-new" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-big">
        <form method="POST" action="{{route('postAddProductAdmin')}}" class="form-horizontal form-label-left">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <div class="pull-right">
                        <p style="color: #00C59F;"> {{__("general.addingProductTitle")}}: {{App::getLocale()}}</p>
                    </div>
                     
                    <h4 class="modal-title" id="myModalLabel"> {{__("general.addNewProduct")}}</h4>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-general" data-toggle="tab">Tổng quan</a></li>
                        <li><a href="#tab-data" data-toggle="tab">Dữ liệu</a></li>
                    </ul>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="tab-content" style="margin-top: 30px;">
                            <div class="tab-pane active" id="tab-general">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tên Sản Phẩm
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtName" value="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"> Mã Sản Phẩm
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtCode" value="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Mô Tả Ngắn
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea name="summary" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"> Nội Dung Sản Phẩm
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea name="content" id="ckeditor"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"> Thẻ Tiêu Đề (Meta Title)
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtTitleSeo" value="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"> Thẻ Mô Tả ( Meta Description)
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtDescriptionSeo" value="" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"> Từ Khóa ( Tags)
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtTags" value="" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-data">
                                <div class="tab-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-body profile">
                                                    <div class="profile-image">
                                                        <img class="imagePreview" style="width: 100%; height: 100%;" id="previewImage" src="assets/images/no-image.jpg" alt="">
                                                    </div>
                                                    <input id="avatar" name="avatar" class="form-control" type="hidden">
                                                    <div class="profile-data">
                                                        <div class="profile-data-name center" style="color:#00A887; margin-top: 20px; font-size: 16px;"><b class="txtNameShow"></b></div>
                                                    </div>
                                                </div>
                                                <div class="panel-body center">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a data-input="avatar" data-preview="previewImage" class="btn btn-info btn-xs selectImage" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.selectImage')}}"> {{__('general.selectAvatar')}}</a>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="javascript:;" data-toggle="tooltip" data-placement="left" data-original-title="{{__('general.deleteImage')}}" class="btn btn-danger btn-xs deleteImage">{{__('general.deleteImage')}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel panel-default">
                                                <div class="panel-body profile">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá Sản Phẩm
                                                        </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input name="txtPrice" value="" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Số Lượng Nhập Kho
                                                        </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input name="txtQty" value="" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Kích Thước
                                                        </label>
                                                        <div class="col-md-3 col-sm-3 col-xs-4">
                                                            <input name="txtLength" value="" type="text" class="form-control" placeholder="Chiều Dài">
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-4">
                                                            <input name="txtWidth" value="" type="text" class="form-control" placeholder="Chiều Rộng">
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-4">
                                                            <input name="txtHeight" value="" type="text" class="form-control" placeholder="Chiều Cao">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"> Thứ Tự
                                                        </label>
                                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                                            <input name="txtSort" value="" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Hình Ảnh Chi Tiết
                                                        </label>
                                                        <a onclick="addImage();" class="btn btn-primary btn-xs"> Thêm Ảnh</a>
                                                    </div>
                                                    <div id="contentImage">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      
                                </div>
                            </div> 
                        </div>
                    </form>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> {{__("general.close")}}</button>
                    <button type="reset" class="btn btn-default"> {{__("general.reset")}}</button>
                    <button type="submit" class="btn btn-success">{{trans('general.addNew')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
  // ckeditor
var options = {
    filebrowserImageBrowseUrl: '/uploads?type=Images',
    filebrowserImageUploadUrl: '/uploads/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/uploads?type=Files',
    filebrowserUploadUrl: '/uploads/upload?type=Files&_token='
  };
  CKEDITOR.replace('ckeditor', options);
</script>
<script type="text/javascript">
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
</script>
@stop