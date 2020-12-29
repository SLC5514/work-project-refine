<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\News
 *
 * @property int $id
 * @property int $type 分类： 1、活动，2、资讯
 * @property string $title 活动标题
 * @property string $up_line_at 上线时间
 * @property string|null $down_line_at 下线时间
 * @property string $img_src 封面图
 * @property string $qr_code_title 二维码标题
 * @property string $qr_code_images 二维码图片地址
 * @property int $activity_type 活动标签： 1、设界官方，2、非设界官方
 * @property int $design_world 所属设界： 1、盛泽，2、桐乡，3、广州，4、南通，5、绍兴，6、上海，7、杭州，8、西塘
 * @property string $venue 活动地点
 * @property string|null $begin_at 生效时间
 * @property string|null $end_at 过期时间
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Rtf|null $content
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereActivityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereBeginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereDesignWorld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereDownLineAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereImgSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereQrCodeImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereQrCodeTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereUpLineAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereVenue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $detail_link
 * @property-read mixed $hash_id
 */
class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';
    protected $guarded = ['id'];
    protected $appends = ['detail_link', 'activity_type_text'];

    public const TYPE_ACTIVITY = 1;
    public const TYPE_NEWS = 2;

    public const BELONGS_TO_SHENGZE = 1;
    public const BELONGS_TO_TONGXIANG = 2;
    public const BELONGS_TO_GUANGZHOU = 3;
    public const BELONGS_TO_NANTONG = 4;
    public const BELONGS_TO_SHAOXING = 5;
    public const BELONGS_TO_SHANGHAI = 6;
    public const BELONGS_TO_HANGZHOU = 7;
    public const BELONGS_TO_XITANG = 8;

    public function content(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Rtf::class, 'news_id');
    }

    /**
     * 只包含在有效期范围内的查询作用域
     *
     * @param $query \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query): \Illuminate\Database\Eloquent\Builder
    {
        $now = Carbon::now();
        return $query->where('up_line_at', '<', $now)->where(function ($query) use ($now) {
            $query->where('down_line_at', '>', $now)->orWhereNull('down_line_at');
        });
    }


    /**
     * 品牌活动列表 即将开始
     *
     * @param int $offset
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function brandActivitiesRecent($offset = 0, $limit = 15)
    {
        $fields = ['id', 'type', 'title', 'begin_at', 'img_src', 'venue', 'activity_type'];
        return self::active()->whereType(self::TYPE_ACTIVITY)->where('end_at', '>', Carbon::now())
            ->orderByDesc('up_line_at')->offset($offset)->limit($limit)->get($fields);
    }

    /**
     * 品牌活动列表 活动回顾
     *
     * @param int $offset
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function brandActivitiesReview($offset = 0, $limit = 15)
    {
        $fields = ['id', 'type', 'title', 'begin_at', 'img_src', 'venue', 'activity_type'];
        return self::active()->whereType(self::TYPE_ACTIVITY)->where('end_at', '<', Carbon::now())
            ->orderByDesc('end_at')->offset($offset)->limit($limit)->get($fields);
    }

    /**
     * 各设界详情，获取对应设界相关联的活动信息
     *
     * @param $designWorld
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function belongsToDesignWorld($designWorld = 0, $limit = 3)
    {
        $query = self::active()->whereType(self::TYPE_ACTIVITY);
        if ($designWorld) {
            $query->whereDesignWorld($designWorld);
        }
        $fields = ['id', 'type', 'title', 'img_src', 'begin_at', 'venue', 'activity_type'];
        return $query->orderByDesc('up_line_at')->limit($limit)->get($fields);
    }

    /**
     * 1、设界官方，2、非设界官方
     */
    public function getActivityTypeTextAttribute(): string
    {
        if ($this->type !== self::TYPE_ACTIVITY) {
            return '';
        }

        switch ($this->activity_type) {
            case 1:
                $text = '设界官方';
                break;
            case 2:
                $text = '非设界官方';
                break;
            default:
                $text = '';
                break;
        }
        return $text;
    }

    /**
     * 详情连接的访问器
     * 返回对应活动或咨询的详情URL地址
     *
     * @return string
     */
    public function getDetailLinkAttribute(): string
    {
        $url = '/';
        switch ($this->type) {
            case self::TYPE_ACTIVITY:
                $url = route('activity.show', ['hashId' => $this->hash_id]);
                break;
            case self::TYPE_NEWS:
                $url = route('info.show', ['hashId' => $this->hash_id]);
                break;
        }
        return $url;
    }

    /**
     * 对id进行混淆，以免用户随意猜测
     *
     * @return mixed
     */
    public function getHashIdAttribute()
    {
        if (!$this->id) {
            return hashid_encode(0);
        }
        return hashid_encode($this->id);
    }

    /**
     * 检查详情连接id是否有效
     *
     * @param $hashId
     * @return bool|mixed
     */
    public static function isValidForHashId($hashId)
    {
        $id = hashid_decode($hashId);
        if (!$id) {
            throw new ModelNotFoundException('非法参数');
        }
        return $id;
    }

    public function getNews($offset = 0, $limit = 15)
    {
        $fields = ['id', 'type', 'title', 'description', 'up_line_at', 'img_src'];
        return self::active()->whereType(self::TYPE_NEWS)
            ->orderByDesc('up_line_at')->orderByDesc('id')->offset($offset)->limit($limit)->get($fields);
    }
}
