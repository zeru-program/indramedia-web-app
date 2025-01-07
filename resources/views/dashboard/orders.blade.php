@extends('layouts.dashboard')

@section('content')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Orders</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Orders</a>
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
                <h3>Rekap Order (Online)</h3>
                <div class="d-flex flex-wrap gap-3">
                    <div class="d-flex flex-wrap gap-3">
                        <button class="d-flex align-items-center gap-2 btn bg-accent text-light" data-bs-toggle="modal"
                            data-bs-target="#modalFilter">
                            <i class='bx bx-filter'></i>
                            <span>Filter</span>
                        </button>
                        <button class="d-flex align-items-center gap-2 btn bg-accent text-light" data-bs-toggle="modal"
                            data-bs-target="#modalCreate">
                            <i class='bi bi-plus-lg'></i>
                            <span>Create</span>
                        </button>
                        <a class="d-flex align-items-center gap-2 btn bg-accent text-light" href="{{ route('dashboard.orders.export') }}">
                            <i class='bi bi-download'></i>
                            <span>Import</span>
                        </a>
                        <a class="d-flex align-items-center gap-2 btn bg-accent text-light" href="{{ route('dashboard.orders.export') }}">
                            <i class='bi bi-printer-fill'></i>
                            <span>Export</span>
                        </a>
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
                                <form action="{{ route('dashboard.orders.post') }}" method="post">
                                    @csrf
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="order_id">Order id</label>
                                            <input type="text" name="order_id" maxlength="8" placeholder='Optional'
                                                class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label for="order_name">Order name</label>
                                            <input type="text" name="order_name" placeholder='Input Order Name'
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="order_phone">Order phone</label>
                                            <input type="number" name="order_phone" placeholder='Input Order Phone'
                                                class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="order_message">Order message</label>
                                            <input type="text" name="order_message" value="-"
                                                placeholder='Optional' class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="product_name">Product name</label>
                                            <input type="text" name="product_name" placeholder='Input Product Name'
                                                class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="product_sku">Product SKU</label>
                                            <input type="text" name="product_sku" placeholder='Input Product SKU'
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="product_type">Product type</label>
                                            <input type="text" name="product_type"
                                                placeholder='Input Product Type' class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="product_category">Product category</label>
                                            <input type="text" name="product_category"
                                                placeholder='Input Product Category' class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="product_brand">Product brand</label>
                                            <input type="text" name="product_brand"
                                                placeholder='Input Product Brand' class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="order_is_file">Order is file</label>
                                            {{-- <div>
                                            <input type="checkbox" name="order_is_file" value="true" class="form-check-input">
                                            <label for="">Yes</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="order_is_file" value="false" class="form-check-input">
                                            <label for="">No</label>
                                        </div> --}}
                                            <select name="order_is_file" id="" class="form-control"
                                                value='false' required>
                                                <option value="false">False</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="product_is_promo">Product is promo</label>
                                            {{-- <div>
                                            <input type="checkbox" name="product_is_promo" value="true" class="form-check-input">
                                            <label for="">Yes</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="product_is_promo" value="false" class="form-check-input">
                                            <label for="">No</label>
                                        </div> --}}
                                            <select name="product_is_promo" id="" class="form-control"
                                                value='false' required>
                                                <option value="false">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="product_amount">Product amount</label>
                                            <input type="number" name="product_amount"
                                                placeholder='Input Product Amount' class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="product_price_unit">Price per unit</label>
                                            <input type="number" step="0.01" name="product_price_unit"
                                                placeholder='Input Price Unit' class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="product_price_totals">Product price totals</label>
                                            <input type="number" step="0.01" name="product_price_totals"
                                                placeholder='Input Product Price Totals' class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="product_price_discount">Price discount</label>
                                            <input type="number" step="0.01" name="product_price_discount"
                                                placeholder='Input Price Discount' class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label for="product_percentage_discount">Percentage discount</label>
                                            <input type="number" step="0.01" name="product_percentage_discount"
                                                placeholder='Input Product Percentage Discount' class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="product_price_totals">Payment Method</label>
                                            <select name="product_payment_method" id="" class="form-control"
                                                value='cod' required>
                                                <option value="cod">Cod</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="product_price_totals">Product Delivery Method</label>
                                            <select name="product_delivery" id="" class="form-control"
                                                value='cod' required>
                                                <option value="cod">Cod</option>
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
                        <th>Id Pesanan</th>
                        <th>Pemesan</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Dibuat Pada</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</main>
@endsection

@section('script')
    @if (session()->has('success_create_order'))
        <script>
            toastMixin.fire({
                animation: true,
                title: "{{ session('success_create_order') }}"
            });
        </script>
    @endif
    {{-- @if (errors->has('error_create_order'))
        <script>
            toastMixin.fire({
                animation: true,
                icon: "error",
                title: "{{ session('error_create_order') }}"
            });
        </script>
    @endif --}}
    @if (session()->has('success_edit_order'))
        <script>
            toastMixin.fire({
                animation: true,
                title: "{{ session('success_edit_order') }}"
            });
        </script>
    @endif
    @if (session()->has('success_delete_order'))
        <script>
            toastMixin.fire({
                animation: true,
                title: "{{ session('success_delete_order') }}"
            });
        </script>
    @endif
    <script>
        function handeDetail(data) {
            // Parse the data if it's passed as a JSON string
            const rowData = typeof data === 'string' ? JSON.parse(data) : data;

            // Remove existing modal if present
            var existingModal = document.getElementById('modalEdit');
            if (existingModal) {
                existingModal.remove();
            }

            // Construct the modal with input fields pre-filled with rowData
            var appendHtml = `
                <div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Detail Pesanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex w-100 mb-2 justify-content-center gap-2">
                                    <div class="d-flex flex-column justify-content-center text-center"> 
                                        <label>Status Pesanan</label>
                                        <div class="badge ${
                                            rowData.status === 'success' ? 'bg-success' :
                                            rowData.status === 'pending' ? 'bg-primary' :
                                            rowData.status === 'waiting payment' ? 'bg-secondary' :
                                            rowData.status === 'preparing' ? 'bg-warning' :
                                            rowData.status === 'shipping' ? 'bg-dark' :
                                            rowData.status === 'ready taken' ? 'bg-info' :
                                            'bg-danger'
                                        }"> 
                                            ${rowData.status === 'success' ? 'Berhasil' :
                                            rowData.status === 'pending' ? 'Menunggu' :
                                            rowData.status === 'waiting payment' ? 'Menunggu Pembayaran' :
                                            rowData.status === 'preparing' ? 'Sedang Dipersiapkan' :
                                            rowData.status === 'shipping' ? 'Sedang Dikirim' :
                                            rowData.status === 'ready taken' ? 'Siap Diambil' :
                                            'Tidak Diketahui'}
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex justify-content-between">
                                        <label>ID Pesanan</label>
                                        <div class="badge bg-primary">${rowData.order_id || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Nama Pemesan</label>
                                        <div class="badge bg-primary">${rowData.order_name || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>No. Telepon</label>
                                        <div class="badge bg-primary">${rowData.order_phone || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Pesan</label>
                                        <div class="badge bg-primary">${rowData.order_message || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Nama Produk</label>
                                        <div class="badge bg-primary">${rowData.product_name || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>SKU Produk</label>
                                        <div class="badge bg-primary">${rowData.product_sku || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Jenis Produk</label>
                                        <div class="badge bg-primary">${rowData.product_type || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Kategori Produk</label>
                                        <div class="badge bg-primary">${rowData.product_category || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Merek Produk</label>
                                        <div class="badge bg-primary">${rowData.product_brand || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Pesanan Berupa File</label>
                                        <div class="badge bg-primary">${rowData.order_is_file === 'true' ? 'Ya' : 'Tidak'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Produk Promo</label>
                                        <div class="badge bg-primary">${rowData.product_is_promo === 'true' ? 'Ya' : 'Tidak'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Jumlah Produk</label>
                                        <div class="badge bg-primary">${rowData.product_amount || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Harga per Unit</label>
                                        <div class="badge bg-primary">${rowData.product_price_unit || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Total Harga Produk</label>
                                        <div class="badge bg-primary">${rowData.product_price_totals || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Diskon Harga</label>
                                        <div class="badge bg-primary">${rowData.product_price_discount || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Persentase Diskon</label>
                                        <div class="badge bg-primary">${rowData.product_percentage_discount || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Metode Pembayaran</label>
                                        <div class="badge bg-primary">${rowData.product_payment_method || 'N/A'}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>Metode Pengiriman</label>
                                        <div class="badge bg-primary">${rowData.product_delivery || 'N/A'}</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4 gap-3">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>
            `;



            // Add the modal to the DOM
            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = appendHtml;
            document.body.appendChild(tempDiv.firstElementChild);

            // Initialize and show the modal
            var modal = new bootstrap.Modal(document.getElementById('modalDetail'), {
                    backdrop: 'static',
                    keyboard: false
            });
            modal.show();

            // Clean up modal after closing
            document.getElementById('modalDetail').addEventListener('hidden.bs.modal', function () {
                this.remove();
            });
        }
        function handleEdit(data) {
            // Parse the data if it's passed as a JSON string
            const rowData = typeof data === 'string' ? JSON.parse(data) : data;

            // Remove existing modal if present
            var existingModal = document.getElementById('modalEdit');
            if (existingModal) {
                existingModal.remove();
            }
            const editUrl = rowData.urlEdit;

            // Construct the modal with input fields pre-filled with rowData
            var appendHtml = `
                <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Order</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="${rowData.urlEdit}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="order_id">Order ID</label>
                                            <input type="text" name="order_id" maxlength="8" placeholder='Optional'
                                                class="form-control" value="${rowData.order_id || ''}" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="order_name">Order Name</label>
                                            <input type="text" name="order_name" placeholder='Input Order Name'
                                                class="form-control" value="${rowData.order_name || ''}" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="order_phone">Order Phone</label>
                                            <input type="number" name="order_phone" placeholder='Input Order Phone'
                                                class="form-control" value="${rowData.order_phone.replace(/[^\d]/g, '') || ''}" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="order_message">Order Message</label>
                                            <input type="text" name="order_message" value="${rowData.order_message || ''}"
                                                placeholder='Optional' class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="product_name">Product Name</label>
                                            <input type="text" name="product_name" placeholder='Input Product Name'
                                                class="form-control" value="${rowData.product_name || ''}" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="product_sku">Product SKU</label>
                                            <input type="text" name="product_sku" placeholder='Input Product SKU'
                                                class="form-control" value="${rowData.product_sku || ''}" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="product_type">Product Type</label>
                                            <select name="type" id="type_edit" class="form-control select2 select2-type-edit" required>
                                              <option value="${rowData.product_type}" selected>${rowData.product_type.toUpperCase()}</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="product_category">Product Category</label>
                                            <select name="category" id="category_edit" class="form-control select2 select2-category-edit" required>
                                                <option value="${rowData.product_category}" selected>${rowData.product_category.toUpperCase()}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-6">
                                            <label for="product_brand">Product Brand</label>
                                            <input type="text" name="product_brand"
                                                placeholder='Input Product Brand' class="form-control"
                                                value="${rowData.product_brand || ''}" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="order_is_file">Order is File</label>
                                            <select name="order_is_file" class="form-control" required>
                                                <option value="false" ${rowData.order_is_file == 0 ? 'selected' : ''}>False</option>
                                                <option value="true" ${rowData.order_is_file == 1 ? 'selected' : ''}>True</option>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="mb-2 row">
                                            <div class="col-6">
                                                <label for="product_is_promo">Product is promo</label>
                                                <select name="product_is_promo" id="" class="form-control"
                                                    value='false' required>
                                                <option value="false" ${rowData.product_is_promo === 'false' ? 'selected' : ''}>False</option>
                                                <option value="true" ${rowData.product_is_promo === 'true' ? 'selected' : ''}>True</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="product_amount">Product amount</label>
                                                <input type="number" name="product_amount" value="${rowData.product_amount || ''}"
                                                    placeholder='Input Product Amount' class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <div class="col-6">
                                                <label for="product_price_unit">Price per unit</label>
                                                <input type="number" step="0.01" name="product_price_unit" value="${parseFloat(rowData.product_price_unit) || ''}"
                                                    placeholder='Input Price Unit' class="form-control" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="product_price_totals">Product price totals</label>
                                                <input type="number" step="0.01" name="product_price_totals" value="${parseFloat(rowData.product_price_totals) || ''}"
                                                    placeholder='Input Product Price Totals' class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <div class="col-12">
                                                <label for="status">Status</label>
                                                <select name="status" id="" class="form-control"
                                                    value='${rowData.status}' ${rowData.status === 'success' ? 'disabled' : ''} required>
                                                    <option value="pending" ${rowData.status === 'pending' ? 'selected' : ''}>Pending</option>
                                                    <option value="waiting payment" ${rowData.status === 'waiting payment' ? 'selected' : ''}>Waiting Payment</option>
                                                    <option value="preparing" ${rowData.status === 'preparing' ? 'selected' : ''}>Preparing</option>
                                                    <option value="shipping" ${rowData.status === 'shipping' ? 'selected' : ''}>Shipping</option>
                                                    <option value="ready taken" ${rowData.status === 'ready taken' ? 'selected' : ''}>Ready Taken</option>
                                                    <option value="success" ${rowData.status === 'success' ? 'selected' : ''}>Success</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <div class="col-6">
                                                <label for="product_price_totals">Payment Method</label>
                                                <select name="product_payment_method" id="" class="form-control" value="${rowData.product_method || ''}"
                                                    value='cod' required>
                                                    <option value="cod">Cod</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="product_price_totals">Product Delivery Method</label>
                                                <select name="product_delivery" id="" class="form-control" value="${rowData.product_delivery || ''}" required>
                                                    <option value="ambil_ditempat">Ambil ditempat</option>
                                                </select>
                                            </div>
                                        </div>
                                    <!-- Add more fields as required, using rowData values -->
                                    <div class="d-flex justify-content-end mt-4 gap-3">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn text-light bg-accent">Save Changes</button>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Add the modal to the DOM
            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = appendHtml;
            document.body.appendChild(tempDiv.firstElementChild);

            // Initialize and show the modal
            var modal = new bootstrap.Modal(document.getElementById('modalEdit'), {
                    backdrop: 'static', // or true/false as per requirement
                    keyboard: false
            });
            modal.show();

            
            
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

            // Clean up modal after closing
            document.getElementById('modalEdit').addEventListener('hidden.bs.modal', function () {
                this.remove();
            });
        }



    </script>
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                searching: false,
                paging: true,
                info: true,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.orders') }}"
                },
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'order_id',
                        searchable: true
                    },
                    {
                        data: 'order_name',
                    },
                    {
                        data: 'product_name',
                    },
                    {
                        data: 'product_amount',
                    },
                    {
                        data: 'product_price_totals',
                        render: function(data) {
                            if (data) {
                                // Format to Rupiah
                                return parseFloat(data).toLocaleString('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0
                                }).replace('IDR', '').trim();
                            }
                            return 'Rp0';
                        },
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data === 'success') {
                                return `<div class="badge bg-success">Success</div>`;
                            } else if (data === 'pending') {
                                return `<div class="badge bg-primary">Pending</div>`;
                            } else if (data === 'waiting payment') {
                                return `<div class="badge bg-secondary">Waiting payment</div>`;
                            } else if (data === 'preparing') {
                                return `<div class="badge bg-warning">Preparing</div>`;
                            } else if (data === 'shipping') {
                                return `<div class="badge bg-dark">Shipping</div>`;
                            } else if (data === 'ready taken') {
                                return `<div class="badge bg-info">Ready Taken</div>`;
                            } else {
                                return `<div class="badge bg-danger">Unknown</div>`;
                            }
                        }
                        },
                        {
                            data: 'created_at',
                            render: function(data) {
                                if (data) {
                                    // Parsing string ke objek Date
                                    const date = new Date(data);

                                    // Format tanggal dengan timezone Asia/Jakarta
                                    const options = {
                                        timeZone: 'Asia/Jakarta',
                                        year: 'numeric',
                                        month: '2-digit',
                                        day: '2-digit',
                                        hour: '2-digit',
                                        minute: '2-digit',
                                    };

                                    const formatter = new Intl.DateTimeFormat('id-ID', options);
                                    const formattedDate = formatter.format(date);

                                    return formattedDate;
                                }
                                return '';
                            },
                    },
                    {
                        data: 'action',
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
    </script>
@endsection