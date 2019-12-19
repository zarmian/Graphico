<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\MesssageSent;
use App\User;
use App\Chat;
use App\Project;
use Illuminate\Support\Facades\Auth;	
use Illuminate\Support\Facades\DB;
use URL;
use Illuminate\Support\Str;

class WorkspaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request, Project $project){
        echo(Auth::user()->id);
        $chat = new Chat;
        $chat->message = $request->message;
        $chat->sender =Auth::user()->id;
        $chat->p_id = $project->id;
        $chat->recever =0;
        $chat->status ="active";
        $chat->save();
        return back();
    }
    public function show(Chat $chat)
    {
        $chat=DB::select('select * from chat');
        return view('chat.show',compact('chat'));
    }  


    public function download($file)

    {
        return response()->download(storage_path('app/submit/'.$file));
    }
}
