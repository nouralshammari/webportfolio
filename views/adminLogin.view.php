<?php
require ('./layout/header.php');

require('../controllers/adminLogin.controller.php');
?>





<main>
    <section>
        <h2 class = "inloggen_titel">Inloggen</h2>
        <div >
            <form class="login-form" method="post" action="">
                <div class = "form-group">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" name="username" id="username" required></div>
                <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" required></div>
                <button class = "login_knop"type="submit">Login</button>
            </form>

        </div>
        <div class="text1"></div>
    </section>
</main>



<?php require ('./layout/footer.php');?>