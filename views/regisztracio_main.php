<form action="<?= SITE_ROOT ?>beleptet" method="post" class="form">
    <h2 class="p-0 mb-4 text-center">Regisztráció</h2>

    <!-- Felhasználónév -->
    <div class="input-group input-group-sm mb-3">
        <input class="form-control" type="text" name="felhasznalonev" placeholder="Felhasználónév" id="felhasznalonev" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>
    <!-- Email -->
    <div class="input-group input-group-sm mb-3">
        <input class="form-control" type="text" name="email" placeholder="Email" id="email" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>
    <!-- Jelszó -->
    <div class="input-group input-group-sm mb-3">
        <input class="form-control" type="password" class="re" name="jelszo" placeholder="Jelszó" id="jelszo" required minlength="5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>
    <!-- Gomb -->
    <div class="input-group input-group-sm mb-3">
        <button type="button" value="Küldés" class="btn btn-primary w-100">Regisztráció</button>
    </div>
</form>