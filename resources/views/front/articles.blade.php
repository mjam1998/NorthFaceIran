@extends('front.layout.master')



@section('content')

    <section class="py-5" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('front/assets/images/about-hero.jpg') }}') no-repeat center center/cover; color: white;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-end">
                    <h1 class="display-4 fw-bold mb-4">مقالات</h1>

                </div>
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <img src="{{asset('front/assets/The-North-Face-Logo.png')}}" alt="لوگو نورث فیس" class="img-fluid" style="max-height: 200px;">
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 bg-light">
        <div class="container px-4">
            <div class="row mb-4">
                <div class="col-lg-6">

                    <p class="text-muted">{{ $blogs->total() }} مقاله یافت شد</p>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex flex-column flex-md-row gap-3 justify-content-lg-end">
                        <!-- جستجو -->
                        <form action="{{ route('front.articles.show') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control" placeholder="جستجو در مقالات..."
                                   value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>


                    </div>
                </div>
            </div>

            <!-- لیست محصولات -->
            @if($blogs->count() > 0)
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

                <!-- صفحه‌بندی -->
                <div class="mt-5">
                    {{ $blogs->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                </div>
            @else
                <div class="text-center py-5">
                    <h4>مقاله ای در این دسته یافت نشد.</h4>
                    <a href="{{ route('home.index') }}" class="btn btn-primary mt-3">بازگشت به صفحه اصلی</a>
                </div>
            @endif
        </div>
    </section>
@endsection

