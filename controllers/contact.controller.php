<?php
require('DatabaseConnection.php');
// Use the Singleton to get the database connection
$db = Database::getInstance(); //$db is object dat de databaseverbinding beheert (word hier aangemaakt of aangeroepen,kan er maar een van zijn)
$conn = $db->getConnection();  // PDO-verbinding die communiceert met database, $conn gebruik je om queries naar de database uit te voeren

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $vraag = $_POST['vraag'];

    // Prepare the SQL query to insert the data into the database
    $sql = "INSERT INTO contact_berichten (first_name, last_name, email, question)
            VALUES (:fname, :lname, :email, :vraag)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters (named placeholders)
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':vraag', $vraag);

    // Execute the statement
    if ($stmt->execute()) {
        $message =  "Bericht succesvol opgeslagen!";
    } else {
        $message = "Fout bij het opslaan van het bericht: " . implode(", ", $stmt->errorInfo());
    }

}

