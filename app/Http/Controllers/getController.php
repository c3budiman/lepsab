<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\berita;
use DB;
use App\User;
use App\jadwal;
use Illuminate\Support\Facades\Redirect;

class getController extends Controller
{
  public function getBerita()
  {
    $berita = DB::table('berita')->get();
    return view('berita', ['berita'=>berita::paginate(3)]);
  }

  public function getKursus()
  {
    return view('kursus');
  }

  public function getKontak()
  {
    return view('kontak');
  }

  public function getProfile()
  {
    return view('profile');
  }

  public function getIndex() {
    $berita = berita::take(3)->get();
    return view('index2', compact('berita'));
  }

  public function getBeritaSingle($slug) {
    $berita = DB::table('berita')->get();
    $beritanya = DB::table('berita')->where('sluglink','=',$slug)->get()->first();
    if(!$beritanya)
    abort(404);

    return view('berita.layout', ['beritanya'=>$beritanya]);
  }

  public function getMateri() {
    $materi = DB::table('materi')->get();
    return view('materi',['materi'=>$materi]);
  }

  public function dataMateriApi()
  {
      $materi = DB::table('materi')->get();
      return \DataTables::of($materi)
      ->addColumn('lokasitrue', function ($kelulusan) {
          return
          url('/'.$kelulusan->lokasi_materi);
      })
      ->addColumn('action', function ($kelulusan) {
          return
          '<a style="margin-left:5px" href="/'.$kelulusan->lokasi_materi.'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-download"></i> Download</a>';
      })
      ->make(true);
  }

  public function getJadwal($kelas) {
    $jadwalnya = DB::table('jadwal')->where('kelas','=',$kelas)->get()->first();
    if(!$jadwalnya)
    abort(404);
    $jadwal = DB::table('jadwal')->where('kelas','=',$kelas)->paginate(10);
    return view('jadwal', ['jadwal'=>$jadwal, 'kelas'=>$kelas]);
  }

  public function getKelulusan($kelas) {
    //buat cek ada ga kelulusan di kelas yg di maksud...
    $kelulusannya = DB::table('kelulusan')->where('kelas','=',$kelas)->get()->first();
    if(!$kelulusannya)
    abort(404);
    //klo ada kita return paginate
    $kelulusan = DB::table('kelulusan')->where('kelas','=',$kelas)->paginate(10);
    return view('kelulusan', ['kelulusan'=>$kelulusan, 'kelas'=>$kelas]);
  }

  public function getJadwalAndKursus(Request $request) {
    if ($request->carijadwal) {
      $carijadwal = $request->carijadwal;
      $jadwalnya = DB::table('jadwal')->get();
      foreach ($jadwalnya as $jadwal) {
        if ($carijadwal == $jadwal->kelas) {
          return redirect('jadwal/'.$carijadwal);
          break;
        } elseif ($carijadwal == $jadwal->npm) {
          $kelas = DB::table('jadwal')->select('kelas')->where('npm','=',$carijadwal);
          return redirect('jadwal/'.$kelas->first()->kelas);
          break;
        }
      }
      abort(404);
    } else {
      $carikelulusan = $request->carikelulusan;
      $kelulusannya = DB::table('kelulusan')->get();
      foreach ($kelulusannya as $kelulusan) {
        //kelas
        if ($carikelulusan == $kelulusan->kelas) {
          return redirect('kelulusan/'.$carikelulusan);
          break;
          //npm
        } elseif ($carikelulusan == $kelulusan->npm) {
          $kelas = DB::table('kelulusan')->select('kelas')->where('npm','=',$carikelulusan);
          return redirect('kelulusan/'.$kelas->first()->kelas);
          break;
        }
      }
      abort(404);
    }
  }

  public function dataSemuaKelulusanApi()
  {
      $kelulusan = DB::table('kelulusan')->get();
      return \DataTables::of($kelulusan)->make(true);
  }

  public function getSemuaKelulusan()
  {
    return view('semuakelulusan');
  }

  public function dataJadwalApi($kelas)
  {
      $jadwal = DB::table('jadwal')->where('kelas','=',$kelas)->get();
      return \DataTables::of($jadwal)->make(true);
  }

  public function dataSemuaJadwalApi()
  {
      $jadwal = DB::table('jadwal')->get();
      return \DataTables::of($jadwal)->make(true);
  }

  public function getSemuaJadwal()
  {
    return view('semuajadwal');
  }

}
