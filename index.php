<?php session_start(); 


if(isset($_POST['submit'])){

    if(isset($_SESSION['product_counter'])){
        $_SESSION['product_counter']=$_SESSION['product_counter']+1;
       
      
    }else{
        $_SESSION['product_counter']=1;
        $_SESSION['product_name']=array();
        $_SESSION['product_price']=array();
    }

    $_SESSION['product_name'][$_SESSION['product_counter']]=$_POST['product_name'];
    $_SESSION['product_price'][$_SESSION['product_counter']]=$_POST['product_price'];
    

    

}

if(isset($_POST['destroy'])){
session_destroy();
}

if(isset($_SESSION['product_name'])){
    var_dump($_SESSION['product_name']);

    echo "<br><br>";
    var_dump($_SESSION['product_price']);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro Bazar</title>
</head>
<body>

<p>Cart Item: <?php  if(isset($_SESSION['product_counter'])){  echo $_SESSION['product_counter']; }else{ echo "0"; } ?></p>

 

<form action="" method="POST">
<input type="hidden" name="product_name" value="Milk Skimmed 2%">
<input type="hidden" name="product_price" value="5">
<button type="submit" name="submit" >Add To Cart</button>

</form>


<form action="" method="POST">
<input type="text" name="product_name" value="Orange 2 lb">
<input type="text" name="product_price" value="5">
<button type="submit" name="submit" >Add To Cart</button>
<button type="submit" name="destroy" >Reset</button>

</form>


<form action="" method="POST">
<input type="text" name="product_name" value="Mango 1 lb">
<input type="text" name="product_price" value="10">
<button type="submit" name="submit" >Add To Cart</button>
<button type="submit" name="destroy" >Reset</button>

</form>





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