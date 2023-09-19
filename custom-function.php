<?php

function findEven($array){


 for ($i=0;$i<count($array);$i++){
    
    if($array[$i] % 2==0){
        $array[$i]='bang';
    }

 }
 return json_encode($array);
}
 echo findEven(array(1,2,3,4,5,6,7,8,9))
?>