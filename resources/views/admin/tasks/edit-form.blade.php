@extends('admin.layouts.master')

@section('title', 'Add course')

@section('content-header')
    {{ __('messages.task_edit') }}
@stop
@section('content')
    <div class="container-fluid">
        <div class="text-danger">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{$e}}</li>
                @endforeach
            </ul>
        </div>
        <form action="{{route('tasks.update', $task->id)}}" method="post" role="form">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ __('messages.task_name') }}</label>
                                <input name="title" type="text" class="form-control" placeholder="{{ __('messages.task_name') }}" value="{{ $task->title }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.task_content') }}</label>
                                <textarea name="contents" class="form-control" placeholder="{{ __('messages.task_content') }}" rows="10">{{ $task->content }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-danger">{{ __('messages.cancel') }}</a>
                </div>
            </div>
        </form>
    </div>
@endsection

