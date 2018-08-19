<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Dataset
 *
 * @property int $id
 * @property string $name
 * @property float $test_size
 * @property float $mean
 * @property float $standard_deviation
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dataset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dataset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dataset whereMean($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dataset whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dataset whereStandardDeviation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dataset whereTestSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dataset whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sample[] $samples
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sample[] $test
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sample[] $train
 */
class Dataset extends Model
{
    protected $fillable = [
        'name',
        'test_size',
    ];

    public function samples()
    {
        return $this->belongsToMany(Sample::class);
    }

    public function train()
    {
        return $this->belongsToMany(Sample::class)->where('test', false);
    }

    public function test()
    {
        return $this->belongsToMany(Sample::class)->where('test', true);
    }
}
