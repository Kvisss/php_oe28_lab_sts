@extends('admin.layouts.master')

@section('title', 'Add subject')

@section('content-header')
    {{ __('messages.edit_subject') }}
@stop
@section('content')
    <div class="container-fluid">

        <form action="{{route('subjects.update', $subject->id)}}" method="post" role="form">
            @csrf
            @method('put')
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
                                <label>{{ __('messages.title_subject') }}</label>
                                <input name="title" type="text" class="form-control" placeholder="{{ __('messages.title_subject') }}" value="{{ $subject->title }}">
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
    </div>
@endsection
