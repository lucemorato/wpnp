<?php
/**
 * @author Katija Jurić i Lucija Mikulić
 * @copyright 2022
 */

//The require_once expression will check if the file has already been included, and if so, not include (require) it again.
require_once('./system/core.functions.php');
require_once('./system/util/RequestHandler.class.php');
require_once('./system/exception/SystemException.class.php');

/**
 * GLAVNI FILE, UPRAVLJA CIJELIM PROJEKTOM
 */

 //implementacije klase AppCore
 class AppCore {

    protected static $dbObj; //TODO:da li koristimo staticku varijblu jer cemo u nju spremiti objekt baze koji ce uvijek biti isti, nece se mijenjati?
    //STATIC PROPERTY can be called directly - without creating an instance of a class.

    public function __construct()
    {
        //poziv metode koja instancira klasu MySQLiDatabase
        $this->initDB(); 
        $this->initOptions(); 
        RequestHandler::handle();
    }

    public function handleException(Exception $e) {
    //     $e->show(); //TODO: ovo triba provjerit

    }

    public function initDB() {
        //učitava datoteku sa podacima za povezivanje s bazom
        require('./system/config.inc.php');
        require('./system/model/MySQLiDatabase.class.php');
        //instancira klasu MySQLiDatabase i sprema objekt u staticki property $dbObj
        self::$dbObj = new MySQLiDatabase(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    }

   //The final keyword prevents child classes from overriding a method.
    public static final function getDB() {
        return self::$dbObj;
    }

    public function initOptions() {
        require('./system/options.inc.php');
    }
 }