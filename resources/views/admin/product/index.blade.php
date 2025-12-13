@extends('admin.layout.master')

@section('title')
   مدیریت محصولات
@endsection

@section('content')
    <div class="profile-content ">
        <div class="profile-section active" >


            <h3 class="section-title"><i class="bi bi-info-circle-fill"></i> مدیریت محصولات</h3>
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
            @if(session()->has('productMessage'))
                <p class="text text-success">{{session('productMessage')}}</p>
            @endif
            <div class="panel-body mt-4">
                <form method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label  class="control-label" >نام محصول</label>
                                <input type="text" class="form-control mt-2" name="name"  required >

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label  class="control-label" >اسلاگ</label>
                                <input type="text" class="form-control mt-2" name="slug"  required  >

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >قیمت( تومان)</label>
                                <input type="text" class="form-control moneyDisplay"  >

                                <input type="hidden" class="moneyValue" name="price">
                            </div>
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label  class="control-label"> دسته بندی</label>
                                <select  class="form-control mt-2" name="category_id"  >
                                    <option value="0">دسته بندی را انتخاب کنید...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label  class="control-label" >ابعاد </label>
                                <input type="text" class="form-control mt-2" name="dimension" placeholder="مثلا 20*12*14 سانتی متر"  required >

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label  class="control-label" >میزان تخفیف(تومان)</label>

                                <input type="text" class=" moneyDisplay form-control "  placeholder="میتواند خالی باشد" >

                                <input type="hidden" class="moneyValue" name="discount">
                            </div>
                        </div>

                    </div>


                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label  class="control-label" >meta description </label>
                                <input type="text" class="form-control mt-2" name="meta_description"  required  >

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label  class="control-label" >page title </label>
                                <input type="text" class="form-control mt-2" name="page_title"   required >

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label  class="control-label" >جنس محصول </label>
                                <input type="text" class="form-control mt-2" name="material"   required >

                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label  class="control-label" >وزن </label>
                                <input type="text" class="form-control mt-2" name="weight" placeholder="مثلا 2.5 گرم" required  >

                            </div>
                        </div>


                    </div>
                    <div class="row mt-4">
                        <div class="form-group">
                            <label  class="control-label" >توضیحات محصول </label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row text-center mt-3">
                        <div class="col-md-3  text-center mt-2"> <button type="submit" class="btn btn-success waves-effect waves-light m-b-5 "
                                                                         style=" text-align: center;
                              display: flex;
                              align-items: center;
                              justify-content: center;
                              width: 100%;" >افزودن</button></div>

                        <div class="col-md-3 mt-2"></div>
                        <div class="col-md-3 mt-2"></div>
                    </div>



                </form>
            </div>
            <div class="table-container  " style="margin-top: 50px;">
                <table id="datatable" class=" table table-hover table-bordered mt-3  mb-3  ">
                    <thead >
                    <tr  >
                        <th style="text-align: center">اسلاگ</th>
                        <th style="text-align: center">نام</th>
                        <th style="text-align: center">دسته بندی</th>
                        <th style="text-align: center">عملیات</th>
                    </tr>
                    </thead>
                    <tbody id="transactionsTable">
                    @foreach($products as $product)
                        <tr>
                            <td style="text-align: center">{{$product->slug}}</td>
                            <td style="text-align: center">{{$product->name}}</td>
                            <td style="text-align: center">{{$product->category->name}}</td>
                            <td style="text-align: center">
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editModal"
                                        onclick="fillEditModal({{ $product }})">
                                    <i class="bi bi-pencil-square"></i> ویرایش
                                </button>
                                <a class="btn btn-danger btn-sm "><i class="bi bi-pencil-square"></i>موجودی</a>
                                <a class="btn btn-info btn-sm "><i class="bi bi-pencil-square"></i>رنگها</a>
                                <a class="btn btn-success btn-sm "><i class="bi bi-pencil-square"></i>عکسها</a>
                                <a class="btn btn-secondary btn-sm "><i class="bi bi-pencil-square"></i>سایزها</a>
                                <a class="btn btn-primary btn-sm "><i class="bi bi-pencil-square"></i>کامنتها</a>

                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title">ویرایش محصول</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">

                        <div class="row g-3">
                            <!-- نام و اسلاگ -->
                            <div class="col-md-6">
                                <label>نام محصول</label>
                                <input type="text" name="name" id="edit_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>اسلاگ</label>
                                <input type="text" name="slug" id="edit_slug" class="form-control" required>
                            </div>

                            <!-- قیمت و تخفیف -->
                            <div class="col-md-6">
                                <label>قیمت (تومان)</label>
                                <input type="text" class="form-control moneyDisplay" id="edit_price_display">
                                <input type="hidden" class="moneyValue" name="price" id="edit_price">
                            </div>
                            <div class="col-md-6">
                                <label>میزان تخفیف (تومان) - اختیاری</label>
                                <input type="text" class="form-control moneyDisplay" id="edit_discount_display">
                                <input type="hidden" class="moneyValue" name="discount" id="edit_discount">
                            </div>

                            <!-- دسته‌بندی و تعداد موجودی -->
                            <div class="col-md-4">
                                <label>دسته‌بندی</label>
                                <select class="form-control" name="category_id" id="edit_category_id">
                                    <option value="0">دسته بندی را انتخاب کنید...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- جنس، وزن، ابعاد -->
                            <div class="col-md-4">
                                <label>جنس محصول</label>
                                <input type="text" name="material" id="edit_material" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>وزن</label>
                                <input type="text" name="weight" id="edit_weight" class="form-control" placeholder="مثلا 2.5 گرم" required>
                            </div>
                            <div class="col-md-4">
                                <label>ابعاد</label>
                                <input type="text" name="dimension" id="edit_dimension" class="form-control" placeholder="مثلا 20*12*14 سانتی متر" required>
                            </div>

                            <!-- متا و عنوان صفحه -->
                            <div class="col-md-4">
                                <label>Meta Description</label>
                                <input type="text" name="meta_description" id="edit_meta_description" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>Page Title</label>
                                <input type="text" name="page_title" id="edit_page_title" class="form-control" required>
                            </div>
                            <div>
                                <label>توضیحات محصول</label>
                                <textarea name="description" id="edit_description" class="form-control" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-success">ذخیره تغییرات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

    <script>
        let mainEditor = null;
        let modalEditor = null;

        function formatNumber(num) {
            if (!num) return '';
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }

        // فرمت قیمت و تخفیف + ادیتور فرم ایجاد
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.moneyDisplay').forEach(function(displayInput) {
                let hiddenInput = displayInput.parentElement.querySelector('.moneyValue');

                displayInput.addEventListener('input', function() {
                    let value = this.value.replace(/[^\d]/g, '');
                    if (hiddenInput) hiddenInput.value = value || '';
                    this.value = formatNumber(value);
                });

                if (displayInput.value) {
                    let clean = displayInput.value.replace(/[^\d]/g, '');
                    displayInput.value = formatNumber(clean);
                    if (hiddenInput) hiddenInput.value = clean;
                }
            });

            // ادیتور فرم ایجاد محصول
            const mainTextarea = document.querySelector('textarea[name="description"]');
            if (mainTextarea) {
                ClassicEditor
                    .create(mainTextarea, {
                        language: 'fa',
                        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo']
                    })
                    .then(editor => mainEditor = editor)
                    .catch(error => console.error(error));
            }
        });

        // پر کردن مودال — فقط فیلدهای معمولی رو پر کن، توضیحات رو دست نزن
        function fillEditModal(product) {
            document.getElementById('editForm').action = `/admin/product/edit/${product.id}`;

            document.getElementById('edit_id').value = product.id;
            document.getElementById('edit_name').value = product.name;
            document.getElementById('edit_slug').value = product.slug;

            let price = product.price || 0;
            document.getElementById('edit_price').value = price;
            document.getElementById('edit_price_display').value = formatNumber(price);

            let discount = product.discount || 0;
            document.getElementById('edit_discount').value = discount;
            document.getElementById('edit_discount_display').value = formatNumber(discount);

            document.getElementById('edit_category_id').value = product.category_id;

            document.getElementById('edit_material').value = product.material;
            document.getElementById('edit_weight').value = product.weight;
            document.getElementById('edit_dimension').value = product.dimension;
            document.getElementById('edit_meta_description').value = product.meta_description;
            document.getElementById('edit_page_title').value = product.page_title;

            // فقط محتوای توضیحات رو در متغیر ذخیره کن — به textarea دست نزن!
            window.currentProductDescription = product.description || '';
        }

        const editModal = document.getElementById('editModal');

        editModal.addEventListener('shown.bs.modal', function () {
            const textarea = document.getElementById('edit_description');
            if (!textarea) return;

            // اگر ادیتور وجود نداره، بساز
            if (!modalEditor) {
                ClassicEditor
                    .create(textarea, {
                        language: 'fa',
                        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo']
                    })
                    .then(editor => {
                        modalEditor = editor;
                        editor.setData(window.currentProductDescription || '');
                    })
                    .catch(error => console.error('CKEditor error:', error));
            } else {
                // اگر وجود داره، فقط محتوا رو عوض کن
                modalEditor.setData(window.currentProductDescription || '');
            }
        });
    </script>
@endsection

