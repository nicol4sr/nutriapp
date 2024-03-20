$(document).ready(function () {
    $(".js-example-basic-multiple").select2({
        placeholder: "Selecciona algunos alimentos",
        data: items,
        templateResult: function (data) {
            const $result = $(
                `
                    <div class="select2-result-repository clearfix">
                        <div class="select2-result-repository__title">${data.nombre}</div>
                        <div class="select2-result-repository__description">
                            <small style="opacity: 0.75">
                                Calorías: ${data.calorias}, HC: ${data.hc}, Proteinas: ${data.proteinas}, Grasas: ${data.grasas}
                            </small>
                        </div>
                    </div>
                `
            );
            return $result;
        },
    });
});

// Inicializa las variables de total
let totalCalories = 0;
let totalHc = 0;
let totalProteins = 0;
let totalFat = 0;

// Inicializa las variables de máximo
let maxCalories = 170;
let maxHc = 100;
let maxProteins = 120;
let maxFat = 55;

// Función que verifica si se puede realizar una actualización
function canPerformUpdate() {
    return (
        totalCalories >= maxCalories ||
        totalHc >= maxHc ||
        totalProteins >= maxProteins ||
        totalFat >= maxFat
    );
}

// Función que actualiza el texto de la calculadora
// Función que actualiza el texto de la calculadora y cambia el color del texto
// Función que actualiza el texto de la calculadora y cambia el color del texto
function updateText() {
    const caloriesRound = totalCalories.toFixed(2);
    const hcRound = totalHc.toFixed(2);
    const proteinsRound = totalProteins.toFixed(2);
    const fatRound = totalFat.toFixed(2);

    // Actualiza el texto y cambia el color del texto
    $("#calorias")
        .text(caloriesRound)
        .removeClass("text-danger text-success")
        .addClass(
            totalCalories > maxCalories
                ? "text-danger"
                : totalCalories === 0
                ? ""
                : "text-success"
        );
    $("#hc")
        .text(hcRound)
        .removeClass("text-danger text-success")
        .addClass(
            totalHc > maxHc
                ? "text-danger"
                : totalHc === 0
                ? ""
                : "text-success"
        );
    $("#proteinas")
        .text(proteinsRound)
        .removeClass("text-danger text-success")
        .addClass(
            totalProteins > maxProteins
                ? "text-danger"
                : totalProteins === 0
                ? ""
                : "text-success"
        );
    $("#grasas")
        .text(fatRound)
        .removeClass("text-danger text-success")
        .addClass(
            totalFat > maxFat
                ? "text-danger"
                : totalFat === 0
                ? ""
                : "text-success"
        );
}

// Función que actualiza los valores
function updateValues(item, action) {
    if (item != null) {
        if (action === "sum") {
            totalCalories += item.calorias;
            totalHc += item.hc;
            totalProteins += item.proteinas;
            totalFat += item.grasas;
        }

        if (action === "rest") {
            totalCalories -= item.calorias;
            totalHc -= item.hc;
            totalProteins -= item.proteinas;
            totalFat -= item.grasas;
        }
    } else {
        totalCalories = 0;
        totalHc = 0;
        totalProteins = 0;
        totalFat = 0;
    }

    updateText();
}

// Función que inicializa los valores
function init() {
    const selectedOptions = $(".js-example-basic-multiple").val();

    for (let i = 0; i < selectedOptions.length; i++) {
        const option = selectedOptions[i];
        const item = items.find((item) => item.id === parseInt(option));

        if (item) {
            updateValues(item, "sum");
        }
    }
}

// Inicializa los valores
init();

$(".js-example-basic-multiple").on("select2:open", function (e) {
    if (canPerformUpdate()) {
        $(this).select2("close");
    }
});

$(".js-example-basic-multiple").on("select2:unselect", function (e) {
    const item = items.find((item) => item.id === parseInt(e.params.data.id));

    if ($(".js-example-basic-multiple").val() === null) {
        updateValues(null);
    }

    if (item) {
        updateValues(item, "rest");
    }

    const selectedOptions = this.selectedOptions;
    if (selectedOptions.length === 0) {
        updateValues(null);
        return null;
    }
});

$(".js-example-basic-multiple").on("change", function (e) {
    if (canPerformUpdate()) {
        e.preventDefault();
        return null;
    }

    const selectedOptions = this.selectedOptions;

    if (selectedOptions.length === 0) {
        updateValues(null);
        return null;
    }

    for (let i = 0; i < selectedOptions.length; i++) {
        const option = selectedOptions[i];
        const item = items.find((item) => item.id === parseInt(option.value));

        if (item) {
            if (canPerformUpdate()) {
                e.preventDefault();
            } else {
                updateValues(item, "sum");
            }
        }
    }
});
