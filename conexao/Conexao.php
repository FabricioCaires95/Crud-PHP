<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 01/07/2018
 * Time: 22:58
 */

class Conexao
{




    private static $dbNome = 'agenda';
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root';
    private static $dbSenha = '';

    private static $cont = null;

    public function __construct()
    {
        die('A função Init nao é permitido!');
    }

    public static function getConn()
    {
        if(null == self::$cont)
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbNome, self::$dbUsuario, self::$dbSenha);

            }
            catch(PDOException $exception)
            {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }

    public static function desconectar()
    {
        self::$cont = null;
    }




}