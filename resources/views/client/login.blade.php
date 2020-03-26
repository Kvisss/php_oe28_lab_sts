@extends('client.layouts.app')

@section('title', 'login')

@section('content')
    <section class="banner login-registration">
        <div class="vector-img">
            <img src="{{ asset('images/baner.jpg') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('login')}}" method="post" class="sl-form">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('messages.username') }}</label>
                            <input name="username" type="text" placeholder="{{ __('messages.username') }}">
                            <label class="text-danger">
                                @error('username')
                                    {{$message}}
                                @enderror
                            </label>
                        </div>
                        <div class="form-group">
                            <label>{{ __('messages.password') }}</label>
                            <input name="password" type="password" placeholder="{{ __('messages.password') }}">
                            <label class="text-danger">
                                @error('password')
                                    {{$message}}
                                @enderror
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label">{{ __('messages.remeber') }}</label>
                        </div>
                        <div>
                            <label class="text-danger">
                                @if($errors->any())
                                    {{__('messages.failed')}}
                                @endif
                            </label>
                        </div>

                        <button class="btn btn-filled btn-round btn-login">{{ __('messages.login') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
