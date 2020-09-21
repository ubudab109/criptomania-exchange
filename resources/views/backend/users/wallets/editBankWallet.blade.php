@extends('backend.layouts.main_layout')
@section('title', $title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary box-borderless">
                        <div class="box-header text-center with-border">
                            <h5 class="box-title font-weight-bold">
                                {{ __('Give :stockItem Amount With Ref ID ID :depositId', ['stockItem' => $wallet->stockItem->item, 'depositId' => $depositBank->ref_id]) }}
                            </h5>
                            <hr>
                            <!-- <h3>TEST</h3> -->
                            <a href="{{ route('reports.admin.all-deposits-bank') }}"
                                class="btn btn-primary btn-sm back-button pull-right">{{ __('Back') }}</a>
                                <br>
                        </div>
                        <div class="box-body">
                            {!! Form::open(['route' => ['admin.users.wallets.updateDepoBank', 'id' => $wallet->user_id,
                            'walletId' => $wallet->id, 'depositId' => $depositBank->id], 'method' => 'post',
                            'class'=>'form-horizontal validator']) !!}
                            {{ Form::hidden('base_key', base_key()) }}

                            <input type="hidden" class="form-control"  value="{{ $depositBank->id }}"
                                name="deposit_bank_id">

                            {{--primary_balance--}}
                            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                                <label for="amount" class="col-md-4 control-label required">{{ __('Amount') }}</label>
                                <div class="col-md-8">
                                    @php
                                    $total = $wallet->stockItem->deposit_fee / 100.00;
                                    $temp = $depositBank->amount * $total;
                                    $subtotal = $depositBank->amount - $temp;

                                    @endphp
                                    <input type="text" class="form-control" value="{{$subtotal}}" readonly
                                        name="{{fake_field('amount')}}">
                                    <span class="strong">This deposit has been deducted from the amount of the fee
                                        {{$wallet->stockItem->withdrawal_fee}}%</span>
                                </div>
                            </div>

                            @if($depositBank->status == PAYMENT_COMPLETED || $depositBank->status == PAYMENT_FAILED)

                            <span class="strong">This Transaction has been completed</span>

                            @else

                            {{--submit button--}}
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-8">
                                    {{ Form::submit(__('Give Amount'),['class'=>'btn btn-sm btn-success btn-flat btn-sm-block ']) }}
                                    @if($depositBank->status == PAYMENT_PENDING)

                                    @if(has_permission('admin.users.wallets.declineDepositBank'))

                                    <a href="{{ route('admin.users.wallets.declineDepositBank', [$wallet->user_id, $wallet->id, $depositBank->id]) }}"
                                        class="btn btn-sm btn-danger btn-flat btn-sm-block confirmation"
                                        data-form-id="decline-{{ $depositBank->id }}" data-form-method="PUT"
                                        data-alert="{{__('Do you want to decline this deposit?')}}">{{ __('Decline') }}</a>

                                    @endif

                                    @else


                                    @endif
                                </div>
                            </div>
                            @endif
                            {!! Form::close() !!}





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('common/vendors/cvalidator/cvalidator.js') }}"></script>
<script>
    $(document).ready(function () {
            $('.validator').cValidate({});
        });
</script>
<script>
    function broadcast()
    {
         let userId = "{{$wallet->user_id}}";
         let amount = "{{$subtotal}}";
         let data = 'Your IDR was increased with'+amount;
         let stockItemName = "{{$wallet->stockItem->item}}";
         let channelPrefix = '{{ channel_prefix() }}';
         Echo.channel(channelPrefix + 'notification.' + data + '.' + userId).listen('Exchange.BroadcastNotification');
    }
</script>
@endsection