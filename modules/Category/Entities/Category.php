<?php

namespace Modules\Category\Entities;

use DB;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection as CollectionAlias;
use Modules\Core\Helpers\CreatedTimeStamp;
use Modules\Core\Helpers\QuickSlugs;
use Modules\Core\Sluggable\HasSlug;
use Modules\Media\Entities\Media;
use Modules\Post\Entities\Post;
use Modules\Product\Entities\Product;
use Modules\Video\Entities\Video;

/**
 * Modules\Category\Entities\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property string|null $description
 * @property string|null $seo_content
 * @property string|null $seo_title
 * @property int|null $admin_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Collection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Collection|Post[] $posts
 * @property-read int|null $posts_count
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 * @property-read Collection|Video[] $videos
 * @property-read int|null $videos_count
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereAdminId($value)
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDeletedAt($value)
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereSeoContent($value)
 * @method static Builder|Category whereSeoTitle($value)
 * @method static Builder|Category whereTitle($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin Eloquent
 * @property int|null $parent_id
 * @method static Builder|Category whereParentId($value)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|Category onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Category withoutTrashed()
 */
class Category extends Model
{
    use SoftDeletes, CreatedTimeStamp, HasSlug, QuickSlugs;

    protected $fillable = [
        "name",
        "title",
        "description",
        "admin_id",
        "seo_content",
        "seo_title",
        "parent_id",
    ];

    public function __construct(array $attributes = [])
    {
        $this->admin_id = current_admin()->id;

        parent::__construct($attributes);
    }

    /**
     * @return MorphToMany
     */
    public function posts()
    {
        return $this->morphedByMany('Modules\Post\Entities\Post', 'categoriesable');
    }

    /**
     * @return MorphToMany
     */
    public function videos()
    {
        return $this->morphedByMany('Modules\Video\Entities\Video', 'categoriesable');
    }

    /**
     * @return MorphToMany
     */
    public function products()
    {
        return $this->morphedByMany('Modules\Product\Entities\Product', 'categoriesable');
    }

    /**
     * @return MorphToMany
     */
    public function media()
    {
        return $this->morphedByMany('Modules\Media\Entities\Media', 'categoriesable');
    }

    /**
     * @param $model
     * @return \Illuminate\Database\Query\Builder
     */
    public function findRelatedCategories($model) {
        return DB::table("categories")
            ->join("categoriesables","categories.id","categoriesables.category_id")
            ->where("categoriesables.categoriesable_type","=",$model)
            ->select("categories.*");
    }
}
