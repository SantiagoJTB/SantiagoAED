<?php

namespace App\DAO;

use App\Contracts\FiguraContract;
use App\Models\Figura;
use Exception;
use Illuminate\Support\Facades\DB;
use PDO;




class FiguraDAO implements ICrud
{

    
    public function __construct() {}



    public function delete($id): bool{

        
        $myPDO = DB::getPdo();
        $stmt = $myPDO->prepare("DELETE FROM " . FiguraContract::TABLE_NAME. " WHERE ". FiguraContract::COL_ID." = :id");
        return $stmt->execute([':id' => $id]);
        $filasAfectadas = $stmt->rowCount();
        return $filasAfectadas > 0;
    }


    public function update($p): bool{
        $myPDO = DB::getPdo();
        if( !($p->getId() > 0)){
            return false;
        }
        $sql = "UPDATE " . FiguraContract::TABLE_NAME. " SET " . FiguraContract::COL_IMAGEN. " = :imagen, ". FiguraContract::COL_TIPO_IMAGEN. " = :tipo WHERE ". FiguraContract::COL_ID." = :id";
 

        try {
            $myPDO->beginTransaction();
            $stmt = $myPDO->prepare($sql);
            $stmt->execute(
                [
                    ':imagen' => $p->getImagenBinario(),
                    ':tipo' => $p->getMimeType(),
                    ':id' => $p->getId()

                ]
            );
            //si filasAfectadas > 0 => hubo éxito consulta
            $filasAfectadas = $stmt->rowCount();
            echo "<br>afectadas: " . $filasAfectadas;
           
            
            //forzamos un rollback aleatorio para ver que deshace los cambios
            if ($filasAfectadas > 0) {
                
                $myPDO->commit();
                
                
            } else {
                $myPDO->rollback();
                return false;
            }

        } catch (Exception $ex) {
            echo "ha habido una excepción se lanza rollback";
            var_dump($ex);
            $myPDO->rollback();
            return false;
        }
        $stmt = null;
        return true;

    }


    public function findById($id): object | null{
        
      
        $myPDO = DB::getPdo();
        $stmt = $myPDO->prepare("SELECT * FROM " . FiguraContract::TABLE_NAME. " WHERE ". FiguraContract::COL_ID . " = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $p = new Figura();
            $p->setId($row[FiguraContract::COL_ID])
                ->setImagenBinario($row[FiguraContract::COL_IMAGEN])
                ->setImagenBase64(base64_encode($row[FiguraContract::COL_IMAGEN]))
                ->setMimeType($row[FiguraContract::COL_TIPO_IMAGEN]);
            return $p;
        }
            
        return null;
    }

  
    public function findAll(): array 
    {



        $myPDO = DB::getPdo();
        $stmt = $myPDO->prepare("SELECT * FROM " . FiguraContract::TABLE_NAME);
        $stmt->execute();
        $row = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $figuras = [];
        while ($row = $stmt->fetch()) {
            $p = new Figura();
            $p->setId($row[FiguraContract::COL_ID])
                ->setImagenBinario($row[FiguraContract::COL_IMAGEN])
                ->setImagenBase64(base64_encode($row[FiguraContract::COL_IMAGEN]))
                ->setMimeType($row[FiguraContract::COL_TIPO_IMAGEN]);
            $figuras[] = $p;
        }
            
        return $figuras;

    }

    public function save($p): object | null
    {
        $myPDO = DB::getPdo();
        $tablename = FiguraContract::TABLE_NAME;
        $colid = FiguraContract::COL_ID;
        $colimagen = FiguraContract::COL_IMAGEN;
        $coltipo = FiguraContract::COL_TIPO_IMAGEN;
        $sql = "INSERT INTO $tablename ( $colimagen, $coltipo)
        VALUES(:imagen, :tipo)";
        try {
            $myPDO->beginTransaction();
            $stmt = $myPDO->prepare($sql);
            $stmt->execute(
                [
                    ':imagen' => $p->getImagenBinario(),
                    ':tipo' => $p->getMimeType()

                ]
            );
            //si filasAfectadas > 0 => hubo éxito consulta
            $filasAfectadas = $stmt->rowCount();
            echo "<br>afectadas: " . $filasAfectadas;
           
            
            //forzamos un rollback aleatorio para ver que deshace los cambios
            if ($filasAfectadas > 0) {
                //obtenemos el id generado con:
                $idgenerado = $myPDO->lastInsertId();
                $p->setId($idgenerado);                
                $myPDO->commit();
                
                
            } else {
                $myPDO->rollback();
                return null;
            }

        } catch (Exception $ex) {
            echo "ha habido una excepción se lanza rollback";
            var_dump($ex);
            $myPDO->rollback();
            return null;
        }
        $stmt = null;

        return $p;
    }
}
