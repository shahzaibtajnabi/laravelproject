<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bannerchange extends Model
{
    use HasFactory;
    protected $fillable = ['website_name', 'service_name', 'service_description', 'image1', 'image2', 'image3'];
}
