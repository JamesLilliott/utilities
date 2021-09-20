<?php

namespace App\Http\Controllers\AppOfHolding;

use App\Http\Controllers\Controller;
use App\Models\AppOfHolding\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display a listing of the resource.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('app-of-holding.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:characters,name'],
            'strength' => ['required', 'numeric', 'gte:1', 'lte:20']
        ]);

        Character::create([
            'name' => $request->input('name'),
            'strength' => $request->input('strength')
        ]);

        return view('app-of-holding.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        //
    }
}
