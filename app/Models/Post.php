<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return mixed
     */
    public function getMiddleFormatDateAttribute()
    {
        return Str::ucfirst(Date::parse($this->published_at)->format('F d, Y'));
    }

    /**
     * @return mixed
     */
    public function getMiddleShortMonthFormatDateAttribute()
    {
        return Str::ucfirst(Date::parse($this->published_at)->format('M d, Y'));
    }

    /**
     * @return mixed
     */
    public function getFullShortTimeFormatDateAttribute()
    {
        return Str::ucfirst(Date::parse($this->published_at)->format('H:m M d, Y'));
    }
}
