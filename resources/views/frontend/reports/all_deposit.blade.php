@extends('backend.layouts.main_layout')
@section('title', $title)
@section('content')
    {!! $list['filters'] !!}
    <div class="card">
        <div class="card-body">
            <div class="">
                <h3 class="page-header">{{ __('List of Deposits') }}</h3>
                <div class="row">
                    <div class="col-lg-12">
                        @include('frontend.reports._payment_nav', ['routeName' => 'reports.trader.all-deposits'])
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <table class="table datatable dt-responsive display nowrap dc-table" style="width:100% !important;">
                                    <thead>
                                    <tr>
                                        <th class="min-desktop">{{ __('Ref ID') }}</th>
                                        <th class="all">{{ __('Stock Name') }}</th>
                                        <th class="all">{{ __('Amount') }}</th>
                                        @if(!$status)
                                        <th class="all">{{ __('Status') }}</th>
                                        @endif
                                        <th class="none">{{ __('Address') }}</th>
                                        <th class="none">{{ __('Txn Id') }}</th>
                                        <th class="min-desktop">{{ __('Date') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list['query'] as $transaction)
                                        <tr>
                                            <td>{{ $transaction->ref_id }}</td>
                                            <td>{{ $transaction->item_name }} ({{ $transaction->item }})</td>
                                            <td>{{ $transaction->amount }} <span class="strong">{{ $transaction->item }}</span></td>
                                            @if(!$status)
                                            <td>
                                                <span class="label label-{{ config('commonconfig.payment_status.' . $transaction->status . '.color_class') }}">{{ payment_status($transaction->status) }}
                                                </span>
                                            </td>
                                            @endif
                                            <td>{{ $transaction->address }}</td>
                                            <td>{{ $transaction->txn_id }}</td>
                                            <td>{{ $transaction->created_at->toFormattedDateString() }}</td>
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
    //Init jquery Date Picker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            orientation: 'bottom',
            todayHighlight: true,
        });
    </script>
@endsection
