
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
                    <div class="col-12">
                        <label for="product_sku">Produk</label>
                        <select name="sku" id="product_create" class="form-control select2 select2-create" required>
                            {{-- <option value="Buku fisika">Buku fisika</option> --}}
                            <option></option> 
                        </select>
                    </div>
                </div>
                <div class="mb-2 row">
                    <div class="col-12">
                        <label for="product_amount">Jumlah Pesanan</label>
                        <input type="number" name="product_amount"
                            placeholder='masukan jumlah pesanan' class="form-control" required>
                    </div>
                </div>
                <div class="mb-2 row">
                    <div class="col-6">
                        <label for="product_price_totals">Payment Method</label>
                        <select name="product_payment_method" id="" class="form-control"
                            value='cod' required>
                            <option value="cod" selected>Cod</option>
                        </select>
                        {{-- <input type="text" name="product_payment_method"
                            placeholder='masukan jumlah pesanan' class="form-control" value='cod' required disabled> --}}
                    </div>
                    <div class="col-6">
                        <label for="product_price_totals">Product Delivery Method</label>
                        <select name="product_delivery" id="" class="form-control"
                            value='ambil_ditempat' required>
                            <option value="ambil_ditempat" selected>Ambil Ditempat</option>
                        </select>
                        {{-- <input type="text" name="product_delivery"
                        placeholder='masukan jumlah pesanan' class="form-control" value='ambil_ditempat' required disabled> --}}
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