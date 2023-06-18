function toggleFilter() {
    var filterBtn = document.getElementById("filter_btn");
    var isFilterActive = filterBtn.checked;
    if (isFilterActive) {
        // Código para aplicar o filtro e mostrar somente os exames concluídos
        var rows = document.getElementsByClassName("tela-user-row");
        for (var i = 0; i < rows.length; i++) {
            var statusCell = rows[i].querySelector(".status-cell");
            if (statusCell.textContent.trim() !== "Agendada" && statusCell.textContent.trim() !== "Concluído") {
                rows[i].style.display = "none";
            }
        }
    } else {
        // Código para remover o filtro e mostrar todos os exames
        var rows = document.getElementsByClassName("tela-user-row");
        for (var i = 0; i < rows.length; i++) {
            rows[i].style.display = "";
        }
    }
}

var filterBtn = document.getElementById("filter_btn");
var sliderText = document.getElementById("slider_text");
filterBtn.addEventListener("change", toggleFilter, function() {
    if (filterBtn.checked) {
        sliderText.textContent = "on";
    } else {
        sliderText.textContent = "off";
    }
});