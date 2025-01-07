@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Artikel</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Artikel</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <div class="box-info">
            <div>
                <i class='bx bxs-calendar-check bg-light-accent text-accent'></i>
                <span class="text">
                    <h3>1020</h3>
                    <p>New Order</p>
                </span>
            </div>
            <div>
                <i class='bx bxs-group bg-light-accent text-accent'></i>
                <span class="text">
                    <h3>2834</h3>
                    <p>Visitors</p>
                </span>
            </div>
            <div>
                <i class='bx bxs-dollar-circle bg-light-accent text-accent'></i>
                <span class="text">
                    <h3>$2543</h3>
                    <p>Total Sales</p>
                </span>
            </div>
        </div>


        <div class="table-data">
            <div class="order">
                <div class="head d-flex flex-wrap">
                    <h3>Artikel Indramedia (Coming Soon)</h3>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="d-flex flex-wrap gap-3">
                            <button class="d-flex align-items-center gap-2 btn bg-accent text-light" data-bs-toggle="modal"
                                data-bs-target="#modalCreate">
                                <i class='bi bi-plus-lg'></i>
                                <span>Create</span>
                            </button>
                            <button class="d-flex align-items-center gap-2 btn bg-accent text-light" data-bs-toggle="modal"
                                data-bs-target="#modalFilter">
                                <i class='bx bx-filter'></i>
                                <span>Filter</span>
                            </button>
                        </div>
                        <div class="d-flex gap-2 align-items-center position-relative">
                            <input type="text" placeholder="Search by id orders" id="search_order_id"
                                style="padding-right: 35px" class="form-control">
                            <i class='bx bx-search position-absolute' style="right: 15px"></i>
                        </div>
                    </div>
                    <!-- Modal Create -->
                    <div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Create</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('dashboard.products.post') }}" method="post"
                                        enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="sku">SKU</label>
                                            <input type="text" name="sku" placeholder="Input SKU"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="image_path">Image Product</label>
                                            <input type="file" accept="image/png, image/gif, image/jpeg"
                                                name="image_path" placeholder="Input Image Path" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" placeholder="Input Product Name"
                                            class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="type">Type</label>
                                            <select name="type" id="type_create" placeholder="Input Product Type"
                                                class="form-control select2 select2-create" required>
                                                <option value="barang">Barang</option>
                                                <option value="jasa">Jasa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-12">
                                            <label for="description">Description</label>
                                            <textarea name="description" placeholder="Optional" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="category">Category</label>
                                            <select type="text" name="category" id="category_create" placeholder="Input Product Category"
                                                class="form-control select2 select2-create" required>
                                                <option hidden>Pilih Kategori</option>
                                                <option value="pensil">Pensil</option>
                                                <option value="buku">Buku</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="brand">Brand</label>
                                            <select type="text" name="brand" id="brand_create" value="indramedia" placeholder="Input Product Brand"
                                                class="form-control select2 select2-create" required>
                                                <option value="indramedia">Indramedia</option>
                                                <option value="endez">Endez</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="price">Price</label>
                                            <input type="number" step="0.01" name="price"
                                                placeholder="Input Product Price" class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="stock">Stock</label>
                                            <input type="number" name="stock" placeholder="Input Product Stock"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="is_populer">Is Popular</label>
                                            <select name="is_populer" id="isPopular_create" value="0" class="form-control select2 select2-create" required>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="is_featured">Is Featured</label>
                                            <select name="is_featured" id="isFeatured_create" value="0" class="form-control select2 select2-create" required>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="is_promo">Is Promo</label>
                                            <select name="is_promo" disabled id="isPromo_create" value="0" class="form-control select2 select2-create" required>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="status">Status</label>
                                            <select name="status" id="status_create" value="draft" class="form-control select2 select2-create" required>
                                                <option value="draft">Draft</option>
                                                <option value="active">Active</option>
                                            </select>
                                        </div>
                                    </div>
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
                    <!-- Modal Filter -->
                    <div class="modal fade" id="modalFilter" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Filter</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn text-light bg-accent">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Edit -->
                </div>
                {{-- <table id="myTable" class="table-admin mt-3 mb-3 rounded-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>SKU</th>
                            <th>Image</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Populer</th>
                            <th>Promo</th>
                            <th>Status</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table> --}}
            </div>
        </div>
    </main>
@endsection

@section('script')
    @if (session()->has('success_create_product'))
        <script>
            toastMixin.fire({
                animation: true,
                title: "{{ session('success_create_product') }}"
            });
        </script>
    @endif
    @if ($errors->has('error_create_product'))
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ $errors->first('error_create_product') }}"
            });
        </script>
    @endif
    @if ($errors->has('duplicate_entry'))
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ $errors->first('duplicate_entry') }}"
            });
        </script>
    @endif
    @if (session()->has('success_edit_product'))
        <script>
            toastMixin.fire({
                animation: true,
                title: "{{ session('success_edit_product') }}"
            });
        </script>
    @endif
    @if (session()->has('error_edit_product'))
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ session('error_edit_product') }}"
            });
        </script>
    @endif
    @if (session()->has('success_delete_product'))
        <script>
            toastMixin.fire({
                animation: true,
                title: "{{ session('success_delete_product') }}"
            });
        </script>
    @endif
    @if (session()->has('error_delete_product'))
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ session('error_delete_product') }}"
            });
        </script>
    @endif
    <script>
        function changeInputImgEdit(e) {
            const file = e.target.files[0]; // Ambil file yang dipilih
            const imgElement = document.getElementById("img-edit");

            if (file) {
                const reader = new FileReader(); // Buat instance FileReader

                // Callback untuk saat file selesai dibaca
                reader.onload = function(event) {
                    imgElement.src = event.target.result; // Perbarui src gambar
                };

                reader.readAsDataURL(file); // Baca file sebagai Data URL
            }
        }
        function popupDelete() {
            Swal.fire({
                title: 'Kamu Yakin?',
                text: "Kamu akan menghapus data product ini",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya hapus!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('form-delete').submit();
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            // init select2
            $(".select2-create").select2({
                dropdownParent: $('#modalCreate')
            })

            var table = $('#myTable').DataTable({
                searching: false,
                paging: true,
                info: true,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.products') }}"
                },
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'sku', // Kolom ID
                        searchable: true
                    },
                    {
                        data: 'image_path', // Kolom Image Path
                        render: function(data) {
                            if (data) {
                                return `<img src="${window.location.origin}/storage/${data}" alt="Product Image" class="img-tbody">`;
                            }
                            return `<span class="badge bg-secondary">No Image</span>`;
                        }
                    },
                    {
                        data: 'name', // Kolom Nama Produk
                        searchable: true
                    },
                    {
                        data: 'price', // Kolom Harga
                        render: function(data) {
                            if (data) {
                                // Format ke mata uang Rupiah
                                return parseFloat(data).toLocaleString('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0
                                }).replace('IDR', '').trim();
                            }
                            return 'Rp0';
                        }
                    },
                    {
                        data: 'stock', // Kolom Stok
                        render: function(data) {
                            return data || 0; // Tampilkan 0 jika stok kosong/null
                        }
                    },
                    {
                        data: 'is_populer', // Kolom Populer
                        render: function(data) {
                            return data ? `<div class="badge bg-primary">Ya</div>` :
                                `<div class="badge bg-secondary">Tidak</div>`;
                        }
                    },
                    {
                        data: 'is_promo', // Kolom Promo
                        render: function(data) {
                            return data ? `<div class="badge bg-primary">Ya</div>` :
                                `<div class="badge bg-secondary">Tidak</div>`;
                        }
                    },
                    {
                        data: 'status', // Kolom Status
                        render: function(data) {
                            if (data === 'active') {
                                return `<div class="badge bg-success">Active</div>`;
                            } else if (data === 'draft') {
                                return `<div class="badge bg-danger">Draft</div>`;
                            } else {
                                return `<div class="badge bg-danger">Unknown</div>`;
                            }
                        }
                    },
                    {
                        data: 'created_at', // Kolom Dibuat Pada
                        render: function(data) {
                            if (data) {
                                const date = new Date(data);
                                return date.toLocaleString('id-ID', {
                                    year: 'numeric',
                                    month: '2-digit',
                                    day: '2-digit',
                                }).replace(',', ''); // Format tanggal lokal
                            }
                            return '';
                        }
                    },
                    {
                        data: 'action', // Kolom Aksi
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#search_order_id').on('keyup', function() {
                table.column(2).search(this.value).draw();
            });
        });

        function handleDetail(data) {
            // Parse the data if it's passed as a JSON string
            const rowData = typeof data === 'string' ? JSON.parse(data) : data;

            // Remove existing modal if present
            $('#modalDetail').remove();

            // Construct the modal with input fields pre-filled with rowData
            const appendHtml = `
                <div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Detail Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex flex-column gap-2">
                                    <div class="row">
                                        <div class="d-flex col-12 justify-content-center">
                                            <img src="${window.location.origin}/storage/${rowData.image_path}" alt="${rowData.name || ''}" id="img-edit" class="img-thumbnail" width="50%">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex col-6 flex-column">
                                            <label>ID Produk</label>
                                            <div class="badge bg-primary">${rowData.id || 'N/A'}</div>
                                        </div>
                                        <div class="d-flex col-6 flex-column">
                                            <label>SKU</label>
                                            <div class="badge bg-primary">${rowData.sku || 'N/A'}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex col-6 flex-column">
                                            <label>Nama Produk</label>
                                            <div class="badge bg-primary">${rowData.name || 'N/A'}</div>
                                        </div>
                                        <div class="d-flex col-6 flex-column">
                                            <label>Deskripsi</label>
                                            <div class="badge bg-primary">${rowData.description || 'N/A'}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex col-6 flex-column">
                                            <label>Tipe Produk</label>
                                            <div class="badge bg-primary">${rowData.type || 'N/A'}</div>
                                        </div>
                                        <div class="d-flex col-6 flex-column">
                                            <label>Kategori</label>
                                            <div class="badge bg-primary">${rowData.category || 'N/A'}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex col-6 flex-column">
                                            <label>Merek</label>
                                            <div class="badge bg-primary">${rowData.brand || 'N/A'}</div>
                                        </div>
                                        <div class="d-flex col-6 flex-column">
                                            <label>Harga</label>
                                            <div class="badge bg-primary">${parseFloat(rowData.price).toLocaleString('id-ID', {
                                                style: 'currency',
                                                currency: 'IDR',
                                                minimumFractionDigits: 0
                                            }).replace('IDR', '').trim() || 'N/A'}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex col-6 flex-column">
                                            <label>Stok</label>
                                            <div class="badge bg-primary">${rowData.stock || 'N/A'}</div>
                                        </div>
                                        <div class="d-flex col-6 flex-column">
                                            <label>Produk Populer</label>
                                            <div class="badge bg-primary">${rowData.is_populer === 'true' ? 'Ya' : 'Tidak'}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex col-6 flex-column">
                                            <label>Produk Unggulan</label>
                                            <div class="badge bg-primary">${rowData.is_featured === 'true' ? 'Ya' : 'Tidak'}</div>
                                        </div>
                                        <div class="d-flex col-6 flex-column">
                                            <label>Produk Promo</label>
                                            <div class="badge bg-primary">${rowData.is_promo === 'true' ? 'Ya' : 'Tidak'}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex col-6 flex-column">
                                            <label>Status</label>
                                            <div class="badge bg-primary">${rowData.status || 'N/A'}</div>
                                        </div>
                                        <div class="d-flex col-6 flex-column">
                                            <label>Waktu Dibuat</label>
                                            <div class="badge bg-primary">${rowData.created_at.slice(0, 16) || 'N/A'}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-flex col-12 flex-column">
                                            <label>Waktu Diperbarui</label>
                                            <div class="badge bg-primary">${rowData.updated_at.slice(0, 16) || 'N/A'}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

            // Add the modal to the DOM
            $('body').append(appendHtml);

            // Initialize and show the modal
            const modal = new bootstrap.Modal($('#modalDetail')[0], {
                backdrop: 'static',
                keyboard: false
            });
            modal.show();

            // Clean up modal after closing
            $('#modalDetail').on('hidden.bs.modal', function () {
                $(this).remove();
            });
        }

        function handleEdit(data) {
            // Parse the data if it's passed as a JSON string
            const rowData = typeof data === 'string' ? JSON.parse(data) : data;

            // Remove existing modal if present
            $('#modalEdit').remove();

            const editUrl = rowData.urlEdit;

            // Construct the modal with input fields pre-filled with rowData
            const appendHtml = `
            <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="${rowData.urlEdit}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-2 d-flex justify-content-center">
                                    <img src="${window.location.origin}/storage/${rowData.image_path}" alt="${rowData.name || ''}" id="img-edit" class="img-thumbnail" width="50%">
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-12">
                                        <label for="image_path">New Image</label>
                                        <input type="file" name="image_path_new" onchange="changeInputImgEdit(event)" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-6">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Input Product Name" value="${rowData.name || ''}" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="sku">SKU</label>
                                        <input type="text" name="sku" class="form-control" placeholder="Input Product SKU" value="${rowData.sku || ''}" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" placeholder="Optional">${rowData.description || ''}</textarea>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-6">
                                        <label for="type">Product Type</label>
                                        <select name="type" id="type_edit" class="form-control select2 select2-edit" required>
                                            <option value="barang" ${rowData.type === "barang" ? 'selected' : ''}>Barang</option>
                                            <option value="jasa" ${rowData.type === "jasa" ? 'selected' : ''}>Jasa</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="category">Category</label>
                                        <select name="category" id="category_edit" class="form-control select2 select2-edit" required>
                                            <option hidden>Pilih Kategori</option>
                                            <option value="pensil" ${rowData.category === "pensil" ? 'selected' : ''}>Pensil</option>
                                            <option value="buku" ${rowData.category === "buku" ? 'selected' : ''}>Buku</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-6">
                                        <label for="brand">Brand</label>
                                        <select name="brand" id="brand_edit" class="form-control select2 select2-edit" required>
                                            <option value="indramedia" ${rowData.brand === "indramedia" ? 'selected' : ''}>Indramedia</option>
                                            <option value="endez" ${rowData.brand === "endez" ? 'selected' : ''}>Endez</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="price">Price</label>
                                        <input type="number" step="0.01" name="price" class="form-control" placeholder="Input Product Price" value="${parseFloat(rowData.price) || ''}" required>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-6">
                                        <label for="stock">Stock</label>
                                        <input type="number" name="stock" class="form-control" placeholder="Input Product Stock" value="${rowData.stock || ''}" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control select2 select2-edit" required>
                                            <option value="active" ${rowData.status === 'active' ? 'selected' : ''}>Active</option>
                                            <option value="draft" ${rowData.status === 'draft' ? 'selected' : ''}>Draft</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-12">
                                        <label for="status">Is featured</label>
                                        <select name="is_featured" class="form-control select2 select2-edit" required>
                                            <option value="true" ${rowData.is_featured === 1 ? 'selected' : ''}>Yes</option>
                                            <option value="false" ${rowData.is_featured === 0 ? 'selected' : ''}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-6">
                                        <label for="is_populer">Is Popular</label>
                                        <select name="is_populer" class="form-control select2 select2-edit" required>
                                            <option value="true" ${rowData.is_populer === 1 ? 'selected' : ''}>Yes</option>
                                            <option value="false" ${rowData.is_populer === 0 ? 'selected' : ''}>No</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="is_promo">Is Promo</label>
                                        <select name="is_promo" disabled class="form-control select2 select2-edit" required>
                                            <option value="true" ${rowData.is_promo === 1 ? 'selected' : ''}>Yes</option>
                                            <option value="false" ${rowData.is_promo === 0 ? 'selected' : ''}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4 gap-3">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn text-light bg-accent">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
            `;

            // Add the modal to the DOM
            $('body').append(appendHtml);

            // Initialize and show the modal
            const modal = new bootstrap.Modal($('#modalEdit')[0], {
                backdrop: 'static',
                keyboard: false
            });
            modal.show();

            // Clean up modal after closing
            $('#modalEdit').on('hidden.bs.modal', function() {
                $(this).remove();
            });
            $(".select2-edit").select2({
                dropdownParent: $('#modalEdit')
            })
        }

    </script>
@endsection