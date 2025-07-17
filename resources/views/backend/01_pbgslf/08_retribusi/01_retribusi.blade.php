@include('backend.00_administrator.00_baganterpisah.01_header')

<!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
{{-- ---------------------------------------------------------------------- --}}

@include('backend.00_administrator.00_baganterpisah.04_navbar')
@include('backend.00_administrator.00_baganterpisah.09_button')
@include('frontend.android.00_fiturmenu.06_alert')
{{-- ---------------------------------------------------------------------- --}}

      @include('backend.00_administrator.00_baganterpisah.03_sidebar')

      <!--begin::App Main-->
      <main class="app-main"
         style="
    background: linear-gradient(to bottom, #7de3f1, #ffffff);
    margin: 0;
    padding: 0;
    position: relative;
    left: 0;
  ">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
           @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                              </div>
              <!--end::Row-->
            </div>
            <!--end::Container-->
          </div>
          <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
              <!-- Info boxes -->

{{-- atas  --}}
{{--  --}}

@include('backend.00_administrator.00_baganterpisah.11_judulhalaman')

<div style="display: flex; justify-content: flex-start; align-items: center; gap: 16px; flex-wrap: wrap; margin-top: 10px;">

  <!-- Form Filter Bulan -->
  <form method="GET" action="{{ url()->current() }}" style="display: flex; align-items: center; gap: 12px;">
    <label for="filter_bulan" style="font-weight: 600;">Filter Bulan:</label>
    <select name="bulan" id="filter_bulan" onchange="this.form.submit()" style="
      padding: 6px 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
    ">
      <option value="">-- Semua Bulan --</option>
      @php
        $namaBulan = [
          1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
          5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
          9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];
      @endphp
      @foreach ($namaBulan as $num => $nama)
        <option value="{{ $num }}" {{ request('bulan') == $num ? 'selected' : '' }}>{{ $nama }}</option>
      @endforeach
    </select>
  </form>

  <!-- Tombol Download -->
  <a href="javascript:void(0)" class="text-decoration-none" onclick="exportTableToExcel('tabelSuratbantuanteknis', 'data_nominalretribusi')">
    <div class="button-baru" style="color: black;">
      <i class="bi bi-download me-2"></i> Download Excel
    </div>
  </a>

</div>
<br>

@canany(['superadmin', 'admin'])


<div style="display: flex; flex-wrap: wrap; gap: 20px;">
  <div style="flex: 1; background-color: #f8f9fa; border-left: 5px solid #0d6efd; border-radius: 8px; padding: 16px;">
      <strong>💰 Nominal Retribusi:</strong><br>
      <span style="font-size: 18px; font-weight: bold;">
          Rp {{ number_format($nominalRetribusiTotal, 0, ',', '.') }}
        </span>
    </div>

  <div style="flex: 1; background-color: #f8f9fa; border-left: 5px solid #198754; border-radius: 8px; padding: 16px;">
      <strong>✅ Sudah Terbayar:</strong><br>
      <span style="font-size: 18px; font-weight: bold; color: #198754;">
          Rp {{ number_format($nominalSudahTerbayar, 0, ',', '.') }}
        </span>
    </div>

    <div style="flex: 1; background-color: #f8f9fa; border-left: 5px solid #dc3545; border-radius: 8px; padding: 16px;">
    <strong>📥 Nominal Penerimaan:</strong><br>
    <span style="font-size: 18px; font-weight: bold; color: #dc3545;">
        Rp {{ number_format($nominalPenerimaan, 0, ',', '.') }}
    </span>
</div>
</div>
<br>
@endcanany
<br>


   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
   <script>
    function exportTableToExcel(tableID, filename = '') {
        var table = document.getElementById(tableID);
        var wb = XLSX.utils.table_to_book(table, {sheet:"Sheet 1"});
        return XLSX.writeFile(wb, filename + '.xlsx');
    }
    </script>


<div class="putih" style="margin-bottom:100px; margin-top:-20px;">


<div style="width: 100%; overflow-x: auto; margin-bottom: 100px; margin-top:20px;">
  <table id="tabelSuratbantuanteknis"
    class="table zebra-table" style="border-collapse: separate; border-spacing: 0; border-radius: 20px; overflow: hidden;"

  >

    <thead>
      <tr>
        <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">No</th>
        {{-- <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
          <i class="bi bi-person-fill"></i> Upload Berkas
        </th> --}}
        {{-- <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
          <i class="bi bi-person-fill"></i> Admin DPUPR
        </th> --}}


        <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
          <i class="bi bi-file-earmark-text-fill"></i> Bulan Sidang
        </th>

        <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
          <i class="bi bi-file-earmark-text-fill"></i> Jenis Permohonan
        </th>
        <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
          <i class="bi bi-hash"></i> No Registrasi SIM BG
        </th>
        <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
          <i class="bi bi-calendar"></i> Tanggal Permohonan
        </th>


        <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
          <i class="bi bi-file-earmark-text-fill"></i> Potensi Retribusi
        </th>

                <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
                  <i class="bi bi-file-earmark-text-fill"></i> Status
                </th>

                @canany(['superadmin', 'admin'])

                <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
                    <i class="bi bi-file-earmark-text-fill"></i> Status/Berkas
                </th>

                @endcanany
        {{-- <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
          <i class="bi bi-file-earmark-text-fill"></i> Status Bayar
        </th> --}}

        {{-- <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
          <i class="bi bi-calendar"></i> Berita Acara
        </th> --}}
        {{-- <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
          <i class="bi bi-check2-circle"></i> Status Permohonan
        </th>
        <th style="background-color: #ADD8E6; white-space: nowrap; padding: 8px; text-align: center;">
          <i class="bi bi-folder-fill"></i> Berkas
        </th> --}}

      </tr>
    </thead>
    <tbody>

        @forelse  ($data as $item)
        <tr>
          <td style="white-space: nowrap; padding: 6px; text-align: center;">{{ $loop->iteration }}</td>
<td style="white-space: nowrap; padding: 6px; text-align: center;">
    @if ($item->validasiberkas5 === 'sudah' && $item->updated_at)
        {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('F Y') }}
    @else
        -
    @endif
</td>

     {{-- <td style="white-space: nowrap; padding: 6px; text-align: center;">
  <a href="{{ route('bepbgslfskrdcreate', $item->id) }}"
     class="button-baru"
     title="Upload Berkas">
    <i class="bi bi-upload me-1"></i> Upload
  </a>
</td> --}}


          {{-- <td style="white-space: nowrap; padding: 6px; text-align: center;">{{ $item->user->name ?? '-' }}</td> --}}


     <td style="white-space: nowrap; padding: 6px; text-align: center;">{{ $item->jenispengajuanpbgslfper->jenispengajuan ?? '-' }}</td>
          <td style="white-space: nowrap; padding: 6px; text-align: center;">{{ $item->noregissimbg ?? '-' }}</td>
          <td style="white-space: nowrap; padding: 6px; text-align: center;">
            @php $tgl = $item->tanggalpermohonan ?? null; @endphp
            {{ $tgl ? \Carbon\Carbon::parse($tgl)->translatedFormat('d F Y') : '-' }}
          </td>
          {{-- <td style="white-space: nowrap; padding: 6px; text-align: center;">
            @if ($item->validasiberkas5 === 'sudah')
              <span style="display: inline-block; padding: 4px 8px; background-color: #198754; color: white; border-radius: 4px;">Sidang</span>
            @else
              <span style="display: inline-block; padding: 4px 8px; background-color: #6c757d; color: white; border-radius: 4px;">Belum</span>
            @endif
          </td> --}}
        {{-- <td style="white-space: nowrap; padding: 6px; text-align: center;">
  <a href="{{ route('bepbgsuratundangan', $item->id) }}"
     class="button-baru">
     <i class="fas fa-eye me-1"></i> Lihat Surat Undangan
  </a>
</td> --}}
<td style="white-space: nowrap; padding: 6px; text-align: center;">
    @if ($item->rupiah !== null)
        Rp {{ number_format($item->rupiah, 0, ',', '.') }},00
    @else
        <span style="color: red; font-weight: bold;">Belum Di Masukan</span>
    @endif
</td>

{{-- <td style="white-space: nowrap; padding: 6px; text-align: center; vertical-align: middle;">
    @if($item->buktipembayaran)
        <iframe
            src="{{ asset($item->buktipembayaran) }}"
            style="width: 150px; height: 200px; border: 1px solid #ccc; border-radius: 4px;"
            frameborder="0"
        ></iframe>
        <br>
        <a href="{{ asset($item->buktipembayaran) }}"
           class="btn btn-sm btn-primary mt-1"
           target="_blank"
           download>
           <i class="bi bi-download"></i> Download
        </a>
    @else
        <span style="color: white" class="btn btn-danger">Berkas Belum di Upload</span>

        @endif
</td> --}}

<td style="text-align: center;">
    @php
        $status = $item->validasiberkas9;
    @endphp

    <button class="
        @if(is_null($status))
            button-baru
        @elseif($status === 'sudah')
            button-hijau
        @elseif($status === 'belum')
            button-merah
        @else
            button-newvalidasi
        @endif
    ">
    @if(is_null($status))
        <i class="bi bi-clock-history me-1"></i> Belum di Verifikasi
    @elseif($status === 'sudah')
        <i class="bi bi-check-circle-fill me-1"></i> Sudah Bayar
    @elseif($status === 'belum')
        <i class="bi bi-x-circle-fill me-1"></i> Belum Bayar
    @else
        <i class="bi bi-question-circle-fill me-1"></i> Status Tidak Diketahui
    @endif
</button>
</td>

@canany(['superadmin', 'admin'])

<td style="white-space: nowrap; padding: 6px; text-align: center; vertical-align: middle;">
    @if ($item->validasiberkas9 === 'sudah')
    @if ($item->berkasskrd)
    <iframe
    src="{{ asset($item->berkasskrd) }}"
    style="width: 150px; height: 200px; border: 1px solid #ccc; border-radius: 4px;"
    frameborder="0"
    ></iframe>
    <br>
    <a href="{{ asset($item->berkasskrd) }}"
        class="button-baru mt-1"
        target="_blank"
        download>
               <i class="bi bi-download"></i> Download
            </a>
        @else
        <span class="button-merah" style="color: white;">Berkas Belum di Upload</span>
        @endif

        @elseif ($item->validasiberkas9 === 'belum')
        <span class="berkas-newvalidasi" style="color: black;">Berkas belum divalidasi</span>
        <button type="button" class="btn btn-sm btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#validasiModal" data-id="{{ $item->id }}">
            <i class="bi bi-pencil-square"></i> Verifikasi Ulang
        </button>

        @else
        <button type="button" class="button-berkas" data-bs-toggle="modal" data-bs-target="#validasiModal" data-id="{{ $item->id }}">
            <i class="bi bi-check-circle"></i> Validasi Pembayaran
        </button>
        @endif
    </td>

    @endcanany
<!-- Modal Validasi Berkas -->
<div class="modal fade" id="validasiModal" tabindex="-1" aria-labelledby="validasiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="validasiForm" method="POST" action="">
        @csrf
        @method('PUT')
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="validasiModalLabel">Validasi Berkas SKRD</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Pilih status validasi berkas SKRD untuk data ini:</p>
            <div class="d-flex gap-3">
                <button type="submit" name="validasiberkas9" value="sudah" class="btn btn-success w-50">
                    <i class="bi bi-check-circle"></i> Sudah
                </button>
                <button type="submit" name="validasiberkas9" value="belum" class="btn btn-danger w-50">
                    <i class="bi bi-x-circle"></i> Belum
                </button>
            </div>
          </div>
        </div>
    </form>
  </div>
</div>
<script>
    var validasiModal = document.getElementById('validasiModal')
    validasiModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget
      var id = button.getAttribute('data-id')
      var form = document.getElementById('validasiForm')
      form.action = '/validasipbgslfbukti/' + id  // sesuai route PUT kamu
    })
</script>


        </tr>
            @empty
    <tr>
        <td colspan="100%"> {{-- Memenuhi semua kolom --}}
            <div style="
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 30px;
                font-weight: 600;
                font-family: 'Poppins', sans-serif;
                color: #6c757d;
                background-color: #f8f9fa;
                border: 2px dashed #ced4da;
                border-radius: 12px;
                font-size: 16px;
                animation: fadeIn 0.5s ease-in-out;
            ">
                <i class="bi bi-folder-x" style="margin-right: 8px; font-size: 20px; color: #dc3545;"></i>
                Data Tidak Ditemukan !!
            </div>
        </td>
    </tr>
@endforelse

      {{-- @endforeach --}}
    </tbody>
  </table>
</div>




</div>


{{-- @include('backend.00_administrator.00_baganterpisah.07_paginations') --}}
</div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->

          <!--end::App Content-->
      </main>
      <!--end::App Main-->


      @include('backend.00_administrator.00_baganterpisah.02_footer')
