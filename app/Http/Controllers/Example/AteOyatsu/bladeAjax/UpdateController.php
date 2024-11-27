<?php

namespace App\Http\Controllers\Example\AteOyatsu\bladeAjax;

use App\Http\Controllers\Controller;
use App\Models\AteOyatsu;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request)
    {
        AteOyatsu::create([
            'oyatsu_id' => $request->oyatsu_id,
            'ate_at' => $request->ate_at,
        ]);

        return ['status' => 'success', 'ateOyatsu' => AteOyatsu::latest()->first()->load('oyatsu')];
    }
}
