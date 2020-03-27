@extends('admin.layouts.master')

@section('title', 'List Subject')

@section('content-header')
    {{ __('messages.list_course')}}
@stop
@section('content')
    <a href="{{ route('users.create') }}">{{ __('messages.user_add') }}</a>
    <table id="example" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>{{ __('messages.number') }}</th>
            <th>{{ __('messages.username') }}</th>
            <th>{{ __('messages.email') }}</th>
            <th>{{ __('messages.created_at') }}</th>
            <th>{{ __('messages.action') }}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $value)
            <tr>
                <td>{{$key +1}}</td>
                <td>{{$value->username}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->created_at}}</td>
                <td>
                    <form class="" action="{{ route('users.destroy', $value->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
