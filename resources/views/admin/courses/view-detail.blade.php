@extends('admin.layouts.master')

@section('title', 'Edit course')

@section('content-header')
    {{ __('messages.edit_course') }}
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
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ __('messages.name_course') }}</label>
                                <input name="name" readonly type="text" class="form-control" placeholder="{{ __('messages.name_course') }}" value="{{$courses->name}}">
                            </div>

                            <div class="form-group">
                                <label>{{ __('messages.time') }}</label>
                                <input name="time" readonly type="text" class="form-control" id="exampleInputEmail1" placeholder="{{ __('messages.time') }}" value="{{$courses->time}}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.description') }}</label>
                                <textarea name="description" readonly class="form-control" placeholder="{{ __('messages.description') }}" rows="10">{{$courses->description}}</textarea>

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
