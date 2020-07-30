<?php

namespace App\Models\User;

use App\Models\Backend\StockItem;
use App\Models\User\DepositBankTransfer;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['id', 'user_id', 'stock_item_id', 'primary_balance', 'on_order_balance', 'address', 'is_active'];

    public function stockItem(){
        return $this->belongsTo(StockItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function depositBankTransferBelongs()
    {
    	return $this->belongsTo(DepositBankTransfer::class);
    }
}
