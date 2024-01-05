<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function getRouteKeyName() {
        return 'cd_transaction';
    }

    public function tickets() {
        return $this->belongsTo(Ticket::class)->onDelete('cascade');
    }

    // Search
    public function scopeFilter($query, array $filters) {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('cus_name', 'like', '%' . request('search') . '%')
        //                 ->orWhere('cd_transaction', 'like', '%' . request('search') . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('cus_name', 'like', '%' . request('search') . '%')
                    ->orWhere('cd_transaction', 'like', '%' . request('search') . '%');
        });
    }
}
