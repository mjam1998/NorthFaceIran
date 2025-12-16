<?php

namespace App\Http\Controllers;

use App\Models\PhotoBanner;
use App\Models\VideoBanner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $videoBanner = VideoBanner::first();
        $photoBanners = PhotoBanner::orderBy('id')->limit(3)->get();

        return view('admin.banner.index', compact('videoBanner', 'photoBanners'));
    }

    public function updateVideo(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'btn_text' => 'required|string|max:255',
            'video_mp4' => 'nullable|mimetypes:video/mp4|max:8000',
            'video_webm' => 'nullable|mimetypes:video/webm|max:8000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4000',
            'photo_alt' => 'required|string',
            'link' => 'nullable|url',
            'meta_description' => 'required|string',
            'page_title' => 'required|string|max:255',
        ],[
            'title.required' => 'وارد کردن عنوان الزامی است.',
            'title.string' => 'عنوان باید از نوع متن باشد.',

            'description.required' => 'وارد کردن توضیحات الزامی است.',
            'description.string' => 'توضیحات باید از نوع متن باشد.',

            'btn_text.required' => 'وارد کردن متن دکمه الزامی است.',
            'btn_text.string' => 'متن دکمه باید از نوع متن باشد.',
            'btn_text.max' => 'متن دکمه نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'video_mp4.mimetypes' => 'فایل ویدیو MP4 باید از نوع video/mp4 باشد.',
            'video_mp4.max' => 'حجم فایل ویدیو MP4 نمی‌تواند بیشتر از ۸ مگابایت باشد.',

            'video_webm.mimetypes' => 'فایل ویدیو WebM باید از نوع video/webm باشد.',
            'video_webm.max' => 'حجم فایل ویدیو WebM نمی‌تواند بیشتر از   ۸ مگابایت باشد.',

            'photo.image' => 'فایل عکس باید یک تصویر باشد.',
            'photo.mimes' => 'فرمت عکس باید یکی از jpeg، png، jpg یا gif باشد.',
            'photo.max' => 'حجم عکس نمی‌تواند بیشتر از ۴ مگابایت باشد.',

            'photo_alt.required' => 'وارد کردن متن جایگزین عکس الزامی است.',
            'photo_alt.string' => 'متن جایگزین عکس باید از نوع متن باشد.',

            'link.url' => 'لینک وارد شده معتبر نیست.',

            'meta_description.required' => 'وارد کردن متا دیسکریپشن الزامی است.',
            'meta_description.string' => 'متا دیسکریپشن باید از نوع متن باشد.',

            'page_title.required' => 'وارد کردن عنوان صفحه الزامی است.',
            'page_title.string' => 'عنوان صفحه باید از نوع متن باشد.',
            'page_title.max' => 'عنوان صفحه نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',
        ]);

        $videoBanner = VideoBanner::firstOrCreate([]);

        $data = $request->only([
            'title', 'description', 'btn_text', 'photo_alt',
            'link', 'meta_description', 'page_title'
        ]);

        if ($request->hasFile('video_mp4')) {
            if ($videoBanner->video_mp4 && file_exists(public_path('video/' . $videoBanner->video_mp4))) {
                unlink(public_path('video/' . $videoBanner->video_mp4));
            }
            $videoExtension = $request->video_mp4->getClientOriginalExtension();
            $videoName = 'bannermp' .'.' . $videoExtension;
            $request->video_mp4->storeAs('video', $videoName, 'public');
            $data['video_mp4'] = $videoName;
        }

        if ($request->hasFile('video_webm')) {
            if ($videoBanner->video_webm && file_exists(public_path('video/' . $videoBanner->video_webm))) {
                unlink(public_path('video/' . $videoBanner->video_webm));
            }
            $videoExtension = $request->video_webm->getClientOriginalExtension();
            $videoName = 'bannerwebm' .'.' . $videoExtension;
            $request->video_webm->storeAs('video', $videoName, 'public');
            $data['video_webm'] = $videoName;
        }

        if ($request->hasFile('photo')) {
            if ($videoBanner->photo && file_exists(public_path('video/' . $videoBanner->photo))) {
                unlink(public_path('video/' . $videoBanner->photo));
            }
            $photoExtension = $request->photo->getClientOriginalExtension();
            $photoName = 'bannerph' .'.' . $photoExtension;
            $request->photo->storeAs('video', $photoName, 'public');
            $data['photo'] = $photoName;
        }

        $videoBanner->update($data);

        return redirect()->back()->with('success', 'بنر ویدیو با موفقیت بروزرسانی شد.');
    }

    public function updatePhoto(Request $request, PhotoBanner $photoBanner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4000',
            'photo_alt' => 'required|string',
            'link' => 'nullable|url',
        ],[
            'title.required' => 'وارد کردن عنوان الزامی است.',
            'title.string' => 'عنوان باید از نوع متن باشد.',
            'title.max' => 'عنوان نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'description.required' => 'وارد کردن توضیحات الزامی است.',
            'description.string' => 'توضیحات باید از نوع متن باشد.',

            'photo.image' => 'فایل عکس باید یک تصویر باشد.',
            'photo.mimes' => 'فرمت عکس باید یکی از jpeg، png، jpg یا gif باشد.',
            'photo.max' => 'حجم عکس نمی‌تواند بیشتر از ۴ مگابایت باشد.',

            'photo_alt.required' => 'وارد کردن متن جایگزین عکس الزامی است.',
            'photo_alt.string' => 'متن جایگزین عکس باید از نوع متن باشد.',

            'link.url' => 'لینک وارد شده معتبر نیست.',
        ]);

        $data = $request->only(['title', 'description', 'photo_alt', 'link']);

        if ($request->hasFile('photo')) {
            if ($photoBanner->photo && file_exists(public_path('banner/' . $photoBanner->photo))) {
                unlink(public_path('banner/' . $photoBanner->photo));
            }
            $photoExtension = $request->photo->getClientOriginalExtension();
            $photoName = 'banner'.time() .'.' . $photoExtension;
            $request->photo->storeAs('banner', $photoName, 'public');
            $data['photo'] = $photoName;
        }

        $photoBanner->update($data);

        return redirect()->back()->with('success', 'بنر عکس با موفقیت بروزرسانی شد.');
    }
}
