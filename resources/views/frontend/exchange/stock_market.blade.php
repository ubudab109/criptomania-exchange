<style>
    ul.menubar {
        overflow: auto;
        white-space: nowrap;
        height: 40px;
    }

    ul.menubar li {
        display: inline-block;
    }
</style>

<div class="col-md-3">
    <div class="market-pairs">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm"><i class="icon ion-md-search"></i></span>
            </div>
            <input type="text" id="myInput" class="form-control" placeholder="Search"
                aria-describedby="inputGroup-sizing-sm">
        </div>
        <ul class="nav nav-pills menubar" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" style="color: #0000EE"><i class="fa fa-star"></i></a>
            </li>
            @php
            $bc = '';
            @endphp
            @foreach($base_coins as $base_coin)
            @if($bc != $base_coin->item )
            <li class="nav-item">
                <a class="nav-link tab-base-coin" data-toggle="pill" href="#STAR" role="tab" aria-selected="true"
                    data-column="3" value="{{$base_coin->base_item_id}}">{{$base_coin->item}}</a>
            </li>
            @php
            $bc = $base_coin->item;
            @endphp
            @else

            @endif
            @endforeach
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="STAR" role="tabpanel">
                <table id="stock_market_table" class="table table-hover small exchange-table stock-market">
                    <thead>
                        <tr>
                            <th style="display:none">{{ __('STOCK') }}</th>
                            <th>{{ __('ICON') }}</th>
                            <th style="padding-left: 50px !important;">{{ __('PRICE') }}</th>
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