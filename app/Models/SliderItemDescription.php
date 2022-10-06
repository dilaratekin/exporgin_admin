<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderItemDescription extends Model
{
    use HasFactory;
    protected $table='slider_item_description';
    protected $fillable=['item_id','lang','image_url','background_url','thumb_url','title','content','target_link'];
}


