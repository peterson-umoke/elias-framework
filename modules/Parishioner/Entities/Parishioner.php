<?php

namespace Modules\Parishioner\Entities;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;
use Modules\Core\Helpers\CreatedTimeStamp;
use Modules\Media\Entities\Media;

/**
 * Modules\Parishioner\Entities\Parishioner
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $title
 * @property string|null $surname
 * @property string|null $address
 * @property string|null $email
 * @property string|null $telephone_number
 * @property string|null $whatsapp_number
 * @property string $gender
 * @property string|null $marital_status
 * @property string|null $small_christian_community
 * @property string|null $date_of_birth
 * @property string|null $state
 * @property string|null $town
 * @property string|null $village
 * @property string $parishioner_status
 * @property string|null $occupation
 * @property int|null $are_you_baptised
 * @property string|null $baptized_name_parish
 * @property string|null $baptized_state_town
 * @property string|null $baptized_date
 * @property int|null $are_you_communicant
 * @property string|null $communicant_parish_name
 * @property string|null $communicant_parish_town
 * @property string|null $communicant_date
 * @property int|null $are_you_confirmed
 * @property string|null $confirmed_parish_name
 * @property string|null $confirmed_parish_state_town
 * @property string|null $confirmed_date
 * @property int|null $are_you_married
 * @property string|null $married_parish_name
 * @property string|null $married_parish_state_town
 * @property string|null $married_date
 * @property string $statutory_organisation
 * @property int|null $are_you_society_member
 * @property string|null $sunday_mass_attend
 * @property int|null $registration_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Media $media
 * @property-read Collection|ParishionerSociety[] $societies
 * @property-read int|null $societies_count
 * @method static Builder|Parishioner newModelQuery()
 * @method static Builder|Parishioner newQuery()
 * @method static Builder|Parishioner query()
 * @method static Builder|Parishioner whereAddress($value)
 * @method static Builder|Parishioner whereAreYouBaptised($value)
 * @method static Builder|Parishioner whereAreYouCommunicant($value)
 * @method static Builder|Parishioner whereAreYouConfirmed($value)
 * @method static Builder|Parishioner whereAreYouMarried($value)
 * @method static Builder|Parishioner whereAreYouSocietyMember($value)
 * @method static Builder|Parishioner whereBaptizedDate($value)
 * @method static Builder|Parishioner whereBaptizedNameParish($value)
 * @method static Builder|Parishioner whereBaptizedStateTown($value)
 * @method static Builder|Parishioner whereCommunicantDate($value)
 * @method static Builder|Parishioner whereCommunicantParishName($value)
 * @method static Builder|Parishioner whereCommunicantParishTown($value)
 * @method static Builder|Parishioner whereConfirmedDate($value)
 * @method static Builder|Parishioner whereConfirmedParishName($value)
 * @method static Builder|Parishioner whereConfirmedParishStateTown($value)
 * @method static Builder|Parishioner whereCreatedAt($value)
 * @method static Builder|Parishioner whereDateOfBirth($value)
 * @method static Builder|Parishioner whereDeletedAt($value)
 * @method static Builder|Parishioner whereEmail($value)
 * @method static Builder|Parishioner whereFirstName($value)
 * @method static Builder|Parishioner whereGender($value)
 * @method static Builder|Parishioner whereId($value)
 * @method static Builder|Parishioner whereLastName($value)
 * @method static Builder|Parishioner whereMaritalStatus($value)
 * @method static Builder|Parishioner whereMarriedDate($value)
 * @method static Builder|Parishioner whereMarriedParishName($value)
 * @method static Builder|Parishioner whereMarriedParishStateTown($value)
 * @method static Builder|Parishioner whereOccupation($value)
 * @method static Builder|Parishioner whereParishionerStatus($value)
 * @method static Builder|Parishioner whereRegistrationNumber($value)
 * @method static Builder|Parishioner whereSmallChristianCommunity($value)
 * @method static Builder|Parishioner whereState($value)
 * @method static Builder|Parishioner whereStatutoryOrganisation($value)
 * @method static Builder|Parishioner whereSundayMassAttend($value)
 * @method static Builder|Parishioner whereSurname($value)
 * @method static Builder|Parishioner whereTelephoneNumber($value)
 * @method static Builder|Parishioner whereTitle($value)
 * @method static Builder|Parishioner whereTown($value)
 * @method static Builder|Parishioner whereUpdatedAt($value)
 * @method static Builder|Parishioner whereVillage($value)
 * @method static Builder|Parishioner whereWhatsappNumber($value)
 * @mixin Eloquent
 * @property string|null $are_you_baptized
 * @property string|null $baptized_parish_name
 * @property string|null $baptized_parish_state_town
 * @property string|null $communicant_parish_state_town
 * @property string|null $profile_picture
 * @property string $organisation_1
 * @property string $organisation_2
 * @property string $organisation_3
 * @property string $organisation_4
 * @property string $organisation_5
 * @property-read mixed $full_name
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Parishioner\Entities\Parishioner whereAreYouBaptized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Parishioner\Entities\Parishioner whereBaptizedParishName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Parishioner\Entities\Parishioner whereBaptizedParishStateTown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Parishioner\Entities\Parishioner whereCommunicantParishStateTown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Parishioner\Entities\Parishioner whereOrganisation1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Parishioner\Entities\Parishioner whereOrganisation2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Parishioner\Entities\Parishioner whereOrganisation3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Parishioner\Entities\Parishioner whereOrganisation4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Parishioner\Entities\Parishioner whereOrganisation5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Parishioner\Entities\Parishioner whereProfilePicture($value)
 * @property string $statutory_organization
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Parishioner\Entities\Parishioner whereStatutoryOrganization($value)
 */
class Parishioner extends Model
{
    use CreatedTimeStamp;

    protected $guarded = [];

    protected $table = "parishioners";


    protected $casts = [
        'date_of_birth' => 'datetime',
        'baptized_date' => 'datetime',
        'communicant_date' => 'datetime',
        'confirmed_date' => 'datetime',
        'married_date' => 'datetime',
    ];

    /**
     * @return MorphOne
     */
    public function media()
    {
        return $this->morphOne(Media::class, "mediaable");
    }

    /**
     * @return HasMany
     */
    public function societies()
    {
        return $this->hasMany(ParishionerSociety::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->title} {$this->surname} {$this->first_name} {$this->last_name}";
    }
}
