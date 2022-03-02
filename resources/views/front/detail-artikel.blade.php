@extends('layouts.partials.link')

@section('js')
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://pariwisata-5.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
@endsection

@section('content')
    <div class="container-fluid mt-5 mb-3 pt-3 text-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3"> {{-- 700x435 --}}
                        <img class="img-fluid w-100" src="{{ $artikel->cover() }}"
                            style="width: 700px; height: 460px; object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <small class="text-body border-right" href="">Author : {{ $artikel->user->name }}
                                    &nbsp;</small>
                                <small class="text-body">{{ $artikel->created_at->format('d, M Y') }}</small>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $artikel->judul }}</h1>
                            <p>{!! $artikel->konten !!}</p>
                            <div id="disqus_thread"></div>
                        </div>
                    </div>
                    <!-- News Detail End -->
                </div>

                <div class="col-lg-4">

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Artikel Trending</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3"> <?php error_reporting(error_reporting() & ~E_NOTICE); ?>
                            @foreach ($arkel as $data)
                                @if ($data->slug != $artikel->slug)
                                    <?php $slide = json_decode($data->status, true); ?>
                                    @if ($slide[0] == 'Trending' || isset($slide[1]) == 'Trending')
                                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                            <img class="img-fluid" src="{{ $data->cover() }}"
                                                style="width: 110px; height: 110px;" alt="">
                                            <div
                                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                                    href="/{{ $data->slug }}/selengkapnya">{{ substr($data->judul, 0, 40) }}....</a>
                                                <div class="mt-3">
                                                    <small class="text-body">Author : {{ $data->user->name }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Popular News End -->

                </div>
            </div>
        </div>
    </div>
@endsection
