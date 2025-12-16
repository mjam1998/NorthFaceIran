<?php

namespace App\Http\Controllers;

use App\Models\PhotoBanner;
use App\Models\User;
use App\Models\VideoBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){





        return view('front.index');
    }

    public function login()
    {
        return view('front.login');
    }
    public function loginPost(Request $request)
    {
        $user=User::query()->where('mobile',$request['mobile'])->first();
        if($user==null){
            return back()->with('loginError','اطلاعات نادرست لطفا دوباره تلاش کنید.');
        }
        if(Hash::check($request->password,$user->password)){
            Auth::login($user);
            return redirect()->route('admin.index');
        }
        return back()->with('loginError',' اطلاعات نادرست لطفا دوباره تلاش کنید.');
    }
}
