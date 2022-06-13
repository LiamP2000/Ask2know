<?php
    abstract class Security {
        public static function onlyLoggedInUsers() {
            
            if(!isset($_SESSION['user'])){
                header("Location: login.php");
            }
        }
    }