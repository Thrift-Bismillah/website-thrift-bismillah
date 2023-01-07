<x-layout.app>
    <div class="row">
        <h3 class="header">Transaksi Pembelian</h3>
        <div class="col-lg-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-tittle"><i class="mdi mdi-magnify text-info icon-md"></i> Cari Barang</h4>
                    <div class="form-group">
                        <select class="js-example-basic-single"
                            style="width:100%"
                            name="keyBarang"
                            id="keyBarang">
                            <option value="">-</option>
                            @forelse ($barangs as $barang)
                                <option value="{{ $barang->no_barang }}">{{ $barang->name_barang }}</option>
                            @empty
                                <option value="">-- Tidak ada data --</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-tittle"><i class="mdi mdi-buffer text-success icon-md"></i> Hasil Pencarian</h4>
                    <div class="table-responsive">
                        <form action="{{ route('save_barang_pembelian') }}"
                            method="post">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Keranjang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="no_barang">-</td>
                                        <td id="name_barang">-</td>
                                        <td id="harga_beli">-</td>
                                        <td>
                                            <input class="form-control text-light"
                                                type="number"
                                                name="qty"
                                                id="qty">
                                        </td>
                                        <td>
                                            <button class="btn btn-icon btn-success btn-sm"
                                                type="submit">
                                                <i class="mdi mdi-cart"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-tittle"><i class="mdi mdi-cash text-primary icon-md"></i> Pembayaran</h4>
                    <div class="row mt-3">
                        <div class="col-sm-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9 text-dark">
                                    <input class="form-control text-dark"
                                        placeholder="{{ date('Y-m-d') }}"
                                        disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Vendor</label>
                                <div class="col-sm-9">
                                    <select name=""
                                        id=""
                                        class="form-control text-light">
                                        <option value="Kasir 1">Risky</option>
                                        <option value="Kasir 2">Mukhlas</option>
                                        <option value="Kasir 2">MUkhlis</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Diskon</label>
                                <div class="col-sm-9">
                                    <input class="form-control text-dark"
                                        placeholder="0"
                                        disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Grand Total</label>
                                <div class="col-sm-9">
                                    <input class="form-control text-dark"
                                        placeholder="0"
                                        disabled />
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bayar</label>
                                <div class="col-sm-9">
                                    <input class="form-control text-light"
                                        type="number"
                                        placeholder="Bayar" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kembali</label>
                                <div class="col-sm-9">
                                    <input class="form-control text-dark"
                                        placeholder="0"
                                        disabled />
                                    <div class="col-sm-12 mt-3">
                                        <button type="submit"
                                            class="btn btn-success"><i class="mdi mdi-cart-outline"></i>
                                            Simpan</button>
                                        <button type="submit"
                                            class="btn btn-info"><i class="mdi mdi-fax"></i> Cetak
                                            Nota</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> 1 </td>
                                            <td>Tas Gucci</td>
                                            <td> 300000 </td>
                                            <td>1</td>
                                            <td> 300000 </td>
                                            <td>
                                                <button type="submit"
                                                    class="btn btn-icon btn-success btn-sm "
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-edit"><i
                                                        class="mdi mdi-pencil icon-sm"></i></button>
                                                <button type="submit"
                                                    class="btn btn-icon btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-hapus"><i
                                                        class="mdi mdi-delete icon-sm"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade"
            id="modal-edit"
            tabindex="-1"
            role="dialog"
            aria-labelledby="modalTitleId"
            aria-hidden="true">
            <div class="modal-dialog"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="modalTitleId">Edit Barang</h5>
                        <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Barang</label>
                                <div class="col-sm-9">
                                    <input class="form-control text-dark"
                                        disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                    <input class="form-control text-dark"
                                        type="number"
                                        placeholder="1" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-danger"
                            data-bs-dismiss="modal"><i class="mdi mdi-window-close"></i> Tutup</button>
                        <button type="submit"
                            class="btn btn-success"><i class="mdi mdi-floppy"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade"
            id="modal-hapus"
            tabindex="-1"
            role="dialog"
            aria-labelledby="modalTitleId"
            aria-hidden="true">
            <div class="modal-dialog"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="modalTitleId">Hapus Barang</h5>
                        <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="display4">
                                <h4>Apakah Barang Ingin dihapus?</h4>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-danger"
                            data-bs-dismiss="modal"><i class="mdi mdi-window-close"></i> Batal</button>
                        <button type="submit"
                            class="btn btn-success"><i class="mdi mdi-check"></i> Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('jssj')
        <script>
            var modalEd = document.getElementById('modal-edit');

            modalEd.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                let button = event.relatedTarget;
                // Extract info from data-bs-* attributes
                let recipient = button.getAttribute('data-bs-whatever');

                // Use above variables to manipulate the DOM
            });
        </script>
        <script>
            var modalHp = document.getElementById('modal-hapus');

            modalHp.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                let button = event.relatedTarget;
                // Extract info from data-bs-* attributes
                let recipient = button.getAttribute('data-bs-whatever');

                // Use above variables to manipulate the DOM
            });
        </script>
        <script>
            $(document).ready(function() {
                $("#keyBarang").on('change', function() {
                    if (this.value) {
                        $.get('http://127.0.0.1:8000/cari_barang/' + this.value, function(response) {
                            if (response) {
                                $('#no_barang').text(response.result[0]['no_barang']);
                                $('#name_barang').text(response.result[0]['name_barang']);
                                $('#harga_beli').text(response.result[0]['harga_beli']);
                            } else {
                                $('#no_barang').text('-');
                                $('#name_barang').text('-');
                                $('#harga_beli').text('-');
                            }
                        });
                    } else {
                        $('#no_barang').text('-');
                        $('#name_barang').text('-');
                        $('#harga_beli').text('-');
                    }
                });
            });
        </script>
    @endpush
</x-layout.app>
