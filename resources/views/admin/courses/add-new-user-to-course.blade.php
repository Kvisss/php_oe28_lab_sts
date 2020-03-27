@extends('admin.layouts.master')

@section('title', 'Thêm học viên')

@section('content-header')
    {{ __('messages.list_trainee')}}
@stop
@section('content')
    <div class="container-fluid">
        <form action="{{ route('courseuser.store' )}}" method="post" role="form">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-danger">
                                <ul>
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.username') }}</label>
                                <input name="username" type="text" class="form-control" placeholder="{{ __('messages.username') }}" value="">
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label>{{ __('messages.name_course') }}</label>
                                    <br>
                                    <select name="course_id" class="custom-select form-control" id="inputGroupSelect02">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    <a href="{{ route('subjects.index') }}" class="btn btn-danger">{{ __('messages.cancel') }}</a>
                </div>
            </div>
        </form>

    {{--    <table id="example" class="table table-striped table-bordered">--}}
    {{--        <thead>--}}
    {{--        <tr>--}}
    {{--            <th>{{ __('messages.number') }}</th>--}}
    {{--            <th>{{ __('messages.username') }}</th>--}}
    {{--            <th>{{ __('messages.full_name') }}</th>--}}
    {{--            <th>{{ __('messages.created_at') }}</th>--}}
    {{--            <th>{{ __('messages.action') }}</th>--}}
    {{--        </tr>--}}
    {{--        </thead>--}}
    {{--        <tbody>--}}
    {{--        @foreach($users as $key => $value)--}}
    {{--            <tr>--}}
    {{--                <td>{{ $key +1 }}</td>--}}
    {{--                <td>--}}
    {{--                    {{ $value->username }}--}}
    {{--                </td>--}}
    {{--                <td>{{ $value->full_name }}</td>--}}
    {{--                <td>{{ $value->created_at }}</td>--}}
    {{--                <td>--}}
    {{--                    <form action="{{ route('courseuser.store') }}" method="post">--}}
    {{--                        @csrf--}}
    {{--                        <button class="btn btn-sm btn-info"><i class="fa fa-plus-square"></i></button>--}}
    {{--                        <br>--}}
    {{--                        <input class="invisible input-username" name="username" value="{{ $value->username }}">--}}
    {{--                    </form>--}}

    {{--                </td>--}}
    {{--            </tr>--}}
    {{--        @endforeach--}}
    {{--        </tbody>--}}
    {{--    </table>--}}
@endsection
