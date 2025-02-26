<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    // Если таблица имеет имя, отличное от имени модели (например, если таблица называется posts, а модель Post)
    protected $table = 'records';

    // Укажите поля, которые могут быть массово назначены
    protected $fillable = ['name', 'last_name', 'description'];
}
