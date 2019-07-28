<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Litter
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $birthdate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $sire_id
 * @property int $dam_id
 * @property-read \App\Dog $dam
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Dog[] $puppies
 * @property-read \App\Dog $sire
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litter newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Litter onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litter query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litter whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litter whereDamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litter whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litter whereSireId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Litter withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Litter withoutTrashed()
 * @mixin \Eloquent
 */
class Litter extends Model
{
    use SoftDeletes;

    public $table = 'litters';

    protected $dates = [
        'birthdate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'dam_id',
        'sire_id',
        'birthdate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getBirthdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function sire()
    {
        return $this->belongsTo(Dog::class, 'sire_id');
    }

    public function dam()
    {
        return $this->belongsTo(Dog::class, 'dam_id');
    }

    public function puppies() {
        return $this->hasMany(Dog::class);
    }
}
