$(document).ready(function () {
  // Étape de restauration : vérifie si un tableau est sauvegardé et le restaure
  if (localStorage.getItem("savedTable")) {
    $("#tableContainer").html(localStorage.getItem("savedTable"));
  }
});

function saveTable() {
  const tableHTML = $("#tableContainer").html();
  localStorage.setItem("savedTable", tableHTML);
}

function generateTable() {
  const rows = $("#rows").val();
  const cols = $("#cols").val();
  let table = "<table>";

  for (let i = 0; i < rows; i++) {
    table += "<tr>";
    for (let j = 0; j < cols; j++) {
      table += "<td>Cellule</td>";
    }
    table += "</tr>";
  }

  table += "</table>";
  $("#tableContainer").html(table);
  saveTable(); // Sauvegarde le tableau dans le localStorage
}

function addRow() {
  const cols = $("tr:first-child td").length || 0; // Nombre de colonnes basé sur la première ligne
  const numRowsToAdd = parseInt($("#addRows").val()) || 1; // Nombre de lignes à ajouter

  for (let r = 0; r < numRowsToAdd; r++) {
    let newRow = "<tr>";
    for (let i = 0; i < cols; i++) {
      newRow += "<td>Nouvelle cellule</td>";
    }
    newRow += "</tr>";
    $("table").append(newRow);
  }
  saveTable(); // Mise à jour du tableau sauvegardé
}

function addColumn() {
  const numColsToAdd = parseInt($("#addCols").val()) || 1; // Nombre de colonnes à ajouter

  $("tr").each(function () {
    for (let c = 0; c < numColsToAdd; c++) {
      $(this).append("<td>Nouvelle cellule</td>");
    }
  });
  saveTable(); // Mise à jour du tableau sauvegardé
}

function resetTable() {
  localStorage.removeItem("savedTable"); // Supprime la sauvegarde
  $("#tableContainer").empty(); // Vide le conteneur du tableau
}
$(document).on("click", "td", function () {
  // Basculer la classe 'selected' pour la cellule cliquée
  $(this).toggleClass("selected");
});
$("#mergeRows").click(function () {
  let selectedCells = $("td.selected");
  if (selectedCells.length > 0) {
    let rowspan = selectedCells.length;
    selectedCells.not(":first").remove(); // Supprimer toutes les cellules sélectionnées sauf la première
    selectedCells.first().attr("rowspan", rowspan); // Définir rowspan sur la première cellule
    selectedCells.removeClass("selected"); // Retirer la classe 'selected'
    saveTable();
  }
});

$("#mergeCols").click(function () {
  // Cette fonction suppose que toutes les cellules sélectionnées sont dans la même ligne
  let selectedCells = $("td.selected");
  if (selectedCells.length > 0) {
    let colspan = selectedCells.length;
    selectedCells.not(":first").remove(); // Supprimer toutes les cellules sélectionnées sauf la première
    selectedCells.first().attr("colspan", colspan); // Définir colspan sur la première cellule
    selectedCells.removeClass("selected"); // Retirer la classe 'selected'
    saveTable();
  }
});

$(document).ready(function () {
  let isDragging = false;
  let startPageX;
  let originalWidth;
  let targetCol;

  // Détecter le mousedown sur les cellules pour commencer le redimensionnement
  $(document).on("mousedown", "td", function (e) {
    isDragging = true;
    startPageX = e.pageX;
    targetCol = $(this).index();
    originalWidth = $(this).width();
  });

  // Détecter le mouvement de la souris pour ajuster la largeur de la colonne
  $(document).on("mousemove", function (e) {
    if (isDragging) {
      let difference = e.pageX - startPageX;
      $("tr").each(function () {
        $(this)
          .find("td")
          .eq(targetCol)
          .width(originalWidth + difference);
      });
    }
  });

  // Arrêter le redimensionnement lorsque l'utilisateur relâche le bouton de la souris
  $(document).on("mouseup", function () {
    if (isDragging) {
      isDragging = false;
      saveTable(); // Sauvegarder les modifications après le redimensionnement
    }
  });
});

$(document).ready(function () {
  let isDraggingRow = false;
  let startPageY;
  let originalHeight;
  let targetRow;

  $(document).on("mousedown", "tr", function (e) {
    isDraggingRow = true;
    startPageY = e.pageY;
    targetRow = $(this).index();
    originalHeight = $(this).height(); // Hauteur originale de la ligne cible
    e.preventDefault(); // Empêche le drag-and-drop natif ou d'autres effets indésirables
  });

  $(document).on("mousemove", function (e) {
    if (isDraggingRow) {
      let difference = e.pageY - startPageY; // Calcul de la différence de déplacement
      let newHeight = originalHeight + difference; // Nouvelle hauteur basée sur le déplacement
      if (newHeight > 10) {
        // Condition pour éviter que la ligne devienne trop petite
        $("tr").eq(targetRow).height(newHeight); // Applique la nouvelle hauteur à la ligne cible
      }
    }
  });

  $(document).on("mouseup", function () {
    if (isDraggingRow) {
      isDraggingRow = false;
      saveTable(); // Sauvegarde après redimensionnement
    }
  });
});

function printTable() {
  // Récupère le HTML du tableau que vous souhaitez imprimer
  const tableHTML = $("#tableContainer").html();

  // Ouvre une nouvelle fenêtre ou un nouvel onglet
  const printWindow = window.open("", "_blank");

  // Prépare le contenu HTML pour la fenêtre d'impression, incluant le tableau
  printWindow.document.write(
    `<html><head><title>Impression du tableau</title>`
  );
  printWindow.document.write(
    `<style>table {border-collapse: collapse;} td, th {border: 1px solid black; padding: 5px;}</style>`
  );
  printWindow.document.write(`</head><body>`);
  printWindow.document.write(tableHTML); // Insère le HTML du tableau
  printWindow.document.write(`</body></html>`);
  printWindow.document.close(); // Important pour IE et Edge

  // Assurez-vous que la fenêtre d'impression sait qu'elle doit imprimer dès que le contenu est chargé
  printWindow.onload = function () {
    printWindow.focus(); // Pour s'assurer que la nouvelle fenêtre gagne le focus si elle ne l'a pas déjà
    printWindow.print(); // Déclenche l'impression
    printWindow.close(); // Ferme la fenêtre après l'impression dans certains navigateurs
  };
}

// Écouteur d'événement pour le bouton d'impression
$(document).on("click", "#printTable", function () {
  printTable();
});
