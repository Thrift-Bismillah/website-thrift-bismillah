@forelse ($bkm as $item)
<tr>
    <td>{{ $item->no_bkm }}</td>
    @if ($item->transaksi_penjualan_id == 0)
    <td>{{ $item-> }}</td>
        
    @endif
    <td>{{ $item->tanggal }}</td>
    <td>{{ $item->description }}</td>
    <td>Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
    <td><a href="{{ route('bkm.edit', $item->id) }}" class="btn btn-primary"><i class="mdi mdi-arrow-right-circle-outline icon-sm"></i></a>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center">Belum ada Kas Masuk Bulan ini</td>
</tr>
@endforelse