<!-- Modal -->
<form action="{{ route('cart.create') }}" method="POST">
@csrf
<div class="modal fade" id="modalAddCart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddCartLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Keranjang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" name="product_sku" hidden value="{{ $data->sku }}">
            <div class="">
                <label class="mb-2">Jumlah Produk</label>
                <input type="number" value="1" class="form-control w-100" id="qty_cart" name="qty" required style="font-size: 25px" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </div>
    </div>
</div>
</form>