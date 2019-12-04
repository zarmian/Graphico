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
    public function store(Request $request){
        echo(Auth::user()->id);
        print_r(Auth::user()->id);
        $projects = DB::table('assign')->select('p_id')->where('u_id',[Auth::user()->id])->latest()->first();
        print_r($projects);
        $chat = new Chat;
        $chat->message = $request->message;
        $chat->sender ="2";
        $chat->p_id = $projects->p_id;
        $chat->recever =Auth::user()->id;
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
