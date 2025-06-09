<?php

// app/Providers/AuthServiceProvider.php

namespace App\Providers;

use App\Models\User;
use App\Models\StatusAdmin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // Jika tidak ada policies yang terdaftar, Anda bisa menghapus baris ini
        // $this->registerPolicies();

        // Menambahkan Gate untuk memeriksa akses berdasarkan status admin
        Gate::define('superadmin', function (User $user) {
            // Contoh akses hanya untuk admin dengan status tertentu
            return $user->statusadmin->status === 'super_admin'; // Ubah 'Admin' dengan status yang sesuai
        });

        // Bisa menambahkan gate lain sesuai kebutuhan, misal untuk user dengan status 'Manager' atau 'User'
        Gate::define('pemohon', function (User $user) {
            return $user->statusadmin->status === 'pemohon';
        });

        Gate::define('admin', function (User $user) {
            return $user->statusadmin->status === 'admin';
        });

        Gate::define('konsultanbantek', function (User $user) {
            return $user->statusadmin->status === 'konsultanbantek';
        });

        Gate::define('dinas', function (User $user) {
            return $user->statusadmin->status === 'dinas';
        });

        Gate::define('pemohonbantek', function (User $user) {
            return $user->statusadmin->status === 'pemohonbantek';
        });



    }
}
