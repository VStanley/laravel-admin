<?php

namespace App\Http\Controllers\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use App\Http\Controllers\Controller;
use App\Http\Helpers;
use App\Http\Requests\ImagesRequest;
use App\Models\CategoriesImages;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ImagesController extends Controller
{
    private $menu = 'images';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.images.index', [
            'menu' => $this->menu
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesList = CategoriesImages::all();

        if (count($categoriesList) > 0){
            $helpers = new Helpers();
            $categoriesImages = $helpers->generateTree($categoriesList->toArray());
        }

        return view('admin.images.create', [
            'categoriesImages' => $categoriesImages,
            'menu' => $this->menu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImagesRequest $request)
    {
        $originName = $request->file('file')->getClientOriginalName();

        $image = Images::create([

            //todo !!!


        ]);


        return Response::json([
            'file' => $originName,
            'select' => $request->get('select')
        ]);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Images $images)
    {
        //
    }

}
