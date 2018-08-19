@section('title')
{{__('general.categories')}}
@stop
@extends('admin.general.master')
@section('content')
<div class="right_col" role="main">
    <form method="POST" action="{{route('postEditCategoryAdmin',['id'=>$category->id])}}" class="form-horizontal form-label-left">
    @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2> {{__('general.products')}}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.categoryName')}}
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="txtName" value="{{$category->name}}" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.parentCategory')}}
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <select name="sltparentCategory" class="form-control select" data-live-search="true">
                           <option value="0"> {{__('general.root')}}</option>
                            <?php menuMulti($category,0,$str = "&ensp;",old('sltparentCategory')) ?>
                       </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.sort')}}
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="txtSort" value="{{$category->sort}}" type="text" class="form-control">
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
                        <textarea name="note" class="form-control">{{$category->note}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button type="reset" class="btn btn-default"> {{__("general.reset")}}</button>
                    <button type="submit" class="btn btn-success">{{trans('general.addNew')}}</button>
                </div>
            </div>
        </div>
    </form>
</div>
@stop