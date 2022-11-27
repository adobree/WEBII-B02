<form action="" method="post" class="form">
    <h2 class="p-0 mb-4 text-center">Regisztráció</h2>

    <!-- Családi név -->
    <div class="input-group input-group-sm mb-3">
        <input class="form-control" type="text" name="csaladi_nev" placeholder="Családi név" id="csaladi_nev" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>
    <!-- Utónév -->
    <div class="input-group input-group-sm mb-3">
        <input class="form-control" type="text" name="utonev" placeholder="Utónév" id="utonev" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>
    <!-- Felhasználónév -->
    <div class="input-group input-group-sm mb-3">
        <input class="form-control" type="text" name="bejelentkezes" placeholder="Felhasználónév" id="bejelentkezes" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>
    <!-- Jelszó -->
    <div class="input-group input-group-sm mb-3">
        <input class="form-control" type="password" name="jelszo" placeholder="Jelszó" id="jelszo" required minlength="5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>
    <!-- Gomb -->
    <div class="input-group input-group-sm mb-3">
        <button type="submit" class="btn btn-primary w-100">Regisztráció</button>
    </div>
</form>