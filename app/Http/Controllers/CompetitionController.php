<?php

namespace App\Http\Controllers;
use App\Project;
use App\Http\Controllers\ProjectsController;
use App\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

                
        return view('project.competition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
        {
        $request->validate([
            'c_description' => 'required',
            'date' => 'required',
            'file' => 'required'
        ]);
        $projects = DB::table('projects')
        ->select('id')
        ->where('u_id',[Auth::user()->id])
        ->latest()
        ->first();
        $check=Competition::where('p_id', '=', "$projects->id")
        ->exists();
        if(!$check)
        {
        $competition = new Competition;
        $competition->p_id = $projects->id;
        $competition->c_description = $request->c_description;
        $competition->date = $request->date;
        $path = $request->file('file')->store('competition');
        $competition->file=$path;
        $competition->save();
        
        
        }
        
        return redirect()->action('ProjectsController@posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        //
    }
    public function download($file)

    {
        return response()->download(storage_path('app/competition/'.$file));
    }
}
