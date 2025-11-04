<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'titulo',
        'slug',
        'empresa',
        'descricao',
        'localizacao',
        'salario',
        'status',
        'expira_em',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vaga) {
            if (empty($vaga->slug)) 
                {
                $vaga->slug = Str::slug($vaga->titulo);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
