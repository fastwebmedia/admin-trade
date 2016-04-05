<?php namespace FWM\Admin\Helpers;

use Illuminate\Contracts\Filesystem\Factory;

class ImageResizer
{
    protected $sizes = [
        'thumb'  => ['width' => 120, 'height' => 90],
        'small'  => ['width' => 240, 'height' => 180],
        'medium' => ['width' => 480, 'height' => 360],
        'large'  => ['width' => 720, 'height' => 540],
        'xlarge' => ['width' => 960, 'height' => 720],
    ];

    protected $uploader;

    public function __construct(Factory $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * Create resized versions of the S3 hosted image
     *
     * @return bool
     */
    public function createResized($imagePath)
    {
        $pathBits = parse_url($imagePath);

        sleep(1);

        foreach ($this->sizes as $size => $dimensions) {

            $resizedKey = $this->prependImageSizeBeforeFilename($imagePath, $size, $pathBits);

            $resizedImage = $this->resizeImage($imagePath, $dimensions['width']);

            $this->uploader->disk('s3')->put($resizedKey, (string) $resizedImage);
        }


        // Preview Image Size
        return config('admin.aws.uploadPath') . $this->prependImageSizeBeforeFilename($imagePath, 'small', $pathBits, false);
    }

    /**
     * Resize an image to given dimensions
     *
     * @param  int    $width
     * @param  int    $height
     * @return Object Image
     */
    public function resizeImage($imagePath, $width, $height = null)
    {
        return \Image::make(trim($imagePath))->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->encode();
    }

    /**
     * @param $imagePath
     * @param $size
     * @param $pathBits
     * @return mixed
     */
    protected function prependImageSizeBeforeFilename($imagePath, $size, $pathBits, $prefixSlash=true)
    {
        $path = str_replace(basename($imagePath), $size.'/'.basename($imagePath), $pathBits['path']);

        if( $prefixSlash ) {
            return $path;
        } else {
            return ltrim($path, '/');
        }
    }
}
