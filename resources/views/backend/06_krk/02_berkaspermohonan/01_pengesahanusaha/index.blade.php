<style>
    body {
           font-family: 'Poppins', sans-serif;
       }
       .zebra-table {
       width: 100%;
       border-collapse: collapse;
       font-family: 'Poppins', sans-serif;
       font-size: 14px;
       border: 1px solid #e5e7eb;
   }

   .zebra-table th {
       background-color: #ADD8E6; /* biru muda */
       color: black;
       text-align: center;
       padding: 8px 12px;
       border: 1px solid #e5e7eb;
       white-space: nowrap;
   }

   .zebra-table td {
       text-align: center;
       padding: 8px 12px;
       border: 1px solid #e5e7eb;
       white-space: nowrap;
   }

   .zebra-table tbody tr:nth-child(odd) {
       background-color: #ffffff;
   }

   .zebra-table tbody tr:nth-child(even) {
       background-color: #f1f1f1;
   }

   .zebra-table tbody tr:hover {
       background-color: #ffd100 !important;
   }

   th {
       background-color: #ADD8E6;
   }

   </style>

   @include('backend.00_administrator.00_baganterpisah.01_header')

   <!--begin::Body-->
   <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
   {{-- ---------------------------------------------------------------------- --}}

   @include('backend.00_administrator.00_baganterpisah.04_navbar')
   {{-- ---------------------------------------------------------------------- --}}

      @include('backend.00_administrator.00_baganterpisah.03_sidebar')
      @include('frontend.android.00_fiturmenu.06_alert')


      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">

              <div class="col-sm-12"><h3 class="mb-0">Selamat datang ! <span style="color: black; font-weight:800;" > {{ Auth::user()->name }}</span> di Dashboard <span style="color: black; font-weight:800;"> {{ Auth::user()->statusadmin->statusadmin }} </span>  Sistem Informasi Pembina Jasa Konstruksi Kab Blora</h3></div>

            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>

        <!-- Menampilkan pesan sukses -->
   <br>
        {{-- ======================================================= --}}
        {{-- ALERT --}}

        @include('backend.00_administrator.00_baganterpisah.06_alert')

        {{-- ======================================================= --}}

        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row" style="margin-right: 10px; margin-left:10px;">
                <!-- /.card -->
                <div class="card mb-4">
                    {{-- <div class="card-header">
                       <div style="
                       font-weight: 900;
                       font-size: 16px;
                       text-align: center;
                       background: linear-gradient(135deg, #00378a, #00378a);
                       color: white;
                       padding: 8px 10px;
                       border-radius: 10px;
                       display: inline-block;
                       box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
                   ">
                       ⚙️ Setting Database
                   </div> --}}

                        {{-- <div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">
                            <a href="/404">
                                <button
                                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                                onmouseout="this.style.backgroundColor='#00378a'; this.style.color='white';"
                                style="background-color: #00378a; color: white; border: none; margin-right: 10px; padding: 10px 20px; border-radius: 15px; font-size: 16px; cursor: pointer; display: flex; align-items: center; transition: background-color 0.3s, color 0.3s; text-decoration: none;">
                                <!-- Ikon Kembali -->
                                <i class="fa fa-database" style="margin-right: 8px;"></i>
                                Asosiasi
                            </button>
                            </a>

                        </div> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-header">
                       <div style="
                       margin-bottom:10px;
                       font-weight: 900;
                       font-size: 16px;
                       text-align: center;
                       background: linear-gradient(135deg, #000080, #000080);
                       color: white;
                       padding: 10px 25px;
                       border-radius: 10px;
                       display: inline-block;
                       box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
                       width: 100%;
                   ">
                   <span style="font-family: 'Poppins', sans-serif;">📌 Halaman : {{$title}}</span>
                   </div>


                        <div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">
                           <div style="position: relative; display: inline-block; margin-right:10px;">
                               <input type="search" id="searchInput" placeholder="Cari Pemohon ...." onkeyup="searchTable()" style="border: 1px solid #ccc; padding: 10px 20px; font-size: 14px; border-radius: 10px; width: 300px;">
                               <i class="fas fa-search" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); font-size: 16px; color: #888;"></i>
                           </div>
                           <script>
                               function updateEntries() {
                                   let selectedValue = document.getElementById("entries").value;
                                   let url = new URL(window.location.href);
                                   url.searchParams.set("perPage", selectedValue);
                                   window.location.href = url.toString();
                               }

                               function searchTable() {
                               let input = document.getElementById("searchInput").value;

                               fetch(`/bebujkkonstruksi?search=${input}`)
                                   .then(response => response.text())
                                   .then(html => {
                                       let parser = new DOMParser();
                                       let doc = parser.parseFromString(html, "text/html");
                                       let newTableBody = doc.querySelector("#tableBody").innerHTML;
                                       document.querySelector("#tableBody").innerHTML = newTableBody;
                                   })
                                   .catch(error => console.error("Error fetching search results:", error));
                           }

                                   </script>

<a href="/bekrkusaha" onclick="window.history.back();">
    <button
        onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
        onmouseout="this.style.backgroundColor='#374151'; this.style.color='white';"
        style="background-color: #374151; color: white; border: none; margin-right: 10px; padding: 10px 20px; border-radius: 15px; font-size: 16px; cursor: pointer; display: flex; align-items: center; transition: background-color 0.3s, color 0.3s; text-decoration: none;">
        <!-- Ikon Kembali -->
        <i class="fa fa-arrow-left" style="margin-right: 8px;"></i> Kembali
    </button>
</a>


                        </div>
                    </div>
                    <!-- /.card-header -->
                   <!-- Pastikan untuk menyertakan FontAwesome di <head> HTML -->

<div class="container mt-5">
    <div class="card">
        <div class="card-body p-4">
            <form action="{{ route('permohonan.pengesahanusahacreate', ['id' => $data->id]) }}" method="POST">
                @csrf

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Nomor Registrasi KRK -->
                <div class="form-group row mb-4">
                    <label for="nomor_registrasi" class="col-md-4 col-form-label">
                        <i class="fas fa-id-card-alt"></i> Nomor Registrasi KRK
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="nomorregistrasi" name="nomorregistrasi" readonly>
                    </div>
                    @error('nomorregistrasi')
                    <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Script Nomor Registrasi -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const nomorRegistrasiInput = document.getElementById('nomorregistrasi');
                        const idData = `{{$data->id}}`;
                        const today = new Date();
                        const month = String(today.getMonth() + 1).padStart(2, '0');
                        const year = today.getFullYear();
                        const nomorRegistrasi = `${idData}/FU/BG/KRK/${month}/${year}`;
                        nomorRegistrasiInput.value = nomorRegistrasi;
                    });
                </script>

                <!-- Tanggal Dibuat KRK -->
                <div class="form-group row mb-4">
                    <label for="tanggalpermohonan" class="col-md-4 col-form-label">
                        <i class="fas fa-calendar-alt"></i> Tanggal Dibuat KRK
                    </label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" id="tanggalpermohonan" name="tanggalpermohonan" readonly>
                    </div>
                    @error('tanggalpermohonan')
                    <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Script Tanggal -->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const today = new Date();
                        const tanggalFormatted = today.toISOString().split('T')[0];
                        document.getElementById('tanggalpermohonan').value = tanggalFormatted;
                    });
                </script>

                <!-- Kepadatan -->
                <div class="form-group row mb-4">
                    <label for="kepadatan" class="col-md-4 col-form-label">
                        <i class="fas fa-users"></i> Kepadatan
                    </label>
                    <div class="col-md-8">
                        <select class="form-control" id="kepadatan" name="kepadatan" required>
                            <option value="">-- Pilih Kepadatan --</option>
                            <option value="RENDAH">RENDAH</option>
                            <option value="SEDANG">SEDANG</option>
                            <option value="TINGGI">TINGGI</option>
                        </select>
                    </div>
                    @error('kepadatan')
                    <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jumlah Lantai Maksimal -->
                <div class="form-group row mb-4">
                    <label for="jumlahlantai" class="col-md-4 col-form-label">
                        <i class="fas fa-building"></i> Jumlah Lantai Maksimal
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="jumlahlantai" name="jumlahlantai" readonly>
                    </div>
                    @error('jumlahlantai')
                    <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Luas Bangunan Maksimal -->
                <div class="form-group row mb-4">
                    <label for="luasbangunan" class="col-md-4 col-form-label">
                        <i class="fas fa-ruler-combined"></i> Luas Bangunan Maksimal
                    </label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="number" class="form-control" id="luasbangunan" name="luasbangunan" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text bg-danger text-white">M²</span>
                            </div>
                        </div>
                        @error('luasbangunan')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Fungsi Utama Bangunan -->
                <div class="form-group row mb-4">
                    <label for="fungsibangunan" class="col-md-4 col-form-label">
                        <i class="fas fa-cogs"></i> Fungsi Utama Bangunan
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="fungsibangunan" name="fungsibangunan" value="Fungsi Usaha" readonly>
                    </div>
                    @error('fungsibangunan')
                    <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Lokasi Bangunan -->
                <div class="form-group row mb-4">
                    <label for="lokasibangunan" class="col-md-4 col-form-label">
                        <i class="fas fa-map-marker-alt"></i> Lokasi Bangunan
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="lokasibangunan" value="{{$data->lokasibangunan}}" readonly>
                    </div>
                    @error('lokasibangunan')
                    <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ruas Jalan -->
                <div class="form-group row mb-4">
                    <label for="rencanagsbblora_id" class="col-md-4 col-form-label">
                        <i class="fas fa-road"></i> Ruas Jalan
                    </label>
                    <div class="col-md-8">
                        <select class="form-control" id="rencanagsbblora_id" name="rencanagsbblora_id" required>
                            <option value="">-- Pilih Ruas Jalan --</option>
                            @foreach($datagsb as $jalan)
                                <option value="{{ $jalan->id }}" data-jenis="{{ $jalan->jenisjalan }}" data-gsb="{{ $jalan->gsb }}">
                                    {{ $jalan->ruasjalan }}
                                </option>
                            @endforeach
                        </select>
                        @error('rencanagsbblora_id')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Jenis Ruas Jalan -->
                <div class="form-group row mb-4" id="jenisjalan-wrapper" style="display: none;">
                    <label class="col-md-4 col-form-label">
                        <i class="fas fa-road"></i> Jenis Ruas Jalan
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="jenisjalan" name="jenisjalan" readonly>
                    </div>
                </div>

                <!-- GSB -->
                <div class="form-group row mb-4" id="gsb-wrapper" style="display: none;">
                    <label class="col-md-4 col-form-label">
                        <i class="fas fa-cogs"></i> GSB
                    </label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control" id="gsb" name="gsb" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text bg-danger text-white">Meter</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KLB -->
                <div class="form-group row mb-4">
                    <label for="klb" class="col-md-4 col-form-label">
                        <i class="fas fa-cogs"></i> KLB
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="klb" name="klb" readonly>
                    </div>
                    @error('klb')
                    <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- KDH -->
                <div class="form-group row mb-4">
                    <label for="kdh" class="col-md-4 col-form-label">
                        <i class="fas fa-cogs"></i> KDH
                    </label>
                    <div class="col-md-8">
                        <select class="form-control" id="kdh" name="kdh" required>
                            <option value="">-- Pilih KDH --</option>
                            <option value="10">10%</option>
                            <option value="20">20%</option>
                            <option value="30">30%</option>
                        </select>
                    </div>
                    @error('kdh')
                    <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jaringan Utilitas Kota -->
                <div class="form-group row mb-4">
                    <label for="jaringanutilitas" class="col-md-4 col-form-label">
                        <i class="fas fa-plug"></i> Jaringan Utilitas Kota
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="jaringanutilitas" name="jaringanutilitas" required>
                    </div>
                    @error('jaringanutilitas')
                    <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Script Dynamic Fields -->
                <script>
                    // Kepadatan Change Handler
                    document.getElementById('kepadatan').addEventListener('change', function() {
                        const kepadatan = this.value;
                        const jmlLantai = document.getElementById('jumlahlantai');
                        const klb = document.getElementById('klb');

                        if (kepadatan === 'RENDAH') {
                            jmlLantai.value = '2 Lantai';
                            klb.value = '45%';
                        } else if (kepadatan === 'SEDANG') {
                            jmlLantai.value = '4 Lantai';
                            klb.value = '55%';
                        } else if (kepadatan === 'TINGGI') {
                            jmlLantai.value = '2 - 8 Lantai';
                            klb.value = '70%';
                        }
                    });

                    // Ruas Jalan Change Handler
                    document.getElementById('rencanagsbblora_id').addEventListener('change', function() {
                        const selected = this.options[this.selectedIndex];
                        document.getElementById('jenisjalan').value = selected.dataset.jenis;
                        document.getElementById('gsb').value = selected.dataset.gsb;
                        document.getElementById('jenisjalan-wrapper').style.display = 'flex';
                        document.getElementById('gsb-wrapper').style.display = 'flex';
                    });

                    // Luas Bangunan Calculator
                    document.addEventListener('DOMContentLoaded', function() {
                        const luastanah = {{ $data->luastanah }};
                        document.getElementById('kepadatan').addEventListener('change', function() {
                            const persen = {RENDAH:0.45, SEDANG:0.6, TINGGI:0.75}[this.value] || 0;
                            document.getElementById('luasbangunan').value = Math.round(luastanah * persen);
                        });
                    });
                </script>

                <!-- Tombol Submit -->
                <div class="form-group row mb-4">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-circle mr-2"></i> Setujui Pengesahan
                        </button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>


                    {{-- @include('backend.00_administrator.00_baganterpisah.07_paginations') --}}

                    <br><br>


                    <!-- Modal Konfirmasi Hapus -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="/assets/icon/pupr.png" alt="" width="30" style="margin-right: 10px;">
                                    <h5 class="modal-title" id="deleteModalLabel">DPUPR Kabupaten Blora</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda Ingin Menghapus Data : <span id="itemName"></span>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <form id="deleteForm" method="POST" action="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                    function setDeleteUrl(button) {
                        var namalengkap = button.getAttribute('data-judul');
                        document.getElementById('itemName').innerText = namalengkap;
                        var deleteUrl = "/bebujkkonstruksi/delete/" + encodeURIComponent(namalengkap);
                        document.getElementById('deleteForm').action = deleteUrl;
                    }
                    </script>

                    <style>
                        .table-responsive {
                            max-width: 100%;
                            overflow-x: auto;
                        }
                    </style>

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!--end::Row-->
        </div>
                  <!--end::Container-->
        <!--end::App Content Header-->
        <!--begin::App Content-->
          <!--end::App Content-->
      </main>
      <!--end::App Main-->
    </div>
    </div>


      @include('backend.00_administrator.00_baganterpisah.02_footer')

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
