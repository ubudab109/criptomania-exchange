@extends('backend.layouts.no_header_layout')
@section('title', company_name('Suspended Account'))
@section('centralize-content')
            <h2 style="font-size:50px">{{ __('Account Suspended') }}</h2>
            <p>{{ __('Please contact admin to get back your account.') }}</p>
            @if(!Auth::user())
                <a href="{{route('home')}}" class="btn">{{ __('Home') }}<i class="icon ion-md-home"></i></a>
            @else
                <a href="{{route('profile.index')}}" class="btn ">{{ __('Profile') }}<i class="icon ion-md-home"></i></a>
            @endif
@endsection
