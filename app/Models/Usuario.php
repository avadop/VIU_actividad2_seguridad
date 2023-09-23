<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nombre',
        'apellidos',
        'dni',
        'email',
        'password',
        'telefono',
        'pais',
        'cuentaBancaria',
        'sobreTi',
    ];

    public static function getAllUsuarios()
    {
        return self::all();
    }

    public static function getUsuarioById($id)
    {
        return self::findOrFail($id);
    }

    public function createUsuario()
    {
        return self::save();
    }
    
    public function updateUsuario()
    {
        return self::save();
    }

    public function deleteUsuario()
    {
        return self::delete();
    }  

}
