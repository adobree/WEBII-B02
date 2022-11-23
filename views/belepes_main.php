<!-- <form action="<?= SITE_ROOT ?>beleptet" method="post">
    <label for="login">Felhasználó:</label><input type="text" name="login" id="login" required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+"><br>
    <label for="password">Jelszó:</label><input type="password" name="password" id="password" required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+"><br>
    <input type="submit" value="Küldés">
</form> -->


<form action="<?= SITE_ROOT ?>beleptet" method="post" class="form">
    <h2 class="p-0 mb-4 text-center">Belépés</h2>
    <div class="input-group input-group-sm mb-3">
        <input type="text" name="login" id="login" placeholder="Felhasználónév" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+">
    </div>
    <div class="input-group input-group-sm mb-3">
        <input type="password" name="password" id="password" placeholder="jelszó" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+">
    </div>
    <div class="input-group input-group-sm mb-3">
        <button type="button" class="btn btn-primary w-100">Bejelentkezés</button>
    </div>
    <a href="regisztracio" class="primary-text">Regisztráljon új fiókot</a>
</form>
<h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>