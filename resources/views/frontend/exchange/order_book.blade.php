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

            {{-- <tbody class="ob-heading">
                <tr>
                    <td>
                        <span>Last Price</span>
                        0.020367
                    </td>
                    <td>
                        <span>USD</span>
                        148.65
                    </td>
                    <td class="red">
                        <span>Change</span>
                        -0.51%
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr class="green-bg">
                    <td class="green">0.158373</td>
                    <td>1.209515</td>
                    <td>15.23248</td>
                </tr>
                <tr class="green-bg-5">
                    <td class="green">0.020851</td>
                    <td>1.206245</td>
                    <td>15.25458</td>
                </tr>
                <tr class="green-bg-8">
                    <td class="green">0.025375</td>
                    <td>1.205715</td>
                    <td>15.65648</td>
                </tr>
                <tr class="green-bg-10">
                    <td class="green">0.020252</td>
                    <td>1.205495</td>
                    <td>15.24548</td>
                </tr>
                <tr class="green-bg-20">
                    <td class="green">0.020373</td>
                    <td>1.205415</td>
                    <td>15.25648</td>
                </tr>
                <tr class="green-bg-40">
                    <td class="green">0.020156</td>
                    <td>1.207515</td>
                    <td>15.28948</td>
                </tr>
                <tr class="green-bg-60">
                    <td class="green">0.540375</td>
                    <td>1.205915</td>
                    <td>15.25748</td>
                </tr>
                <tr class="green-bg-80">
                    <td class="green">0.020372</td>
                    <td>1.205415</td>
                    <td>15.25648</td>
                </tr>
            </tbody> --}}
        </table>
    </div>
    <div class="market-history">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#recent-trades" role="tab" aria-selected="true">Recent
                    Trades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#market-depth" role="tab"
                    aria-selected="false">Market
                    Depth</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade" id="recent-trades" role="tabpanel">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Price(BTC)</th>
                            <th>Amount(ETH)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>13:03:53</td>
                            <td class="red">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="green">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="green">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="red">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="green">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="green">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="green">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="red">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="red">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="green">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="green">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="red">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="green">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                        <tr>
                            <td>13:03:53</td>
                            <td class="red">0.020191</td>
                            <td>0.2155045</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade show active" id="market-depth" role="tabpanel">
                <div class="depth-chart-container">
                    <div class="depth-chart-inner">
                        <div id="lightDepthChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>