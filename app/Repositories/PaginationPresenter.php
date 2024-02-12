<?php

namespace App\Repositories;

use App\Repositories\PaginationInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginationInterface
{
    /**
     * @var array
     */
    private array $items;

    public function __construct(
        protected LengthAwarePaginator $paginator,
        protected array $filter
    )
    {
        $this->items = $this->resolveItems($this->paginator->items());
    }
    public function items(): array
    {
        return $this->items;
    }

    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }

    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }

    public function isLastPage(): bool
    {
        return $this->paginator->currentPage() === $this->paginator->lastPage();
    }

    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }

    public function getNumberNextPage(): int
    {
        return $this->paginator->currentPage() + 1;
    }

    public function getNumberPreviousPage(): int
    {
        return $this->paginator->currentPage() - 1;
    }

    public function getFilter(): array|NULL
    {
        return $this->filter;
    }

    public function getMeta(): array|NULL
    {
        return [
            'meta' => [
                'total' => $this->total(),
                'is_first_page' => $this->isFirstPage(),
                'is_last_page' => $this->isLastPage(),
                'current_page' => $this->currentPage(),
                'next_page' => $this->getNumberNextPage(),
                'previous_page' => $this->getNumberPreviousPage(),
                'filters' => $this->getFilter(),
            ]
        ];
    }

    private function resolveItems (array $items): array
    {
        $response = [];
        foreach ($items as $item) {
            $stdClassObject = new stdClass;
            foreach ($item->toArray() as $key =>$value) {
                $stdClassObject->{$key} = $value;
            }
            array_push($response, $stdClassObject);
        }
        return $response;
    }
}
