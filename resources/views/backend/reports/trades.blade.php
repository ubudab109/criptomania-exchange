@extends('backend.layouts.main_layout')
@section('title', $title)
@section('content')
    {!! $list['filters'] !!}
    <div class="card">
        <div class="card-body">
            <div class="">
                <h3 class="page-header">{{ __('My Trades') }}</h3>
                <div class="row">
                    <div class="col-lg-12">
                        @include('backend.reports._category_nav', ['routeName' => 'reports.admin.allTrades'])
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <table class="table datatable dt-responsive display nowrap dc-table" style="width:100% !important;">
                                    <thead>
                                    <tr>
                                        <th class="none">{{ __('Date') }}</th>
                                        <th class="all">{{ __('Market') }}</th>
                                        <th class="all">{{ __('Type') }}</th>
                                        @if(!$categoryType )
                                        <th class="min-desktop">{{ __('Category') }}</th>
                                        @endif
                                        <th class="all">{{ __('Price') }}</th>
                                        <th class="min-desktop">{{ __('Amount') }}</th>
                                        <th class="min-desktop">{{ admin_settings('referral') ? __('Fee + Referral Earning') : __('Fee') }}</th>
                                        <th class="min-desktop">{{ __('Total') }}</th>
                                        <th class="all">{{ __('User') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list['query'] as $transaction)
                                        <tr>
                                            <td>{{ $transaction->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $transaction->stock_item_abbr }}/{{ $transaction->base_item_abbr }}</td>
                                            <td>{{ exchange_type($transaction->exchange_type) }}</td>
                                            @if(!$categoryType )
                                            <td>{{ category_type($transaction->category) }}</td>
                                            @endif
                                            <td>{{ $transaction->price }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>
                                                {{ bcadd($transaction->fee,$transaction->referral_earning) }}
                                                ({{ $transaction->is_maker == 1 ?
                                                        number_format($transaction->maker_fee, 2) . '%' :
                                                        number_format($transaction->taker_fee, 2) . '%' }})
                                            </td>
                                            <td>{{ $transaction->total }}</td>
                                            <td>
                                                @if(has_permission('users.show'))
                                                    <a href="{{ route('users.show', $transaction->user_id) }}">{{ $transaction->email }}</a>
                                                @else
                                                    {{ $transaction->email }}
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
        //Init jquery Date Picker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            orientation: 'bottom',
            todayHighlight: true,
        });
    </script>
@endsection

