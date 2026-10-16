<?php

namespace App\Observers;

use App\Models\Application;
use App\Mail\ApplicationStatusUpdated;
use Illuminate\Support\Facades\Mail;

class ApplicationObserver
{
    /**
     * Dipanggil otomatis saat data Application diperbarui di Filament / Database.
     */
    public function updated(Application $application): void
    {
        // Cek jika kolom 'status' mengalami perubahan
        if ($application->wasChanged('status')) {
            $userEmail = $application->user->email ?? null;

            if ($userEmail) {
                Mail::to($userEmail)->send(new ApplicationStatusUpdated($application));
            }
        }
    }
}