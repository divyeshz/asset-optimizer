<?php

namespace AssetOptimizer;

use FFMpeg\FFMpeg;
use FFMpeg\Format\Audio\Mp3;

/**
 * Class AudioOptimizer
 *
 * This class provides functionality to optimize audio files by converting them to MP3 format.
 */
class AudioOptimizer
{
    /**
     * Optimize an audio file.
     *
     * This method uses the FFMpeg library to convert an audio file to MP3 format.
     *
     * @param string $filePath The path to the audio file to be optimized.
     * @param string $destination The destination path where the optimized audio file will be saved.
     * @return string Returns the destination path where the optimized audio file was saved.
     */
    public function optimize($filePath, $destination)
    {
        // Create an instance of FFMpeg
        $ffmpeg = FFMpeg::create();

        // Open the audio file
        $audio = $ffmpeg->open($filePath);

        // Save the audio file in MP3 format to the destination path
        $audio->save(new Mp3(), $destination);

        // Return the destination path
        return $destination;
    }
}
