@extends('admin.layouts.master')

@section('title', 'Add new user')

@section('content-header')
    {{ __('messages.user_add') }}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-danger">
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{$e}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('messages.username') }}</label>
                                <input name="username" type="text" class="form-control" placeholder="{{ __('messages.username') }}" value="">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.email') }}</label>
                                <input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{ __('messages.email') }}" value="">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.full_name') }}</label>
                                <input name="full_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{ __('messages.full_name') }}" value="">
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                                    <a href="{{ route('courses.index') }}" class="btn btn-danger">{{ __('messages.cancel') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
