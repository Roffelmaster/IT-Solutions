<?php
//database naam: 

//Verbinden met database

function connect_mysql($mysql_host = '127.0.0.1', $mysql_user = 'root', $mysql_password = '', $mysql_database = 'mydb'
            ) {
// Connectie maken 
                if (FALSE !== ( $db_connect = @mysql_connect($mysql_host, $mysql_user, $mysql_password) ) || die(mysql_error())
                ) { 
// Stopt SQl connectie bij errror
//
// Verbind met Database
//           
                 if (FALSE !== @mysql_select_db($mysql_database) || die(mysql_error())) {
                        // Succesvolle connectie met database return de connectie
                        return $db_connect;
                    }
                }
                return FALSE;

}
?>