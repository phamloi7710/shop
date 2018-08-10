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
    <div class="modal-dialog modal-md">
        <form method="POST" action="{{route('postAddLanguage')}}" class="form-horizontal form-label-left">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> {{__("general.addNewLanguage")}}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.title')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="txtName" value="{{old('txtName')}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.code')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="txtCode" value="{{old('txtCode')}}" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-md-3 control-label"> {{_('general.image')}}</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <a data-input="image" data-preview="previewFlag" class=" btn btn-info btn-xs selectImage" data-toggle="tooltip" data-placement="right" data-original-title="Select a image of the language"> {{__('general.selectImage')}}</a>
                                    <a class="deleteImage" href="javascript:;" title=""><span data-toggle="tooltip" data-placement="right" data-original-title="Delete Image " style="font-size: 30px; color: red;" class="fa fa-trash-o pull-right"></span></a>
                                    <div class="thumbnail">
                                        <img class="imagePreview" style="width: 100%; height: 100%;" id="previewFlag" src="assets/images/no-image.jpg" alt="">
                                    </div>
                                    <input id="image" name="image" class="form-control" type="hidden">
                                </div>
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
@stop