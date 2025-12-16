@extends('admin.layout.master')

@section('title')
    مدیریت صفحه اصلی سایت
@endsection
@section('content')
    <div class="container mt-5">

        <h2 class="mb-4">مدیریت بنرهای صفحه اصلی</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>خطا در اطلاعات وارد شده:</strong>
                <ul class="mt-2 mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <!-- فرم بنر ویدیو (فقط یکی) -->
        <div class="card mb-5">
            <div class="card-header">ویرایش بنر ویدیو صفحه اصلی</div>
            <div class="card-body">
                <form action="{{ route('admin.banner.video.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>عنوان صفحه اصلی روی ویدیو</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $videoBanner?->title) }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>متن زیر عنوان اصلی </label>
                                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $videoBanner?->description) }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>متن دکمه صفحه اصلی</label>
                                <input type="text" name="btn_text" class="form-control" value="{{ old('btn_text', $videoBanner?->btn_text) }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>alt عکس</label>
                                <input type="text" name="photo_alt" class="form-control" value="{{ old('photo_alt', $videoBanner?->photo_alt) }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>لینک دکمه اصلی (اختیاری)</label>
                                <input type="url" name="link" class="form-control" value="{{ old('link', $videoBanner?->link) }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>متا دسکریپشن صفحه اصلی سایت</label>
                                <textarea name="meta_description" class="form-control" required>{{ old('meta_description', $videoBanner?->meta_description) }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label> تایتل صفحه اصلی سایت</label>
                                <input type="text" name="page_title" class="form-control" value="{{ old('page_title', $videoBanner?->page_title) }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- پیش‌نمایش فعلی ویدیو MP4 -->
                            @if($videoBanner?->video_mp4)
                                <div class="mb-3">
                                    <label>ویدیو فعلی MP4</label>
                                    <video controls class="w-100" style="max-height:300px;">
                                        <source src="{{asset('video/'. $videoBanner->video_mp4) }}" type="video/mp4">
                                    </video>
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <label>ویدیو جدید MP4 (اختیاری)</label>
                                <input type="file" name="video_mp4" class="form-control" accept="video/mp4">
                                <span class="btn btn-warning">حداکثر 8 مگابایت ولی برای سرعت بیشتر سایت سایز پیشنهادی 3 مگابایت</span>
                            </div>

                            @if($videoBanner?->video_webm)
                                <div class="mb-3">
                                    <label>ویدیو فعلی WEBM</label>
                                    <video controls class="w-100" style="max-height:300px;">
                                        <source src="{{ asset('video/'. $videoBanner->video_webm) }}" type="video/webm">
                                    </video>
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <label>ویدیو جدید WEBM (اختیاری)</label>
                                <input type="file" name="video_webm" class="form-control" accept="video/webm">
                                <p class="text text-warning">نکته:ویدیو webm و عکس جایگزین ویدو mp4  در صفحه اصلی سایت هستند و در صورتی لود میشود که سرعت اینترنت پایین باشد</p>
                            </div>

                            @if($videoBanner?->photo)
                                <div class="mb-3">
                                    <label>عکس fallback فعلی</label><br>
                                    <img src="{{ asset('video/'. $videoBanner->photo) }}" class="img-fluid" style="max-height:300px;">
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <label>عکس fallback جدید (اختیاری)</label>
                                <input type="file" name="photo" class="form-control" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">بروزرسانی بنر ویدیو</button>
                </form>
            </div>
        </div>

        <!-- بنرهای عکس (سه تا) -->
        <h3 class="mb-4">ویرایش بنرهای صفحه اصلی </h3>
        <p class="text text-warning">بنر1:بنر اولی و بزرگتر</p>
        <p class="text text-warning">بنر2:زیر بنر اصلی سمت راست  </p>
        <p class="text text-warning">بنر3:زیر بنر اصلی سمت چپ</p>
        <div class="row">
            @foreach($photoBanners as $index => $banner)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">بنر عکس شماره {{ $banner->id }}</div>

                        <div class="card-body">
                            @if($banner->photo)
                                <img src="{{  asset('banner/'. $banner->photo) }}" class="img-fluid mb-3" style="max-height:200px;">
                            @else
                                <p class="text-muted">عکسی آپلود نشده</p>
                            @endif

                            <form action="{{ route('admin.banner.photo.update', $banner) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label>عنوان بنر</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title', $banner->title) }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label>متن بنر</label>
                                    <textarea name="description" class="form-control" required>{{ old('description', $banner->description) }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label>alt عکس</label>
                                    <input type="text" name="photo_alt" class="form-control" value="{{ old('photo_alt', $banner->photo_alt) }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label>لینک بنر(اختیاری)</label>
                                    <input type="url" name="link" class="form-control" value="{{ old('link', $banner->link) }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label>عکس جدید (اختیاری)</label>
                                    <input type="file" name="photo" class="form-control" accept="image/*">
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">بروزرسانی</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

    </div>
@endsection
