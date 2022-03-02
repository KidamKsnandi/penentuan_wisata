<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Wisata;
use Illuminate\Database\Seeder;

class SemuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori1 = Kategori::create(['nama_kategori' => 'Alam', 'slug' => 'alam']);
        $kategori2 = Kategori::create(['nama_kategori' => 'Budaya', 'slug' => 'budaya']);
        $kategori3 = Kategori::create(['nama_kategori' => 'Pendidikan', 'slug' => 'pendidikan']);

        $wisata1 = Wisata::create(['id_kategori' => $kategori1, 'nama_wisata' => 'Curug Ciangin', 'slug' => 'curug-ciangin',
            'lokasi' => 'Kampung Neglasari, Cibeusi, Kec. Ciater, Kabupaten Subang, Jawa Barat',
            'deskripsi_wisata' => '<p>Kabupaten Subang memiliki tempat wisata yang menarik untuk kamu kunjungi, setelah mengunjungi Tempat Pemandian Air panas Sari Ater dan Curug Koleangkak kamu wajib mengunjungi tempat yang satu ini.&nbsp;Namanya ialah Curug Ciangin yang berada di Desa Cibeusi, Ciater. Lokasi ini menawarkan kamu berbagai macam ragam wisata yang menarik.</p>
            <h2>Sejarah Curug Ciangin</h2><p>Curug Ciangin pertama kali ditemukan sekitar Bulan Juli 2015 lalu oleh keluarga Mang Nana atas binaan dari mahasiswa ITB.</p>
            <p>Baru dibuka untuk umum pada tanggal 23 Desember tahun 2015. Dengan mengandalkan kealamian alam yang tersimpan, dan berada dilahan seluas 2 hektar. Lambat laun Curug Ciangin mulai diminati banyak pengunjung.</p>
            <h2>Pesona Keindahan Curug Ciangin</h2><p>Penamaan Curug Ciangin mengandung makna sebuah air terjun atau curug yang aliran airnya selalu menghempaskan angin, sehingga membuat udara disekitarnya menjadi sejuk.</p>
            <p>Curug Ciangin memiliki dua tingkatan, tingkatan yang pertama aliran air terjunnya tak begitu tinggi. Dimana aliran airnya menuju Curug Ciangin yang berada dibawahnya.&nbsp;Sedangkan Curug Ciangin sendiri memiliki dua aliran air terjun, dengan tinggi yang sedikit berbeda. Aliran airnya jatuh menuju kolam yang berada dibawahnya. Ketinggian curugnya mencapai 9 meter.</p><h2>Ragam Wisata di Curug Ciangin</h2>
            <p>1. Berenang</p><p>2. Bermain Air</p><p>3. Body Jumping</p><p>4. Camping</p><p>5. Menikmati Curug Nangka Bongkok</p><p>6. Berfoto</p>
            <h2>Fasilitas Curug Ciangin</h2><p>Fasilitas yang tersedia di Curug Ciangin sudah cukup lengkap, hal tersebut ditandai dengan tersedianya:</p>
            <ul>
                <li>Area parkir yang cukup luas</li>
                <li>Warung-warung makanan dan minuman</li>
                <li>Saung-saung sederhana</li>
                <li>Camping Ground</li>
                <li>Mushola</li>
                <li>Kamar mandi</li>
                <li>Tempat penyewaan ban</li>
            </ul>', 'harga_tiket' => '<ul>
                <li>Untuk dapat menikmati keindahan Curug Ciangin kamu hanya perlu membayar tiket masuk sebesar Rp. 15.000,- per orangnya.</li>
                <li>Masuk ke area Muara Jambu kamu harus membayar tiket sebesar Rp. 15.000,- per orang.</li>
                <li>Sewa ban pelampung sebesar Rp. 10.000,-</li>
            </ul>', 'cover' => '9909alam (curug ciangin).webp', 'status' => '["Rekomendasi"]']);
        $wisata2 = Wisata::create(['id_kategori' => $kategori1, 'nama_wisata' => 'Kawah Putih', 'slug' => 'kawah-putih',
            'lokasi' => 'Desa Alam Endah, Kecamatan Rancabali, Kabupaten Bandung Jawa Barat',
            'deskripsi_wisata' => '<p>Kawah Putih adalah tempat wisata di Bandung yang paling terkenal. Berlokasi di Ciwidey, Jawa Barat, kurang lebih sekitar 50 KM arah selatan kota Bandung, Kawah Putih adalah sebuah danau yang terbentuk akibat dari letusan Gunung Patuha. Sesuai dengan namanya, tanah yang ada di kawasan ini berwarna putih akibat dari pencampuran unsur belerang. Selain tanahnya yang berwarna putih, air danau kawasan Kawah Putih juga mempunyai warna yang putih kehijauan dan dapat berubah warna sesuai dengan kadar belerang yang terkandung, suhu, dan cuaca.</p>
            <h3>KAWAH PUTIH</h3><p>Kawah Putih Ciwidey berada di kawasan pegunungan yang mempunyai ketinggian lebih dari 2.400 meter di atas permukaan laut. Dengan ketinggian tersebut, suhu udara di kawasan Kawah Putih tentu saja dingin dengan suhu 8 derajat Celsius sampai dengan 22 derajat Celsius, oleh karena itu jangan lupa membawa jaket atau memakai pakaian yang tebal.<br />
            &nbsp;</p><p>Selain untuk dinikmati keindahannya oleh para wisatawan, Kawah Putih Ciwidey juga sering kali menjadi tempat kegiatan lain, misalnya pengambilan gambar film, melukis, foto pengantin, sampai dengan kegiatan mendaki dan berkuda.</p>
            <h3>SEJARAH KAWAH PUTIH</h3><p>Cerita mengenai Kawah Putih bermula pada abad ke 10 di mana terjadi sebuah letusan hebat oleh Gunung Patuha. Setelah letusan ini, banyak orang beranggapan bahwa lokasi ini adalah kawasan angker karena setiap burung yang terbang melewati kawasan tersebut akan mati.<br />&nbsp;</p>
            <p>Seiring dengan berjalannya waktu, kepercayaan mengenai angkernya tempat ini mulai pudar, sampai akhirnya pada tahun 1837 ada seorang ahli botani dengan kebangsaan Jerman datang ke kawasan ini untuk melakukan penelitian. Peneliti yang bernama Dr. Franz Wilhelm Junghuhn tersebut sangat tertarik dengan kawasan pegunungan sunyi yang bahkan tidak ada burung yang terbang di atasnya sehingga ia berkeliling desa untuk mencari informasi. Pada saat itu, seluruh informasi yang ia dapatkan adalah bahwa kasawan tersebut angker dan dihuni oleh mahluk halus.<br />&nbsp;</p>
            <p>Bagi Dr. Franz Wilhelm Junghuhn, pernyataan masyarakat setempat tersebut tidaklah masuk akal. Karena tidak percaya dengan cerita-cerita tersebut, ia pergi ke dalam hutan rimba untuk mencari tahu apa yang ada di sana. Singkat cerita, akhirnya Dr. Franz Wilhelm Junghuhn berhasil mencapai puncak gunung, dan dari sana ia melihat keberadaan sebuah danau indah berwarna putih dengan bau belerang yang menyengat.<br />&nbsp;</p>
            <p>Sejak itu, keberadaan Kawah Putih Ciwidey menjadi terkenal dan mulai dari tahun 1987 pemerintah mengembangkan kawasan ini sebagai tempat wisata yang menawarkan pengalaman unik melihat danau yang dapat berubah warna.</p>
            <h3>CARA KE KAWAH PUTIH</h3><p>Kawah Putih yang beralamat di Jalan Raya Soreang Ciwidey KM 25 berlokasi tidak jauh dari tempat wisata Situ Patenggang dan dapat dicapai dengan mudah bila Anda membawa kendaraan pribadi karena terdapat banyak penunjuk jalan. Dari Jakarta, Anda hanya perlu menggunakan jalur tol Cipularang dan keluar melalui pintu tol Kopo. Dari sana Anda harus menuju ke Soreang dan berkendara ke bagian selatan Ciwidey.<br />
            &nbsp;</p>
            <p>Bila menggunakan kendaraan umum, Anda dapat naik angkot dari terminal Leuwi Panjang yang menuju ke terminal Ciwidey. Dari terminal Ciwidey, Anda dapat menggunakan angkot yang menuju Situ Patenggang dan turun di depan gerbang Kawah Putih.</p>
            <h3>FASILITAS DI KAWAH PUTIH</h3><p>Karena telah dikembangkan sebagai kawasan wisata, Kawah Putih mempunyai fasilitas penunjang kenyamanan berwisata yang memadai, yaitu:</p>
            <ul>
                <li>Area parkir yang luas</li>
                <li>Mushola</li>
                <li>Transportasi dari gerbang depan sampai dengan kawah</li>
                <li>Pusat informasi</li>
                <li>Restoran dan warung makanan</li>
                <li>Toilet</li>
                <li>Harga tiket masuk Kawah Putih Ciwidey</li>
                <li>Kawah Putih Ciwidey Bandung</li>
            </ul>', 'harga_tiket' => '<p>Harga tiket masuk Kawah Putih pada hari biasa dan hari libur serta akhir pekan adalah sama yaitu 15.000 Rupiah per orang, sedangkan untuk tarif kendaraan adalah sebagai berikut:</p>
            <ul>
                <li>Parkir atas (mobil): 150.000 Rupiah</li>
                <li>Parkir atas (motor): 35.000 Rupiah</li>
                <li>Ontang-anting: 13.000 Rupiah</li>
                <li>Parkir bawah (mobil): 6.000 Rupiah</li>
                <li>Parkir bawah (motor): 5.000 Rupiah</li>
                <li>Parkir bawah (bus): 25.000 Rupiah</li>
            </ul>', 'cover' => '7714alam (kawah putih)2.jpg', 'status' => '["Populer"]']);
    }
}
