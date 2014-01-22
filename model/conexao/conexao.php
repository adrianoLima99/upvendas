<?php
final class Connection extends PDO
{
       
public function __construct(){
 try{
        parent::__construct('pgsql:host=localhost dbname=dokeprecisa user=postgres password=root');
    }catch(PDOException $e)
	{
        echo 'Error: '.$e->getMessage();
    }
    						}
}



?>
