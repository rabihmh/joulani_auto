<?php

namespace App\Listeners;

use App\Events\VehicleCreated;
use App\Models\Admin;
use App\Notifications\SendEmailVehicleCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class VehicleCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VehicleCreated $vehicleCreated): void
    {
        $vehicle = $vehicleCreated->vehicle;
        $admins = Admin::query()->where('status', 'active')->get();
        Notification::send($admins, new SendEmailVehicleCreated($vehicle));
    }
}
