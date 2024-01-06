<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kyslik\ColumnSortable\Sortable;

class Ticket extends Model
{
    use HasFactory, Sortable;

    protected $guarded = ['id'];

    public function getRouteKeyName() {
        return 'cd_ticket';
    }

    // Sortable
    public $sortable = [
        'name_ticket',
        'created_at'
    ];

    public function transactions() {
        return $this->hasMany(Transaction::class)->onDelete('cascade');
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id')->onDelete('cascade');
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('cd_ticket', 'like', '%' . request('search') . '%')
                    ->orWhere('name_ticket', 'like', '%' . request('search') . '%');
        });
    }
}
