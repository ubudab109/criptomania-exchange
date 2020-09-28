@extends('backend.layouts.no_header_layout')
@section('title', company_name('Unverified Account'))
@section('centralize-content')
            <h2 style="font-size:50px">{{ __('Email Unverified') }}</h2>
            <p>{{ __('Please verify your email address to explore permitted access paths in full.') }}</p>
            @if(!Auth::user())
                <a href="{{route('home')}}" class="btn">{{ __('Home') }}<i class="icon ion-md-home"></i></a>
            @else
                <a href="{{route('profile.index')}}" class="btn">{{ __('Profile') }}<i class="icon ion-md-home"></i></a>
            @endif
            <a href="{{route('verification.form')}}" class="btn">{{ __('Resend Verification Email') }}</a>
@endsection
