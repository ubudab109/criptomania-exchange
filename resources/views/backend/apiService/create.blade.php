@extends('backend.layouts.main_layout')
@section('title', $title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title text-center">{{ __('Create Api Service') }}</h3>
                    <hr>
                    <div class="box-tools pull-right">
                        <a href="{{ route('admin.api-service-name.index') }}" class="btn btn-primary back-button">{{ __('Back to list') }}</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-8">
                            {!! Form::open(['route'=>'admin.api-service-name.store', 'method' => 'post', 'class'=>'form-horizontal validator']) !!}
                                @include('backend.apiService._create')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('before-style')
    <link rel="stylesheet" href="{{ asset('common/vendors/bootstrap-fileinput/css/jasny-bootstrap.css') }}">
@endsection

@section('after-style')
    <style>
        .thumbnail {
            width: 100px; height: 100px; line-height:100px;
        }

        .thumbnail i{
            font-size: 50px;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('common/vendors/cvalidator/cvalidator.js') }}"></script>
    <script src="{{ asset('common/vendors/bootstrap-fileinput/js/jasny-bootstrap.js') }}"></script>
    <script>
    $(document).ready(function () {
            $('.validator').cValidate({});
        });
</script>
@endsection