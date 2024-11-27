<?php

namespace App\Http\Controllers\Example\AteOyatsu\bladeAjax;

use App\Http\Controllers\Controller;
use App\Models\Oyatsu;

class IndexController extends Controller
{
    public function __invoke()
    {
        $oyatsus = Oyatsu::all();
        $ateOyatsus = AteOyatsu::all();
        $totalCalory = $ateOyatsus->sum('calory');

        return view('example.ateOyatsu.blade', compact('oyatsus', 'ateOyatsus', 'totalCalory'));
    }
}
