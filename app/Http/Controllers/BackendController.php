<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\materi;
use App\role;
use App\berita;
use App\jadwal;
use App\kelulusan;
use Illuminate\Support\Facades\Input;
use Storage;
use Excel;
use Datatables;
use File;
use RecursiveIterator;

class BackendController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  function index() {
    return view('dashboard.index');
  }

  public function logout() {
    Auth::logout();
    return redirect('loginadmin')->with('status', 'Anda Telah berhasil logout!');
  }

  public function redirecthome() {
    return redirect('/');
  }

  public function getAturBerita()
  {
    $berita = DB::table('berita')->get();
    return view('dashboard.berita.aturberita',['berita'=>$berita]);
  }

  public function dataBeritaDT()
  {
      return \DataTables::of(berita::query())
          ->addColumn('action', function ($berita) {
              return
               '<a style="margin-left:5px" href="/berita/'.$berita->sluglink.'" target="_blank" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-star"></i> Lihat</a>'
              .'<a style="margin-left:5px" href="/berita/'.$berita->id.'/edit" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Ubah</a>'
              .'<a style="margin-left:5px" href="/berita/'.$berita->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
          })
          ->make(true);
  }

  public function getBeritaBaru()
  {
    return view('dashboard.berita.beritabaru');
  }

  public function postBeritaBaru(Request $request)
  {
    $judul = strtolower(Input::get('judul'));
    if(strlen($judul) > 30) {
      $judul = substr($judul, 0, 30);
    }
    $url = urlencode(strtolower($judul));

    $berita = new berita();
    $berita->sluglink = $url;
    $berita->author = Input::get('nama');
    $berita->judul = strip_tags(ucwords(Input::get('judul')));
    $berita->author = Input::get('author');
    $berita->content = Input::get('isinya');
    $berita->excerpt = substr(strip_tags(Input::get('isinya')), 0, 400);

    $berita->save();
    return redirect('aturberita');
  }

  //ini buat view dimana kita bakalan nge set value ke form
    public function editBerita($id)
    {
      $berita = berita::find($id);
      if(!$berita)
      abort(404);

      return view('dashboard.berita.editberita', ['berita'=>$berita]);
    }

  //ini buat setelah di klik post/put buat update data nya
    public function updateBerita(Request $request, $id)
    {
      $judul = strtolower(Input::get('judul'));
      if(strlen($judul) > 30) {
        $judul = substr($judul, 0, 30);
      }
      $url = urlencode(strtolower($judul));

      $berita = berita::find($id);
      $berita->sluglink = $url;
      $berita->author = Input::get('nama');
      $berita->judul = ucwords(Input::get('judul'));
      $berita->author = Input::get('author');
      $berita->content = Input::get('isinya');
      $berita->excerpt = substr(strip_tags(Input::get('isinya')), 0, 400);

      $berita->save();
      return redirect('aturberita');
    }

    //konsep sama....
      public function deleteBerita($id)
      {
        $berita = berita::find($id);
        if(!$berita)
        abort(404);

        return view('dashboard.berita.deleteberita', ['berita'=>$berita]);
      }

      public function destroyBerita($id)
      {
        $berita = berita::find($id);
        $berita->delete();
        return redirect('aturberita');
      }

      public function getMateriBaru()
      {
        return view('dashboard.materi.materibaru');
      }

      public function storeMateriBaru(Request $request)
      {
        if ($request->hasFile('tes')) {
          $namafile = $request->file('tes')->getClientOriginalName();
          $ext = $request->file('tes')->getClientOriginalExtension();
          $lokasifileskr = 'storage/materi/'.$namafile;

          //cek jika file sudah ada...
          if(File::exists($lokasifileskr)){
            return Redirect::back()->withErrors(['file sudah ada, coba rename!']);
          }

          //cek jika nama judul materi ga ditulis
          if (empty(Input::get('namafile'))) {
            return Redirect::back()->withErrors(['Nama Materi Tidak Boleh Kosong']);
          }

          //yg paling penting cek extension, no php allowed
          if ($ext == "pdf" || $ext == "png" || $ext == "jpg" || $ext == "docx" || $ext == "doc") {
            $location = Storage::putFileAs('public/materi',$request->file('tes'),$namafile);
            $lokasi = str_replace("public","storage",$location);
            $materi = new materi();
            $materi->nama_materi = strip_tags(Input::get('namafile'));
            $materi->lokasi_materi = $lokasi;
            $materi->author = Input::get('author');
            $materi->save();
            return redirect('atur-materi')->with('status', 'File Berhasil Di Upload!');
          }
          return Redirect::back()->withErrors(['file tidak sesuai, tidak bisa diupload']);
        } else {
          return Redirect::back()->withErrors(['file tidak terbaca, tidak bisa diupload']);
        }
      }

      public function getAturMateri()
      {
        $materi = DB::table('materi')->get();
        return view('dashboard.materi.atur-materi', ['materi' => $materi]);
      }

      public function dataMateriDT()
      {
          return \DataTables::of(materi::query())
              ->addColumn('action', function ($materi) {
                  return
                   '<a style="margin-left:5px" href="/'.$materi->lokasi_materi.'" target="_blank" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-star"></i> Lihat</a>'
                  .'<a style="margin-left:5px" href="/materi/'.$materi->id.'/rename" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Rename</a>'
                  .'<a style="margin-left:5px" href="/materi/'.$materi->id.'/edit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>'
                  .'<a style="margin-left:5px" href="/materi/'.$materi->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
              })
              ->make(true);
      }

      public function getEditMateri($id)
      {
        $materi = materi::find($id);
        if(!$materi)
        abort(404);
        return view('dashboard.materi.edit-materi', ['materi' => $materi]);
      }

      public function getRenameMateri($id)
      {
        $materi = materi::find($id);
        if(!$materi)
        abort(404);
        return view('dashboard.materi.rename-materi', ['materi' => $materi]);
      }

      public function update_materi(Request $request, $id)
      {
        if ($request->hasFile('tes')) {
          $namafile = $request->file('tes')->getClientOriginalName();
          $ext = $request->file('tes')->getClientOriginalExtension();
          $lokasifileskr = 'storage/materi/'.$namafile;

          if (empty(Input::get('namafile'))) {
            return Redirect::back()->withErrors(['Nama Materi Tidak Boleh Kosong']);
          }

          //cek jika file sudah ada...
          if(File::exists($lokasifileskr)){
            return Redirect::back()->withErrors(['file sudah ada, coba rename!']);
          }

          if ($ext == "pdf" ||
              $ext == "png" ||
              $ext == "jpg" ||
              $ext == "docx" ||
              $ext == "xlsx" ||
              $ext == "doc")
          {
            $location = Storage::putFileAs('public/materi',$request->file('tes'),$namafile);
            $lokasi = str_replace("public","storage",$location);
            $materi = materi::find($id);
            $materi->nama_materi = strip_tags(Input::get('namafile'));
            $materi->lokasi_materi = $lokasi;
            $materi->author = Input::get('author');
            $materi->save();
            return redirect('atur-materi')->with('status', 'File Berhasil Di Upload!');
          }
          else {
            return Redirect::back()->withErrors(['file tidak sesuai, tidak bisa diupload']);
          }
        }
        else {
          $materi = materi::find($id);
          $materi->nama_materi = strip_tags(Input::get('namafile'));
          $materi->save();
          return redirect('atur-materi')->with('status', 'Nama materi berhasil di rename');
        }
      }

      public function destroyMateri($id)
      {
        $materi = materi::find($id);
        $file = str_replace("storage","public",$materi->lokasi_materi);
        Storage::delete($file);
        $materi->delete();
        return redirect('atur-materi');
      }



      public function getAturKelulusan()
      {
        $kelulusan = DB::table('kelulusan')->get();
        return view('dashboard.kelulusan.atur-kelulusan',['kelulusan'=>kelulusan::paginate(20)]);
      }

      public function dataKelulusanDT()
      {
          return \DataTables::of(kelulusan::query())
              ->addColumn('action', function ($kelulusan) {
                  return
                  '<a style="margin-left:5px" href="/kelulusan/'.$kelulusan->id.'/edit" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Ubah</a>'
                  .'<a style="margin-left:5px" href="/kelulusan/'.$kelulusan->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
              })
              ->make(true);
      }

      public function getKelulusanBaru()
      {
        return view('dashboard.kelulusan.tambah-kelulusan');
      }

      public function importKelulusan(Request $request)
      {
        if($request->file('imported-file'))
        {
            $path = $request->file('imported-file')->getRealPath();
            $data = Excel::load($path, function($reader) {
        })->get();
        if(!empty($data) && $data->count())
        {
          $data = $data->toArray();
          for($i=0;$i<count($data);$i++)
          {
            $dataImported[] = $data[$i];
          }
        }
        // dd($dataImported);
        try {
            kelulusan::insert($dataImported);
            return back()->with('status', 'Berhasil dimasukan Ke Database');
        }catch(\Exception $e){
            return Redirect::back()->withErrors(['terdapat kesalahan format file, pastikan format file sudah benar!']);
        }
      }
      return Redirect::back()->withErrors(['terdapat kesalahan, pastikan format file sudah benar!']);
    }

    public function TambahKelulusan()
    {
      return view('dashboard.kelulusan.kelulusan-satuan');
    }

    public function postTambahKelulusan(Request $request)
    {
        $kelulusan = new kelulusan();
        $kelulusan->npm = strip_tags(Input::get('npm'));
        $kelulusan->nama = strip_tags(Input::get('nama'));
        $kelulusan->kelas = strip_tags(Input::get('kelas'));
        $kelulusan->jurusan = strip_tags(Input::get('jurusan'));
        $kelulusan->periode = strip_tags(Input::get('periode'));
        $kelulusan->materi = strip_tags(Input::get('materi'));
        $kelulusan->status = strip_tags(Input::get('status'));
        $kelulusan->ambilser = strip_tags(Input::get('ambilser'));

        $kelulusan->save();
        return redirect('atur-kelulusan');
    }

    public function EditKelulusan($id) {
      $kelulusan = kelulusan::find($id);
      return view('dashboard.kelulusan.kelulusan-edit',['kelulusan'=>$kelulusan]);
    }

    public function updateKelulusan(Request $request, $id)
    {
      $kelulusan = kelulusan::find($id);
      $kelulusan->npm = strip_tags(Input::get('npm'));
      $kelulusan->nama = strip_tags(Input::get('nama'));
      $kelulusan->kelas = strip_tags(Input::get('kelas'));
      $kelulusan->jurusan = strip_tags(Input::get('jurusan'));
      $kelulusan->periode = strip_tags(Input::get('periode'));
      $kelulusan->materi = strip_tags(Input::get('materi'));
      $kelulusan->status = strip_tags(Input::get('status'));
      $kelulusan->ambilser = strip_tags(Input::get('ambilser'));
      $kelulusan->save();

      return redirect('atur-kelulusan');
    }



    public function destroyKelulusan($id)
    {
      $kelulusan = kelulusan::find($id);
      $kelulusan->delete();
      return redirect('atur-kelulusan');
    }

    public function getProfile() {

      return view('dashboard.profilpengguna');
      // if (Auth::user()->id) {
      //   # code...
      // }
    }

    public function getGantiPassword()
    {
      return view('dashboard.GantiPassword');
    }

    public function getGantiNama()
    {
      return view('dashboard.GantiNama');
    }

    public function postGantiPassword(Request $request)
    {
      $password = $request->password;
      $passwordbaru1 = $request->password21;
      $passwordbaru2 = $request->password22;
      if ($passwordbaru1 == $passwordbaru2) {
            if (!Hash::check($password,Auth::user()->password)) {
              return Redirect::back()->withErrors(['Password lama Anda Salah', 'Kredensial anda salah']);
            } else {
              //ganti password here
              $request->user()->fill(['password'=>Hash::make($passwordbaru1)])->save();
              return Redirect('profile')->with('status', 'Password updated!');
            }
          }
          else {
            return Redirect::back()->withErrors(['Password baru tidak sama', 'Kredensial anda salah']);
          }
    }

    public function postGantiNama(Request $request)
    {
      $password = $request->password;
      if (!Hash::check($password,Auth::user()->password)) {
          return Redirect::back()->withErrors(['Password lama Anda Salah', 'Kredensial anda salah']);
          } else {
          //gantinamahere
          $userskr = Auth::user();
          $userskr->name = strip_tags($request->namabaru);
          $userskr->save();
          return Redirect('profile')->with('status', 'Nama updated!');
          }
    }

    public function tesgan()
    {
        echo "<h1> Fitur sementara dimatikan demi keamanan..... </h1>";
        $dir = "/home/c3budiman/lepsab/public/storage/images/images";
        $files = scandir($dir);
        foreach ($files as $file) {
          if ($file == "." || $file == "..") {
            continue;
          } else {
            $result[] = $file;
          }
        }
        return view('debug', ['result'=>$result]);
    }

    public function getDir()
    {
      $dir = "/home/c3budiman/lepsab/public/storage/images/images";
      $files = scandir($dir);
      foreach ($files as $file) {
        if ($file == "." || $file == "..") {
          continue;
        } else {
          $result[] = $file;
        }
      }
        return view('debug', ['result'=>$result]);
    }
}
