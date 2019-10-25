<?php

namespace App\Http\Controllers;

use App\Project;
use App\Bid;
use App\Assign;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $projects = Project::where('status',"active")
        ->orderBy('created_at','desc')
        ->get();

        
        return view ('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'p_title' => 'required|unique:projects',
            'p_description' => 'required',
            'budget' => 'required',
            'file' => 'required'
        ]);

        $project = new Project;
        $project->u_id = Auth::user()->id;
        $project->p_title = $request->p_title;
        $project->p_description = $request->p_description;
        $project->budget = $request->budget;
        $project->status = 'active';
        $project->no_bids = '0';
        $path = $request->file('file')->store('project');
        $project->file=$path;
        $project->save();
        
        return redirect('project/competition/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $projects=DB::select('select * from projects where id = ?',[$project->id]);
        $competitions=DB::select('select * from competition where p_id = ?',[$project->id]);
        $users=DB::select('select * from profile where u_id = ?',[$project->u_id]);
        $counts = DB::table('projects')
        ->where('u_id',[$project->u_id])
        ->count();
        $bids=DB::select('select * from bid where p_id = ?',[$project->id]);
        $check=assign::where('p_id', '=', "$project->id")
        ->exists();
        
        return view('project.show',compact('projects', 'competitions','users','counts','bids','check'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'p_title' => 'required',
            'p_description' => 'required',
            'budget' => 'required',
            'file' => 'required'
        ]);
        $project->p_title = $request->p_title;
        $project->p_description = $request->p_description;
        $project->budget = $request->budget;
        $path = $request->file('file')->store('project');
        $project->file=$path;
        $project->save();
        return redirect()->action('ProjectsController@posted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        return $project;
    }

    public function posted()
    {
        $projects=Project::where('u_id',[Auth::user()->id])
        ->orderBy('created_at','desc')
        ->get();

        return view ('project.posted',compact('projects'));
    }
    public function edit(Project $project)
    {
        
        return view('project.edit',compact('project'));
    }
    public function archive(Project $project)
    {
        $project->status='archive';
        $project->save();
        return redirect()->action('ProjectsController@posted');
    }
    public function active(Project $project)
    {
        $project->status='active';
        $project->save();
    

        return redirect()->action('ProjectsController@posted');
    }
    public function myproject()
    {
        $assign=Assign::select('p_id')
        ->where('u_id',[Auth::user()->id])
        ->first();
        $id=$assign->p_id;
        
        $projects=DB::select('select * from projects where id = ?',[$id]);

        return view ('project.myproject',compact('projects'));
    }
    public function bid(Project $project)
    {
        $id=Auth::user()->id;
        
        $check1=Bid::where('p_id', '=', "$project->id")
        ->where('u_id', '=', "$id")
        ->exists();
        
        if($check1)
        return redirect()->action('ProjectsController@index');
        else
            {
                
                $bid = new Bid;
                $bid->u_id = Auth::user()->id;
                $bid->p_id = $project->id;
                $bid->save();
        DB::table('projects')
        ->where('id',[$project->id])
        ->increment('no_bids');
        
        return redirect()->action('ProjectsController@index');
            }
        
    
    }
    public function assign(Project $project , $user )
    {
        
        $assign = new Assign;
                $assign->u_id = $user;
                $assign->p_id = $project->id;
                $assign->deadline = '2019-10-30';
                $project->status='Processing';
                $assign->save();
                $project->save();
                return redirect()->action('ProjectsController@posted');

    }
    public function download($file)

    {
        return response()->download(storage_path('app/project/'.$file));
    }
    public function workspace($project)
    {
        $projects=Project::where('id', '=', "$project")
        ->get();
        $users;
        foreach($projects as $project1)
        $users=DB::select('select * from users where id = ?',[$project1->u_id]);
        $assigns=DB::select('select * from assign where p_id = ?',[$project1->id]);

        return view('workspace', compact('users','projects','assigns') );
    }
    public function submit(Request $request, Project $project)
    {
        $request->validate([
            'file' => 'required'
        ]);

        $path = $request->file('file')->store('submit');
        $project->finalfile=$path;
        $project->status='Submitted';
        $project->save();
        
        return redirect('project/competition/create');
    }
} 