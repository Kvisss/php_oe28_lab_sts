@extends('admin.layouts.master')

@section('title', 'List Subject')

@section('content-header')
    {{ __('messages.list_course')}}
@stop
@section('content')
    <a href="{{ route('subjects.create') }}">{{ __('messages.create_subject') }}</a>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 justify-content-center">
                <form action="{{ route('showlist') }}" method="post">
                    @csrf
                    <div class="input-group col-md-12">
                        <select name="course_id" class="custom-select" id="inputGroupSelect02">
                            @foreach( $courses as $course )
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">{{ __('messages.chose') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
