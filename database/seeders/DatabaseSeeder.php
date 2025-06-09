<?php

namespace Database\Seeders;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// namespace App\Models;

use App\Models\agendasertifikasi;
use App\Models\agendastatus;
use App\Models\Agendastatus as ModelsAgendastatus;
use App\Models\asosiasipengusaha;
use App\Models\bantuanteknis;
use App\Models\kelurahandesa;
use App\Models\rencanagsbblora;
use App\Models\statusadmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\bgkartuinventarisbangunan;
use App\Models\statushaktanahbangunangedung;
use App\Models\kecamatanblora;
use App\Models\datastrukturbangunangedung;
use App\Models\datainstitusibangunangedung;
use App\Models\statusbangunangedung;
use App\Models\fungsibangunan;
use App\Models\klasifikasibangunangedung;
use App\Models\profiltanahbangunangedung;
use App\Models\kedinasan;
use App\Models\kodelokasibangunangedung;
use App\Models\databangunangedung;
use App\Models\jenispengajuanbantek;
use App\Models\kepemilikanbangunangedung;
use App\Models\krkusaha;
// use App\Models\paketpekerjaan;
use Database\Factories\SkktenagakerjaFactory;
// use Carbon\Carbon;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Asosiasipengusaha::factory(15)->create();
        // Paketpekerjaan::factory(15)->create();
        // Penanggungjawabteknis::factory(15)->create();
        // Ketertiban::factory(15)->create();
        // Beritaagenda::factory(15)->create();
        // User::factory(15)->create();
        // // \App\Models\sertifikasiagenda::factory(15)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'id'  => 1,
            'name'  => 'Sigit Septiadi',
            'username' => 'Sigit',
            'statusadmin_id' => '1',
            'avatar' => 'assets/abgblora/logo/iconabgblora.png',
            'email' => 'sigitseptiadi1@gmail.com',
            'password' => bcrypt('adminadmin123$$')
        ]);


        User::create([
            'id'  => 2,
            'name'  => 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG KABUPATEN BLORA',
            'username' => 'dpuprblora',
            'statusadmin_id' => '6',
            'avatar' => '/assets/icon/logokabupatenblora.png',
            'email' => 'dpuprkabblora@gmail.com',
            'password' => bcrypt('admindpuprblora')
        ]);

        User::create([
            'id'  => 3,
            'name'  => 'DINAS KESEHATAN',
            'username' => 'dinaskesehatan',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinaskesehatankabblora@gmail.com',
            'password' => bcrypt('admindinaskesehatanblora')
        ]);

        User::create([
            'id'  => 4,
            'name'  => 'DINAS LINGKUNGAN HIDUP',
            'username' => 'dinaslingkunganhidup',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinaslhkabblora@gmail.com',
            'password' => bcrypt('adminlhkabblora')
        ]);

        User::create([
            'id'  => 5,
            'name'  => 'DINAS PANGAN, PERTANIAN, PETERNAKAN, DAN PERIKANAN',
            'username' => 'dinaspangan',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinaspangankabblora@gmail.com',
            'password' => bcrypt('adminpangankabblora')
        ]);

        User::create([
            'id'  => 6,
            'name'  => 'DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA',
            'username' => 'dinaspengendalian',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinaspengendaliankabblora@gmail.com',
            'password' => bcrypt('admindinaspengendaliankabblora')
        ]);

        User::create([
            'id'  => 7,
            'name'  => 'DINAS PERDAGANGAN, KOPERASI USAHA KECIL DAN MENENGAH',
            'username' => 'dinasperdagangan',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinasperdagangankabblora@gmail.com',
            'password' => bcrypt('admindinasperdagangankabblora')
        ]);

        User::create([
            'id'  => 8,
            'name'  => 'DINAS PERUMAHAN PEMUKIMAN DAN PERHUBUNGAN',
            'username' => 'dinasperumahan',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinasperumahankabblora@gmail.com',
            'password' => bcrypt('admindinasperumahankabblora')
        ]);

        User::create([
            'id'  => 9,
            'name'  => 'DINAS SOSIAL PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK',
            'username' => 'dinassosial',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinassosialkabblora@gmail.com',
            'password' => bcrypt('admindinassosialkabblora')
        ]);

        User::create([
            'id'  => 10,
            'name'  => 'SEKRETARIAT DAERAH',
            'username' => 'sekdablora',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'sekdakabblora@gmail.com',
            'password' => bcrypt('adminsekdakabblora')
        ]);

        User::create([
            'id'  => 11,
            'name'  => 'DINAS PENDIDIKAN',
            'username' => 'dinaspendidikan',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinaspendidikankabblora@gmail.com',
            'password' => bcrypt('admindinaspendidikan')
        ]);

        User::create([
            'id'  => 12,
            'name'  => 'DINAS PERINDUSTRIAN DAN TENAGA KERJA',
            'username' => 'dinasperindustrian',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinasperindustriankabblora@gmail.com',
            'password' => bcrypt('admindinasperindustrian')
        ]);


        User::create([
            'id'  => 13,
            'name'  => 'SEKRETARIAT DEWAN',
            'username' => 'sekdewan',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'sekdewankabblora@gmail.com',
            'password' => bcrypt('adminsekdewan')
        ]);

        User::create([
            'id'  => 14,
            'name'  => 'DINAS KOMUNIKASI DAN INFORMATIKA',
            'username' => 'sekdewan',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinaskomunikasikabblora@gmail.com',
            'password' => bcrypt('admindinkominfoblora')
        ]);

        User::create([
            'id'  => 15,
            'name'  => 'DINAS KEPEMUDAAN, OLAH RAGA, KEBUDAYAAN DAN PARIWISATA',
            'username' => 'dinaspemuda',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinaspemudakabblora@gmail.com',
            'password' => bcrypt('adminsekdewan')
        ]);

        User::create([
            'id'  => 16,
            'name'  => 'BADAN KEPEGAWAIAN DAERAH',
            'username' => 'dinasbkd',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'dinasbkdkabblora@gmail.com',
            'password' => bcrypt('adminbkdblora')
        ]);

        User::create([
            'id'  => 17,
            'name'  => 'BADAN PERENCANAAN PEMBANGUNAN DAERAH',
            'username' => 'bppd',
            'statusadmin_id' => '6',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'bppdkabblora@gmail.com',
            'password' => bcrypt('adminbppdkabblora')
        ]);

        User::create([
            'id'  => 18,
            'name'  => 'Pemohon Sigit Septiadi',
            'username' => 'sigit',
            'statusadmin_id' => '3',
            'avatar' => 'user/avatar/foto4.png',
            'email' => 'sigitseptiadi00@gmail.com',
            'password' => bcrypt('adminadmin')
        ]);

        User::create([
            'id'  => 20, // pemohon
            'name'  => 'Sigit Septiadi Pemohon',
            'username' => 'Sigit',
            'statusadmin_id' => '3',
            'avatar' => 'assets/abgblora/logo/iconabgblora.png',
            'email' => 'sigitpemohonabgpemohon@gmail.com',
            'password' => bcrypt('adminadmin123$$')
        ]);

        User::create([
            'id'  => 21, // pemohon
            'name'  => 'Sigit Septiadi Pemohon Bantek',
            'username' => 'Sigit',
            'statusadmin_id' => '7',
            'avatar' => 'assets/abgblora/logo/iconabgblora.png',
            'email' => 'sigitpemohonabg@gmail.com',
            'password' => bcrypt('adminadmin123$$')
        ]);

        User::create([
            'id'  => 22, // pemohon
            'name'  => 'Sigit Septiadi Konsultan Bantek',
            'username' => 'Sigit',
            'statusadmin_id' => '4',
            'avatar' => 'assets/abgblora/logo/iconabgblora.png',
            'email' => 'sigitpemohonabgkonsultan@gmail.com',
            'password' => bcrypt('adminadmin123$$')
        ]);

            User::create([
            'id'  => 23, // pemohon
            'name'  => 'Sigit Septiadi Pemohon Bantek 2',
            'username' => 'Sigit',
            'statusadmin_id' => '7',
            'avatar' => 'assets/abgblora/logo/iconabgblora.png',
            'email' => 'sigitpemohonabg2@gmail.com',
            'password' => bcrypt('adminadmin123$$')
        ]);


        User::create([
            'id'  => 24, // pemohon
            'name'  => 'Sigit Septiadi Konsultan Bantek',
            'username' => 'Sigit',
            'statusadmin_id' => '4',
            'avatar' => 'assets/abgblora/logo/iconabgblora.png',
            'email' => 'sigitpemohonabgkonsultan2@gmail.com',
            'password' => bcrypt('adminadmin123$$')
        ]);


        jenispengajuanbantek::create([
            'id'  => 1,
            'jenispengajuan'  => 'BANTUAN ASISTENSI PERENCANAAN',
        ]);

        jenispengajuanbantek::create([
            'id'  => 2,
            'jenispengajuan'  => 'PENELITI KONTRAK',
        ]);

        jenispengajuanbantek::create([
            'id'  => 3,
            'jenispengajuan'  => 'PERHITUNGAN PENYUSUTAN',
        ]);

        jenispengajuanbantek::create([
            'id'  => 4,
            'jenispengajuan'  => 'PERHITUNGAN TINGKAT KERUSAKAN',
        ]);

        jenispengajuanbantek::create([
            'id'  => 5,
            'jenispengajuan'  => 'PERHITUNGAN BIAYA PEMELIHARAAN BGN',
        ]);

        jenispengajuanbantek::create([
            'id'  => 6,
            'jenispengajuan'  => 'PERHITUNGAN BIAYA KONSTRUKSI PEMBANGUNAN BGN',
        ]);

        jenispengajuanbantek::create([
            'id'  => 7,
            'jenispengajuan'  => 'PENGELOLA TEKNIS',
        ]);

        jenispengajuanbantek::create([
            'id'  => 8,
            'jenispengajuan'  => 'PENDAMPINGAN SERAH TERIMA PEKERJAAN',
        ]);

        jenispengajuanbantek::create([
            'id'  => 9,
            'jenispengajuan'  => 'PERMINTAAN PERSONIL TIM TEKNIS',
        ]);


        // MENU KEDINASAN

        statusadmin::create([
            'id'  => 1,
            'status' => 'super_admin',
        ]);

        statusadmin::create([
            'id'  => 2,
            'status' => 'admin',
        ]);

        statusadmin::create([
            'id'  => 3,
            'status' => 'pemohon',
        ]);

        statusadmin::create([
            'id'  => 4,
            'status' => 'konsultanbantek',
        ]);

        statusadmin::create([
            'id'  => 5,
            'status' => 'konsultanbangunan',
        ]);

        statusadmin::create([
            'id'  => 6,
            'status' => 'dinas',
        ]);

        statusadmin::create([
            'id'  => 7,
            'status' => 'pemohonbantek',
        ]);


        // AKUN USERS ---------


// ---------------------------

        kedinasan::create([
            'id'  => 1,
            'kedinasan' => 'Dinas Pendidikan',
        ]);

        kodelokasibangunangedung::create([
            'id'  => 1,
            'kedinasan_id' => 1, // satuan kedinasan
            'kodelokasi' => '010101',
            'bidang' => null,
            'subbidang' => null,
        ]);

        // MENU DATA KE 3 PENDATAAN BANGUNAN GEDUNG
        bgkartuinventarisbangunan::create([
            'id' => 1,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.1969-1.3.3.01.01.10.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'JL. LEDOK KM. 1,5 RT. 09 RW. 01 DS. SAMBONG',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => null,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 281320000.00,
            'keterangan' => '12450.1289.C / GEDUNG 2',
            'nomorlanjutan' => '010101.00000.00000',
        ]);
        bgkartuinventarisbangunan::create([
            'id' => 2,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.1969-1.3.3.01.01.10.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'JL. LEDOK KM. 1,5 RT. 09 RW. 01 DS. SAMBONG',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => null,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 255210000.00,
            'keterangan' => '12451.1289.C / GEDUNG 1',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 3,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT IBADAH.BANGUNAN GEDUNG TEMPAT IBADAH PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2005-1.3.3.01.01.08.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 60,
            'lokasi' => 'JL. LEDOK KM. 1,5 RT. 09 RW. 01 DS. SAMBONG',
            'tanggal' => null,
            'nomor' => 2005,
            'luasbangunan' => null,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 85000000.00,
            'keterangan' => '12449.1289.C / MUSOLLA',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 4,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Dk. Dawe Rt. 02/Rw. 02 Ds. Sendang Todanan',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => null,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 87350000.00,
            'keterangan' => '12436.1289.C / GEDUNG 1',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 5,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 8,
            'lokasi' => 'Dk. Dawe Rt. 02/Rw. 02 Ds. Sendang Todanan',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => null,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 5000000.00,
            'keterangan' => '12440.1289.C / Kamar Mandi/Toilet/WC',
            'nomorlanjutan' => '010101.00000.00000',
        ]);
        bgkartuinventarisbangunan::create([
            'id' => 6,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000003',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 6,
            'lokasi' => 'Jl. A.Yani No 42 Blora',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 6,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 45271300.00, // koma diganti titik dan jadi float
            'keterangan' => '5315259.477.C / Bangunan Pos Jaga selatan',
            'nomorlanjutan' => '010101.00000.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 7,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000004',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 5,
            'lokasi' => 'Jln.A.Yani No.42 Blora',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 5,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 38800000.00,
            'keterangan' => '5315260.477.C / Bangunan Pos Jaga utara',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 8,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2006-1.3.3.01.01.01.005',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 12,
            'lokasi' => 'JL LEDOK KM. 1,5 RT. 09 RW. 01 KEC. SAMBONG',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 48,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 5300000.00,
            'keterangan' => '12454.1289.C / KAMAR MANDI DAN WC',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 9,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2006-1.3.3.01.01.10.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Dk. Dawe Rt. 02/Rw. 02 Ds. Sendang Todanan',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 144,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 77250000.00,
            'keterangan' => '12437.1289.C / GEDUNG 2',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 10,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2006-1.3.3.01.01.10.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 63,
            'lokasi' => 'Dk. Dawe Rt. 02/Rw. 02 Ds. Sendang Todanan',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 63,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 107107000.00,
            'keterangan' => '12441.1289.C / GEDUNG 3',
            'nomorlanjutan' => '010101.00000.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 11,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN FASILITAS UMUM.BANGUNAN TEMPAT PARKIR',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2006-1.3.3.01.01.32.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 15,
            'lokasi' => 'Dk. Dawe Rt. 02/Rw. 02 Ds. Sendang Todanan',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 15,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 3400000.00,
            'keterangan' => '12438.1289.C / Parkir',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 12,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2006-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Dk. Dawe Rt. 02/Rw.02 Ds. Sendang Todanan',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 50,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 171438000.00,
            'keterangan' => '12439.1289.C / Pagar',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 13,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2006-1.3.3.04.01.04.004',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'JL LEDOK KM. 1,5 RT. 09 RW. 01  KEC. SAMBONG',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 30,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 6400000.00,
            'keterangan' => '12453.1289.C / PAGAR HALAMAN & GAPURA',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 14,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2006-1.3.3.04.01.04.004',
            'registrasi' => '000006',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 60,
            'lokasi' => 'Jl.Bhayangkara Timur No.8 Blora',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 60,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 10000000.00,
            'keterangan' => '8973257.477.C / PAGAR',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 15,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2007-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 50,
            'lokasi' => 'JL. LEDOK KM. 1,5 RT. 09 RW. 01 KEC. SAMBONG',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 350,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 14200000.00,
            'keterangan' => '12452.1289.C / PERKERASAN',
            'nomorlanjutan' => '010101.00000.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 16,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2007-1.3.3.01.01.10.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 168,
            'lokasi' => 'Jl.bhayangkara timur no.8',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 168,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 150000000.00,
            'keterangan' => '8973258.477.C / ruang kelas 3, Kantor dan Kelas 2',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 17,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2007-1.3.3.01.01.10.001',
            'registrasi' => '000003',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 210,
            'lokasi' => 'Jl.bhayangkara Timur No.8 Blora, RT.5/RW.3, Dk.Nglawiyan, Ds./Kel. KARANGJATI',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 210,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 200000000.00,
            'keterangan' => '8973259.477.C / Ruang Kelas 1, kelas 4, kelas 6, kelas 5',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 18,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2009-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 8,
            'lokasi' => 'JL.BHAYANGKARA TIMUR NO.8 BLORA',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 8,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 8000000.00,
            'keterangan' => '8973256.477.C / WC',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 19,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2010-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jln.A.Yani no.42 BLORA',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 36,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 69144700.00,
            'keterangan' => '5315262.477.C / Bangunan Gedung Sekretariat Dikpora',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 20,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2010-1.3.3.01.01.01.001',
            'registrasi' => '000003',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 25,
            'lokasi' => 'Jl.bhayangkara Timur No.8 Blora, RT.5/RW.3, Dk.Nglawiyan, Ds./Kel. KARANGJATI',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 25,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 15000000.00,
            'keterangan' => '8973255.477.C / PERKERASAN',
            'nomorlanjutan' => '010101.00000.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 21,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG PERPUSTAKAAN.BANGUNAN GEDUNG PERPUSTAKAAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2011-1.3.3.01.01.16.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'JL. LEDOK KM 1,5 RT. 09 RW. 01 DS. SAMBONG',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 63,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 183026800.00,
            'keterangan' => '12448.1289.C / GEDUNG PERPUSTAKAAN',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 22,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2012-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 450,
            'lokasi' => 'Jln. A.Yani No.42 BLORA',
            'tanggal' => null,
            'nomor' => 'SPK No.007/SPK/02.42/APBD 2012/RG Kantor/2012',
            'luasbangunan' => 450,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 190606234.00,
            'keterangan' => '5315263.477.C / Perkerasan',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 23,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2013-1.3.3.01.01.01.001',
            'registrasi' => '000003',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 5,
            'lokasi' => 'Jl.bhayangkara Timur No.8 Blora, RT.5/RW.3, Dk.Nglawiyan, Ds./Kel. KARANGJATI',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 5,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 1147500.00,
            'keterangan' => '8973254.477.C / perkerasan',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 24,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2014-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 450,
            'lokasi' => 'Jl. A.Yani No 42 Blora',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 450,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 129889173.00,
            'keterangan' => '5315235.477.C / Perkerasan Kantor Dindikpora',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 25,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2015-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 475,
            'lokasi' => 'Jl. Ledok KM.1,5 RT.009 RW.001, RT.9/RW.1, Dk.Sambong, Ds./Kel. Sambong',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 475,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 51961843.00,
            'keterangan' => '12446.1289.C / Paving',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 26,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2015-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jl. Ledok KM.1,5 RT.009 RW.001, RT.9/RW.1, Dk.Sambong, Ds./Kel. Sambong',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 27,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 43026338.00,
            'keterangan' => '12447.1289.C / Pagar',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 27,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2015-1.3.3.04.01.04.004',
            'registrasi' => '000003',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 60,
            'lokasi' => 'Jl.bhayangkara Timur No.8 Blora, RT.5/RW.3, Dk.Nglawiyan, Ds./Kel. KARANGJATI',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 60,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 96293826.00,
            'keterangan' => '8973253.477.C / Pagar',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 28,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2017-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jln. A.Yani No.42 BLORA',
            'tanggal' => '2017-12-12',
            'nomor' => '-',
            'luasbangunan' => 6000,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 4744579194.00,
            'keterangan' => '8972037.477.C / GEDUNG A (Gedung Sekretariat+PTK)',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 29,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2017-1.3.3.01.01.01.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jln. A.Yani No.42 BLORA',
            'tanggal' => '2017-12-12',
            'nomor' => '-',
            'luasbangunan' => 6000,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 2076466600.00,
            'keterangan' => '8972038.477.C / GEDUNG C (Gedung Sarpras)',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 30,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2018-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Jl. A.Yani No 42 Blora',
            'tanggal' => '2018-12-30',
            'nomor' => null,
            'luasbangunan' => 6000,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 4327422498.00,
            'keterangan' => '8972575.477.C / Gedung B (Gedung Dikdas+Paud/Dikmas)',
            'nomorlanjutan' => '010101.00000.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 31,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT IBADAH.BANGUNAN GEDUNG TEMPAT IBADAH PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2018-1.3.3.01.01.08.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Jl. A.Yani No 42 Blora',
            'tanggal' => '2018-12-30',
            'nomor' => null,
            'luasbangunan' => 6000,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 658829059.00,
            'keterangan' => '8972574.477.C / Gedung E (Musholla Al Ustadz)',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 32,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2018-1.3.3.01.01.10.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Jl. A.Yani No 42 Blora',
            'tanggal' => '2018-12-30',
            'nomor' => null,
            'luasbangunan' => 6000,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 1606025766.00,
            'keterangan' => '8972573.477.C / Gedung D (Gedung Parkir dan Ruang Penunjang)',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 33,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2018-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Jl. A.Yani No 42 Blora',
            'tanggal' => '2018-12-30',
            'nomor' => null,
            'luasbangunan' => 6000,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 411868500.00,
            'keterangan' => '8972577.477.C / Pagar (2018)',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 34,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN PARKIR.BANGUNAN PARKIR TERBUKA PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2019-1.3.3.01.01.33.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jl. A.Yani No 42 Blora',
            'tanggal' => '2019-12-31',
            'nomor' => '-',
            'luasbangunan' => 6000,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 149180000.00,
            'keterangan' => '1060.477.C / Kanopi parkir kantor Dinas Pendidikan',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 35,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'TAMAN.TAMAN',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2019-1.3.3.01.01.36.003',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jl. A.Yani No 42 Blora',
            'tanggal' => '2019-12-31',
            'nomor' => '-',
            'luasbangunan' => 6000,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 101122880.00,
            'keterangan' => '1053.477.C / Taman',
            'nomorlanjutan' => '010101.00000.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 36,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'DINAS PENDIDIKAN',
            'namabangunan' => 'BANGUNAN MENARA TELEKOMUNIKASI.BANGUNAN MENARA TELEKOMUNIKASI',
            'kodebarang' => '12.01.33.16.010101.00000.00000.2020-1.3.3.03.01.03.006',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jl. A.Yani No 42 Blora',
            'tanggal' => '2020-12-16',
            'nomor' => null,
            'luasbangunan' => 6,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 42130000.00,
            'keterangan' => '271.477.C / Tower Pembelajaran Jarak Jauh 2020',
            'nomorlanjutan' => '010101.00000.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 37,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Banjarejo',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 71,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 2000000.00,
            'keterangan' => '3325943.577.C / Perkerasan',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 38,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 35,
            'lokasi' => 'Dukuh Pruntusan, RT.3/RW.1, Dk.PRUNTUSAN, Ds./Kel. Kebonrejo',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 35,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 4230000.00,
            'keterangan' => '8951105.577.C / Gedung Kantor',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 39,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR SEMI PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2006-1.3.3.01.01.01.002',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jl.Raya Banjarejo, Mojowetan',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 214,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 327025500.00,
            'keterangan' => '3325941.577.C / Bangunan Gedung Kantor Semi Permanen',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 40,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2006-1.3.3.01.01.10.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 24,
            'lokasi' => 'Dukuh Pruntusan, RT.3/RW.1, Dk.PRUNTUSAN, Ds./Kel. Kebonrejo',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 24,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 11900000.00,
            'keterangan' => '8951101.577.C / Rumah Dinas',
            'nomorlanjutan' => '010101.00003.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 41,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2006-1.3.3.01.01.10.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 28,
            'lokasi' => 'Dukuh Pruntusan, RT.3/RW.1, Dk.PRUNTUSAN, Ds./Kel. Kebonrejo',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 28,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 16800000.00,
            'keterangan' => '8951103.577.C / Kamar Mandi/WC',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 42,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2006-1.3.3.01.01.10.001',
            'registrasi' => '000003',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 168,
            'lokasi' => 'Dukuh Pruntusan, RT.3/RW.1, Dk.PRUNTUSAN, Ds./Kel. Kebonrejo',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 168,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 12520000.00,
            'keterangan' => '8951104.577.C / Ruang Kelas',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 43,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2006-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jl.Raya Banjarejo, Mojowetan',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 41,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 1000000.00,
            'keterangan' => '3325942.577.C / Pagar',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 44,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2006-1.3.3.04.01.04.004',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 803,
            'lokasi' => 'Dukuh Pruntusan, RT.3/RW.1, Dk.PRUNTUSAN, Ds./Kel. Kebonrejo',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 803,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 7400000.00,
            'keterangan' => '8951102.577.C / Pagar',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 45,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2010-1.3.3.01.01.10.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'ds.kebonrejo',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 64,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'MUTASI',
            'harga' => 262933000.00,
            'keterangan' => '8951098.577.C / ruang kelas',
            'nomorlanjutan' => '010101.00003.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 46,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2012-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 91,
            'lokasi' => 'Dukuh Pruntusan, RT.3/RW.1, Dk.PRUNTUSAN, Ds./Kel. Kebonrejo',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 91,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 2800000.00,
            'keterangan' => '8951106.577.C / Paping',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 47,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2012-1.3.3.01.01.10.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Dukuh Pruntusan, RT.3/RW.1, Dk.PRUNTUSAN, Ds./Kel. Kebonrejo',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 56,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'MUTASI',
            'harga' => 245978000.00,
            'keterangan' => '8951100.577.C / gedung sekolah',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 48,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG PERPUSTAKAAN.BANGUNAN GEDUNG PERPUSTAKAAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2012-1.3.3.01.01.16.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'ds.kebonrejo',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 56,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'MUTASI',
            'harga' => 219851000.00,
            'keterangan' => '8951099.577.C / gedung perpus',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 49,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2013-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 64,
            'lokasi' => 'Dukuh Pruntusan, RT.3/RW.1, Dk.PRUNTUSAN, Ds./Kel. Kebonrejo',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 64,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 937500.00,
            'keterangan' => '8951107.577.C / Gedung II',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 50,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2013-1.3.3.01.01.01.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 56,
            'lokasi' => 'Dukuh Pruntusan, RT.3/RW.1, Dk.PRUNTUSAN, Ds./Kel. Kebonrejo',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 56,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 937500.00,
            'keterangan' => '8951109.577.C / GEDUNG I',
            'nomorlanjutan' => '010101.00003.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 51,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BANJAREJO',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00003.00000.2013-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 803,
            'lokasi' => 'Kebonrejo',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 803,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 1998000.00,
            'keterangan' => '8951108.577.C / Pagar',
            'nomorlanjutan' => '010101.00003.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 52,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BLORA',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00001.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Jl. Maluku no. 39',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 1027,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 73800000.00,
            'keterangan' => '3934659.486.C / kantor UPTD TK/SD Kec.Blora',
            'nomorlanjutan' => '010101.00001.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 53,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BLORA',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00001.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'jl. Maluku no. 39',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 1027,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 53900000.00,
            'keterangan' => '3934660.486.C / aula',
            'nomorlanjutan' => '010101.00001.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 54,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BLORA',
            'namabangunan' => 'BANGUNAN FASILITAS UMUM.BANGUNAN TEMPAT PARKIR',
            'kodebarang' => '12.01.33.16.010101.00001.00000.2006-1.3.3.01.01.32.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Jl. maluku no. 39',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 1027,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 24600000.00,
            'keterangan' => '3934661.486.C / tempat parkir',
            'nomorlanjutan' => '010101.00001.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 55,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BLORA',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT IBADAH.BANGUNAN GEDUNG TEMPAT IBADAH PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00001.00000.2010-1.3.3.01.01.08.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Jl. maluku no.39',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 1027,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 80000000.00,
            'keterangan' => '3934662.486.C / mushola',
            'nomorlanjutan' => '010101.00001.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 56,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BOGOREJO',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00005.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Bogorejo',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 79,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 494586700.00,
            'keterangan' => '3448774.664.C / BANGUNAN GEDUNG KANTOR',
            'nomorlanjutan' => '010101.00005.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 57,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BOGOREJO',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00005.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 170,
            'lokasi' => 'Bogorejo',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 175,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 353752000.00,
            'keterangan' => '3448775.664.C / BANGUNAN GEDUNG PERTEMUAN',
            'nomorlanjutan' => '010101.00005.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 58,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. BOGOREJO',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00005.00000.2018-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Bogorejo',
            'tanggal' => '2018-12-30',
            'nomor' => null,
            'luasbangunan' => 60,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 394028000.00,
            'keterangan' => '8951074.664.C / Pagar (2018)',
            'nomorlanjutan' => '010101.00005.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 59,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JAPAH',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00009.00000.2014-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Japah',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 120,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 600242200.00,
            'keterangan' => '4376326.816.C / Pembangunan Gedung Kantor',
            'nomorlanjutan' => '010101.00009.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 60,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JATI',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00016.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'Baik',
            'bertingkat' => 'Bertingkat',
            'beton' => 'Beton',
            'luaslantai' => 49,
            'lokasi' => 'Ds.Doplang, Kec. Jati, Kab. Blora',
            'tanggal' => '2006-12-30',
            'nomor' => '--',
            'luasbangunan' => 390,
            'statustanah' => 'Hak Pakai',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 444971500.00,
            'keterangan' => 'Gedung kantor UPTD TK/SD',
            'nomorlanjutan' => '010101.00016.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 61,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JATI',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00016.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000002',
            'kondisi' => 'Baik',
            'bertingkat' => 'Tidak Bertingkat',
            'beton' => 'Beton',
            'luaslantai' => 144,
            'lokasi' => 'Desa Doplang',
            'tanggal' => '2019-12-31',
            'nomor' => null,
            'luasbangunan' => 144,
            'statustanah' => 'Hak Milik',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 740243000.00,
            'keterangan' => 'Gedung Kantor',
            'nomorlanjutan' => '010101.00016.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 62,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JATI',
            'namabangunan' => 'BANGUNAN GUDANG.BANGUNAN GUDANG TERTUTUP PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00016.00000.2006-1.3.3.01.01.02.001',
            'registrasi' => '000001',
            'kondisi' => 'Baik',
            'bertingkat' => 'Tidak Bertingkat',
            'beton' => 'Beton',
            'luaslantai' => 49,
            'lokasi' => 'Ds.Doplang, Kec. Jati, Kab. Blora',
            'tanggal' => '2006-12-30',
            'nomor' => null,
            'luasbangunan' => 380,
            'statustanah' => 'Hak Pakai',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 15000000.00,
            'keterangan' => 'Gudang',
            'nomorlanjutan' => '010101.00016.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 63,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JATI',
            'namabangunan' => 'BANGUNAN GUDANG.BANGUNAN GUDANG TERTUTUP PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00016.00000.2006-1.3.3.01.01.02.001',
            'registrasi' => '000002',
            'kondisi' => 'Baik',
            'bertingkat' => 'Tidak Bertingkat',
            'beton' => 'Beton',
            'luaslantai' => 24,
            'lokasi' => 'Desa Doplang',
            'tanggal' => '2019-12-31',
            'nomor' => null,
            'luasbangunan' => 24,
            'statustanah' => 'Hak Milik',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 3610000.00,
            'keterangan' => 'Gudang',
            'nomorlanjutan' => '010101.00016.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 64,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JATI',
            'namabangunan' => 'BANGUNAN GUDANG.BANGUNAN GUDANG TERBUKA PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00016.00000.2006-1.3.3.01.01.02.004',
            'registrasi' => '000001',
            'kondisi' => 'Baik',
            'bertingkat' => 'Tidak Bertingkat',
            'beton' => 'Beton',
            'luaslantai' => 100,
            'lokasi' => 'Desa doplang',
            'tanggal' => '2019-12-31',
            'nomor' => null,
            'luasbangunan' => 100,
            'statustanah' => 'Hak Milik',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 389015800.00,
            'keterangan' => 'Gedung Pertemuan',
            'nomorlanjutan' => '010101.00016.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 65,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JATI',
            'namabangunan' => 'BANGUNAN GEDUNG PERTOKOAN/KOPERASI/PASAR.GEDUNG PERTOKOAN/KOPERASI/PASAR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00016.00000.2006-1.3.3.01.01.12.001',
            'registrasi' => '000001',
            'kondisi' => 'Baik',
            'bertingkat' => 'Tidak Bertingkat',
            'beton' => 'Beton',
            'luaslantai' => 49,
            'lokasi' => 'Ds. Doplang, Kec. Jati, Kab. Blora',
            'tanggal' => '2006-12-30',
            'nomor' => null,
            'luasbangunan' => 380,
            'statustanah' => 'Hak Pakai',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 3000000.00,
            'keterangan' => 'Gedung Koperasi PGRI',
            'nomorlanjutan' => '010101.00016.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 66,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JATI',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00016.00000.2012-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'Baik',
            'bertingkat' => 'Tidak Bertingkat',
            'beton' => 'Beton',
            'luaslantai' => 49,
            'lokasi' => 'Desa doplang',
            'tanggal' => '2019-12-31',
            'nomor' => '--',
            'luasbangunan' => 54,
            'statustanah' => 'Hak Milik',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 175810000.00,
            'keterangan' => 'Gedung Kantor /gedung e KTP',
            'nomorlanjutan' => '010101.00016.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 67,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JEPON',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00004.00000.1986-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jepon',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 49,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 7500000.00,
            'keterangan' => '2886142.618.C / Kamar Mandi/Toilet/WC',
            'nomorlanjutan' => '010101.00004.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 68,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JEPON',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00004.00000.1996-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 103,
            'lokasi' => 'Jln.Damaran Km.05 Jepon',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 103,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'HIBAH',
            'harga' => 11855000.00,
            'keterangan' => '2886143.618.C / pagar',
            'nomorlanjutan' => '010101.00004.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 69,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JEPON',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00004.00000.2003-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 63,
            'lokasi' => 'Jepon',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 63,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 9698000.00,
            'keterangan' => '2886144.618.C / perkerasan',
            'nomorlanjutan' => '010101.00004.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 70,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JEPON',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT IBADAH.BANGUNAN GEDUNG TEMPAT IBADAH PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00004.00000.2003-1.3.3.01.01.08.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jl.Damaran Km.05 Jepon',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 105,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'HIBAH',
            'harga' => 76100000.00,
            'keterangan' => '2886140.618.C / Mushola',
            'nomorlanjutan' => '010101.00004.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 71,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JEPON',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PERTEMUAN.BANGUNAN GEDUNG PERTEMUAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00004.00000.2003-1.3.3.01.01.09.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jln.Damaran Km.05 Jepon',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 203,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 117860600.00,
            'keterangan' => '2886141.618.C / Bangunan Gedung Pertemuan Permanen',
            'nomorlanjutan' => '010101.00004.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 72,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JEPON',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00004.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 12,
            'lokasi' => 'JL.JATIROGO, RT.4/RW.3, Dk.NULL, Ds./Kel. jepon',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 45,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 2200000.00,
            'keterangan' => '8951078.618.C / Km.WC',
            'nomorlanjutan' => '010101.00004.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 73,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JEPON',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00004.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 67,
            'lokasi' => 'JL.JATIROGO, RT.4/RW.3, Dk.NULL, Ds./Kel. jepon',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 49,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 37900000.00,
            'keterangan' => '8951080.618.C / BANGUNAN 1',
            'nomorlanjutan' => '010101.00004.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 74,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JEPON',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR SEMI PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00004.00000.2006-1.3.3.01.01.01.002',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 78,
            'lokasi' => 'JL.JATIROGO, RT.4/RW.3, Dk.NULL, Ds./Kel. jepon',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 36,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 6400000.00,
            'keterangan' => '8951079.618.C / BANGUNAN 2',
            'nomorlanjutan' => '010101.00004.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 75,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JEPON',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN.BANGUNAN GEDUNG PENDIDIKAN PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00004.00000.2006-1.3.3.01.01.10.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 94,
            'lokasi' => 'Jl. Jatirogo Km 1',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 234,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 44500000.00,
            'keterangan' => '8951076.618.C / BANGUNAN 3',
            'nomorlanjutan' => '010101.00004.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 76,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JEPON',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00004.00000.2006-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 22,
            'lokasi' => 'JL.JATIROGO, RT.4/RW.3, Dk.NULL, Ds./Kel. jepon',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 22,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 143024000.00,
            'keterangan' => '8951077.618.C / PAGAR',
            'nomorlanjutan' => '010101.00004.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 77,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JEPON',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00004.00000.2014-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 70,
            'lokasi' => 'Jepon',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 70,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 213093000.00,
            'keterangan' => '2886139.618.C / Pembangunan Gedung Kantor',
            'nomorlanjutan' => '010101.00004.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 78,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JIKEN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00013.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 6,
            'lokasi' => 'Jiken',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 15,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 1987000.00,
            'keterangan' => '3590245.942.C / Perkerasan',
            'nomorlanjutan' => '010101.00013.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 79,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JIKEN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00013.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 225,
            'lokasi' => 'Jiken',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 251,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 517345500.00,
            'keterangan' => '3590246.942.C / Bangunan Gedung kantor permanen',
            'nomorlanjutan' => '010101.00013.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 80,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JIKEN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00013.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000003',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 100,
            'lokasi' => 'Jiken',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 122,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 198790000.00,
            'keterangan' => '3590248.942.C / BANGUNAN AULA',
            'nomorlanjutan' => '010101.00013.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 81,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JIKEN',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT IBADAH.BANGUNAN GEDUNG TEMPAT IBADAH PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00013.00000.2006-1.3.3.01.01.08.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 30,
            'lokasi' => 'Jiken',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 40,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 77700000.00,
            'keterangan' => '3590247.942.C / Mushola',
            'nomorlanjutan' => '010101.00013.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 82,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JIKEN',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00013.00000.2006-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 28,
            'lokasi' => 'Jiken',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 28,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 21340000.00,
            'keterangan' => '3590244.942.C / PAGAR',
            'nomorlanjutan' => '010101.00013.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 83,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. JIKEN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR',
            'kodebarang' => '12.01.33.16.010101.00013.00000.2013-1.3.3.01.01.01.005',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 32,
            'lokasi' => 'Jiken',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 32,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 19500000.00,
            'keterangan' => '3590249.942.C / KANOPI',
            'nomorlanjutan' => '010101.00013.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 84,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KEDUNGTUBAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00011.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 105,
            'lokasi' => 'Jl. Cepu-Randublatung Km.12',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 88,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 47300000.00,
            'keterangan' => '4299765.878.C / Gedung Kantor',
            'nomorlanjutan' => '010101.00011.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 85,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KEDUNGTUBAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00011.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Kedungtuban',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 88,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 254038200.00,
            'keterangan' => '4299767.878.C / Gedung Kantor',
            'nomorlanjutan' => '010101.00011.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 86,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KEDUNGTUBAN',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00011.00000.2006-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 2,
            'lokasi' => 'Jl. Cepu-Randublatung Km. 12',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 2,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 2964000.00,
            'keterangan' => '4299766.878.C / Pagar',
            'nomorlanjutan' => '010101.00011.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 87,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KEDUNGTUBAN',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00011.00000.2006-1.3.3.04.01.04.004',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 2,
            'lokasi' => 'Kedungtuban',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 2,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 13000000.00,
            'keterangan' => '4299768.878.C / Pagar',
            'nomorlanjutan' => '010101.00011.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 88,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KRADENAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00015.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Jalan Randublatung No. 5 Mendenrejo',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 60,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 33400000.00,
            'keterangan' => '3043996.987.C / Gedung Kantor',
            'nomorlanjutan' => '010101.00015.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 89,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KRADENAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00015.00000.2013-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'Desa Mendenrejo, Kec. Kradenan',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 72,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 283957650.00,
            'keterangan' => '3043997.987.C / Gedung Kantor',
            'nomorlanjutan' => '010101.00015.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 90,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KRADENAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00015.00000.2014-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 82,
            'lokasi' => 'Kradenan',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 82,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'HIBAH',
            'harga' => 56500000.00,
            'keterangan' => '3043998.987.C / GEDUNG KANTOR',
            'nomorlanjutan' => '010101.00015.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 91,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KRADENAN',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00015.00000.2016-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Kradenan',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 60,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 89497000.00,
            'keterangan' => '6059699.987.C / Pagar Gapura',
            'nomorlanjutan' => '010101.00015.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 92,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KRADENAN',
            'namabangunan' => 'BANGUNAN FASILITAS UMUM.BANGUNAN TEMPAT PARKIR',
            'kodebarang' => '12.01.33.16.010101.00015.00000.2021-1.3.3.01.01.32.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 49,
            'lokasi' => 'Kantor Korwil Kradenan',
            'tanggal' => '2021-12-31',
            'nomor' => '-',
            'luasbangunan' => 60,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 9294330.00,
            'keterangan' => '8951076.987.C / Pembangunan Tempat Parkir',
            'nomorlanjutan' => '010101.00015.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 93,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KUNDURAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00007.00000.2013-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 80,
            'lokasi' => 'Jl. Raya Kunduran',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 80,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 199746000.00,
            'keterangan' => '3686934.726.C / Bangunan Gedung',
            'nomorlanjutan' => '010101.00007.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 94,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KUNDURAN',
            'namabangunan' => 'PAGAR.PAGAR',
            'kodebarang' => '12.01.33.16.010101.00007.00000.2013-1.3.3.04.01.04.004',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 85,
            'lokasi' => 'Jl. Raya Kunduran',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 85,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 50000000.00,
            'keterangan' => '3686935.726.C / Pagar',
            'nomorlanjutan' => '010101.00007.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 95,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KUNDURAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00007.00000.2014-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 120,
            'lokasi' => 'Kunduran',
            'tanggal' => null,
            'nomor' => null,
            'luasbangunan' => 120,
            'statustanah' => null,
            'nomorkodetanah' => null,
            'asalusul' => 'PEMBELIAN',
            'harga' => 312951000.00,
            'keterangan' => '3686932.726.C / Pembangunan Gedung Kantor',
            'nomorlanjutan' => '010101.00007.00000',
        ]);


        bgkartuinventarisbangunan::create([
            'id' => 96,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. KUNDURAN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00007.00000.2015-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 16,
            'lokasi' => 'Kunduran',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 16,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 12000000.00,
            'keterangan' => '3686936.726.C / KM/WC Baru',
            'nomorlanjutan' => '010101.00007.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 97,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. NGAWEN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00006.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'BETON',
            'luaslantai' => 49,
            'lokasi' => 'JL. RAYA NGAWEN - BLORA',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 1361,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 37600000.00,
            'keterangan' => '4562932.687.C / Bangunan Gedung Kantor',
            'nomorlanjutan' => '010101.00006.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 98,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. NGAWEN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00006.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000002',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 8,
            'lokasi' => 'JL. RAYA NGAWEN - BLORA',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 8,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 3500000.00,
            'keterangan' => '4562937.687.C / KAMAR MANDI/WC',
            'nomorlanjutan' => '010101.00006.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 99,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. NGAWEN',
            'namabangunan' => 'BANGUNAN GEDUNG KANTOR.BANGUNAN GEDUNG KANTOR PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00006.00000.2006-1.3.3.01.01.01.001',
            'registrasi' => '000003',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 1200,
            'lokasi' => 'JL. RAYA NGAWEN - BLORA',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 1245,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 7188000.00,
            'keterangan' => '4562939.687.C / PAVING BLOCK',
            'nomorlanjutan' => '010101.00006.00000',
        ]);

        bgkartuinventarisbangunan::create([
            'id' => 100,
            'kedinasan_id' => 1,
            'kodelokasibangunangedung_id' => 1,
            'namabangunandinas' => 'KANTOR CAB. DINDIK KEC. NGAWEN',
            'namabangunan' => 'BANGUNAN GEDUNG TEMPAT IBADAH.BANGUNAN GEDUNG TEMPAT IBADAH PERMANEN',
            'kodebarang' => '12.01.33.16.010101.00006.00000.2006-1.3.3.01.01.08.001',
            'registrasi' => '000001',
            'kondisi' => 'BAIK',
            'bertingkat' => 'TIDAK BERTINGKAT',
            'beton' => 'TIDAK',
            'luaslantai' => 36,
            'lokasi' => 'JL. RAYA NGAWEN - BLORA',
            'tanggal' => null,
            'nomor' => '--',
            'luasbangunan' => 38,
            'statustanah' => '--',
            'nomorkodetanah' => null,
            'asalusul' => 'INVENTARIS',
            'harga' => 20000000.00,
            'keterangan' => '4562935.687.C / MUSHOLA',
            'nomorlanjutan' => '010101.00006.00000',
        ]);

        fungsibangunan::create([
            'id'  => 1,
            'fungsibangunan'  => 'Fungsi Hunian',
        ]);

        fungsibangunan::create([
            'id'  => 2,
            'fungsibangunan'  => 'Fungsi Keagamaan',
        ]);

        fungsibangunan::create([
            'id'  => 3,
            'fungsibangunan'  => 'Fungsi Usaha',
        ]);

        fungsibangunan::create([
            'id'  => 4,
            'fungsibangunan'  => 'Fungsi Sosial Dan Budaya',
        ]);

        fungsibangunan::create([
            'id'  => 5,
            'fungsibangunan'  => 'Fungsi Khusus',
        ]);


        databangunangedung::create([
            'id' => 1,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 1,
            'profiltanahbangunangedung_id' => 1,
            'klasifikasibangunangedung_id' => 1,
            'datastrukturbangunangedung_id' => 1,
            'statusbangunangedung_id' => 1,
            'luastanah' => '2350',
            'namabangunan' => 'Gedung Kantor',
            'alamatbangunan' => 'Jl. Reksodiputro No. 24, Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '456',
            'luastotallantaidasargedung' => '912',
            'ketinggianbangunan' => '9',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.974108',
            'koordinatbangunan2' => '111.415106',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 2,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 2,
            'profiltanahbangunangedung_id' => 2,
            'klasifikasibangunangedung_id' => 2,
            'datastrukturbangunangedung_id' => 2,
            'statusbangunangedung_id' => 2,
            'luastanah' => '2350',
            'namabangunan' => 'Gedung Arsip dan Mushola',
            'alamatbangunan' => 'Jl. Reksodiputro No. 24, Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '166.92',
            'luastotallantaidasargedung' => '333.84',
            'ketinggianbangunan' => '7',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.974108',
            'koordinatbangunan2' => '111.415106',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 3,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 3,
            'profiltanahbangunangedung_id' => 3,
            'klasifikasibangunangedung_id' => 3,
            'datastrukturbangunangedung_id' => 3,
            'statusbangunangedung_id' => 3,
            'luastanah' => '2350',
            'namabangunan' => 'Aula',
            'alamatbangunan' => 'Jl. Reksodiputro No. 24, Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '165.75',
            'luastotallantaidasargedung' => '165.75',
            'ketinggianbangunan' => '3',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.974108',
            'koordinatbangunan2' => '111.415106',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 4,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 4,
            'profiltanahbangunangedung_id' => 4,
            'klasifikasibangunangedung_id' => 4,
            'datastrukturbangunangedung_id' => 4,
            'statusbangunangedung_id' => 4,
            'luastanah' => '2350',
            'namabangunan' => 'Pos Satpam',
            'alamatbangunan' => 'Jl. Reksodiputro No. 24, Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '5',
            'luastotallantaidasargedung' => '5',
            'ketinggianbangunan' => '3',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.974108',
            'koordinatbangunan2' => '111.415106',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 5,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 5,
            'profiltanahbangunangedung_id' => 5,
            'klasifikasibangunangedung_id' => 5,
            'datastrukturbangunangedung_id' => 5,
            'statusbangunangedung_id' => 5,
            'luastanah' => '128',
            'namabangunan' => 'Kantor Balai Penyuluhan Pertanian',
            'alamatbangunan' => 'Jl. Sonorejo No. 17, Ds. Kunden, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '85',
            'luastotallantaidasargedung' => '85',
            'ketinggianbangunan' => '4',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.93392',
            'koordinatbangunan2' => '111.375718',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 6,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 6,
            'profiltanahbangunangedung_id' => 6,
            'klasifikasibangunangedung_id' => 6,
            'datastrukturbangunangedung_id' => 6,
            'statusbangunangedung_id' => 6,
            'luastanah' => '105',
            'namabangunan' => 'Gedung BPP',
            'alamatbangunan' => 'Jl. Raya Cepu - Randubelatung km 1, Kec. Cepu. Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '82',
            'luastotallantaidasargedung' => '82',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-7.148333',
            'koordinatbangunan2' => '111.590967',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 7,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 7,
            'profiltanahbangunangedung_id' => 7,
            'klasifikasibangunangedung_id' => 7,
            'datastrukturbangunangedung_id' => 7,
            'statusbangunangedung_id' => 7,
            'luastanah' => '145',
            'namabangunan' => 'Gedung Kantor',
            'alamatbangunan' => 'Jl. Raya Cepu - Randubelatung km 1, Kec. Cepu. Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '104',
            'luastotallantaidasargedung' => '104',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-7.148333',
            'koordinatbangunan2' => '111.590967',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 8,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 8,
            'profiltanahbangunangedung_id' => 8,
            'klasifikasibangunangedung_id' => 8,
            'datastrukturbangunangedung_id' => 8,
            'statusbangunangedung_id' => 8,
            'luastanah' => '3721',
            'namabangunan' => 'Gedung Bappeda',
            'alamatbangunan' => 'Jl. GOR No. 10 Blora, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => null,
            'luastotallantaidasargedung' => '1058',
            'ketinggianbangunan' => '7.15',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.964248',
            'koordinatbangunan2' => '111.420512',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 9,
            'fungsibangunan_id' => 2,
            'kepemilikanbangunangedung_id' => 9,
            'profiltanahbangunangedung_id' => 9,
            'klasifikasibangunangedung_id' => 9,
            'datastrukturbangunangedung_id' => 9,
            'statusbangunangedung_id' => 9,
            'luastanah' => null,
            'namabangunan' => 'Mushola',
            'alamatbangunan' => 'Jl. Gatot Subroto No.111, Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '77',
            'luastotallantaidasargedung' => '77',
            'ketinggianbangunan' => '6',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.969047',
            'koordinatbangunan2' => '111.39998',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 10,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 10,
            'profiltanahbangunangedung_id' => 10,
            'klasifikasibangunangedung_id' => 10,
            'datastrukturbangunangedung_id' => 10,
            'statusbangunangedung_id' => 10,
            'luastanah' => null,
            'namabangunan' => 'kantor BPPKAD',
            'alamatbangunan' => 'Jl. Gatot Subroto No.111, Blora',
            'jumlahlantai' => '3',
            'luaslantaidasar' => '272',
            'luastotallantaidasargedung' => '816',
            'ketinggianbangunan' => '13',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.969047',
            'koordinatbangunan2' => '111.39998',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 11,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 11,
            'profiltanahbangunangedung_id' => 11,
            'klasifikasibangunangedung_id' => 11,
            'datastrukturbangunangedung_id' => 11,
            'statusbangunangedung_id' => 11,
            'luastanah' => null,
            'namabangunan' => 'Gudang Arsip',
            'alamatbangunan' => 'Kel. Karangjati',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '350',
            'luastotallantaidasargedung' => '700',
            'ketinggianbangunan' => '8',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.965308',
            'koordinatbangunan2' => '111.425963',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 12,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 12,
            'profiltanahbangunangedung_id' => 12,
            'klasifikasibangunangedung_id' => 12,
            'datastrukturbangunangedung_id' => 12,
            'statusbangunangedung_id' => 12,
            'luastanah' => null,
            'namabangunan' => 'Gedung BPKB Cepu',
            'alamatbangunan' => null,
            'jumlahlantai' => '1',
            'luaslantaidasar' => '92',
            'luastotallantaidasargedung' => null,
            'ketinggianbangunan' => '5',
            'luasbasement' => null,
            'koordinatbangunan' => '-7.152451',
            'koordinatbangunan2' => '111.582836',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 13,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 13,
            'profiltanahbangunangedung_id' => 13,
            'klasifikasibangunangedung_id' => 13,
            'datastrukturbangunangedung_id' => 13,
            'statusbangunangedung_id' => 13,
            'luastanah' => '650',
            'namabangunan' => 'Gedung Kantor',
            'alamatbangunan' => 'Jl. KH. Ahmad Dahlan no. 27 Blora',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '272',
            'luastotallantaidasargedung' => '414',
            'ketinggianbangunan' => '7',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.967607',
            'koordinatbangunan2' => '111.41129',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 14,
            'fungsibangunan_id' => 2,
            'kepemilikanbangunangedung_id' => 14,
            'profiltanahbangunangedung_id' => 14,
            'klasifikasibangunangedung_id' => 14,
            'datastrukturbangunangedung_id' => 14,
            'statusbangunangedung_id' => 14,
            'luastanah' => '4053',
            'namabangunan' => 'Mushola',
            'alamatbangunan' => 'Jl. Dr. Sutomo No.24, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '28.5',
            'luastotallantaidasargedung' => '28.5',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.966769',
            'koordinatbangunan2' => '111.419705',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 15,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 15,
            'profiltanahbangunangedung_id' => 15,
            'klasifikasibangunangedung_id' => 15,
            'datastrukturbangunangedung_id' => 15,
            'statusbangunangedung_id' => 15,
            'luastanah' => '4053',
            'namabangunan' => 'Kantor Dinas Kesehatan II',
            'alamatbangunan' => 'Jl. Dr. Sutomo No.24, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '147',
            'luastotallantaidasargedung' => '294',
            'ketinggianbangunan' => '7',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.966769',
            'koordinatbangunan2' => '111.419705',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 16,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 16,
            'profiltanahbangunangedung_id' => 16,
            'klasifikasibangunangedung_id' => 16,
            'datastrukturbangunangedung_id' => 16,
            'statusbangunangedung_id' => 16,
            'luastanah' => '4053',
            'namabangunan' => 'Kantor Dinas Kesehatan IV',
            'alamatbangunan' => 'Jl. Dr. Sutomo No.24, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '160',
            'luastotallantaidasargedung' => '320',
            'ketinggianbangunan' => '7',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.966769',
            'koordinatbangunan2' => '111.419705',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 17,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 17,
            'profiltanahbangunangedung_id' => 17,
            'klasifikasibangunangedung_id' => 17,
            'datastrukturbangunangedung_id' => 17,
            'statusbangunangedung_id' => 17,
            'luastanah' => '4053',
            'namabangunan' => 'Gedung PSC',
            'alamatbangunan' => 'Jl. Dr. Sutomo No.24, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '120',
            'luastotallantaidasargedung' => '240',
            'ketinggianbangunan' => '8',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.966769',
            'koordinatbangunan2' => '111.419705',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 18,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 18,
            'profiltanahbangunangedung_id' => 18,
            'klasifikasibangunangedung_id' => 18,
            'datastrukturbangunangedung_id' => 18,
            'statusbangunangedung_id' => 18,
            'luastanah' => '4053',
            'namabangunan' => 'Kantor Dinas Kesehatan I',
            'alamatbangunan' => 'Jl. Dr. Sutomo No.24, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '213.4',
            'luastotallantaidasargedung' => '213.4',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.966769',
            'koordinatbangunan2' => '111.419705',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 19,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 19,
            'profiltanahbangunangedung_id' => 19,
            'klasifikasibangunangedung_id' => 19,
            'datastrukturbangunangedung_id' => 19,
            'statusbangunangedung_id' => 19,
            'luastanah' => '4053',
            'namabangunan' => 'KBM',
            'alamatbangunan' => 'Jl. Dr. Sutomo No.24, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '114.8',
            'luastotallantaidasargedung' => '114.8',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.966769',
            'koordinatbangunan2' => '111.419705',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 20,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 20,
            'profiltanahbangunangedung_id' => 20,
            'klasifikasibangunangedung_id' => 20,
            'datastrukturbangunangedung_id' => 20,
            'statusbangunangedung_id' => 20,
            'luastanah' => '4053',
            'namabangunan' => 'Rumah Dinas Dokter',
            'alamatbangunan' => 'Jl. Dr. Sutomo No.24, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '60',
            'luastotallantaidasargedung' => '60',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.966769',
            'koordinatbangunan2' => '111.419705',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 21,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 21,
            'profiltanahbangunangedung_id' => 21,
            'klasifikasibangunangedung_id' => 21,
            'datastrukturbangunangedung_id' => 21,
            'statusbangunangedung_id' => 21,
            'luastanah' => '4053',
            'namabangunan' => 'Rumah Dinas',
            'alamatbangunan' => 'Jl. Dr. Sutomo No.24, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '60',
            'luastotallantaidasargedung' => '70',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.966769',
            'koordinatbangunan2' => '111.419705',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 22,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 22,
            'profiltanahbangunangedung_id' => 22,
            'klasifikasibangunangedung_id' => 22,
            'datastrukturbangunangedung_id' => 22,
            'statusbangunangedung_id' => 22,
            'luastanah' => '1090',
            'namabangunan' => 'Gedung Kantor',
            'alamatbangunan' => 'Jl. Pemuda No. 46, Ds. Mlangsen, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '496.75',
            'luastotallantaidasargedung' => '924.7',
            'ketinggianbangunan' => '10',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.971046',
            'koordinatbangunan2' => '111.420783',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 23,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 23,
            'profiltanahbangunangedung_id' => 23,
            'klasifikasibangunangedung_id' => 23,
            'datastrukturbangunangedung_id' => 23,
            'statusbangunangedung_id' => 23,
            'luastanah' => '2747',
            'namabangunan' => 'Kantor',
            'alamatbangunan' => 'Jl. Gunung Wilis No. 24, Kunden, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '1100',
            'luastotallantaidasargedung' => '2200',
            'ketinggianbangunan' => '8',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.963827',
            'koordinatbangunan2' => '111.414513',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 24,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 24,
            'profiltanahbangunangedung_id' => 24,
            'klasifikasibangunangedung_id' => 24,
            'datastrukturbangunangedung_id' => 24,
            'statusbangunangedung_id' => 24,
            'luastanah' => '200',
            'namabangunan' => 'Laboratorium DLH',
            'alamatbangunan' => 'Jl. Gunung Wilis No. 24, Kunden, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '192',
            'luastotallantaidasargedung' => '192',
            'ketinggianbangunan' => null,
            'luasbasement' => null,
            'koordinatbangunan' => '-6.963844',
            'koordinatbangunan2' => '111.414287',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 25,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 25,
            'profiltanahbangunangedung_id' => 25,
            'klasifikasibangunangedung_id' => 25,
            'datastrukturbangunangedung_id' => 25,
            'statusbangunangedung_id' => 25,
            'luastanah' => '3130',
            'namabangunan' => 'Kantor',
            'alamatbangunan' => 'Jl. Blora - Rembang KM 7, Ds. Sendangharjo, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '1048',
            'luastotallantaidasargedung' => '209.6',
            'ketinggianbangunan' => '7',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.93394',
            'koordinatbangunan2' => '111.375718',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 26,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 26,
            'profiltanahbangunangedung_id' => 26,
            'klasifikasibangunangedung_id' => 26,
            'datastrukturbangunangedung_id' => 26,
            'statusbangunangedung_id' => 26,
            'luastanah' => '3130',
            'namabangunan' => 'Laboratorium',
            'alamatbangunan' => 'Jl. Blora - Rembang KM 7, Ds. Sendangharjo, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '60',
            'luastotallantaidasargedung' => '120',
            'ketinggianbangunan' => '7',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.93394',
            'koordinatbangunan2' => '111.375718',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 27,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 27,
            'profiltanahbangunangedung_id' => 27,
            'klasifikasibangunangedung_id' => 27,
            'datastrukturbangunangedung_id' => 27,
            'statusbangunangedung_id' => 27,
            'luastanah' => '3130',
            'namabangunan' => 'Gedung Pertemuan',
            'alamatbangunan' => 'Jl. Blora - Rembang KM 7, Ds. Sendangharjo, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '150',
            'luastotallantaidasargedung' => '300',
            'ketinggianbangunan' => '8',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.93394',
            'koordinatbangunan2' => '111.375718',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 28,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 28,
            'profiltanahbangunangedung_id' => 28,
            'klasifikasibangunangedung_id' => 28,
            'datastrukturbangunangedung_id' => 28,
            'statusbangunangedung_id' => 28,
            'luastanah' => '3130',
            'namabangunan' => 'Kantor ex. PPIP',
            'alamatbangunan' => 'Jl. Blora - Rembang KM 7, Ds. Sendangharjo, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '168',
            'luastotallantaidasargedung' => '168',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.93394',
            'koordinatbangunan2' => '111.375718',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 29,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 29,
            'profiltanahbangunangedung_id' => 29,
            'klasifikasibangunangedung_id' => 29,
            'datastrukturbangunangedung_id' => 29,
            'statusbangunangedung_id' => 29,
            'luastanah' => '3130',
            'namabangunan' => 'Gedung Saprodi dan Gudang Peralatan',
            'alamatbangunan' => 'Jl. Blora - Rembang KM 7, Ds. Sendangharjo, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '48',
            'luastotallantaidasargedung' => '96',
            'ketinggianbangunan' => '7',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.93394',
            'koordinatbangunan2' => '111.375718',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 30,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 30,
            'profiltanahbangunangedung_id' => 30,
            'klasifikasibangunangedung_id' => 30,
            'datastrukturbangunangedung_id' => 30,
            'statusbangunangedung_id' => 30,
            'luastanah' => '725',
            'namabangunan' => 'Dinas PMD',
            'alamatbangunan' => 'Jl. Gor No. 8, Ds. Karangjati, Kec. Bolra, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '336.76',
            'luastotallantaidasargedung' => '673.52',
            'ketinggianbangunan' => '8',
            'luasbasement' => null,
            'koordinatbangunan' => '-6.964317',
            'koordinatbangunan2' => '111.430858',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 31,
            'fungsibangunan_id' => 2,
            'kepemilikanbangunangedung_id' => 31,
            'profiltanahbangunangedung_id' => 31,
            'klasifikasibangunangedung_id' => 31,
            'datastrukturbangunangedung_id' => 31,
            'statusbangunangedung_id' => 31,
            'luastanah' => '6715',
            'namabangunan' => 'Mushola',
            'alamatbangunan' => 'Jl. A. Yani No. 42, RT: 8/RW: 1, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '16',
            'luastotallantaidasargedung' => '16',
            'ketinggianbangunan' => '4',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964498',
            'koordinatbangunan2' => '111,424794',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 32,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 32,
            'profiltanahbangunangedung_id' => 32,
            'klasifikasibangunangedung_id' => 32,
            'datastrukturbangunangedung_id' => 32,
            'statusbangunangedung_id' => 32,
            'luastanah' => '6715',
            'namabangunan' => 'Gedung A',
            'alamatbangunan' => 'Jl. A. Yani No. 42, RT: 8/RW: 1, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '510',
            'luastotallantaidasargedung' => '1020',
            'ketinggianbangunan' => '13',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964498',
            'koordinatbangunan2' => '111,424794',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 33,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 33,
            'profiltanahbangunangedung_id' => 33,
            'klasifikasibangunangedung_id' => 33,
            'datastrukturbangunangedung_id' => 33,
            'statusbangunangedung_id' => 33,
            'luastanah' => '6715',
            'namabangunan' => 'Gedung B',
            'alamatbangunan' => 'Jl. A. Yani No. 42, RT: 8/RW: 1, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '510',
            'luastotallantaidasargedung' => '1020',
            'ketinggianbangunan' => '13',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964498',
            'koordinatbangunan2' => '111,424794',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 34,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 34,
            'profiltanahbangunangedung_id' => 34,
            'klasifikasibangunangedung_id' => 34,
            'datastrukturbangunangedung_id' => 34,
            'statusbangunangedung_id' => 34,
            'luastanah' => '6715',
            'namabangunan' => 'Gedung C',
            'alamatbangunan' => 'Jl. A. Yani No. 42, RT: 8/RW: 1, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '512',
            'luastotallantaidasargedung' => '1024',
            'ketinggianbangunan' => '13',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964498',
            'koordinatbangunan2' => '111,424794',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 35,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 35,
            'profiltanahbangunangedung_id' => 35,
            'klasifikasibangunangedung_id' => 35,
            'datastrukturbangunangedung_id' => 35,
            'statusbangunangedung_id' => 35,
            'luastanah' => '6715',
            'namabangunan' => 'Gedung D',
            'alamatbangunan' => 'Jl. A. Yani No. 42, RT: 8/RW: 1, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '297',
            'luastotallantaidasargedung' => '594',
            'ketinggianbangunan' => '13',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964498',
            'koordinatbangunan2' => '111,424794',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 36,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 36,
            'profiltanahbangunangedung_id' => 36,
            'klasifikasibangunangedung_id' => 36,
            'datastrukturbangunangedung_id' => 36,
            'statusbangunangedung_id' => 36,
            'luastanah' => '1000 m2',
            'namabangunan' => 'Kantor BPMKB',
            'alamatbangunan' => 'Ds. Beran, RT: 01/RW: 02, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '288 m2',
            'luastotallantaidasargedung' => '576 m2',
            'ketinggianbangunan' => '10 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,967722',
            'koordinatbangunan2' => '111,420709',
            'tanggalmulaikonstruksi' => '2016',
        ]);

        databangunangedung::create([
            'id' => 37,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 37,
            'profiltanahbangunangedung_id' => 37,
            'klasifikasibangunangedung_id' => 37,
            'datastrukturbangunangedung_id' => 37,
            'statusbangunangedung_id' => 37,
            'luastanah' => '1000 m2',
            'namabangunan' => 'Gudang',
            'alamatbangunan' => 'Jl. Cendana No. 58, Ds. Beran, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '126 m2',
            'luastotallantaidasargedung' => '252 m2',
            'ketinggianbangunan' => '8 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,968354',
            'koordinatbangunan2' => '111,408928',
            'tanggalmulaikonstruksi' => '2016',
        ]);

        databangunangedung::create([
            'id' => 38,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 38,
            'profiltanahbangunangedung_id' => 38,
            'klasifikasibangunangedung_id' => 38,
            'datastrukturbangunangedung_id' => 38,
            'statusbangunangedung_id' => 38,
            'luastanah' => '1000 m2',
            'namabangunan' => 'BPKB',
            'alamatbangunan' => 'Jl. Cendana No. 58, Ds. Beran, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '80 m2',
            'luastotallantaidasargedung' => '80 m2',
            'ketinggianbangunan' => '6 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,970879',
            'koordinatbangunan2' => '111,427678',
            'tanggalmulaikonstruksi' => '2016',
        ]);

        databangunangedung::create([
            'id' => 39,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 39,
            'profiltanahbangunangedung_id' => 39,
            'klasifikasibangunangedung_id' => 39,
            'datastrukturbangunangedung_id' => 39,
            'statusbangunangedung_id' => 39,
            'luastanah' => '1000 m2',
            'namabangunan' => 'Kantor Dinas',
            'alamatbangunan' => 'Jl. Rembang-Blora KM. 4, Kec. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '486,5 m2',
            'luastotallantaidasargedung' => '973 m2',
            'ketinggianbangunan' => '7 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,948568',
            'koordinatbangunan2' => '111,429657',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 40,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 40,
            'profiltanahbangunangedung_id' => 40,
            'klasifikasibangunangedung_id' => 40,
            'datastrukturbangunangedung_id' => 40,
            'statusbangunangedung_id' => 40,
            'luastanah' => '1000 m2',
            'namabangunan' => 'UPTD Metrologi Legal',
            'alamatbangunan' => 'Jl. Rembang-Blora KM. 4, Kec. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '264 m2',
            'luastotallantaidasargedung' => '528 m2',
            'ketinggianbangunan' => '7 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,948568',
            'koordinatbangunan2' => '111,429657',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 41,
            'fungsibangunan_id' => 2,
            'kepemilikanbangunangedung_id' => 41,
            'profiltanahbangunangedung_id' => 41,
            'klasifikasibangunangedung_id' => 41,
            'datastrukturbangunangedung_id' => 41,
            'statusbangunangedung_id' => 41,
            'luastanah' => '1310',
            'namabangunan' => 'Mushola',
            'alamatbangunan' => 'Jl. Gor No. 1, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '16',
            'luastotallantaidasargedung' => '16',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964484',
            'koordinatbangunan2' => '111,421475',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 42,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 42,
            'profiltanahbangunangedung_id' => 42,
            'klasifikasibangunangedung_id' => 42,
            'datastrukturbangunangedung_id' => 42,
            'statusbangunangedung_id' => 42,
            'luastanah' => '446',
            'namabangunan' => 'Gedung Penelitian A',
            'alamatbangunan' => 'Jl. Gor No. 1, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '192',
            'luastotallantaidasargedung' => '192',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964484',
            'koordinatbangunan2' => '111,421475',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 43,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 43,
            'profiltanahbangunangedung_id' => 43,
            'klasifikasibangunangedung_id' => 43,
            'datastrukturbangunangedung_id' => 43,
            'statusbangunangedung_id' => 43,
            'luastanah' => '446',
            'namabangunan' => 'BLK',
            'alamatbangunan' => 'Jl. Gor No. 1, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '177',
            'luastotallantaidasargedung' => '177',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964484',
            'koordinatbangunan2' => '111,421475',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 44,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 44,
            'profiltanahbangunangedung_id' => 44,
            'klasifikasibangunangedung_id' => 44,
            'datastrukturbangunangedung_id' => 44,
            'statusbangunangedung_id' => 44,
            'luastanah' => '5000',
            'namabangunan' => 'Workshop',
            'alamatbangunan' => 'Jl. Gor No. 1 Ketanggar (Jl. Jepon - Cepu KM 5), Ds. Jepon, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => null,
            'luastotallantaidasargedung' => null,
            'ketinggianbangunan' => null,
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964484',
            'koordinatbangunan2' => '111,421475',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 45,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 45,
            'profiltanahbangunangedung_id' => 45,
            'klasifikasibangunangedung_id' => 45,
            'datastrukturbangunangedung_id' => 45,
            'statusbangunangedung_id' => 45,
            'luastanah' => '970',
            'namabangunan' => 'Aula',
            'alamatbangunan' => 'Jl. Gor No. 1, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '177',
            'luastotallantaidasargedung' => '177',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964484',
            'koordinatbangunan2' => '111,421475',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 46,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 46,
            'profiltanahbangunangedung_id' => 46,
            'klasifikasibangunangedung_id' => 46,
            'datastrukturbangunangedung_id' => 46,
            'statusbangunangedung_id' => 46,
            'luastanah' => '970 m2',
            'namabangunan' => 'Bidang Pertanian Dan Bidang Industri',
            'alamatbangunan' => 'Jl. Gor No. 1 Ketanggar, Ds. Karang Jati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '346 m2',
            'luastotallantaidasargedung' => '346 m2',
            'ketinggianbangunan' => '3.5 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964484',
            'koordinatbangunan2' => '111,421475',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 47,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 47,
            'profiltanahbangunangedung_id' => 47,
            'klasifikasibangunangedung_id' => 47,
            'datastrukturbangunangedung_id' => 47,
            'statusbangunangedung_id' => 47,
            'luastanah' => '446 m2',
            'namabangunan' => 'Gedung Pelatihan C',
            'alamatbangunan' => 'Jl. Gor No. 1, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '198.5 m2',
            'luastotallantaidasargedung' => '297 m2',
            'ketinggianbangunan' => '8 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964484',
            'koordinatbangunan2' => '111,421475',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 48,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 48,
            'profiltanahbangunangedung_id' => 48,
            'klasifikasibangunangedung_id' => 48,
            'datastrukturbangunangedung_id' => 48,
            'statusbangunangedung_id' => 48,
            'luastanah' => '1310 m2',
            'namabangunan' => 'Sekretariat Dan Gedung Pertemuan',
            'alamatbangunan' => 'Jl. Gor No. 1 Ketanggar, Ds. Karang Jati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '396 m2',
            'luastotallantaidasargedung' => '396 m2',
            'ketinggianbangunan' => '4 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964484',
            'koordinatbangunan2' => '111,421475',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 49,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 49,
            'profiltanahbangunangedung_id' => 49,
            'klasifikasibangunangedung_id' => 49,
            'datastrukturbangunangedung_id' => 49,
            'statusbangunangedung_id' => 49,
            'luastanah' => '446 m2',
            'namabangunan' => 'Gedung Pelatihan B',
            'alamatbangunan' => 'Jl. Gor No. 1, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '168 m2',
            'luastotallantaidasargedung' => '336 m2',
            'ketinggianbangunan' => '8 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964484',
            'koordinatbangunan2' => '111,421475',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 50,
            'fungsibangunan_id' => 1,
            'kepemilikanbangunangedung_id' => 50,
            'profiltanahbangunangedung_id' => 50,
            'klasifikasibangunangedung_id' => 50,
            'datastrukturbangunangedung_id' => 50,
            'statusbangunangedung_id' => 50,
            'luastanah' => '446 m2',
            'namabangunan' => 'Rumah Negara Golongan II Tipe B',
            'alamatbangunan' => 'Jln. Gor Mustika Komplek Perkantoran Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '48 m2',
            'luastotallantaidasargedung' => '48 m2',
            'ketinggianbangunan' => '6 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,96525',
            'koordinatbangunan2' => '111,421689',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 51,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 51,
            'profiltanahbangunangedung_id' => 51,
            'klasifikasibangunangedung_id' => 51,
            'datastrukturbangunangedung_id' => 51,
            'statusbangunangedung_id' => 51,
            'luastanah' => '1283',
            'namabangunan' => 'Gedung Perpustakaan',
            'alamatbangunan' => 'Jl. Nusantara No. 23, Ds. Jetis, RT: 04/RW: 02, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '4',
            'luaslantaidasar' => '749.25',
            'luastotallantaidasargedung' => '2335.5',
            'ketinggianbangunan' => '17',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,966617',
            'koordinatbangunan2' => '111,424265',
            'tanggalmulaikonstruksi' => '2018',
        ]);

        databangunangedung::create([
            'id' => 52,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 52,
            'profiltanahbangunangedung_id' => 52,
            'klasifikasibangunangedung_id' => 52,
            'datastrukturbangunangedung_id' => 52,
            'statusbangunangedung_id' => 52,
            'luastanah' => '1283',
            'namabangunan' => 'Gedung Arsip I',
            'alamatbangunan' => 'Jln. Gor Mustika Komplek Perkantoran Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '147',
            'luastotallantaidasargedung' => '147',
            'ketinggianbangunan' => '6',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,96525',
            'koordinatbangunan2' => '111,421689',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 53,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 53,
            'profiltanahbangunangedung_id' => 53,
            'klasifikasibangunangedung_id' => 53,
            'datastrukturbangunangedung_id' => 53,
            'statusbangunangedung_id' => 53,
            'luastanah' => '1283',
            'namabangunan' => 'Gedung Arsip II',
            'alamatbangunan' => 'Jln. Gor Mustika Komplek Perkantoran Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '211.6',
            'luastotallantaidasargedung' => '211.6',
            'ketinggianbangunan' => '6',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,96525',
            'koordinatbangunan2' => '111,421689',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 54,
            'fungsibangunan_id' => 2,
            'kepemilikanbangunangedung_id' => 54,
            'profiltanahbangunangedung_id' => 54,
            'klasifikasibangunangedung_id' => 54,
            'datastrukturbangunangedung_id' => 54,
            'statusbangunangedung_id' => 54,
            'luastanah' => '925',
            'namabangunan' => 'Mushola SDA Blora',
            'alamatbangunan' => 'Kel. Kedungjenar, Kec. Blora, Kab. Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '124.27',
            'luastotallantaidasargedung' => '124.27',
            'ketinggianbangunan' => '4',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,974471',
            'koordinatbangunan2' => '111,413671',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 55,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 55,
            'profiltanahbangunangedung_id' => 55,
            'klasifikasibangunangedung_id' => 55,
            'datastrukturbangunangedung_id' => 55,
            'statusbangunangedung_id' => 55,
            'luastanah' => 'Gedung Smart House',
            'namabangunan' => 'Jl. Reksodiputro No. 6, Mlangsen, Kec. Blora, Jawa Tengah',
            'jumlahlantai' => '3',
            'luaslantaidasar' => '778,22 m2',
            'luastotallantaidasargedung' => '2.334,66 m2',
            'ketinggianbangunan' => '12 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,974471',
            'koordinatbangunan2' => '111,413671',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 56,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 56,
            'profiltanahbangunangedung_id' => 56,
            'klasifikasibangunangedung_id' => 56,
            'datastrukturbangunangedung_id' => 56,
            'statusbangunangedung_id' => 56,
            'luastanah' => '925 m2',
            'namabangunan' => 'Gedung Kantor Sub. Din SDA',
            'alamatbangunan' => 'Kel. Kedungjenar, Kec. Blora, Kab. Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '314,83 m2',
            'luastotallantaidasargedung' => '314,83 m2',
            'ketinggianbangunan' => '4 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,974471',
            'koordinatbangunan2' => '111,413671',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 57,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 57,
            'profiltanahbangunangedung_id' => 57,
            'klasifikasibangunangedung_id' => 57,
            'datastrukturbangunangedung_id' => 57,
            'statusbangunangedung_id' => 57,
            'luastanah' => '925 m2',
            'namabangunan' => 'Gedung Peternakan SDA Blora',
            'alamatbangunan' => 'Kel. Kedungjenar, Kec. Blora, Kab. Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '257,08 m2',
            'luastotallantaidasargedung' => '257,08 m2',
            'ketinggianbangunan' => '4 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,974471',
            'koordinatbangunan2' => '111,413671',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 58,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 58,
            'profiltanahbangunangedung_id' => 58,
            'klasifikasibangunangedung_id' => 58,
            'datastrukturbangunangedung_id' => 58,
            'statusbangunangedung_id' => 58,
            'luastanah' => '1175 m2',
            'namabangunan' => 'Gedung Dinsos PPPA',
            'alamatbangunan' => 'Jl. Pemuda No. 16A, Mlangsen, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '950 m2',
            'luastotallantaidasargedung' => '1175 m2',
            'ketinggianbangunan' => '10 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,970096',
            'koordinatbangunan2' => '111,415723',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 59,
            'fungsibangunan_id' => 3,
            'kepemilikanbangunangedung_id' => 59,
            'profiltanahbangunangedung_id' => 59,
            'klasifikasibangunangedung_id' => 59,
            'datastrukturbangunangedung_id' => 59,
            'statusbangunangedung_id' => 59,
            'luastanah' => '6945 m2',
            'namabangunan' => 'blok T',
            'alamatbangunan' => 'Jl. Rajawali / eks terminal',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '328 m2',
            'luastotallantaidasargedung' => '328 m2',
            'ketinggianbangunan' => '5 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,970308',
            'koordinatbangunan2' => '111,424274',
            'tanggalmulaikonstruksi' => '1990',
        ]);

        databangunangedung::create([
            'id' => 60,
            'fungsibangunan_id' => 3,
            'kepemilikanbangunangedung_id' => 60,
            'profiltanahbangunangedung_id' => 60,
            'klasifikasibangunangedung_id' => 60,
            'datastrukturbangunangedung_id' => 60,
            'statusbangunangedung_id' => 60,
            'luastanah' => '16330 m2',
            'namabangunan' => 'Pasar Hewan',
            'alamatbangunan' => 'Kel. Karangjati, kec. Blora, kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '2381 m2',
            'luastotallantaidasargedung' => '2381 m2',
            'ketinggianbangunan' => '6 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,958509',
            'koordinatbangunan2' => '111,420765',
            'tanggalmulaikonstruksi' => '1971',
        ]);

        databangunangedung::create([
            'id' => 61,
            'fungsibangunan_id' => 3,
            'kepemilikanbangunangedung_id' => 61,
            'profiltanahbangunangedung_id' => 61,
            'klasifikasibangunangedung_id' => 61,
            'datastrukturbangunangedung_id' => 61,
            'statusbangunangedung_id' => 61,
            'luastanah' => '1314',
            'namabangunan' => 'Pasar Rajawali',
            'alamatbangunan' => 'Jln. Rajawali Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '583',
            'luastotallantaidasargedung' => '583',
            'ketinggianbangunan' => '5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,970489',
            'koordinatbangunan2' => '111,42409',
            'tanggalmulaikonstruksi' => '1949',
        ]);

        databangunangedung::create([
            'id' => 62,
            'fungsibangunan_id' => 3,
            'kepemilikanbangunangedung_id' => 62,
            'profiltanahbangunangedung_id' => 62,
            'klasifikasibangunangedung_id' => 62,
            'datastrukturbangunangedung_id' => 62,
            'statusbangunangedung_id' => 62,
            'luastanah' => '41693',
            'namabangunan' => 'Pasar Sidomakmur (blok A)',
            'alamatbangunan' => 'Jln. Raya Blora Randublatung km. 2',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '5105',
            'luastotallantaidasargedung' => '5105',
            'ketinggianbangunan' => '25',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,989354',
            'koordinatbangunan2' => '111,4102',
            'tanggalmulaikonstruksi' => '2016',
        ]);

        databangunangedung::create([
            'id' => 63,
            'fungsibangunan_id' => 3,
            'kepemilikanbangunangedung_id' => 63,
            'profiltanahbangunangedung_id' => 63,
            'klasifikasibangunangedung_id' => 63,
            'datastrukturbangunangedung_id' => 63,
            'statusbangunangedung_id' => 63,
            'luastanah' => '41693',
            'namabangunan' => 'Pasar Sidomakmur (blok B)',
            'alamatbangunan' => 'Jln. Raya Blora Randublatung km. 2',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '5105',
            'luastotallantaidasargedung' => '5105',
            'ketinggianbangunan' => '25',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,989354',
            'koordinatbangunan2' => '111,4102',
            'tanggalmulaikonstruksi' => '2016',
        ]);

        databangunangedung::create([
            'id' => 64,
            'fungsibangunan_id' => 3,
            'kepemilikanbangunangedung_id' => 64,
            'profiltanahbangunangedung_id' => 64,
            'klasifikasibangunangedung_id' => 64,
            'datastrukturbangunangedung_id' => 64,
            'statusbangunangedung_id' => 64,
            'luastanah' => '41693',
            'namabangunan' => 'Pasar Sidomakmur (blok C)',
            'alamatbangunan' => 'Jln. Raya Blora Randublatung km. 2',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '4422',
            'luastotallantaidasargedung' => '4422',
            'ketinggianbangunan' => '15',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,989354',
            'koordinatbangunan2' => '111,4102',
            'tanggalmulaikonstruksi' => '2016',
        ]);

        databangunangedung::create([
            'id' => 65,
            'fungsibangunan_id' => 3,
            'kepemilikanbangunangedung_id' => 65,
            'profiltanahbangunangedung_id' => 65,
            'klasifikasibangunangedung_id' => 65,
            'datastrukturbangunangedung_id' => 65,
            'statusbangunangedung_id' => 65,
            'luastanah' => '41693',
            'namabangunan' => 'Pasar Sidomakmur (blok D)',
            'alamatbangunan' => 'Jln. Raya Blora Randublatung km. 2',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '1500',
            'luastotallantaidasargedung' => '1500',
            'ketinggianbangunan' => '10',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,989354',
            'koordinatbangunan2' => '111,4102',
            'tanggalmulaikonstruksi' => '2016',
        ]);


        databangunangedung::create([
            'id' => 66,
            'fungsibangunan_id' => 2,
            'kepemilikanbangunangedung_id' => 66,
            'profiltanahbangunangedung_id' => 66,
            'klasifikasibangunangedung_id' => 66,
            'datastrukturbangunangedung_id' => 66,
            'statusbangunangedung_id' => 66,
            'luastanah' => '5505 m2',
            'namabangunan' => 'Mushola',
            'alamatbangunan' => 'Jln. Sudarman no. 3 Blora',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '120 m2',
            'luastotallantaidasargedung' => '180 m2',
            'ketinggianbangunan' => '8 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,971493',
            'koordinatbangunan2' => '111,417066',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 67,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 67,
            'profiltanahbangunangedung_id' => 67,
            'klasifikasibangunangedung_id' => 67,
            'datastrukturbangunangedung_id' => 67,
            'statusbangunangedung_id' => 67,
            'luastanah' => '5505 m2',
            'namabangunan' => 'Pos Satpam',
            'alamatbangunan' => 'Jln. Sudarman no. 3 Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '4 m2',
            'luastotallantaidasargedung' => '4 m2',
            'ketinggianbangunan' => '3 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,971493',
            'koordinatbangunan2' => '111,417066',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 68,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 68,
            'profiltanahbangunangedung_id' => 68,
            'klasifikasibangunangedung_id' => 68,
            'datastrukturbangunangedung_id' => 68,
            'statusbangunangedung_id' => 68,
            'luastanah' => '5505 m2',
            'namabangunan' => 'Gedung Kantor',
            'alamatbangunan' => 'Jln. Sudarman no. 3 Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '659 m2',
            'luastotallantaidasargedung' => '659 m2',
            'ketinggianbangunan' => '6,5 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,971493',
            'koordinatbangunan2' => '111,417066',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 69,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 69,
            'profiltanahbangunangedung_id' => 69,
            'klasifikasibangunangedung_id' => 69,
            'datastrukturbangunangedung_id' => 69,
            'statusbangunangedung_id' => 69,
            'luastanah' => '5505 m2',
            'namabangunan' => 'Sekretariat',
            'alamatbangunan' => 'Jln. Sudarman no. 3 Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '170 m2',
            'luastotallantaidasargedung' => '170 m2',
            'ketinggianbangunan' => '6,5 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,971493',
            'koordinatbangunan2' => '111,417066',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 70,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 70,
            'profiltanahbangunangedung_id' => 70,
            'klasifikasibangunangedung_id' => 70,
            'datastrukturbangunangedung_id' => 70,
            'statusbangunangedung_id' => 70,
            'luastanah' => '5505 m2',
            'namabangunan' => 'Gedung Arsip',
            'alamatbangunan' => 'Jln. Sudarman no. 3 Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '256 m2',
            'luastotallantaidasargedung' => '256 m2',
            'ketinggianbangunan' => '6,5 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,971493',
            'koordinatbangunan2' => '111,417066',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 71,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 71,
            'profiltanahbangunangedung_id' => 71,
            'klasifikasibangunangedung_id' => 71,
            'datastrukturbangunangedung_id' => 71,
            'statusbangunangedung_id' => 71,
            'luastanah' => '5505',
            'namabangunan' => 'Parkir dan Arsip',
            'alamatbangunan' => 'Jln. Sudarman no. 3 Blora',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '60',
            'luastotallantaidasargedung' => '120',
            'ketinggianbangunan' => '8',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,971493',
            'koordinatbangunan2' => '111,417066',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 72,
            'fungsibangunan_id' => 2,
            'kepemilikanbangunangedung_id' => 72,
            'profiltanahbangunangedung_id' => 72,
            'klasifikasibangunangedung_id' => 72,
            'datastrukturbangunangedung_id' => 72,
            'statusbangunangedung_id' => 72,
            'luastanah' => '12500',
            'namabangunan' => 'Mushola',
            'alamatbangunan' => 'Jl. Gor No. 3, Ketanggar, Karangjati, Kec. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '36',
            'luastotallantaidasargedung' => '36',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964099',
            'koordinatbangunan2' => '111,421836',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 73,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 73,
            'profiltanahbangunangedung_id' => 73,
            'klasifikasibangunangedung_id' => 73,
            'datastrukturbangunangedung_id' => 73,
            'statusbangunangedung_id' => 73,
            'luastanah' => '496',
            'namabangunan' => 'Gedung Kantor',
            'alamatbangunan' => 'Jl. GOR No. 2, Ketanggar, Karangjati, Kec. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '372',
            'luastotallantaidasargedung' => '744',
            'ketinggianbangunan' => '10',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,969425',
            'koordinatbangunan2' => '111,420695',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 74,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 74,
            'profiltanahbangunangedung_id' => 74,
            'klasifikasibangunangedung_id' => 74,
            'datastrukturbangunangedung_id' => 74,
            'statusbangunangedung_id' => 74,
            'luastanah' => '496',
            'namabangunan' => 'Pendopo Pagelaran',
            'alamatbangunan' => 'Jl. GOR No. 2, Ketanggar, Karangjati, Kec. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '299.59',
            'luastotallantaidasargedung' => '299.59',
            'ketinggianbangunan' => '7',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,969425',
            'koordinatbangunan2' => '111,420695',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 75,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 75,
            'profiltanahbangunangedung_id' => 75,
            'klasifikasibangunangedung_id' => 75,
            'datastrukturbangunangedung_id' => 75,
            'statusbangunangedung_id' => 75,
            'luastanah' => '496',
            'namabangunan' => 'Gudang',
            'alamatbangunan' => 'Jl. GOR No. 2, Ketanggar, Karangjati, Kec. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '193.39',
            'luastotallantaidasargedung' => '193.59',
            'ketinggianbangunan' => '4',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,969425',
            'koordinatbangunan2' => '111,420695',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);


        databangunangedung::create([
            'id' => 76,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 76,
            'profiltanahbangunangedung_id' => 76,
            'klasifikasibangunangedung_id' => 76,
            'datastrukturbangunangedung_id' => 76,
            'statusbangunangedung_id' => 76,
            'luastanah' => '12500 m2',
            'namabangunan' => 'Gedung GOR Mustika',
            'alamatbangunan' => 'Jl. Gor No. 3, Ketanggar, Karangjati, Kec. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '4187 m2',
            'luastotallantaidasargedung' => '8374 m2',
            'ketinggianbangunan' => '12 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964099',
            'koordinatbangunan2' => '111,421836',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 77,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 77,
            'profiltanahbangunangedung_id' => 77,
            'klasifikasibangunangedung_id' => 77,
            'datastrukturbangunangedung_id' => 77,
            'statusbangunangedung_id' => 77,
            'luastanah' => '11466 m2',
            'namabangunan' => 'GOR Kolonel Sunandar',
            'alamatbangunan' => 'Jl. Ahmad Yani, Kec. Blora, Kab. Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '823 m2',
            'luastotallantaidasargedung' => '823 m2',
            'ketinggianbangunan' => '7 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,966405',
            'koordinatbangunan2' => '111,424201',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 78,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 78,
            'profiltanahbangunangedung_id' => 78,
            'klasifikasibangunangedung_id' => 78,
            'datastrukturbangunangedung_id' => 78,
            'statusbangunangedung_id' => 78,
            'luastanah' => '500 m2',
            'namabangunan' => 'Gedung Kantor KONI',
            'alamatbangunan' => 'Jl. Kol. Sunandar No. 61, Mlangsen, Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '37 m2',
            'luastotallantaidasargedung' => '37 m2',
            'ketinggianbangunan' => '3,5 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,973408',
            'koordinatbangunan2' => '111,416022',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 79,
            'fungsibangunan_id' => 2,
            'kepemilikanbangunangedung_id' => 79,
            'profiltanahbangunangedung_id' => 79,
            'klasifikasibangunangedung_id' => 79,
            'datastrukturbangunangedung_id' => 79,
            'statusbangunangedung_id' => 79,
            'luastanah' => '10238 m2',
            'namabangunan' => 'Mushola',
            'alamatbangunan' => 'Jl. Ahmad Yani No. 36, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '109,2 m2',
            'luastotallantaidasargedung' => '109,2 m2',
            'ketinggianbangunan' => '3,5 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,966169',
            'koordinatbangunan2' => '111,422581',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 80,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 80,
            'profiltanahbangunangedung_id' => 80,
            'klasifikasibangunangedung_id' => 80,
            'datastrukturbangunangedung_id' => 80,
            'statusbangunangedung_id' => 80,
            'luastanah' => '10238 m2',
            'namabangunan' => 'Pendopo DPRD',
            'alamatbangunan' => 'Jl. Ahmad Yani No. 36, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '292,5 m2',
            'luastotallantaidasargedung' => '292,5 m2',
            'ketinggianbangunan' => '5 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,966169',
            'koordinatbangunan2' => '111,422581',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 81,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 81,
            'profiltanahbangunangedung_id' => 81,
            'klasifikasibangunangedung_id' => 81,
            'datastrukturbangunangedung_id' => 81,
            'statusbangunangedung_id' => 81,
            'luastanah' => '10238 m2',
            'namabangunan' => 'Lobby (R. Ketua, Wakil Ketua, Sekretaris)',
            'alamatbangunan' => 'Jl. Ahmad Yani No. 36, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '407,38 m2',
            'luastotallantaidasargedung' => '407,38 m2',
            'ketinggianbangunan' => '3,5 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,966169',
            'koordinatbangunan2' => '111,422581',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 82,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 82,
            'profiltanahbangunangedung_id' => 82,
            'klasifikasibangunangedung_id' => 82,
            'datastrukturbangunangedung_id' => 82,
            'statusbangunangedung_id' => 82,
            'luastanah' => '10238 m2',
            'namabangunan' => 'Kantor DPRD',
            'alamatbangunan' => 'Jl. Ahmad Yani No. 36, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '69,86 m2',
            'luastotallantaidasargedung' => '139,7 m2',
            'ketinggianbangunan' => '8 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,966169',
            'koordinatbangunan2' => '111,422581',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 83,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 83,
            'profiltanahbangunangedung_id' => 83,
            'klasifikasibangunangedung_id' => 83,
            'datastrukturbangunangedung_id' => 83,
            'statusbangunangedung_id' => 83,
            'luastanah' => '10238 m2',
            'namabangunan' => 'Gedung Komisi I',
            'alamatbangunan' => 'Jl. Ahmad Yani No. 36, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '326,25 m2',
            'luastotallantaidasargedung' => '326,25 m2',
            'ketinggianbangunan' => '3,5 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,966169',
            'koordinatbangunan2' => '111,422581',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 84,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 84,
            'profiltanahbangunangedung_id' => 84,
            'klasifikasibangunangedung_id' => 84,
            'datastrukturbangunangedung_id' => 84,
            'statusbangunangedung_id' => 84,
            'luastanah' => '10238 m2',
            'namabangunan' => 'Gedung Komisi II',
            'alamatbangunan' => 'Jl. Ahmad Yani No. 36, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '326,25 m2',
            'luastotallantaidasargedung' => '326,25 m2',
            'ketinggianbangunan' => '3,5 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,966169',
            'koordinatbangunan2' => '111,422581',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 85,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 85,
            'profiltanahbangunangedung_id' => 85,
            'klasifikasibangunangedung_id' => 85,
            'datastrukturbangunangedung_id' => 85,
            'statusbangunangedung_id' => 85,
            'luastanah' => '10238 m2',
            'namabangunan' => 'Gedung Fraksi',
            'alamatbangunan' => 'Jl. Ahmad Yani No. 36, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '363 m2',
            'luastotallantaidasargedung' => '726 m2',
            'ketinggianbangunan' => '8 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,966169',
            'koordinatbangunan2' => '111,422581',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 86,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 86,
            'profiltanahbangunangedung_id' => 86,
            'klasifikasibangunangedung_id' => 86,
            'datastrukturbangunangedung_id' => 86,
            'statusbangunangedung_id' => 86,
            'luastanah' => '10238',
            'namabangunan' => 'Pos Jaga/Reservasi',
            'alamatbangunan' => 'Jl. Ahmad Yani No. 36, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '30.16',
            'luastotallantaidasargedung' => '30.16',
            'ketinggianbangunan' => '3',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,966169',
            'koordinatbangunan2' => '111,422581',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 87,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 87,
            'profiltanahbangunangedung_id' => 87,
            'klasifikasibangunangedung_id' => 87,
            'datastrukturbangunangedung_id' => 87,
            'statusbangunangedung_id' => 87,
            'luastanah' => '10238',
            'namabangunan' => 'Pos Satpam',
            'alamatbangunan' => 'Jl. Ahmad Yani No. 36, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '14',
            'luastotallantaidasargedung' => '14',
            'ketinggianbangunan' => '3',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,966169',
            'koordinatbangunan2' => '111,422581',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 88,
            'fungsibangunan_id' => 1,
            'kepemilikanbangunangedung_id' => 88,
            'profiltanahbangunangedung_id' => 88,
            'klasifikasibangunangedung_id' => 88,
            'datastrukturbangunangedung_id' => 88,
            'statusbangunangedung_id' => 88,
            'luastanah' => '186',
            'namabangunan' => 'R. Jaga Pintu, Bd. Gabus',
            'alamatbangunan' => 'Mlangsen, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '30',
            'luastotallantaidasargedung' => '30',
            'ketinggianbangunan' => '4',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,97705',
            'koordinatbangunan2' => '111,411096',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 89,
            'fungsibangunan_id' => 1,
            'kepemilikanbangunangedung_id' => 89,
            'profiltanahbangunangedung_id' => 89,
            'klasifikasibangunangedung_id' => 89,
            'datastrukturbangunangedung_id' => 89,
            'statusbangunangedung_id' => 89,
            'luastanah' => '197',
            'namabangunan' => 'R. Jaga Bd. Glagahan',
            'alamatbangunan' => 'Ds. Jepangrejo, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '21',
            'luastotallantaidasargedung' => '21',
            'ketinggianbangunan' => '3.5',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,97705',
            'koordinatbangunan2' => '111,411096',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 90,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 90,
            'profiltanahbangunangedung_id' => 90,
            'klasifikasibangunangedung_id' => 90,
            'datastrukturbangunangedung_id' => 90,
            'statusbangunangedung_id' => 90,
            'luastanah' => '120',
            'namabangunan' => 'Kantor DPU Kab. Blora',
            'alamatbangunan' => 'Jl. Nusantara No. 62, Jetis, Kauman, Kec. Blora, Kab. Blora, Jawa Tengah',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '120',
            'luastotallantaidasargedung' => '240',
            'ketinggianbangunan' => '10',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,97705',
            'koordinatbangunan2' => '111,411096',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);


        databangunangedung::create([
            'id' => 91,
            'fungsibangunan_id' => 1,
            'kepemilikanbangunangedung_id' => 91,
            'profiltanahbangunangedung_id' => 91,
            'klasifikasibangunangedung_id' => 91,
            'datastrukturbangunangedung_id' => 91,
            'statusbangunangedung_id' => 91,
            'luastanah' => '2474 m2',
            'namabangunan' => 'Rumah Dinas',
            'alamatbangunan' => 'Jln. Gor No. 1 Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '81 m2',
            'luastotallantaidasargedung' => '81 m2',
            'ketinggianbangunan' => '4 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964351',
            'koordinatbangunan2' => '111,42103',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 92,
            'fungsibangunan_id' => 2,
            'kepemilikanbangunangedung_id' => 92,
            'profiltanahbangunangedung_id' => 92,
            'klasifikasibangunangedung_id' => 92,
            'datastrukturbangunangedung_id' => 92,
            'statusbangunangedung_id' => 92,
            'luastanah' => '2471 m2',
            'namabangunan' => 'Mushola',
            'alamatbangunan' => 'Jln. Gor No. 1 Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '72 m2',
            'luastotallantaidasargedung' => '72 m2',
            'ketinggianbangunan' => '4 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964351',
            'koordinatbangunan2' => '111,42103',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 93,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 93,
            'profiltanahbangunangedung_id' => 93,
            'klasifikasibangunangedung_id' => 93,
            'datastrukturbangunangedung_id' => 93,
            'statusbangunangedung_id' => 93,
            'luastanah' => '2470 m2',
            'namabangunan' => 'Gedung Inspektorat',
            'alamatbangunan' => 'Jln. Gor No. 11 Karangjati Blora',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '160.5 m2',
            'luastotallantaidasargedung' => '321 m2',
            'ketinggianbangunan' => '8 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964351',
            'koordinatbangunan2' => '111,42103',
            'tanggalmulaikonstruksi' => '2016',
        ]);

        databangunangedung::create([
            'id' => 94,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 94,
            'profiltanahbangunangedung_id' => 94,
            'klasifikasibangunangedung_id' => 94,
            'datastrukturbangunangedung_id' => 94,
            'statusbangunangedung_id' => 94,
            'luastanah' => '2472 m2',
            'namabangunan' => 'kantor (lama)',
            'alamatbangunan' => 'Jln. Gor No. 1 Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '111 m2',
            'luastotallantaidasargedung' => '111 m2',
            'ketinggianbangunan' => '4 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964351',
            'koordinatbangunan2' => '111,42103',
            'tanggalmulaikonstruksi' => null,
        ]);

        databangunangedung::create([
            'id' => 95,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 95,
            'profiltanahbangunangedung_id' => 95,
            'klasifikasibangunangedung_id' => 95,
            'datastrukturbangunangedung_id' => 95,
            'statusbangunangedung_id' => 95,
            'luastanah' => '2473 m2',
            'namabangunan' => 'Ruang Pertemuan (lama)',
            'alamatbangunan' => 'Jln. Gor No. 1 Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '60 m2',
            'luastotallantaidasargedung' => '60 m2',
            'ketinggianbangunan' => '4 m',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,964351',
            'koordinatbangunan2' => '111,42103',
            'tanggalmulaikonstruksi' => null,
        ]);


        databangunangedung::create([
            'id' => 96,
            'fungsibangunan_id' => 2,
            'kepemilikanbangunangedung_id' => 96,
            'profiltanahbangunangedung_id' => 96,
            'klasifikasibangunangedung_id' => 96,
            'datastrukturbangunangedung_id' => 96,
            'statusbangunangedung_id' => 96,
            'luastanah' => null,
            'namabangunan' => 'Mushola',
            'alamatbangunan' => 'Jl. Jendral Sudirman no. 119, Bangkle, Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '38.57',
            'luastotallantaidasargedung' => '38.57',
            'ketinggianbangunan' => '6',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,971045',
            'koordinatbangunan2' => '111,427791',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 97,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 97,
            'profiltanahbangunangedung_id' => 97,
            'klasifikasibangunangedung_id' => 97,
            'datastrukturbangunangedung_id' => 97,
            'statusbangunangedung_id' => 97,
            'luastanah' => null,
            'namabangunan' => 'Bangunan ex Kec. Blora',
            'alamatbangunan' => 'Jl. Jendral Sudirman no. 119, Bangkle, Blora',
            'jumlahlantai' => '2',
            'luaslantaidasar' => '309.9',
            'luastotallantaidasargedung' => '619',
            'ketinggianbangunan' => '9',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,971045',
            'koordinatbangunan2' => '111,427791',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 98,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 98,
            'profiltanahbangunangedung_id' => 98,
            'klasifikasibangunangedung_id' => 98,
            'datastrukturbangunangedung_id' => 98,
            'statusbangunangedung_id' => 98,
            'luastanah' => null,
            'namabangunan' => 'Pendopo ex Kec. Blora',
            'alamatbangunan' => 'Jl. Jendral Sudirman no. 119, Bangkle, Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '157.404',
            'luastotallantaidasargedung' => '157.404',
            'ketinggianbangunan' => '7',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,971045',
            'koordinatbangunan2' => '111,427791',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 99,
            'fungsibangunan_id' => 4,
            'kepemilikanbangunangedung_id' => 99,
            'profiltanahbangunangedung_id' => 99,
            'klasifikasibangunangedung_id' => 99,
            'datastrukturbangunangedung_id' => 99,
            'statusbangunangedung_id' => 99,
            'luastanah' => null,
            'namabangunan' => 'Rumah Dinas',
            'alamatbangunan' => 'Jl. Jendral Sudirman no. 119, Bangkle, Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '216.08',
            'luastotallantaidasargedung' => '216.08',
            'ketinggianbangunan' => '6',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,971045',
            'koordinatbangunan2' => '111,427791',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);

        databangunangedung::create([
            'id' => 100,
            'fungsibangunan_id' => 2,
            'kepemilikanbangunangedung_id' => 100,
            'profiltanahbangunangedung_id' => 100,
            'klasifikasibangunangedung_id' => 100,
            'datastrukturbangunangedung_id' => 100,
            'statusbangunangedung_id' => 100,
            'luastanah' => null,
            'namabangunan' => 'Mushola Kec. Blora',
            'alamatbangunan' => 'Jl. Blora - Randublatung KM. 2 Blora',
            'jumlahlantai' => '1',
            'luaslantaidasar' => '108',
            'luastotallantaidasargedung' => '109',
            'ketinggianbangunan' => '6',
            'luasbasement' => null,
            'koordinatbangunan' => '-6,989153',
            'koordinatbangunan2' => '111,4114',
            'tanggalmulaikonstruksi' => '(Tidak Mengetahui)',
        ]);


        datainstitusibangunangedung::create([
            'id'  => 1,
            'institusi'  => 'BADAN KEPEGAWAIAN DAERAH',
        ]);

        datainstitusibangunangedung::create([
            'id'  => 2,
            'institusi'  => 'BADAN PENYULUHAN PERTANIAN',
        ]);

        datainstitusibangunangedung::create([
            'id'  => 3,
            'institusi'  => 'BAPPEDA BLORA',
        ]);

        datainstitusibangunangedung::create([
            'id'  => 4,
            'institusi'  => 'BAPPEDA BLORA',
        ]);

        datainstitusibangunangedung::create([
            'id'  => 5,
            'institusi'  => 'DINAS DALDUK & KB',
        ]);

        datainstitusibangunangedung::create([
            'id'  => 6,
            'institusi'  => 'DINAS KESBANGPOL',
        ]);

        datainstitusibangunangedung::create([
            'id'  => 7,
            'institusi'  => 'DINAS KESEHATAN',
        ]);

        datainstitusibangunangedung::create([
            'id'  => 8,
            'institusi'  => 'DINAS KOMINFO',
        ]);

        datainstitusibangunangedung::create([
            'id'  => 9,
            'institusi'  => 'DINAS LINGKUNGAN HIDUP',
        ]);


        // -----------------------------------------------------------------
        // DATA KEPEMLIKAN BANGUNAN GEDUNG

        kepemilikanbangunangedung::create([
            'id' => 1,
            'datainstitusibangunangedung_id' => 1,
            'alamat' => 'Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)581284',
            'email' => 'bkd.blora@gmail.com',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0002',
        ]);


        kepemilikanbangunangedung::create([
            'id' => 2,
            'datainstitusibangunangedung_id' => 1,
            'alamat' => 'Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)581284',
            'email' => 'bkd.blora@gmail.com',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0003',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 3,
            'datainstitusibangunangedung_id' => 1,
            'alamat' => 'Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)581284',
            'email' => 'bkd.blora@gmail.com',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0004',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 4,
            'datainstitusibangunangedung_id' => 1,
            'alamat' => 'Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)581284',
            'email' => 'bkd.blora@gmail.com',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0005',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 5,
            'datainstitusibangunangedung_id' => 2,
            'alamat' => 'Ds. Karang Jati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)571287',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0001',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 6,
            'datainstitusibangunangedung_id' => 2,
            'alamat' => 'Ds. Balun, Kec. Cepu, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(Tidak ada)',
            'email' => 'bppkeccepu@gmail.co',
            'nousaha' => '(Tidak ada)',
            'nohdno' => '33.16.05.0043',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 7,
            'datainstitusibangunangedung_id' => 2,
            'alamat' => 'Ds. Balun, Kec. Cepu, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(Tidak ada)',
            'email' => 'bppkeccepu@gmail.co',
            'nousaha' => '(Tidak ada)',
            'nohdno' => '33.16.05.0044',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 8,
            'datainstitusibangunangedung_id' => 3,
            'alamat' => 'Jl. GOR No. 10 Blora, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296) 531827',
            'email' => 'bappedablora@gmail.com',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0165',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 9,
            'datainstitusibangunangedung_id' => 4,
            'alamat' => 'Jl. Gatot Subroto No.111, Blora',
            'no_telepon' => '531202',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0574',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 10,
            'datainstitusibangunangedung_id' => 4,
            'alamat' => 'Jl. Gatot Subroto No.111, Blora',
            'no_telepon' => '531202',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0573',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 11,
            'datainstitusibangunangedung_id' => 4,
            'alamat' => 'Jl. Gatot Subroto No.111, Blora',
            'no_telepon' => '531202',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0575',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 12,
            'datainstitusibangunangedung_id' => 5,
            'alamat' => 'Jl Dr. Soetomo No. 52, Blora',
            'no_telepon' => '0296531213',
            'email' => '(Tidak ada)',
            'nousaha' => '(Tidak ada)',
            'nohdno' => '33.16.05.0354',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 13,
            'datainstitusibangunangedung_id' => 6,
            'alamat' => 'Jl. KH. Ahmad Dahlan no. 27 Blora',
            'no_telepon' => '0296531070',
            'email' => 'kesbang.blora@gmail.com',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0510',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 14,
            'datainstitusibangunangedung_id' => 7,
            'alamat' => 'Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)531127',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0013',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 15,
            'datainstitusibangunangedung_id' => 7,
            'alamat' => 'Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)531127',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0006',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 16,
            'datainstitusibangunangedung_id' => 7,
            'alamat' => 'Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)531127',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0007',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 17,
            'datainstitusibangunangedung_id' => 7,
            'alamat' => 'Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)531127',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0008',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 18,
            'datainstitusibangunangedung_id' => 7,
            'alamat' => 'Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)531127',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0009',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 19,
            'datainstitusibangunangedung_id' => 7,
            'alamat' => 'Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)531127',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0010',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 20,
            'datainstitusibangunangedung_id' => 7,
            'alamat' => 'Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)531127',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0011',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 21,
            'datainstitusibangunangedung_id' => 7,
            'alamat' => 'Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)531127',
            'email' => '(tidak ada)',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0012',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 22,
            'datainstitusibangunangedung_id' => 8,
            'alamat' => 'Ds. Mlangsen, Kec.Blora, Kab. Blora, Jawa Tengah',
            'no_telepon' => '(0296)532038',
            'email' => 'dinkominfo@blorakab.go.id',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0034',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 23,
            'datainstitusibangunangedung_id' => 9,
            'alamat' => 'Kunden, Kec. Blora, Kab. Blora',
            'no_telepon' => '(0296) 5298523',
            'email' => 'dinasˍlh@blorakab.go.id',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0163',
        ]);

        kepemilikanbangunangedung::create([
            'id' => 24,
            'datainstitusibangunangedung_id' => 9,
            'alamat' => 'Kunden, Kec. Blora, Kab. Blora',
            'no_telepon' => '(0296) 5298523',
            'email' => 'dinasˍlh@blorakab.go.id',
            'nousaha' => '(tidak ada)',
            'nohdno' => '33.16.09.0164',
        ]);


        // -------------------------------------------------------------
        statushaktanahbangunangedung::create([
            'id' => 1,
            'status' => 'PEMKAB BLORA',
        ]);

        statushaktanahbangunangedung::create([
            'id' => 2,
            'status' => 'HAK PAKAI',
        ]);

        statushaktanahbangunangedung::create([
            'id' => 3,
            'status' => 'MILIK NEGARA',
        ]);

        statushaktanahbangunangedung::create([
            'id' => 4,
            'status' => '(TIDAK MENGETAHUI)',
        ]);

        statushaktanahbangunangedung::create([
            'id' => 5,
            'status' => 'PEMDA',
        ]);

        statushaktanahbangunangedung::create([
            'id' => 6,
            'status' => 'MILIK PEMKAB/PEMDA/NEGARA',
        ]);

// =================================================================
profiltanahbangunangedung::create([
    'id' => 1,
    'statushaktanahbangunangedung_id' => 1,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '00024',
    'alamat' => 'Jl. Reksodiputro No. 24, Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 2,
    'statushaktanahbangunangedung_id' => 1,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '00024',
    'alamat' => 'Jl. Reksodiputro No. 24, Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 3,
    'statushaktanahbangunangedung_id' => 1,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '00024',
    'alamat' => 'Jl. Reksodiputro No. 24, Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 4,
    'statushaktanahbangunangedung_id' => 1,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '00024',
    'alamat' => 'Jl. Reksodiputro No. 24, Ds. Mlangsa, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 5,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Sonorejo No. 17, Ds. Kunden, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 6,
    'statushaktanahbangunangedung_id' => 3,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Raya Cepu - Randubelatung km 1, Kec. Cepu. Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 7,
    'statushaktanahbangunangedung_id' => 3,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Raya Cepu - Randubelatung km 1, Kec. Cepu. Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 8,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. GOR No. 10 Blora, Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 9,
    'statushaktanahbangunangedung_id' => 1,
    'statuskepemilikan' => 'Pemkab Blora',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Gatot Subroto No.111, Blora',
]);

profiltanahbangunangedung::create([
    'id' => 10,
    'statushaktanahbangunangedung_id' => 1,
    'statuskepemilikan' => 'Pemkab Blora',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Gatot Subroto No.111, Blora',
]);


profiltanahbangunangedung::create([
    'id' => 11,
    'statushaktanahbangunangedung_id' => 1,
    'statuskepemilikan' => 'Pemkab Blora',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Kel. Karangjati',
]);

profiltanahbangunangedung::create([
    'id' => 12,
    'statushaktanahbangunangedung_id' => 4,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Ronggolawe No. 10 Cepu, Blora',
]);

profiltanahbangunangedung::create([
    'id' => 13,
    'statushaktanahbangunangedung_id' => 1,
    'statuskepemilikan' => 'Kesbangpol',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. KH. Ahmad Dahlan no. 27 Blora',
]);

profiltanahbangunangedung::create([
    'id' => 14,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Dr. Sutomo No.40, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 15,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Dr. Sutomo No.40, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
]);


profiltanahbangunangedung::create([
    'id' => 16,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Dr. Sutomo No.40, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 17,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Dr. Sutomo No.40, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 18,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Dr. Sutomo No.40, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 19,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Dr. Sutomo No.40, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 20,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Dr. Sutomo No.40, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
]);


profiltanahbangunangedung::create([
    'id' => 21,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Dr. Sutomo No.40, Ds. Tempelan, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 22,
    'statushaktanahbangunangedung_id' => 5,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Pemuda No. 46, Ds. Mlangsen, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 23,
    'statushaktanahbangunangedung_id' => 6,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Gunung Wilis No. 24, Kunden, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 24,
    'statushaktanahbangunangedung_id' => 6,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Gunung Wilis No. 24, Kunden, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 25,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Blora - Rembang KM 7, Ds. Sendangharja, Kec. Blora, Kab. Blora, Jawa Tengah',
]);


profiltanahbangunangedung::create([
    'id' => 26,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Blora - Rembang KM 7, Ds. Sendangharja, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 27,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Blora - Rembang KM 7, Ds. Sendangharja, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 28,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Blora - Rembang KM 7, Ds. Sendangharja, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 29,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '(Tidak Mengetahui)',
    'alamat' => 'Jl. Blora - Rembang KM 7, Ds. Sendangharja, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

profiltanahbangunangedung::create([
    'id' => 30,
    'statushaktanahbangunangedung_id' => 2,
    'statuskepemilikan' => '(Tidak Mengetahui)',
    'nobuktitanah' => '1112',
    'alamat' => 'Jl. Gor No. 8, Ds. Karangjati, Kec. Blora, Kab. Blora, Jawa Tengah',
]);

// =====================================

klasifikasibangunangedung::create([
    'id' => 1,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 2,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 3,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 4,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 5,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'SEDANG',
]);

klasifikasibangunangedung::create([
    'id' => 6,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 7,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 8,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 9,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 10,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'KHUSUS',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 11,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'KHUSUS',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 12,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'SEMI PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 13,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => null,
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 14,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 15,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 16,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 17,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 18,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 19,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 20,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);


klasifikasibangunangedung::create([
    'id' => 21,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 22,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 23,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 24,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 25,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 26,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 27,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 28,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 29,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 30,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);


klasifikasibangunangedung::create([
    'id' => 31,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 32,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 33,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 34,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 35,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 36,
    'tanggalselesai' => '2017-03-01',
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'SEMI PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 37,
    'tanggalselesai' => '2017-01-03',
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'SEMI PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 38,
    'tanggalselesai' => '2017-01-03',
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'SEMI PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 39,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 40,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);


klasifikasibangunangedung::create([
    'id' => 41,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 42,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 43,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 44,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 45,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 46,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 47,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 48,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 49,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 50,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);


klasifikasibangunangedung::create([
    'id' => 51,
    'tanggalselesai' => '2018-01-01',
    'tanggalrehab' => null,
    'kompleksitas' => 'KHUSUS',
    'tingkatpermanen' => 'SEMI PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 52,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 53,
    'tanggalselesai' => '2022-01-01',
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 54,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 55,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 56,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 57,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 58,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 59,
    'tanggalselesai' => '1990-01-01',
    'tanggalrehab' => '2000-01-01',
    'kompleksitas' => 'KHUSUS',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 60,
    'tanggalselesai' => '1971-01-01',
    'tanggalrehab' => '2000-01-01',
    'kompleksitas' => 'KHUSUS',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);


klasifikasibangunangedung::create([
    'id' => 61,
    'tanggalselesai' => '1949-01-01',
    'tanggalrehab' => '2018-01-01',
    'kompleksitas' => 'KHUSUS',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 62,
    'tanggalselesai' => '2017-01-01',
    'tanggalrehab' => null,
    'kompleksitas' => 'KHUSUS',
    'tingkatpermanen' => 'SEMI PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 63,
    'tanggalselesai' => '2017-01-01',
    'tanggalrehab' => null,
    'kompleksitas' => 'KHUSUS',
    'tingkatpermanen' => 'SEMI PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 64,
    'tanggalselesai' => '2017-01-01',
    'tanggalrehab' => null,
    'kompleksitas' => 'KHUSUS',
    'tingkatpermanen' => 'SEMI PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 65,
    'tanggalselesai' => '2017-01-01',
    'tanggalrehab' => null,
    'kompleksitas' => 'KHUSUS',
    'tingkatpermanen' => 'SEMI PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 66,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 67,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 68,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 69,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 70,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);


klasifikasibangunangedung::create([
    'id' => 71,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 72,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 73,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 74,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 75,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 76,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 77,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 78,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 79,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 80,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);


klasifikasibangunangedung::create([
    'id' => 81,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 82,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 83,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 84,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 85,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 86,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 87,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 88,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 89,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 90,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);


klasifikasibangunangedung::create([
    'id' => 91,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 92,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 93,
    'tanggalselesai' => '2016-01-01',
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => 'SEMI PERMANEN',
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 94,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 95,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 96,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 97,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'KHUSUS',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 98,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 99,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

klasifikasibangunangedung::create([
    'id' => 100,
    'tanggalselesai' => null,
    'tanggalrehab' => null,
    'kompleksitas' => 'SEDERHANA',
    'tingkatpermanen' => null,
    'resikokebakaran' => 'RENDAH',
]);

// ============================
datastrukturbangunangedung::create([
    'id' => 1,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 2,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 3,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 4,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 5,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 6,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'PADAT',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 7,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'PADAT',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 8,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 9,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 10,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 11,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 12,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'PADAT',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 13,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 14,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 15,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 16,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 17,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 18,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 19,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 20,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);


datastrukturbangunangedung::create([
    'id' => 21,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 22,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 23,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 24,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 25,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 26,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 27,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 28,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 29,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 30,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);


datastrukturbangunangedung::create([
    'id' => 31,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 32,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BAJA',
]);

datastrukturbangunangedung::create([
    'id' => 33,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BAJA',
]);

datastrukturbangunangedung::create([
    'id' => 34,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 35,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 36,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 37,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 38,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 39,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 40,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);


datastrukturbangunangedung::create([
    'id' => 41,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 42,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 43,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 44,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 45,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 46,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 47,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 48,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 49,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 50,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);


datastrukturbangunangedung::create([
    'id' => 51,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DALAM',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 52,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 53,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 54,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 55,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DALAM',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 56,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 57,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 58,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DALAM',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 59,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 60,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);


datastrukturbangunangedung::create([
    'id' => 61,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 62,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 63,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 64,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 65,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 66,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 67,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 68,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 69,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 70,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);


datastrukturbangunangedung::create([
    'id' => 71,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 72,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 73,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 74,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 75,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 76,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 77,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 78,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 79,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 80,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);


datastrukturbangunangedung::create([
    'id' => 81,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 82,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 83,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 84,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 85,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 86,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 87,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 88,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 89,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 90,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);


datastrukturbangunangedung::create([
    'id' => 91,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 92,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 93,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 94,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 95,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'BETON',
]);

datastrukturbangunangedung::create([
    'id' => 96,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 97,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 98,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 99,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

datastrukturbangunangedung::create([
    'id' => 100,
    'zona' => 'ZONA 3',
    'jenis_tanah' => 'SEDANG',
    'tipe_fondasi' => 'FONDASI DANGKAL',
    'bahan_fondasi' => 'KAYU',
]);

// DATA STATUS BANGUNAN GEDUNG ---------------------------
statusbangunangedung::create([
    'id' => 1,
    'strukturatas' => 'BAJA',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0002',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 2,
    'strukturatas' => 'BAJA',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0003',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 3,
    'strukturatas' => 'BAJA',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0004',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 4,
    'strukturatas' => 'BETON',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0005',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 5,
    'strukturatas' => 'KAYU',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0001',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);


statusbangunangedung::create([
    'id' => 6,
    'strukturatas' => 'KAYU',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.05.0043',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 7,
    'strukturatas' => 'KAYU',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.05.0044',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 8,
    'strukturatas' => 'KAYU',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0165',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 9,
    'strukturatas' => 'KAYU',
    'rangkaatap' => 'BAIK',
    'balok' => 'BAIK',
    'kolom' => 'BAIK',
    'pondasi' => 'BAIK',
    'dinding' => 'BAIK',
    'genteng' => 'BAIK',
    'plafon' => 'T1',
    'lantai' => 'BAIK',
    'pintu' => 'BAIK',
    'jendela' => 'BAIK',
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0008',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 10,
    'strukturatas' => 'KAYU',
    'rangkaatap' => 'BAIK',
    'balok' => 'BAIK',
    'kolom' => 'BAIK',
    'pondasi' => 'BAIK',
    'dinding' => 'BAIK',
    'genteng' => 'BAIK',
    'plafon' => 'BAIK',
    'lantai' => 'BAIK',
    'pintu' => 'BAIK',
    'jendela' => 'BAIK',
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0009',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);


statusbangunangedung::create([
    'id' => 11,
    'strukturatas' => 'KAYU',
    'rangkaatap' => 'BAIK',
    'balok' => 'BAIK',
    'kolom' => 'BAIK',
    'pondasi' => 'BAIK',
    'dinding' => 'BAIK',
    'genteng' => 'BAIK',
    'plafon' => 'BAIK',
    'lantai' => 'BAIK',
    'pintu' => 'BAIK',
    'jendela' => 'BAIK',
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0010',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 12,
    'strukturatas' => 'KAYU',
    'rangkaatap' => 'BAIK',
    'balok' => 'BAIK',
    'kolom' => 'BAIK',
    'pondasi' => 'BAIK',
    'dinding' => 'BAIK',
    'genteng' => 'BAIK',
    'plafon' => 'BAIK',
    'lantai' => 'BAIK',
    'pintu' => 'BAIK',
    'jendela' => 'BAIK',
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => null,
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 13,
    'strukturatas' => 'KAYU',
    'rangkaatap' => 'BAIK',
    'balok' => 'BAIK',
    'kolom' => 'BAIK',
    'pondasi' => 'BAIK',
    'dinding' => 'BAIK',
    'genteng' => 'T1',
    'plafon' => 'T2',
    'lantai' => 'T2',
    'pintu' => 'T1',
    'jendela' => 'BAIK',
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0012',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 14,
    'strukturatas' => 'KAYU',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0013',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 15,
    'strukturatas' => 'KAYU',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0006',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);


statusbangunangedung::create([
    'id' => 16,
    'strukturatas' => 'KAYU',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0007',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 17,
    'strukturatas' => 'KAYU',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0008',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 18,
    'strukturatas' => 'KAYU',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0009',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 19,
    'strukturatas' => 'KAYU',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0010',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);

statusbangunangedung::create([
    'id' => 20,
    'strukturatas' => 'KAYU',
    'rangkaatap' => null,
    'balok' => null,
    'kolom' => null,
    'pondasi' => null,
    'dinding' => null,
    'genteng' => null,
    'plafon' => null,
    'lantai' => null,
    'pintu' => null,
    'jendela' => null,
    'dokumenteknistanah' => 'TIDAK MENGETAHUI',
    'nohdno' => '33.16.09.0011',
    'noimb' => 'TIDAK MENGETAHUI',
    'noslf' => 'TIDAK MENGETAHUI',
]);


//======================== ===================================================================================
// DAFTAR KECAMATAN BLORA
kecamatanblora::create([
    'id' => '1',
    'kelurahandesa_id' => 1,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'BANJAREJO 58253',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '2',
    'kelurahandesa_id' => 2,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'BLORA (BLORA KOTA) 58211 - 58219',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '3',
    'kelurahandesa_id' => 3,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'BOGOREJO 58262',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '4',
    'kelurahandesa_id' => 4,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'CEPU 58311',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '5',
    'kelurahandesa_id' => 5,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'JAPAH 58257',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '6',
    'kelurahandesa_id' => 6,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'JATI 58384',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '7',
    'kelurahandesa_id' => 7,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'JEPON 58261',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '8',
    'kelurahandesa_id' => 8,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'JIKEN 58372',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '9',
    'kelurahandesa_id' => 9,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'KEDUNGTUBAN 58381',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '10',
    'kelurahandesa_id' => 10,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'KRADENAN 58383',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '11',
    'kelurahandesa_id' => 11,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'KUNDURAN 58255',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '12',
    'kelurahandesa_id' => 12,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'NGAWEN 58254',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '13',
    'kelurahandesa_id' => 13,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'RANDUBLATUNG 58382',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '14',
    'kelurahandesa_id' => 14,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'SAMBONG 58371',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '15',
    'kelurahandesa_id' => 15,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'TODANAN 58256',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

kecamatanblora::create([
    'id' => '16',
    'kelurahandesa_id' => 16,          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
    'kecamatanblora' => 'TUNJUNGAN 58252',          // Menghilangkan 'Rp' dan menyimpan sebagai angka decimal
]);

// =====================================================
rencanagsbblora::create([
    'id' => '1',
    'ruasjalan' => 'KUNDURAN - TODANAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '2',
    'ruasjalan' => 'KEDUNGWARU - BALONG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '3',
    'ruasjalan' => 'KUNDURAN - DOPLANG',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '4',
    'ruasjalan' => 'NGILEN - PLOSOREJO - CUNGKUP',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '5',
    'ruasjalan' => 'NGRONGGAH - BATAS KAB. PURWODADI',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '6',
    'ruasjalan' => 'BOTORECO - SEMPU',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '7',
    'ruasjalan' => 'NGRONGGAH - BULOH - KEMIRI',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '8',
    'ruasjalan' => 'JAGONG - KARANGGENENG - SRIGADING',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '9',
    'ruasjalan' => 'MURAHARJO - JETAK - KARANGGENENG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '10',
    'ruasjalan' => 'MURAHARJO - KARANGREJO - KUNDURAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '11',
    'ruasjalan' => 'GOATERAWANG - PELEMSENGIR',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '12',
    'ruasjalan' => 'KETILENG - TODANAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '13',
    'ruasjalan' => 'NGUMBUL - KARANGANYAR',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '14',
    'ruasjalan' => 'NGUMBUL - SONOKULON',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '15',
    'ruasjalan' => 'TODANAN - SENDANG - KACANGAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '16',
    'ruasjalan' => 'DALANGAN - BEDINGIN - KEDUNGBACIN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '17',
    'ruasjalan' => 'KEDUNGBACIN - BATAS KAB. PATI',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '18',
    'ruasjalan' => 'KETILENG - SAMBENG - PELEMSENGIR',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '19',
    'ruasjalan' => 'JAPAH - KALINANAS - KEDUNGBACIN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '20',
    'ruasjalan' => 'BOGEM - SUMBEREJO - NGIYONO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 21
rencanagsbblora::create([
    'id' => '21',
    'ruasjalan' => 'KALINANAS - BATAS KAB. REMBANG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 22
rencanagsbblora::create([
    'id' => '22',
    'ruasjalan' => 'KALINANAS - BATAS KAB. PATI',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 23
rencanagsbblora::create([
    'id' => '23',
    'ruasjalan' => 'DOLOGAN - BEDINGIN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 24
rencanagsbblora::create([
    'id' => '24',
    'ruasjalan' => 'JAPAH - BRADAG',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 25
rencanagsbblora::create([
    'id' => '25',
    'ruasjalan' => 'JAPAH - TUNJUNGAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 26
rencanagsbblora::create([
    'id' => '26',
    'ruasjalan' => 'NGRAMBITAN - PENGKOLREJO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 27
rencanagsbblora::create([
    'id' => '27',
    'ruasjalan' => 'TREMBULREJO - ROWOBUNGKUL - SONOKIDUL',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 28
rencanagsbblora::create([
    'id' => '28',
    'ruasjalan' => 'NGAWEN - SEMAWUR - SRIGADING',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 29
rencanagsbblora::create([
    'id' => '29',
    'ruasjalan' => 'SEMAWUR - BRADAG',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 30
rencanagsbblora::create([
    'id' => '30',
    'ruasjalan' => 'BRADAG - KROCOK - SRIGADING',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 31
rencanagsbblora::create([
    'id' => '31',
    'ruasjalan' => 'NGAWEN - KARANGTALUN - BANJAREJO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 32
rencanagsbblora::create([
    'id' => '32',
    'ruasjalan' => 'NGAWEN - GOTPUTUK - TENGGER',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 33
rencanagsbblora::create([
    'id' => '33',
    'ruasjalan' => 'SARIMULYO - PENGKOLREJO - WOTBAKAH',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 34
rencanagsbblora::create([
    'id' => '34',
    'ruasjalan' => 'SAMBONGREJO - BOGOWANTI',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 35
rencanagsbblora::create([
    'id' => '35',
    'ruasjalan' => 'JALAN SAWAHAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 36
rencanagsbblora::create([
    'id' => '36',
    'ruasjalan' => 'BANJAREJO - SAMBONGANYAR - ROWOBUNGKUL',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 37
rencanagsbblora::create([
    'id' => '37',
    'ruasjalan' => 'BANJAREJO - BALONGSARI - MOJOWETAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 38
rencanagsbblora::create([
    'id' => '38',
    'ruasjalan' => 'BANJAREJO - SENDANGAGUNG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 39
rencanagsbblora::create([
    'id' => '39',
    'ruasjalan' => 'MOJOWETAN - SIDOMULYO - LEMAHPUTIH',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 40
rencanagsbblora::create([
    'id' => '40',
    'ruasjalan' => 'SUMENGKO - SUMBERAGUNG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 41
rencanagsbblora::create([
    'id' => '41',
    'ruasjalan' => 'SENDANGWUNGU - BALONGREJO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 42
rencanagsbblora::create([
    'id' => '42',
    'ruasjalan' => 'POJOK - PLOSOREJO - SENDANGWUNGU',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 43
rencanagsbblora::create([
    'id' => '43',
    'ruasjalan' => 'PLOSOREJO - SEMBONGIN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 44
rencanagsbblora::create([
    'id' => '44',
    'ruasjalan' => 'KEMBANG - PLOSOREJO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 45
rencanagsbblora::create([
    'id' => '45',
    'ruasjalan' => 'JATISARI - JATIKLAMPOK',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 46
rencanagsbblora::create([
    'id' => '46',
    'ruasjalan' => 'TEMANJANG - JATIKLAMPOK',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 47
rencanagsbblora::create([
    'id' => '47',
    'ruasjalan' => 'TAWANGREJO - KARANGTALUN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 48
rencanagsbblora::create([
    'id' => '48',
    'ruasjalan' => 'TAMBAHREJO - KALANGAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 49
rencanagsbblora::create([
    'id' => '49',
    'ruasjalan' => 'MAGUAN - TUNJUNGAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 50
rencanagsbblora::create([
    'id' => '50',
    'ruasjalan' => 'ADIREJO - SEMBUNGIN - KARANGTALUN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 51
rencanagsbblora::create([
    'id' => '51',
    'ruasjalan' => 'KALANGAN - SUKOREJO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 52
rencanagsbblora::create([
    'id' => '52',
    'ruasjalan' => 'KESER - NGLANGITAN - TUNJUNGAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 53
rencanagsbblora::create([
    'id' => '53',
    'ruasjalan' => 'KESER - PURWOSARI',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 54
rencanagsbblora::create([
    'id' => '54',
    'ruasjalan' => 'SESO - SOKO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 55
rencanagsbblora::create([
    'id' => '55',
    'ruasjalan' => 'SOKO - BATAS KAB. REMBANG',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 56
rencanagsbblora::create([
    'id' => '56',
    'ruasjalan' => 'PULEDAGEL - KARANG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 57
rencanagsbblora::create([
    'id' => '57',
    'ruasjalan' => 'BACEM - KARANG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 58
rencanagsbblora::create([
    'id' => '58',
    'ruasjalan' => 'SOKO - KARANG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 59
rencanagsbblora::create([
    'id' => '59',
    'ruasjalan' => 'SESO - SUMURBOTO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 60
rencanagsbblora::create([
    'id' => '60',
    'ruasjalan' => 'JEPON - BRUMBUNG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 61
rencanagsbblora::create([
    'id' => '61',
    'ruasjalan' => 'JEPON - BOGOREJO - BATAS KAB. TUBAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 62
rencanagsbblora::create([
    'id' => '62',
    'ruasjalan' => 'KEMLOKO - WUNI',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 63
rencanagsbblora::create([
    'id' => '63',
    'ruasjalan' => 'JEPON - TURIREJO - BANGSRI',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 64
rencanagsbblora::create([
    'id' => '64',
    'ruasjalan' => 'TURIREJO - PALON - NGLOBO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 65
rencanagsbblora::create([
    'id' => '65',
    'ruasjalan' => 'TURIREJO - SUMURBOTO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 66
rencanagsbblora::create([
    'id' => '66',
    'ruasjalan' => 'TEMPEL - SINGONEGORO - KETRINGAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

// Record 67
rencanagsbblora::create([
    'id' => '67',
    'ruasjalan' => 'TEMPELEMAHBANG - PRANTAAN - BANGOWAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 68
rencanagsbblora::create([
    'id' => '68',
    'ruasjalan' => 'KARANG - NGLENGKIR',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 69
rencanagsbblora::create([
    'id' => '69',
    'ruasjalan' => 'NGLENGKIR - TEMPUREJO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

// Record 70
rencanagsbblora::create([
    'id' => '70',
    'ruasjalan' => 'BOGOREJO - JERUK - KARANG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '71',
    'ruasjalan' => 'BOGOREJO - SINGONEGORO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '72',
    'ruasjalan' => 'BOGOREJO - KETRINGAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '73',
    'ruasjalan' => 'GAYAM - GANDU - BATAS KAB. REMBANG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '74',
    'ruasjalan' => 'DONO - JURANGJERO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '75',
    'ruasjalan' => 'SENDANGREJO - TAHUNAN - BATAS KAB. REMBANG',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '76',
    'ruasjalan' => 'GENJAHAN - TURIREJO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '77',
    'ruasjalan' => 'JIKEN - GENJAHAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '78',
    'ruasjalan' => 'CABAK - NGLOBO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '79',
    'ruasjalan' => 'NGLOBO - GUBUK PAYUNG',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '80',
    'ruasjalan' => 'CABAK - BLEBOH - BATAS KAB. BOJONEGORO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);


rencanagsbblora::create([
    'id' => '81',
    'ruasjalan' => 'BLEBOH - JANJANG - KATESAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '82',
    'ruasjalan' => 'NGAWENAN - PASARSORE - GUBUK PAYUNG',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '83',
    'ruasjalan' => 'POJOKWATU - JENU',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '84',
    'ruasjalan' => 'SAMBONG - NGROTO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '85',
    'ruasjalan' => 'KENDILAN - JENU - SAMBONGREJO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '86',
    'ruasjalan' => 'SAMBONG - LEDOK',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '87',
    'ruasjalan' => 'LEDOK - GIYANTI',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '88',
    'ruasjalan' => 'NGRAHO - KETUWAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '89',
    'ruasjalan' => 'SIDOREJO - KENONGOGONG - KLAGEN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '90',
    'ruasjalan' => 'KETUWAN - PANOLAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '91',
    'ruasjalan' => 'KETUWAN - GONDEL - MOJOREMBUN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '92',
    'ruasjalan' => 'BAJO - SUGIHWARAS - CABEAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '93',
    'ruasjalan' => 'KEDUNGTUBAN - SOGO - GONDEL',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '94',
    'ruasjalan' => 'KEDUNGTUBAN - GALUK',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '95',
    'ruasjalan' => 'GALUK - BLUNGUN - GUBUK PAYUNG',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '96',
    'ruasjalan' => 'GALUK - TEMENGENG',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '97',
    'ruasjalan' => 'WADO - TANDURAN - KEMANTREN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '98',
    'ruasjalan' => 'MENDEN - KETUWAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '99',
    'ruasjalan' => 'MEDALEM - BATAS KAB. BOJONEGORO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '100',
    'ruasjalan' => 'MENDEN - MEGERI',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);


rencanagsbblora::create([
    'id' => '101',
    'ruasjalan' => 'GETAS - GEMPOL - BANGKLEYAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '102',
    'ruasjalan' => 'PETING - SUMBER - MENDEN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '103',
    'ruasjalan' => 'MEGERI - SETREN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '104',
    'ruasjalan' => 'GETAS - NGLEBAK',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '105',
    'ruasjalan' => 'RANDUBLATUNG - MENDEN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '106',
    'ruasjalan' => 'TEMULUS - SUMBER',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '107',
    'ruasjalan' => 'KEDIREN - SUMBER',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '108',
    'ruasjalan' => 'RANDUBLATUNG - GETAS - BATAS KAB. NGAWI',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '109',
    'ruasjalan' => 'BALONG - KEPOH - BODEH',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '110',
    'ruasjalan' => 'WULUNG - KLATAK',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);


rencanagsbblora::create([
    'id' => '111',
    'ruasjalan' => 'KADENGAN - TANGGEL',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '112',
    'ruasjalan' => 'PILANG - BULAKAN - TEMULUS',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '113',
    'ruasjalan' => 'WULUNG - KEDUNGJAMBU',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '114',
    'ruasjalan' => 'KALISARI - KALIWADER - TALKIDANG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '115',
    'ruasjalan' => 'DOPLANG - JATI - BANGKLEYAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '116',
    'ruasjalan' => 'KARANGMOJO - PELEM - JATI',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '117',
    'ruasjalan' => 'JATI - SINGGET',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '118',
    'ruasjalan' => 'GABUSAN - BATAS KAB. GROBOGAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '119',
    'ruasjalan' => 'JL. MISTER ISKANDAR',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '120',
    'ruasjalan' => 'BLORA - RANDUBLATUNG',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);


rencanagsbblora::create([
    'id' => '121',
    'ruasjalan' => 'KALIWANGAN - PAKIS',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.5,
]);

rencanagsbblora::create([
    'id' => '122',
    'ruasjalan' => 'PAKIS - BANGSRI',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '123',
    'ruasjalan' => 'MLANGSEN - BULUROTO - SENDANGWUNGU',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '124',
    'ruasjalan' => 'KAMOLAN - BANJAREJO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '125',
    'ruasjalan' => 'BADONG - KENDURUHAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '126',
    'ruasjalan' => 'BANGKLE - PELEM - KAMOLAN',
    'jenisjalan' => 'Jalan Arteri Sekunder',
    'gsb' => 20.5,
]);

rencanagsbblora::create([
    'id' => '127',
    'ruasjalan' => 'PELEM - PURWOREJO - BANGSRI',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '128',
    'ruasjalan' => 'PELEM - NGAMPON - JEPANGREJO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '129',
    'ruasjalan' => 'NGAMPON - JOMBLANG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '130',
    'ruasjalan' => 'GLAGAHAN - NGAMPON',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);


rencanagsbblora::create([
    'id' => '131',
    'ruasjalan' => 'KAMOLAN - JEPANGREJO - BADONG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '132',
    'ruasjalan' => 'KARANGJATI - BANGKLE',
    'jenisjalan' => 'Jalan Arteri Sekunder',
    'gsb' => 20.50,
]);

rencanagsbblora::create([
    'id' => '133',
    'ruasjalan' => 'BANGKLE - BALONG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '134',
    'ruasjalan' => 'NGLAWIYAN - BALONG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '135',
    'ruasjalan' => 'KARANGJATI - TEMPUREJO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '136',
    'ruasjalan' => 'TAMBAKSARI - PULEDAGEL',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '137',
    'ruasjalan' => 'PATALAN - TEMPURAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '138',
    'ruasjalan' => 'PATALAN - TEMPUREJO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '139',
    'ruasjalan' => 'TAMBAKSARI - BELIK',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '140',
    'ruasjalan' => 'MEDANG - JATIREJO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '141',
    'ruasjalan' => 'MEDANG - NGLANGITAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '142',
    'ruasjalan' => 'NGAMPEL - PLANTUNGAN - NGADIPURWO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '143',
    'ruasjalan' => 'KARANGJATI - TEMUREJO - TEGALGUNUNG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '144',
    'ruasjalan' => 'BLORA - NGLANGITAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.5,
]);

rencanagsbblora::create([
    'id' => '145',
    'ruasjalan' => 'TEMUREJO - GEMPOLREJO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '146',
    'ruasjalan' => 'TAMANREJO - KUNDEN',
    'jenisjalan' => 'Jalan Arteri Sekunder',
    'gsb' => 20.5,
]);

rencanagsbblora::create([
    'id' => '147',
    'ruasjalan' => 'KUNDEN - SONOREJO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '148',
    'ruasjalan' => 'KAJANGAN - GROWONG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '149',
    'ruasjalan' => 'JL. ALUN - ALUN',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.5,
]);

rencanagsbblora::create([
    'id' => '150',
    'ruasjalan' => 'JL. LAPANGAN KRIDOSONO',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.5,
]);



rencanagsbblora::create([
    'id' => '151',
    'ruasjalan' => 'JL. KEDUNGJENAR - BERAN',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '152',
    'ruasjalan' => 'JL. BERAN - GABUS',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '153',
    'ruasjalan' => 'JL. GATOT SUBROTO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '154',
    'ruasjalan' => 'JL. AGIL KUSUMADYA',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '155',
    'ruasjalan' => 'JL. TAMAN MAKAM PAHLAWAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '156',
    'ruasjalan' => 'JL. HALMAHERA',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '157',
    'ruasjalan' => 'JL. NUSANTARA',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '158',
    'ruasjalan' => 'JL K.H. AHMAD DAHKLAN',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '159',
    'ruasjalan' => 'JL. PEMUDA',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '160',
    'ruasjalan' => 'JL. SUMODARSONO',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);


rencanagsbblora::create([
    'id' => '161',
    'ruasjalan' => 'JL. TENTARA PELAJAR',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '162',
    'ruasjalan' => 'JL. GUNUNG - SINDORO',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '163',
    'ruasjalan' => 'JL. ARUMDALU',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '164',
    'ruasjalan' => 'JL. GUNUNG SUMBING',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '165',
    'ruasjalan' => 'JL. GUNUNG LAWU',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '166',
    'ruasjalan' => 'JL. GUNUNG WILIS',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '167',
    'ruasjalan' => 'JL.GOR',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '168',
    'ruasjalan' => 'JL GUNUNG SLAMET',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '169',
    'ruasjalan' => 'JL. SUDARMAN',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '170',
    'ruasjalan' => 'JL. KOLONEL SUNANDAR',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);


rencanagsbblora::create([
    'id' => '171',
    'ruasjalan' => 'JL. GUNANDAR',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '172',
    'ruasjalan' => 'JL. REKSODIPUTRO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '173',
    'ruasjalan' => 'JL. MALUKU',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '174',
    'ruasjalan' => 'JL. SUMBAWA',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '175',
    'ruasjalan' => 'JL. R.A KARTINI',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '176',
    'ruasjalan' => 'JL. ABU UMAR',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '177',
    'ruasjalan' => 'JL. DR SUTOMO',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '178',
    'ruasjalan' => 'JL. BHAYANGKARA',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '179',
    'ruasjalan' => 'JL. RAJAWALI',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '180',
    'ruasjalan' => 'JL. KENANGA',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);


rencanagsbblora::create([
    'id' => '181',
    'ruasjalan' => 'JL. RONGGOLAWE',
    'jenisjalan' => 'Jalan Arteri Sekunder',
    'gsb' => 20.50,
]);

rencanagsbblora::create([
    'id' => '182',
    'ruasjalan' => 'JL. RONGGOLAWE II',
    'jenisjalan' => 'Jalan Arteri Sekunder',
    'gsb' => 20.50,
]);

rencanagsbblora::create([
    'id' => '183',
    'ruasjalan' => 'BALUN - TAMBAKROMO',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '184',
    'ruasjalan' => 'TAMBAKROMO - KENTONG',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '185',
    'ruasjalan' => 'MULYOREJO - NGLORAM',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '186',
    'ruasjalan' => 'NGLORAM - SIDOREJO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '187',
    'ruasjalan' => 'NGLORAM - JIPANG - JUDAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '188',
    'ruasjalan' => 'KENTONG - CABEAN',
    'jenisjalan' => 'Jalan Lokal Primer',
    'gsb' => 10.75,
]);

rencanagsbblora::create([
    'id' => '189',
    'ruasjalan' => 'BALUN - NGLANJUK - KAPUAN',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '190',
    'ruasjalan' => 'NGROTO - GIYANTI - BATAS KAB. BOJONEGORO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);


rencanagsbblora::create([
    'id' => '191',
    'ruasjalan' => 'JL. GAJAHMADA',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '192',
    'ruasjalan' => 'JL. SOROGO',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '193',
    'ruasjalan' => 'JL. GIYANTI',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '194',
    'ruasjalan' => 'JL. NGARENG',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '195',
    'ruasjalan' => 'JL. PASAR',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '196',
    'ruasjalan' => 'JL. STASIUN KOTA',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '197',
    'ruasjalan' => 'JL. PAHLAWAN',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '198',
    'ruasjalan' => 'JL. DIPONEGORO',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '199',
    'ruasjalan' => 'JL. DIPONEGORO I',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '200',
    'ruasjalan' => 'JL. DIPONEGORO II',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);


rencanagsbblora::create([
    'id' => '201',
    'ruasjalan' => 'JL. DIPONEGORO III',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '202',
    'ruasjalan' => 'JL. PRAMUKA',
    'jenisjalan' => 'Jalan Arteri Sekunder',
    'gsb' => 20.50,
]);

rencanagsbblora::create([
    'id' => '203',
    'ruasjalan' => 'JL. HAYAMWURUK',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '204',
    'ruasjalan' => 'JL. TUK BUNTUNG',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '205',
    'ruasjalan' => 'JL. TAMAN BAHAGIA',
    'jenisjalan' => 'Jalan Kolektor Sekunder',
    'gsb' => 9.50,
]);

rencanagsbblora::create([
    'id' => '206',
    'ruasjalan' => 'NGLEBOK - JAMBE - TAMBAKROMO',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '207',
    'ruasjalan' => 'JALAN LINGKUNGAN PRIMER',
    'jenisjalan' => 'Jalan Lingkungan Primer',
    'gsb' => 9.00,
]);

rencanagsbblora::create([
    'id' => '208',
    'ruasjalan' => 'JALAN LINGKUNGAN SEKUNDER',
    'jenisjalan' => 'Jalan Lingkungan Sekunder',
    'gsb' => 4.00,
]);

rencanagsbblora::create([
    'id' => '209',
    'ruasjalan' => 'WIROSARI - KUNDURAN (JL. PROVINSI)',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '210',
    'ruasjalan' => 'KUNDURAN - NGAWEN - BLORA (JL. PROVINSI)',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);


rencanagsbblora::create([
    'id' => '211',
    'ruasjalan' => 'WIROSARI - SULURSARI - SINGGET/BATAS KAB. BLORA (JL. PROVINSI)',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '212',
    'ruasjalan' => 'SINGGET/BATAS KAB. GROBOGAN - DOPLANG - CEPU (JL. PROVINSI)',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '213',
    'ruasjalan' => 'JUWANA - TODANAN/BATAS KAB. BLORA (JL. PROVINSI)',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '214',
    'ruasjalan' => 'TODANAN - NGAWEN (JL. PROVINSI)',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '215',
    'ruasjalan' => 'BTS. KOTA REMBANG - BTS. KAB. BLORA/REMBANG',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '216',
    'ruasjalan' => 'BTS. KAB. BLORA/REMBANG - BTS. KOTA BLORA',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '217',
    'ruasjalan' => 'JLN. A. YANI (BLORA)',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '218',
    'ruasjalan' => 'JLN. JEND. SUDIRMAN (BLORA)',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '219',
    'ruasjalan' => 'BTS. KOTA BLORA - CEPU',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

rencanagsbblora::create([
    'id' => '220',
    'ruasjalan' => 'CEPU - BTS. PROV. JAWA TIMUR',
    'jenisjalan' => 'Jalan Kolektor Primer',
    'gsb' => 14.50,
]);

// ===========================================
kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Bangkleyan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Gempol',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Kepoh',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Pelem',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Jegong',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Jati',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Singget',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Gabusan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Doplang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Randulawang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Tobo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 6,
    'desa' => 'Pengkoljagong',
]);



kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Tlogotuwung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Bodeh',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Gembyungan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Sambongwangan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Pilang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Temulus',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Sumberejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Kutukan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Kediren',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Kadengan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Bekutuk',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Plosorejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Jeruk',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Tanggel',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Randublatung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Wulung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Kalisari',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 13,
    'desa' => 'Ngliron',
]);


kelurahandesa::create([
    'kecamatanblora_id' => 10,
    'desa' => 'Megeri',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 10,
    'desa' => 'Nglebak',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 10,
    'desa' => 'Getas',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 10,
    'desa' => 'Nginggil',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 10,
    'desa' => 'Ngrawoh',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 10,
    'desa' => 'Mendenrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 10,
    'desa' => 'Sumber',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 10,
    'desa' => 'Mojorembun',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 10,
    'desa' => 'Nglungger',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 10,
    'desa' => 'Medalem',
]);


kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Gondel',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Ketuwan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Jimbung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Panolan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Klagen',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Kemantren',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Sidorejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Wado',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Pulo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Tanjung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Sogo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Bajo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Nglandeyan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Kalen',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Ngraho',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Kedungtuban',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 9,
    'desa' => 'Galuk',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Gadon',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Ngloram',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Cabean',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Kapuan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Jipang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Getas',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Sumberpitu',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Kentong',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Mernung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Mulyorejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Nglanjuk',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Tambakromo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Balun',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Cepu',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Ngelo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Karangboyo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 4,
    'desa' => 'Ngroto',
]);



kelurahandesa::create([
    'kecamatanblora_id' => 14,
    'desa' => 'Temengeng',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 14,
    'desa' => 'Sambongrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 14,
    'desa' => 'Gadu',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 14,
    'desa' => 'Sambong',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 14,
    'desa' => 'Pojokwatu',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 14,
    'desa' => 'Gagakan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 14,
    'desa' => 'Biting',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 14,
    'desa' => 'Brabowan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 14,
    'desa' => 'Ledok',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 14,
    'desa' => 'Giyanti',
]);


kelurahandesa::create([
    'kecamatanblora_id' => 8,
    'desa' => 'Nglobo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 8,
    'desa' => 'Cabak',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 8,
    'desa' => 'Nglebur',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 8,
    'desa' => 'Janjang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 8,
    'desa' => 'Bleboh',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 8,
    'desa' => 'Ketringan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 8,
    'desa' => 'Singonegoro',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 8,
    'desa' => 'Jiken',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 8,
    'desa' => 'Genjahan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 8,
    'desa' => 'Jiworejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 8,
    'desa' => 'Bangowan',
]);



kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Jepon',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Blungun',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Semanggi',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Ngampon',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Jomblang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Palon',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Bangsri',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Sumurboto',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Brumbung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Turirejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Semampir',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Kemiri',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Tempellemahbang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Seso',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Balong',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Geneng',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Nglarohgunung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Kawengan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Gersi',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Gedangdowo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Puledagel',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Bacem',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Jatirejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Soko',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 7,
    'desa' => 'Waru',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Jepangrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Kamolan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Pelem',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Purworejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Andongrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Jejeruk',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Temurejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Tempurejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Patalan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Tambaksari',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Purwosari',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Ngadipurwo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Sendangharjo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Tempuran',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Plantungan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Ngampel',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Beran',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Bangkle',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Kedungjenar',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Mlangsen',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Jetis',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Tambahrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Kauman',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Sonorejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Kunden',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Tempelan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Tegalgunung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 2,
    'desa' => 'Karangjati',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Tawangrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Kedungringin',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Adirejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Tamanrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Tutup',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Sukorejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Tambahrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Kalangan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Sambongrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Tunjungan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Kedungrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Gempolrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Nglangitan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Keser',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 16,
    'desa' => 'Sitirejo',
]);



kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Jatisari',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Jatiklampok',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Klopoduwur',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Sidomulyo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Balongsari',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Bacem',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Wonosemi',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Sendanggayam',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Banjarejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Mojowetan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Sumberagung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Gedongsari',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Sendangwungu',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Balongrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Karangtalun',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Kebonrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Kembang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Sembongin',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Plosorejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 1,
    'desa' => 'Buluroto',
]);



kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Rowobungkul',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Gedebeg',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Sambonganyar',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Kendayaan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Plumbon',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Bergolo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Bandungrojo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Kedungsatriyan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Karangtengah',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Jetakwanger',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Sumberejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Sendangagung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Talokwohmojo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Trembulrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Gondang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Sendangrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Semawur',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Bradag',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Gotputuk',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Berbak',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Sarimulyo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Sendangmulyo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Wantilgung',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Bogowanti',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Sambongrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Punggursugih',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Ngawen',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Srigading',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 12,
    'desa' => 'Karangjong',
]);


kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Botoreco',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Buloh',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Kemiri',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Kodokan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Sonokidul',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Sempu',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Cungkup',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Plosorejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Ngilen',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Bakah',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Kalangrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Blumbangrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Tawangrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Klokah',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Muraharjo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Jagong',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Gagaan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Sambiroto',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Bejirejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Jetak',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Karanggeneng',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Balong',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Ngawenombo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Sendangwates',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Kunduran',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 11,
    'desa' => 'Kedungwaru',
]);



kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Tinapan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Sambeng',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Prigi',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Pelemsengir',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Kacangan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Sonokulon',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Kedungwungu',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Gunungan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Kajengan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Dringo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Cokrowati',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Ketileng',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Todanan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Ngumbul',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Wukirsari',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Bicak',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Sendang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Karanganyar',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Dalangan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Candi',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Gondoriyo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Kembang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Bedingin',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Ledok',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 15,
    'desa' => 'Kedungbacin',
]);


kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Gombang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Sarirejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Karanganyar',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Karang',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Prantaan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Jeruk',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Bogorejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Gembol',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Tempurejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Gayam',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Sendangrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Gandu',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Nglengkir',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 3,
    'desa' => 'Jurangjero',
]);


kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Harjowinangun',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Tengger',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Krocok',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Ngapus',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Dologan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Tlogowungu',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Japah',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Beganjing',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Ngrambitan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Pengkolrejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Bogorejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Wotbakah',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Padaan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Bogem',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Sumberejo',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Ngiyono',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Gaplokan',
]);

kelurahandesa::create([
    'kecamatanblora_id' => 5,
    'desa' => 'Kalinanas',
]);


// DATABASE BANTUAN TEKNIS
 for ($i = 1; $i <= 100; $i++) {
            bantuanteknis::create([
                'dinas_id' => rand(1, 15),
                'jenispengajuanbantek_id' => rand(1, 9),
                'pemohon_id' => 21,
                'nosurat' => '0' . rand(100, 999) . '/DPUPR/VI/2025',
                'tanggalsurat' => now()->subDays(rand(0, 30)),
                'nama_pemohon' => 'Pemohon ' . $i,
                'no_telepon' => '08123' . rand(100000, 999999),

                'namapaket' => 'Paket Proyek ' . Str::random(5),
                'kategoribangunan' => 'Bangunan Umum',
                'luasbangunan' => rand(50, 300),
                'luastanahtotal' => rand(100, 1000),
                'jumlahlantai' => rand(1, 5),
                'tinggibangunan' => rand(3, 15),
                'bassement' => rand(0, 1),
                'kepemilikan' => 'Pemerintah Daerah',
                'tahunpembangunan' => rand(2000, 2022),
                'tahunrenovasi' => rand(2010, 2025),

                'pengelola' => 'DPUPR Unit ' . rand(1, 5),
                'alamatlokasi' => 'Jl. Proyek No. ' . rand(1, 100),
                'rt' => str_pad(rand(1, 10), 2, '0', STR_PAD_LEFT),
                'rw' => str_pad(rand(1, 10), 2, '0', STR_PAD_LEFT),
                'kabupaten' => 'Blora',
                'kecamatanblora_id' => rand(1, 10),
                'kelurahandesa_id' => rand(1, 10),
            ]);
        }

        for ($i = 1; $i <= 100; $i++) {
    krkusaha::create([
        'user_id' => 18,
        'kecamatanblora_id' => rand(1, 10),
        'kelurahandesa_id' => rand(1, 10),
        'perorangan' => 'Pemohon ' . $i,
        'perusahaan' => 'CV Proyek Mandiri ' . rand(1, 100),
        'nik' => (string)rand(3200000000000000, 3299999999999999),
        'koordinatlokasi' => '-7.' . rand(100000, 999999) . ',111.' . rand(100000, 999999),
        'tanggalpermohonan' => now()->subDays(rand(1, 60)),
        'notelepon' => '08123' . rand(100000, 999999),
        'luastanah' => rand(100, 1000),
        'jumlahlantai' => (string)rand(1, 4),
        'rt' => str_pad(rand(1, 10), 2, '0', STR_PAD_LEFT),
        'rw' => str_pad(rand(1, 10), 2, '0', STR_PAD_LEFT),
        'kabupaten' => 'Blora',
        'lokasibangunan' => 'Jl. Pembangunan No. ' . rand(1, 100),
    ]);
}


// LAPAR





// makanyu
    }
 /**
     * Menghitung usia berdasarkan tanggal lahir.
     *
     * @param  string  $birthDate
     * @return int
     */
    protected function calculateAge($birthDate)
    {
        return Carbon::parse($birthDate)->age;
    }
}
