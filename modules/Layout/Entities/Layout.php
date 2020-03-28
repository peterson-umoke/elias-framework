<?php

namespace Modules\Layout\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Modules\Layout\Entities\Layout
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Layout newModelQuery()
 * @method static Builder|Layout newQuery()
 * @method static Builder|Layout query()
 * @method static Builder|Layout whereCreatedAt($value)
 * @method static Builder|Layout whereId($value)
 * @method static Builder|Layout whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Layout extends Model
{
    protected $fillable = ["title","name","content"];
}
