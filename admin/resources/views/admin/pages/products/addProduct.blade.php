@section('title')
{{__('general.products')}}
@stop
@extends('admin.general.master')
@section('content')
<div class="right_col" role="main">
	<form method="POST" action="{{route('postAddProductAdmin')}}" class="form-horizontal form-label-left">
    @csrf
		<div class="x_panel">
	        <div class="x_title">
	            <h2> {{__('general.addProduct')}}</h2>
	            <button type="submit" class="btn btn-success pull-right">{{trans('general.addNew')}}</button>
	            <div class="clearfix"></div>
	        </div>
	        <div class="x_content">
	            <ul class="nav nav-tabs">
	                <li class="active"><a href="#tab-general" data-toggle="tab">{{__('general.overview')}}</a></li>
	                <li><a href="#tab-data" data-toggle="tab">Dữ liệu</a></li>
	                <li><a href="#tab-attributes" data-toggle="tab"> Thuộc Tính Sản Phẩm</a></li>
	            </ul>
	            <div class="tab-content" style="margin-top: 30px;">
	                <div class="tab-pane active" id="tab-general">
	                    <div class="form-group">
	                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Tên Sản Phẩm
	                        </label>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
	                            <input name="txtName" value="" type="text" class="form-control" autofocus>
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
	                        <label class="control-label col-md-2 col-sm-2 col-xs-12"> Danh Mục
	                        </label>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
	                            <select name="" class="form-control select">
	                            	<option value=""></option>
	                            </select>
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
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá Nhập Kho
	                                            </label>
	                                            <div class="col-md-9 col-sm-9 col-xs-12">
	                                                <input id="priceWareHouseVn" type="text" name="txtPriceWareHouse" class="form-control">
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá Bán
	                                            </label>
	                                            <div class="col-md-9 col-sm-9 col-xs-12">
	                                                <input id="priceVn" type="text" name="txtPriceSell" class="form-control">
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá Khuyến Mãi(Nếu Có)
	                                            </label>
	                                            <div class="col-md-9 col-sm-9 col-xs-12">
	                                                <input id="priceSaleVn" type="text" name="txtPriceSale" class="form-control">
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
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-6"> Đơn Vị Kích Thước
	                                            </label>
	                                            <div class="col-md-5 col-sm-5 col-xs-6">
	                                                <select name="sltSizeType" class="form-control">
	                                                    <option value="Millimetres (mm)">Millimetres (mm)</option>
	                                                    <option value="Centimetre (cm)">Centimetre (cm)</option>
	                                                    <option value="Inchs (in)">Inchs (in)</option>
	                                                    <option value="Feet (ft)">Feet (ft)</option>
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Kích Thước
	                                            </label>
	                                            <div class="col-md-3 col-sm-3 col-xs-4">
	                                                <input name="txtLength" value="" type="text" class="form-control" placeholder="Dài">
	                                            </div>
	                                            <div class="col-md-3 col-sm-3 col-xs-4">
	                                                <input name="txtWidth" value="" type="text" class="form-control" placeholder="Rộng">
	                                            </div>
	                                            <div class="col-md-3 col-sm-3 col-xs-4">
	                                                <input name="txtHeight" value="" type="text" class="form-control" placeholder="Cao">
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-3"> Trọng Lượng
	                                            </label>
	                                            <div class="col-md-5 col-sm-5 col-xs-5">
	                                                <input name="txtWeight" value="" type="text" class="form-control" placeholder="Trọng Lượng">
	                                            </div>
	                                            <div class="col-md-4 col-sm-4 col-xs-4">
	                                                <select name="sltWeightType" class="form-control">
	                                                    <option value="Grams (g)">Grams (g)</option>
	                                                    <option value="Kilograms (kg)">Kilograms (kg)</option>
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-3"> Thứ Tự Hiển Thị
	                                            </label>
	                                            <div class="col-md-5 col-sm-5 col-xs-5">
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
	                <div class="tab-pane" id="tab-attributes">
	                    <a onclick="addAttribute();" class="btn btn-success pull-right">Thêm Mới Thuộc Tính</a>
	                    <table class="table table-bordered">
	                        <thead>
	                            <tr>
	                                <th> Tên Thuộc Tính</th>
	                                <th style="width: 15%">Giá Nhập Kho</th>
	                                <th style="width: 15%">Giá Bán</th>
	                                <th style="width: 15%">Giá Khuyến Mãi</th>
	                                <th style="width: 15%">Số Lượng</th>
	                                <th style="width: 5%"></th>
	                            </tr>
	                        </thead>
	                        <tbody id="contentAttribute">
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</form>
</div>
@stop