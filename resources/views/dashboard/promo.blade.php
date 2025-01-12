@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Promo Management</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Promo</a>
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
                    <h3>Promo untuk Produk</h3>
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
                                    <form action="{{ route('dashboard.promo.post') }}" method="post"
                                        enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2 row">
                                        <div class="col-12">
                                            <label for="image_path">Produk</label>
                                            <select name="sku" id="product_create" class="form-control select2 select2-create" required>
                                                {{-- <option value="Buku fisika">Buku fisika</option> --}}
                                                <option></option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-12">
                                            <label for="name">Nama Promo</label>
                                            <input type="text" name="name" placeholder="Input Promo Name"
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
                                            <label for="percentage" class="form-label">Persentase Promo <span id="displayPercentageValue">1%</span></label>
                                            <input type="range" class="form-range customRange" name="percentage" id="percentage" value="1" min="1" max="100" required>
                                            <div class="d-flex justify-content-between">
                                                <span>1%</span>
                                                <span>100%</span>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="category">Harga Awal</label>
                                            <input type="number" value="0" disabled name="initial_price" id="initial_price" placeholder="Input Promo Name"
                                            class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="brand">Harga Setelah Discount</label>
                                            <input type="number" value="0" disabled name="promo_price" id="promo_price" placeholder="Input Promo Name"
                                            class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="start_date">Start date</label>
                                            <input type="datetime-local" name="start_date"
                                                placeholder="Input promo start" class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="stock">End date</label>
                                            <input type="datetime-local" name="end_date"
                                                placeholder="Input promo end " class="form-control" required>
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
                            <th>Nama Produk</th>
                            <th>Nama Promo</th>
                            <th>Persentase Promo</th>
                            <th>Harga Awal</th>
                            <th>Harga Promo</th>
                            <th>Aktif pada</th>
                            <th>Berakhir pada</th>
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
    @if (session()->has('success_create_promo'))
        <script>
            toastMixin.fire({
                animation: true,
                title: "{{ session('success_create_promo') }}"
            });
        </script>
    @endif
    @if ($errors->has('error_create_promo'))
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ $errors->first('error_create_promo') }}"
            });
        </script>
    @endif
    @if ($errors->has('promo_exists'))
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ $errors->first('promo_exists') }}"
            });
        </script>
    @endif
    @if (session()->has('success_edit_promo'))
        <script>
            toastMixin.fire({
                animation: true,
                title: "{{ session('success_edit_promo') }}"
            });
        </script>
    @endif
    @if (session()->has('error_edit_promo'))
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ session('error_edit_promo') }}"
            });
        </script>
    @endif
    @if (session()->has('success_delete_promo'))
        <script>
            toastMixin.fire({
                animation: true,
                title: "{{ session('success_delete_promo') }}"
            });
        </script>
    @endif
    @if (session()->has('error_delete_promo'))
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ session('error_delete_promo') }}"
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
           
            $("#product_create").select2({
                dropdownParent: $('#modalCreate'),
                width: '100%',
                placeholder: 'Pilih Produk',
                //minimumInputLength: 2,
                ajax: {
                    url: "{{ route('master.products') }}", 
                    dataType: 'json',
                    delay: 250,
                    // data: function(params) {
                    //     return {
                    //         q: params.term,
                    //         page: params.page || 1
                    //     };
                    // },
                    processResults: function(data, params) {
                        console.log("Fetched data:", data); // Check data structure here
                        return {
                            results: data.items.map(function(item) {
                                return {
                                    id: item.sku,
                                    text: item.name + " - " + item.sku,
                                    price: item.price
                                };
                            })
                        };
                    },
                    cache: true
                }
            }).on('select2:select', function(e) {
                $('#initial_price').val(parseFloat(e.params.data.price))
            });

            $(".customRange").on("change input", function() {
                $("#displayPercentageValue").text($(this).val() + "%")

                var percen = $(this).val()
                var priceNormal = $('#initial_price').val()
                var priceDiscount = $('#promo_price').val()
                var resultPromoFirst = (percen / 100) * priceNormal
                var resultPromo = priceNormal - resultPromoFirst
                resultPromo = parseFloat(resultPromo.toFixed(2)); 
                // console.log(resultPromo)
                $("#promo_price").val(resultPromo)

            })

            var table = $('#myTable').DataTable({
                searching: false,
                paging: true,
                info: true,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.promo') }}"
                },
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'product_name',
                        searchable: true
                    },
                    {
                        data: 'name',
                        searchable: true
                    },
                    {
                        data: 'percentage',
                        render: function(data) { 
                            return parseFloat(data) + "%" || "0%"
                        }
                    },
                    {
                        data: 'initial_price',
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
                        data: 'promo_price',
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
                        data: 'start_date',
                        // render: function(data) {
                        //     return data || 0; 
                        // }
                    },
                    {
                        data: 'end_date',
                        // render: function(data) {
                        //     return data || 0; 
                        // }
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

        function handleRange(e, initialPriceId, promoPriceId, displayPercentageId) {
            const percentage = parseFloat(e.target.value) || 0;

            const initialPriceElement = document.getElementById(initialPriceId);
            const promoPriceElement = document.getElementById(promoPriceId);
            const displayPercentageElement = document.getElementById(displayPercentageId);

            const initialPrice = parseFloat(initialPriceElement.value) || 0;

            const promoPrice = initialPrice - (initialPrice * (percentage / 100));

            promoPriceElement.value = promoPrice; 
            displayPercentageElement.textContent = `${percentage}%`; 
        }


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
                                <h5 class="modal-title">Edit Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editProductForm" action="${rowData.urlEdit}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="row mb-3">
                                        <label for="editId" class="col-sm-4 col-form-label">ID Produk</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="editId" value="${rowData.id || ''}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editSku" class="col-sm-4 col-form-label">SKU</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="editSku" value="${rowData.sku || ''}" disabled>
                                            <input type="text" name="sku" hidden class="form-control" id="" value="${rowData.sku || ''}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editProductName" class="col-sm-4 col-form-label">Nama Produk</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="editProductName" value="${rowData.product_name || ''} disabled">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editName" class="col-sm-4 col-form-label">Nama Promo</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="editName" name="name" value="${rowData.name || ''}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editDescription" class="col-sm-4 col-form-label">Deskripsi</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="editDescription" name="description">${rowData.description || ''}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editPercentage" class="col-sm-4 col-form-label">Persentase Promo <span id="displayPercenEdit">(${parseFloat(rowData.percentage) || ''}%)</span></label>
                                        <div class="col-sm-8">
                                            <input type="range" name="percentage" class="form-range" onchange="handleRange(event, 'editInitialPrice', 'editPromoPrice', 'displayPercenEdit')" id="editPercentage" value="${parseFloat(rowData.percentage) || ''}">
                                            <div class="d-flex justify-content-between">
                                                <span>1%</span>
                                                <span>100%</span>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editInitialPrice" class="col-sm-4 col-form-label">Harga Awal</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="editInitialPrice" value="${parseFloat(rowData.initial_price) || ''}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editPromoPrice" class="col-sm-4 col-form-label">Harga Promo</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="editPromoPrice" value="${parseInt(rowData.promo_price) || ''}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editStartDate" class="col-sm-4 col-form-label">Tanggal Mulai</label>
                                        <div class="col-sm-8">
                                            <input type="datetime-local" name="start_date" class="form-control" id="editStartDate" value="${rowData.start_date || ''}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="editEndDate" class="col-sm-4 col-form-label">Tanggal Berakhir</label>
                                        <div class="col-sm-8">
                                            <input type="datetime-local" name="end_date" class="form-control" id="editEndDate" value="${rowData.end_date || ''}">
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
