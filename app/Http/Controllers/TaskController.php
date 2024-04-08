<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Magang;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $magang = Magang::all();
        $task = Task::all();
        return view('task.index', compact('magang', 'task'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function submit(Request $request)
    {
        $id_tugas = $request->input('id_tugas');
        $tugas = $request->input('tugas');
        $jumlah_tugas = $request->input('jumlah_tugas');
        $status = $request->input('status');
        $data = [
            'id_tugas' => $id_tugas,
            'tugas' => $tugas,
            'jumlah_tugas' => $jumlah_tugas,
            'status' => $status,
        ];
        $simpan = DB::table('tasks')->insert($data);

        if ($simpan) {
            return redirect('/')->with(['success' => 'Data berhasil disimpan']);
        }else {
            return redirect('task.index')->with(['error' => 'Data gagal disimpan']);
        }
    }
}
