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
        <div class="x_content table-responsive">
            <!-- <table class="table table-striped">
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
                        <a href="{{route('getEditUser',$value->id)}}" class="btn btn-success btn-xs"><span class="fa fa-eye"></span></a>
                        <a href="{{route('deleteUser',['id'=>$value->id])}}" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table> -->
            <div class="x_content">
                @foreach($users as $value)
                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                    <div class="well profile_view">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <b class="label label-success pull-left"> {{$value->group->name}}</b>
                                @if($value->status=='active')
                                <b class="label label-success pull-right"> {{__("general.isActive")}}</b>
                                @else
                                <b class="label label-danger pull-right"> {{__("general.locked")}}</b>
                                @endif
                                <div class="panel-body">
                                    <div class="profile-image">
                                        <img src="{{url('')}}/{{$value->avatar}}" alt="" class="img-circle img-responsive">
                                    </div>
                                </div>
                                <div class="panel-body list-group border-bottom">
                                    <p class="list-group-item"><strong>{{__('general.username')}}: </strong> {{$value->name}}</p>
                                    <p class="list-group-item"><strong>{{__('general.email')}}: </strong>{{$value->email}}</p>
                                    <p class="list-group-item"><strong>{{__('general.address')}}: </strong>{{$value->address}}</p>
                                    <p class="list-group-item"><strong>{{__('general.phone')}}: </strong>{{$value->phone}}</p>
                                    <p class="list-group-item"><strong>{{__('general.birthday')}}: </strong>{{date('d/m/Y',$value->birthday)}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis pull-right">
                                <a href="{{route('deleteUser',$value->id)}}" class="btn btn-danger btn-xs pull-right">
                                    <i class="fa fa-trash"></i>{{__('general.delete')}}
                                </a>
                                <a href="{{route('getEditUser',$value->id)}}" class="btn btn-primary btn-xs pull-right">
                                    <i class="fa fa-eye"></i>{{__('general.viewProfile')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body profile">
                                    <div class="profile-image">
                                        <img class="imagePreview" style="width: 100%; height: 100%;" id="previewImage" src="assets/images/no-image.jpg" alt="">
                                    </div>
                                    <input id="avatar" name="image" class="form-control" type="hidden">
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
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body profile">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtName">{{trans('general.fullName')}}
                                                </label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input name="txtName" value="{{old('txtName')}}" type="text" class="txtName form-control" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.emailAddress')}}
                                                </label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input name="txtEmail" value="{{old('txtEmail')}}" type="email" class="txtEmail form-control" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.username')}}
                                                </label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input name="txtUsername" value="{{old('txtUsername')}}" type="text" class="txtUsername form-control" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.password')}}
                                                </label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input name="txtPassword" value="{{old('txtPassword')}}" type="text" class="form-control" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.phoneNumber')}}
                                                </label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input name="txtPhone" value="{{old('txtPhone')}}" type="text" class="txtPhone form-control" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('general.userGroup')}}
                                                </label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <select name="sltGroup" data-live-search="true" class="sltGroup select2_single form-control select" tabindex="-1">
                                                        <option value="">----{{__("general.selectUserGroup")}}----</option>
                                                        @foreach($group as $value=>$gr)
                                                        <option value="{{$gr->id}}">{{$gr->name}}</option>
                                                        @endforeach
                                                    </select>
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
                                                                              <input name="roles[{{$i}}]" type="checkbox" class="flat" value="{{$value->name}}"> {{$value->name}}
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

@stop