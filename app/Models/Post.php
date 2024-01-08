<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, sluggable;

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

    public function getRouteKeyName() {
        return 'slug';
    }

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
