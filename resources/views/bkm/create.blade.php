<x-layout.app>
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ $title }}</h4>
        <p class="card-description"> Basic form elements </p>
        <form action="{{ route('bkm.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">No. BKM</label>
            <input type="text" class="form-control text-dark" id="no_bkm" name="no_bkm" value="{{ $no_bkm }}" readonly>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 col-form-label">Pilih Transaksi</label>
            <select class="select2 form-control" style="" id="transaksi_penjualan_id" name="transaksi_penjualan_id">
              <option value="-">Pilih Transaksi</option>
              @foreach ($transaksi as $trans)
              <option value="{{ $trans->id }}">{{ $trans->no_transaction }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Tanggal</label>
            <input type="date" class="form-control text-dark" id="tanggal" name="tanggal" readonly>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Jumlah</label>
            <input type="number" class="form-control text-dark" id="total" name="total" placeholder="Jumlah" readonly>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Keterangan</label>
            <textarea class="form-control text-light" id="description" name="description" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-dark">Cancel</button>
        </form>
      </div>
    </div>
  </div>
  @push('jssj')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script>
     $(document).ready(function() {
    $('.select2').select2();
    $('#transaksi_penjualan_id').on('select2:select', function (e) {
        var data = e.params.data;
        $.ajax({
            url: '/getTransData/' + data.id,
            dataType: 'json',
            success: function (response) {
                $('#tanggal').val(response.tanggal);
                $('#total').val(response.total)
            }
        });
    });
});
  </script>
  @endpush
</x-layout.app>