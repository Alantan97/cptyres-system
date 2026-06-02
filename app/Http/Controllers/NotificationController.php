<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function markAsRead(Notification $notification)
    {
        $notification->update([
            'is_read' => true,
        ]);

        if ($notification->service_record_id) {

            return redirect()->route(
                'service-records.show',
                $notification->service_record_id
            );
        }

        return back();
    }

    public function markAllAsRead()
    {
        Notification::where('is_read', false)
            ->update([
                'is_read' => true,
            ]);

        return back();
    }
}
