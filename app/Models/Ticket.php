<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Status Ticket
    public function isOpenForPurchase() {
        // Get Time
        $currentTime = now()->format('H:i:s');

        // Check Time
        return $this->status === 'open' && $currentTime >= $this->start_time && $currentTime <= $this->end_time;
    }
}
