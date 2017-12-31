<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\file;
use DB;
use Storage;
use Datatables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rule:Admin');
    }

    public function getUploadFile()
    {
      return view('dashboard.file.UploadFile');
    }

    public function UploadFile(Request $request)
    {

    }
}
