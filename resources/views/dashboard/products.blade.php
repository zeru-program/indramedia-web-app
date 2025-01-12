@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Products</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Products</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head d-flex flex-wrap">
                    <h3>Product Indramedia</h3>
                    @if (session('import_errors'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach (session('import_errors') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="d-flex flex-wrap gap-3">
                        <div class="d-flex flex-wrap gap-3">
                        {{-- <button class="d-flex align-items-center gap-2 btn bg-accent text-light" data-bs-toggle="modal"
                            data-bs-target="#modalFilter">
                            <i class='bx bx-filter'></i>
                            <span>Filter</span>
                        </button> --}}
                        <button class="d-flex align-items-center gap-2 btn bg-accent text-light" data-bs-toggle="modal"
                            data-bs-target="#modalCreate">
                            <i class='bi bi-plus-lg'></i>
                            <span>Create</span>
                        </button>
                        <button class="d-flex align-items-center gap-2 btn bg-accent text-light" data-bs-toggle="modal"
                            data-bs-target="#modalImport">
                            <i class='bi bi-upload'></i>
                            <span>Import</span>
                        </button>
                        <a class="d-flex align-items-center gap-2 btn bg-accent text-light" href="{{ route('dashboard.products.export') }}">
                            <i class='bi bi-printer-fill'></i>
                            <span>Export</span>
                        </a>
                        <a class="d-flex align-items-center gap-2 btn bg-accent text-light" href="{{ route('dashboard.products.template') }}">
                            <i class='bi bi-download'></i>
                            <span>Template</span>
                        </a>
                        </div>
                        <div class="d-flex gap-2 align-items-center position-relative">
                            <input type="text" placeholder="Cari sku produk.." id="search_product_id"
                                style="padding-right: 35px" class="form-control">
                            <i class='bx bx-search position-absolute' style="right: 15px"></i>
                        </div>
                    </div>
                    <!-- Modal Create -->
                    @include('partials.dashboard.modal_create_products')
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
                    <!-- Modal Import -->
                    <div class="modal fade" id="modalImport" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form action="{{ route('dashboard.products.import') }}" method="POST" enctype="multipart/form-data" class="modal-dialog modal-dialog-centered">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Import Data Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>File</label>
                                        <input type="file" name="file" class="form-control" accept=".xlsx,.csv">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn text-light bg-accent">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table id="myTable" class="table-admin mt-3 mb-3 rounded-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>SKU</th>
                            <th>Image</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Brand</th>
                            <th>Stok</th>
                            <th>Populer</th>
                            <th>Promo</th>
                            <th>Status</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

@section('script')
    @if (session()->has('success'))
        <script>
            toastMixin.fire({
                animation: true,
                title: "{{ session('success') }}"
            });
        </script>
    @endif
    @if (session()->has('errors'))
        <script>
            toastMixin.fire({
                animation: true,
                title: "{{ session('errors') }}"
            });
        </script>
    @endif
    @if ($errors->has('error'))
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ $errors->first('error') }}"
            });
        </script>
    @endif
    <script>
        function changeInputImgCreate(e) {
            const file = e.target.files[0]; // Ambil file yang dipilih
            const imgElement = document.getElementById("img-create");

            if (file) {
                const reader = new FileReader(); // Buat instance FileReader

                // Callback untuk saat file selesai dibaca
                reader.onload = function(event) {
                    imgElement.src = event.target.result; // Perbarui src gambar
                };

                reader.readAsDataURL(file); // Baca file sebagai Data URL
            }
        }
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
            $('.select2-type').select2({
                width: '100%',
                dropdownParent: $('#modalCreate'),
                placeholder: 'Pilih Type',
                //minimumInputLength: 2,
                ajax: {
                    url: "{{ route('master.type') }}", 
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data, params) {
                        console.log("Fetched data:", data); // Check data structure here
                        return {
                            results: data.items.map(function(item) {
                                return {
                                    id: item.type_name,
                                    text: item.type_name.toUpperCase()
                                };
                            })
                        };
                    },
                    cache: true
                }
            })
            $('.select2-category').select2({
                width: '100%',
                dropdownParent: $('#modalCreate'),
                placeholder: 'Pilih Category',
                //minimumInputLength: 2,
                ajax: {
                    url: "{{ route('master.category') }}", 
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data, params) {
                        console.log("Fetched data:", data); // Check data structure here
                        return {
                            results: data.items.map(function(item) {
                                return {
                                    id: item.category_name,
                                    text: item.category_name.toUpperCase(),
                                    price: item.price
                                };
                            })
                        };
                    },
                    cache: true
                }
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
                order: [[10, 'desc']], // Mengatur urutan default pada kolom ke-10 (created_at) secara descending
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'sku',
                        name: 'sku',
                        searchable: true
                    },
                    {
                        data: 'image_path', // Kolom Image Path
                        render: function(data) {
                            if (data) {
                                return `<img src="${data}" alt="Product Image" class="img-tbody">`;
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
                        data: 'brand', // Kolom Nama Produk
                        searchable: true,
                        render: function (data) { 
                            return data === 'indramedia' ? `<div class="badge bg-primary">Indramedia</div>` :
                                `<div class="badge bg-success">Endez</div>`;
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
                        },
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action', // Kolom Aksi
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#search_product_id').on('keyup', function() {
                table.column(1).search(this.value).draw();
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
                                            <img src="${rowData.image_path}" alt="${rowData.name || ''}" id="img-edit" class="img-thumbnail" width="50%">
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
                                            <label>Produk Bisa Upload File</label>
                                            <div class="badge bg-primary">${rowData.is_onefile == 1 ? 'Ya, Hanya 1 File' : rowData.is_multiplefile == 1 ? 'Ya, Bisa Banyak File' :'Tidak'}</div>
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
                </div>
            `;

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
                                    <img src="${rowData.image_path}" alt="${rowData.name || ''}" id="img-edit" class="img-thumbnail" style="width: 200px;height: 200px">
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-12">
                                        <label for="image_path">New Image</label>
                                        <input type="file" accept="image/png, image/gif, image/jpeg" name="image_path_new" onchange="changeInputImgEdit(event)" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-6">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Input Product Name" value="${rowData.name || ''}" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="sku">SKU</label>
                                        <input type="text" name="sku_read" class="form-control" placeholder="Input Product SKU" disabled value="${rowData.sku || ''}" required>
                                        <input type="text" name="sku" class="form-control" placeholder="Input Product SKU" hidden value="${rowData.sku || ''}" required>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-12">
                                        <label for="brand">Brand</label>
                                        <select name="brand" id="brand_edit" class="form-control select2 select2-edit" required>
                                            <option value="indramedia" ${rowData.brand === "indramedia" ? 'selected' : ''}>Indramedia</option>
                                            <option value="endez" ${rowData.brand === "endez" ? 'selected' : ''}>Endez</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" placeholder="Optional">${rowData.description || ''}</textarea>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-6">
                                        <label for="category">Kategori</label>
                                        <select name="category" id="category_edit" class="form-control select2 select2-category-edit" required>
                                            <option value="${rowData.category}" selected>${rowData.category.toUpperCase()}</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="type">Tipe Produk</label>
                                        <select name="type" id="type_edit" class="form-control select2 select2-type-edit" required>
                                            <option value="${rowData.type}" selected>${rowData.type.toUpperCase()}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-6">
                                        <label for="price">Harga Satuan</label>
                                        <input type="number" step="0.01" name="price" class="form-control" placeholder="Input Product Price" value="${parseFloat(rowData.price) || ''}" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="stock">Stok</label>
                                        <input type="number" name="stock" class="form-control" placeholder="Tidak boleh kurang dari 0" value="${rowData.stock}" required>
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
                                        <input type="text" hidden value="false" name="is_featured">
                                        <input type="number" value="${rowData.is_promo}" hidden name="is_promo_value">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-12">
                                        <label for="produk_file">Produk Bisa Input File</label>
                                        <select name="produk_file" id="produk_file_create" value="tidak" class="form-control select2 select2-create" required>
                                            <option value="tidak" ${rowData.is_onefile == 0 && rowData.is_multiplefile == 0 ? 'selected' : ''}>Tidak</option>
                                            <option value="multiple" ${rowData.is_multiplefile == 1 ? 'selected' : ''}>Ya, bisa banyak file</option>
                                            <option value="hanya1" ${rowData.is_onefile == 1 ? 'selected' : ''}>Ya, hanya 1 file</option>
                                        </select>
                                        <input type="text" hidden value="false" name="is_featured">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-12">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control select2 select2-edit" required>
                                            <option value="active" ${rowData.status === 'active' ? 'selected' : ''}>Active</option>
                                            <option value="draft" ${rowData.status === 'draft' ? 'selected' : ''}>Draft</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="text-danger" style="font-size: .8em">Untuk mengatur promo silakan ke menu promo</span>
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
            
            $('.select2-type-edit').select2({
                width: '100%',
                dropdownParent: $('#modalEdit'),
                placeholder: 'Pilih Type',
                //minimumInputLength: 2,
                ajax: {
                    url: "{{ route('master.type') }}", 
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data, params) {
                        console.log("Fetched data:", data); // Check data structure here
                        return {
                            results: data.items.map(function(item) {
                                return {
                                    id: item.type_name,
                                    text: item.type_name.toUpperCase()
                                };
                            })
                        };
                    },
                    cache: true
                }
            })
            $('.select2-category-edit').select2({
                width: '100%',
                dropdownParent: $('#modalEdit'),
                placeholder: 'Pilih Category',
                //minimumInputLength: 2,
                ajax: {
                    url: "{{ route('master.category') }}", 
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data, params) {
                        console.log("Fetched data:", data); // Check data structure here
                        return {
                            results: data.items.map(function(item) {
                                return {
                                    id: item.category_name,
                                    text: item.category_name.toUpperCase(),
                                    price: item.price
                                };
                            })
                        };
                    },
                    cache: true
                }
            })
        }

    </script>
@endsection
