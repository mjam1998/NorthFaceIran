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
                <div class="row g-4">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="product-card h-100 shadow-sm bg-white rounded-3 overflow-hidden">
                                <a href="{{ route('front.product.show', $product->slug)  }}">
                                    <img src="{{ asset('product/' . $product->photos->first()->photo ?? 'placeholder.jpg') }}"
                                         class="w-100" style="height: 250px; object-fit: cover;"
                                         alt="{{ $product->photos->first()->photo_alt  }}">
                                </a>

                                <div class="p-3">
                                    <a href="{{ route('front.product.show', $product->slug)  }}" class="text-dark text-decoration-none">
                                        <h6 class="fw-bold mb-2">{{ Str::limit($product->name, 50) }}</h6>

                                    </a>
                                    <a href="{{route('front.category.show', $product->category->slug)}}" style="text-decoration: none;">
                                        <p style="color: grey; ">{{$product->category->name}}</p>
                                    </a>

                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            @if($product->discount > 0)
                                                <div>
                                                <span class="text-muted text-decoration-line-through small">
                                                    {{ number_format($product->price) }} تومان
                                                </span>
                                                </div>
                                                <div class="text-danger fw-bold fs-5">
                                                    {{ number_format($product->price - $product->discount) }} تومان
                                                </div>
                                            @else
                                                <div class="fw-bold fs-5">
                                                    {{ number_format($product->price) }} تومان
                                                </div>
                                            @endif
                                        </div>

                                        <a href="{{ route('front.product.show', $product->slug)  }}" class="btn btn-success btn-sm rounded-pill px-3 add-to-cart"
                                           data-product-id="{{ $product->id }}">
                                            <i class="bi bi-bag-plus"></i> افزودن
                                        </a>
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
            <a href="{{$bannerPrimary->link}}">
            <div class="banner-full mb-4 rounded-4 overflow-hidden position-relative text-white shadow-lg">

                   <img src="{{asset('banner/'.$bannerPrimary->photo)}}" alt="{{$bannerPrimary->photo_alt}}" class="w-100 h-100 object-fit-cover">

                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center p-4"
                     style="background: rgba(0,0,0,0.45);">
                    <div>
                        <h3 class="fw-bold mb-3 fs-2">{{$bannerPrimary->title}}</h3>
                        <p class="fs-5 mb-0">{{$bannerPrimary->description}}</p>
                    </div>
                </div>
            </div>
            </a>
            <!-- دو بنر کنار هم (در دسکتاپ) -->
            <div class="row g-4" style="margin-top: 50px;">
                <!-- بنر راست -->
                <div class="col-lg-6">
                    <a href="{{$bannerRight->link}}" class="d-block h-100">
                        <div class="banner-half rounded-4 overflow-hidden position-relative text-white shadow-lg h-100">
                            <img src="{{asset('banner/'.$bannerRight->photo)}}" alt="{{$bannerRight->photo_alt}}" class="w-100 h-100 object-fit-cover">

                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center p-4"
                                 style="background: rgba(0,0,0,0.5);">
                                <div>
                                    <h4 class="fw-bold mb-2">{{$bannerRight->title}}</h4>
                                    <p class="mb-0">{{$bannerRight->description}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- بنر چپ -->
                <div class="col-lg-6">
                    <a href="{{$bannerLeft->link}}" class="d-block h-100">
                        <div class="banner-half rounded-4 overflow-hidden position-relative text-white shadow-lg h-100">
                            <img src="{{asset('banner/'.$bannerLeft->photo)}}" alt="{{$bannerLeft->photo_alt}}" class="w-100 h-100 object-fit-cover">

                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center p-4"
                                 style="background: rgba(0,0,0,0.5);">
                                <div>
                                    <h4 class="fw-bold mb-2">{{$bannerLeft->title}}</h4>
                                    <p class="mb-0">{{$bannerLeft->description}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
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
                                <a href="{{route('front.category.show', $category->slug)}}">
                                    <img src="{{asset('category/'.$category->photo)}}" class="w-100" alt="{{$category->photo_alt}}">
                                </a>

                                <div class="p-4" style="text-align: center;">
                                   <a href="{{route('front.category.show', $category->slug)}}" style="text-decoration: none;color: black;">
                                       <h5 class="mb-2">{{$category->name}}</h5>
                                   </a>

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
                                <a href="{{route('front.article.show',$blog->slug)}}" class="btn btn-outline-dark btn-sm rounded-pill px-4">ادامه مطلب →</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

@endsection
