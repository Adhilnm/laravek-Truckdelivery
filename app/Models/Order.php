<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'location', 'size', 'weight', 'pickup_time', 'delivery_time', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}