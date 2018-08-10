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
                        <li><a href="#tab-links" data-toggle="tab">Liên kết</a></li>
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
                                
                            </div>
                            <div class="tab-pane" id="tab-data">
                                <div class="tab-content">
                                    
                                </div>
                            </div> 
                            <div class="tab-pane" id="tab-links">
                                <div class="tab-content">
                                    
                                </div>
                            </div>
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
                            <div class="tab-pane" id="tab-image">
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