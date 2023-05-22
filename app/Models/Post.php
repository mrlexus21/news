<?php

namespace App\Models;

use App\Services\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;

class Post extends Model
{
    use HasFactory, SoftDeletes, HasEvents;

    protected $table = 'posts';
    protected $guarded = false;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'category_id',
        'user_id',
        'excerpt',
        'content',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getExcerpt()
    {
        return new HtmlString($this->excerpt);
    }

    public function getContent()
    {
        return new HtmlString($this->content);
    }

    /**
     * Return format like in current lang site - Ноябрь 27, 2021
     *
     * @return mixed
     */
    public function getMiddleFormatDateAttribute()
    {
        return Str::ucfirst(Date::parse($this->published_at)->format('F d, Y'));
    }

    /**
     * Return format like in current lang site - Ноя 27, 2021
     *
     * @return mixed
     */
    public function getMiddleShortMonthFormatDateAttribute()
    {
        return Str::ucfirst(Date::parse($this->published_at)->format('M d, Y'));
    }

    /**
     * Return time format like - 12:54
     *
     * @return string
     */
    public function getShortTimeFormatAttribute()
    {
        return Carbon::parse($this->published_at)->format('H:m');
    }

    /**
     * Return time format like - 12:54 Ноя 27, 2021
     *
     * @return mixed
     */
    public function getFullShortTimeFormatAttribute()
    {
        return Str::ucfirst(Date::parse($this->published_at)->format('H:m M d, Y'));
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }

    public function scopeCategory($query, $cid)
    {
        return $query->where('category_id', $cid);
    }

    public function getStatusAttribute(bool $withClassName = false): object
    {
        $result = (object)[];

        if (isset($this->deleted_at)) {
            $result->value = 'deleted';
            $class = 'danger';
        } elseif ($this->is_published === false) {
            $result->value = 'draft';
            $class = 'warning';
        } else {
            $result->value = 'published';
            $class = 'success';
        }

        if ($withClassName) {
            $result->class = $class;
        }

        return $result;
    }
}
