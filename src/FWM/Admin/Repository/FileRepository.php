<?php namespace FWM\Admin\Repository;

class FileRepository extends ImageRepository
{
	/**
	 * @param $filename
	 * @return string
	 */
	public function createFilePath($filename)
	{
		$destinationFolder = "uploads/files/".date('Y')."/".date('m')."/";

		return $destinationFolder.$filename;
	}

	/**
	 * @param $uploadedFile
	 * @return array
     */
	public function uploadToCloud($uploadedFile)
	{
		$filename = $this->createFileName($uploadedFile->getClientOriginalName());

		$targetPath = $this->createFilePath($filename);

		$params = [
			'params' => [
				'ContentDisposition' => 'attachment'
			]
		];

		$this->flysystem->disk('s3')->put($targetPath, file_get_contents($uploadedFile), $params);

		$fileUrl = config('admin.aws.uploadPath').$targetPath;

		return [
			'url'   => $fileUrl,
			'value' => $fileUrl
		];


	}

}