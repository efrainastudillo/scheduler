<?php

/**
 * Usuario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    scheduler
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Usuario extends BaseUsuario
{
    public function save(Doctrine_Connection $conn = null)
    {
      // ...
       
         $tkn=sha1($this->getMatricula().rand(11111, 99999));
       
       if (!$this->getToken())
       {
         $this->setToken($tkn);
       }
       
       
         $tkn=sha1($this->getNombreUsuario().rand(11111, 99999));
       
       if (!$this->getSearchToken())
       {
         $this->setSearchToken($tkn);
       }

      return parent::save($conn);
    }
    public static function usuariosByTag($tag,$user_id_logged,$users_shared){
        $resultados=array();
        $query="u.id != '".$user_id_logged."'";
        foreach ($users_shared as $user) {
            $query=$query." AND "."u.id != '".$user->getId()."'";
        }
        
        $usuarios = Doctrine_Core::getTable("Usuario")
                ->createQuery('u')
                ->where("u.admin=false")
                ->andWhere("u.activo=true")
                ->andWhere('u.matricula IS NOT NULL') //excluir profesores
                ->andWhere($query)
                ->andWhere("concat(lower(SUBSTRING_INDEX(u.nombres,' ',1)),' ',lower(u.apellidos)) LIKE '%".$tag."%'")
                ->limit(5)
                ->execute();
      foreach($usuarios as $usuario){
          array_push($resultados, array("value" => $usuario->getSearchToken(),"caption" => Utility::FName($usuario->getNombres())." ".$usuario->getApellidos(),"matricula" => $usuario->getMatricula()));
          
      }
      return $resultados;
    }
}