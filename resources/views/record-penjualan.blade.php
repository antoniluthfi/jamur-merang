<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}">

    <title>Rekap Total Sales</title>
</head>
<body>
    <h1 class="text-center display-4 pt-4">Rekap Total Sales {{ count($data) == 0 ? "" : $data[0]->name }}</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center display-6" style="width: 6%">No</th>
                <th class="text-center display-6">Tanggal</th>
                <th class="text-center display-6">Nama</th>
                <th class="text-center display-6">Area</th>
                <th class="text-center display-6">Barang</th>
                <th class="text-center display-6" style="width: 9%">Jumlah</th>
                <th class="text-center display-6">Setoran</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
                $total = 0;
                $jumlah = 0;
            @endphp
            @foreach ($data as $item)
                @php
                    $no++;
                    $day = date_create($item->day);
                    $total += $item->harga;
                    $jumlah += $item->jumlah;
                @endphp

                <tr>
                    <td class="text-center display-6">{{ $no }}</td>
                    <td class="text-center display-6">{{ date_format($day, "d M Y") }}</td>
                    <td class="display-6">{{ ucwords($item->name) }}</td>
                    <td class="text-center display-6">{{ $item->area }}</td>
                    <td class="text-center display-6">{{ $item->nama_barang }}</td>
                    <td class="text-center display-6">{{ $item->jumlah }}</td>
                    <td class="text-right display-6">Rp. {{ number_format($item->harga) }}</td>
                </tr>
            @endforeach

            <tr>
                <td class="text-center display-6">#</td>
                <td class="text-center display-6">Call: {{ count($data) == 0 ? "" : $item->kunjungan }}</td>
                <td class="text-center display-6">EC: {{ count($data) == 0 ? "" : $item->kunjungan_efektif }}</td>
                <td colspan="2" class="text-center display-6">Total</td>
                <td class="text-center display-6">{{ $jumlah }}</td>
                <td class="text-center display-6">Rp. {{ number_format($total) }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>