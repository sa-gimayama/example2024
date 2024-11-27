<?php

namespace App\Http\Controllers\Example\AteOyatsu\blade;

use App\Http\Controllers\Controller;
use App\Models\AteOyatsu;
use App\Models\Oyatsu;

class IndexController extends Controller
{
    public function __invoke()
    {
        $oyatsus = Oyatsu::all();
        $ateOyatsus = AteOyatsu::all()->load('oyatsu');
        $totalCalory = $ateOyatsus->sum('oyatsu.calory');

        return view('example.ateOyatsu', compact('oyatsus', 'ateOyatsus', 'totalCalory'));
    }
}
