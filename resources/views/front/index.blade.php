@extends('front.layout.master')

@section('content')
    <!-- Hero Section -->
    <section class="hero position-relative overflow-hidden">
        <!-- ویدیو پس‌زمینه -->
        <video autoplay loop muted playsinline preload="auto"
               class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
               style="z-index: -1;">
            <source src="{{asset('front/assets/norhface.mp4')}}" type="video/mp4">
            <source src="{{asset('front/assets/norhface.webm')}}" type="video/webm">
            <!-- فالبک عکس -->
            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920"
                 alt="northface" class="w-100 h-100 object-fit-cover">
        </video>

        <!-- لایه تیره + محتوا (همون div تو) -->
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center text-white"
             style="background: rgba(0,0,0,0.5); z-index: 1;">
            <div class="container px-4">
                <h1 class="display-3 display-md-2 display-lg-1 fw-bold mb-4">
                    Northface Iran
                </h1>
                <p class="lead fs-4 fs-md-3 mb-5 col-lg-8 mx-auto opacity-90">
                    تجهیزات حرفه‌ای کوهنوردی، کمپینگ نورث فیس با بهترین کیفیت
                </p>
                <a href="#products" class="btn btn-primary btn-lg px-5 py-3 shadow-lg " style="border-radius: 30px;">
                    خرید جدیدترین محصولات
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

                    <!-- محصول ۱ -->
                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 position-relative shadow-sm">

                            <img src="https://hamnavardco.ir/wp-content/uploads/2020/09/%D9%86%D9%88%D8%B1%D8%B3.jpg" class="w-100" alt="کاپشن">
                            <div class="p-4">
                                <h5 class="mb-2">کاپشن پر گورتکس پرو</h5>
                                <p class="text-muted small mb-3">ضدآب، تنفس‌پذیر، سبک</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">۴,۸۵۰,۰۰۰ تومان</span>
                                    <a href="#" class="btn btn-outline-success btn-sm">افزودن</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- محصول ۲ -->
                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 shadow-sm">
                            <img src="https://koohkade.com/wp-content/uploads/2025/11/S4408B-1-5.jpg" class="w-100" alt="کفش">
                            <div class="p-4">
                                <h5 class="mb-2">کفش کوهنوردی آلپاین</h5>
                                <p class="text-muted small mb-3">ویبرام، ضدآب، حرفه‌ای</p>
                                <span class="price">۶,۲۰۰,۰۰۰ تومان</span>
                                <a href="#" class="btn btn-outline-success btn-sm">افزودن</a>
                            </div>
                        </div>
                    </div>

                    <!-- محصول ۳ -->
                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 shadow-sm">

                            <img src="https://www.jantabag.com/wp-content/uploads/2024/09/%DA%A9%D9%88%D9%84%D9%87-%D9%BE%D8%B4%D8%AA%DB%8C-%D9%84%D9%BE-%D8%AA%D8%A7%D9%BE-%D8%B3%D9%81%D8%B1%DB%8C-bange-1.jpg" class="w-100" alt="کوله">
                            <div class="p-4">
                                <h5 class="mb-2">کوله ۷۰ لیتری اکسپدیشن</h5>
                                <p class="text-muted small mb-3">حجم بالا، حرفه‌ای</p>
                                <span class="price">۵,۹۰۰,۰۰۰ تومان</span>
                                <a href="#" class="btn btn-outline-success btn-sm">افزودن</a>
                            </div>
                        </div>
                    </div>

                    <!-- محصول ۴ -->
                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 shadow-sm">
                            <img src="https://cdnfa.com/senatormode/3622/files/4547145.jpg" class="w-100" alt="چادر">
                            <div class="p-4">
                                <h5 class="mb-2">چادر دوپوش ۲ نفره</h5>
                                <p class="text-muted small mb-3">ضدطوفان، نصب سریع</p>
                                <span class="price">۸,۷۵۰,۰۰۰ تومان</span>
                                <a href="#" class="btn btn-outline-success btn-sm">افزودن</a>
                            </div>
                        </div>
                    </div>

                    <!-- ۴ تا دیگه اضافه کردم که اسکرول بشه -->
                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 shadow-sm">
                            <img src="https://dkstatics-public.digikala.com/digikala-products/3d8e4f7g1h2j3k4l5m6n7o8p.jpg?x-oss-process=image/resize,m_lfit,h_800,w_800/format,webp/quality,q_90" class="w-100" alt="کیسه خواب">
                            <div class="p-4">
                                <h5 class="mb-2">کیسه خواب پر ۸۰۰ فیل</h5>
                                <p class="text-muted small mb-3">مناسب −۱۵ درجه</p>
                                <span class="price">۷,۲۰۰,۰۰۰ تومان</span>
                                <a href="#" class="btn btn-outline-success btn-sm">افزودن</a>
                            </div>
                        </div>
                    </div>

                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 shadow-sm">
                            <img src="https://www.technolife.ir/image/product/600_600/8f7g6h5j4k3l2z1x0c9v8b7n6m.jpg" class="w-100" alt="عصا">
                            <div class="p-4">
                                <h5 class="mb-2">عصای تاشو کربنی</h5>
                                <p class="text-muted small mb-3">فوق سبک</p>
                                <span class="price">۱,۶۵۰,۰۰۰ تومان</span>
                                <a href="#" class="btn btn-outline-success btn-sm">افزودن</a>
                            </div>
                        </div>
                    </div>

                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 shadow-sm">
                            <img src="https://dkstatics-public.digikala.com/digikala-products/121927346.jpg?x-oss-process=image/resize,m_lfit,h_800,w_800/format,webp/quality,q_90" class="w-100" alt="گتر">
                            <div class="p-4">
                                <h5 class="mb-2">گتر ضدآب بلند</h5>
                                <p class="text-muted small mb-3">مناسب برف و باران</p>
                                <span class="price">۱,۲۵۰,۰۰۰ تومان</span>
                                <a href="#" class="btn btn-outline-success btn-sm">افزودن</a>
                            </div>
                        </div>
                    </div>

                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 shadow-sm">

                            <img src="https://dkstatics-public.digikala.com/digikala-products/9a9b8c7d6e5f4g3h2i1j0k9l.jpg?x-oss-process=image/resize,m_lfit,h_800,w_800/format,webp/quality,q_90" class="w-100" alt="دستکش">
                            <div class="p-4">
                                <h5 class="mb-2">دستکش گورتکس زمستانی</h5>
                                <p class="text-muted small mb-3">ضدآب، گرم</p>
                                <span class="price">۲,۳۰۰,۰۰۰ تومان</span>
                                <a href="#" class="btn btn-outline-success btn-sm">افزودن</a>
                            </div>
                        </div>
                    </div>

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
                <img src="{{asset('front/assets/banner1-2400x869.jpg')}}" alt="بنر بزرگ" class="w-100 h-100 object-fit-cover">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center p-4"
                     style="background: rgba(0,0,0,0.45);">
                    <div>
                        <h3 class="fw-bold mb-3 fs-2">تخفیف ویژه پایان فصل</h3>
                        <p class="fs-5 mb-0">تا ۴۰٪ تخفیف روی تمام کاپشن‌ها و کفش‌های زمستانی نورث فیس</p>
                    </div>
                </div>
            </div>

            <!-- دو بنر کنار هم (در دسکتاپ) -->
            <div class="row g-4 " style="margin-top: 50px;">
                <div class="col-lg-6">
                    <div class="banner-half rounded-4 overflow-hidden position-relative text-white shadow-lg h-100">
                        <img src="{{asset('front/assets/banner-right.jpg')}}" alt="بنر ۱" class="w-100 h-100 object-fit-cover">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center p-4"
                             style="background: rgba(0,0,0,0.5);">
                            <div>
                                <h4 class="fw-bold mb-2">ارسال رایگان</h4>
                                <p class="mb-0">برای خریدهای بالای ۳ میلیون تومان</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="banner-half rounded-4 overflow-hidden position-relative text-white shadow-lg h-100">
                        <img src="{{asset('front/assets/banner-left.jpg')}}" alt="بنر ۲" class="w-100 h-100 object-fit-cover">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center p-4"
                             style="background: rgba(0,0,0,0.5);">
                            <div>
                                <h4 class="fw-bold mb-2">گارانتی اصالت کالا</h4>
                                <p class="mb-0">تمام محصولات اورجینال با ضمانت بازگشت ۷ روزه</p>
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

                    <!-- محصول ۱ -->
                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 position-relative shadow-sm">

                            <img src="https://hamnavardco.ir/wp-content/uploads/2020/09/%D9%86%D9%88%D8%B1%D8%B3.jpg" class="w-100" alt="کاپشن">
                            <div class="p-4">
                                <h5 class="mb-2">کاپشن پر گورتکس پرو</h5>

                            </div>
                        </div>
                    </div>
                    <!-- محصول ۱ -->
                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 position-relative shadow-sm">

                            <img src="https://hamnavardco.ir/wp-content/uploads/2020/09/%D9%86%D9%88%D8%B1%D8%B3.jpg" class="w-100" alt="کاپشن">
                            <div class="p-4">
                                <h5 class="mb-2">کاپشن پر گورتکس پرو</h5>

                            </div>
                        </div>
                    </div>
                    <!-- محصول ۱ -->
                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 position-relative shadow-sm">

                            <img src="https://hamnavardco.ir/wp-content/uploads/2020/09/%D9%86%D9%88%D8%B1%D8%B3.jpg" class="w-100" alt="کاپشن">
                            <div class="p-4">
                                <h5 class="mb-2">کاپشن پر گورتکس پرو</h5>

                            </div>
                        </div>
                    </div>
                    <!-- محصول ۱ -->
                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 position-relative shadow-sm">

                            <img src="https://hamnavardco.ir/wp-content/uploads/2020/09/%D9%86%D9%88%D8%B1%D8%B3.jpg" class="w-100" alt="کاپشن">
                            <div class="p-4">
                                <h5 class="mb-2">کاپشن پر گورتکس پرو</h5>

                            </div>
                        </div>
                    </div>
                    <!-- محصول ۱ -->
                    <div class="flex-shrink-0" style="width: 280px;">
                        <div class="product-card h-100 position-relative shadow-sm">

                            <img src="https://hamnavardco.ir/wp-content/uploads/2020/09/%D9%86%D9%88%D8%B1%D8%B3.jpg" class="w-100" alt="کاپشن">
                            <div class="p-4">
                                <h5 class="mb-2">کاپشن پر گورتکس پرو</h5>

                            </div>
                        </div>
                    </div>















                </div>
            </div>
        </div>
    </section>
    <!-- مقالات جدید -->
    <section class="py-5">
        <div class="container px-4">
            <h2 class="section-title text-center mb-5">مقالات جدید</h2>

            <div class="row g-4">
                <!-- مقاله ۱ -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="article-card h-100 shadow-sm rounded-4 overflow-hidden bg-white">
                        <img src="{{asset('front/assets/article.jpg')}}"
                             alt="مقاله کوهنوردی" class="w-100" style="height: 200px; object-fit: cover;">
                        <div class="p-4">
                            <h5 class="fw-bold mb-3">۱۰ نکته طلایی برای کوهنوردی زمستانی</h5>
                            <p class="text-muted small lh-lg">
                                با رعایت این نکات ساده، حتی در سخت‌ترین شرایط زمستانی هم ایمن و گرم بمانید...
                            </p>
                            <a href="#" class="btn btn-outline-dark btn-sm rounded-pill px-4">ادامه مطلب →</a>
                        </div>
                    </div>
                </div>

                <!-- مقاله ۲ -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="article-card h-100 shadow-sm rounded-4 overflow-hidden bg-white">
                        <img src="assets/article.jpg"
                             alt="تجهیزات کمپینگ" class="w-100" style="height: 200px; object-fit: cover;">
                        <div class="p-4">
                            <h5 class="fw-bold mb-3">چطور بهترین کوله‌پشتی رو انتخاب کنیم؟</h5>
                            <p class="text-muted small lh-lg">
                                راهنمای کامل خرید کوله‌پشتی مناسب برای سفرهای یک‌روزه تا اکسپدیشن‌های چندروزه...
                            </p>
                            <a href="#" class="btn btn-outline-dark btn-sm rounded-pill px-4">ادامه مطلب →</a>
                        </div>
                    </div>
                </div>

                <!-- مقاله ۳ -->
                <div class="col-lg-3 col-md-6 col-6 ">
                    <div class="article-card h-100 shadow-sm rounded-4 overflow-hidden bg-white">
                        <img src="assets/article.jpg"
                             alt="کمپینگ" class="w-100" style="height: 200px; object-fit: cover;">
                        <div class="p-4">
                            <h5 class="fw-bold mb-3">۵ مکان بکر برای کمپینگ در ایران</h5>
                            <p class="text-muted small lh-lg">
                                از دشت لوت تا جنگل‌های هیرکانی؛ جاهایی که حتماً باید یه بار تجربه‌شون کنید...
                            </p>
                            <a href="#" class="btn btn-outline-dark btn-sm rounded-pill px-4">ادامه مطلب →</a>
                        </div>
                    </div>
                </div>

                <!-- مقاله ۴ -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="article-card h-100 shadow-sm rounded-4 overflow-hidden bg-white">
                        <img src="assets/article.jpg"
                             alt="لباس کوهنوردی" class="w-100" style="height: 200px; object-fit: cover;">
                        <div class="p-4">
                            <h5 class="fw-bold mb-3">لایه‌بندی لباس در کوهنوردی (Layering)</h5>
                            <p class="text-muted small lh-lg">
                                سیستم سه‌لایه حرفه‌ای: چطور همیشه خشک و گرم بمونیم حتی در بارون و برف...
                            </p>
                            <a href="#" class="btn btn-outline-dark btn-sm rounded-pill px-4">ادامه مطلب →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
