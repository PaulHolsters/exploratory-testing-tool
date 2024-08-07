<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tests.index',[
            'tests' => Test::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'charter' => ['required','min:3'],
        ]);
        $test = Test::create([
            'charter'=>$request->charter,
            'date'=>date('Y-m-d')
        ]);
        return view('tests.show',[
            'test' => $test
        ]);
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
    public function show(Test $test)
    {
        return view('tests.show',[
            'test' => $test
        ]);
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
    public function update(Request $request, Test $test)
    {
        $request->validate([
            'charter' => ['required','min:3'],
        ]);
        $test->update([
            'charter' => $request->charter,
        ]);
        return redirect('/tests/'.$test->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
