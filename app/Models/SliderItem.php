<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderItem extends Model
{
    use HasFactory;
    protected $table='slider_item';
    protected $fillable=['group_id','sort'];

    // Bir grubun birden fazla Item'i olabilir
    public function getSliderItem()
    {
        return $this->hasMany(SliderItemDescription::class,'item_id','id');

    }
}
