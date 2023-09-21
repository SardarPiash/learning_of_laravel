<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAdminDashboard(Request $request)
{
    $email = $request->session()->get('email');
    $system = System::where('email', $email)->select('name', 'email', 'status')->first();

    if ($system) {
        $dbName = $system->name;
        $dbEmail = $system->email;
        $dbStatus = $system->status;

        return view('role.admin.dashboard', [
            'name' => $dbName,
            'email' => $dbEmail,
            'status' => $dbStatus,
        ]);
    }
}

}
