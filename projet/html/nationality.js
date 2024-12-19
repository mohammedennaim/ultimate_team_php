const body = document.querySelector("body"),
    modeToggle = body.querySelector(".mode-toggle");
sidebar = body.querySelector("nav");
sidebarToggle = body.querySelector(".sidebar-toggle");
modifier = Array.from(body.querySelectorAll(".fa-square-pen"));
const span = document.querySelectorAll(".erreur");
const labels = document.querySelectorAll(".label");
const inputs = document.querySelectorAll(".inputs");
let arrayInputs = Array.from(inputs);
let player = document.getElementById("ajouter_player");
let nationality = document.getElementById("ajouter_nationality");
let club = document.querySelector("#ajouter_club");

let getMode = localStorage.getItem("mode");
if (getMode && getMode === "dark") {
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if (getStatus && getStatus === "close") {
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
        localStorage.setItem("mode", "dark");
    } else {
        localStorage.setItem("mode", "light");
    }
});


nationality.addEventListener('click', () => {
    let popup_nationality = document.querySelector(".popup-nationality");
    popup_nationality.classList.toggle("show");
});

modifier.forEach(modif => {
    let popup_modifier = document.getElementById("popup");
    modif.addEventListener('click', () => {
        popup_modifier.classList.toggle("show");
    })
});

function validation() {
    const labels = Array.from(document.querySelectorAll("label"));
    let valid = false;
    let cmpt = 0;
    for (let i = 0; i < labels.length; i++) {
        const value = inputs[i].value;
        if (value === "") {
            span[i].innerText = labels[i].innerText+' invalid' ;
        } else {
            span[i].innerText = "";
            cmpt++;
        }
    }
    if (cmpt == 14) {
        valid = true;
    }
}
function add() {
    validation();
}
let position = document.querySelector('#position');
position.addEventListener('change', ()=>{
    const arrayLabel = Array.from(labels);
    formationGK = [
        "rating",
        "diving",
        "handling",
        "kicking",
        "reflexes",
        "speed",
        "positioning",
    ];
    formationJoueurs = [
        "rating",
        "pace",
        "shooting",
        "passing",
        "dribbling",
        "defending",
        "physical",
    ];
    const arrLabel = arrayLabel.map((label) => label);
    const inputsFormation = Array.from(
        document.querySelectorAll(".formation .inputs")
    );
    const arrayInput = inputsFormation.map((input) => input);
    for (let i = 0; i < span.length; i++) {
        span[i].innerText = "";
        
    }
    if (position.value == "GK") {
        for (let i = 1; i < arrLabel.length; i++) {
            arrLabel[i].setAttribute("for", formationGK[i]);
            arrLabel[i].innerText = formationGK[i];
            arrayInput[i].setAttribute("id", formationGK[i]);
            arrayInput[i].setAttribute("name", formationGK[i]);
            arrayInput[i].setAttribute("placeholder", formationGK[i]);
        }

    } else {
        for (let i = 1; i < arrLabel.length; i++) {
            arrLabel[i].setAttribute("for", formationJoueurs[i]);
            arrLabel[i].innerText = formationJoueurs[i];
            arrayInput[i].setAttribute("id", formationJoueurs[i]);
            arrayInput[i].setAttribute("name", formationJoueurs[i]);
            arrayInput[i].setAttribute("placeholder", formationJoueurs[i]);
        }
    }
})

    
