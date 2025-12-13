<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
         $products=Product::all();
         $categories=Category::all();
         return view('admin.product.index',compact('products','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => [
                'required',
                'regex:/^[a-z-]+$/',
                'unique:products,slug',
            ],

            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id|not_in:0',

            'discount' => 'nullable|numeric|min:0|lte:price',
            'meta_description' => 'required|string',
            'page_title' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'weight' => 'required|string|max:100',
            'dimension' => 'required|string|max:100',
        ], [

            'name.required' => 'وارد کردن نام الزامی است.',
            'name.max' => 'نام محصول نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'slug.required' => 'وارد کردن اسلاگ الزامی است.',
            'slug.regex' => 'اسلاگ فقط می‌تواند حروف انگلیسی کوچک (a-z) باشد. عدد، خط تیره، فاصله یا کاراکتر خاص مجاز نیست.',
            'slug.unique' => 'این اسلاگ قبلاً استفاده شده است.',


            'price.required' => 'وارد کردن قیمت الزامی است.',
            'price.numeric' => 'قیمت باید عدد معتبر باشد.',
            'price.min' => 'قیمت نمی‌تواند منفی باشد.',

            'category_id.required' => 'انتخاب دسته‌بندی الزامی است.',
            'category_id.exists' => 'دسته‌بندی انتخاب‌شده معتبر نیست.',
            'category_id.not_in' => 'لطفاً یک دسته‌بندی معتبر انتخاب کنید.',



            'discount.numeric' => 'میزان تخفیف باید عدد معتبر باشد.',
            'discount.min' => 'میزان تخفیف نمی‌تواند منفی باشد.',
            'discount.lte' => 'میزان تخفیف نمی‌تواند بیشتر از قیمت محصول باشد.',

            'meta_description.required' => 'وارد کردن توضیحات متا (Meta Description) الزامی است.',


            'page_title.required' => 'وارد کردن عنوان صفحه (Page Title) الزامی است.',
            'page_title.max' => 'عنوان صفحه نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'material.required' => 'وارد کردن جنس محصول الزامی است.',
            'material.max' => 'جنس محصول نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'weight.required' => 'وارد کردن وزن الزامی است.',
            'weight.max' => 'وزن نمی‌تواند بیشتر از ۱۰۰ کاراکتر باشد.',

            'dimension.required' => 'وارد کردن ابعاد الزامی است.',
            'dimension.max' => 'ابعاد نمی‌تواند بیشتر از ۱۰۰ کاراکتر باشد.',

        ]);
        $data = $request->all();


        $data['discount'] = $request->filled('discount') ? $request->input('discount') : null;
        Product::query()->create($data);
        return redirect()->back()->with('productMessage','محصول با موفقیت افزوده شد.');
    }

    public function edit(Request $request, $id)
    {
        $product=Product::query()->findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => [
                'required',
                'regex:/^[a-z-]+$/',
                'unique:products,slug,' . $id,
            ],

            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id|not_in:0',

            'discount' => 'nullable|numeric|min:0|lte:price',
            'meta_description' => 'required|string',
            'page_title' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'weight' => 'required|string|max:100',
            'dimension' => 'required|string|max:100',
            'description' => 'required',
        ], [

            'name.required' => 'وارد کردن نام الزامی است.',
            'name.max' => 'نام محصول نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'slug.required' => 'وارد کردن اسلاگ الزامی است.',
            'slug.regex' => 'اسلاگ فقط می‌تواند حروف انگلیسی کوچک (a-z) باشد. عدد، خط under line، فاصله یا کاراکتر خاص مجاز نیست.',
            'slug.unique' => 'این اسلاگ قبلاً استفاده شده است.',


            'price.required' => 'وارد کردن قیمت الزامی است.',
            'price.numeric' => 'قیمت باید عدد معتبر باشد.',
            'price.min' => 'قیمت نمی‌تواند منفی باشد.',

            'category_id.required' => 'انتخاب دسته‌بندی الزامی است.',
            'category_id.exists' => 'دسته‌بندی انتخاب‌شده معتبر نیست.',
            'category_id.not_in' => 'لطفاً یک دسته‌بندی معتبر انتخاب کنید.',



            'discount.numeric' => 'میزان تخفیف باید عدد معتبر باشد.',
            'discount.min' => 'میزان تخفیف نمی‌تواند منفی باشد.',
            'discount.lte' => 'میزان تخفیف نمی‌تواند بیشتر از قیمت محصول باشد.',

            'meta_description.required' => 'وارد کردن توضیحات متا (Meta Description) الزامی است.',


            'page_title.required' => 'وارد کردن عنوان صفحه (Page Title) الزامی است.',
            'page_title.max' => 'عنوان صفحه نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'material.required' => 'وارد کردن جنس محصول الزامی است.',
            'material.max' => 'جنس محصول نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'weight.required' => 'وارد کردن وزن الزامی است.',
            'weight.max' => 'وزن نمی‌تواند بیشتر از ۱۰۰ کاراکتر باشد.',

            'dimension.required' => 'وارد کردن ابعاد الزامی است.',
            'dimension.max' => 'ابعاد نمی‌تواند بیشتر از ۱۰۰ کاراکتر باشد.',

        ]);
        $data = $request->all();


        $data['discount'] = $request->filled('discount') ? $request->input('discount') : null;
        $product->update($data);
        return redirect()->back()->with('productMessage','محصول با موفقیت ویرایش شد.');
    }
}
