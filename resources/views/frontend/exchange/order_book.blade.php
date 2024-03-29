<div class="col-md-3">
    <div class="market-history" style="overflow:auto">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#market_trade" role="tab"
                    aria-selected="true">{{ __('MARKET TRADES') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#my_trade" role="tab"
                    aria-selected="false">{{ __('MY TRADES') }}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="market_trade" role="tabpanel">
                <table id="trade_history_table" class="table datatable dt-responsive display nowrap dc-table"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th class="all" style="width:200px;">{{ __('PRICE') }}</th>
                            <th class="text-center">{{ __('AMOUNT') }}</th>
                            <th class="none">{{ __('DATE') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            @auth
            <div class="tab-pane fade" id="my_trade" role="tabpanel">
                <table id="my_trade_table" class="table datatable dt-responsive display nowrap dc-table"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th class="all" style="width:200px;">{{ __('PRICE') }}</th>
                            <th class="text-center">{{ __('AMOUNT') }}</th>
                            <th class="none">{{ __('DATE') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            @endauth
            @guest
            <div class="tab-pane fade show" id="my_trade" role="tabpanel">
                <div class="text-center" style="margin-top: 50%; height: 240px">
                    <a href="{{ route('login') }}">{{__('Login')}}</a> {{ __('or') }}
                    <a href="{{ route('register.index') }}">{{ __('Register Now') }}</a>{{ __(' to trade') }}
                </div>
            </div>
            @endguest
        </div>
    </div>
    <div class="active-order">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#buy_orders" role="tab"
                    aria-selected="true">{{ __('BUY ORDERS') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#sell_orders" role="tab"
                    aria-selected="false">{{ __('SELL ORDERS') }}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="buy_orders" role="tabpanel">
                <table id="buy_order_table" class="table datatable dt-responsive display nowrap dc-table"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th class="all" style="width:100px;">{{ __('PRICE') }}(<span class="base_item"></span>)</th>
                            <th class="text-center">{{ __('AMOUNT') }}(<span class="stock_item"></span>)</th>
                            <th class="text-center">{{ __('TOTAL') }}(<span class="base_item"></span>)</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade show" id="sell_orders" role="tabpanel">
                <table id="sell_order_table" class="table datatable dt-responsive display nowrap dc-table"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th class="all" style="width:100px;">{{ __('PRICE') }}(<span class="base_item"></span>)</th>
                            <th class="text-center" style="width:100px;">{{ __('AMOUNT') }}(<span class="stock_item"></span>)</th>
                            <th class="text-center">{{ __('TOTAL') }}(<span class="base_item"></span>)</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>