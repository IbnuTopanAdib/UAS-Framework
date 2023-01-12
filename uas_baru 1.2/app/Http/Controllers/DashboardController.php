<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use App\Models\Mahasiswa;
use App\Models\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Facades\Charts;

class DashboardController extends Controller
{
    public function index()
    {
        $null_data = DB::table('mahasiswas')
            ->whereNull('id_pembimbing')
            ->count();

        $not_null_data = DB::table('mahasiswas')
            ->whereNotNull('id_pembimbing')
            ->count();

        $latest_magang = Magang::latest()->get();
        $jumlah_pembimbing = Pembimbing::count();
        $jumlah_mahasiswa = Mahasiswa::count();

        return view('dashboard.index', compact('null_data', 'not_null_data', 'jumlah_mahasiswa', 'latest_magang', 'jumlah_pembimbing'));
    }
}
