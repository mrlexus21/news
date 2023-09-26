<?php

namespace App\Services\NewsPost;

use App\DTO\NewsPost\NewsPostDto;
use App\Models\Post as Model;
use App\Repositories\Interfaces\PostRepositoryInterface;
use stdClass;

class NewsPostService
{
    /**
     * @var PostRepositoryInterface
     */
    private $newsRepository;

    /**
     * @param PostRepositoryInterface $newsRepository
     */
    public function __construct(PostRepositoryInterface $newsRepository)
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

    /**
     * @param NewsPostDto $dto
     * @return stdClass
     */
    public function findFromTitleOrCreate(NewsPostDto $dto): stdClass
    {
        $result = new stdClass();
        $result->status = 'created';

        if (!empty($findModel = Model::select('id')->where('title', $dto->title)->first())) {
            $result->status = 'found';
            $result->id = $findModel->id;
        } else {
            $record = $this->createNewsPost($dto);
            $result->id = $record->id;
        }

        return $result;
    }
}
