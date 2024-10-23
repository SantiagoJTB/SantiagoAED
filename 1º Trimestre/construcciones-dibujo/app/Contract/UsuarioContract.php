<?php

namespace App\Contracts;

final class UsuarioContract {

    public const TABLE_NAME = "usuarios";
    public const COL_ID = "id";
    public const COL_NOMBRE = "nombre";
    public const COL_PASSWORD = "password";
    public const COL_ROL = "rol_id";
    public const COL_ROL_NOMBRE = "rol_nombre"; // Nombre del rol en la relación con la tabla roles.


    private function __construct() {}
}
