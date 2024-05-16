<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Session;

class Laporan_magang extends Model
{
    use HasFactory;
    protected $table = 'laporan_magangs';
    protected $primaryKey = 'laporan_id';
    protected $fillable = ['magang_judul', 'file_magang'];

    public $incrementing = true;


    public static function laporan_mhs()
    {

        $query = DB::table('laporan_magangs')
            ->join('magangs', 'magangs.magang_id', '=', 'laporan_magangs.magang_id')
            ->select('magangs.magang_id', 'laporan_magangs.*');

        // Jika parameter magang_id diberikan, tambahkan klausa 'where'

        $laporan = $query->get()->map(function ($item) {
            $item->jenis = 'Laporan'; // Tambahkan kolom jenis
            return $item;
        });

        return $laporan; // Ambil data
    }

    public static function proposal_mhs()
    {
        $coba = DB::table('proposal_magangs')
            ->join('magangs', 'magangs.magang_id', '=', 'proposal_magangs.magang_id')
            ->select('magangs.magang_id', 'proposal_magangs.*');

        // Jika parameter magang_id diberikan, tambahkan klausa 'where'

        $proposal = $coba->get()->map(function ($item) {
            $item->jenis = 'Proposal'; // Tambahkan kolom jenis
            return $item;
        });

        return $proposal;
    }
    public static function gabungkan_laporan_dan_proposal()
    {
        $laporan = self::laporan_mhs();
        $proposal = self::proposal_mhs();

        // Menggabungkan koleksi menggunakan metode merge
        $hasil_akhir = $laporan->merge($proposal);

        return $hasil_akhir; // Mengembalikan hasil gabungan
    }
    public static function TambahDokumen()
    {
        // Mendapatkan email pengguna yang sedang terautentikasi
        $email = Auth::user()->email;

        // Mendapatkan magang_id dari tabel magangs berdasarkan email pengguna
        $magang_id = DB::table('magangs')
            ->join('mahasiswas', 'magangs.mhs_nim', '=', 'mahasiswas.mhs_nim')
            ->join('users', 'mahasiswas.email', '=', 'users.email')
            ->where('users.email', $email)
            ->value('magangs.magang_id');

        // Simpan magang_id ke dalam session
        session(['magang_id' => $magang_id]);

        // Mengambil data logbook_magangs berdasarkan magang_id dari session
        $TambahDokumen = DB::table('laporan_magangs')
            ->join('magangs', 'magangs.magang_id', '=', 'laporan_magangs.magang_id')
            ->select('magangs.magang_id', 'laporan_magangs.*')
            ->where('magangs.magang_id', $magang_id)
            ->get();

        return $TambahDokumen;
    }
}
