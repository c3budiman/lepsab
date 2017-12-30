@extends('layouts.master')

@section('csstambahan')

@endsection

@section('title2')
Kursus/Workshop
@endsection

@section('title')
Lepsab | Kursus/Workshop
@endsection

@section('isinya')
  <div class="section profile-content">

  <div style="margin-top:40px" class="container">
    <div class="tim-title">
      <h3> <i style="margin-right:5px;" class="fa fa-calendar-check-o"> </i>  Jadwal Kursus </h3>
    </div>
      <form method="post" action="{{url(action('getController@getJadwalAndKursus'))}}">
        <table style="width:100%">
          <tr>
            <td>
            <input placeholder="Input Kelas / NPM" type="text" name="carijadwal" class="form-control" autofocus>
            {{ csrf_field() }}
            </td>
            <td>
              <button type="submit" class="btn btn-info"><span>Cari Jadwal</span>
              <i class="fa fa-angle-right"></i></button>
            </td>
          </tr>
        </table>
        <div id="form-subscribe-footer" class="form-output"></div>
      </form>
  </div>

  <div style="margin-top:40px" class="container">
    <div class="tim-title">
      <h3> <i style="margin-right:10px;" class="fa fa-graduation-cap "> </i> Cek Kelulusan</h3>
    </div>
      <form method="post" action="{{url(action('getController@getJadwalAndKursus'))}}">
        <table style="width:100%">
          <tr>
            <td>
            <input placeholder="Input Kelas / NPM" type="text" name="carikelulusan" class="form-control" autofocus>
            {{ csrf_field() }}
            </td>
            <td>
              <button type="submit" class="btn btn-info"><span>Cari Kelulusan</span>
              <i class="fa fa-angle-right"></i></button>
            </td>
          </tr>
        </table>
        <div id="form-subscribe-footer" class="form-output"></div>
      </form>
  </div>

    <div class="container">
      <div class="row">
        <div class="tim-title">
          <h3> <i style="margin-right:7px;" class="fa fa-user-plus "> </i> Prosedur Pendaftaran</h3>
        </div>
      </div>
      <div class="row">
          <div class="ml-auto mr-auto">
            <p>Peserta yang ingin mendaftar kursus atau workshop dapat dengan dua cara yaitu booking dan umum. Booking merupakan pendaftaran kursus atau workshop secara kolektif untuk sejumlah peserta yang dikoordinir oleh satu orang. Umum merupakan pendaftaran kursus atau workshop yang dibuka secara periodik bagi peserta perorangan. </p>
            <p class="tim-title">Pendaftaran Untuk Booking : </p>
            <ul>
              <li>
                Koordinator booking memberikan daftar nama peserta dan npm kepada petugas.
              </li>
              <li>
                Setelah koordinator mendapatkan jadwal kursus atau workshop yang telah disepakati, petugas akan memberikan form booking dan blanko sejumlah peserta.
              </li>
              <li>
                Koordinator booking akan diberikan batas akhir pengembalian blanko.
              </li>
              <li>
                Setiap terdapat perubahan peserta, koordinator booking wajib melapor kepada petugas loket.
              </li>
              <li>
                Setelah semua blanko dibayar, koordinator booking mengembalikan blanko putih dan merah ke loket dan mendapat formliir pendaftaran.
              </li>
              <li>
                Koordinator booking mengisi formliir pendaftaran semua peserta dan pada hari yang sama dikembalikan ke petugas loket. Petugas loket akan memberikan tanda peserta yang harus dibawa pada saat pelaksanaan.
              </li>
              <li>
                Koordinator booking bertanggung jawab terhadap pendistribusian tanda peserta.
              </li>
            </ul>
         </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="tim-title">
        <h3> <i style="margin-right:7px;" class="fa fa-tag"> </i> Biaya Kursus & Workshop Mahasiswa Gunadarma</h3>
      </div>
    </div>
      <div class="row">
        <table width="475" border="1" align="center">
            <tbody>
            <tr align="center">
            <td>No</td>
            <td>Title</td>
            <td>Fee</td>
            </tr>
            <tr>
            <td align="center">1</td>
            <td align="center">Kursus</td>
            <td align="center">Rp.100.000 - Rp.250.000</td>
            </tr>
            <tr>
            <td align="center">2</td>
            <td align="center">Workshop</td>
            <td align="center">Rp.50.000 - Rp.75.000</td>
            </tr>
            </tbody>
        </table>
      </div>
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="tim-title">
                <h3> <i style="margin-right:7px;" class="fa fa-book"> </i> Tata Tertib</h3>
            </div>

     <div class="nav-tabs-navigation">
       <div class="nav-tabs-wrapper">
            <ul id="tabs" class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#workshop" role="tab">Workshop</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#kursus" role="tab">Kursus</a>
                      </li>
              </ul>
      </div>
    </div>

    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active ml-auto mr-auto" id="workshop" role="tabpanel">
          {{-- isidari tatatertib workshop goes here --}}
          <ol>
	<li>Workshop dilaksanakan selama 1 atau 2 hari di kampus Kalimalang, Bekasi dengan ketentuan :
<ol type="a">
	<li>Dimulai pukul 09.00 WIB dan diakhiri pukul 16.00 (istirahat pukul 12.00 WIB sampai 13.00 WIB).</li>
	<li>Untuk workshop tertentu, tempat dan lama pelaksanaan sebagai berikut :
<div align="center">
<table width="500" border="1" cellspacing="0" cellpadding="1">
<tbody>
<tr bgcolor="#ffffff">
<td align="center">Nama Workshop</td>
<td align="center">Tempat Pelaksanaan</td>
<td align="center">Lama Pelaksanaan</td>
</tr>
<tr>
<td>Bahasa</td>
<td>Kampus D Gd.III Lt.2</td>
<td>1 Hari</td>
</tr>
<tr>
<td>Bahasa Inggris</td>
<td>Kampus D Gd.II Lt.3</td>
<td>2 Hari</td>
</tr>
</tbody>
</table>
</div></li>
	<li>Peserta workshop dinyatakan lulus bila telah mengikuti workshop dengan menandatangani absensi pada <strong>seluruh session</strong>.</li>
</ol>
</li>
	<li>Membawa blanko pendaftaran workshop.</li>
	<li>Hadir 15 menit sebelum workshop dimulai, bila terlambat lebih dari 30 menit, maka peserta workshop tidak diperkenankan mengikuti session I, kecuali mendapatkan ijin dari koordinator workshop.</li>
	<li>Selama workshop berlangsung diwajibkan:
<ol type="a">
	<li>Memelihara suasana yang nyaman dan tenang dengan tidak:
<ul>
	<li>Merokok atau makan/minum atau mengotori ruangan.</li>
	<li>Hilir mudik yang tidak perlu.</li>
	<li>Bertindak atau berbicara yang tidak ada hubungannya dengan workshop yang sedang diikuti.</li>
	<li>Meninggalkan ruangan workshop selama workshop berlangsung tanpa seijin asisten/koordinator workshop</li>
</ul>
</li>
	<li>Berpakaian sopan dan rapi.
<ul>
	<li>Untuk Pria : memakai kemeja, tidak diperkenankan memakai kaos (dalam bentuk apapun) serta memakai celana panjang bukan dari bahan jeans.</li>
	<li>Untuk Wanita : memakai rok (bukan dari bahan jeans) dan tidak diperkenankan memakai kaos dalam bentuk apapun.</li>
	<li>Menggunakan sepatu tertutup.</li>
</ul>
</li>
	<li>Menjaga peralatan-peralatan workshop, jika terjadi kerusakan/kehilangan peralatan, menjadi tanggung jawab peserta workshop.</li>
	<li>Menjaga barang-barang milik pribadi, bila terjadi kehilangan atas barang-barang tersebut maka LePKom-Gunadarma tidak bertanggung jawab atas hal tersebut.</li>
</ol>
</li>
	<li>Peserta yang tidak dapat mengikuti workshop pada tanggal yang telah ditentukan, diwajibkan melapor ke sekretariat pendaftaran <strong>paling lambat 3 hari sebelum tanggal pelaksanaan.</strong>
<strong>Sangsi :</strong> bila melebihi batas batas tersebut, peserta dikenakan denda sebesar Rp.5000 (lima ribu rupiah) per workshop yang diikuti.</li>
	<li>Sertifikat workshop dapat diambil di sekretariat pendaftaran setelah <strong>1(satu)bulan</strong> dar tanggal pelaksanaan workshop dengan menunjukkan blanko pendaftaran workshop.
LePKom-Gunadarma tidak bertanggung jawab atas pengambilan sertifikat yang dilakukan <strong>lebih dari 6 bulan</strong> setelah dikeluarkannya sertifikat.</li>
	<li>Blanko pembayaran berlaku selam <strong>6 bulan</strong> terhitung dari tanggal pembayaran di bank.</li>
</ol>
        </div>
        <div class="tab-pane" id="kursus" role="tabpanel">


          <ol>
	<li>Kursus dilaksanakan selama 5 Hari di kampus Pondok Cina, Depok dengan ketentuan :
<ol type="a">
	<li>Dimulai pukul 09.00 WIB dan diakhiri pukul 17.00 WIB (istirahat pukul 12.00 - 13.00 WIB).</li>
	<li>Tempat pelaksanaan :
<div align="center">
<table width="500" border="1" cellspacing="0" cellpadding="1">
<tbody>
<tr bgcolor="#ffffff">
<td align="center"><strong>Nama Kursus</strong></td>
<td align="center"><strong>Tempat Pelaksanaan</strong></td>
</tr>
<tr>
<td>Berbalas pantun</td>
<td>Kampus D Gedung IV Lantai2</td>
</tr>
<tr>
<td>IELT (English Test)</td>
<td>Kampus D Gedung II Lantai3</td>
</tr>
</tbody>
</table>
</div></li>
</ol>
</li>
	<li>Membawa blanko pendaftaran kursus dan <strong>KTM</strong> atau <strong>KRS</strong> terbaru.</li>
	<li>Hadir 15 menit sebelum kursus dimulai, bila terlambat lebih dari 30 menit, maka peserta kursus tidak diperkenankan mengikuti kursus pada hari tersebut, kecuali mendapatkan ijin dari koordinator kursus.</li>
	<li>Selama kursus berlangsung diwajibkan :
<ol type="a">
	<li>Memelihara suasana yang nyaman dan tenang dengan tidak :
<ul>
	<li>Merokok atau makan/minum atau mengotori ruangan</li>
	<li>Hilir mudik yang tidak perlu.</li>
	<li>Bertindak atau berbicara yang tidak ada hubungannya dengan kursus yang sedang diikuti.</li>
	<li>Meninggalkan ruangan kursus selama kursus berlangsung tanpa seijin asisten/koordinator kursus.</li>
</ul>
</li>
	<li>Berpakaian sopan dan rapi :
<ul>
	<li>Untuk Pria : memakai kemeja, tidak diperkenankan memakai kaos (dalam bentuk apapun) serta memakai celana panjang bukan dari bahan jeans.</li>
	<li>Untuk Wanita : memakai rok (bukan dari bahan jeans) dan tidak diperkenankan memakai kaos dalam bentuk apapun.</li>
	<li>Menggunakan sepatu tertutup.</li>
</ul>
</li>
	<li>Menjaga peralatan-peralatan kursus, jika terjadi kerusakan/kehilangan peralatan menjadi tanggung jawab peserta kursus.</li>
	<li>Menjaga barang-barang milik pribadi, bila terjadi kehilangan atas barang-barang tersebut maka LePKom Gunadarma tidak bertanggung jawab atas hal tersebut.</li>
</ol>
</li>
	<li>Peserta yang tidak dapat mengikuti kursus pada tanggal yang telah ditentukan, diwajibkan melapor ke sekretariat pendaftaran <strong>paling lambat 3 hari sebelum tanggal pelaksanaan</strong> (Hari Minggu tidak terhitung)
<strong>Sangsi</strong> : bila melebihi batas tersebut, peserta dikenakan denda sebesar Rp. 25.000 (dua puluh lima ribu rupiah) per kursus yang diikuti.</li>
	<li>Peserta yang dinyatakan tidak lulus, diwajibkan untuk <strong>membayar denda</strong> dan <strong>mengikuti ujian ulang</strong> pada hari terakhir secepatnya, kecuali bagi peserta yang mengikuti kursus selama 5 hari berturut-turut tanpa absen, tidak dikenakan denda dan langsung mengikuti ujian ulang pada hari terakhir dengan terlebih dahulu melapor ke sekretariat pendaftaran.</li>
	<li>Bila ujian ulang dilaksanakan lebih dari 6 bulan setelah ujian pertama, maka peserta tersebut wajib melakukan preview dengan membayar biaya kursus sebesar 100% biaya kursus.</li>
	<li>Sertifikat kursus dapat diambil di sekretariat pendaftaran setelah <strong>1 (satu) bulan</strong> dari tanggal pelaksanaan kursus denga menunjukkan blanko pendaftaran kursus. LePKom-Gunadarma tidak bertanggung jawab atas pengambilan sertifikat yang dilakukan <strong>lebih dari 6 bulan</strong> setelah dikeluarkannya sertifikat.</li>
	<li>Blanko pembayaran kursus berlaku selama <strong>6 bulan</strong> terhitung dari tanggal pembayaran di Bank.</li>
</ol>
        </div>
    </div>
      </div>
  </div>
</div>
</div>

@endsection
