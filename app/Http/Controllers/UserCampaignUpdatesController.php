<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCampaignUpdateRequest;
use App\Http\Requests\UpdateCampaignUpdateRequest;
use App\Models\CampaignUpdate;
use App\Repositories\CampaignUpdatesRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserCampaignUpdatesController extends AppBaseController
{
    /**
     * @var CampaignUpdatesRepository
     */
    public $campaignUpdatesRepo;

    /**
     * @param  CampaignUpdatesRepository  $campaignUpdatesRepository
     */
    public function __construct(CampaignUpdatesRepository $campaignUpdatesRepository)
    {
        $this->campaignUpdatesRepo = $campaignUpdatesRepository;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     *
     * @throws \Exception
     */
    public function index(Request $request)
    {
        return view('user.campaigns.campaign_updates.index');
    }

    /**
     * @param  Request  $request
     * @return mixed
     *
     * @throws ValidationException
     */
    public function store(CreateCampaignUpdateRequest $request)
    {
        $input = $request->all();

        $this->campaignUpdatesRepo->store($input);

        return $this->sendSuccess('Campaign updates saved successfully.');
    }

    /**
     * @param  CampaignUpdate  $campaignUpdate
     * @return mixed
     */
    public function edit(CampaignUpdate $campaignUpdate)
    {
        return $this->sendResponse($campaignUpdate, 'Campaign Updates retrieved successfully.');
    }

    /**
     * @param  Request  $request
     * @param  CampaignUpdate  $campaignUpdate
     * @return mixed
     *
     * @throws ValidationException
     */
    public function update(UpdateCampaignUpdateRequest $request, CampaignUpdate $campaignUpdate)
    {
        $input = $request->all();

        $this->campaignUpdatesRepo->update($input, $campaignUpdate->id);

        return $this->sendSuccess('Campaign updates updated successfully.');
    }

    /**
     * @param  CampaignUpdate  $campaignUpdate
     * @return mixed
     */
    public function show(CampaignUpdate $campaignUpdate)
    {
        return $this->sendResponse($campaignUpdate, 'Campaign update Retrieved Successfully.');
    }

    /**
     * @param  CampaignUpdate  $campaignUpdate
     * @return mixed
     */
    public function destroy(CampaignUpdate $campaignUpdate)
    {
        $campaignUpdate->delete();

        return $this->sendSuccess('Campaign updates deleted successfully.');
    }
}
