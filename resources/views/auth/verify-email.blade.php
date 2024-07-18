{{-- <x-guest-layout> --}}
    {{-- <x-authentication-card> --}}
        {{-- <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>  --}}

        {{-- <div class="mb-4 text-sm text-gray-600">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        
@extends('layouts.app_forms')
@section('content')
<div class="row justify-content-center align-items-center w-100  min-vh-100" style="background-color: #EEEEEE">
    <div class="col-md-6  card mt-3  rounded-1 col-12 col-sm-4 col-md-6 col-lg-4 mb-2 card card-extra-small rounded-1   bg-white"> <!-- Added mt-5 (margin-top) to move the card down -->
        <div class="bg-white shadow-md p-4 rounded-lg dark:bg-gray-800 dark:border-gray-700">
{{-- <x-guest-layout> --}}
    <!-- Session Status -->
    @extends('layouts.app_forms')

@section('content')

    <h1> <img class="mx-auto d-block" src="{{ asset('assets/img/logo.png') }}" alt="logo" style="max-height: 150px;"
        href="#" /><span style="color:#fdbf14"></span></h1>
        <p class="mx-auto d-block" style="font-size: 10px;"><strong><span>UDOM CONTRACT AGREEMENT MONITORING SYSTEM (UCAMS)</span></strong></p>
<p> {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600" style="color:#144afd">
                <b>{{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}<b>
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit"  class="btn btn-primary">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div>
                {{-- <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    {{ __('Edit Profile') }}</a> --}}

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    {{-- </x-authentication-card> --}}
{{-- </x-guest-layout> --}}
