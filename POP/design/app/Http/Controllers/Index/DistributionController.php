<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Lib\Tdk;
use App\Models\News;
use http\Exception\UnexpectedValueException;

/**
 * 设界分布
 *
 * Class DistributionController
 * @package App\Http\Controllers\Index
 */
class DistributionController extends Controller
{
    protected $belongs = [
        'shengze' => News::BELONGS_TO_SHENGZE,// 盛泽
        'tongxiang' => News::BELONGS_TO_TONGXIANG,// 桐乡
        'guangzhou' => News::BELONGS_TO_GUANGZHOU,// 广州
        'nantong' => News::BELONGS_TO_NANTONG,// 南通
        'shaoxing' => News::BELONGS_TO_SHAOXING,// 绍兴
    ];

    public function index()
    {
        return view('index.design_world_distribution', [
            'tdk' => Tdk::design(),
        ]);
    }

    /**
     * @param $name string 设界名称
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($name)
    {
        $news = new News();

        if (!isset($this->belongs[$name])) {
            throw new \UnexpectedValueException('aa');
        }

        $name = strtolower($name);
        $activities = $news->belongsToDesignWorld($this->belongs[$name]);

        switch ($name) {
            case 'shengze':
                $tdk = Tdk::shengze();
                break;
            case 'tongxiang':
                $tdk = Tdk::tongxiang();
                break;
            case 'guangzhou':
                $tdk = Tdk::guangzhou();
                break;
            case 'nantong':
                $tdk = Tdk::nantong();
                break;
            case 'shaoxing':
                $tdk = Tdk::shaoxing();
                break;
            default:
                $tdk = [];
                break;
        }

        return view('index.design_world_detail', [
            'name' => $name,
            'activities' => $activities,
            'tdk' => $tdk,
        ]);
    }
}
