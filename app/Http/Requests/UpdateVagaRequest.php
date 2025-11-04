<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVagaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'sometimes|string|max:255',
            'empresa' => 'sometimes|string|max:255',
            'descricao' => 'sometimes|string',
            'localizacao' => 'nullable|string|max:255',
            'salario' => 'nullable|string|max:255',
            'status' => 'in:rascunho,publicada',
            'expira_em' => 'nullable|date',
        ];
    }
}
