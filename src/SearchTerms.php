<?php


namespace Rksugarfree\Gbooks;


use Rksugarfree\Gbooks\Exceptions\InvalidQueryParameter;

trait SearchTerms
{
    private array $queryParams = [];

    public function search(string $searchTerm): void
    {
        $this->queryParams['q'] = $searchTerm;
    }

    public function limit(int $limit): void
    {
        if ($limit > 40) {
            throw new InvalidQueryParameter("Limit must be between 0 and 40");
        }

        $this->queryParams['maxResults'] = $limit;
    }

    public function orderBy(string $orderTerm): void
    {
        if (! in_array($orderTerm, ['newest', 'relevance'])) {
            throw new InvalidQueryParameter("Order By Term \"$orderTerm\" is invalid. Must be in \"newest\" or \"relevance\".");
        }

        $this->queryParams['orderBy'] = $orderTerm;
    }

    public function downloadable(): void
    {
        $this->queryParams['download'] = 'epub';
    }

    public function bookType($bookType): void
    {
        if (! in_array($bookType, ['ebooks', 'free-books', 'full', 'paid-ebooks', 'partial'])) {
            throw new InvalidQueryParameter("Book type \"$bookType\" is invalid. Must be in \"ebooks\", \"free-books\", \"full\", \"paid-ebooks\", \"partial\".");
        }

        $this->queryParams['filter'] = $bookType;
    }

    public function printType($printType): void
    {
        if (! in_array($printType, ['all', 'books', 'magazines'])) {
            throw new InvalidQueryParameter("Print type \"$printType\" is invalid. Must be in \"all\", \"books\", \"magazines\".");
        }

        $this->queryParams['printType'] = $printType;
    }

    public function showPreorders(): void
    {
        $this->queryParams['showPreorders'] = true;
    }

    public function info($info): void
    {
        if (! in_array($info, ['full', 'lite'])) {
            throw new InvalidQueryParameter("Info type \"$info\" is invalid. Must be in \"all\", \"books\", \"magazines\".");
        }

        $this->queryParams['projection'] = $info;
    }

    public function startIndex(int $start): void
    {
        if ($start < 0) {
            throw new InvalidQueryParameter("Start index must be a positive value.");
        }

        $this->queryParams['startIndex'] = $start;
    }
}
