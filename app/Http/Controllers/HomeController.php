<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\PhotoBanner;
use App\Models\Product;
use App\Models\User;
use App\Models\VideoBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){

      $videoBanner=VideoBanner::query()->first();
      $products=Product::query()->orderBy('id','desc')->take(8)->get();
      $bannerPrimary=PhotoBanner::query()->where('id','1')->first();
      $bannerRight=PhotoBanner::query()->where('id','2')->first();
      $bannerLeft=PhotoBanner::query()->where('id','3')->first();
      $categories=Category::all();
      $blogs=Blog::query()->orderBy('id','desc')->take(4)->get();
        return view('front.index',compact(
            'videoBanner','products','bannerPrimary',
            'bannerRight','bannerLeft','categories','blogs'
        ));
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
