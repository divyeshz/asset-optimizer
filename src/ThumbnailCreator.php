<?php

namespace AssetOptimizer;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;

class ThumbnailCreator
{
    protected $manager;

    public function __construct()
    {
        // create image manager with desired driver
        $this->manager = new ImageManager(new Driver());
    }

    public function create($filePath, $destination, $type = 'image')
    {
        if ($type == 'image') {
            $image = $this->manager->read($filePath);

            $width = config('optimizer.thumbnail.width');
            $height = config('optimizer.thumbnail.height');

            $image->resize($width, $height);
            $image->save($destination);
        } elseif ($type == 'video') {
            $ffmpeg = FFMpeg::create();
            $video = $ffmpeg->open($filePath);

            $seconds = config('optimizer.video.thumbnail.from_seconds');

            $video->frame(TimeCode::fromSeconds($seconds))->save($destination);
        } else {
            throw new \Exception("Unsupported type for thumbnail creation.");
        }

        return $destination;
    }
}
