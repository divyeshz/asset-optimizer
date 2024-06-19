<?php

namespace AssetOptimizer;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;

/**
 * Class ThumbnailCreator
 *
 * This class provides functionality to create thumbnails for both images and videos.
 */
class ThumbnailCreator
{
    // Property to hold the ImageManager instance
    protected $manager;

    /**
     * ThumbnailCreator constructor.
     *
     * Initializes an ImageManager instance with the GD driver.
     */
    public function __construct()
    {
        // Create an image manager with the desired driver (GD driver)
        $this->manager = new ImageManager(new Driver());
    }

    /**
     * Create a thumbnail for an image or video.
     *
     * This method creates a thumbnail for an image or a video based on the specified type.
     *
     * @param string $filePath The path to the file (image or video) for which the thumbnail will be created.
     * @param string $destination The destination path where the thumbnail will be saved.
     * @param string $type The type of the file ('image' or 'video'). Default is 'image'.
     * @return string Returns the destination path where the thumbnail was saved.
     * @throws \Exception If the file type is unsupported.
     */
    public function create($filePath, $destination, $type = 'image')
    {
        if ($type == 'image') {
            // Create a thumbnail for an image
            $image = $this->manager->read($filePath);

            // Get the thumbnail dimensions from the configuration
            $width = config('optimizer.thumbnail.width');
            $height = config('optimizer.thumbnail.height');

            // Resize the image to the specified dimensions
            $image->resize($width, $height);

            // Save the thumbnail to the destination path
            $image->save($destination);
        } elseif ($type == 'video') {
            // Create a thumbnail for a video
            $ffmpeg = FFMpeg::create();
            $video = $ffmpeg->open($filePath);

            // Get the time position from the configuration for the thumbnail
            $seconds = config('optimizer.video.thumbnail.from_seconds');

            // Capture a frame from the video at the specified time position and save it as a thumbnail
            $video->frame(TimeCode::fromSeconds($seconds))->save($destination);
        } else {
            // Throw an exception if the file type is unsupported
            throw new \Exception("Unsupported type for thumbnail creation.");
        }

        // Return the destination path
        return $destination;
    }
}
