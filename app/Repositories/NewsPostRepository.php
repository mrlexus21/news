<?php

namespace App\Repositories;

use App\Models\Post as Model;
use App\Repositories\Interfaces\NewsPostRepositoryInterface;
use App\Services\Filters\NewsPostFilters;
use Illuminate\Support\Carbon;

class NewsPostRepository extends CoreRepository implements NewsPostRepositoryInterface
{
    private $defaultColumns = [
        'id',
        'title',
        'slug',
        'image',
        'excerpt',
        'published_at',
        'category_id'
    ];

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate(int $perPage = 100)
    {
        $columns = [
            'id',
            'title',
            'slug',
            'image',
            'excerpt',
            'is_published',
            'created_at',
            'updated_at',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'asc')
            ->with('category:name')
            ->paginate($perPage);

        return $result;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getPostWithPaginateCategory(int $perPage = 100, int $category = null)
    {
        $query = $this
            ->startConditions()
            ->select($this->defaultColumns)
            ->orderBy('id', 'desc')
            ->with('category')
            ->nowPublished();

        if (isset($category)) {
            $query->category($category);
        }

        return $query->paginate($perPage);
    }

    public function getNewsPostsWithFilterPaginate($request, $perPage = null)
    {
        $filters = (new NewsPostFilters($request));
        return $this
            ->startConditions()
            ->filter($filters)
            ->paginate($perPage);
    }

    /*public function getLastNewsByCategoryId(int $id, int $limit = 100)
    {
        return $this
            ->startConditions()
            ->select($this->defaultColumns)
            ->orderBy('id', 'desc')
            ->with('category')
            ->category($id)
            ->limit($limit)
            ->get();
    }*/

    /*public function getLastNewsWithPaginateByCategoryId(int $id, int $perPage = 100)
    {
        return $this
            ->startConditions()
            ->select($this->defaultColumns)
            ->orderBy('id', 'desc')
            ->with('category')
            ->category($id)
            ->paginate($perPage);
    }*/

    public function getLastMainSliderPosts(int $category = null, int $limit = 10)
    {
        $query = $this
            ->startConditions()
            ->select($this->defaultColumns)
            ->orderBy('id', 'desc')
            ->with('category')
            ->nowPublished()
            ->limit($limit);

        if (isset($category)) {
            $query->category($category);
        }

        return $query->get();
    }

    public function getLastPublishedNews(int $category = null, int $limit = 20)
    {
        $query = $this
            ->startConditions()
            ->select($this->defaultColumns)
            ->orderBy('published_at', 'desc')
            ->with('category')
            ->nowPublished()
            ->limit($limit);

        if (isset($category)) {
            $query->category($category);
        }

        return $query->get();
    }

    public function getLastPopularPublishedNews(int $category = null, int $limit = 20)
    {
        $query = $this
            ->startConditions()
            ->select($this->defaultColumns)
            ->orderBy('published_at', 'desc')
            ->with('category')
            ->nowPublished()
            ->popular()
            ->limit($limit);

        if (isset($category)) {
            $query->category($category);
        }

        return $query->get();
    }

    public function getPublishedNewsOverPeriod(Carbon $period, int $limit = 20, int $category = null, $getWithBuilder = false)
    {
        $query = $this
            ->startConditions()
            ->select($this->defaultColumns)
            ->where('published_at', '>', $period)
            ->with('category')
            ->nowPublished()
            ->inRandomOrder()
            ->limit($limit);

        if (isset($category)) {
            $query->category($category);
        }

        if ($getWithBuilder) {
            return $query;
        }

        return $query->get();
    }

    public function getPopularRandomNewsOverPeriod(Carbon $period, int $limit = 20, int $category = null)
    {
        $query = $this
            ->startConditions()
            ->select($this->defaultColumns)
            ->where('published_at', '>', $period)
            ->with('category')
            ->nowPublished()
            ->popular()
            ->inRandomOrder()
            ->limit($limit);

        if (isset($category)) {
            $query->category($category);
        }

        return $query->get();
    }
}
