<?php

namespace App\Http\Controllers\Example\AteOyatsu\bladeAjax;

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

        return view('example.ateOyatsuAjax', compact('oyatsus', 'ateOyatsus', 'totalCalory'));
    }
}
