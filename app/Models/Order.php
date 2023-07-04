<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    // protected $fillable = [
    //     'amount',
    //     'invoice_id',
    //     'transaction_id'
    // ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
