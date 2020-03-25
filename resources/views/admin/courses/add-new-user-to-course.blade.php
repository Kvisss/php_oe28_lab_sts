@extends('admin.layouts.master')

@section('title', 'Thêm học viên')

@section('content-header')
    {{ __('messages.list_trainee')}}
@stop
@section('content')
    <table id="example" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>{{ __('messages.number') }}</th>
            <th>{{ __('messages.username') }}</th>
            <th>{{ __('messages.full_name') }}</th>
            <th>{{ __('messages.created_at') }}</th>
            <th>{{ __('messages.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $value)
            <tr>
                <td>{{$key +1}}</td>
                <td>{{$value->username}}</td>
                <td>{{$value->full_name}}</td>
                <td>{{$value->created_at}}</td>
                <td>
                    <a href="{{route('courseuser.store', $value->id)}}" class="btn btn-sm btn-info "><i class="fa fa-plus-square"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
