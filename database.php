<?php

    class Database{

        
        private static $dbHost = "localhost";
        private static $dbName = "bdd_7_6";
        private static $dbUser = "grp_7_6";
        private static $dbUserPass = "hUQCb2PjHG4Z";
        private static $connexion = null;

        public static function connect(){
            
            try{
                self::$connexion = new PDO("mysql:host=" . self::$dbHost .";dbName=". self::$dbName, self::$dbUser, self::$dbUserPass);
            }
            catch(PDOException $e){

                die($e->getMessage()); //Arrêt de l'exécution et affichage du message

            }
            return self::$connexion;
        }
        
        public static function disconnect(){
            self::$connexion = null;
        }

    }

?>