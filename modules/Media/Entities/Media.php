<?php

namespace Modules\Media\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder as BuilderAlias;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Modules\Core\Helpers\CreatedTimeStamp;
use Modules\Core\Helpers\QuickSlugs;
use Modules\Core\Sluggable\HasSlug;

/**
 * Modules\Media\Entities\Media
 *
 * @property int $id
 * @property string $file
 * @property string $name
 * @property string|null $title
 * @property string|null $description
 * @property string|null $seo_title
 * @property string|null $seo_content
 * @property string|null $type
 * @property string $mediaable_id
 * @property string $mediaable_type
 * @property Carbon|null $deleted_at
 * @property string $created_at
 * @property Carbon|null $updated_at
 * @property-read Model|Eloquent $mediaable
 * @method static bool|null forceDelete()
 * @method static BuilderAlias|Media newModelQuery()
 * @method static BuilderAlias|Media newQuery()
 * @method static Builder|Media onlyTrashed()
 * @method static BuilderAlias|Media query()
 * @method static bool|null restore()
 * @method static BuilderAlias|Media whereCreatedAt($value)
 * @method static BuilderAlias|Media whereDeletedAt($value)
 * @method static BuilderAlias|Media whereDescription($value)
 * @method static BuilderAlias|Media whereFile($value)
 * @method static BuilderAlias|Media whereId($value)
 * @method static BuilderAlias|Media whereMediaableId($value)
 * @method static BuilderAlias|Media whereMediaableType($value)
 * @method static BuilderAlias|Media whereName($value)
 * @method static BuilderAlias|Media whereSeoContent($value)
 * @method static BuilderAlias|Media whereSeoTitle($value)
 * @method static BuilderAlias|Media whereTitle($value)
 * @method static BuilderAlias|Media whereType($value)
 * @method static BuilderAlias|Media whereUpdatedAt($value)
 * @method static Builder|Media withTrashed()
 * @method static Builder|Media withoutTrashed()
 * @mixin Eloquent
 * @property int $is_private
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Media\Entities\Media whereIsPrivate($value)
 */
class Media extends Model
{
    use SoftDeletes, CreatedTimeStamp,QuickSlugs, HasSlug;

    protected $table = "medias";

    protected $fillable = [
        "file",
        "name",
        "title",
        "description",
        "seo_title",
        "seo_content",
        "mediaable_id",
        "mediaable_type",
        "is_private",
    ];

    public function mediaable()
    {
        return $this->morphTo();
    }
}
