@extends('admin.layouts.master')

@section('title', 'list')

@section('content-header')
    {{ __('messages.task')}}
@stop
@section('content')
    <a href="{{route('tasks.create')}}">
        {{__('messages.task_create')}}
    </a>
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
        @foreach($tasks as $key => $value)
            <tr>
                <td>{{ $key +1}}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->content }}</td>
                <td>{{ $value->created_at}}</td>
                <td>
                    <a href="{{ route('courses.show', $value->id) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('tasks.edit', $value->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <form class="" action="{{ route('courses.destroy', $value->id) }}" method="post">
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
