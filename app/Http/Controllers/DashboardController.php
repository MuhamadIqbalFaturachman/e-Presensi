<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $task = Task::all();
        $hariini = date("Y-m-d");
        $bulanini = date("m")*1;
        $tahunini = date("Y");
        $nim = Auth::guard('magang')->user()->nim;
        $presensihariini = DB::table('presensi')->where('nim',$nim)->where('tgl_presensi',$hariini)->first();
        
        $historibulanini = DB::table('presensi')
        ->where('nim',$nim)
        ->whereRaw('MONTH(tgl_presensi)="' . $bulanini . '"')
        ->WhereRaw('YEAR(tgl_presensi)="' . $tahunini . '"')
        ->orderBy('tgl_presensi')
        ->get('*');

        $rekappresensi = DB::table('presensi')
        ->selectRaw('COUNT(nim) as jmlhadir, SUM(IF(jam_in > "08:00",1,0)) as jmltelat')
        ->where('nim',$nim)
        ->whereRaw('MONTH(tgl_presensi)="' . $bulanini . '"')
        ->WhereRaw('YEAR(tgl_presensi)="' . $tahunini . '"')
        ->first();

        $leaderboard = DB::table('presensi')
        ->join('magang','presensi.nim' ,'magang.nim')
        ->where('tgl_presensi',$hariini)
        ->orderBy('jam_in')
        ->get('*');

        $rekapizin = DB::table('pengajuan_izin')
        ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin,SUM(IF(status="s",1,0)) as jmlsakit')
        ->where('nim',$nim)
        ->whereRaw('MONTH(tgl_izin)="' . $bulanini . '"')
        ->WhereRaw('YEAR(tgl_izin)="' . $tahunini . '"')
        ->where('status_aproval', 1)
        ->first();

        $namabulan = ["","January","FebruarY","March","April","May","June","July","August","September","October","November","December"];
        return view('dashboard.dashboard',compact('presensihariini','historibulanini','namabulan','bulanini','tahunini','rekappresensi','leaderboard','task'));
    }

    public function dashboardadmin()
    {
        $hariini = date('Y-m-d');
        $rekappresensi = DB::table('presensi')
        ->selectRaw('COUNT(nim) as jmlhadir, SUM(IF(jam_in > "08:00",1,0)) as jmltelat')
        ->where('tgl_presensi',$hariini)
        ->first();

        $rekapizin = DB::table('pengajuan_izin')
        ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin,SUM(IF(status="s",1,0)) as jmlsakit')
        ->where('tgl_izin',$hariini)
        ->where('status_aproval', 1)
        ->first();
        return view('dashboard.dashboardadmin', compact('rekappresensi','rekapizin'));
    }
    

}
