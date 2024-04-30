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

Route::group(['middleware' => ['auth', 'mechanic']], function () {
});
Route::group(['middleware' => ['auth', 'receptionist']], function () {
});

Route::resource('component', ComponentController::class)
    ->only('index', 'create', 'store');

Route::resource('material', MaterialController::class)
    ->only('index', 'create', 'store');

Route::resource('work_process', WorkProcessController::class)
    ->only('index', 'create', 'store');

//closed worksheet operations
Route::get('/worksheet/closed', [WorksheetController::class, 'closed'])->name('worksheet.closed');
Route::get('/worksheet/closed/{worksheetid}', [WorksheetController::class, 'closedShow'])->name('worksheet.closed.show');

//Base operations
Route::get('/worksheet', [WorksheetController::class, 'index']);
Route::get('/worksheet/create', [WorksheetController::class, 'create']);
Route::post('/worksheet', [WorksheetController::class, 'store']);
Route::get('/worksheet/{worksheetid}', [WorksheetController::class, 'show'])->name('worksheet.show');
Route::get('/worksheet/{worksheetid}/edit', [WorksheetController::class, 'edit'])->name('worksheet.edit');
Route::put('/worksheet/{worksheetid}', [WorksheetController::class, 'update']);

//worksheet closing
Route::get('/worksheet/{worksheetid}/edit/closing', [WorksheetController::class, 'closing'])->name('worksheet.closing');
Route::put('/worksheet/{worksheetid}/edit/close', [WorksheetController::class, 'close']);

//CRUD components to the worksheet
Route::get('/worksheet/{worksheetid}/component/add', [WorksheetController::class, 'componentCreate'])->name('worksheet.components_add');
Route::post('/worksheet/{worksheetid}/component/store', [WorksheetController::class, 'componentStore']);
Route::get('/worksheet/{worksheetid}/edit/{component_worksheetid}/component', [WorksheetController::class, 'componentsEdit'])->name('worksheet.components_edit');
Route::put('/worksheet/{worksheetid}/{component_worksheetid}/component/update', [WorksheetController::class, 'componentsUpdate']);
Route::delete('/worksheet/{worksheetid}/{component_worksheetid}/component/destroy', [WorksheetController::class, 'componentDestroy']);

//CRUD materials to the worksheet
Route::get('/worksheet/{worksheetid}/material/add', [WorksheetController::class, 'materialCreate'])->name('worksheet.materials_add');
Route::post('/worksheet/{worksheetid}/material/store', [WorksheetController::class, 'materialStore']);
Route::get('/worksheet/{worksheetid}/edit/{material_worksheetid}/material', [WorksheetController::class, 'materialsEdit'])->name('worksheet.materials_edit');
Route::put('/worksheet/{worksheetid}/{material_worksheetid}/material/update', [WorksheetController::class, 'materialsUpdate']);
Route::delete('/worksheet/{worksheetid}/{material_worksheetid}/material/destroy', [WorksheetController::class, 'materialDestroy']);

//CRUD work_processes to the worksheet
Route::get('/worksheet/{worksheetid}/work_process/add', [WorksheetController::class, 'work_processCreate'])->name('worksheet.work_processes_add');
Route::post('/worksheet/{worksheetid}/work_process/store', [WorksheetController::class, 'work_processStore']);
Route::get('/worksheet/{worksheetid}/edit/{work_process_worksheetid}/work_process', [WorksheetController::class, 'work_processesEdit'])->name('worksheet.work_processes_edit');
Route::put('/worksheet/{worksheetid}/{work_process_worksheetid}/work_process/update', [WorksheetController::class, 'work_processesUpdate']);
Route::delete('/worksheet/{worksheetid}/{work_process_worksheetid}/work_process/destroy', [WorksheetController::class, 'work_processDestroy']);

require __DIR__ . '/auth.php';
