@section('title')
{{__('general.products')}}
@stop
@extends('admin.general.master')
@section('content')
<div class="right_col" role="main">
	<form id="addproduct" method="POST" action="{{route('postAddProductAdmin')}}" class="form-horizontal">
    @csrf
		<div class="x_panel">
	        <div class="x_title">
	            <h2> {{__('general.addProduct')}}</h2>
	            <button type="submit" class="btn btn-success pull-right">{{trans('general.save')}}</button>
	            <div class="clearfix"></div>
	        </div>
	        <div class="x_content">
	            <ul class="nav nav-tabs">
	                <li class="active"><a href="#tab-general" data-toggle="tab">{{__('general.overview')}}</a></li>
	                <li><a href="#tab-data" data-toggle="tab">{{__('general.data')}}</a></li>
	                <li><a href="#tab-image" data-toggle="tab">{{__('general.image')}}</a></li>
	                <li><a href="#tab-attributes" data-toggle="tab">{{__('general.productAttributes')}}</a></li>
	                <li><a href="#tab-seo" data-toggle="tab">{{__('general.seo')}}</a></li>
	            </ul>
	            <div class="tab-content" style="margin-top: 30px;">
	                <div class="tab-pane active" id="tab-general">
	                    <div class="form-group">
	                        <label class="control-label col-md-2 col-sm-2 col-xs-12">{{__('general.productName')}}
	                        </label>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
	                            <input placeholder="{{__('placeholder.productName')}}" name="txtName" type="text" class="form-control">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-md-2 col-sm-2 col-xs-12">{{__('general.productCode')}}
	                        </label>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
	                            <input value="" name="txtCode" placeholder="{{__('placeholder.productCode')}}" type="text" class="form-control">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-md-2 col-sm-2 col-xs-12"> {{__('general.productCategory')}}
	                        </label>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
	                            <select name="sltparentCategory" class="form-control selectpicker" data-live-search="true">
                               		<option value="0">---{{__('general.root')}}---</option>
	                            		<?php menuMultiInCate($categories,0,$str = "&ensp;",old('sltparentCategory')) ?>
	                           	</select>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-md-2 col-sm-2 col-xs-12">{{__('general.summary')}}
	                        </label>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
	                            <textarea name="summary" class="form-control" rows="5"></textarea>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-md-2 col-sm-2 col-xs-12"> {{__('general.productDetail')}}
	                        </label>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
	                            <textarea name="content" id="ckeditor"></textarea>
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
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('general.qtyWarehouse')}}
	                                            </label>
	                                            <div class="col-md-9 col-sm-9 col-xs-12">
	                                                <input value="{{old('txtQty')?old('txtQty'):0}}" name="txtQty" placeholder="{{__('placeholder.qtyWarehouse')}}" type="text" class="form-control">
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('general.costOfCapital')}}
	                                            </label>
	                                            <div class="col-md-9 col-sm-9 col-xs-12">
	                                                <input value="{{old('txtPriceWareHouse')?old('txtPriceWareHouse'):0}}" placeholder="{{__('placeholder.costOfCapital')}}" type="text" name="txtPriceWareHouse" class="form-control">
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('general.priceSell')}}
	                                            </label>
	                                            <div class="col-md-9 col-sm-9 col-xs-12">
	                                                <input value="{{old('txtPriceSell')?old('txtPriceSell'):0}}" placeholder="{{__('placeholder.priceSell')}}" type="text" name="txtPriceSell" class="form-control">
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('general.priceSale')}}
	                                            </label>
	                                            <div class="col-md-9 col-sm-9 col-xs-12">
	                                                <input value="{{old('txtPriceSale')?old('txtPriceSale'):0}}" placeholder="{{__('placeholder.priceSale')}}" type="text" name="txtPriceSale" class="form-control">
	                                            </div>
	                                        </div>
	                                        
	                                        <div class="form-group">
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-6"> {{__('general.sizeUnit')}}
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
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> {{__('general.size')}}
	                                            </label>
	                                            <div class="col-md-3 col-sm-3 col-xs-4">
	                                                <input name="txtLength" placeholder="{{__('placeholder.size')}}" type="text" class="form-control" placeholder="{{__('placeholder.length')}}">
	                                            </div>
	                                            <div class="col-md-3 col-sm-3 col-xs-4">
	                                                <input name="txtWidth" type="text" class="form-control" placeholder="{{__('placeholder.width')}}">
	                                            </div>
	                                            <div class="col-md-3 col-sm-3 col-xs-4">
	                                                <input name="txtHeight" type="text" class="form-control" placeholder="{{__('placeholder.height')}}">
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">{{__('general.weight')}}
	                                            </label>
	                                            <div class="col-md-5 col-sm-5 col-xs-5">
	                                                <input name="txtWeight" value="" type="text" class="form-control" placeholder="{{__('placeholder.weight')}}">
	                                            </div>
	                                            <div class="col-md-4 col-sm-4 col-xs-4">
	                                                <select name="sltWeightType" class="form-control">
	                                                    <option value="Grams (g)">Grams (g)</option>
	                                                    <option value="Kilograms (kg)">Kilograms (kg)</option>
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">{{__('general.displayOrder')}}
	                                            </label>
	                                            <div class="col-md-5 col-sm-5 col-xs-5">
	                                                <input value="" name="txtSort" placeholder="{{__('placeholder.displayOrder')}}" type="text" class="form-control">
	                                            </div>
	                                        </div>
	                                        
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                          
	                    </div>
	                </div>
	                <div class="tab-pane" id="tab-image">
	                	<div class="form-group">
                            <a onclick="addImage();" class="btn btn-primary pull-right">{{__('general.addImage')}}</a>
                        </div>
                        <div id="contentImage">
                            
                        </div>
	                </div>
	                <div class="tab-pane" id="tab-attributes">
	                    <a onclick="addAttribute();" class="btn btn-success pull-right">{{__('general.addNewAttribute')}}</a>
	                    <table class="table table-bordered">
	                        <thead>
	                            <tr>
	                                <th>{{__('general.attributeName')}}</th>
	                                <th style="width: 20%">{{__('general.costOfCapital')}}</th>
	                                <th style="width: 20%">{{__('general.priceSale')}}</th>
	                                <th style="width: 20%">{{__('general.priceSale')}}</th>
	                                <th style="width: 20%">{{__('general.qtyWarehouse')}}</th>
	                                <th style="width: 5%"></th>
	                            </tr>
	                        </thead>
	                        <tbody id="contentAttribute">
	                        </tbody>
	                    </table>
	                </div>
	                <div class="tab-pane" id="tab-seo">
	                	<div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('general.seoTitle')}}
	                        </label>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
	                            <input value="" name="txtTitleSeo" placeholder="{{__('placeholder.seoTitle')}}" type="text" class="form-control">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('general.seoDescription')}}
	                        </label>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
	                            <input value="" name="txtDescriptionSeo" placeholder="{{__('placeholder.seoDescription')}}" type="text" class="form-control">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('general.seoTags')}}
	                        </label>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
	                            <input value="" name="txtTags" placeholder="{{__('placeholder.seoTags')}}" type="text" class="form-control">
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#addproduct').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                txtName: {
                    validators: {
                        stringLength: {
                            min: 6,
                            max: 255,
                            message:'{{__("notify.lenghtProductName")}}'
                        },
                        notEmpty: {
                            message: '{{__("notify.requiredProductName")}}'
                        }
                    }
        		},
        		txtCode: {
                    validators: {
                        stringLength: {
                            min: 3,
                            max: 64,
                            message:'{{__("notify.lenghtProductCode")}}'
                        },
                        notEmpty: {
                            message: '{{__("notify.requiredProductCode")}}'
                        }
                    }
        		},
        		txtQty:{
        			validators:{
    				 	regexp: {
	                        regexp: /^[0-9]+$/,
	                        message: '{{__("notify.regexpProductQty")}}'
	                    }
        			}
        		},
        		txtPriceWareHouse:{
        			validators:{
    				 	regexp: {
	                        regexp: /^[0-9]+$/,
	                        message: '{{__("notify.regexpProductPriceWareHouse")}}'
	                    }
        			}
        		},
        		txtPriceSell:{
        			validators:{
    				 	regexp: {
	                        regexp: /^[0-9]+$/,
	                        message: '{{__("notify.regexpProductPriceSell")}}'
	                    }
        			}
        		},
        		txtPriceSale:{
        			validators:{
    				 	regexp: {
	                        regexp: /^[0-9]+$/,
	                        message: '{{__("notify.regexpProductPriceSale")}}'
	                    }
        			}
        		}
        	}
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#addproduct').data('bootstrapValidator').resetForm();
            e.preventDefault();
            var $form = $(e.target);
            var bv = $form.data('bootstrapValidator');
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
        
    });
</script>
@stop