@extends('backend.layouts.main_layout')
@section('title', $title)
@php
$bankName = \App\Models\User\DepositBankTransfer::all();
@endphp
@section('content')
    {!! $list['filters'] !!}
     <div class="card">
        <div class="card-body">
            <div class="">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box box-primary box-borderless">
                            <div class="box-body">
                                <table class="table datatable dt-responsive display nowrap dc-table" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th class="all text-center">{{ __('Wallet') }}</th>
                                            <th class="text-center">{{ __('Wallet Name') }}</th>
                                            <th class="text-center">{{ __('Total Balance') }}</th>
                                            <th class="text-center">{{ __('On Order') }}</th>
                                            <th class="text-center all no-sort">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($list['query'] as $wallet)
                                            <tr>
                                                <td class="text-center">{{ $wallet->item }}</td>
                                                <td class="text-center">{{ $wallet->item_name }}</td>
                                                <td class="text-center">{{ $wallet->primary_balance }}</td>
                                                <td class="text-center">{{ $wallet->on_order_balance }}</td>
                                                <td class="cm-action">
                                                    @if( in_array($wallet->item_type, config('commonconfig.currency_transferable')) )
                                                        <div class="btn-group pull-right">
                                                            <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                <i class="fa fa-gear"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-stock-pair pull-right">
                                                                @if( has_permission('reports.admin.wallets.deposits'))
                                                                    <li>
                                                                        <a href="{{ route('reports.admin.wallets.deposits', ['id' => $wallet->id]) }}"><i class="fa fa-magic"></i> {{ __('Deposit History') }}</a>
                                                                    </li>
                                                                @endif

                                                                @if( has_permission('reports.admin.wallets.withdrawals'))
                                                                    <li>
                                                                        <a href="{{ route('reports.admin.wallets.withdrawals', ['id' => $wallet->id]) }}"><i class="fa fa-magic"></i> {{ __('Withdrawal History') }}</a>
                                                                    </li>
                                                                @endif

                                                                @if($wallet->api_service == BANK_TRANSFER)

                                                                @if(has_permission('admin.users.wallets.editBankBalance'))
                                                                    <li>
                                                                        <a href="{{ route('admin.users.wallets.editBankBalance', [$wallet->users_id, $wallet->wallet_id,$wallet->id]) }}"><i
                                                                                    class="fa fa-eye"></i> {{ __('Give Amount') }}</a>
                                                                    </li>
                                                                @endif

                                                                @if( has_permission('reports.admin.wallets.depositsBank'))
                                                                    <li>
                                                                        <a href="{{ route('reports.admin.wallets.depositsBank', $wallet->id) }}"><i class="fa fa-magic"></i> {{ __('Deposit Bank Transfer History') }}</a>
                                                                    </li>
                                                                @endif

                                                                @else

                                                                @if( has_permission('admin.users.wallets.edit'))
                                                                    <li>
                                                                        <a href="{{ route('admin.users.wallets.edit', ['id' => $wallet->user_id, 'walletId' => $wallet->id]) }}"><i class="fa fa-magic"></i> {{ __('Give Amount') }}</a>
                                                                    </li>
                                                                @endif

                                                                @endif

                                                                
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $list['pagination'] !!}
@endsection

@section('script')
    <!-- for datatable and date picker -->
    <script src="{{ asset('common/vendors/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('common/vendors/datatable_responsive/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('common/vendors/datatable_responsive/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('common/vendors/datatable_responsive/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('common/vendors/datatable_responsive/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{asset('common/vendors/datatable_responsive/table-datatables-responsive.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
            //Init jquery Date Picker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                orientation: 'bottom',
                todayHighlight: true
            });
        });
    </script>
@endsection

