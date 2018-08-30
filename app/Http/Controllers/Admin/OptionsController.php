<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OptionsRequest;
use App\Models\Options;
use App\Models\Pages;
use App\Http\Controllers\Controller;

class OptionsController extends Controller
{
    private $menu = 'options';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.options.index', [
            'options' => Options::all(),
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
        return view('admin.options.create',[
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
    public function store(OptionsRequest $request)
    {
        Options::create([
            'name' => $request->get('name'),
            'value' => $request->get('value'),
            'page_id' => (int)$request->get('page_id')
        ]);
        return redirect()->route('options.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Options  $options
     * @return \Illuminate\Http\Response
     */
    public function show(Options $options)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Options  $options
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.options.edit',[
            'parameter' => Options::find($id),
            'pages' => Pages::all(),
            'menu' => $this->menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Options  $options
     * @return \Illuminate\Http\Response
     */
    public function update(OptionsRequest $request, $id)
    {
        Options::find($id)->update([
            'name' => $request->get('name'),
            'value' => $request->get('value'),
            'page_id' => (int)$request->get('page_id')
        ]);
        return redirect()->route('options.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Options  $options
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Options::find($id)->delete();
        return redirect()->route('options.index');
    }
}
