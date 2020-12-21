<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Mesh</th><th>Base Short Side</th><th>Base Width</th><th>Screen Height</th><th>Fits Outside Tile Dimension</th><th>Material</th><th>Item Number</th><th>Part Number</th><th>Order Price</th><th>Quantity</th><th>Add/Remove Quantity</th>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>";
    } 
    
    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "localhost";
$username = "id14927610_hunkeledigitalinventory";
$password = "YAnkees51!!1234";
$dbname = "id14927610_inventory";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT Mesh, BaseSS, BaseWidth, ScreenHeight, FitsOutsideTileDimensions, Material, ItemNumber, PartNumber, OrderPrice, Quantity FROM Caps"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Gas Log Set</th><th>Item Number</th><th>Log Type</th><th>Minimum Fireplace Opening</th><th>Price</th><th>Qauntity</th><th>Size</th><th>Add/Remove Quantity</th>";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT GasLogSet, ItemNumber,LogType,MinFireplaceOpening, price, Quantity, Size FROM GasLogs"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Back Wall Maker</th><th>Pattern</th><th>Description</th><th>Item Number</th><th>Price</th><th>Qauntity</th><th>Add/Remove Quantity</th>";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT Maker, Pattern, Description, ItemNumber, Price, Quantity FROM BackWalls"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Product Description</th><th>Item Number</th><th>Price</th><th>Quantity</th><th>Type</th><th>Add/Remove Quantity</th>";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT Description, ItemNumber, Price, Quantity, Type FROM Other"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
