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
        <div class="x_content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> {{__('general.categoryName')}}</th>
                        <th> {{__('general.sort')}}</th>
                        <th> {{__('general.status')}}</th>
                        <th></th>
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
        <form method="POST" action="{{route('postAddCategoryAdmin')}}" class="form-horizontal form-label-left">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> {{__("general.addNewLanguage")}}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.categoryName')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="txtName" value="{{old('txtName')}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.parentCategory')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select name="sltparentCategory" class="form-control select" data-live-search="true">
                               <option value="0">Thư mục gốc</option>
                            <?php menuMulti($category,0,$str = "&ensp;",old('sltparentCategory')) ?>
                           </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.sort')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="txtSort" value="{{old('txtSort')}}" type="text" class="form-control">
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
<div class="modal fade token-{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form method="POST" action="{{route('postAddCategoryAdmin')}}" class="form-horizontal form-label-left">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> {{__("general.addNewLanguage")}}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.categoryName')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="txtName" value="{{$value->name}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.parentCategory')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select name="sltparentCategory" class="form-control select" data-live-search="true">
                               <option value="0">Thư mục gốc</option>
                            <?php menuMultiInCate($category,0,$str = "&ensp;",old('sltparentCategory')) ?>
                           </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.sort')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="txtSort" value="{{old('txtSort')}}" type="text" class="form-control">
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
@endforeach
@stop