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

  public function getPengguna() {
    $usernya = DB::table('users')->get();
    return view('dashboard.pengguna.pengguna', ['usernya'=>$usernya]);
  }

  public function dataPenggunaDT()
  {
      return \DataTables::of(User::query())
          ->addColumn('action', function ($user) {
              return
               '<a style="margin-left:5px" href="/pengguna/'.$user->id.'/edit" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Ubah</a>'
              .'<a style="margin-left:5px" href="/pengguna/'.$user->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
          })
          ->addColumn('roles', function($user) {
            return DB::table('roles')->select('namaRule')->where('id', '=', $user->roles_id)->get()->first()->namaRule;
          })
          ->make(true);
  }

  public function posregisnya()
  {
    $rolesnya = DB::table('roles')->select('id')->where('namaRule', '=', 'Asisten')->get()->first()->id;
    $user = new User();
    $user->email = Input::get('email');
    $user->name = Input::get('nama');
    $user->password = bcrypt(Input::get('password'));
    $user->roles_id = $rolesnya;

    $user->save();
    return redirect('loginadmin');
  }

//ini buat view dimana kita bakalan nge set value ke form
  public function edit($id)
  {
    $user = user::find($id);
    if(!$user)
    abort(404);

    return view('dashboard.pengguna.edit-pengguna', ['user'=>$user]);
  }

//ini buat setelah di klik post/put buat update data nya
  public function update(Request $request, $id)
  {
    $user = user::find($id);
    $user->name = $request->nama;
    $user->email = $request->email;
    $user->roles_id = $request->roles;
    $user->save();
    return redirect('pengguna');
  }

//konsep sama....
  public function delete($id)
  {
    $user = user::find($id);
    if(!$user)
    abort(404);

    return view('dashboard.pengguna.delete-pengguna', ['user'=>$user]);
  }

  public function destroy($id)
  {
    $user = user::find($id);
    $user->delete();
    return redirect('pengguna');
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
    $berita->judul = ucwords(Input::get('judul'));
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
          if (empty(Input::get('namafile'))) {
            return Redirect::back()->withErrors(['Nama Materi Tidak Boleh Kosong']);
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
            $materi->nama_materi = Input::get('namafile');
            $materi->lokasi_materi = $lokasi;
            $materi->author = Input::get('author');
            $materi->save();
            return redirect('atur-materi')->with('status', 'File Berhasil Di Upload!');
          }
          else {
            return Redirect::back()->withErrors(['file tidak sesuai, tidak bisa diupload']);
          }
        } else {
          $materi = materi::find($id);
          $materi->nama_materi = Input::get('namafile');
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

      public function getMateriBaru()
      {
        return view('dashboard.materi.materibaru');
      }

      public function storeMateriBaru(Request $request)
      {
        if ($request->hasFile('tes')) {
          $namafile = $request->file('tes')->getClientOriginalName();
          $ext = $request->file('tes')->getClientOriginalExtension();
          if (empty(Input::get('namafile'))) {
            return Redirect::back()->withErrors(['Nama Materi Tidak Boleh Kosong']);
          }
          if ($ext == "pdf" || $ext == "png" || $ext == "jpg" || $ext == "docx" || $ext == "doc") {
            $location = Storage::putFileAs('public/materi',$request->file('tes'),$namafile);
            $lokasi = str_replace("public","storage",$location);
            $materi = new materi();
            $materi->nama_materi = Input::get('namafile');
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
        $kelulusan->npm = Input::get('npm');;
        $kelulusan->nama = Input::get('nama');
        $kelulusan->kelas = Input::get('kelas');
        $kelulusan->jurusan = Input::get('jurusan');
        $kelulusan->periode = Input::get('periode');
        $kelulusan->materi = Input::get('materi');
        $kelulusan->status = Input::get('status');
        $kelulusan->ambilser = Input::get('ambilser');

        $kelulusan->save();
        return redirect('atur-kelulusan');
    }

    public function EditKelulusan($id) {
      $kelulusan = kelulusan::find($id);
      return view('dashboard.kelulusan.kelulusan-edit',['kelulusan'=>$kelulusan]);
    }

    public function destroyKelulusan($id)
    {
      $kelulusan = kelulusan::find($id);
      $kelulusan->delete();
      return redirect('atur-kelulusan');
    }
}
