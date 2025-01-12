@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Category Produk Management</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="" href="#">Products</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Category</a>
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
                    <h3>Category Produk </h3>
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
                                    <form action="{{ route('dashboard.products.category.post') }}" method="post"
                                        enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2 row">
                                        <div class="col-12">
                                            <label for="name">ID Category Produk</label>
                                            <input type="text" name="id" disabled placeholder="Dibuat otomatis"
                                            class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-12">
                                            <label for="name">Nama Category Produk</label>
                                            <input type="text" name="name" placeholder="Masukan nama category"
                                            class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-12">
                                            <label for="description">Description</label>
                                            <textarea name="description" placeholder="Optional" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-12">
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
                <table id="myTable" class="table-admin mt-3 mb-3 rounded-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Status</th>
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
                    url: "{{ route('dashboard.products.category') }}"
                },
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'category_id',
                        searchable: true
                    },
                    {
                        data: 'category_name',
                    },
                    {
                        data: 'description',
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
                                <h5 class="modal-title">Edit Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editProductForm" action="${rowData.urlEdit}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="row mb-3">
                                        <label for="editId" class="col-sm-4 col-form-label">Category ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="editId" value="${rowData.category_id || ''}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="categoryName" class="col-sm-4 col-form-label">Type Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="categoryName" name="name" value="${rowData.category_name || ''}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editDescription" class="col-sm-4 col-form-label">Deskripsi</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="editDescription" name="description">${rowData.description || ''}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editStatus" class="col-sm-4 col-form-label">Status</label>
                                        <div class="col-sm-8">
                                            <select class="form-select" id="editStatus" name="status">
                                                <option value="active" ${rowData.status === 'active' ? 'selected' : ''}>Active</option>
                                                <option value="draft" ${rowData.status === 'draft' ? 'selected' : ''}>Draft</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-4 gap-3">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" id="saveEdit">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>`;


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
