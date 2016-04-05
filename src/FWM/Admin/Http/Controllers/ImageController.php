<?php namespace FWM\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use FWM\Admin\Http\Requests\ImageRequest;
use FWM\Admin\Repository\ImageRepository;

/**
 * Class ImageController
 * @package FWM\Admin\Http\Controllers
 */
class ImageController extends Controller
{
    protected $repository;

    /**
     * @param ImageRepository $repository
     */
    public function __construct(ImageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param ImageRequest $request
     * @return array
     */
    public function postUpload(ImageRequest $request)
    {
       return $this->repository->uploadToCloud($request->file('file'));
    }

}