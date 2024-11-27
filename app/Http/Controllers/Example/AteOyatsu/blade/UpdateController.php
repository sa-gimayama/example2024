<?php

namespace App\Http\Controllers\Example\AteOyatsu\blade;

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

        return redirect()->route('example.ateOyatsu.blade.index');
    }
}
