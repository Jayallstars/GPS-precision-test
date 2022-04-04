<?php
//$conn = new mysqli();

if ($conn->connect_errno) {
        echo "Failed to connect to MySQL : ", $conn->connect_error;
        exit();
}

$stmt = "SELECT * FROM data_set ORDER BY id DESC";
$result = $conn->query($stmt);
$resultArray = array();
while ($row = $result->fetch_array()) {
        $resultArray[] = $row;
}
?>
<script>
        var data = <?= json_encode($resultArray) ?>;
        var lat = [];
        var lng = [];
        var test;
        for (var i = 0; i < data.length; i++) {
                var json = JSON.parse(data[i][1]);
                var text = json["payload_parsed"];
                var myArray = text.split(",");
                var lat_store = (myArray[1] / 10000000).toPrecision(7);
                var lng_store = (myArray[2] / 10000000).toPrecision(8);
                lat.push(lat_store);
                lng.push(lng_store);
        }
</script>