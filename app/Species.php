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
 */
class Species extends Model
{
    protected $table = 'species';

    protected $fillable = ['name'];

    public function dataset()
    {
        return $this->hasMany(DatasetEntry::class);
    }
}
