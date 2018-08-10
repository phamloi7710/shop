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
                        <li><a href="#tab-image" data-toggle="tab">Hình ảnh</a></li>
                        <li><a href="#tab-attribute" data-toggle="tab">Thuộc tính</a></li>
                        <li><a href="#tab-option" data-toggle="tab">Tùy chọn</a></li>
                        <li><a href="#tab-discount" data-toggle="tab">Giá bán Sỉ</a></li>
                        <li><a href="#tab-special" data-toggle="tab">Khuyến mãi</a></li>
                        <li><a href="#tab-reward" data-toggle="tab">Điểm thưởng</a></li>
                    </ul>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="tab-content" style="margin-top: 30px;">
                            <div class="tab-pane active" id="tab-general">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tên Sản Phẩm
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtPhone" value="" type="text" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"> Mã Sản Phẩm
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtPhone" value="" type="text" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Mô Tả Ngắn
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea name="" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"> Nội Dung Sản Phẩm
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea name="" id="ckeditor"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"> Thẻ Tiêu Đề (Meta Title)
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtPhone" value="" type="text" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"> Thẻ Mô Tả ( Meta Description)
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtPhone" value="" type="text" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"> Từ Khóa ( Tags)
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtPhone" value="" type="text" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12"> URL SEO ( Meta SEO)
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtPhone" value="" type="text" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-data">
                                <div class="tab-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-body profile" style="background: url('assets/images/gallery/music-4.jpg') center center no-repeat;">
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
                                                            <input name="txtPhone" value="" type="text" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Số Lượng Nhập Kho
                                                        </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input name="" value="" type="text" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Số Lượng Tối Thiểu
                                                        </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input name="" value="" type="text" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Địa Chỉ Kho Hàng
                                                        </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input name="" value="" type="text" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Kích Thước
                                                        </label>
                                                        <div class="col-md-3 col-sm-3 col-xs-4">
                                                            <input name="" value="" type="text" class="form-control" placeholder="Chiều Dài">
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-4">
                                                            <input name="" value="" type="text" class="form-control" placeholder="Chiều Rộng">
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-4">
                                                            <input name="" value="" type="text" class="form-control" placeholder="Chiều Cao">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"> Đơn Vị Kích Thước
                                                        </label>
                                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                                            <select name="" class="form-control">
                                                                <option value="">Centimet</option>
                                                                <option value="">Milimet</option>
                                                                <option value="">Inch</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"> Thứ Tự
                                                        </label>
                                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                                            <input name="" value="" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Thứ Tự
                                                        </label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <table id="images" class="table table-striped table-bordered table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <td class="text-left">Hình ảnh bổ sung</td>
                                                                    <td class="text-right">Thứ tự</td>
                                                                    <td></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <td colspan="2"></td>
                                                                    <td class="text-left">
                                                                        <button type="button" onclick="addImage();" data-toggle="tooltip"
                                                                                title="Thêm hình ảnh" class="btn btn-primary"><i
                                                                                    class="fa fa-plus-circle"></i></button>
                                                                    </td>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      
                                </div>
                            </div> 
                            <div class="tab-pane" id="tab-image">
                                <div class="tab-content">
                                    <div class="table-responsive">
                                        

                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript"><!--
                                var image_row = 0;

                                function addImage() {
                                    html = '<tr id="image-row' + image_row + '">';
                                    html += '  <td class="text-left"><a href="" id="thumb-image' + image_row + '"data-toggle="image" class="img-thumbnail"><img src="http://phamloi7710.myzozo.net/image/cache/no_image-100x100.png" alt="" title="" data-placeholder="http://phamloi7710.myzozo.net/image/cache/no_image-100x100.png" /></a><input type="hidden" name="product_image[' + image_row + '][image]" value="" id="input-image' + image_row + '" /></td>';
                                    html += '  <td class="text-right"><input type="text" name="product_image[' + image_row + '][sort_order]" value="" placeholder="Thứ tự" class="form-control" /></td>';
                                    html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row + '\').remove();" data-toggle="tooltip" title="Xóa" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
                                    html += '</tr>';

                                    $('#images tbody').append(html);

                                    image_row++;
                                }
                                //--></script>

                            <div class="tab-pane" id="tab-attribute">
                                <div class="tab-content">
                                    
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-option">
                                <div class="tab-content">
                                    
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-recurring">
                                <div class="tab-content">
                                    
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-discount">
                                <div class="tab-content">
                                    
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-special">
                                <div class="tab-content">
                                    
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="tab-reward">
                                <div class="tab-content">
                                    
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
@stop