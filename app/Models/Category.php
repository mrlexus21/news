<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\HtmlString;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $guarded = false;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function getDescription()
    {
        return new HtmlString($this->description);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
