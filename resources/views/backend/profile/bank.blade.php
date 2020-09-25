@extends('backend.layouts.main_layout')
@section('title', $title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="">
            <div class="col-md-12 col-md-offset-2">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title text-center">{{ __('Create New Bank') }}</h3>
                            <hr>
                            <div class="box-tools pull-right">
                                <a href="{{ route('trader.trader-bank.index') }}"
                                    class="btn btn-primary back-button">{{ __('Your List Bank') }}</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    {!! Form::open(['route'=>'profile.store.bank', 'method' => 'post',
                                    'class'=>'form-horizontal validator']) !!}
                                        <input type="hidden" name="base_key" value="{{ base_key() }}">
                                        <input type="hidden" value="{{Auth::user()->id}}" name="users_id"> 
                                        {{--Bank Name--}}
                                        <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                                            <label for="{{ fake_field('bank_name') }}" class="col-md-4 control-label required">{{ __('Bank Name') }}</label>
                                            <div class="col-md-8">
                                                {{ Form::text(fake_field('bank_name'),  old('bank_name', null), ['class'=>'form-control', 'id' => fake_field('bank_name'),'data-cval-name' => 'The Bank name field','data-cval-rules' => 'required|escapeInput|max:255', 'placeholder' => __('ex: BCA')]) }}
                                                <span class="validation-message cval-error" data-cval-error="{{ fake_field('bank_name') }}">{{ $errors->first('bank_name') }}</span>
                                            </div>
                                        </div>

                                        {{--Account Number--}}
                                        <div class="form-group {{ $errors->has('account_number') ? 'has-error' : '' }}">
                                            <label for="{{ fake_field('account_number') }}" class="col-md-4 control-label required">{{ __('Account Number') }}</label>
                                            <div class="col-md-8">
                                                {{ Form::text(fake_field('account_number'),  old('account_number', null), ['class'=>'form-control', 'id' => fake_field('account_number'),'data-cval-name' => 'The Account Number field','data-cval-rules' => 'required|escapeInput|max:255', 'placeholder' => __('ex: Your Account Number')]) }}
                                                <span class="validation-message cval-error" data-cval-error="{{ fake_field('account_number') }}">{{ $errors->first('account_number') }}</span>
                                            </div>
                                        </div>

                                        {{--submit button--}}
                                        <div class="form-group">
                                            <div class="col-md-offset-4 col-md-8">
                                                {{ Form::submit(__('Create'),['class'=>'btn btn-success form-submission-button']) }}
                                                {{ Form::reset(__('Reset'),['class'=>'btn btn-danger']) }}
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
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
        width: 100px;
        height: 100px;
        line-height: 100px;
    }

    .thumbnail i {
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