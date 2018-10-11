<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Sample
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $species_id
 * @property string $filename
 * @property string $path
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sample whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sample whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sample whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sample wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sample whereSpeciesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sample whereUpdatedAt($value)
 * @property-read \App\Species $species
 * @property int|null $user_id
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sample whereUserId($value)
 */
class Sample extends Model
{
    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
