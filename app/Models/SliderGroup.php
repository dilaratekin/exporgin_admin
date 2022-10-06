<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderGroup extends Model
{
    use HasFactory;

    protected $table='slider_group';
    // Bir grubun birden fazla dili olabilir
    public function getSliderGroupDescriptions()
    {
        return $this->hasMany(SliderGroupDescription::class,'group_id','id');
    }
}
