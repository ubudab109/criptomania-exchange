<div class="col-md-3">
    <div class="market-pairs">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm"><i class="icon ion-md-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Search" aria-describedby="inputGroup-sizing-sm">
        </div>
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#STAR" role="tab" aria-selected="true"><i
                        class="icon ion-md-star"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="pill" href="#BTC" role="tab" aria-selected="true">BTC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#ETH" role="tab" aria-selected="false">ETH</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#NEO" role="tab" aria-selected="false">NEO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#USDT" role="tab" aria-selected="false">USDT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#DAI" role="tab" aria-selected="false">DAI</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="STAR" role="tabpanel">
                <table id="stock_market_table" class="table table-hover small exchange-table stock-market">
                    <thead>
                        <tr>
                            <th>{{ __('STOCK') }}</th>
                            <th>{{ __('PRICE') }}</th>
                            <th>{{ __('VOLUME') }}</th>
                            <th>{{ __('CHANGE') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-md-3">
    <div class="container">
        <div class="container-market">
            <div class="box-body" id="stock-market-section">
                <table id="stock_market_table" class="table table-hover small exchange-table stock-market">
                    <thead>
                        <tr>
                            <th>{{ __('STOCK') }}</th>
<th>{{ __('PRICE') }}</th>
<th>{{ __('VOLUME') }}</th>
<th>{{ __('CHANGE') }}</th>
</tr>
</thead>
</table>
</div>
</div>
</div>
</div> --}}