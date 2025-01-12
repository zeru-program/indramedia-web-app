
<div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('dashboard.products.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-2 d-flex justify-content-center">
                    <img src="http://127.0.0.1:8000/images/new/logo-1.png" alt="product image" id="img-create" class="img-thumbnail" style="width: 200px;height: 200px">
                </div>
                <div class="mb-3 row">
                    <div class="col-12">
                        <label for="image_path">Gambar Produk</label>
                        <input type="file" accept="image/png, image/gif, image/jpeg" name="image_path" placeholder="Input Image Path" class="form-control" onchange="changeInputImgCreate(event)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-6">
                        <label for="sku">SKU</label>
                        <input type="text" name="sku" placeholder="Kode Unik Produk"
                            class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" placeholder="Masukan Nama Produk"
                        class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12">
                        <label for="brand">Brand</label>
                        <select type="text" name="brand" id="brand_create" value="indramedia" placeholder="Input Product Brand"
                            class="form-control select2 select2-create" required>
                            <option value="indramedia">Indramedia</option>
                            <option value="endez">Endez</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12">
                        <label for="description">Description</label>
                        <textarea name="description" placeholder="Optional" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-6">
                        <label for="category">Kategori</label>
                        <select type="text" name="category" id="category_create" placeholder="Masukan Ketegori produk"
                            class="form-control select2 select2-category" required>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="type">Tipe Produk</label>
                        <select name="type" id="type_create" placeholder="Pilih Tipe Produk"
                            class="form-control select2 select2-type" required>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-6">
                        <label for="price">Harga Produk</label>
                        <input type="number" step="0.01" name="price"
                            placeholder="Harga Satuan" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label for="stock">Stok</label>
                        <input type="number" name="stock" placeholder="Masukan Stok Produk"
                            class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-6">
                        <label for="is_populer">Is Popular</label>
                        <select name="is_populer" id="isPopular_create" value="0" class="form-control select2 select2-create" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    {{-- <div class="col-6">
                        <label for="is_featured">Is Featured</label>
                        <select name="is_featured" id="isFeatured_create" value="0" class="form-control select2 select2-create" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div> --}}
                    <div class="col-6">
                        <label for="is_promo">Is Promo</label>
                        <select name="is_promo" disabled id="isPromo_create" value="0" class="form-control select2 select2-create" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12">
                        <label for="produk_file">Produk Bisa Input File</label>
                        <select name="produk_file" id="produk_file_create" value="tidak" class="form-control select2 select2-create" required>
                            <option value="tidak">Tidak</option>
                            <option value="multiple">Ya, bisa banyak file</option>
                            <option value="hanya1">Ya, hanya 1 file</option>
                        </select>
                        <input type="text" hidden value="false" name="is_featured">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12">
                        <label for="status">Status</label>
                        <select name="status" id="status_create" value="draft" class="form-control select2 select2-create" required>
                            <option value="draft">Draft</option>
                            <option value="active">Active</option>
                        </select>
                        <input type="text" hidden value="false" name="is_featured">
                    </div>
                </div>
                <span class="text-danger" style="font-size: .8em">Untuk mengatur promo silakan ke menu promo setelah membuat produk</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn text-light bg-accent">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>