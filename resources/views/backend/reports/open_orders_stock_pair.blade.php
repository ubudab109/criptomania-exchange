@extends('backend.layouts.main_layout')
@section('title', $title)
@section('content')
    {!! $list['filters'] !!}
    <div class="card">
        <div class="card-body">
            <div class="">
                <h3 class="page-header">{{ __('Open Orders') }}</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <table class="table datatable dt-responsive display nowrap dc-table" style="width:100% !important;">
                                    <thead>
                                    <tr>
                                        <th class="none">{{ __('Stop/Rate') }}</th>
                                        <th class="all">{{ __('Market') }}</th>
                                        <th class="min-desktop">{{ __('Type') }}</th>
                                        <th class="min-desktop">{{ __('Category') }}</th>
                                        <th class="all">{{ __('Price') }}</th>
                                        <th class="min-desktop">{{ __('Amount') }}</th>
                                        <th class="min-desktop">{{ __('Total') }}</th>
                                        <th class="min-desktop">{{ __('User') }}</th>
                                        <th class="min-desktop">{{ __('Date') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list['query'] as $transaction)
                                        <tr>
                                            <td>
                                                @if(!is_null($transaction->stop_limit))
                                                {{ $transaction->stop_limit }}
                                                <span class="strong">{{ $transaction->base_item_abbr }}</span>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $transaction->stock_item_abbr }}/{{ $transaction->base_item_abbr }}</td>
                                            <td>{{ exchange_type($transaction->exchange_type) }}</td>
                                            <td>{{ category_type($transaction->category) }}</td>
                                            <td>{{ $transaction->price }} <span class="strong">{{ $transaction->base_item_abbr }}</span></td>
                                            <td>{{ $transaction->amount }} <span class="strong">{{ $transaction->stock_item_abbr }}</span></td>
                                            <td>{{ bcmul($transaction->amount, $transaction->price) }} <span class="strong">{{ $transaction->base_item_abbr }}</span></td>
                                            <td>
                                                @if(has_permission('users.show'))
                                                    <a href="{{ route('users.show', $transaction->user_id) }}">{{ $transaction->email }}</a>
                                                @else
                                                    {{ $transaction->email }}
                                                @endif
                                            </td>
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