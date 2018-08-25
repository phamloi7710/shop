@section('title')
{{__("general.userGroup")}}
@stop
@extends('admin.general.master')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<form id="jvalidate" method="POST" action="{{route('postEditUser',['id'=>$user->id])}}" class="form-horizontal form-label-left">
    @csrf
	    <div class="x_panel">
	        <div class="x_title">
	            <h2>{{trans('general.editUser')}}</h2>
	            <div class="form-group pull-right">
                	<button type="reset" class="btn btn-default"> {{__("general.reset")}}</button>
        			<button type="submit" class="btn btn-success">{{trans('general.saveChanges')}}</button>
                </div>
	            <div class="clearfix"></div>
	        </div>
	        <div class="x_content">
	        	<div class="row">
	                <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body profile">
                                <div class="profile-image">
                                    @if($user->avatar)
                                    <img class="imagePreview" style="width: 100%; height: 100%;" id="previewImageEdit" src="{{url('')}}/{{$user->avatar}}" alt="">
                                    @else
                                    <img class="imagePreview" style="width: 100%; height: 100%;" id="previewImageEdit" src="{{url('')}}/assets/images/no-image.jpg" alt="">
                                    @endif
                                </div>
                                <input value="{{$user->avatar}}" id="avatar" name="avatar" class="form-control" type="hidden">
                                <div class="profile-data">
                                    <div class="profile-data-name center" style="color:#00A887; margin-top: 20px; font-size: 16px;"><b class="txtNameShow">{{$user->name}}</b></div>
                                </div>
                            </div>
                            <div class="panel-body center">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a data-input="avatar" data-preview="previewImageEdit" class=" btn btn-info btn-xs selectImage" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.selectImage')}}">{{__('general.selectAvatar')}}</a>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <a class="deleteImage btn btn-danger btn-xs" href="javascript:;" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.deleteImage')}}">{{__('general.deleteImage')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body list-group border-bottom">
                                <a href="javascript:;" class="list-group-item" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.emailAddress')}}"><span class="fa fa-envelope"></span> <b class="txtEmailShow{{$user->id}}"> {{$user->email}}</b></a>
                                <a href="javascript:;" class="list-group-item" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.username')}}"><span class="fa fa-user"></span> <b class="txtUsernameShow{{$user->id}}"> {{$user->username}}</b></a>
                                <a href="javascript:;" class="list-group-item" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.phoneNumber')}}"><span class="fa fa-phone"></span> <b class="txtPhoneShow{{$user->id}}"> {{$user->phone}}</b></a>
                                <a href="javascript:;" class="list-group-item" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.userGroup')}}"><span class="fa fa-users"></span> <b class="txtGroupShow{{$user->id}}"> {{$user->group->name}}</b></a>
                            </div>
                        </div>
                        
	                </div>
	                <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.fullName')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtName" value="{{$user->name}}" type="text" class="txtName{{$user->id}} form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.emailAddress')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtEmail" value="{{$user->email}}" type="email" class="txtEmail{{$user->id}} form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.username')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtUsername" value="{{$user->username}}" type="text" class="txtUsername{{$user->id}} form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.password')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtPassword" value="{{$user->passwordValue}}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.phoneNumber')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtPhone" value="{{$user->phone}}" type="text" class="txtPhone{{$user->id}} form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.userGroup')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select name="sltGroup" class="sltGroup{{$user->id}} select2_single form-control" tabindex="-1">
                                            <option value="">----{{__("general.selectUserGroup")}}----</option>
                                            @foreach($group as $gr)
                                            <option value="{{$gr->id}}" @if($user->group_id==$gr->id) selected @endif>{{$gr->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.birthDay')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class='input-group date' id='datetimepicker5'>
                                            <input name="birthday" type='text' class="form-control" value="{{date('Y-m-d', $user->birthday)}}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('.date').datetimepicker({
                                            format: "YYYY/MM/DD",
                                        });
                                    });
                                </script>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.address')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtAddress" value="{{$user->address}}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.cmnd')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="txtCMND" value="{{$user->cmnd}}" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.gender')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="radio" class="flat" name="gender" value="{{__('general.male')}}" @if($user->gender==__("general.male")) checked @endif>
                                        {{__("general.male")}} 
                                        &#160;&#160;&#160;&#160;
                                        <input type="radio" class="flat" name="gender" value="{{__('general.female')}}" @if($user->gender==__("general.female")) checked @endif>
                                        {{__("general.female")}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.status')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="radio" class="flat" name="status" value="active" @if($user->status=='active') checked @endif>
                                        {{__("general.isActive")}} 
                                        &#160;&#160;&#160;&#160;
                                        <input style="color: red;" type="radio" class="flat" name="status" value="inActive" @if($user->status=='inActive') checked @endif>
                                        {{__("general.locked")}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.roles')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="panel panel-default">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td>
                                                            @php $i=0 @endphp
                                                            @foreach($roles as $value)
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input name="roles[{{$i}}]" type="checkbox" class="flat" value="{{$value['name']}}" @foreach($userRole as $role) @if($role->name==$value->name) checked="checked" @endif @endforeach> {{$value['name']}}
                                                                </label>
                                                            </div>
                                                            @php $i++ @endphp
                                                            @endforeach
                                                            
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.note')}}
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea name="note" class="form-control" rows="10">{{$user->note}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
	                </div>
	            </div>
	        </div>
	    </div>
	</form>
</div>
@stop