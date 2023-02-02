function autocomplete(inp) {
    var currentFocus;
    inp.addEventListener("input", async function (e) {

        document.getElementById("time").style.display = "none";
        document.getElementById("submit").style.display = "none";
        var response;

        if((inp.getAttribute('id')) == "from") {
            document.getElementById("to").style.display = "none";
            let urlencoded = (new URLSearchParams({start: inp.value})).toString();
            response = await fetch('StartStationSearchAPI' + "?" + urlencoded, {});
        }

        if((inp.getAttribute('id')) == "to") {
            document.getElementById("from").style.display = "none";
            let urlencoded = (new URLSearchParams({end: inp.value})).toString();
            response = await fetch('EndStationSearchAPI' + "?" + urlencoded, {});
        }

        array = Array.from(await response.json())

        var a, b, i, val = this.value;
        closeAllLists();

        if (!val) {
            return false;
        }

        currentFocus = -1;

        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");

        this.parentNode.appendChild(a);

        for (i = 0; i < array.length; i++) {
            if (window.array[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                b = document.createElement("DIV");
                b.innerHTML = "<strong>" + array[i].substr(0, val.length) + "</strong>";
                b.innerHTML += array[i].substr(val.length);
                b.innerHTML += "<input type='hidden' value='" + array[i] + "'>";
                b.addEventListener("click", function (e) {
                    inp.value = this.getElementsByTagName("input")[0].value;
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });

    inp.addEventListener("keydown", function (e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 13) e.preventDefault();
    });

    function closeAllLists(elmnt) {
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    document.addEventListener("click", function (e) {
        document.getElementById("time").style.display = "flex";
        document.getElementById("submit").style.display = "flex";
        document.getElementById("submit").style.alignItems = "center";
        document.getElementById("submit").style.justifyContent = "center";
        document.getElementById("from").style.display = "flex";
        document.getElementById("to").style.display = "flex";

        closeAllLists(e.target);
    });
}

window.array = []

let inputFrom = document.getElementById("from");
let inputTo = document.getElementById("to");

inputFrom.addEventListener('input', () => getFormData('StartStationSearchAPI', {start: inputFrom.value}));
inputFrom.addEventListener('propertychange', () => getFormData('StartStationSearchAPI', {start: inputFrom.value}));

inputTo.addEventListener('input', () => getFormData('EndStationSearchAPI', {end: inputTo.value}));
inputTo.addEventListener('propertychange', () => getFormData('EndStationSearchAPI', {end: inputTo.value}));

async function getFormData(url = '', data) {
    let urlencoded = (new URLSearchParams(data)).toString();
    const response = await fetch(url + "?" + urlencoded, {});

    array = Array.from(await response.json())
}

autocomplete(inputFrom)
autocomplete(inputTo)