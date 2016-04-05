<?php namespace FWM\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use FWM\Admin\Http\Requests\FileRequest;
use FWM\Admin\Repository\FileRepository;

/**
 * Class FileController
 * @package FWM\Admin\Http\Controllers
 */
class FileController extends Controller
{
    protected $repository;

    /**
     * @param FileRepository $repository
     */
    public function __construct(FileRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param FileRequest $request
     * @return array
     */
    public function postUpload(FileRequest $request)
    {
        return $this->repository->uploadToCloud($request->file('file'));
    }


}