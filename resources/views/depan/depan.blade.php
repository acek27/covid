@extends('depan.bagian.page')
@push('css')
    <style>
        .gm-ui-hover-effect #gmap {
            display: none !important;
        }
    </style>
@endpush
@section('content')
    <!-- DICECTORY LISTING GOOGLE MAP AREA START -->
    <div class="directory-listing-google-map-area">
        <div id="gmap"></div>
        {{--        <div id="map"></div>--}}
    </div>

    <!-- DICECTORY LISTING GOOGLE MAP AREA START -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">
        <br>
        <div class="section-title-2 text-center">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$total->jml_odp + $total->jml_pdp + $total->jml_positif}}</h3>

                            <p style="color: white">Total Kasus Kab. Situbondo</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$total->jml_odp}}</h3>

                            <p style="color: white">Kasus ODP</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$total->jml_pdp}}</h3>

                            <p style="color: black">Kasus PDP</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$total->jml_positif}}</h3>

                            <p style="color: white">Kasus Positif</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-2 text-center">
                        <h2>Data Terbaru Indonesia dan Provinsi</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="blog-details-title-time">
                        <!-- service-item -->
                        <div class="about-sheltek-info">
                            <div class="service-item-info">
                                @foreach($indonesia as $indo)
                                    <h5>{{$indo['name']}}</h5>
                                    <table class="col-lg-12">
                                        <tr>
                                            <td><strong>Kasus Positif</strong></td>
                                            <td><h6>: {{$indo['positif']}}</h6></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kasus Sembuh</strong></td>
                                            <td><h6>: {{$indo['sembuh']}}</h6></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kasus Meninggal</strong></td>
                                            <td><h6>: {{$indo['meninggal']}}</h6></td>
                                        </tr>
                                    </table>
                                @endforeach
                                <br>
                                    <a href="#"><small><i>info selengkapnya...</i></small></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="blog-details-title-time">
                        <div class="about-sheltek-info">
                            <div class="service-item-info">
                                @foreach($provinsi[1] as $key=>$prov)
                                    @if($prov['Kode_Provi'] == 35)
                                        <h5>{{$prov['Provinsi']}}</h5>
                                        <table class="col-lg-12">
                                            <tr>
                                                <td><strong>Kasus Positif</strong></td>
                                                <td><h6>: {{$prov['Kasus_Posi']}}</h6></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Kasus Sembuh</strong></td>
                                                <td><h6>: {{$prov['Kasus_Semb']}}</h6></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Kasus Meninggal</strong></td>
                                                <td><h6>: {{$prov['Kasus_Meni']}}</h6></td>
                                            </tr>
                                        </table>
                                    @endif
                                @endforeach
                                <br>
                                    <a href="#"><small><i>info selengkapnya...</i></small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="directory-listing-google-map-area2">
            {{--            nek iki diklik class perbatasan() aktif--}}
            <button id="perbatasan" class="btn btn-primary">Perbatasan</button>
            {{--            nek iki diklik class rumahsinggah() aktif--}}
            <button id="rumahsinggah" class="btn btn-primary">Rumah Singgah</button>
            <div id="gmap2"></div>
        </div>
        <!-- ABOUT SHELTEK AREA START -->
        <!-- <div class="about-sheltek-area ptb-115"> -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="section-title mb-30">
                        <h3>Apa Itu</h3>
                        <h2>COVID-19</h2>
                    </div>
                    <div class="about-sheltek-info">
                        <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust"
                                 class="tooltip-content">Pneumonia Coronavirus Disease 2019 atau COVID-19</span> adalah
                            penyakit peradangan paru yang disebabkan oleh Severe Acute Respiratory Syndrome Coronavirus
                            2 (SARS-CoV-2). Gejala klinis yang muncul beragam, mulai dari seperti gejala flu biasa
                            (batuk, pilek, nyeri tenggorok, nyeri otot, nyeri kepala) sampai yang berkomplikasi berat
                            (pneumonia atau sepsis). </p>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="section-title mb-30">
                        <h3>Bagaimana</h3>
                        <h2>COVID-19 Menular ?</h2>
                    </div>
                    <div class="about-sheltek-info">
                        <p>Cara penularan SARS-CoV-2 penyebab <span data-placement="top" data-toggle="tooltip"
                                                                    data-original-title="The name you can trust"
                                                                    class="tooltip-content">COVID-19</span> ialah
                            melalui kontak dengan droplet saluran napas penderita. Droplet merupakan partikel kecil dari
                            mulut penderita yang mengandung kuman penyakit, yang dihasilkan pada saat batuk, bersin,
                            atau berbicara. Droplet dapat melewati sampai jarak tertentu (biasanya 1 meter).</p>
                        <p>Droplet bisa menempel di pakaian atau benda di sekitar penderita pada saat batuk atau bersin.
                            Namun, partikel droplet cukup besar sehingga tidak akan bertahan atau mengendap di udara
                            dalam waktu yang lama. Oleh karena itu, orang yang sedang sakit, diwajibkan untuk
                            menggunakan masker untuk mencegah penyebaran droplet. Untuk penularan melalui makanan,
                            sampai saat ini belum ada bukti ilmiahnya.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <!-- ABOUT SHELTEK AREA END -->


        <!-- SERVICES AREA START -->
        <div class="services-area pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title-2 text-center">
                            <h2>KENALI GEJALANYA</h2>
                            <p>Jangan Panik, Kenali gejalanya dan deteksi virus corona sejak dini. Hanya perlu mengatur
                                jarak, hindari bersalaman dan bila sakit memakai masker, dan jaga kebersihan</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel">
                            <!-- service-item -->
                            <div class="col">
                                <div class="service-item">
                                    <div class="service-item-image">
                                        <img src="{{asset('/tema/covid/demam.png')}}" alt="">
                                    </div>
                                    <div class="service-item-info">
                                        <h5>Demam</h5>
                                        <p>Demam menunjukkan gejala awal corona, demam biasanya mencapai suhu 38 derajat
                                            celcius keatas</p>
                                    </div>
                                </div>
                            </div>
                            <!-- service-item -->
                            <div class="col">
                                <div class="service-item">
                                    <div class="service-item-image">
                                        <img src="{{asset('/tema/covid/batuk.png')}}" alt="">
                                    </div>
                                    <div class="service-item-info">
                                        <h5>Batuk Kering</h5>
                                        <p>Batuk Kering tidak beriak dan berulang ulang merupakan tanda infeksi aktif di
                                            paru-paru, yang mungkin bisa disebabkan karena COVID-19</p>
                                    </div>
                                </div>
                            </div>
                            <!-- service-item -->
                            <div class="col">
                                <div class="service-item">
                                    <div class="service-item-image">
                                        <img src="{{asset('/tema/covid/sakittenggorokan.png')}}" alt="">
                                    </div>
                                    <div class="service-item-info">
                                        <h5>Sakit Tenggorokan</h5>
                                        <p>Infeksi COVID-19 akan melalui jalur pernafasan sehingga dapat mengakibatkan
                                            radang pada tenggorokan dan rasa nyeri</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel">
                            <!-- service-item -->
                            <div class="col">
                                <div class="service-item">
                                    <div class="service-item-image">
                                        <img src="{{asset('/tema/covid/pusing.png')}}" alt="">
                                    </div>
                                    <div class="service-item-info">
                                        <h5>Sakit Kepala</h5>
                                        <p>Dengan adanya demam yang tinggi, COVID-19 seringkali diikuti dengan gejala
                                            sakit kepala</p>
                                    </div>
                                </div>
                            </div>
                            <!-- service-item -->
                            <div class="col">
                                <div class="service-item">
                                    <div class="service-item-image">
                                        <img src="{{asset('/tema/covid/lelah.png')}}" alt="">
                                    </div>
                                    <div class="service-item-info">
                                        <h5>Lemas</h5>
                                        <p>Infeksi COVID-19 yang telah menyebar ke seluruh tubuh akan menghabiskan
                                            energi yang banyak sehingga seringkali dapat mengakibatkan lemas</p>
                                    </div>
                                </div>
                            </div>
                            <!-- service-item -->
                            <div class="col">
                                <div class="service-item">
                                    <div class="service-item-image">
                                        <img src="{{asset('/tema/covid/batuk.png')}}" alt="">
                                    </div>
                                    <div class="service-item-info">
                                        <h5>Sesak Nafas</h5>
                                        <p>Apabila COVID-19 berkembang dengan cepat dan besar di paru-paru, fungsi paru
                                            akan menurun sehingga terjadi sesak nafas</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SERVICES AREA END -->

        <!-- BOOKING AREA START -->
        <div class="booking-area bg-1 call-to-bg plr-140 pt-75">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="section-title text-white">
                            <h3>AYO !</h3>
                            <h2 class="h1">MARI BERSAMA - SAMA</h2>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="booking-conternt clearfix">
                            <div class="book-house text-white">
                                <h2>Jaga Keluarga Dan Bangsa Indonesia </h2>
                                <h2 class="h5">Dengan Mencegah Penularan COVID-19 </h2>
                            </div>
                            <div class="booking-imgae">
                                <img src="{{asset('/tema/covid/masker.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BOOKING AREA END -->

        <!-- FEATURED FLAT AREA START -->
        <div class="featured-flat-area pt-115 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title-2 text-center">
                            <h2>Kamus COVID-19</h2>
                            <p>Terdapat kata - kata khusus dalam penyebutan pasien terjangkit wabah atau diduga terkena
                                wabah yaitu ODP, PDP, dan Confirm</p>
                        </div>
                    </div>
                </div>
                <div class="featured-flat">
                    <div class="row">
                        <!-- flat-item -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="flat-item">
                                <div class="flat-item-image">
                                    <a href="#"><img src="{{asset('/tema/covid/pasien2.png')}}" alt=""></a>
                                    <ul class="flat-desc">
                                        <li>
                                            <h2><span style="color: #fff">ODP</span></h2>
                                        </li>
                                    </ul>
                                </div>
                                <div class="flat-item-info">
                                    <div class="flat-title-price">
                                        <h5>Orang Dalam Pemantauan</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- flat-item -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="flat-item">
                                <div class="flat-item-image">
                                    <a href="#"><img src="{{asset('/tema/covid/pasienx.png')}}" alt=""></a>
                                    <ul class="flat-desc">
                                        <li>
                                            <h2><span style="color: #fff">PDP</span></h2>
                                        </li>
                                    </ul>
                                </div>
                                <div class="flat-item-info">
                                    <div class="flat-title-price">
                                        <h5>Pasien Dalam Pengawasan</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- flat-item -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="flat-item">
                                <div class="flat-item-image">
                                    <a href="#"><img src="{{asset('/tema/covid/pasien.png')}}" alt=""></a>
                                    <ul class="flat-desc">
                                        <li>
                                            <h2><span style="color: #fff">Confirm</span></h2>
                                        </li>
                                    </ul>
                                </div>
                                <div class="flat-item-info">
                                    <div class="flat-title-price">
                                        <h5>Pasien Mengidap Corona</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURED FLAT AREA END -->
        <!-- FEATURES AREA START -->
        <div class="features-area fix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 offset-lg-5">
                        <div class="features-info bg-gray">
                            <div class="features-desc">
                                <p><span data-placement="top" data-toggle="tooltip"
                                         data-original-title="The name you can trust" class="tooltip-content">ODP</span>
                                    adalah singkatan dari Orang Dalam Pemantauan. Seseorang yang mengalami demam (≥38⁰C)
                                    atau riwayat demam; atau gejala gangguan sistem pernapasan seperti pilek/sakit
                                    tenggorokan/batuk dan 14 hari terakhir sebelum timbul gejala memiliki riwayat
                                    perjalanan atau tinggal di luar negeri yang melaporkan transmisi local atau di area
                                    transmisi lokal di Indonesia.</p>
                            </div>
                            <div class="features-desc">
                                <p><span data-placement="top" data-toggle="tooltip"
                                         data-original-title="The name you can trust" class="tooltip-content">PDP</span>
                                    adalah singkatan dari Pasien Dalam Pengawasan. Seseorang dengan demam (≥38⁰C),
                                    disertai salah satu gejala/tanda penyakit pernapasan seperti: batuk/ sesak nafas/
                                    sakit tenggorokan/ pilek/ pneumonia ringan hingga berat dan 14 hari terakhir sebelum
                                    timbul gejala memiliki riwayat :</p>
                            </div>
                            <div class="features-include">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-4">
                                        <div class="features-include-list">
                                            <h6>Kasus Probabel</h6>
                                            <p>Pasien dalam pengawasan yang diperiksa untuk COVID-19 tetapi inkonklusif
                                                (tidak dapat disimpulkan).</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-4">
                                        <div class="features-include-list">
                                            <h6>Kasus Konfirmasi</h6>
                                            <p>Seseorang terinfeksi COVID-19 dengan hasil pemeriksaan laboratorium
                                                positif.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURES AREA END -->

        <!-- OUR AGENTS AREA START -->
        <div class="our-agents-area pt-115 pb-55">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title-2 text-center">
                            <h2>RUJUKAN</h2>
                            <p>Rumah sakit Rujukan Covid-19 di Jawa Timur</p>
                        </div>
                    </div>
                </div>
                <div class="our-agents">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-hover table-sm" id="table-rujukan" width="100%"
                                   cellspacing="0">
                                <thead style="background-color:#eaeaea">
                                <tr>
                                    <th width="20px" style="vertical-align: text-top; text-align: center;">NO</th>
                                    <th width="400px" style="vertical-align: text-top; text-align: center;">NAMA</th>
                                    <th width="200px" style="vertical-align: text-top; text-align: center;">KAB/KOT</th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- OUR AGENTS AREA END -->

        <!-- TESTIMONIAL AREA START -->
        <div class="testimonial-area pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial">
                            <div class="row">
                                <div class="col-lg-8 col-md-9">
                                    <div class="section-title mb-30">
                                        <h2 class="h1">Melindungi Diri dari COVID-19</h2>
                                        <h3>Hal yang Harus Dilakukan :</h3>
                                    </div>
                                    <div class="testimonial-carousel dots-right-btm">
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <h6>Batuk</h6>
                                            <div class="testimonial-brief">
                                                <p>Tutup Mulut dan hidung saat batuk atau bersin dengan tissue.
                                                    Buang tissue pada tempat sampah tertutup.
                                                </p>
                                            </div>
                                            <h6></h6>
                                        </div>
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <h6>GUNAKAN MASKER</h6>
                                            <div class="testimonial-brief">
                                                <p>Kenakan masker hanya jika Anda sakit. Ganti secara berkala dan tetap
                                                    tinggal di rumah, atau segera ke fasilitas kesehatan.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <h6>CUCI TANGAN</h6>
                                            <div class="testimonial-brief">
                                                <p>Cuci tangan dengan sabun dan air minimal 20 detik atau gunakan hand
                                                    sanitizer berbasis alkohol minimal 60%.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <h6>KEBERSIHAN</h6>
                                            <div class="testimonial-brief">
                                                <p>Bersihkan dan lakukan disinfeksi permukaan benda yang sering
                                                    disentuh.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <h6>POLA HIDUP SEHAT</h6>
                                            <div class="testimonial-brief">
                                                <p>Tetap pola hidup sehat dengan makanan bergizi dan olahraga.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="testimonial-area pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial">
                            <div class="row">
                                <div class="col-lg-8 col-md-9">
                                    <div class="section-title mb-30">
                                        <h2 class="h1">Melindungi Diri dari COVID-19</h2>
                                        <h3>Hal yang Tidak Boleh Dilakukan :</h3>
                                    </div>
                                    <div class="testimonial-carousel dots-right-btm">
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <h6>BEPERGIAN</h6>
                                            <div class="testimonial-brief">
                                                <p>Bepergian ke luar rumah saat sedang sakit.
                                                </p>
                                            </div>
                                            <h6></h6>
                                        </div>
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <h6>MASKER</h6>
                                            <div class="testimonial-brief">
                                                <p>Menimbun Masker.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <h6>LINGKUNGAN</h6>
                                            <div class="testimonial-brief">
                                                <p>Berada dekat dengan orang yang sedang sakit, batuk atau bersin.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <h6>SENTUHAN</h6>
                                            <div class="testimonial-brief">
                                                <p>Menyentuh mata, hidung, atau mulut dengan telapak tangan.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TESTIMONIAL AREA END -->

        <!-- BLOG AREA START -->
        <div class="blog-area pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title-2 text-center">
                            <h2>Berita</h2>
                            <p>Informasi terkait COVID-19</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel">
                        @foreach($posts1 as $berita1)
                            <!-- blog-item -->
                                <div class="col">
                                    <article class="blog-item bg-gray">
                                        <div class="blog-image">
                                            <a href="#"><img src="{{asset($berita1->gambar)}}" alt=""></a>
                                        </div>
                                        <div class="blog-info">
                                            <div class="post-title-time">
                                                <h5><a href="{{url('berita/'.$berita1->slug)}}">{{$berita1->judul}}</a>
                                                </h5>
                                                <?php
                                                $tgl = date('d', strtotime($berita1->tgl_buat));
                                                $bln = date('M', strtotime($berita1->tgl_buat));
                                                $thn = date('Y', strtotime($berita1->tgl_buat));
                                                ?>
                                                <p>{{$bln}} {{$tgl}}, {{$thn}}</p>
                                            </div>
                                            <p>{!! Str::words($berita1->berita, 15,' ....</p>')  !!}</p>
                                            <a class="read-more" href="{{url('berita/'.$berita1->slug)}}">Read more</a>
                                        </div>
                                    </article>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel">
                        @foreach($posts2 as $berita2)
                            <!-- blog-item -->
                                <div class="col">
                                    <article class="blog-item bg-gray">
                                        <div class="blog-image">
                                            <a href="#"><img src="{{asset($berita2->gambar)}}" alt=""></a>
                                        </div>
                                        <div class="blog-info">
                                            <div class="post-title-time">
                                                <h5><a href="{{url('berita/'.$berita2->slug)}}">{{$berita2->judul}}</a>
                                                </h5>
                                                <?php
                                                $tgl = date('d', strtotime($berita2->tgl_buat));
                                                $bln = date('M', strtotime($berita2->tgl_buat));
                                                $thn = date('Y', strtotime($berita2->tgl_buat));
                                                ?>
                                                <p>{{$bln}} {{$tgl}}, {{$thn}}</p>
                                            </div>
                                            <p>{!! Str::words($berita2->berita, 15,' ....</p>')  !!}</p>
                                            <a class="read-more" href="{{url('berita/'.$berita2->slug)}}">Read more</a>
                                        </div>
                                    </article>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BLOG AREA END -->

        <!-- SUBSCRIBE AREA START -->
        <div class="subscribe-area bg-blue call-to-bg plr-140 ptb-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="section-title text-white">
                            <h3>Himbauan Tentang</h3>
                            <h2 class="h1">Covid-19</h2>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="subscribe">
                            <span style="color: #fff">Saudara sekalian, mulai sekarang jangan hiraukan informasi mengenai Covid-19 yang berseliweran di grup WA, atau broadcast WA, atau media sosial lainnya. Pantau info Covid-19 di situs resmi yang bisa dipertanggungjawabkan.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SUBSCRIBE AREA END -->
    </section>
    <!-- End page content -->
@endsection

@push('script')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">

        function rumahsinggah() {
            //map posko
            var mapOptions2 = {
                zoom: 11,
                scrollwheel: false,
                center: {lat: -7.7750532, lng: 113.9952789},
            };

            var map2 = new google.maps.Map(document.getElementById('gmap2'),
                mapOptions2);

            google.maps.event.addListener(map2, 'click', function (event) {
                taruhMarker(this, event.latLng);
                geocoder.geocode({
                    'latLng': event.latLng
                }, function (results, status) {
                    alert('Geocoder failed due to: ' + status);
                });
            });
            @foreach($rumah as $value)
                x2{{$value->id}} = "{{$value->rs_lat}}";
            y2{{$value->id}} = "{{$value->rs_long}}";
            var namatempat{{$value->id}} = "{{$value->nama_tempat}}";
            var alamat{{$value->id}} = "{{$value->alamat}}";
            var desa{{$value->id}} = "{{$value->nama_desa}}";
            var kecamatan{{$value->id}} = "{{$value->NAMA_KEC}}";
            var dayatampung{{$value->id}} = "{{$value->daya_tampung}}";
            var koordinator{{$value->id}} = "{{$value->koordinator}}";
            var keterangan{{$value->id}} = "{{$value->keterangan}}";
            var telpkoordinator{{$value->id}} = "{{$value->telpkoordinator}}";
            var dokumentasi{{$value->id}} = "{{$value->dokumentasi}}";
            var ketrs = '<Strong style="font-size:18px">' + namatempat{{$value->id}}+ '</Strong><br><br>'
                + '<img style="display: block; max-width:500px; max-height:350px; width: auto; height: auto;" src="{{asset('tema/map/rumahsinggah')}}/' + dokumentasi{{$value->id}}+ '">'
                + '<br><br><Strong style="color:#17a2b8;font-size:14px">'
                + 'Alamat :  ' + alamat{{$value->id}}+ '</Strong>' +
                '<br><Strong style="color:#17a2b8;font-size:14px">'
                + 'Desa :  ' + desa{{$value->id}}+ '</Strong>' +
                '<br><Strong style="color:#17a2b8;font-size:14px">'
                + 'Kecamatan :  ' + kecamatan{{$value->id}}+ '</Strong>' +
                '<br><Strong style="color:#17a2b8;font-size:14px">'
                + 'Daya Tampung :  ' + dayatampung{{$value->id}}+ '</Strong>' +
                '<br><Strong style="color:#17a2b8;font-size:14px">'
                + 'Koordinator :  ' + koordinator{{$value->id}}+ '</Strong>' +
                '<br><Strong style="color:#17a2b8;font-size:14px">'
                + 'Kontak :  ' + telpkoordinator{{$value->id}}+ '</Strong>' +
                '<br><Strong style="color:#17a2b8;font-size:14px">'
                + 'Keterangan :  ' + keterangan{{$value->id}}+ '</Strong>' +
                '<br><Strong style="color:#17a2b8;font-size:14px">';

            var icon2 = {
                @if($value->kategori == 1)
                url: "{{asset('tema/frontend/images/icons/rs.png')}}", // url
                @else
                url: "{{asset('tema/frontend/images/icons/posko.png')}}", // url
                @endif
                scaledSize: new google.maps.Size(38, 38), // scaled size
                origin: new google.maps.Point(0, 0), // origin
                anchor: new google.maps.Point(20, 35), // anchor
                labelOrigin: new google.maps.Point(20, 45),
            };
            var loc2 = new google.maps.Marker({
                position: new google.maps.LatLng(x2{{$value->id}}, y2{{$value->id}}),
                map: map2,
                icon: icon2,
                html: ketrs,
                labelClass: "labels",
                label: {
                    color: 'black',
                    fontSize: '12px',
                    fontWeight: "bold",
                    text: namatempat{{$value->id}}
                }
            });

            var infowindow2 = new google.maps.InfoWindow();
            google.maps.event.addListener(loc2, 'click', function (event) {
                infowindow2.setContent(this.html);
                infowindow2.setPosition(event.latLng);
                infowindow2.open(map2);
            });
            @endforeach
        }

        function initialize() {
            geocoder = new google.maps.Geocoder();
            var mapOptions = {
                zoom: 11,
                scrollwheel: true,
                center: {lat: -7.5050532, lng: 113.9952789},
            };


            var map = new google.maps.Map(document.getElementById('gmap'),
                mapOptions);

            //even listner ketika peta diklik
            google.maps.event.addListener(map, 'click', function (event) {
                taruhMarker(this, event.latLng);
                geocoder.geocode({
                    'latLng': event.latLng
                }, function (results, status) {
                    alert('Geocoder failed due to: ' + status);
                });
            });

            //Parse FILE KML dengan menggunakan geoxml3.js
            var geoXml = new geoXML3.parser({
                suppressInfoWindows: true,
                preserveViewport: false,
                map: map
            });
            /** letak file kml */
            geoXml.parse("{{asset('tema/map/situbondokab.kml')}}");

            @foreach($data as $values)
                x{{$values->kd_kec}} = "{{$values->latitude}}";
            y{{$values->kd_kec}} = "{{$values->longitude}}";
            var nama{{$values->kd_kec}} = "{{$values->NAMA_KEC}}";
            var odp{{$values->kd_kec}} = "{{$values->jml_odp}}";
            var pdp{{$values->kd_kec}} = "{{$values->jml_pdp}}";
            var positif{{$values->kd_kec}} = "{{$values->jml_positif}}";
            var keterangan = '<Strong style="color:black;font-size:13px">'
                + nama{{$values->kd_kec}}+ '<br></Strong>' +
                '<Strong style="color:#17a2b8;font-size:12px">'
                + 'ODP :  ' + odp{{$values->kd_kec}}+ '</Strong>' +
                '<br><Strong style="color:#ffc107;font-size:12px">'
                + 'PDP :  ' + pdp{{$values->kd_kec}}+ '</Strong>' +
                '<br><Strong style="color:#dc3545;font-size:12px">'
                + 'Confirm :  ' + positif{{$values->kd_kec}}+ '</Strong>';


            infowindow = new google.maps.InfoWindow({
                position: new google.maps.LatLng(x{{$values->kd_kec}}, y{{$values->kd_kec}}),
                content: keterangan
            });
            infowindow.open(map);

                    @endforeach
            var styles = [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#8d8d8d"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 10
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#dbdbdb"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }
                ]
            map.setOptions({styles: styles});

        }

        google.maps.event.addDomListener(window, 'load', initialize);
        google.maps.event.addDomListener(window, 'load', rumahsinggah());
    </script>
@endpush
