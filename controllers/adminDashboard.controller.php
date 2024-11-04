<?php
session_start();

// Check of de admin is ingelogd
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adminLogin.view.php');
    exit;
}


//?>



<?php



require('../controllers/db_connection.php'); // database connectie

//die(var_dump($conn));
// Check for delete request
if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];

    // Ensure that $conn is properly initialized
    if ($conn) {
        // Prepare the SQL query to delete the message
        $sql = "DELETE FROM contact_berichten WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $idToDelete, PDO::PARAM_INT);

        // Voer delete statement uit
        if ($stmt->execute()) {
            echo "Bericht succesvol verwijderd!";

            header("Location: adminDashboard.view.php");
            exit;
        } else {
            echo "Fout bij het verwijderen van het bericht: " . implode(", ", $stmt->errorInfo());
        }
    } else {
        echo "Database connection is null.";
    }
}

?>

<?php
// Query to fetch contact messages using PDO
$sql = "SELECT * FROM contact_berichten";

// Prepare and execute the query  // This includes your PDO connection
$stmt = $conn->prepare($sql);
$stmt->execute();

// Fetch all rows
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php


if (isset($_POST['submit'])) {
    $project_id = $_POST['project_id'];
    $title = $_POST['title'];
    $technologies = $_POST['technologies'];
    $goal = $_POST['goal'];
    $duration = $_POST['duration'];
    $skills = $_POST['skills'];

    if (!empty($project_id)) {
        // Update existing project
        $query = "UPDATE projects SET title = ?, technologies = ?, goal = ?, duration = ?, skills = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$title, $technologies, $goal, $duration, $skills, $project_id]);
    } else {
        // Create new project
        $query = "INSERT INTO projects (title, technologies, goal, duration, skills) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$title, $technologies, $goal, $duration, $skills]);
    }

    // Redirect back to the dashboard
    header('Location: adminDashboard.view.php');
    exit;
}


// Initialize $projects to avoid null error
$projects = [];

// Fetch all projects
try {
    $query = $conn->query("SELECT * FROM projects");
    if ($query) {
        $projects = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Geen projecten gevonden.";
    }
} catch (PDOException $exception) {
    echo "Fout bij het ophalen van projecten: " . $e->getMessage();
}


// Check if the delete request is received
if (isset($_POST['delete_project_id'])) {
    $project_id = $_POST['delete_project_id'];

    // Ensure that $project_id is a valid integer
    if (is_numeric($project_id)) {
        try {
            // Prepare the DELETE query
            $query = "DELETE FROM projects WHERE id = :id";
            $stmt = $conn->prepare($query);

            // Bind the project ID to the query
            $stmt->bindParam(':id', $project_id, PDO::PARAM_INT);

            // Execute the query
            if ($stmt->execute()) {
                // Successfully deleted, redirect back to the admin dashboard
                header("Location: adminDashboard.view.php");
                exit;
            } else {
                echo "Er is een fout opgetreden bij het verwijderen van het project.";
            }
        } catch (PDOException $exception) {
            echo "Fout bij het verwijderen van het project: " . $exception->getMessage();
        }
    } else {
        echo "Ongeldig project ID.";
    }
}













