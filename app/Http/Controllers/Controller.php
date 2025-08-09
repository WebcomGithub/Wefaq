<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Campaign;
use App\Models\CampaignCategory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // Share categories with all views
        $this->shareCampaignsCategories();
    }

    protected function shareCampaignsCategories()
    {
        $this->campaignsCategories = CampaignCategory::withCount([
            'campaigns' => function ($q) {
                $q->where('status', '=', Campaign::STATUS_ACTIVE);
            },
        ])->get();

        // Make it available to all views
        view()->share('campaignsCategories', $this->campaignsCategories);
    }
}
