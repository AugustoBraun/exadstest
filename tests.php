<?php
/**
 * Created by:  Augusto Braun
 * ------------------------------------------------------
 * Delivered:   2022-06-02
 * ------------------------------------------------------
 * Description: PHP mais class
 * ------------------------------------------------------
*/

namespace exadsTest;

include('./vendor/autoload.php');

use PDO;
use Exads\ABTestData;



class problems
{
    
    private $db_host        = 'localhost';    
    private $db_user        = 'root';
    private $db_passwd      = '';
    private $db_database    = 'exads';

    // public $line_break      = "\r\n";
    public $line_break      = "<br/>";
    public $db;

    public $days = [
        1 => 'Sunday',
        2 => 'Monday',
        3 => 'Tuesday',
        4 => 'Wednesday',
        5 => 'Thursday',
        6 => 'Friday',
        7 => 'Saturday'
      ];

    public function __construct()
	{
    }


    public function dbConnect()
    {        
        try
        {
            $this->db = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_database,$this->db_user,$this->db_passwd);
        }
        catch ( PDOException $e )
        {
            echo 'Impossible to connect to database: ' . $e->getMessage();
        }
    }

}





?>