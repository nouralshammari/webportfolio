<?php
require('./layout/header.php');
//require('../controllers/DatabaseConnection.php');
require('../controllers/projecten.controller.php');


?>
<main class="project_main">
    <section class="projecten_section">
    <div class="divje"><h2>Projecten Pagina</h2></div>
    <div class = "projecten_container ">

        <div class="">
            <?php

            foreach ($projects as $project) {

                echo "<h3>" . htmlspecialchars($project['title']) . "</h3>";
                echo "<p>Technologieën: " . htmlspecialchars($project['technologies']) . "</p>";
                echo "<p>Doel: " . htmlspecialchars($project['goal']) . "</p>";
                echo "<p>Duur: " . htmlspecialchars($project['duration']) . "</p>";
                echo "<p>Vaardigheden: " . htmlspecialchars($project['skills']) . "</p>";

            }
            ?>


        </div>
    </div>
    </section>
        <div class="text1"></div>
    </div>
</main>


<?php require('./layout/footer.php');?>


