<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Hotel Guests List</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/normalize.min.css">
        <link rel="stylesheet" href="../css/style.css">
 </head>
    <body>

<section class="hotel-guests">
<?php
$servername = getenv('myfirstproject-deusvastator.c9users.io');
$username= 'deusvastator';
$password = "";
$database = "c9";
$dbport = 3306;
$dbname = "storedata";

$db = new mysqli($servername, $username, $password, $database, $dbport);
if ($db->connect_error) {
    die("Connection Failed: " . $db->connection_error);
}

echo ("connected Successfully: " . $db->host_info);

mysqli_select_db($db, $dbname);

if (empty($result)) {
$sql = "CREATE TABLE WowSurvey(id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
roomsize VARCHAR(50),
checkin VARCHAR(50)
)";

if ($db->query($sql) === TRUE) {
    print_r("<br>Table WowSurvey was created to successfully.");
} else {
    print_r("<br>There was an error creating the table: " . $db->error);
}

$first_name = mysqli_real_escape_string($db, $_POST['firstname']);
$last_name = mysqli_real_escape_string($db, $_Post['lastname']);
$room_size = $_POST['roomsize'];
$check_in = $_POST['checkin'];
}

$hotel_insert = "INSERT INTO HotelGuests (firstname, lastname, roomsize, checkin) VALUES ('$first_name', '$last_name', '$room_size', '$check_in')";

if (mysqli_query($db, $hotel_insert)) {
    print_r("<br>Record added successfully.");
} else {
    print_r("<br>Error: " . mysqli_error($db));
}

print_r("<h1>Our Current Guests</h1>");

$sql = "SELECT id, firstname, lastname, roomsize, checkin FROM HotelGuests";
$hotelresult = $db->query($sql);

if ($hotelresult->num_rows > 0) {
    while ($row = $hotelresult->fetch_assoc()) {
    echo "Guest ID: " . $row["id"] . "<br>Guest Name: " . 
    $row["firstname"] . " " . $row["lastname"] . "<br>Room Type: " . 
    $row["roomsize"] . "<br> Check In: " . $row["checkin"] . "<br><br>";
}
} else { 
    print_r("<br>No results to display.");
}




$db->close();

?>
   
   <a href="../index.html">Back to Form</a>
        </section>
      <script src="js/main.js"></script>
    </body>
</html>