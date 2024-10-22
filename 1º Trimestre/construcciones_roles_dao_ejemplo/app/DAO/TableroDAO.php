<?php

namespace App\DAO;

use App\Contracts\TableroContract;
use App\Contracts\UsuarioContract;
use App\Models\Figura;
use App\Models\Tablero;
use DateTime;
use Exception;
use Illuminate\Support\Facades\DB;
use PDO;




class TableroDAO implements ICrud
{

    
    public function __construct() {}



    public function delete($id): bool{

        
        $myPDO = DB::getPdo();
        $stmt = $myPDO->prepare("DELETE FROM " . TableroContract::TABLE_NAME. " WHERE ". TableroContract::COL_ID." = :id");
        $stmt->execute([':id' => $id]);
        $filasAfectadas = $stmt->rowCount();
        return $filasAfectadas > 0;
    }


    public function update( $p): bool{
        $myPDO = DB::getPdo();
        if( !($p->getId() > 0)){
            return false;
        }
        $sql = "UPDATE " . TableroContract::TABLE_NAME. 
               " SET " . TableroContract::COL_CONTENIDO. " = :contenido, ". 
               TableroContract::COL_FECHA. " = :fecha, ".
               TableroContract::COL_NOMBRE. " = :nombre, ".
               TableroContract::COL_USUARIO_ID. " = :usuario_id ".
               " WHERE ". TableroContract::COL_ID." = :id";
 

        try {
            $myPDO->beginTransaction();
            $stmt = $myPDO->prepare($sql);
            $stmt->execute(
                [
                    ':contenido' => $p->getContenido(), 
                    ':fecha' => $p->getFecha()->getTimestamp(),
                    ':id' => $p->getId(),
                    ':nombre' => $p->getNombre(),
                    ':usuario_id' => $p->getUsuarioId()

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
        $stmt = $myPDO->prepare("SELECT * FROM " . TableroContract::TABLE_NAME. " WHERE ". TableroContract::COL_ID . " = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $p = new Tablero();
            $p->setId($row[TableroContract::COL_ID])
                ->setContenido($row[TableroContract::COL_CONTENIDO])
                ->setFecha(DateTime::createFromFormat( 'U', $row[TableroContract::COL_FECHA]) )
                ->setNombre($row[TableroContract::COL_NOMBRE])
                ->setUsuarioId($row[TableroContract::COL_USUARIO_ID])  ;
                
            return $p;
        }
            
        return null;
    }




    public function findByUserId($id): array 
    {

        $tablerotable = TableroContract::TABLE_NAME ;

        $tablero_usuario_id =  TableroContract::COL_USUARIO_ID;
  

      

        $myPDO = DB::getPdo();

        $sql = "SELECT * " .
        " FROM $tablerotable " . 
        " WHERE $tablero_usuario_id = $id ";

        $stmt = $myPDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $tableros = [];
        while ($row = $stmt->fetch()) {
            $p = new Tablero();
            $p->setId($row[TableroContract::COL_ID])
                ->setContenido($row[TableroContract::COL_CONTENIDO])
                ->setFecha(DateTime::createFromFormat( 'U', $row[TableroContract::COL_FECHA]) )
                ->setNombre($row[TableroContract::COL_NOMBRE])
                ->setUsuarioId($row[TableroContract::COL_USUARIO_ID])  ;
            $tableros[] = $p;
        }
            
        return $tableros;

    }


  
    public function findAll(): array 
    {



        $myPDO = DB::getPdo();
        $stmt = $myPDO->prepare("SELECT * FROM " . TableroContract::TABLE_NAME);
        $stmt->execute();
        $row = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $tableros = [];
        while ($row = $stmt->fetch()) {
            $p = new Tablero();
            $p->setId($row[TableroContract::COL_ID])
                ->setContenido($row[TableroContract::COL_CONTENIDO])
                ->setFecha(DateTime::createFromFormat( 'U', $row[TableroContract::COL_FECHA]) )
                ->setNombre($row[TableroContract::COL_NOMBRE])
                ->setUsuarioId($row[TableroContract::COL_USUARIO_ID])  ;
            $tableros[] = $p;
        }
            
        return $tableros;

    }



    
    public function save($p): object | null
    {
        $myPDO = DB::getPdo();
        $tablename = TableroContract::TABLE_NAME;
        $colid = TableroContract::COL_ID;
        $colcontenido = TableroContract::COL_CONTENIDO;
        $colfecha = TableroContract::COL_FECHA;
        $colnombre = TableroContract::COL_NOMBRE;
        $colusuario_id = TableroContract::COL_USUARIO_ID;
        $sql = "INSERT INTO $tablename ( $colcontenido, $colfecha, $colnombre, $colusuario_id)
        VALUES( :contenido, :fecha, :nombre, :usuario_id)";

        try {
            $myPDO->beginTransaction();
            $stmt = $myPDO->prepare($sql);
            $stmt->execute(
                [
                    ':contenido' => $p->getContenido(),
                    ':fecha' => $p->getFecha()->getTimestamp(),
                    ':nombre' => $p->getNombre(),
                    ':usuario_id' => $p->getUsuarioId()



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
