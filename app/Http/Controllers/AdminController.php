<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function adminList(){
        $users=User:: query()->withTrashed()->get();
        $useractive=User::query()->get();
        $smsuser=$users->where('type',1)->first();
        return view('admin.user.list',compact('users','smsuser','useractive'));
    }
    public function adminAddView(){
        return view('admin.user.add');
    }
    public  function  adminAddPost(Request $request)
    {
        $data=$request->all();
        $data['password']=Hash::make($request['password']);
        User::query()->create([
            'name'=>$data['name'],
            'mobile'=>$data['mobile'],
            'password'=>$data['password'],
            'type'=>2
        ]);
        return redirect(route('admin.list'));

    }

    public function adminEdit($id)
    {
        $user=User::query()->find($id);
        return view('admin.user.edit',compact('user'));
    }

    public function adminEditPost(request $request)
    {
        $data=$request->all();
        $data['password']=Hash::make($data['password']);
        $user=User::query()->find($data['id']);
        $user->update($data);
        return redirect(route('admin.list'));
    }

    public function adminDelete($id)
    {
        $user=User::query()->find($id);
        $user->delete();
        return redirect(route('admin.list'));
    }
    public function adminRestore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        return redirect(route('admin.list'));
    }

    public function adminChangeSms(Request $request)
    {

         $users=User::query()->withTrashed()->where('type',1)->get();
         foreach($users as $user){
             $user->update(['type'=>2]);
         }
        $user=User::query()->find($request['smsuserid']);
         $user->update(['type'=>1]);
        return redirect(route('admin.list'));
    }





    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home.index'));
    }
}
