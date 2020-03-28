<?php

namespace Modules\Page\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Modules\Core\Helpers\CreatedTimeStamp;
use Modules\Core\Helpers\QuickSlugs;
use Modules\Core\Sluggable\HasSlug;

/**
 * Modules\Page\Entities\Page
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string|null $content
 * @property string|null $seo_content
 * @property string|null $seo_title
 * @property int|null $admin_id
 * @property Carbon|null $deleted_at
 * @property string $created_at
 * @property Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static Builder|Page onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSeoContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static Builder|Page withTrashed()
 * @method static Builder|Page withoutTrashed()
 * @mixin Eloquent
 */
class Page extends Model
{
    use SoftDeletes, CreatedTimeStamp, HasSlug, QuickSlugs;

    protected $fillable = [
        "name",
        "title",
        "content",
        "seo_title",
        "seo_content",
        "seo_keywords",
        'admin_id',
    ];

    public function __construct(array $attributes = [])
    {
        $this->admin_id = current_admin()->id;

        parent::__construct($attributes);
    }
}
