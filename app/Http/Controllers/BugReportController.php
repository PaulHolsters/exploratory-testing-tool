<?php

namespace App\Http\Controllers;

use App\Models\BugReport;
use Illuminate\Http\Request;

class BugReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required','min:3'],
            'environment' => ['required','min:3'],
        ]);
        $bug = new BugReport();
        $bug->title = $request->title;
        $bug->environment = $request->environment;
        $bug->users = $request->users;
        $bug->test_id = $request->test;
        $bug->save();
        return redirect('tests/'.$request->test);
    }

    /**
     * Display the specified resource.
     */
    public function show(BugReport $bugreport)
    {
        return view('bugreports.show',['bug'=>$bugreport]);
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
    public function update(Request $request, BugReport $bugreport)
    {
        $request->validate([
            'title' => ['required','min:3'],
            'environment' => ['required','min:3'],
        ]);
        $bugreport->update([
            'title' => $request->title,
            'environment' => $request->environment,
            'users' => $request->users,
        ]);
        return redirect('/bugreports/'.$bugreport->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BugReport $bugreport)
    {
        $bugreport->delete();
        return redirect('/tests/'.$bugreport->test_id);
    }
}
