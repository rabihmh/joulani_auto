<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getAdmin()
    {
        return Auth::guard('admin')->user();
    }

    public function index()
    {
        $admin = $this->getAdmin();
        $notifications = $admin->notifications()->paginate();
        return view('admin.notifications.index', compact('notifications'));
    }

    public function destroy(string $id)
    {
        $admin = $this->getAdmin();
        $notification = $admin->notifications()->findOrFail($id);
        $notification->delete();
        return redirect()->back()->with('success', 'delete successfully');
    }

    public function MarkAllRead()
    {
        $admin = $this->getAdmin();
        $notifications = $admin->notifications()->get();

        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back()->with('success', 'All Message Are Be Read');
    }
}
