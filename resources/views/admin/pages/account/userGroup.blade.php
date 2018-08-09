@section('title')
{{__("general.userGroup")}}
@stop
@extends('admin.general.master')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-4">
    		<form class="form-horizontal" role="form" method="POST" action="{{route('postAddUserGroup')}}">
    			@csrf
               	<div class="form-group">
                    <label class="col-md-3 control-label">{{__('general.name')}}</label>
                    <div class="col-md-9">
                        <input name="txtName" type="text" class="form-control" placeholder="{{__('input.UserGroupName')}}" value="{{old('txtName')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">{{__('general.note')}}</label>
                    <div class="col-md-9">
                        <textarea name="note" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-rounded pull-right" data-toggle="tooltip" data-placement="left" title="" data-original-title="{{__('general.addNewUserGroup')}}">{{__('general.addNew')}}</button>
                </div>      
            </form>
    	</div>
    	<div class="col-md-8">
    		<div class="x_panel">
            	<div class="x_title">
            		<h2>{{trans('general.userGroup')}}</h2>
            		<div class="clearfix"></div>
            	</div>
            	<div class="x_content">
            		<table class="table table-striped">
                      <thead>
                        <tr>
	                      	<th> {{trans('general.userGroup')}}</th>
	                      	<th> {{trans('general.note')}}</th>
	                      	<th> {{trans('general.action')}}</th>
                        </tr>
                        
                      </thead>
                      <tbody>
                      	@foreach($group as $value)
                        <tr>
                          	<td> {{$value->name}}</td>
                          	<td> {{$value->note}}</td>
                          	<td></td>
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