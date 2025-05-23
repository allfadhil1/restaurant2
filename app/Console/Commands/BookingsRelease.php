<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use App\Models\Table;
use Carbon\Carbon;

class BookingsRelease extends Command
{
    protected $signature = 'bookings:release';
    protected $description = 'Set meja menjadi available kembali setelah booking berakhir';

    public function handle()
    {
        $now = Carbon::now();

        // Cari booking yang sudah lewat end_time tapi mejanya belum di-set available
        $expiredBookings = Booking::where('end_time', '<=', $now)->get();

        foreach ($expiredBookings as $booking) {
            $table = $booking->table;

            // Jika meja masih tidak tersedia, ubah jadi available
            if ($table && !$table->is_available) {
                $table->is_available = true;
                $table->save();

                $this->info("Meja ID {$table->id} diubah jadi available.");
            }
        }

        $this->info('Expired bookings processed.');
    }
}