<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rtf
 *
 * @property int $id
 * @property int $news_id 关联表主键ID
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\News $news
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rtf newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rtf newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rtf query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rtf whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rtf whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rtf whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rtf whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rtf whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rtf extends Model
{
    protected $fillable = ['content'];
    
    public function news(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
