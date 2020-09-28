<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\BitcoinApi;
use App\Services\Api\CoinPaymentApi;
use App\Services\User\Trader\WalletService;
use Illuminate\Http\Request;

class IpnController extends Controller
{
    public function ipn(Request $request)
    {
        $ipnRequest = $request->all();

        if(env('APP_ENV') != 'production' && env('APP_DEBUG') == true) {
            logs()->info($ipnRequest);
        }

        if( empty($ipnRequest) || !isset($ipnRequest['currency']) )
        {
            logs()->error('log: Invalid coinpayment IPN request.');

            return null;
        }

        $coinpayment = new CoinPaymentApi($ipnRequest['currency']);
        $ipnResponse = $coinpayment->validateIPN($ipnRequest, $request->server());

        if( $ipnResponse['error'] == 'ok')
        {
            app(WalletService::class)->updateTransaction($ipnResponse);

            return null;
        }
        else
        {
            logs()->error($ipnResponse['error']);

            return null;
        }
    }

    /*
     * @var bitcoinIpn
     * @desc This controller handles the bitcoin or any cryptocurrency PORT which use the bitcoin core
     * @return returning info from txid and send to WalletService to update any transaction with txid
    */

    public function bitcoinIpn(Request $request, $currency)
    {
        try {
            $bitcoin = new BitcoinApi($currency);
            $listtr = $bitcoin->getListTransactions();
            foreach ($listtr as $list => $v )
            {
            $obj = ['txn_id' => $v['txid']];
            
            $bitcoind = $bitcoin->validateIPN($obj, $request->server());
            // var_dump($bitcoind);
            

                    if( $bitcoind['error'] == 'ok')
                    {
                        app(WalletService::class)->updateTransaction($bitcoind);
                    }
                    else{
                        logs()->error($bitcoind['error']);

                        return null;
                    }
            }
        }
        catch (\Exception $exception)
        {
            // logs()->error( $exception->getMessage() );

            return null;
        }
    }
}