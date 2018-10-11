<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Species
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Species whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Species whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Species whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Species whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sample[] $samples
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Species[] $datasets
 * @property string $genus
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Species whereGenus($value)
 * @property string $species
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Species whereSpecies($value)
 * @property int|null $user_id
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Species whereUserId($value)
 */
class Species extends Model
{
    protected $table = 'species';

    protected $fillable = ['genus', 'species'];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->genus . ' ' . $this->species;
    }

    public function samples()
    {
        return $this->hasMany(Sample::class);
    }

    public function datasets()
    {
        return $this->belongsToMany(Species::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
