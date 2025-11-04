<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVagaRequest;
use App\Http\Requests\UpdateVagaRequest;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VagaController extends Controller
{
    /**
     * Listar todas as vagas publicadas (rota pública)
     */
    public function index()
    {
        $vagas = Vaga::where('status', 'publicada')
            ->latest()
            ->with('user:id,name,email')
            ->paginate(10);

        return response()->json($vagas);
    }

    /**
     * Exibir uma vaga específica (rota pública)
     */
    public function show(string $slug)
    {
        $vaga = Vaga::where('slug', $slug)
            ->where('status', 'publicada')
            ->with('user:id,name,email')
            ->firstOrFail();

        return response()->json($vaga);
    }

    /**
     * Criar nova vaga (autenticado)
     */
    public function store(StoreVagaRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $vaga = Vaga::create($data);

        return response()->json([
            'message' => 'Vaga criada com sucesso!',
            'vaga' => $vaga
        ], 201);
    }

    /**
     * Atualizar vaga (somente o dono)
     */
    public function update(UpdateVagaRequest $request, Vaga $vaga)
    {
        $this->authorize('update', $vaga);

        $vaga->update($request->validated());

        return response()->json([
            'message' => 'Vaga atualizada com sucesso!',
            'vaga' => $vaga
        ]);
    }

    /**
     * Excluir vaga (somente o dono)
     */
    public function destroy(Vaga $vaga)
    {
        $this->authorize('delete', $vaga);

        $vaga->delete();

        return response()->json(['message' => 'Vaga excluída com sucesso!']);
    }

    /**
     * Listar vagas do usuário autenticado (área da empresa)
     */
    public function mine()
    {
        $vagas = Vaga::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return response()->json($vagas);
    }
}
