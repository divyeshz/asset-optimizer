<?php

/**
 * Configuration for the AssetOptimizer package.
 *
 * This file contains settings for optimizing images, videos, and generating thumbnails.
 */

return [
    // Thumbnail configuration
    'thumbnail' => [
        // Default width for generated thumbnails
        'width' => 200,

        // Default height for generated thumbnails
        'height' => 200,
    ],

    // Image optimization configuration
    'image' => [
        // Quality setting for image optimization (1-100, higher is better quality)
        'optimization_quality' => 75,
    ],

    // Video optimization configuration
    'video' => [
        // Resize settings for video optimization
        'resize' => [
            // Width to resize videos to
            'width' => 640,

            // Height to resize videos to
            'height' => 480,
        ],

        // Thumbnail settings for video files
        'thumbnail' => [
            // Time position (in seconds) to capture thumbnail from video
            'from_seconds' => 2,
        ],
    ],
];
