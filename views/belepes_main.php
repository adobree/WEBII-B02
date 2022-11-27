<form action="<?= SITE_ROOT ?>beleptet" method="post" class="form">
    <h2 class="p-0 mb-4 text-center">Belépés</h2>
    <div class="input-group input-group-sm mb-3">
        <input type="text" name="login" id="login" placeholder="Felhasználónév" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
    </div>
    <div class="input-group input-group-sm mb-3">
        <input type="password" name="password" id="password" placeholder="jelszó" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
    </div>
    <div class="input-group input-group-sm mb-3">
        <button type="submit" class="btn btn-primary w-100">Bejelentkezés</button>
    </div>
    <a href="regisztracio" class="primary-text">Regisztráljon új fiókot</a>
</form>
<h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>