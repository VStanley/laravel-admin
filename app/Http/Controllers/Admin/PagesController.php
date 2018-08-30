<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers;
use App\Http\Requests\PageRequest;
use App\Models\Pages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    private $menu = 'pages';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::all();

        if (count($pages) > 0){
            $helpers = new Helpers();
            $pages = $helpers->generateTree($pages->toArray());
        }

        return view('admin.pages.index', [
            'pages' => $pages,
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
        return view('admin.pages.create', [
            'template' => Storage::disk('views')->allFiles(),
            'pages' => Pages::all(),
            'menu' => $this->menu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        Pages::create($request->all());

        return redirect()->route('pages');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $pages)
    {
        //  это индекс
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.edit', [
            'page' => Pages::find($id),
            'pages' => Pages::all(),
            'template' => Storage::disk('views')->allFiles(),
            'menu' => $this->menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $page = Pages::find($id);
        $page->update($request->all());
        return redirect()->route('pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pages::find($id)->delete();
        Pages::where('owner_id', $id)->delete();
        return redirect()->route('pages');
    }
}
