@extends('admin.layouts.master')

@section('title', 'list')

@section('content-header')
    {{ __('messages.list_course')  }}
@stop
@section('content')
    <table id="example" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>{{ __('messages.number') }}</th>
            <th>{{ __('messages.course') }}</th>
            <th>{{ __('messages.time') }}</th>
            <th>{{ __('messages.created_at') }}</th>
            <th>{{ __('messages.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $key => $value)
            <tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->time }}</td>
                <td>{{ $value->created_at }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('courses.edit', $value->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('courses.destroy', $value->id) }}" method="post">
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
