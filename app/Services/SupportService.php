<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;

class SupportService
{
    public function getAll(string $filter = NULL): array
    {
        return $this->repository->getAll($filter);
    }
    public function findOne(string $id): \stdClass|NULL
    {
        return $this->repository->findOne($id);
    }
    public function new(CreateSupportDTO $dto): \stdClass
    {
        return $this->repository->new($dto);
    }
    public function update(UpdateSupportDTO $dto): \stdClass|NULL
    {
        return $this->repository->update($dto);
    }
    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
