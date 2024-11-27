<?php

namespace App\Http\Controllers\Example\AteOyatsu\Inertia;

use App\Http\Controllers\Controller;
use App\Models\Oyatsu;

class IndexController extends Controller
{
    public function __invoke()
    {
        $oyatsu = Oyatsu::all();
        $ateOyatsu = AteOyatsu::all();
        $totalCalory = $ateOyatsu->sum('calory');

        return inertia('example.ateOyatsu.blade', compact('oyatsu', 'ateOyatsu', 'totalCalory'));
    }
}