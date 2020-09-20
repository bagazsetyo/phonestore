<table class="table table-bordered">
        <tr>
            <th>nama</th>
            <td>{{ $item->nama }}</td>
        </tr>
        <tr>
            <th>email</th>
            <td>{{$item->email}}</td>
        </tr>
        <tr>
            <th>nomor</th>
            <td>{{$item->number}}</td>
        </tr>
        <tr>
            <th>alamat</th>
            <td>{{$item->address}}</td>
        </tr>
        <tr>
            <th>transaksi total</th>
            <td>$ {{$item->transaction_total}}</td>
        </tr>
        <tr>
            <th>status transaksi</th>
            <td>{{$item->transaction_status}}</td>
        </tr>
        <tr>
            <th>pembelian product</th>
            <td>
                <table class="tabble table-bordered w-100">
                    <tr>
                        <th>Nama</th>
                        <th>Pesan</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                        @foreach ($item->details as $detail)
                            <tr>
                              <td>{{ $detail->product->name }}</td>
                              <td>{{ $detail->pesan }}</td>
                              <td>${{ $detail->product->price }}</td>
                              <td>${{ $detail->product->price * $detail->pesan}}</td>
                            </tr>
                        @endforeach
                </table>
            </td>
        </tr>
</table>