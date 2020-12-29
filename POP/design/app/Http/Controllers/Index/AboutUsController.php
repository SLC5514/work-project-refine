<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Lib\Tdk;
use App\Models\Ad;
use Illuminate\Http\Request;

/**
 * Class AboutUsController
 * @package App\Http\Controllers\Index
 */
class AboutUsController extends Controller
{

    /**
     * @return Response
     */
    public function __invoke()
    {
        $ads = Ad::getAd(Ad::POSITION_ABOUT_US_TOP);

        return view('index.aboutus', [
            'ads' => $ads,
            'tdk' => Tdk::about(),
        ]);
    }
}
