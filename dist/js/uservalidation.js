		function validateUsername(){
            nameEx = /^[a-åAÅ][a-åAÅ. ]{1,19}$/;
            nameOK = nameEx.test(document.skjema.navn.value);
            if (!nameOK) {
                document.getElementById("WrongUsername").innerHTML="Teksten i navn er ikke fylt ut korrekt";
                return false;
            }
            document.getElementById("WrongUsername").innerHTML="";
            return true;
        }
        function validatePassword(){
            epostEx = /^[a-åA-Å0-9]{1,19}[@][a-åA-Å0-9]{1,19}[.][a-åA-Å0-9]{2,4}$/;
            epostOK = epostEx.test(document.skjema.epost.value);
            if (!nameOK) {
                document.getElementById("WrongPassword").innerHTML="Teksten i epost er ikke fylt ut korrekt";
                return false;
            }
            document.getElementById("WrongPassword").innerHTML="";
            return true;
        }
		