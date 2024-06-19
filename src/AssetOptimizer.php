<?php

namespace AssetOptimizer;

use AssetOptimizer\ImageOptimizer;
use AssetOptimizer\VideoOptimizer;
use AssetOptimizer\AudioOptimizer;
use AssetOptimizer\ThumbnailCreator;

/**
 * Class AssetOptimizer
 *
 * This class provides methods to optimize different types of assets such as images, videos, and audio files.
 * It also includes functionality to create thumbnails for given files.
 */
class AssetOptimizer
{
    // Protected properties to hold instances of the optimizers
    protected $imageOptimizer;
    protected $videoOptimizer;
    protected $audioOptimizer;
    protected $thumbnailCreator;

    /**
     * AssetOptimizer constructor.
     *
     * Initializes instances of ImageOptimizer, VideoOptimizer, AudioOptimizer, and ThumbnailCreator.
     */
    public function __construct()
    {
        // Initialize ImageOptimizer
        $this->imageOptimizer = new ImageOptimizer();

        // Initialize VideoOptimizer
        $this->videoOptimizer = new VideoOptimizer();

        // Initialize AudioOptimizer
        $this->audioOptimizer = new AudioOptimizer();

        // Initialize ThumbnailCreator
        $this->thumbnailCreator = new ThumbnailCreator();
    }

    /**
     * Optimize an image.
     *
     * @param string $filePath The path to the image file to be optimized.
     * @param string $destination The destination path where the optimized image will be saved.
     * @return bool Returns true if optimization is successful, false otherwise.
     */
    public function optimizeImage($filePath, $destination)
    {
        // Call the optimize method of ImageOptimizer
        return $this->imageOptimizer->optimize($filePath, $destination);
    }

    /**
     * Optimize a video.
     *
     * @param string $filePath The path to the video file to be optimized.
     * @param string $destination The destination path where the optimized video will be saved.
     * @return bool Returns true if optimization is successful, false otherwise.
     */
    public function optimizeVideo($filePath, $destination)
    {
        // Call the optimize method of VideoOptimizer
        return $this->videoOptimizer->optimize($filePath, $destination);
    }

    /**
     * Optimize an audio file.
     *
     * @param string $filePath The path to the audio file to be optimized.
     * @param string $destination The destination path where the optimized audio will be saved.
     * @return bool Returns true if optimization is successful, false otherwise.
     */
    public function optimizeAudio($filePath, $destination)
    {
        // Call the optimize method of AudioOptimizer
        return $this->audioOptimizer->optimize($filePath, $destination);
    }

    /**
     * Create a thumbnail for a given file.
     *
     * @param string $filePath The path to the file for which the thumbnail will be created.
     * @param string $destination The destination path where the thumbnail will be saved.
     * @param string $type The type of the file (e.g., 'image', 'video').
     * @return bool Returns true if the thumbnail creation is successful, false otherwise.
     */
    public function createThumbnail($filePath, $destination, $type)
    {
        // Call the create method of ThumbnailCreator
        return $this->thumbnailCreator->create($filePath, $destination, $type);
    }
}
