<?php

namespace AssetOptimizer;

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;

/**
 * Class VideoOptimizer
 *
 * This class provides functionality to optimize video files by resizing them and encoding in X264 format.
 */
class VideoOptimizer
{
    /**
     * Optimize a video file.
     *
     * This method uses the FFMpeg library to resize a video and encode it in X264 format.
     *
     * @param string $filePath The path to the video file to be optimized.
     * @param string $destination The destination path where the optimized video will be saved.
     * @return string Returns the destination path where the optimized video was saved.
     */
    public function optimize($filePath, $destination)
    {
        // Create an instance of FFMpeg
        $ffmpeg = FFMpeg::create();

        // Open the video file
        $video = $ffmpeg->open($filePath);

        // Get the desired width and height for resizing from the configuration
        $width = config('optimizer.video.resize.width');
        $height = config('optimizer.video.resize.height');

        // Resize the video to the specified dimensions and synchronize the streams
        $video->filters()->resize(new Dimension($width, $height))->synchronize();

        // Save the optimized video in X264 format to the destination path
        $video->save(new X264(), $destination);

        // Return the destination path
        return $destination;
    }
}
