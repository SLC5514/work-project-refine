<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Lib\Tdk;
use App\Models\Ad;
use App\Models\News;

class HomeController extends Controller
{

    public function index()
    {
        $ads = Ad::getAd(Ad::POSITION_HOME_TOP);
        $news = new News();
        $activities = $news->belongsToDesignWorld();

        return view('index.home', [
            'ads' => $ads,
            'activities' => $activities,
            'tdk' => Tdk::index(),
        ]);
    }
}
