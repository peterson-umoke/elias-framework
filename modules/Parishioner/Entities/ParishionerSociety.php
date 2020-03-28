<?php

namespace Modules\Parishioner\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Modules\Core\Helpers\CreatedTimeStamp;

/**
 * Modules\Parishioner\Entities\ParishionerSociety
 *
 * @property int $id
 * @property string|null $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Parishioner $parishioner
 * @method static Builder|ParishionerSociety newModelQuery()
 * @method static Builder|ParishionerSociety newQuery()
 * @method static Builder|ParishionerSociety query()
 * @method static Builder|ParishionerSociety whereCreatedAt($value)
 * @method static Builder|ParishionerSociety whereDeletedAt($value)
 * @method static Builder|ParishionerSociety whereId($value)
 * @method static Builder|ParishionerSociety whereTitle($value)
 * @method static Builder|ParishionerSociety whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ParishionerSociety extends Model
{
    use CreatedTimeStamp;

    protected $guarded = [];

    protected $table = "parishioner_societies";

    /**
     * @return HasOne
     */
    public function parishioner()
    {
        return $this->hasOne(Parishioner::class);
    }
}
