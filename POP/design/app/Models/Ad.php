<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Ad
 *
 * @property int $id
 * @property int $position 广告位置:1.首页顶部广告 2.品牌活动顶部广告 3.官方资讯顶部广告 4.关于设界顶部广告
 * @property int $weight 广告权重
 * @property string $title 标题
 * @property string $subtitle 副标题
 * @property string $description 描述
 * @property string $link 链接
 * @property string $up_line_at 上线时间
 * @property string|null $down_line_at 下线时间
 * @property string $img_src 广告图上传地址
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ad onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereDownLineAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereImgSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereUpLineAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ad withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ad withoutTrashed()
 * @mixin \Eloquent
 */
class Ad extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    /**
     * 首页顶部广告
     * @var integer
     */
    public const POSITION_HOME_TOP = 1;

    /**
     * 品牌活动顶部广告
     * @var integer
     */
    public const POSITION_BRAND_ACTIVITY_TOP = 2;

    /**
     * 官方资讯顶部广告
     * @var integer
     */
    public const POSITION_NEWS_TOP = 3;

    /**
     * 关于设界顶部广告
     * @var integer
     */
    public const POSITION_ABOUT_US_TOP = 4;


    /**
     * 只包含在有效期范围内的查询作用域
     *
     * @param $query \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        $now = Carbon::now();
        return $query->where('up_line_at', '<', $now)->where(function ($query) use ($now) {
            $query->where('down_line_at', '>', $now)->orWhereNull('down_line_at');
        });
    }

    /**
     * @param $position
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAd($position, $limit = 8)
    {
        $fields = ['title','subtitle','description','link','img_src',];
        return self::active()->where('position', $position)
            ->orderByDesc('weight')->orderByDesc('id')->limit($limit)->get($fields);
    }

}
