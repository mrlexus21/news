<?php

namespace App\Services\NewsPost;

use App\DTO\NewsPost\NewsPostDto;
use App\Models\Post as Model;
use App\Repositories\Interfaces\NewsPostRepositoryInterface;

class NewsPostService
{
    /**
     * @var NewsPostRepositoryInterface
     */
    private $newsRepository;

    public function __construct(NewsPostRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * @param int $id
     * @param NewsPostDto $dto
     * @return bool
     */
    public function updateNewsPostWithId(int $id, NewsPostDto $dto):bool
    {
        return $this->newsRepository->getEdit($id)->update($dto->toArray());
    }

    /**
     * @param NewsPostDto $dto
     * @return Model
     */
    public function createNewsPost(NewsPostDto $dto): Model
    {
        return (new Model())->create($dto->toArray());
    }
}
