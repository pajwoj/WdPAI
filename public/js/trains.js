function autocomplete(inp) {
    var currentFocus;
    inp.addEventListener("input", async function (e) {

        document.getElementById("submit").style.display = "none";
        var response;

        let urlencoded = (new URLSearchParams({train: inp.value})).toString();
        response = await fetch('TrainSearchAPI' + "?" + urlencoded, {});

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
        document.getElementById("submit").style.display = "flex";
        document.getElementById("submit").style.alignItems = "center";
        document.getElementById("submit").style.justifyContent = "center";
        document.getElementById("train").style.display = "flex";

        closeAllLists(e.target);
    });
}

window.array = []

let train = document.getElementById("train");

train.addEventListener('input', () => getFormData('TrainSearchAPI', {train: train.value}));
train.addEventListener('propertychange', () => getFormData('TrainSearchAPI', {train: train.value}));

async function getFormData(url = '', data) {
    let urlencoded = (new URLSearchParams(data)).toString();
    const response = await fetch(url + "?" + urlencoded, {});

    array = Array.from(await response.json())
}

autocomplete(train)