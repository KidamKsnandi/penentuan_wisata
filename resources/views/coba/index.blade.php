@foreach ($pengunjung as $data)
    ini adalah {{  $data->jumlah }} <br>
    {{ $data->tanggal }}
@endforeach
