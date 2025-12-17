@extends('front.layout.master')

@section('page_title')
{{$videoBanner->page_title}}
@endsection

@section('meta_description')
    {{$videoBanner->meta_description}}
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero position-relative overflow-hidden">
        <!-- ویدیو پس‌زمینه -->
        <video autoplay loop muted playsinline preload="auto"
               class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
               style="z-index: -1;">
            <source src="{{asset('video/'.$videoBanner->video_mp4)}}" type="video/mp4">
            <source src="{{asset('video/'.$videoBanner->video_webm)}}" type="video/webm">
            <!-- فالبک عکس -->
            <img src="{{asset('video/'.$videoBanner->photo)}}"
                 alt="{{$videoBanner->photo_alt}}" class="w-100 h-100 object-fit-cover">
        </video>

        <!-- لایه تیره + محتوا (همون div تو) -->
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center text-white"
             style="background: rgba(0,0,0,0.5); z-index: 1;">
            <div class="container px-4">
                <h1 class="display-3 display-md-2 display-lg-1 fw-bold mb-4">
                   {{$videoBanner->title}}
                </h1>
                <p class="lead fs-4 fs-md-3 mb-5 col-lg-8 mx-auto opacity-90">
                    {{$videoBanner->description}}
                </p>
                <a href="{{$videoBanner->link}}" class="btn btn-primary btn-lg px-5 py-3 shadow-lg " style="border-radius: 30px;">
                    {{$videoBanner->btn_text}}
                </a>
            </div>
        </div>
    </section>

    <!-- محصولات جدید - اسکرول افقی فقط داخل خودش (بدون اسکرول کل صفحه) -->
    <section class="py-5 bg-light">
        <div class="container px-4">
            <h2 class="section-title text-center mb-5">محصولات جدید</h2>

            <!-- فقط این div اسکرول افقی داره، نه کل صفحه -->
            <div class="overflow-x-auto" style="-webkit-overflow-scrolling: touch;">
                <div class="d-flex gap-4 pb-3" style="min-width: max-content;">
                  @foreach($products as $product)
                        <div class="flex-shrink-0" style="width: 280px;">
                            <div class="product-card h-100 position-relative shadow-sm">

                                <a href="#" >
                                    <img src="{{asset('product/'.$product->photos->first()->photo) }}" class="w-100" alt="{{$product->photos->first()->photo_alt}}">
                                </a>
                                <div class="p-4">
                                   <a href="#" style="text-decoration: none;color: black;">
                                       <h5 class="mb-2">{{$product->name}}</h5>
                                   </a>
                                    {{--<p class="text-muted small mb-3">ضدآب، تنفس‌پذیر، سبک</p>--}}
                                    <div class="d-flex justify-content-between align-items-center">
                                        @if($product->discount > 0)
                                            <!-- قیمت اصلی (خط‌خورده) -->
                                            <span class="price old-price text-muted text-decoration-line-through small">
                                                {{ number_format($product->price) }} تومان
                                            </span>

                                            <!-- قیمت با تخفیف (قرمز و bold) -->
                                            <div class="price discounted-price text-danger fw-bold fs-5">
                                                {{ number_format($product->price - $product->discount) }} تومان
                                            </div>
                                        @else
                                            <!-- اگر تخفیف ندارد، فقط قیمت اصلی -->
                                            <span class="price fw-bold fs-5">
                                                  {{ number_format($product->price) }} تومان
                                            </span>
                                        @endif
                                        <a href="#" class="btn btn-outline-success btn-sm">افزودن</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                  @endforeach





                </div>
            </div>
        </div>
    </section>

    <!--بنرها-->
    <!-- بنرهای تبلیغاتی -->
    <section class="banners-section py-5">
        <div class="container px-4">

            <!-- بنر بزرگ تمام‌عرض -->
            <div class="banner-full mb-4 rounded-4 overflow-hidden position-relative text-white shadow-lg">
               <a href="{{$bannerPrimary->link}}">
                   <img src="{{asset('banner/'.$bannerPrimary->photo)}}" alt="{{$bannerPrimary->photo_alt}}" class="w-100 h-100 object-fit-cover">
               </a>
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center p-4"
                     style="background: rgba(0,0,0,0.45);">
                    <div>
                        <h3 class="fw-bold mb-3 fs-2">{{$bannerPrimary->title}}</h3>
                        <p class="fs-5 mb-0">{{$bannerPrimary->description}}</p>
                    </div>
                </div>
            </div>

            <!-- دو بنر کنار هم (در دسکتاپ) -->
            <div class="row g-4 " style="margin-top: 50px;">
                <div class="col-lg-6">
                    <div class="banner-half rounded-4 overflow-hidden position-relative text-white shadow-lg h-100">
                       <a href="{{$bannerRight->link}}">
                           <img src="{{asset('banner/'.$bannerRight->photo)}}" alt="{{$bannerRight->photo_alt}}" class="w-100 h-100 object-fit-cover">
                       </a>
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center p-4"
                             style="background: rgba(0,0,0,0.5);">
                            <div>
                                <h4 class="fw-bold mb-2">{{$bannerRight->title}}</h4>
                                <p class="mb-0">{{$bannerRight->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="banner-half rounded-4 overflow-hidden position-relative text-white shadow-lg h-100">
                       <a href="{{$bannerLeft->link}}">
                           <img src="{{asset('banner/'.$bannerLeft->photo)}}" alt="{{$bannerLeft->photo_alt}}" class="w-100 h-100 object-fit-cover">
                       </a>
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center p-4"
                             style="background: rgba(0,0,0,0.5);">
                            <div>
                                <h4 class="fw-bold mb-2">{{$bannerLeft->title}}ا</h4>
                                <p class="mb-0">{{$bannerLeft->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- مدسته بندی محصولات-->
    <section class="py-5 bg-light">
        <div class="container px-4">
            <h2 class="section-title text-center mb-5">دسته بندی محصولات</h2>

            <!-- فقط این div اسکرول افقی داره، نه کل صفحه -->
            <div class="overflow-x-auto" style="-webkit-overflow-scrolling: touch;">
                <div class="d-flex gap-4 pb-3" style="min-width: max-content;">

                    @foreach($categories as $category)
                        <div class="flex-shrink-0" style="width: 280px;">
                            <div class="product-card h-100 position-relative shadow-sm">
                                <a href="#">
                                    <img src="{{asset('category/'.$category->photo)}}" class="w-100" alt="{{$category->photo_alt}}">
                                </a>

                                <div class="p-4" style="text-align: center;">
                                    <h5 class="mb-2">{{$category->name}}</h5>

                                </div>
                            </div>
                        </div>
                    @endforeach


















                </div>
            </div>
        </div>
    </section>
    <!-- مقالات جدید -->
    <section class="py-5">
        <div class="container px-4">
            <h2 class="section-title text-center mb-5">مقالات جدید</h2>

            <div class="row g-4">
                @foreach($blogs as $blog)
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="article-card h-100 shadow-sm rounded-4 overflow-hidden bg-white">

                               <img src="{{asset('blog/'.$blog->photo)}}"
                                    alt="{{$blog->photo_alt}}" class="w-100" style="height: 200px; object-fit: cover;">


                            <div class="p-4">
                                <h5 class="fw-bold mb-3">{{$blog->title}}</h5>
                               {{-- <p class="text-muted small lh-lg">
                                    با رعایت این نکات ساده، حتی در سخت‌ترین شرایط زمستانی هم ایمن و گرم بمانید...
                                </p>--}}
                                <a href="#" class="btn btn-outline-dark btn-sm rounded-pill px-4">ادامه مطلب →</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
