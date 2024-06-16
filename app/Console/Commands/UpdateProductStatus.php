<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateProductStatus extends Command
{
    protected $signature = 'update:product-status';
    protected $description = 'Memperbarui status produk dari new arrival menjadi lama setelah 5 menit';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $fiveMinutesAgo = Carbon::now()->subMinutes(5);

        DB::table('produk')
            ->where('status', 'new arrival')
            ->where('created_at', '<=', $fiveMinutesAgo)
            ->update(['status' => 'lama']);

        $this->info('Status produk berhasil diperbarui.');
    }
}
