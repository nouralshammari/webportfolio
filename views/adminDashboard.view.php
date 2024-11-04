<?php
require('./layout/header.php');
require('../controllers/adminDashboard.controller.php');
?>



<main class="admin_dashboard">
    <section class="contact_container">
        <div class="cheadline">
            <h1>Welkom op de Admin page</h1>
        </div>

        <div class="cform">
            <h2>Ingekomen Contactberichten</h2>

            <table border="1">
                <tr>
                    <th>Naam</th>
                    <th>E-mail</th>
                    <th>Vraag/Opmerking</th>
                    <th>Ingekomen op</th>
                    <th>Verwijderen</th>
                </tr>

                <?php
                //weergave ingevulde contactformulieren
                if (count($result) > 0) {
                    // Loop through each row
                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['question']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                        echo "<td><a href='adminDashboard.view.php?delete=" . $row['id'] . "' onclick='return confirm(\"Weet je zeker dat je dit bericht wilt verwijderen?\");'>Verwijderen</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Geen berichten gevonden</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="project_section">
            <h2>Projecten</h2>

            <?php
            // Fetch all projects
            foreach ($projects as $project) {
                echo "<h4 class = 'project-h4'>" . htmlspecialchars($project['title']) . "</h4>";
                echo "<p class = 'project-p'>Technologieën: " . htmlspecialchars($project['technologies']) . "</p>";
                echo "<p class = 'project-p'>Doel: " . htmlspecialchars($project['goal']) . "</p>";
                echo "<p class = 'project-p'>Duur: " . htmlspecialchars($project['duration']) . "</p>";
                echo "<p class = 'project-p'>Vaardigheden: " . htmlspecialchars($project['skills']) . "</p>";

                // Edit and Delete buttons
                echo '<form method="get" action="" class="form-button">
                      <input type="hidden" name="edit" value="' . $project['id'] . '">
                     <button type="submit">Bewerk</button>
                     </form>';
               echo'</br>';
                echo'</br>';
                echo '<form method="post" action="" class="form-button">
                        <input type="hidden" name="delete_project_id" value="' . $project['id'] . '">
                        <button class="verwijder" type="submit">Verwijder</button>
                      </form>';
            }
            ?>
        </div>

        <?php
        // Initialize variables for the form fields
        $project_id = '';
        $title = '';
        $technologies = '';
        $goal = '';
        $duration = '';
        $skills = '';

        // Check if the 'edit' parameter is set in the URL for editing a project
        if (isset($_GET['edit'])) {
            $project_id = $_GET['edit'];

            // Fetch the project from the database
            $stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
            $stmt->execute([$project_id]);
            $project = $stmt->fetch();

            //var_dump($project);

            // If the project exists, populate the form fields
            if ($project) {
                $title = htmlspecialchars($project['title']);
                $technologies = htmlspecialchars($project['technologies']);
                $goal = htmlspecialchars($project['goal']);
                $duration = htmlspecialchars($project['duration']);
                $skills = htmlspecialchars($project['skills']);
            } else {
                echo "Geen project gevonden om te bewerken.";
            }
        }
        ?>

        <form method="post" action="">
            <input type="hidden" name="project_id" value="<?php echo htmlspecialchars($project_id); ?>">
            <div class = 'form-group'>
            <label>Titel:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required><br>
            </div>
            <div class="form-group">
            <label>Technologieën:</label>
            <input type="text" name="technologies" value="<?php echo htmlspecialchars($technologies); ?>" required><br>
            </div>
            <div class = 'form-group'>
            <label>Doel:</label>
            <textarea name="goal" required><?php echo htmlspecialchars($goal); ?></textarea><br>
            </div>
            <div class = 'form-group'>
            <label>Duur:</label>
            <input type="text" name="duration" value="<?php echo htmlspecialchars($duration); ?>" required><br>
            </div>
            <div class = 'form-group'>
            <label>Vaardigheden:</label>
            <input type="text" name="skills" value="<?php echo htmlspecialchars($skills); ?>" required><br>
            </div>
            <button class= "save-button" type="submit" name="submit">Opslaan</button>
        </form>
    </section>
</main>

<?php
require('./layout/footer.php');
?>
