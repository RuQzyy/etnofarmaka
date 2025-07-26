<?php

namespace App\Providers;

use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::aliasMiddleware('role', RoleMiddleware::class);
        View::composer('layouts.app', function ($view) {
            $jumlahItem = 0;
            if (Auth::check()) {
                $user = Auth::user();
                // Cari keranjang user, jika tidak ada maka jumlah item 0
                $keranjang = Keranjang::where('id_user', $user->id)->first();
                if ($keranjang) {
                    // Hitung jumlah item unik di keranjang
                    $jumlahItem = $keranjang->items()->count();
                }
            }
            $view->with('jumlahItemKeranjang', $jumlahItem);
        });
    }

}
