<?php
Route::group(['namespace' => 'User\Admin'], function () {

    Route::get('/dashboard', 'DashboardController')->name('dashboard');

    Route::get('users/{id}/wallets', 'UsersController@wallets')->name('admin.users.wallets');
    Route::get('users/{id}/wallets/{walletId}', 'UsersController@editWalletBalance')->name('admin.users.wallets.edit')->where('walletId', '[0-9]+');
    Route::get('users/{id}/wallets/{walletId}/depositId/{depositId}', 'UsersController@editWalletBalanceBank')->name('admin.users.wallets.editBankBalance')->where('walletId', '[0-9]+');


    Route::post('users/{id}/wallets/{walletId}/update', 'UsersController@updateWalletBalance')->name('admin.users.wallets.update')->where('walletId', '[0-9]+');

    Route::post('users/{id}/wallets/{walletId}/update/{depositId}', 'UsersController@updateWalletBalanceBank')->name('admin.users.wallets.updateDepoBank')->where('walletId', '[0-9]+');


    Route::put('users/{id}/wallets/{walletId}/update/{depositId}', 'UsersController@declineDepositBank')->name('admin.users.wallets.declineDepositBank')->where('walletId', '[0-9]+');


    Route::put('coins/{id}/toggle-status', 'StockItemController@toggleActiveStatus')->name('admin.stock-items.toggle-status');

    Route::resource('coins', 'StockItemController')->parameter('coins', 'id')->names('admin.stock-items');

    Route::put('coins-pairs/{id}/toggle-status', 'StockPairController@toggleActiveStatus')->name('admin.stock-pairs.toggle-status');

    Route::put('coins-pairs/{id}/make-status-default', 'StockPairController@makeStatusDefault')->name('admin.stock-pairs.make-status-default');

    Route::resource('coins-pairs', 'StockPairController')->parameter('coins-pairs', 'id')->names('admin.stock-pairs');
    Route::get('coin-pairs/json', 'StockPairController@json')->name('admin.stock-pairs.json');

    Route::get('review-withdrawals', 'WithdrawalController@index')->name('admin.review-withdrawals.index');
    Route::get('review-withdrawals/{id}/show', 'WithdrawalController@show')->name('admin.review-withdrawals.show');
    Route::put('review-withdrawals/{id}/approve', 'WithdrawalController@approve')->name('admin.review-withdrawals.approve');
    Route::put('review-withdrawals/{id}/approveBank', 'WithdrawalController@approveBank')->name('admin.review-withdrawals.approveBank');
    Route::put('review-withdrawals/{id}/decline', 'WithdrawalController@decline')->name('admin.review-withdrawals.decline');
    Route::put('review-withdrawals/declineBank/{id}', 'WithdrawalController@declineBank')->name('admin.review-withdrawals.declineBank');




    Route::put('id-management/{id}/approve', 'IdManagementController@approve')->name('admin.id-management.approve');
    Route::put('id-management/{id}/decline', 'IdManagementController@decline')->name('admin.id-management.decline');
    Route::resource('id-management', 'IdManagementController')->only(['index', 'show'])->parameter('id-management', 'id')->names('admin.id-management');

    Route::post('multi-post', 'StockPairController@multiStore')->name('admin.stock-pairs.multiStore');
    Route::get('/multi/create', 'StockPairController@multiIndex')->name('admin.stock-pairs.multiIndex');


    Route::put('wallets/{id}/deposit/changeStatusBank', 'WalletController@updateStatusBankTransfer')->name('complete-bank-deposit');

    Route::resource('list-bank', 'ListBankController')->parameter('list-bank', 'id')->names('admin.list-bank');
    Route::get('bank-list-trader', 'ListBankController@traderBank')->name('admin.bank-list-trader.index');
    Route::get('listbank/json','ListBankController@json')->name('admin.list-bank.json');

    Route::get('api-service-name','ApiServiceController@index')->name('admin.api-service-name');
    Route::get('api-service-name-create','ApiServiceController@create')->name('admin.api-service-name-create');
    Route::post('api-service-name-store','ApiServiceController@store')->name('admin.api-service-name-store');
});
