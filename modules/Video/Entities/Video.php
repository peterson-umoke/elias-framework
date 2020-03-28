<?php

namespace Modules\Video\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Modules\Category\Entities\Category;
use Modules\Core\Helpers\CreatedTimeStamp;
use Modules\Media\Entities\Media;

/**
 * Modules\Video\Entities\Video
 *
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read string $created_at
 * @property-read Collection|Media[] $media
 * @property-read int|null $media_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Video newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video newQuery()
 * @method static Builder|Video onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Video query()
 * @method static bool|null restore()
 * @method static Builder|Video withTrashed()
 * @method static Builder|Video withoutTrashed()
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Comments\Entities\Comment[] $comments
 * @property-read int|null $comments_count
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property string|null $content
 * @property string|null $summary
 * @property string|null $price
 * @property string|null $sale_price
 * @property \Illuminate\Support\Carbon|null $sale_price_datetime_start
 * @property \Illuminate\Support\Carbon|null $sale_price_datetime_end
 * @property string $video_type
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereSalePriceDatetimeEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereSalePriceDatetimeStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Video\Entities\Video whereVideoType($value)
 */
class Video extends Model
{
    use SoftDeletes, CreatedTimeStamp;

    protected $fillable = [
        "name",
        "title",
        "content",
        "summary",
        "price",
        "sale_price",
        "sale_price_datetime_start",
        "sale_price_datetime_end",
        'seo_title',
        'seo_content',
        'seo_keyword',
        'product_type',
        'admin_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'sale_price_datetime_end' => 'datetime',
        'sale_price_datetime_start' => 'datetime',
    ];

    public function __construct(array $attributes = [])
    {
        $this->admin_id = current_admin()->id;

        parent::__construct($attributes);
    }

    /**
     * @return MorphMany
     */
    public function categories()
    {
        return $this->morphMany('Modules\Category\Entities\Category', 'categoriesable');
    }

    /**
     * @return MorphMany
     */
    public function media()
    {
        return $this->morphMany('Modules\Media\Entities\Media', 'mediaable');
    }


    /**
     * @return MorphMany
     */
    public function comments()
    {
        return $this->morphMany('Modules\Comments\Entities\Comment', 'commentable');
    }
}
