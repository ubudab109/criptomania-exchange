@extends('backend.layouts.no_header_layout')
@section('title', company_name('Financial Suspention'))
@section('centralize-content')
            <h2 style="font-size:50px">{{ __('Financially Suspended') }}</h2>
            <p>{{ __('Please contact admin to get back your financial access.') }}</p>
            @if(!Auth::user())
                <a href="{{route('home')}}" class="btn btn-primary btn-flat btn-block">{{ __('Home') }}<i class="icon ion-md-home"></i></a>
            @else
                <a href="{{route('profile.index')}}" class="btn btn-primary btn-flat btn-block">{{ __('Profile') }}<i class="icon ion-md-home"></i></a>
            @endif
@endsection
