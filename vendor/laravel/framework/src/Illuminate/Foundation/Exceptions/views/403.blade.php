{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}


@extends('errors::minimal')

{{-- @section('title', __('Akses Ditolak')) --}}
{{-- @section('code', '403') --}}
{{-- @section('message')
    <div style="text-align: center; margin-top: 30px;">
        <p style="font-size: 18px; color: #555;">
            {{ $exception->getMessage() ?: 'Maaf, Anda tidak memiliki hak akses untuk halaman ini.' }}
        </p>
        <a href="{{ url('/') }}" style="margin-top: 20px; display: inline-block; padding: 10px 20px; background-color: navy; color: white; text-decoration: none; border-radius: 5px;">
            Silahkan Kembali !
        </a>
    </div>
@endsection --}}


@section('message')
<style>
    .access-denied-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 70vh;
        padding: 20px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .access-denied-card {
        max-width: 550px;
        width: 100%;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 32px;
        box-shadow: 0 25px 50px -12px rgba(0, 20, 60, 0.25);
        padding: 48px 32px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.5);
        animation: fadeScale 0.5s ease-out;
    }

    @keyframes fadeScale {
        0% {
            opacity: 0;
            transform: scale(0.95);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .access-denied-icon {
        background: #0a2a5e;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        box-shadow: 0 10px 25px rgba(10, 42, 94, 0.3);
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-8px);
        }
    }

    .access-denied-icon svg {
        width: 48px;
        height: 48px;
        fill: white;
    }

    .access-denied-title {
        font-size: 28px;
        font-weight: 700;
        color: #0a2a5e;
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }

    .access-denied-subtitle {
        font-size: 16px;
        color: #4b5563;
        margin-bottom: 24px;
        font-weight: 400;
    }

    .access-denied-message {
        font-size: 18px;
        line-height: 1.6;
        color: #1e293b;
        background: rgba(255, 255, 255, 0.7);
        padding: 20px 24px;
        border-radius: 20px;
        border: 1px solid rgba(224, 242, 254, 0.8);
        margin-bottom: 32px;
        font-weight: 500;
        backdrop-filter: blur(4px);
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
    }

    .access-denied-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: #0a2a5e;
        color: white;
        font-weight: 600;
        font-size: 18px;
        padding: 14px 36px;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 0 #04182f, 0 10px 25px rgba(10, 42, 94, 0.3);
        letter-spacing: 0.5px;
    }

    .access-denied-button:hover {
        background: #0e3470;
        transform: translateY(-4px);
        box-shadow: 0 12px 0 #04182f, 0 15px 30px rgba(10, 42, 94, 0.35);
    }

    .access-denied-button:active {
        transform: translateY(6px);
        box-shadow: 0 4px 0 #04182f, 0 10px 20px rgba(10, 42, 94, 0.2);
    }

    .access-denied-button svg {
        width: 22px;
        height: 22px;
        fill: white;
        transition: transform 0.2s ease;
    }

    .access-denied-button:hover svg {
        transform: translateX(-4px);
    }

    @media (max-width: 640px) {
        .access-denied-card {
            padding: 32px 20px;
        }
        .access-denied-title {
            font-size: 24px;
        }
        .access-denied-message {
            font-size: 16px;
            padding: 16px 20px;
        }
    }
</style>

<div class="access-denied-container">
    <div class="access-denied-card">
        <!-- Ikon Shield/Lock dengan animasi -->
        <div class="access-denied-icon">
            <svg viewBox="0 0 24 24">
                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
            </svg>
        </div>

        <h2 class="access-denied-title">Akses Ditolak</h2>
        {{-- <p class="access-denied-subtitle">⚠️ Halaman ini dilindungi</p> --}}

        <!-- Pesan error dengan fallback -->
        <div class="access-denied-message">
            {{ $exception->getMessage() ?: 'Maaf, Anda tidak memiliki hak akses untuk halaman ini.' }}
        </div>

        <!-- Tombol kembali dengan ikon panah -->
        <a href="{{ url('/') }}" class="access-denied-button">
            <svg viewBox="0 0 24 24">
                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
            </svg>
            Silahkan Kembali
        </a>
    </div>
</div>
@endsection
