<?php

namespace App\Http\Controllers;

use App\Models\BugReport;
use App\Models\Test;
use App\Models\TestStep;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TestStepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function up(TestStep $teststep)
    {
        // todo gardrail top +1
        $rang = $teststep->rang;
        $bugreport = BugReport::with('steps')->findOrFail($teststep->bug_report_id);
        $step = Arr::first($bugreport->steps,function($v) use($rang){
            return $v->rang === $rang+1;
        });
        DB::transaction(function() use($step,$teststep,$rang){
           $step->rang = 0;
           $step->save();
            $teststep->rang = $rang+1;
            $teststep->save();
            $step->rang = $rang;
            $step->save();
        });
        return redirect('bugreports/'.$teststep->bug_report_id);
    }

    public function down(TestStep $teststep)
    {
        // todo gardrail -1
        $rang = $teststep->rang;
        $bugreport = BugReport::with('steps')->findOrFail($teststep->bug_report_id);
        $step = Arr::first($bugreport->steps,function($v) use($rang){
            return $v->rang === $rang-1;
        });
        DB::transaction(function() use($step,$teststep,$rang){
            $step->rang = 0;
            $step->save();
            $teststep->rang = $rang-1;
            $teststep->save();
            $step->rang = $rang;
            $step->save();
        });
        return redirect('bugreports/'.$teststep->bug_report_id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'step' => ['required','min:3'],
        ]);
        $teststep = new TestStep();
        $teststep->step = $request->step;
        // get bug => teststeps => highest in rang +1
        $bugreport = BugReport::with('steps')->findOrFail($request->bug);
        $rang = 0;
        for ($i=0;$i<sizeof($bugreport->steps);$i++){
            if($rang<$bugreport->steps[$i]->rang) $rang = $bugreport->steps[$i]->rang;
        }
        $rang++;
        $teststep->rang = $rang;
        $teststep->bug_report_id = $bugreport->id;
        $teststep->save();
        $bugreport = BugReport::with('steps')->findOrFail($request->bug);
        return view('bugreports.show',['bug'=>$bugreport]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TestStep $testStep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestStep $testStep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestStep $testStep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestStep $teststep)
    {
        DB::transaction(function() use ($teststep) {
            $rang = $teststep->rang;
            $teststep->delete();
            $steps = TestStep::where(['bug_report_id'=>$teststep->bug_report_id])->get()->sort(function($a,$b){
                return $a->rang < $b->rang ? -1 : 1;
            });
            foreach ($steps as $step){
                if($step->rang > $rang){
                    $step->rang = ($step->rang)-1;
                    $step->save();
                }
            }
        });
        return redirect('bugreports/'.$teststep->bug_report_id);
    }
}
