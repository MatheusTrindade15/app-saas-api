    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Api\VagaController;

    // ROTAS PÚBLICAS
    Route::get('/vagas', [VagaController::class, 'index']);
    Route::get('/vagas/{slug}', [VagaController::class, 'show']);

    // ROTAS PROTEGIDAS (apenas usuários autenticados via Sanctum)
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/vagas', [VagaController::class, 'store']);
        Route::put('/vagas/{vaga}', [VagaController::class, 'update']);
        Route::delete('/vagas/{vaga}', [VagaController::class, 'destroy']);
        Route::get('/minhas-vagas', [VagaController::class, 'mine']);
    });
