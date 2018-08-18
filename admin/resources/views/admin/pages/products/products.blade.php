@section('title')
{{__('general.products')}}
@stop
@extends('admin.general.master')
@section('content')
<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
            <h2> {{__('general.products')}}</h2>
            <a href="{{route('getAddProductAdmin')}}" class="btn btn-primary pull-right"> {{__('general.addNew')}}</a>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> {{__("general.productName")}}</th>
                        <th> {{__("general.productCode")}}</th>
                        <th> {{__("general.productQty")}}</th>
                        <th> {{__("general.productCategory")}}</th>
                        <th> {{__("general.avatar")}}</th>
                        <th> {{__("general.action")}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $value)
                    <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->code}}</td>
                        <td>{{$value->qty}}</td>
                        <td>{{$value->category_id}}</td>
                        <td><img width="45" src="{{url('')}}/{{$value->avatar}}" alt=""></td>
                        <td class="center">
                            <a href="{{route('getEditProductAdmin', ['id'=>$value->id])}}" class="btn btn-success btn-xs"><span class="fa fa-eye"></span></a>
                            <a href="{{route('deleteUser',['id'=>$value->id])}}" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop