<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, sluggable;

    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'description'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    // Check Unique Title
    public static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            // Cek apakah title yang baru dimasukkan adalah unik kecuali jika itu adalah title asli dari data yang sedang diedit
            if ($post->isDirty('title')) {
                $originalTitle = $post->getOriginal('title');
                $existingPost = static::where('title', $post->title)->first();

                if ($existingPost && $existingPost->title !== $originalTitle) {
                    // Title baru tidak unik, maka berikan pesan kesalahan
                    throw new \Exception("Title '{$post->title}' sudah digunakan.");
                }
            }
        });
    }
}
