<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the Dashboard view.
     */
    public function create(): Response
    {
        return Inertia::render('Dashboard');
    }
}
