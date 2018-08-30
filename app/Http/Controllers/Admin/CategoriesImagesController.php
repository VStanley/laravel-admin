<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use App\Http\Requests\CategoryImageRequest;
use App\Models\CategoriesImages;

class CategoriesImagesController extends Controller
{
    private $menu = 'images';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesList = CategoriesImages::all();

        if (count($categoriesList) > 0){
            $helpers = new Helpers();
            $categoriesImages = $helpers->generateTree($categoriesList->toArray());
        }

        return view('admin.images.indexCategory', [
            'categoriesImages' => $categoriesImages,
            'categoriesList' => $categoriesList,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryImageRequest $request)
    {
        CategoriesImages::create($request->all());

        return redirect()->route('categoriesImages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }

}
