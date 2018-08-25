@section('title')
{{trans('general.languages')}}
@stop
@extends('admin.general.master')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{trans('general.languages')}}</h2>
                <a class="btn btn-primary pull-right" href="javascript:;" data-toggle="modal" data-target=".add-new">{{trans('general.addNew')}}</a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                        <tr class="center">
                            <th style="width: 30%;">{{trans('general.name')}}</th>
                            <th style="width: 10%;">{{trans('general.code')}}</th>
                            <th style="width: 8%;">{{trans('general.image')}}</th> 
                            <th style="width: 8%;" class="center">{{trans('general.status')}}</th>
                            <th style="width: 10%;">{{trans('general.action')}}</th>    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($languages as $value)
                        <tr class="center">
                            <td>{{$value->name}}</td>
                            <td>{{$value->code}}</td>
                            <td><img width="30" src="{{url('')}}/{{$value->image}}" alt=""></td>
                            <td style="font-size: 16px">
                            @if($value->status=='active')
                                <span class="label label-success"> {{__("general.using")}}</span>
                            @else
                                <span class="label label-danger"> {{__("general.notUsing")}}</span>
                                @endif
                            </td>
                            <td>
                                <a href="javascript:;" data-toggle="modal" data-target=".{{$value->code}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                <a onclick="return alertMsg('delete/{{$value->id}}','{{trans('general.msgDelete')}}');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
@foreach($languages as $value)
<div class="modal fade {{$value->code}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form method="POST" action="{{route('postEditLanguage',['id'=>$value->id])}}" class="form-horizontal form-label-left">
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
                            <input name="txtName" value="{{$value->name}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.code')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="txtCode" value="{{$value->code}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">{{__('general.image')}}</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <a data-input="image{{$value->id}}" data-preview="previewFlagEdit{{$value->id}}" class=" btn btn-info btn-xs selectImage" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.selectAImage')}} {{__('general.imageLanguage')}}">{{__('general.selectImage')}}</a>
                                <a class="deleteImage{{$value->id}}" href="javascript:;" title=""><span data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.deleteImage')}} " style="font-size: 30px; color: red;" class="fa fa-trash-o pull-right"></span></a>
                                <div class="thumbnail">
                                    <img class="imagePreview{{$value->id}}" style="width: 100%; height: 100%;" id="previewFlagEdit{{$value->id}}" src="{{url('')}}/{{$value->image}}" alt="">
                                </div>
                                <div class="center">
                                    <input value="{{$value->image}}" id="image{{$value->id}}" name="image" class="form-control" type="hidden">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.status')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            
                            <input type="radio" class="flat" name="status" value="active" @if($value->status=='active') checked="" @endif>
                            {{__("general.using")}} 
                            <div class="clearfix"></div>
                            
                            <input type="radio" class="flat" name="status" value="inActive" @if($value->status=='inActive') checked="" @endif>
                            {{__("general.notUsing")}}
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
<?php echo "<script type='text/javascript'>"; ?>
@foreach($languages as $value)
@include('admin.pages.data')
@endforeach
<?php echo "</script>"; ?>
@endsection