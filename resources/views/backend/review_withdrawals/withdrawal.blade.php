@extends('backend.layouts.main_layout')
@section('content')
    {!! $list['filters'] !!}

    <div class="card">
        <div class="card-body">
            <div class="">
                <h3 class="page-header">{{ $title }}</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="nav-tabs-custom">
                                        <div class="tab-content">
                                            <table class="table datatable dt-responsive display nowrap dc-table" style="width:100% !important;">
                                                <thead>
                                                <tr>
                                                    <th class="none">{{ __('Status') }}</th>
                                                    <th class="min-desktop">{{ __('Ref ID') }}</th>
                                                    <th class="all">{{ __('Stock Item Name') }}</th>
                                                    <th class="all">{{ __('Amount') }}</th>
                                                    <th class="min-desktop">{{ __('Address') }}</th>
                                                    <th class="none">{{ __('Withdrawn by') }}</th>
                                                    <th class="none">{{ __('Txn Id') }}</th>
                                                    <th class="min-desktop">{{ __('Date') }}</th>
                                                    <th class="text-center all no-sort">{{ __('Action') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($list['query'] as $reviewWithdrawal)
                                                    <tr>
                                                        <td>
                                                            <span class="label label-{{ config('commonconfig.payment_status.' . $reviewWithdrawal->status . '.color_class') }}">{{ payment_status($reviewWithdrawal->status) }}
                                                            </span>
                                                        </td>
                                                        <td>{{ $reviewWithdrawal->ref_id }}</td>
                                                        <td>{{ $reviewWithdrawal->item_name }} ({{ $reviewWithdrawal->item }})</td>
                                                        <td>{{ $reviewWithdrawal->amount }} {{ $reviewWithdrawal->item }}</td>
                                                        <td>{{ $reviewWithdrawal->address }}</td>
                                                        <td>
                                                            @if(has_permission('users.show'))
                                                                <a href="{{ route('users.show', $reviewWithdrawal->user_id) }}">{{ $reviewWithdrawal->email }}</a>
                                                            @else
                                                                {{ $reviewWithdrawal->email }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $reviewWithdrawal->txn_id }}</td>
                                                        <td>{{ $reviewWithdrawal->created_at->toFormattedDateString() }}</td>
                                                        <td class="cm-action">
                                                            <div class="btn-group pull-right">
                                                                <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">
                                                                    <i class="fa fa-gear"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-stock-pair pull-right">
                                                                    @if( has_permission('admin.review-withdrawals.show') )
                                                                        <li><a href="{{ route('admin.review-withdrawals.show', $reviewWithdrawal->id)}}"><i class="fa fa-eye"></i> {{ __('Show') }}</a></li>
                                                                    @endif
                                                                </ul>
                                                            </div>
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
            </div>
        </div>
    </div>

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

