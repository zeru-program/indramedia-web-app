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
            {{-- <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a> --}}
        </div>


        <div class="table-data">
            <div class="order">
                <div class="head d-flex flex-wrap">
                    <h3>Artikel Indramedia</h3>
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
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Create</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('dashboard.blog.post') }}" method="post"
                                        enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2 d-flex justify-content-center">
                                        <img src="http://127.0.0.1:8000/images/new/logo-1.png" alt="product image" id="img-create" class="img-thumbnail" style="width: 200px;height: 200px">
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-12">
                                            <label for="image_path">Banner Artikel</label>
                                            <input type="file" accept="image/png, image/gif, image/jpeg" name="image_path" placeholder="Input Image Path" class="form-control" onchange="changeInputImgCreate(event)">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-12">
                                            <label>Judul</label>
                                            <input type="text" name="title" placeholder="Masukan judul artikel"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-12">
                                            <label for="">Kategori</label>
                                            <input type="text" name="category" placeholder="Masukan kategori"
                                            class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-12">
                                            <label for="">Konten Artikel</label>
                                            <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-12">
                                            <label for="status">Status</label>
                                            <select name="status" id="status_create" class="form-control select2 select2-create" required>
                                                <option value="draft" selected>Draft</option>
                                                <option value="active">Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex w-100 text-center">
                                        <span class="text-center text-danger">Nama pembuat Artikel akan diambil dari username yang saat ini anda gunakan.</span>
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
                <table id="myTable" class="table-admin mt-3 mb-3 rounded-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Dibuat Oleh</th>
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
    @if ($errors->any())
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ $errors }}"
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

            var table = $('#myTable').DataTable({
                searching: false,
                paging: true,
                info: true,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.blog') }}"
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'slug', 
                        searchable: true
                    },
                    {
                        data: 'image', // Kolom Image Path
                        render: function(data) {
                            if (data) {
                                return `<img src="${data}" alt="Product Image" class="img-tbody">`;
                            }
                            return `<span class="badge bg-secondary">No Image</span>`;
                        }
                    },
                    {
                        data: 'title', 
                        searchable: true
                    },
                    {
                        data: 'category', 
                        searchable: true
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
                        data: 'created_by',
                        searchable: true
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
            <form action="${rowData.urlEdit}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2 d-flex justify-content-center">
                                <img src="${rowData.image}" alt="product image" id="img-edit" class="img-thumbnail" style="width: 200px;height: 200px">
                            </div>
                            <div class="mb-2 row">
                                <div class="col-12">
                                    <label for="image_path">Upload Banner Artikel Baru</label>
                                    <input type="file" accept="image/png, image/gif, image/jpeg" name="image_path_new" placeholder="Input Image Path" class="form-control" onchange="changeInputImgEdit(event)">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col-12">
                                    <label>Judul</label>
                                    <input type="text" value="${rowData.title}" name="title" placeholder="Masukan judul artikel"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col-12">
                                    <label for="">Kategori</label>
                                    <input type="text" value="${rowData.category}" name="category" placeholder="Masukan kategori"
                                    class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col-12">
                                    <label for="">Konten Artikel</label>
                                    <textarea name="content" class="form-control" id="" cols="30" rows="10">${rowData.content}</textarea>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col-12">
                                    <label for="status">Dibuat oleh</label>
                                    <input type="text" value="${rowData.created_by}" name="created_by" placeholder="Masukan Nama Creator"
                                    class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col-12">
                                    <label for="status">Status</label>
                                    <select name="status" id="status_create" class="form-control select2 select2-create" required>
                                        <option value="active" ${rowData.status === 'active' ? 'selected' : ''}>Active</option>
                                        <option value="draft" ${rowData.status === 'draft' ? 'selected' : ''}>Draft</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn text-light bg-accent">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
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
