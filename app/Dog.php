<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * App\Dog
 *
 * @property int $id
 * @property string|null $description
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $birthdate
 * @property string $slug
 * @property string $gender
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $litter_id
 * @property int $menu
 * @property-read mixed $picture
 * @property-read \App\Litter|null $litter
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Dog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereLitterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Dog withoutTrashed()
 * @mixin \Eloquent
 */
class Dog extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'dogs';

    const GENDER_SELECT = [
        'm' => 'Male',
        'f' => 'Female',
    ];

    protected $dates = [
        'birthdate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'gender',
        'birthdate',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'litter_id',
        'menu',
        'picture_path'
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getPictureAttribute()
    {
        $files = $this->getMedia('picture');

        $files->each(function ($item) {
            $item->url = $item->getUrl();
        });

        return $files;
    }

    public function getBirthdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
    public function litter() {
        return $this->belongsTo(Litter::class, 'litter_id');
    }
}
