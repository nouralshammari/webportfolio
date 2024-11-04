<?php
require('./layout/header.php');


require('../controllers/projecten.controller.php');
?>

<main class="herosection-main">
    <div class="intro-mainpage">
        <h1>Welkom op mijn portfolio!</h1>
        <p> Hey daar! Ik ben Nour Al-Shammari, een gepassioneerde student software developer met een grote liefde voor het bouwen van slimme, gebruiksvriendelijke applicaties. Op deze website deel ik mijn projecten en ervaringen terwijl ik mijn reis maak door de wereld van coderen en technologie. Of het nu gaat om het creëren van dynamische websites, het oplossen van technische uitdagingen of het verkennen van de nieuwste trends, ik ben altijd op zoek naar nieuwe manieren om te groeien en leren. Neem een kijkje en ontdek wat ik tot nu toe heb gemaakt!</p>
    </div>
    <div class="slideshow-container">
        <?php
        // Loop door elk project uit de database en maak een "card" voor de slideshow
        foreach ($projects as $project) {
            echo '<div class="card fade">';
            echo '<h2>' . htmlspecialchars($project['title']) . '</h2>';
            echo '<p>Technologieën: ' . htmlspecialchars($project['technologies']) . '</p>';
            echo '<p>Doel: ' . htmlspecialchars($project['goal']) . '</p>';
            echo '<p>Duur: ' . htmlspecialchars($project['duration']) . '</p>';
            echo '<p>Vaardigheden: ' . htmlspecialchars($project['skills']) . '</p>';
            echo '</div>';
        }
        ?>

        <!-- Navigatie knoppen -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
</main>

<script src="javascript.js"></script>

<?php require('./layout/footer.php'); ?>
