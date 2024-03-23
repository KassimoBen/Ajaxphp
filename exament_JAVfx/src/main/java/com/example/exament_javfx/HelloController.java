package com.example.exament_javfx;

import javafx.fxml.FXML;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.control.TextInputDialog;
import java.util.Optional;

public class HelloController {
    @FXML
    private TextField inputField;

    @FXML
    private Label outputLabel;

    // Utilisé pour suivre le choix de l'utilisateur : "multiplication" ou "autre"
    private String currentChoice = "";

    public void showMultiplicationTable() {
        currentChoice = "multiplication";
        inputField.setPromptText("Entrez un nombre pour la table de multiplication");
    }

    public void showCalculator() {
        currentChoice = "calculatrice";
        inputField.setPromptText("Entrez deux nombres séparés par un espace");
    }

    @FXML
    protected void handleSubmit() {
        switch (currentChoice) {
            case "multiplication":
                try {
                    int number = Integer.parseInt(inputField.getText());
                    StringBuilder table = new StringBuilder();
                    for (int i = 1; i <= 10; i++) {
                        table.append(number).append(" x ").append(i).append(" = ").append(number * i).append("\n");
                    }
                    outputLabel.setText(table.toString());
                } catch (NumberFormatException e) {
                    outputLabel.setText("Entrez un nombre valide.");
                }
                break;
            case "calculatrice":
                showCalculatorOperation();
                break;
            default:
                outputLabel.setText("Veuillez choisir une option.");
        }
    }

    private void showCalculatorOperation() {
        TextInputDialog dialog = new TextInputDialog();
        dialog.setTitle("Calculatrice");
        dialog.setHeaderText("Entrez l'opération (ex. multiplication, division, soustraction)");
        dialog.setContentText("Opération:");

        Optional<String> result = dialog.showAndWait();
        result.ifPresent(this::calculateOperation);
    }

    private void calculateOperation(String operation) {
        try {
            String[] numbers = inputField.getText().split(" ");
            double num1 = Double.parseDouble(numbers[0]);
            double num2 = Double.parseDouble(numbers[1]);
            double output;

            switch (operation) {
                case "multiplication":
                    output = num1 * num2;
                    break;
                case "division":
                    output = num1 / num2;
                    break;
                case "soustraction":
                    output = num1 - num2;
                    break;
                default:
                    outputLabel.setText("Opération non reconnue.");
                    return;
            }

            outputLabel.setText("Résultat: " + output);
        } catch (Exception e) {
            outputLabel.setText("Erreur: Assurez-vous d'entrer deux nombres séparés par un espace.");
        }
    }
}
