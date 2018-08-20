@section('title')
{{__('general.permission')}}
@stop
@extends('admin.general.master')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{trans('general.addNew')}}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{route('postAddPermisssion')}}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Role</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                                @endforeach

                            </div>
                        </div> -->
                        <div class="form-group">                                        
                            <label class="col-md-3 control-label">Role</label>
                            <div class="col-md-9">     
                                <select name="permission[]" class="selectpicker name select" multiple data-max-options="">
                                    @foreach($permission as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>   
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-xs">Them moi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{trans('general.listPermission')}}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{__('general.id')}}</th>
                                <th>{{__('general.name')}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>
                                    <a class="btn btn-success">{{__('general.edit')}}</a>
                                    <a class="btn btn-success">{{__('general.delete')}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop