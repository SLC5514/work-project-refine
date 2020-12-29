<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Lib\Tdk;

/**
 * 精英联盟
 * Class TalentAllianceController
 * @package App\Http\Controllers\Index
 */
class TalentAllianceController extends Controller
{
    public function __invoke()
    {
        return view('index.talent_alliance', [
            'tdk' => Tdk::talent(),
        ]);
    }
}
