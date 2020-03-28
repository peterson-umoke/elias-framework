<?php

namespace Modules\Post\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as BuilderAlias;
use Illuminate\Support\Carbon;
use Modules\Category\Entities\Category;
use Modules\Comments\Entities\Comment;
use Modules\Core\Helpers\CreatedTimeStamp;
use Modules\Core\Helpers\QuickSlugs;
use Modules\Core\Sluggable\HasSlug;
use Modules\Media\Entities\Media;

/**
 * Modules\Post\Entities\Post
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string|null $content
 * @property string|null $seo_content
 * @property string|null $seo_title
 * @property boolean $is_private
 * @property int|null $admin_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read Media $media
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereAdminId($value)
 * @method static Builder|Post whereContent($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereDeletedAt($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post whereIsPrivate($value)
 * @method static Builder|Post whereName($value)
 * @method static Builder|Post whereSeoContent($value)
 * @method static Builder|Post whereSeoTitle($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @mixin Eloquent
 * @method static bool|null forceDelete()
 * @method static BuilderAlias|Post onlyTrashed()
 * @method static bool|null restore()
 * @method static BuilderAlias|Post withTrashed()
 * @method static BuilderAlias|Post withoutTrashed()
 * @property-read Collection|Comment[] $comments
 * @property-read int|null $comments_count
 */
class Post extends Model
{
    use SoftDeletes, CreatedTimeStamp, HasSlug, QuickSlugs;

    protected $table = "posts";

    protected $fillable = [
        'name',
        'title',
        'content',
        'seo_title',
        'seo_content',
        'admin_id',
        "is_private",
    ];

    public function __construct(array $attributes = [])
    {
        $this->admin_id = current_admin()->id;

        parent::__construct($attributes);
    }

    /**
     * @return MorphToMany
     */
    public function categories()
    {
        return $this->morphToMany('Modules\Category\Entities\Category', 'categoriesable');
    }

    /**
     * @return MorphOne
     */
    public function media()
    {
        return $this->morphOne('Modules\Media\Entities\Media', 'mediaable');
    }

    /**
     * @return MorphMany
     */
    public function comments()
    {
        return $this->morphMany('Modules\Comments\Entities\Comment', 'commentable');
    }
}
