@extends('backend.layouts.main_layout')
@section('title', $title)
@section('content')
    {!! $list['filters'] !!}

    <div class="card">
        <div class="card-body">
            <div class="">
                <h3 class="page-header">{{ __('Referral Earning from :user',['user'=> $referralUserInfo->first_name.' '.$referralUserInfo->last_name]) }}</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <table class="table datatable dt-responsive display nowrap dc-table" style="width:100% !important;">
                                    <thead>
                                    <tr>
                                        <th class="all">{{ __('Symbol') }}</th>
                                        <th class="all text-center">{{ __('Stock Item') }}</th>
                                        <th class="all text-right">{{ __('Total Earning') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list['query'] as $coin)
                                        <tr>
                                            <td>
                                                @if(get_item_emoji($coin->item_emoji))
                                                    <img class="img-sm" src="{{ get_item_emoji($coin->item_emoji) }}" alt="">
                                                @else
                                                    <i class="fa fa-money fa-lg"></i>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $coin->item_name }} ({{ $coin->item }})</td>
                                            <td class="text-right">{{ $coin->amount }} {{ $coin->item }}</td>
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