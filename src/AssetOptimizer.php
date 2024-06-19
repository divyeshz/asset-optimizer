<?php

namespace AssetOptimizer;

use AssetOptimizer\ImageOptimizer;
use AssetOptimizer\VideoOptimizer;
use AssetOptimizer\AudioOptimizer;
use AssetOptimizer\ThumbnailCreator;

class AssetOptimizer
{
    protected $imageOptimizer;
    protected $videoOptimizer;
    protected $audioOptimizer;
    protected $thumbnailCreator;

    public function __construct()
    {
        $this->imageOptimizer = new ImageOptimizer();
        $this->videoOptimizer = new VideoOptimizer();
        $this->audioOptimizer = new AudioOptimizer();
        $this->thumbnailCreator = new ThumbnailCreator();
    }

    public function optimizeImage($filePath, $destination)
    {
        return $this->imageOptimizer->optimize($filePath, $destination);
    }

    public function optimizeVideo($filePath, $destination)
    {
        return $this->videoOptimizer->optimize($filePath, $destination);
    }

    public function optimizeAudio($filePath, $destination)
    {
        return $this->audioOptimizer->optimize($filePath, $destination);
    }

    public function createThumbnail($filePath, $destination, $type)
    {
        return $this->thumbnailCreator->create($filePath, $destination, $type);
    }
}
