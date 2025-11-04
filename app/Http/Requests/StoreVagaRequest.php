<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVagaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'descricao' => 'required|string',
            'localizacao' => 'nullable|string|max:255',
            'salario' => 'nullable|string|max:255',
            'status' => 'in:rascunho,publicada',
            'expira_em' => 'nullable|date',
        ];
    }
}
