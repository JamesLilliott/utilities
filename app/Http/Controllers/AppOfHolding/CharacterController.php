<?php

namespace App\Http\Controllers\AppOfHolding;

use App\Http\Controllers\Controller;
use App\Models\AppOfHolding\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $characters = Character::where('user_id', '=', Auth::id())->get();

        return view('app-of-holding.index', ['characters' => $characters]);
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:characters,name'],
            'strength' => ['required', 'numeric', 'gte:1', 'lte:20']
        ]);

        Character::create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'strength' => $request->input('strength')
        ]);

        return redirect()->action([self::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppOfHolding\Character $character
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Character $character)
    {
        return view('app-of-holding.show', ['character' => $character]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppOfHolding\Character  $character
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
     * @param  \App\Models\AppOfHolding\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $characterId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $characterId)
    {
        $character = Character::findOrFail($characterId);
        $character->forceDelete();
        return redirect()->action([self::class, 'index']);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $characterId)
    {
        return $this->destroy($characterId);
    }
}
