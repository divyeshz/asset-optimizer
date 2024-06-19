<?php

namespace AssetOptimizer;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;

class ImageOptimizer
{
    protected $manager;

    public function __construct()
    {
        // create image manager with desired driver
        $this->manager = new ImageManager(new Driver());
    }

    public function optimize($filePath, $destination)
    {
        // read image from file system
        $image = $this->manager->read($filePath);

        $quality = config('optimizer.image.optimization_quality');

        // encode as the originally read image format but with a certain quality
        $image->encode(new AutoEncoder(quality: $quality));

        $image->save($destination);

        return $destination;
    }
}
