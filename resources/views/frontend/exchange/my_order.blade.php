<style>
    .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody {
        overflow-y: scroll !important;
    }
</style>
<div class="col-md-12">
    <div class="market-order active-order-list">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#order-history" role="tab" aria-selected="false">My
                    Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#my_trade" role="tab"
                    aria-selected="false">{{ __('My Trades') }}</a>
            </li>
        </ul>
        @auth
        <div class="tab-content">
            <div class="tab-pane fade show active" id="order-history" role="tabpanel">
                <table id="my_open_order_table" class="table datatable dt-responsive display nowrap dc-table"
                    style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>{{ __('TYPE') }}</th>
                            <th>{{ __('PRICE') }}</th>
                            <th>{{ __('AMOUNT') }}</th>
                            <th class="min-desktop">{{ __('TOTAL') }}</th>
                            <th class="min-desktop">{{ __('DATE') }}</th>
                            <th class="min-desktop">{{ __('STOP') }}</th>
                            <th>{{ __('ACTION') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="my_trade" role="tabpanel">
                <table id="my_trade_table" class="table datatable dt-responsive display nowrap dc-table"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th class="all" style="width:100px;">{{ __('PRICE') }}</th>
                            <th class="all">{{ __('AMOUNT') }}</th>
                            <th class="min-desktop">{{ __('DATE') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        @endauth
        @guest
        <div class="text-center" style="margin-top: 12%">
            <a href="{{ route('login') }}">{{__('Login')}}</a> {{ __('or') }}
            <a href="{{ route('register.index') }}">{{ __('Register Now') }}</a>{{ __(' to trade') }}
        </div>
        @endguest
    </div>
</div>