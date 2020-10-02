<?php


namespace Rksugarfree\Gbooks;

use Rksugarfree\Gbooks\Exceptions\InvalidQueryParameter;

trait QueryOptions
{
    private array $queryParams = [];

    public function reset(): Gbooks
    {
        $this->queryParams = [];

        return $this;
    }

    public function search(string $searchTerm): Gbooks
    {
        $this->queryParams['q'] = $searchTerm;

        return $this;
    }

    public function limit(int $limit): Gbooks
    {
        if ($limit > 40) {
            throw new InvalidQueryParameter("Limit must be between 0 and 40");
        }

        $this->queryParams['maxResults'] = $limit;

        return $this;
    }

    public function orderBy(string $orderTerm): Gbooks
    {
        if (! in_array($orderTerm, ['newest', 'relevance'])) {
            throw new InvalidQueryParameter("Order By Term \"$orderTerm\" is invalid. Must be in \"newest\" or \"relevance\".");
        }

        $this->queryParams['orderBy'] = $orderTerm;

        return $this;
    }

    public function downloadable(): Gbooks
    {
        $this->queryParams['download'] = 'epub';

        return $this;
    }

    public function bookType($bookType): Gbooks
    {
        if (! in_array($bookType, ['ebooks', 'free-books', 'full', 'paid-ebooks', 'partial'])) {
            throw new InvalidQueryParameter("Book type \"$bookType\" is invalid. Must be in \"ebooks\", \"free-books\", \"full\", \"paid-ebooks\", \"partial\".");
        }

        $this->queryParams['filter'] = $bookType;

        return $this;
    }

    public function printType($printType): Gbooks
    {
        if (! in_array($printType, ['all', 'books', 'magazines'])) {
            throw new InvalidQueryParameter("Print type \"$printType\" is invalid. Must be in \"all\", \"books\", \"magazines\".");
        }

        $this->queryParams['printType'] = $printType;

        return $this;
    }

    public function showPreorders(): Gbooks
    {
        $this->queryParams['showPreorders'] = true;

        return $this;
    }

    public function info($info): Gbooks
    {
        if (! in_array($info, ['full', 'lite'])) {
            throw new InvalidQueryParameter("Info type \"$info\" is invalid. Must be in \"all\", \"books\", \"magazines\".");
        }

        $this->queryParams['projection'] = $info;

        return $this;
    }

    public function startIndex(int $start): Gbooks
    {
        if ($start < 0) {
            throw new InvalidQueryParameter("Start index must be a positive value.");
        }

        $this->queryParams['startIndex'] = $start;

        return $this;
    }
}
