<?php

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Models\Support;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    /**
     * @param Support $model
     */
    public function __construct(
        protected Support $model
    ) {}

    /**
     * @param string|NULL $filter
     * @return array
     */
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = NULL): PaginationInterface
    {
        $result = $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', 'like', "%{$filter}%");
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result, ['filter' => $filter]);
    }

    /**
     * @param string|NULL $filter
     * @return array
     */
    public function getAll(string $filter = NULL): array
    {
        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', 'like', "%{$filter}%");
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->get()
            ->toArray();
    }

    /**
     * @param string|NULL $id
     * @return stdClass|null
     */
    public function findOne(string $id = NULL): stdClass|null
    {
        return (object) $this->model->find($id)->toArray() ?? NULL;
    }

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    /**
     * @param CreateSupportDTO $dto
     * @return stdClass
     */
    public function new(CreateSupportDTO $dto): stdClass
    {
        return (object) $this->model->create((array) $dto)->toArray();
    }

    /**
     * @param UpdateSupportDTO $dto
     * @return stdClass|null
     */
    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        if (!$support = $this->model->find($dto->id)) {
            return NULL;
        }
        $support->update((array) $dto);
        return (object) $dto->toArray();
    }
}
