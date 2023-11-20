<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionData extends Model
{
    use HasFactory;

    protected $casts = [
        'data' => 'object'
    ];
    protected $guarded = [];


    public function blogComments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id')->latest();
    }
}
