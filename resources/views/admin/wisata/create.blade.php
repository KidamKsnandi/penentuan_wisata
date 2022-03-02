@extends('layouts.admin')

@section('ckeditor')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var harga = document.getElementById("harga");
        CKEDITOR.replace(harga, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection

@section('js')
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script>
        function initialize() {
            var propertiPeta = {
                center: new google.maps.LatLng(-6.918099963422153, 107.61980781669041),
                zoom: 9,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=xxxxxxxxxxxxxxxxxxxxxxxxxxxxx&libraries=places&callback=initAutocomplete" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('assets/js/autocomplete.js') }}"></script> --}}
    <script type="text/javascript">
        $('.addwisata').on('click', function() {
            addwisata();
        });

        function addwisata() {
            var wisata = '<div><div class="form-group mt-6"> <label for="">Nama Wisata</label> <div class="input-group input-group-outline"><input type="text" name="nama_wisata[]" autocomplete="off" class="form-control @error('nama_wisata.*') is-invalid @enderror">@error('nama_wisata.*')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong> </span> @enderror</div></div><div class="form-group mt-3"><label for="">Kategori Wisata</label><div class="input-group input-group-outline"><select name="id_kategori[]" class="form-control @error('id_kategori') is-invalid @enderror" >@foreach($kategori as $data)<option value="{{$data->id}}">{{$data->nama_kategori}}</option> @endforeach</select></div></div><div class="form-group"><label for="">Lokasi</label><div class="input-group input-group-outline"><input type="text" name="lokasi[]" autocomplete="off" class="form-control @error('lokasi.*') is-invalid @enderror">@error('lokasi.*')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror</div></div><div class="form-group">@csrf<label for="">Cover</label><input type="file" name="cover[]" class="form-control @error('cover') is-invalid @enderror">@error('cover')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="form-group"><label for="">Embed Map</label><input type="text" name="embed_map[]" class="form-control @error('embed_map') is-invalid @enderror">@error('embed_map')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="form-group mt-3"><a href="#" class="remove btn btn-danger" style="float: right;"><i class="fa fa-trash-alt"></i> Hapus</a></div></div>';
            $('.wisata').append(wisata);
        };
        $('.remove').live('click', function() {
            $(this).parent().parent().remove();
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="col-sm-10">Data Wisata</h3>
                            <a href="/admin/wisata" class="fa fa-arrow-left btn btn-secondary">&nbsp;Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Wisata</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="nama_wisata[]" autocomplete='off'
                                        class="form-control @error('nama_wisata.*') is-invalid @enderror">
                                    @error('nama_wisata.*')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Kategori Wisata</label>
                                <div class="input-group input-group-outline">
                                    <select name="id_kategori[]"
                                        class="form-control @error('id_kategori') is-invalid @enderror">
                                        @foreach ($kategori as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi</label>
                                <div class="input-group input-group-outline">

                                    {{-- <div id="googleMap" style="width:100%;height:380px;"></div> --}}
                                    <input type="text" name="lokasi[]" autocomplete='off'
                                        class="form-control @error('lokasi.*') is-invalid @enderror">
                                    @error('lokasi.*')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                @csrf
                                <label for="">Cover</label>
                                <input type="file" name="cover[]" class="form-control @error('cover') is-invalid @enderror">
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Embed Map (<small>Lihat <a href="https://www.google.com/maps/?hl=id" target="_blank"> Google Maps</a></small>)</label>
                                <input type="text" name="embed_map[]" class="form-control @error('embed_map') is-invalid @enderror" placeholder="contoh : pb=!1m18!1m12!1m3!1d3960.3595530774887!2d107.5906534141453!3d-6.9668415701488815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8deccecb6f1%3A0x658cc60fbe5017b9!2sSMK%20Assalaam%20Bandung!5e0!3m2!1sid!2sid!4v1645069769268!5m2!1sid!2sid">
                                @error('embed_map')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <a href="#" class="addwisata btn btn-success" style="float: right;"><i
                                        class="fa fa-plus"></i> Tambah Wisata</a>
                            </div>
                            <div class="wisata"></div>
                            <div class="form-group mt-4">
                                <button type="reset" class="btn btn-danger text-white"><i class="fa fa-sync"></i>
                                    Reset</button>
                                <button type="submit" class="btn btn-info text-white"><i class="fa fa-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
