<?php

namespace AssetOptimizer;

use FFMpeg\FFMpeg;
use FFMpeg\Format\Audio\Mp3;

class AudioOptimizer
{
    public function optimize($filePath, $destination)
    {
        $ffmpeg = FFMpeg::create();
        $audio = $ffmpeg->open($filePath);

        $audio->save(new Mp3(), $destination);

        return $destination;
    }
}
