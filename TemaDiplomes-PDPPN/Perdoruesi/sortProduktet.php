<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=pdppn;charset=utf8", "root", "");



if (isset($_POST["action"])) {
    $query = "
  SELECT * FROM produktet WHERE stoku > '0'
 ";
    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
        $query .= "
   AND qmimi BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'
  ";
    }
    if (isset($_POST["kategoria"])) {
        $kat_filter = implode("','", $_POST["kategoria"]);
        $query .= " AND  kategoriaID IN('".$kat_filter."')";
    }
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output = '';
    if ($total_row > 0) {
        foreach ($result as $row) {
            $output .= '<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 hvr-grow">
   <div class="product" style="border:1px solid #b7b7b7;padding-bottom:10px;">
       <div class="product__inner">
           <div class="pro__thumb">
               <a href="detajeProduktit.php?produktID=' . $row['produktID'] . '">
                  <img style="object-fit: contain;" width="100" height="150" src="' . $row['imazhi1'] . '" alt="product images"></a>
           </div>
       </div>
       <div class="product__details">
       <h2><a href="detajeProduktit.php?produktID=' . $row['produktID'] . '">' .mb_substr($row['produkti'], 0, 25, "utf-8"). '...' .'</a></h2>
          <ul class="product__price">
               <li class="new__price">' . $row['qmimi'] . '</li>
           </ul>
       </div>
   </div>
</div>';
        }
    } else {
        $output = '<h3 class="title__line text-center">Nuk u gjend asnjë produkt!</h3>';
    }
    echo $output;
}

?>