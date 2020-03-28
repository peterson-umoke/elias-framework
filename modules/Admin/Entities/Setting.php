<?php

namespace Modules\Admin\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * Modules\Admin\Entities\Setting
 *
 * @method updateOrCreate(array $array, array $array1)
 * @method where(string $string, string $meta_key)
 * @property int $id
 * @property string $meta_key
 * @property string|null $meta_value
 * @property string $channel
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static Builder|Setting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMetaKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMetaValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static Builder|Setting withTrashed()
 * @method static Builder|Setting withoutTrashed()
 * @mixin Eloquent
 */
class Setting extends Model
{
    use SoftDeletes;

    protected $fillable = ["meta_key", "meta_value", "channel"];

    /**
     * get setting details
     *
     * @param string $meta_key
     * @return void
     */
    public function get_setting($meta_key, $channel = "")
    {
        if (!empty($channel)) {
            return $this->where("meta_key", $meta_key)
                    ->where("channel", $channel)
                    ->first() ?? null;
        }

        return $this->where("meta_key", $meta_key)->first() ?? null;
    }

    /**
     * get the setting value
     *
     * @param string $meta_key
     * @return string|void
     */
    public function get_setting_value($meta_key, $channel = "")
    {
        if (!empty($channel)) {
            return $this->where("meta_key", $meta_key)
                    ->where("channel", $channel)
                    ->first()->meta_value ?? null;
        }
        return $this->where("meta_key", $meta_key)->first()->meta_value ?? null;
    }

    /**
     * get setting details
     *
     * @param string $meta_key
     * @param $meta_value
     * @param string $channel
     * @return void
     */
    public function save_setting($meta_key, $meta_value, $channel = "all")
    {
        $this->updateOrCreate(
            [
                'meta_key' => $meta_key,
                'channel' => $channel,
            ],
            [
                "meta_key" => $meta_key,
                "meta_value" => $meta_value,
                "channel" => $channel,
            ]
        );
    }
}
