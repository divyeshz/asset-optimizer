<?php

namespace AssetOptimizer;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;

/**
 * Class ImageOptimizer
 *
 * This class provides functionality to optimize image files using the Intervention Image library.
 */
class ImageOptimizer
{
    // Property to hold the ImageManager instance
    protected $manager;

    /**
     * ImageOptimizer constructor.
     *
     * Initializes an ImageManager instance with the GD driver.
     */
    public function __construct()
    {
        // Create an image manager with the desired driver (GD driver)
        $this->manager = new ImageManager(new Driver());
    }

    /**
     * Optimize an image.
     *
     * This method uses the Intervention Image library to optimize an image file by adjusting its quality.
     *
     * @param string $filePath The path to the image file to be optimized.
     * @param string $destination The destination path where the optimized image will be saved.
     * @return string Returns the destination path where the optimized image was saved.
     */
    public function optimize($filePath, $destination)
    {
        // Read the image from the file system
        $image = $this->manager->read($filePath);

        // Get the optimization quality setting from the configuration
        $quality = config('optimizer.image.optimization_quality');

        // Encode the image with the original format but with the specified quality
        $image->encode(new AutoEncoder(quality: $quality));

        // Save the optimized image to the destination path
        $image->save($destination);

        // Return the destination path
        return $destination;
    }
}
