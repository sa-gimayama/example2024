<?php

namespace App\Http\Controllers\Example\AteOyatsu\Inertia;

use App\Http\Controllers\Controller;
use App\Models\AteOyatsu;
use App\Models\Oyatsu;

class IndexController extends Controller
{
    public function __invoke()
    {
        $oyatsus = Oyatsu::all();
        $ateOyatsus = AteOyatsu::all()->load('oyatsu');

        return inertia('Example/ateOyatsu', compact('oyatsus', 'ateOyatsus'));
    }
}
