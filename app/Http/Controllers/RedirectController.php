<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function index()
    {
        dd('SAYA BERADA DI REDIRECT CONTROLLER');
        $role = Auth::user()->role;

        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
                break;
            case 'penjual':
                return redirect()->route('penjual.dashboard');
                break;
            default:
                return redirect()->route('dashboard'); // 'dashboard' adalah nama route untuk pembeli
                break;
        }
    }
}