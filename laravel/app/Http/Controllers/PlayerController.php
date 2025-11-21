<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = DB::table("players")->get();
        return response()->json($players, options:JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function regenerate()
    {
        DB::table('players')->truncate();

        $wappen = [ 
            './Wappen1.png',
            './Wappen2.png', 
            './Wappen3.png', 
            './Wappen4.png', 
            './Wappen5.png',
        ];
        
        for ($i = 0; $i < 11; $i++) {
            $players = DB::table('players')
                ->insertGetId([
                    'name' => fake('de_DE')->firstName() . ' ' . fake('de_DE')->lastName(), 
                    'city' => fake('de_DE')->city(), 
                    'score' => rand(0,1111),
                    'wappen' => fake('de_DE')->randomElement($wappen)
                ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
