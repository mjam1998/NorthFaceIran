@extends('front.layout.master')

@section('page_title')
    {{ $category->page_title }}
@endsection

@section('meta_description')
    {{ $category->meta_description}}
@endsection

@section('content')
    <!-- Hero Section با عکس دسته‌بندی -->
    <section class="hero position-relative overflow-hidden" style="height: 60vh; min-height: 400px;">
        <img src="{{ asset('category/' . $category->photo) }}"
             alt="{{ $category->photo_alt }}"
             class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" style="z-index: -1;">

        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center text-white"
             style="background: rgba(0,0,0,0.5);">
            <div class="container">
                <h1 class="display-4 fw-bold">{{ $category->name }}</h1>
                <p class="lead">بهترین تجهیزات و لباس‌های نورث فیس در دسته {{ $category->name }}</p>
            </div>
        </div>
    </section>

    <!-- بخش محصولات دسته‌بندی -->
    <section class="py-5 bg-light">
        <div class="container px-4">
            <div class="row mb-4">
                <div class="col-lg-6">
                    <h2 class="fw-bold">محصولات دسته: {{ $category->name }}</h2>
                    <p class="text-muted">{{ $products->total() }} محصول یافت شد</p>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex flex-column flex-md-row gap-3 justify-content-lg-end">
                        <!-- جستجو -->
                        <form action="{{ route('front.category.show', $category->slug) }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control" placeholder="جستجو در این دسته..."
                                   value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>

                        <!-- مرتب‌سازی -->
                        <form action="{{ route('front.category.show', $category->slug) }}" method="GET">
                            <select name="sort" class="form-select" onchange="this.form.submit()">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>جدیدترین</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>ارزان‌ترین</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>گران‌ترین</option>
                            </select>
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                        </form>
                    </div>
                </div>
            </div>

            <!-- لیست محصولات -->
            @if($products->count() > 0)
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

                <!-- صفحه‌بندی -->
                <div class="mt-5">
                    {{ $products->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                </div>
            @else
                <div class="text-center py-5">
                    <h4>محصولی در این دسته یافت نشد.</h4>
                    <a href="{{ route('home.index') }}" class="btn btn-primary mt-3">بازگشت به صفحه اصلی</a>
                </div>
            @endif
        </div>
    </section>
@endsection
