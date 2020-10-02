<?php

namespace Rksugarfree\Gbooks;

class Gbooks
{
    use SearchTerms;

    private \Google_Service_Books $googleServiceBooks;

    public function __construct(\Google_Service_Books $googleServiceBooks)
    {
        $this->googleServiceBooks = $googleServiceBooks;
    }

    public function byVolumeId(string $volumeId): \Google_Service_Books_Volume
    {
        return $this->googleServiceBooks->volumes->get($volumeId);
    }

    public function get(): \Google_Service_Books_Volumes
    {
        return $this->googleServiceBooks->volumes->listVolumes($this->queryParams);
    }

    public function similar(string $volumeId): \Google_Service_Books_Volumes
    {
        return $this->googleServiceBooks->volumes_associated->listVolumesAssociated($volumeId);
    }
}
