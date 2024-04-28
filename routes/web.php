<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkProcessController;
use App\Http\Controllers\WorksheetController;
use App\Models\WorkProcess;

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

Route::get('/service', function () {
    return view('service');
})->middleware(['auth', 'verified'])->name('service');

Route::group(['middleware' => ['auth', 'mechanic']], function () {
});
Route::group(['middleware' => ['auth', 'receptionist']], function () {
});

Route::resource('component', ComponentController::class)
    ->only('index', 'create', 'store');
// Route::get('/component', [ComponentController::class, 'index']);
// Route::get('/component/create',[ComponentController::class, 'create']);
// Route::post('/component', [ComponentController::class, 'store']);
// Route::get('/component/{id}/edit', [ComponentController::class, 'edit']);
// Route::put('/component/{id}', [ComponentController::class, 'update']);
// Route::delete('/component/{id}', [ComponentController::class, 'destroy']);

Route::resource('material', MaterialController::class)
    ->only('index', 'create', 'store');
// Route::get('/material', [MaterialController::class, 'index']);
// Route::get('/material/create',[MaterialController::class, 'create']);
// Route::post('/material', [MaterialController::class, 'store']);
// Route::get('/material/{id}/edit', [MaterialController::class, 'edit']);
// Route::put('/material/{id}', [MaterialController::class, 'update']);
// Route::delete('/material/{id}', [MaterialController::class, 'destroy']);

Route::resource('work_process', WorkProcessController::class)
    ->only('index', 'create', 'store');
// Route::get('/work_process', [WorkProcessController::class, 'index']);
// Route::get('/work_process/create',[WorkProcessController::class, 'create']);
// Route::post('/work_process', [WorkProcessController::class, 'store']);
// Route::get('/work_process/{id}/edit', [WorkProcessController::class, 'edit']);
// Route::put('/work_process/{id}', [WorkProcessController::class, 'update']);
// Route::delete('/work_process/{id}', [WorkProcessController::class, 'destroy']);

Route::get('/worksheet/closed', [WorksheetController::class, 'closed'])->name('worksheet.closed');
Route::get('/worksheet/closed/{worksheetid}', [WorksheetController::class, 'closedShow'])->name('worksheet.closed.show');

Route::get('/worksheet', [WorksheetController::class, 'index']);
Route::get('/worksheet/create', [WorksheetController::class, 'create']);
Route::post('/worksheet', [WorksheetController::class, 'store']);
Route::get('/worksheet/{worksheetid}', [WorksheetController::class, 'show'])->name('worksheet.show');
Route::get('/worksheet/{worksheetid}/edit', [WorksheetController::class, 'edit'])->name('worksheet.edit');
Route::put('/worksheet/{worksheetid}', [WorksheetController::class, 'update']);

Route::get('/worksheet/{worksheetid}/edit/closing', [WorksheetController::class, 'closing'])->name('worksheet.closing');
Route::put('/worksheet/{worksheetid}/edit/close', [WorksheetController::class, 'close']);

Route::get('/worksheet/{worksheetid}/component/add', [WorksheetController::class, 'componentCreate'])->name('worksheet.components_add');
Route::post('/worksheet/{worksheetid}/component/store', [WorksheetController::class, 'componentStore']);
Route::get('/worksheet/{worksheetid}/edit/{component_worksheetid}/component', [WorksheetController::class, 'componentsEdit'])->name('worksheet.components_edit');
Route::put('/worksheet/{worksheetid}/{component_worksheetid}/component/update', [WorksheetController::class, 'componentsUpdate']);
Route::delete('/worksheet/{worksheetid}/{component_worksheetid}/component/destroy', [WorksheetController::class, 'componentDestroy']);

Route::get('/worksheet/{worksheetid}/material/add', [WorksheetController::class, 'materialCreate'])->name('worksheet.materials_add');
Route::post('/worksheet/{worksheetid}/material/store', [WorksheetController::class, 'materialStore']);
Route::get('/worksheet/{worksheetid}/edit/{material_worksheetid}/material', [WorksheetController::class, 'materialsEdit'])->name('worksheet.materials_edit');
Route::put('/worksheet/{worksheetid}/{material_worksheetid}/material/update', [WorksheetController::class, 'materialsUpdate']);
Route::delete('/worksheet/{worksheetid}/{material_worksheetid}/material/destroy', [WorksheetController::class, 'materialDestroy']);

Route::get('/worksheet/{worksheetid}/work_process/add', [WorksheetController::class, 'work_processCreate'])->name('worksheet.work_processes_add');
Route::post('/worksheet/{worksheetid}/work_process/store', [WorksheetController::class, 'work_processStore']);
Route::get('/worksheet/{worksheetid}/edit/{work_process_worksheetid}/work_process', [WorksheetController::class, 'work_processesEdit'])->name('worksheet.work_processes_edit');
Route::put('/worksheet/{worksheetid}/{work_process_worksheetid}/work_process/update', [WorksheetController::class, 'work_processesUpdate']);
Route::delete('/worksheet/{worksheetid}/{work_process_worksheetid}/work_process/destroy', [WorksheetController::class, 'work_processDestroy']);

require __DIR__ . '/auth.php';
