@extends('admin.layouts.master')

@section('title', 'Edit course')

@section('content-header')
    {{ __('messages.edit_course') }}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('messages.name_course') }}</label>
                            <p>{{ $courses->name }}</p>
                        </div>

                        <div class="form-group">
                            <label>{{ __('messages.time') }}</label>
                            <p>{{ $courses->time }}</p>
                        </div>
                        <div class="form-group">
                            <label>{{ __('messages.description') }}</label>
                            <p>{{ $courses->description }}</p>
                        </div>
                        <div class="form-group">
                            <label>{{__('messages.course_image')}}</label>
                            <br>
                            <img src="{{ asset('images/def_img.png') }}" id="img-course">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
