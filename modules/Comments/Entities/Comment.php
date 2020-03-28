<?php

namespace Modules\Comments\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Modules\Core\Helpers\CreatedTimeStamp;

/**
 * Modules\Comments\Entities\Comment
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $title
 * @property string|null $commentable_id
 * @property string|null $commentable_type
 * @property string $content
 * @property int $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Comment newModelQuery()
 * @method static Builder|Comment newQuery()
 * @method static Builder|Comment query()
 * @method static Builder|Comment whereCommentableId($value)
 * @method static Builder|Comment whereCommentableType($value)
 * @method static Builder|Comment whereContent($value)
 * @method static Builder|Comment whereCreatedAt($value)
 * @method static Builder|Comment whereId($value)
 * @method static Builder|Comment whereName($value)
 * @method static Builder|Comment whereParentId($value)
 * @method static Builder|Comment whereTitle($value)
 * @method static Builder|Comment whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \Modules\Post\Entities\Post $post
 * @property-read \Modules\Product\Entities\Product $product
 * @property-read \Modules\Video\Entities\Video $video
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Comments\Entities\Comment onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Comments\Entities\Comment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\Comments\Entities\Comment withoutTrashed()
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Comments\Entities\Comment whereDeletedAt($value)
 */
class Comment extends Model
{
    use SoftDeletes, CreatedTimeStamp;

    protected $fillable = ["name", "title", "content", "commentable_id", "commentable_type","parent_id"];

    public function product()
    {
        return $this->morphOne("Modules\Product\Entities\Product", "commentable");
    }

    public function post()
    {
        return $this->morphOne("Modules\Post\Entities\Post", "commentable");
    }

    public function video()
    {
        return $this->morphOne("Modules\Video\Entities\Video", "commentable");
    }
}
