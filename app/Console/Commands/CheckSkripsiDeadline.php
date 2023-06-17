<?php

namespace App\Console\Commands;

use App\Mail\SkripsiDeadlineNotification;
use App\Models\Skripsi;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class CheckSkripsiDeadline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:kirim';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Mendapatkan tanggal sekarang
        $currentDate = Carbon::now();

        // Menghitung tanggal 5 bulan sebelumnya
        $deadlineDate = $currentDate->subMonths(4);

        // Mendapatkan data skripsi dengan tgl_judul sebelum deadline dan file_skripsi masih null
        $skripsis = Skripsi::whereDate('tgl_judul', '<=', $deadlineDate)
            ->whereNull('file_skripsi')
            ->get();

        foreach ($skripsis as $skripsi) {
            // Kirim email ke user yang terkait
            $user = $skripsi->mahasiswa; // Ganti 'user' dengan relasi antara skripsi dan user di model Skripsi
            Mail::to($user->email)->send(new SkripsiDeadlineNotification($skripsi));
        }

        // Mendapatkan data skripsi dan user terkait
        // $skripsi = Skripsi::all();

        // foreach ($skripsi as $skr) {
        //     $mail = new SkripsiDeadlineNotification($skr);
        //     $result = Mail::to($skr->mahasiswa->email)->send($mail);

        //     if ($result) {
        //         // Email berhasil dikirim
        //         $this->info('Skripsi deadline check completed.');
        //     } else {
        //         // Email gagal dikirim
        //         $this->info('Skripsi gagal kirim email.');
        //     }
        // }

        $this->info('Skripsi deadline check completed.');
    }
}
