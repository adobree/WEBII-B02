<script>
    class Sutemeny {
        constructor(suti) {
            this.suti = suti
        }

    }

    function showHint(str) {
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
                    console.log("RES: ", this)
                    document.getElementById("eredmeny").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "models/sutemeny_model.php?q=" + str, true);
            xmlhttp.send();
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
                <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
                <div id="eredmeny"></div>
            </div>
        </form>
    </div>
</div>