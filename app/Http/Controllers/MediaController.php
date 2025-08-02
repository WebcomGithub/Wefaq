<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\CreateMediaRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\Brand;
use App\Models\MedieSection;
use App\Repositories\BrandRepository;
use App\Repositories\MediaRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaController extends AppBaseController
{
    /**
     * @var MediaRepository
     */
    public MediaRepository $brandRepo;

    /**
     * @param  MediaRepository  $brandRepository
     */
    public function __construct(MediaRepository $brandRepository)
    {
        $this->brandRepo = $brandRepository;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     *
     * @throws Exception
     */
    public function index()
    {
        return view('admin.media_section.index');
    }

    /**
     * @param  CreateMediaRequest  $request
     * @return JsonResponse
     */
    public function store(CreateMediaRequest $request)
    {
        $input = $request->all();
        $this->brandRepo->store($input);

        return $this->sendSuccess('Brand saved successfully.');
    }

    /**
     * @param  MedieSection  $media
     * @return JsonResponse
     */
    public function edit(MedieSection $media , $id)
    {
        $media_section = MedieSection::find($id);
        return $this->sendResponse($media_section, 'Brand retrieved successfully.');
    }

    /**
     * @param  UpdateMediaRequest  $request
     * @param  MedieSection  $medie_section
     * @return JsonResponse
     */
    public function update(Request $request, MedieSection $medie_section)
    {

        $input = $request->all();
        $this->brandRepo->update($input, $medie_section->id);

        return $this->sendSuccess('Brand updated successfully.');
    }

    /**
     * @param  MedieSection  $medie_section
     * @return JsonResponse
     */
    public function destroy(MedieSection $medie_section , $id)
    {
        $media_section = MedieSection::find($id);

        $media_section->delete();

        return $this->sendSuccess('Media Deleted successfully.');
    }
}
