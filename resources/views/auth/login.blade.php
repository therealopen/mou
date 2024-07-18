
@extends('layouts.app_forms')
@section('content')
<div style="height:300px" class="row justify-content-center align-items-center w-100  min-vh-100" style="background-color: #EEEEEE">
    <div class="col-md-6  card mt-3  rounded-1 col-12 col-sm-4 col-md-6 col-lg-4 mb-2 card card-extra-small rounded-1   bg-white"> <!-- Added mt-5 (margin-top) to move the card down -->
        <div class="bg-white shadow-md p-4 rounded-lg dark:bg-gray-800 dark:border-gray-700">
{{-- <x-guest-layout> --}}
    <!-- Session Status -->

    <h1> <img class="mx-auto d-block" src="{{ asset('assets/img/logo.png') }}" alt="logo" style="max-height: 150px;"
        href="#" /><span style="color:#fdbf14"></span></h1>
        
        <center><p class="mx-auto d-block" style="font-size: 12px;"><strong><span style="color:#777">MOU MONITORING SYSTEM <br> (MoUMs)</span></strong></p>

</center>
<HR style="width:100%; color:#777; weight:300;height:10%"></HR>
        
  

        <!-- @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif -->

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-2">
                <div class="flex justify-between items-center mb-1">
                    <label for="email" class="w-1/4">Email</label>
                    <input id="email" type="email" placeholder="Enter Email"
                        class="w-3/4 rounded-lg bg-gray-200 p-2 form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                    
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            {{-- <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div> --}}

            {{-- <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>   --}}

            <div class="mb-2">
                <div class="flex justify-between items-center mb-1">
                    <label for="password" class="w-1/4">Password</label>
                    <input id="password" type="password" placeholder="Enter Password"
                        class="w-3/4 form-control-sm  rounded-lg bg-gray-200 p-2 form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
             


            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a hidden class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-0 btn btn-primary">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
  

