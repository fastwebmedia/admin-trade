<?php namespace FWM\Admin\Repository;

use FWM\Admin\Helpers\ImageResizer;
use Illuminate\Contracts\Filesystem\Factory;

class ImageRepository extends BaseRepository
{
	protected $model;

	protected $resizer;

	protected $flysystem;

	/**
	 * @param Factory $flysystem
	 * @param ImageResizer $resizer
     */
	public function __construct(Factory $flysystem, ImageResizer $resizer)
	{
		$this->flysystem = $flysystem;
		$this->resizer= $resizer;
	}

	/**
	 * @param $uploadedFile
	 * @return string
	 */
	public function uploadToCloud($uploadedFile)
	{
		$filename = $this->createFileName($uploadedFile->getClientOriginalName());

		$targetPath = $this->createFilePath($filename);

		$this->flysystem->disk('s3')->put($targetPath, file_get_contents($uploadedFile));

		$imageUrl = config('admin.aws.uploadPath').$targetPath;

		$previewPath = $this->createResizedImages($imageUrl);

		return [
			'url'   => $previewPath,
			'value' => $imageUrl
		];
	}

	/**
	 * @param $filename
	 * @return string
     */
	public function createFileName($filename)
	{
		return time()."-".str_replace(" ", "", strtolower($filename));
	}

	/**
	 * @param $filename
	 * @return string
	 */
	public function createFilePath($filename)
	{
		$destinationFolder = "uploads/images/".date('Y')."/".date('m')."/";

		return $destinationFolder.$filename;
	}

	/**
	 * @param $imagePath
	 * @return bool
     */
	public function createResizedImages($imagePath)
	{
		return $this->resizer->createResized($imagePath);
	}

}