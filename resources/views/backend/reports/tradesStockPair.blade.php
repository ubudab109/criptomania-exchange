@extends('backend.layouts.main_layout')
@section('content')
<br>
    <h5 class="page-header">{{ __('Stock Pair Trades') }}</h5>
<div class="card">
    <div class="card-body">
        <div class="">
            <div class="row">
              <div class="col-lg-12">
                <div class="box box-primary box-borderless">
                  <div class="box-body">
                    <div class="cm-filter clearfix">
                        <div class="cm-order-filter">
                          <label for="filter-satuan"> Filter By Category :</label>
                           <select data-column="2" class="form-control filter-satuan" placeholder="Filter By Category" style="width:30%;">
                             <option value=""> All </option>
                             <option value="{{category_type(CATEGORY_EXCHANGE)}}"> Exchange </option>
                             <option value="{{category_type(CATEGORY_ICO)}}"> ICO </option>
                           </select>
                         </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="nav-tabs-custom">
                        <div class="tab-content">
                            <table class="table datatable dt-responsive display nowrap dc-table" style="width:100% !important;" id="trade-stockpair-history">
                                <thead>
                                <tr>
                                    <th class="all">{{ __('Market') }}</th>
                                    <th class="all">{{ __('Type') }}</th>
                                    <th class="min-desktop">{{ __('Category') }}</th>
                                    <th class="none">{{ __('Price') }}</th>
                                    <th class="none">{{ __('Amount') }}</th>
                                    <th class="none">{{ admin_settings('referral') ? __('Fee + Referral Earning') : __('Fee') }}</th>
                                    <th class="min-desktop">{{ __('Total') }}</th>
                                    <th class="all">{{ __('User') }}</th>
                                    <th class="min-desktop">{{ __('Date') }}</th>
                                </tr>
                                </thead>
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
    <!-- <script src="{{asset('common/vendors/datatable_responsive/table-datatables-responsive.js')}}"></script> -->

    <script>

      var table = $('#trade-stockpair-history').DataTable({

          processing: true,

          serverSide: true,

          // bInfo: false,

          language: {search: "", searchPlaceholder: "{{ __('Search...') }}"},
          ajax: "{{ route('reports.admin.stock-pairs.json',$stockPairId) }}",

          order : [8, 'desc'],

          columns: [
              {data: 'coin-pair', name: 'coin-pair', className:'text-center'},
              {data: 'exchange_type', name: 'exchange_type'},
              {data: 'category', name: 'category'},
              {data: 'price', name: 'price'},
              {data: 'amount', name: 'amount'},
              {data: 'referral', name: 'referral'},
              {data: 'total', name: 'total'},
              {data: 'email', name: 'email'},
              {data: 'created_at', name: 'created_at'},
          ],
      });

      $('.filter-satuan').change(function () {
         table.column( $(this).data('column'))
         .search( $(this).val() )
         .draw();
     });

    </script>
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
