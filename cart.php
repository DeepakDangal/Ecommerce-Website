<?php session_start(); ?>



<?php 
 

 if(isset($_SESSION['product_name'])){

    $filtered_array=array_unique($_SESSION['product_name']);
 
    foreach($filtered_array as $row){

        $item_repeated=array_count_values($_SESSION['product_name']);

         echo $row."---".$item_repeated[$row]."<br>";

        
    }

}


?>
    
</body>
</html>