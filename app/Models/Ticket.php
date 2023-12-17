<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function transactions() {
        return $this->hasMany(Transaction::class)->onDelete('cascade');
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id')->onDelete('cascade');
    }
}
