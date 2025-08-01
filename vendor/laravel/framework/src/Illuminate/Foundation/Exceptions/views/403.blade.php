{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}


@extends('errors::minimal')

{{-- @section('title', __('Akses Ditolak')) --}}
{{-- @section('code', '403') --}}
{{-- @section('message') --}}
    <div style="text-align: center; margin-top: 30px;">
        <p style="font-size: 18px; color: #555;">
            {{ $exception->getMessage() ?: 'Maaf, Anda tidak memiliki hak akses untuk halaman ini.' }}
        </p>
        <a href="{{ url('/') }}" style="margin-top: 20px; display: inline-block; padding: 10px 20px; background-color: navy; color: white; text-decoration: none; border-radius: 5px;">
            Silahkan Kembali !
        </a>
    </div>
@endsection
