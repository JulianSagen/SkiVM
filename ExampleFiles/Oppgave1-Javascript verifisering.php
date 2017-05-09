<html>
    <head>
        <title>Oppgave1</title>
    </head>
    <body>


        <form action="" method="post" id="product-form" name="skjema">
            <h2>Velg ønsket plate:</h2>

            <label for="produkt_1">
                <img src="images/produkt_1.jpg" />
                Fly By Night <br/> Rush
            </label>
            <input type="radio" name="produkt" id="produkt_1" value="1" />

            <label for="produkt_2">
                <img src="images/produkt_2.jpg" />
                Honky Dory <br/> David Bowie
            </label>
            <input type="radio" name="produkt" id="produkt_2" value="2" />

            <label for="produkt_3">
                <img src="images/produkt_3.jpg" />
                Dressed Up <br/> Copeland
            </label>
            <input type="radio" name="produkt" id="produkt_3" value="3" />

            <h2>Fyll inn kundedetaljer:</h2>
            <!-- Her skal skjemaet utvides -->

            <label>Fornavn: </label><input type="text" name="navn" id="navn" onchange="valider_navn()"/> <br><div id="feilNavn"></div>
            <label>Epost: </label><input type="text" name="epost" id="epost"onchange="valider_epost()"><div id="feilEpost"></div>
            <label>Addresse: </label><input type="text" name="addresse" id="addresse"onchange="valider_addresse()"/> <br><div id="feilAddresse"></div>

            <h2>Velg hvilket format du ønsker å få levert varen i:</h2>

            <label>
                CD:
                <input type="radio" name="format" id="cd"/>
            </label>
            <label>
                Vinyl:
                <input type="radio" name="format" id="vinyl"/>
            </label>
            <label>
                Digital nedlastning:
                <input type="radio" name="format" id="digitalt"/>
            </label>

            <h2>Velg ønsket betalingsmetode:</h2>

            <label>Bankkort</label> <input type="radio" name="paymenttype" id="bankkort">
            <label>Faktura:</label> <input type="radio" name="paymenttype" id="faktura">
            <br>

            <input type="submit" name="submit" id="submit" value="Send inn bestilling">


        </form>

        <!--Oppgave2-->
        <script type="text/javascript">
        function valider_navn(){

            console.log("Validerer navn");
            nameEx = /^[a-åAÅ][a-åAÅ. ]{1,19}$/;
            nameOK = nameEx.test(document.skjema.navn.value);
            if (!nameOK) {
                document.getElementById("feilNavn").innerHTML="Teksten i navn er ikke fylt ut korrekt";
                console.log("Tect validering feil");
                return false;
            }
            console.log("Tekst validering korrekt");
            document.getElementById("feilNavn").innerHTML="";
            return true;
        }
        function valider_epost(){

            console.log("Validerer epost");
            epostEx = /^[a-åA-Å0-9]{1,19}[@][a-åA-Å0-9]{1,19}[.][a-åA-Å0-9]{2,4}$/;
            epostOK = epostEx.test(document.skjema.epost.value);
            if (!nameOK) {
                document.getElementById("feilEpost").innerHTML="Teksten i epost er ikke fylt ut korrekt";
                console.log("Epost validering feil");
                return false;
            }
            console.log("Epost validering korrekt");
            document.getElementById("feilEpost").innerHTML="";
            return true;
        }
        function valider_addresse(){

            console.log("Validerer addresse");
            nameEx = /^[a-åA-Å0-9][a-åA-Å0-9 ]{1,19}$/;
            nameOK = nameEx.test(document.skjema.addresse.value);
            if (!nameOK) {
                document.getElementById("feilAddresse").innerHTML="Teksten i addressefeltet er ikke fylt ut korrekt";
                console.log("Addresse validering feil");
                return false;
            }
            console.log("Addrese validering korrekt");
            document.getElementById("feilAddresse").innerHTML="";
            return true;
        }
        </script>
        </script>


    </body>

</html>