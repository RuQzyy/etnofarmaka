<?php

namespace App\Providers;

use App\Models\Keranjang;
use App\Models\ItemKeranjang;
use App\Policies\KeranjangPolicy;
use App\Policies\ItemKeranjangPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Keranjang::class => KeranjangPolicy::class,
        ItemKeranjang::class => ItemKeranjangPolicy::class
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
