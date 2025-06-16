<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'conteudo',
        'publico',
        'imagem',
        'destinatario_id',
    ];

    // Autor do post
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Destinatário (se for privado)
    public function destinatario()
    {
        return $this->belongsTo(User::class, 'destinatario_id');
    }
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
