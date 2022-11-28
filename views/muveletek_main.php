// TODO 3. Feladat + 6. Feladat
/**
(3) AJAX -> Lekérés 3 táblából -> JSON -> (6) JS OOP -> megjelenítés
*/


<script>
    class Sutemeny {
        constructor(suti) {
            this.nev = suti.nev
            this.ertek = suti.ertek
            this.mentes = suti.mentes
        }
        output() {
            /**
             * Minden "Sütemény" példány "output" metódusa visszatér egy html elemmel
             */
            return `
                <tr>
                    <td>${this.nev}</td>
                    <td>${this.ertek}</td>
                    <td>${this.mentes}</td>
                </tr>
            `
        }
    }

    function showResult(str) {
        console.log(str)
        if (str.length == 0) {
            console.log("if ág")
            document.getElementById("eredmeny").innerHTML = "";
            return;
        } else {
            console.log("else ág")
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    /** JSON */
                    const responseJson = JSON.parse(this.responseText);
                    /**
                     * deklaráljuk az "output" kimenetet
                     */
                    let output = '';
                    /** Végigiterálunk a válaszoln */
                    responseJson.forEach((item, index) => {
                        /** Létrehozunk egy példányt */
                        const sutemeny = new Sutemeny(item);
                        /** Meghívjuk a példány metódusát */
                        const returnVal = sutemeny.output();
                        /** Hozzáadjuk a kimenethez */
                        output += returnVal;
                    })
                    /** Beágyazzuk az eredményt az "eredmeny" html elembe */
                    document.getElementById('eredmeny').innerHTML = output;

                    // const obj =
                    //     document.getElementById("eredmeny").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "models/sutemeny_model.php?q=" + str, true);
            const send = xmlhttp.send();

        }
    }
</script>

<div class="row w-100 m-0 mt-1">
    <div class="col col-12 muveletek-bg p-5">
        <h1 class="text-center mt-3 primary-text">Műveletek oldal</h1>
        <img src="images/home_bg.png" alt="">
        <form action="">
            <div class="d-flex flex-column w-50">
                <label for=" fname">Keressen süteményt:</label>
                <input type="text" id="fname" name="fname" onkeyup="showResult(this.value)">
                <table class="table table striped">
                    <thead>
                        <tr>
                            <th scope="col">Sütemény</th>
                            <th scope="col">Ár</th>
                            <th scope="col">Mentes</th>
                        </tr>
                    </thead>
                    <tbody id="eredmeny"></tbody>
                </table>
            </div>
        </form>
    </div>
</div>