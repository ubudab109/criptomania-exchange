@extends('backend.layouts.main_layout')
@section('title', $title)
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
                                        <th class="all text-center">{{ __('Api Core') }}</th>
                                        <th class="text-center">{{ __('Api Name') }}</th>
                                        <th class="text-center">{{ __('Created At') }}</th>
                                        <th class="text-center all no-sort">{{ __('Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list['query'] as $apiservices)
                                        <tr>
                                            <td class="text-center">{{ array_key_exists($apiservices->api_value, api_services()) ? api_services($apiservices->api_value) : '' }}</td>
                                            <td class="text-center">{{ $apiservices->api_name }}</td>
                                            <td class="text-center">{{ $apiservices->created_at->toFormattedDateString() }}</td>
                                            <td class="cm-action">
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-xs btn-outline dropdown-toggle"
                                                            data-toggle="dropdown">
                                                        <i class="fa fa-gear"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-stock-pair pull-right">
                                                        @if(has_permission('admin.api-service-name.destroy'))
                                                            <li>
                                                                <a data-form-id="delete-{{ $apiservices->id }}" data-form-method="DELETE"
                                                                   href="{{ route('admin.api-service-name.destroy', $apiservices->id) }}" class="confirmation"
                                                                   data-alert="{{__('Do you want to delete this Api Services?')}}"><i
                                                                            class="fa fa-trash-o"></i> {{ __('Delete') }}</a>
                                                            </li>
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
    {!! $list['pagination'] !!}
@endsection

@section('script')
    <!-- for datatable and date picker -->
    <script src="{{ asset('common/vendors/datepicker/datepicker.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
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
