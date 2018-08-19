@section('title')
{{__('general.products')}}
@stop
@extends('admin.general.master')
@section('content')
<div class="right_col" role="main">
    <form method="POST" action="{{route('postEditProductAdmin',['id'=>$product->id])}}" class="form-horizontal form-label-left">
    @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2> {{__('general.products')}}</h2>
                <button type="submit" class="btn btn-success pull-right">{{trans('general.save')}}</button>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-general" data-toggle="tab">Tổng quan</a></li>
                    <li><a href="#tab-data" data-toggle="tab">Dữ liệu</a></li>
                    <li><a href="#tab-attributes" data-toggle="tab"> Thuộc Tính Sản Phẩm</a></li>
                </ul>
                <div class="tab-content" style="margin-top: 30px;">
                    <div class="tab-pane active" id="tab-general">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Tên Sản Phẩm
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input name="txtName" value="{{$product->name}}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"> Mã Sản Phẩm
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input name="txtCode" value="{{$product->code}}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Mô Tả Ngắn
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <textarea name="summary" class="form-control" rows="5">{{$product->summary}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"> Nội Dung Sản Phẩm
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <textarea name="content" id="ckeditor">{!!$product->content!!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"> Thẻ Tiêu Đề (Meta Title)
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input name="txtTitleSeo" value="{{$product->titleSeo}}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"> Thẻ Mô Tả ( Meta Description)
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input name="txtDescriptionSeo" value="{{$product->descriptionSeo}}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"> Từ Khóa ( Tags)
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input name="txtTags" value="{{$product->tags}}" type="text" class="form-control">
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
                                                <img class="imagePreview" style="width: 100%; height: 100%;" id="previewImage" src="{{url('')}}/{{$product->avatar}}" alt="">
                                            </div>
                                            <input id="avatar" name="avatar" value="{{$product->avatar}}" class="form-control" type="hidden">
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
                                                    <input id="priceWareHouseVn" type="text" value="(VNĐ) {{number_format($product->priceWareHouse,0,'',' ')}}" name="txtPriceWareHouse" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá Bán
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="priceVn" type="text" value="(VNĐ) {{number_format($product->priceSell,0,'',' ')}}" name="txtPriceSell" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá Khuyến Mãi(Nếu Có)
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input id="priceSaleVn" type="text" value="(VNĐ) {{number_format($product->priceSale,0,'',' ')}}" name="txtPriceSale" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Số Lượng Nhập Kho
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input name="txtQty" value="{{$product->qty}}" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-6"> Đơn Vị Kích Thước
                                                </label>
                                                <div class="col-md-5 col-sm-5 col-xs-6">
                                                    <select name="sltSizeType" class="form-control">
                                                        <option value="Millimetres (mm)" @if($sizeData['type']=='Millimetres (mm)') selected @endif>Millimetres (mm)</option>
                                                        <option value="Centimetre (cm)" @if($sizeData['type']=='Centimetre (cm)') selected @endif>Centimetre (cm)</option>
                                                        <option value="Inchs (in)" @if($sizeData['type']=='Inchs (in)') selected @endif>Inchs (in)</option>
                                                        <option value="Feet (ft)" @if($sizeData['type']=='Feet (ft)') selected @endif>Feet (ft)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Kích Thước
                                                </label>
                                                <div class="col-md-3 col-sm-3 col-xs-4">
                                                    <input name="txtLength" value="{{$sizeData['length']}}" type="text" class="form-control" placeholder="Chiều Dài">
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-4">
                                                    <input name="txtWidth" value="{{$sizeData['width']}}" type="text" class="form-control" placeholder="Chiều Rộng">
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-4">
                                                    <input name="txtHeight" value="{{$sizeData['height']}}" type="text" class="form-control" placeholder="Chiều Cao">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-3"> Trọng Lượng
                                                </label>
                                                <div class="col-md-5 col-sm-5 col-xs-5">
                                                    <input name="txtWeight" value="{{$weightData['weight']}}" type="text" class="form-control" placeholder="Trọng Lượng">
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <select name="sltWeightType" class="form-control">
                                                        <option value="Grams (g)" @if($weightData['type']=='Grams (g)') selected @endif>Grams (g)</option>
                                                        <option value="Kilograms (kg)" @if($weightData['type']=='Kilograms (kg)') selected @endif>Kilograms (kg)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-6"> Thứ Tự Hiển Thị
                                                </label>
                                                <div class="col-md-5 col-sm-5 col-xs-6">
                                                    <input name="txtSort" value="{{$product->sort}}" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Hình Ảnh Chi Tiết
                                                </label>
                                                <a onclick="addImage();" class="btn btn-primary btn-xs"> Thêm Ảnh</a>
                                            </div>
                                            <div id="contentImage"> 
                                                @php $i=0 @endphp
                                                @foreach ($imageData as $value)
                                                <div id="image-row{{$i}}" class="col-md-3" style="margin-top: 20px;">
                                                    <div class="image view view-first">
                                                        <img id="previewImageProduct{{$i}}" style="width: 100%; display: block;" src="{{url('')}}/{{$value['image']}}">
                                                        <input id="imageProduct{{$i}}" name="imageData[]" class="form-control" type="hidden" value="{{$value['image']}}">
                                                        <div class="mask no-caption">
                                                            <div class="tools tools-bottom"><a href="javascript:;" data-input="imageProduct{{$i}}" data-preview="previewImageProduct{{$i}}" class="selectImage{{$i}}" data-toggle="tooltip" data-placement="top" data-original-title="Chọn Hình Ảnh"><i class="fa fa-plus"></i></a><a href="javascript:;" onclick="$('#image-row{{$i}}').remove();"><i class="fa fa-trash"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    $(document).ready(function(){
                                                        $('.selectImage{{$i}}').filemanager('image');
                                                        var lfm = function(options, cb) {
                                                            var route_prefix = (options && options.prefix) ? options.prefix : '/uploads';
                                                            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=1200,height=800');
                                                            window.SetUrl = cb;
                                                        };
                                                    })
                                                    
                                                </script>
                                                @php $i++; @endphp
                                                @endforeach
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
                                @php $i=0 @endphp
                                @foreach($attributeData as $att)
                                <tr id="AttributeRow{{$i}}">
                                    <td><input value="{{$att['AttributeName']}}" type="text" name="txtAttributeName[]" class="form-control" placeholder="Tên Thuộc Tính"></td>
                                    <td><input value="{{$att['AttributePriceWareHouse']}}" type="text" name="txtAttributePriceWareHouse[]" class="form-control" placeholder="Giá Nhập Kho"></td>
                                    <td><input value="{{$att['AttributePriceSell']}}" type="text" name="txtAttributePriceSell[]" class="form-control" placeholder="Giá Bán"></td>
                                    <td><input value="{{$att['AttributePriceSale']}}" type="text" name="txtAttributePriceSale[]" class="form-control" placeholder="Giá Khuyến Mãi"></td>
                                    <td><input value="{{$att['AttributeQty']}}" type="text" name="txtAttributeQty[]" class="form-control" placeholder="Số Lượng"></td>
                                    <td class="center">
                                        <a href="javascript:void(0)" onclick="$('#AttributeRow{{$i}}').remove();" title="Xóa" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
    var row = {{count($imageData)}};
    function addImage(){
        html = '<div id="image-row'+row+'" class="col-md-3" style="margin-top: 20px;">';
        html += '<div class="image view view-first">';
        html += '<img id="previewImageProduct'+row+'" style="width: 100%; display: block;" src="assets/images/no-image.jpg">';
        html += '<input id="imageProduct'+row+'" name="imageData[]" class="form-control" type="hidden">';
        html += '<div class="mask no-caption">';
        html += '<div class="tools tools-bottom">';
        html += '<a href="javascript:;" data-input="imageProduct'+row+'" data-preview="previewImageProduct'+row+'" class="selectImage'+row+'" data-toggle="tooltip" data-placement="top" data-original-title="{{__("general.selectImage")}}"><i class="fa fa-plus"></i></a>';
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
    };
</script>
@stop