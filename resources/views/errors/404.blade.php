@extends('backend.layouts.no_header_layout')
@section('title', !empty($exception) && $exception->getMessage() ? $exception->getMessage() : __('404 NOT FOUND!'))
@section('centralize-content')
            <h2 style="font-size:50px">{{ !empty($exception) && $exception->getMessage() ? $exception->getMessage() : __('404 NOT FOUND!') }}</h2>
            <p>{{ __('The page you are looking for is not found.') }}</p>
            <a href="{{route('home')}}" class="btn">{{ __('Home') }} <i class="icon ion-md-home"></i></a>
@endsection