<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatasetEntry
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $species_id
 * @property string $filename
 * @property string $path
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatasetEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatasetEntry whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatasetEntry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatasetEntry wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatasetEntry whereSpeciesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatasetEntry whereUpdatedAt($value)
 */
class DatasetEntry extends Model
{
    protected $table = 'dataset';

    public function species()
    {
        return $this->belongsTo(Species::class);
    }
}
