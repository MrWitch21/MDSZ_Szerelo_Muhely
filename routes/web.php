<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('/');

Route::get('/create', function () {
    return view('create');
})->middleware(['auth', 'verified'])->name('create');

Route::get('/active', function () {
    return view('active');
})->middleware(['auth', 'verified'])->name('active');

Route::get('/closed', function () {
    return view('closed');
})->middleware(['auth', 'verified'])->name('closed');

Route::get('/warehouse', function () {
    return view('warehouse');
})->middleware(['auth', 'verified'])->name('warehouse');

Route::get('/service', function () {
    return view('service');
})->middleware(['auth', 'verified'])->name('service');

Route::group(['middleware' => ['auth', 'mechanic']], function () {
});
Route::group(['middleware' => ['auth', 'receptionist']], function () {
});

//TESZTEK
/*
Route::get('/users', function () {
    $users = DB::table('users')->get();
    dd($users);
});

Route::get('/worksheets', function () {
    $worksheets = DB::table('worksheets')->get();
    dd($worksheets);
});

Route::get('/work_processes', function () {
    $work_processes = DB::table('work_processes')->get();
    dd($work_processes);
});

Route::get('/work_process_worksheet', function () {
    $processes_worksheets = DB::table('work_process_worksheet')->get();
    dd($processes_worksheets);
});

Route::get('/materials', function () {
    $materials = DB::table('materials')->get();
    dd($materials);
});

Route::get('/material_worksheet', function () {
    $materials_worksheets = DB::table('material_worksheet')->get();
    dd($materials_worksheets);
});

Route::get('/components', function () {
    $components = DB::table('components')->get();
    dd($components);
});

Route::get('/component_worksheet', function () {
    $components_worksheets = DB::table('component_worksheet')->get();
    dd($components_worksheets);
});
Route::get('/components_complex_query', function () {
    // Munkalapok lekérdezése
    $worksheets = DB::table('worksheets')->get();

    // Munkafolyamatok és azok munkalaphoz való kapcsolatainak lekérdezése
    $processes_worksheets = DB::table('work_process_worksheet')->get();

    // Alkatrészek és azok munkalaphoz való kapcsolatainak lekérdezése
    $components_worksheets = DB::table('component_worksheet')->get();

    // Az összetett eredmény létrehozása
    $result = [];

    // Munkalapokon való iterálás
    foreach ($worksheets as $worksheet) {
        $worksheet_data = [
            'worksheet' => $worksheet,
            'work_processes' => [],
            'components' => []
        ];

        // Az adott munkalaphoz tartozó munkafolyamatok lekérdezése
        $worksheet_processes = $processes_worksheets->where('worksheet_id', $worksheet->id);

        foreach ($worksheet_processes as $process) {
            $process_data = DB::table('work_processes')->find($process->work_process_id);
            $worksheet_data['work_processes'][] = $process_data;
        }

        // Az adott munkalaphoz tartozó alkatrészek lekérdezése
        $worksheet_components = $components_worksheets->where('worksheet_id', $worksheet->id);

        foreach ($worksheet_components as $component) {
            $component_data = DB::table('components')->find($component->component_id);
            $worksheet_data['components'][] = $component_data;
        }

        // Az adott munkalaphoz tartozó adatok hozzáadása az eredményhöz
        $result[] = $worksheet_data;
    }

    // Eredmény kiíratása
    dd($result);
});

Route::get('/materials_complex_query', function () {
    // Anyagok lekérdezése
    $materials = DB::table('materials')->get();

    // Anyagokhoz kapcsolódó munkalapok lekérdezése
    $materials_worksheets = DB::table('material_worksheet')->get();

    // Az összetett eredmény létrehozása
    $result = [];

    // Anyagokon való iterálás
    foreach ($materials as $material) {
        $material_data = [
            'material' => $material,
            'worksheets' => []
        ];

        // Az adott anyaghoz tartozó munkalapok lekérdezése
        $material_worksheets_data = $materials_worksheets->where('material_id', $material->id);

        foreach ($material_worksheets_data as $material_worksheet) {
            $worksheet_data = DB::table('worksheets')->find($material_worksheet->worksheet_id);
            $material_data['worksheets'][] = $worksheet_data;
        }

        // Az adott anyaghoz tartozó adatok hozzáadása az eredményhöz
        $result[] = $material_data;
    }

    // Eredmény kiíratása
    dd($result);
});

Route::get('/work_processes_complex_query', function () {
    // Munkafolyamatok lekérdezése
    $work_processes = DB::table('work_processes')->get();

    // Munkafolyamatokhoz kapcsolódó munkalapok lekérdezése
    $processes_worksheets = DB::table('work_process_worksheet')->get();

    // Az összetett eredmény létrehozása
    $result = [];

    // Munkafolyamatokon való iterálás
    foreach ($work_processes as $process) {
        $process_data = [
            'process' => $process,
            'worksheets' => []
        ];

        // Az adott munkafolyamathoz tartozó munkalapok lekérdezése
        $process_worksheets_data = $processes_worksheets->where('work_process_id', $process->id);

        foreach ($process_worksheets_data as $process_worksheet) {
            $worksheet_data = DB::table('worksheets')->find($process_worksheet->worksheet_id);
            $process_data['worksheets'][] = $worksheet_data;
        }

        // Az adott munkafolyamathoz tartozó adatok hozzáadása az eredményhöz
        $result[] = $process_data;
    }

    // Eredmény kiíratása
    dd($result);
});
*/
require __DIR__ . '/auth.php';
