<?php 


$array = array() ; 

var_dump($array) ;

$array = array(
				'nama'=>'dodi',
				'kelas' =>array(
									'smp',
									'sma',
									array('merah','kuning')
								)
			); 

echo "warna ". ($array['kelas'][2][1])." <br>";


var_dump($array) ; 
 
for ( $i=0 ; $i<=10; $i++)
{
	$array[] = $i; 
}

var_dump($array) ; 

 
$array2[] = 'a'; 
$array2[] = 'b'; 
$array2[] = 'c'; 


foreach ( $array2 as $row )
{
	$array[] = $row ; 
}

var_dump($array) ; 



?>