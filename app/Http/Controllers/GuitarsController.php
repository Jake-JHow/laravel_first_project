<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Guitar;
use App\Models\Guitar as ModelsGuitar;
use App\Http\Requests\GuitarFormRequest;

class GuitarsController extends Controller
{

    private static function getData() {
        return [
            ['id' => 1, 'name' => 'American Standard Strat', 'brand' => 'Fender'],
            ['id' => 2, 'name' => 'Strala S2', 'brand' => 'PRS'],
            ['id' => 3, 'name' => 'Explorer', 'brand' => 'Gibson'],
            ['id' => 4, 'name' => 'Talman', 'brand' => 'Ibanez']
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET
        return view('guitars.index', [
            'guitars' => ModelsGuitar::all(),
            'userInput' => '<script>alear("hello")</script>'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET
        return view('guitars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuitarFormRequest $request)
    {
        $data = $request->validated();
        
        //POST
        $guitar = new ModelsGuitar();

        $guitar -> name =  $data['guitar-name'];
        $guitar -> brand =  $data['brand'];
        $guitar -> year_made =  $data['year'];

        $guitar -> save();

        return redirect()->route('guitars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ModelsGuitar $guitar)
    {
        //GET

        return view('guitars.show', [
            'guitar' => $guitar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsGuitar $guitar)
    {
        //GET
        return view('guitars.edit', [
            'guitar' =>$guitar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuitarFormRequest $request, ModelsGuitar $guitar)
    {
        //POST 
        $data = $request->validated();
        
        //POST

        $guitar -> name =  $data['guitar-name'];
        $guitar -> brand =  $data['brand'];
        $guitar -> year_made =  $data['year'];

        $guitar -> save();

        return redirect()->route('guitars.show', $guitar->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DELETE
    }
}
