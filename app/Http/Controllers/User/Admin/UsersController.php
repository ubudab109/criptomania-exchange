<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Admin\UpdateWalletBalanceRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserStatusRequest;
use App\Repositories\Core\Interfaces\UserRoleManagementInterface;
use App\Repositories\User\Admin\Interfaces\TransactionInterface;
use App\Repositories\User\Interfaces\NotificationInterface;
use App\Repositories\User\Interfaces\UserInfoInterface;
use App\Repositories\User\Interfaces\UserInterface;
use App\Repositories\User\Trader\Interfaces\WalletInterface;
use App\Repositories\User\Trader\Interfaces\DepositBankInterface;
use App\Services\Core\DataListService;
use App\Services\User\UserService;
use App\Services\User\Trader\WalletService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User\DepositBankTransfer;

class UsersController extends Controller
{
    protected $user;
    protected $walletRepository;

    public function __construct(UserInterface $user, WalletInterface $walletRepository)
    {
        $this->user = $user;
        $this->walletRepository = $walletRepository;
    }

    public function json()
    {
      return $this->user->getUserInfo();
    }

    public function index()
    {
        return view('backend.users.index');
    }

    public function show($id)
    {
        $data['user'] = $this->user->findOrFailById($id);
        $data['title'] = __('View User');

        return view('backend.users.show', $data);
    }

    public function create()
    {
        $data['userRoleManagements'] = app(UserRoleManagementInterface::class)->getUserRoles();
        $data['title'] = __('Create User');

        return view('backend.users.create', $data);
    }

    public function store(UserRequest $request)
    {
        $parameters = $request->only(['first_name', 'last_name', 'address', 'user_role_management_id', 'email', 'username', 'is_email_verified', 'is_financial_active', 'is_active', 'is_accessible_under_maintenance']);

        if ($user = app(UserService::class)->generate($parameters)) {
            return redirect()->route('users.show', $user->id)->with(SERVICE_RESPONSE_SUCCESS, __("User has been created successfully."));
        } else {
            return redirect()->back()->withInput()->with(SERVICE_RESPONSE_ERROR, __('Failed to create user.'));
        }
    }

    public function edit($id, UserRoleManagementInterface $userRoleManagement)
    {
        $data['user'] = $this->user->findOrFailById($id);
        $data['userRoleManagements'] = $userRoleManagement->getUserRoles();
        $data['title'] = __('Edit User');

        return view('backend.users.edit', $data);
    }

    public function update(UserRequest $request, $id)
    {
        if (!in_array($id, config('commonconfig.fixed_users')) && $id != Auth::id()) {
            $parameters['user_role_management_id'] = $request->user_role_management_id;
            $notification = ['user_id' => $id, 'data' => __("Your account's role has been changed by admin.")];
            $this->user->update($parameters, $id);
        }

        $parameters = $request->only('first_name', 'last_name', 'address');

        if (app(UserInfoInterface::class)->update($parameters, $id, 'user_id')) {
            if (isset($notification)) {
                app(NotificationInterface::class)->create($notification);
            }

            return redirect()->back()->with(SERVICE_RESPONSE_SUCCESS, __('User has been updated successfully.'));
        }

        return redirect()->back()->withInput()->with(SERVICE_RESPONSE_ERROR, __('Failed to update user'));
    }

    public function editStatus($id)
    {
        $data['user'] = $this->user->findOrFailById($id);
        $data['title'] = __('Edit User Status');

        return view('backend.users.edit_status', $data);
    }

    public function updateStatus(UserStatusRequest $request, $id)
    {
        if ($id == Auth::id()) {
            return redirect()->route('users.edit.status', $id)->with(SERVICE_RESPONSE_WARNING, __('You cannot change your own status.'));
        } elseif (in_array($id, config('commonconfig.fixed_users'))) {
            return redirect()->route('users.edit.status', $id)->with(SERVICE_RESPONSE_WARNING, __("You cannot change primary user's status."));
        }

        $messages = [
            'is_email_verified' => __('Your email verification status has been changed by admin.'),
            'is_financial_active' => __("Your account's financial status has been changed by admin."),
            'is_accessible_under_maintenance' => __("Your account's maintenance mode access has been changed by admin."),
            'is_active' => __("Your account's status has been changed by admin."),
        ];

        $fields = array_keys($messages);
        $parameters = $request->only($fields);
        $user = $this->user->getFirstById($id);

        if (!$this->user->update($parameters, $id)) {
            return redirect()->back()->withInput()->with(SERVICE_RESPONSE_ERROR, __('Failed to update user status.'));
        }

        $date = date('Y-m-d H:s:i');
        $notifications = [];

        foreach ($fields as $field) {
            if ($user->{$field} != $parameters[$field]) {
                $notifications[] = ['user_id' => $id, 'data' => $messages[$field], 'created_at' => $date, 'updated_at' => $date];
            }
        }

        if (!empty($notifications)) {
            app(NotificationInterface::class)->insert($notifications);
        }

        return redirect()->route('users.edit.status', $id)->with(SERVICE_RESPONSE_SUCCESS, __('User status has been updated successfully.'));
    }

    public function walletsJson($id)
    {
        // $data['list'] = app(WalletService::class)->getWallets($id);
        // $data['title'] = __('Wallets');

        $data = $this->walletRepository->getWalletJson($id);

        return $data;
    }

    public function wallets($id)
    {
        // $data['list'] = app(WalletService::class)->getWallets($id);
        $data['id'] = $id;

        return view('backend.users.wallets.index', $data);
    }

    public function editWalletBalance($id, $walletId)
    {
        $data['wallet'] = app(WalletInterface::class)->getFirstByConditions(['id' => $walletId, 'user_id' => $id]);
        $data['title'] = __('Modify Wallet Balance');

        return view('backend.users.wallets.edit', $data);
    }

     public function editWalletBalanceBank($id, $walletId, $depoId = null)
    {
        // $data['depoId'] = DepositBankTransfer::find($depoId);
        $data['wallet'] = app(WalletInterface::class)->getFirstByConditions(['id' => $walletId, 'user_id' => $id]);
       
        if(!is_null($depoId))
        {
             $data['depositBank'] = app(DepositBankInterface::class)->getFirstByConditions(['id' => $depoId]);
        }
        $data['title'] = __('Modify Wallet Balance');

        return view('backend.users.wallets.editBankWallet', $data);
    }


    public function updateWalletBalance(UpdateWalletBalanceRequest $request, $id, $walletId)
    {
        $attributes = ['primary_balance' => DB::raw('primary_balance + ' . $request->amount)];

        try {
            DB::beginTransaction();

            $walletRepository = app(WalletInterface::class);
            // get the wallet
            $wallet = $walletRepository->getFirstByConditions(['id' => $walletId, 'user_id' => $id], ['stockItem']);

            if (empty($wallet)) {
                throw new \Exception(__('No wallet is found.'));
            }

            if ( !$walletRepository->update($attributes, $walletId) ) {
                throw new \Exception(__('Failed to update the wallet balance.'));
            }

            $date = now();
            // compare the balance with given amount to identify if it's decreased or increased
            $transactionParameters = [
                [
                    'user_id' => $wallet->user_id,
                    'stock_item_id' => $wallet->stock_item_id,
                    'model_name' => null,
                    'model_id' => null,
                    'transaction_type' =>  $wallet->stockItem->api_service == BANK_TRANSFER ? TRANSACTION_TYPE_TRANSFER : TRANSACTION_TYPE_DEBIT,
                    'amount' => bcmul($request->amount, '-1'),
                    'journal' => DECREASED_FROM_SYSTEM_ON_TRANSFER_BY_ADMIN,
                    'updated_at' => $date,
                    'created_at' => $date,
                ],
                [
                    'user_id' => $wallet->user_id,
                    'stock_item_id' => $wallet->stock_item_id,
                    'model_name' => get_class($wallet),
                    'model_id' => $wallet->id,
                    'transaction_type' => $wallet->stockItem->api_service == BANK_TRANSFER ? TRANSACTION_TYPE_TRANSFER : TRANSACTION_TYPE_CREDIT,
                    'amount' => bcmul($request->amount, '1'),
                    'journal' => INCREASED_TO_USER_WALLET_ON_TRANSFER_BY_ADMIN,
                    'updated_at' => $date,
                    'created_at' => $date,
                ]
            ];

            $notificationParameter = [
                'user_id' => $wallet->user_id,
                'data' => __("Your :currency wallet has been increased with :amount :currency by system.", [
                    'amount' => $request->amount,
                    'currency' => $wallet->stockItem->item
                ]),
            ];

            app(TransactionInterface::class)->insert($transactionParameters);
            app(NotificationInterface::class)->create($notificationParameter);

            DB::commit();

            return redirect()->back()->with(SERVICE_RESPONSE_SUCCESS, __('The wallet balance has been updated successfully.'));
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->back()->with(SERVICE_RESPONSE_ERROR, __('Failed to update the wallet balance.'));
        }
    }

    /*

    Developer : Muhammad Rizky Firdaus
    Date : 20 July 2020
    Description : This method used for updating or decline the wallet balance user which deposit with bank transfer especially for Indonesian Rupiah or anything else
    Method   : updateWalletBalanceBank() and declineDepositBank()


    */

    public function updateWalletBalanceBank(UpdateWalletBalanceRequest $request, $userId, $walletId, $depoId)
    {
        $attributes = ['primary_balance' => DB::raw('primary_balance + ' . $request->amount)];

        try {
            DB::beginTransaction();


            $walletRepository = app(WalletInterface::class);
            // get the wallet
            $wallet = $walletRepository->getFirstByConditions(['id' => $walletId, 'user_id' => $userId], ['stockItem']);

            // get the deposit bank id

            if (empty($wallet)) {
                throw new \Exception(__('No wallet is found.'));
            }

            if ( !$walletRepository->update($attributes, $walletId) ) {
                throw new \Exception(__('Failed to update the wallet balance.'));
            }

            $date = now();
            // compare the balance with given amount to identify if it's decreased or increased
            $transactionParameters = [
                [
                    'user_id' => $wallet->user_id,
                    'stock_item_id' => $wallet->stock_item_id,
                    'model_name' => get_class($wallet),
                    'model_id' => $wallet->id,
                    'transaction_type' => TRANSACTION_TYPE_TRANSFER,
                    'deposit_bank_id' => $request->deposit_bank_id,
                    'amount' => bcmul($request->amount, '1'),
                    'journal' => INCREASED_TO_USER_WALLET_ON_TRANSFER_BY_ADMIN,
                    'updated_at' => $date,
                    'created_at' => $date,
                ]
            ];

            $depositBankParameter = [

                    'status' => PAYMENT_COMPLETED,
            ];


            $notificationParameter = [
                'user_id' => $wallet->user_id,
                'data' => __("Your :currency wallet has been increased with :amount :currency by system.", [
                    'amount' => $request->amount,
                    'currency' => $wallet->stockItem->item
                ]),
            ];

            DepositBankTransfer::where('id',$depoId)->update($depositBankParameter);
            app(TransactionInterface::class)->insert($transactionParameters);
            app(NotificationInterface::class)->create($notificationParameter);

            DB::commit();

            return redirect()->back()->withInput()->with(SERVICE_RESPONSE_SUCCESS, __('The wallet balance has been updated successfully.'));
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->back()->with(SERVICE_RESPONSE_ERROR, __('Failed to update the wallet balance.'));
        }
    }

    public function declineDepositBank($userId, $walletId, $depoId)
    {
        try {
            DB::beginTransaction();

             $walletRepository = app(WalletInterface::class);
            // get the wallet
            $wallet = $walletRepository->getFirstByConditions(['id' => $walletId, 'user_id' => $userId], ['stockItem']);

            // get the deposit bank id

            $date = now();

             $depositBankParameter = [

                    'status' => PAYMENT_FAILED,
            ];


            $notificationParameter = [
                'user_id' => $wallet->user_id,
                'data' => __("Your deposit in wallet :currency has been declined by admin.", [
                    'currency' => $wallet->stockItem->item
                ]),
            ];

            DepositBankTransfer::where('id',$depoId)->update($depositBankParameter);
            app(NotificationInterface::class)->create($notificationParameter);

            DB::commit();
            return redirect()->back()->withInput()->with(SERVICE_RESPONSE_SUCCESS, __('Deposit was declined successfully.'));

        } catch (Exception $exception){
            DB::rollBack();

            return redirect()->back()->with(SERVICE_RESPONSE_ERROR, __('Failed to update status.'));
        }
    }
}
