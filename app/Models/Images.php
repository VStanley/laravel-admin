<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'src',
        'alt',
        'description'
    ];


    /*
     *      ManyToMany
     */
    public function categories()
    {
        return $this->belongsToMany(
            'App\Models\CategoriesImages',
            'category_image_image',
            'image_id',
            'category_image_id'
        );
    }
}
