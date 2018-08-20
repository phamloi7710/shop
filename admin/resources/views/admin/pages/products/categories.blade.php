@section('title')
{{__('general.categories')}}
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
        <div class="x_content table-responsive">
            <table id="datatable" class="table table-hover table-bordered jambo_table" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th class="column-title"> {{__('general.categoryName')}}</th>
                        <th class="column-title" style="text-align: center; width: 10%"> {{__('general.sort')}}</th>
                        <th class="column-title" style="text-align: center; width: 10%"> {{__('general.status')}}</th>
                        <th class="column-title no-link last" style="text-align: center; width: 10%"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php listCate($category)?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade add-new" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="addcate" method="POST" action="{{route('postAddCategoryAdmin')}}" class="form-horizontal">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> {{__("general.addNewCategory")}}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.categoryName')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="txtCategoryName" type="text" class="form-control" placeholder="{{__('placeholder.categoryName')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.parentCategory')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select name="sltparentCategory" class="form-control selectpicker" data-live-search="true">
                               <option value="0">----{{__('general.root')}}----</option>
                            <?php menuMultiInCate($category,0,$str = "&ensp;",old('sltparentCategory')) ?>
                           </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.sort')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="txtSort" value="{{old('txtSort')}}" type="text" class="form-control" placeholder="{{__('placeholder.sort')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.status')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            
                            <input type="radio" class="flat" name="status" value="active" checked="">
                            {{__("general.using")}} 
                            <div class="clearfix"></div>
                            
                            <input type="radio" class="flat" name="status" value="inActive">
                            {{__("general.notUsing")}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.note')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="note" class="form-control"></textarea>
                        </div>
                    </div>
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


@foreach($category as $value)
<div class="modal fade token-{{$value['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="editcate" method="POST" action="{{route('postEditCategoryAdmin',['id'=>$value['id']])}}" class="form-horizontal">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> {{__("general.editCategory")}}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.categoryName')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="txtCategoryName" value="{{$value['name']}}" type="text" class="form-control" placeholder="{{__('placeholder.categoryName')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.parentCategory')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select name="sltparentCategory" class="form-control selectpicker" data-live-search="true">
                               <option value="0"> ----{{__('general.root')}}----</option>
                            <?php menuMultiInCate($category,0,$str = "&ensp;",$value['parent_id']) ?>
                           </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.sort')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="txtSort" value="{{$value['sort']}}" type="text" class="form-control" placeholder="{{__('placeholder.sort')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.status')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            
                            <input type="radio" class="flat" name="status" value="active" @if($value['status']=='active') checked @endif>
                            {{__("general.using")}} 
                            <div class="clearfix"></div>
                            
                            <input type="radio" class="flat" name="status" value="inActive" @if($value['status']=='inActive') checked @endif>
                            {{__("general.notUsing")}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.note')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="note" class="form-control">{{$value['note']}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> {{__("general.close")}}</button>
                    <button type="reset" class="btn btn-default"> {{__("general.reset")}}</button>
                    <button type="submit" class="btn btn-success">{{trans('general.update')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
<script type="text/javascript">
    $(document).ready(function(){$("#addcate").bootstrapValidator({feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{txtCategoryName:{validators:{stringLength:{min:2,max:255,message:'{{__("notify.lenghtCategoryName")}}'},notEmpty:{message:'{{__("notify.requiredCategoryName")}}'}}}}}).on("success.form.bv",function(c){$("#success_message").slideDown({opacity:"show"},"slow");$("#addcate").data("bootstrapValidator").resetForm();c.preventDefault();var b=$(c.target);var a=b.data("bootstrapValidator");$.post(b.attr("action"),b.serialize(),function(d){console.log(d)},"json")});$("#editcate").bootstrapValidator({feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{txtCategoryName:{validators:{stringLength:{min:2,max:255,message:'{{__("notify.lenghtCategoryName")}}'},notEmpty:{message:'{{__("notify.requiredCategoryName")}}'}}}}}).on("success.form.bv",function(c){$("#success_message").slideDown({opacity:"show"},"slow");$("#editcate").data("bootstrapValidator").resetForm();c.preventDefault();var b=$(c.target);var a=b.data("bootstrapValidator");$.post(b.attr("action"),b.serialize(),function(d){console.log(d)},"json")})});
</script>
@stop