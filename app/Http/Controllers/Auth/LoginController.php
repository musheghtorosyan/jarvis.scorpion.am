<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use App\Models\Task;


class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }

    public function dashboard(){
        $tasks = Task::query()->where([['category_id','!=','5'],['category_id','!=','6'],['done','=','0']])->orderBy('done','asc')->orderBy('id','desc')->get();
        $done = Task::query()->where([['category_id','!=','5'],['category_id','!=','6'],['done','=','1']])->count();
        $todo = Task::query()->where([['category_id','!=','5'],['category_id','!=','6'],['done','=','0']])->count();
        $in = Task::query()->where([['category_id','=','3'],['done','=','0']])->count();
        $out = Task::query()->where([['category_id','=','2'],['done','=','0']])->count();
        $projects = Task::query()->where([['category_id','=','4'],['done','=','0']])->count();
        $wishes = Task::query()->where([['category_id','=','5'],['done','=','0']])->count();
        $codex = Task::query()->where([['category_id','=','6'],['done','=','0']])->count();
        $out_1 = Task::query()->where([['category_id','=','2'],['done','=','0']])->sum('price');
        $out_2 = Task::query()->where([['category_id','=','2'],['done','=','1']])->sum('price');
        $in_1 = Task::query()->where([['category_id','=','3'],['done','=','0']])->sum('price');
        $in_2 = Task::query()->where([['category_id','=','3'],['done','=','1']])->sum('price');
        return view('dashboard',compact('tasks','done','todo','in','out','projects','wishes','codex','out_1','out_2','in_1','in_2'));
    }


    public function create_task(Request $request){
        $data = new Task();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->category_id = $request->cat;
        $data->priority = 1;
        $data->save();
        return back();
    }

    public function done_task(Request $request){
        $id = $request->id;
        Task::query()->where('id',$id)->update(['done' => 1]);
        return back();
    }

    public function remove_task(Request $request){
        $id = $request->id;
        Task::query()->where('id',$id)->delete();
        return back();
    }


}
