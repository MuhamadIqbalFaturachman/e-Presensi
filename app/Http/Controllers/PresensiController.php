<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PresensiController extends Controller
{
    public function create()
    {
        return view('presensi.create');
    }

    public function store(Request $request)
    {
        $nim = Auth::guard('magang')->user()->nim;
        $tgl_presensi = date("Y-m-d");
        $jam = date("H:i:s");
        $image = $request->image;
        $lokasi = $request->lokasi;
        $folderPath = "public/uploads/absensi";
        $formatName = $nim . "-" . $tgl_presensi;
        $image_parts = explode(";base64",$image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath.$fileName;
        Storage::put($file, $image_base64);
        echo "0";
    }
}
