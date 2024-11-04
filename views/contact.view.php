<?php
require ('./layout/header.php');
require('../controllers/contact.controller.php');
?>




<main class="contact-main">
    <section class = "contact_container">


        <div class="cheadline"><h2>Neem contact op!</h2></div>
        <?php if (!empty($message)): ?>
            <div class="message">
                <p><?php echo htmlspecialchars($message); ?></p>
            </div>
        <?php endif; ?>


        <div class="cform">
            <form method = "post" action="">
                <div class = 'form-group'>
                <label for="fname" >Voornaam: </label><br>
                <input type="text" name="fname"id="voornaam" ><br></div>
                <div class="form-group">
                <label for="lname">Achternaam: </label><br>
                <input name="lname" id="achternaam" type="text"><br></div>
                <div class="form-group">
                <label for="email" >E-mailadress: </label><br>
                <input name="email" id="email" type = "text"><br></div>
                <div class="form-group">
                <label for="vraag" >Vraag/Opmerking: </label><br>
                <textarea name="vraag" id="vraag"  rows="5" cols="50"></textarea><br></div>
                <button type="submit">Invoeren</button>


            </form>
        </div>
        <div class="text1"></div>
    </section>
</main>



<?php
require ('./layout/footer.php');

?>