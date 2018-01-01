<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Excel;
use App\jadwal;
use Illuminate\Support\Facades\Redirect;

class JadwalController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');
      }

      public function getAturJadwal()
      {
        $jadwal = DB::table('jadwal')->get();
        return view('dashboard.jadwal.jadwal', ['jadwal'=>$jadwal]);
      }

      public function getJadwalBaru()
      {
        return view('dashboard.jadwal.jadwalbaru');
      }

      public function dataJadwalDT()
      {
        $kelas = DB::table('jadwal')->select('kelas')->distinct('get')->get();
          return \DataTables::of($kelas)
              ->addColumn('action', function ($jadwal) {
                  return
                  '<a class="btn btn-info" href="/jadwal/'.$jadwal->kelas.'">Lihat </a>'
                  .'<a style="margin-left:5px" class="btn btn-danger" href="/jadwal/'.$jadwal->kelas.'/delete">Delete </a>' ;
              })
              ->make(true);
      }

      public function import(Request $request)
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
            jadwal::insert($dataImported);
            return back()->with('status', 'Berhasil dimasukan Ke Database');
        }catch(\Exception $e){
            return Redirect::back()->withErrors(['terdapat kesalahan format file, pastikan format file sudah benar!']);
        }
      }
      return Redirect::back()->withErrors(['terdapat kesalahan, pastikan format file sudah benar!']);
    }

    public function deleteJadwal($kelas) {
      $kelasygdidelete = DB::table('jadwal')->where('kelas','=',$kelas);
      $kelasygdidelete->delete();
      return redirect('atur-jadwal')->with('status', 'Berhasil didelete');
    }
}
