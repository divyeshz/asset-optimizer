# Asset Optimizer

A PHP library for optimizing images, videos, and audio, with thumbnail creation and storage features. This library is designed to work seamlessly with Laravel and other PHP frameworks.

## Features

- Optimize images with custom quality settings
- Optimize videos and resize them
- Optimize audio files
- Create thumbnails for images and videos

## Installation

You can install this package via Composer.

1. Require the package:

    ```sh
    composer require divyeshz/asset-optimizer
    ```

2. Publish the configuration file:

    ```sh
    php artisan vendor:publish --provider="AssetOptimizer\AssetOptimizerServiceProvider"
    ```

## Usage

### Image Optimization

```php
use AssetOptimizer\AssetOptimizer;

$assetOptimizer = new AssetOptimizer();
$assetOptimizer->optimizeImage('/path/to/your/image.jpg', '/path/to/your/destination/image.jpg');
