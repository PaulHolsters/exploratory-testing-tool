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

    public function store(Request $request){
        $request->validate([
            'charter' => ['required','min:3'],
        ]);
        $test = new Test();
        $test->charter = $request->charter;
        $test->date = date('Y-m-d');
        $test->save();
        return view('tests.show',[
            'test' => $test
        ]);
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
    public function destroy(Test $test)
    {
        $test->delete();
        return redirect('/tests');
    }
}
