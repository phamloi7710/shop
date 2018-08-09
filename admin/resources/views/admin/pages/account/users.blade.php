@section('title')
{{__("general.userGroup")}}
@stop
@extends('admin.general.master')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{trans('general.userGroup')}}</h2>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".add-new"> {{__("general.addNew")}}</button>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th style="width: 20%;"> {{trans('general.name')}}</th>
                    <th style="width: 10%;"> {{trans('general.emailAddress')}}</th>
                    <th style="width: 10%;"> {{trans('general.username')}}</th>
                    <th style="width: 15%;"> {{trans('general.userGroup')}}</th>
                    <th style="width: 8%;"> {{trans('general.status')}}</th>
                    <th style="width: 7%;"> {{trans('general.action')}}</th>
                </tr>
                
              </thead>
              <tbody>
                @foreach($users as $value)
                <tr>
                    <td> {{$value->name}}</td>
                    <td> {{$value->email}}</td>
                    <td> {{$value->username}}</td>
                    <td> {{$value->group->name}}</td>
                    <td style="font-size: 16px;">
                        @if($value->status=='active')
                        <span class="label label-success"> {{__("general.isActive")}}</span>
                        @else
                        <span class="label label-danger"> {{__("general.locked")}}</span>
                        @endif
                    </td>
                    <td class="center">
                        <a href="javascript:;" data-toggle="modal" data-target=".token-{{$value->id}}" class="btn btn-success btn-xs"><span class="fa fa-eye"></span></a>
                        <a href="{{route('deleteUser',['id'=>$value->id])}}" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade add-new" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" role="form" action="{{route('postAddUser')}}" class="form-horizontal form-label-left" id="jvalidate">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> {{__("general.addNewEmploye")}}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <a data-input="avatar" data-preview="previewImage" class=" btn btn-info btn-xs selectImage" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.selectImage')}}"> {{__('general.selectAvatar')}}</a>
                                        <a class="deleteImage" href="javascript:;" title=""><span data-toggle="tooltip" data-placement="left" data-original-title="{{__('general.deleteImage')}}" style="font-size: 30px; color: red;" class="fa fa-trash-o pull-right"></span></a>
                                        <div class="thumbnail">
                                            <img class="imagePreview" style="width: 100%; height: 100%;" id="previewImage" src="assets/images/no-image.jpg" alt="">
                                        </div>
                                        <input id="avatar" name="avatar" class="form-control" type="hidden">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body profile" style="background: url('assets/images/gallery/music-4.jpg') center center no-repeat;">
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
                                <div class="panel-body list-group border-bottom">
                                    <a href="javascript:;" class="list-group-item"><span class="fa fa-envelope"></span> <b class="txtEmailShow"> </b></a>
                                    <a href="javascript:;" class="list-group-item"><span class="fa fa-user"></span> <b class="txtUsernameShow"> </b></a>
                                    <a href="javascript:;" class="list-group-item"><span class="fa fa-phone"></span> <b class="txtPhoneShow"> </b></a>
                                    <a href="javascript:;" class="list-group-item"><span class="fa fa-users"></span> <b class="txtGroupShow"> </b></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-body profile">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="txtName">{{trans('general.fullName')}}
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input name="txtName" value="{{old('txtName')}}" type="text" class="txtName form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.emailAddress')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input name="txtEmail" value="{{old('txtEmail')}}" type="email" class="txtEmail form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.username')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input name="txtUsername" value="{{old('txtUsername')}}" type="text" class="txtUsername form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.password')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input name="txtPassword" value="{{old('txtPassword')}}" type="text" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.phoneNumber')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input name="txtPhone" value="{{old('txtPhone')}}" type="text" class="txtPhone form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.userGroup')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="sltGroup" data-live-search="true" class="sltGroup select2_single form-control select" tabindex="-1">
                                                <option value="">----{{__("general.selectUserGroup")}}----</option>
                                                @foreach($group as $value=>$gr)
                                                <option value="{{$gr->id}}">{{$gr->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
@foreach($users as $value)
<div class="modal fade token-{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="jvalidate{{$value->id}}" method="POST" action="{{route('postEditUser',['id'=>$value->id])}}" class="form-horizontal form-label-left">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> {{__("general.viewUpdateEmploye")}}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body profile" style="background: url('assets/images/gallery/music-4.jpg') center center no-repeat;">
                                    <div class="profile-image">
                                        <img class="imagePreview{{$value->id}}" style="width: 100%; height: 100%;" id="previewImageEdit{{$value->id}}" src="{{url('')}}/{{$value->avatar}}" alt="">
                                    </div>
                                    <input value="{{$value->avatar}}" id="avatar{{$value->id}}" name="avatar" class="form-control" type="hidden">
                                    <div class="profile-data">
                                        <div class="profile-data-name center" style="color:#00A887; margin-top: 20px; font-size: 16px;"><b class="txtNameShow">{{$value->name}}</b></div>
                                    </div>
                                </div>
                                <div class="panel-body center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a data-input="avatar{{$value->id}}" data-preview="previewImageEdit{{$value->id}}" class=" btn btn-info btn-xs selectImage" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.selectImage')}}">{{__('general.selectAvatar')}}</a>
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <a class="deleteImage{{$value->id}} btn btn-danger btn-xs" href="javascript:;" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.deleteImage')}}">{{__('general.deleteImage')}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body list-group border-bottom">
                                    <a href="javascript:;" class="list-group-item" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.emailAddress')}}"><span class="fa fa-envelope"></span> <b class="txtEmailShow{{$value->id}}"> {{$value->email}}</b></a>
                                    <a href="javascript:;" class="list-group-item" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.username')}}"><span class="fa fa-user"></span> <b class="txtUsernameShow{{$value->id}}"> {{$value->username}}</b></a>
                                    <a href="javascript:;" class="list-group-item" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.phoneNumber')}}"><span class="fa fa-phone"></span> <b class="txtPhoneShow{{$value->id}}"> {{$value->phone}}</b></a>
                                    <a href="javascript:;" class="list-group-item" data-toggle="tooltip" data-placement="right" data-original-title="{{__('general.userGroup')}}"><span class="fa fa-users"></span> <b class="txtGroupShow{{$value->id}}"> {{$value->group->name}}</b></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-body profile">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.fullName')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input name="txtName" value="{{$value->name}}" type="text" class="txtName{{$value->id}} form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.emailAddress')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input name="txtEmail" value="{{$value->email}}" type="email" class="txtEmail{{$value->id}} form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.username')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input name="txtUsername" value="{{$value->username}}" type="text" class="txtUsername{{$value->id}} form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.password')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input name="txtPassword" value="{{old('txtPassword')}}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.phoneNumber')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input name="txtPhone" value="{{$value->phone}}" type="text" class="txtPhone{{$value->id}} form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.userGroup')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="sltGroup" class="sltGroup{{$value->id}} select2_single form-control" tabindex="-1">
                                                <option value="">----{{__("general.selectUserGroup")}}----</option>
                                                @foreach($group as $gr)
                                                <option value="{{$gr->id}}" @if($value->group_id==$gr->id) selected @endif>{{$gr->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.birthDay')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <div class='input-group date' id='datetimepicker5'>
                                                <input name="birthday" type='text' class="form-control" value="{{date('Y-m-d', $value->birthday)}}" />
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
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.address')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input name="txtAddress" value="{{$value->address}}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.cmnd')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input name="txtCMND" value="{{$value->cmnd}}" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.gender')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="radio" class="flat" name="gender" value="{{__('general.male')}}" @if($value->gender==__("general.male")) checked @endif>
                                            {{__("general.male")}} 
                                            &#160;&#160;&#160;&#160;
                                            <input type="radio" class="flat" name="gender" value="{{__('general.female')}}" @if($value->gender==__("general.female")) checked @endif>
                                            {{__("general.female")}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">{{trans('general.note')}}
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <textarea name="note" class="form-control" rows="10">{{$value->note}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> {{__("general.close")}}</button>
                    <button type="reset" class="btn btn-default"> {{__("general.reset")}}</button>
                    <button type="submit" class="btn btn-success">{{trans('general.saveChanges')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
<?php echo "<script type='text/javascript'>"; ?>
@foreach($users as $value)
@include('admin.pages.data')
@endforeach
<?php echo "</script>"; ?>

@stop