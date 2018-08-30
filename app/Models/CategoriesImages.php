<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesImages extends Model
{
    protected $table = 'categories_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'category'
    ];


    /*
     *      ManyToMany
     */
    public function images()
    {
        return $this->belongsToMany(
            'App\Models\Images',
            'category_image_image',
            'category_image_id',
            'image_id'
        );
    }
}
