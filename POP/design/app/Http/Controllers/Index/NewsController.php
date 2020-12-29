<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Lib\Tdk;
use App\Models\Ad;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * 品牌活动
     *
     * @param Request $request
     * @param string $tab recent|review
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function brandActivities(Request $request, $tab = 'recent')
    {
        if ($request->ajax()) {
            $news = new News();
            $page = $request->input('page', 1);
            $pageSize = $request->input('page_size', 15);
            $offset = ($page - 1) * $pageSize;
            switch ($tab) {
                case 'review':
                    $activities = $news->brandActivitiesReview($offset, $pageSize);
                    break;
                case 'recent':
                default:
                    $activities = $news->brandActivitiesRecent($offset, $pageSize);
                    break;
            }
            return response()->json(['code' => 0, 'msg' => 'success', 'data' => $activities]);
        }

        switch ($tab) {
            case 'review':
                $tdk = Tdk::review();
                break;
            case 'recent':
            default:
                $tdk = Tdk::recent();
                break;
        }

        $ads = Ad::getAd(Ad::POSITION_BRAND_ACTIVITY_TOP);
        return view('index.brand_activities', [
            'ads' => $ads,
            'tdk' => $tdk,
        ]);
    }

    /**
     * 资讯和活动详情内容
     *
     * @param string $hashId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($hashId)
    {
        $id = News::isValidForHashId($hashId);

        $info = News::findOrFail($id);
        $tdk = [
            't' => $info->title,
            'd' => '设界是逸尚创展(POP时尚网络机构)从线上走到线下的众创互联空间项目，在时尚行业集群地如桐乡、盛泽、杭州、南通、广州、绍兴等地创办的面向时尚产业创造者们的联合办公+联合展示空间，以服务设计为切入口的时尚产业链接器及创研孵化加速器。',
            'k' => $info->title,
        ];

        return view('index.news_detail', [
            'info' => $info,
            'tdk' => $tdk,
        ]);
    }

    /**
     * 官方资讯
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function officialInformation(Request $request)
    {
        if ($request->ajax()) {
            $news = new News();
            $page = $request->input('page', 1);
            $pageSize = $request->input('page_size', 15);
            $offset = ($page - 1) * $pageSize;
            $info = $news->getNews($offset, $pageSize);
            return response()->json(['code' => 0, 'msg' => 'success', 'data' => $info]);
        }

        $ads = Ad::getAd(Ad::POSITION_NEWS_TOP);

        return view('index.office_info', [
            'ads' => $ads,
            'tdk' => Tdk::info(),
        ]);
    }
}
