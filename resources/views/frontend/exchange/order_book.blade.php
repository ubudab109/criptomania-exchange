<style>
    td.green {
        color: green;
    }
</style>
<div class="col-md-3">
    <div class="order-book">
        <h2 class="heading">Order Book</h2>
        <table id="sell_order_table" class="table table-hover small exchange-table stock-market">
            <thead>
                <tr>
                    <th style="color: #758696">{{ __('PRICE') }}</th>
                    <th><span class="stock_item"></span></th>
                    <th class="hide_in_mobile_small">{{ __('SUM') }}(<span class="base_item"></span>)</th>
                </tr>
            </thead>
        </table>
        <table>
            <tbody class="ob-heading">
                <tr>
                    <td>
                        <span class="description-text">{{ __('Last Price') }}</span>
                        <span id="last_price" class="description-header"></span>
                    </td>
                    <td>
                        <span class="stock_item"></span>
                        <span id="_24_hour_item_volume" class="strong"></span>
                    </td>
                    <td class="red">
                        <span class="description-text">{{ __('24hr Change') }}</span>
                        <span id="_24_hour_percentage" class="description-header description-percentage"><i
                                class="fa fa-caret-up"></i>0%</span>
                    </td>
                </tr>
            </tbody>
        </table>
        <table id="buy_order_table" class="table datatable dt-responsive display nowrap dc-table">
            <thead>
                <tr>
                    <th class="all" style="color: #758696">{{ __('PRICE') }}</th>
                    <th class="all"><span class="stock_item"></span></th>
                    <th class="all">{{ __('SUM') }}(<span class="base_item"></span>)</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="market-history">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#market_trade" role="tab"
                    aria-selected="true">Recent
                    Trades</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="market_trade" role="tabpanel">
                <table id="trade_history_table" class="table datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th class="all text-center" style="width:100px;">{{ __('PRICE') }}</th>
                            <th class="text-center">{{ __('AMOUNT') }}</th>
                            <th class="min-desktop">{{ __('DATE') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>