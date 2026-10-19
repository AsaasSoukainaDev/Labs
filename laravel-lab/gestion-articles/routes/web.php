
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;

Route::get('/categories', [CategorieController::class, 'index']);
