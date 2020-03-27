@extends('admin.layouts.master')

@section('title', 'Thành viên khóa học')

@section('content-header')
    {{ __('messages.user_of_course') }}
@stop
@section('content')
    <div class="text-danger">
        <ul>
        @if($errors->any())
            {{__('messages.active_course_fail')}}
        @endif
        </ul>
    </div>
    <div class="container-fluid">
        <table id="example" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>{{ __('messages.number') }}</th>
                <th>{{ __('messages.full_name') }}</th>
                <th>{{ __('messages.email') }}</th>
                <th>{{ __('messages.phone') }}</th>
                <th>{{ __('messages.status') }}</th>
                <th>{{ __('messages.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $value)
                <tr>
                    <td>{{ $key +1 }}</td>
                    <td>{{ $value->full_name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>
                        @if($value->status == config('constant.status.active'))
                            <label class="badge badge-success">{{ __('messages.status_active') }}</label>

                        @else
                            <label class="badge badge-danger">{{ __('messages.status_inactive') }}</label>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('courseuser.edit', $value->course_user_id) }}" method="post">
                            @csrf
                            @method('get')

                                @if($value->status == config('constant.status.active'))
                                <button class="btn btn-sm btn-warning">{{ __('messages.action_deactive') }}</button>

                                @else
                                <button class="btn btn-sm btn-success">{{ __('messages.action_active') }}</button>
                                @endif

                        </form>
                        <form class="" action="{{ route('courseuser.destroy', $value->course_user_id) }}" method="post">
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
    </div>
@endsection
