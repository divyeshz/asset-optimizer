<?php

namespace AssetOptimizer;

use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;

class VideoOptimizer
{
    public function optimize($filePath, $destination)
    {
        $ffmpeg = FFMpeg::create();
        $video = $ffmpeg->open($filePath);

        $width = config('optimizer.video.resize.width');
        $height = config('optimizer.video.resize.height');

        $video->filters()->resize(new Dimension($width, $height))->synchronize();
        $video->save(new X264(), $destination);

        return $destination;
    }
}
