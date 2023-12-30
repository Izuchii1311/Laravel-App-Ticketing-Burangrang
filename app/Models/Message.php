<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    // ? Eloquent Slugggable
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // ? Slug as route key name
    public function getRouteKeyName() {
        return 'slug';
    }
}
