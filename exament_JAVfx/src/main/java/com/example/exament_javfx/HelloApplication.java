package com.example.exament_javfx;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;
import javafx.scene.Parent;
import java.io.IOException;

public class HelloApplication extends Application {
    @Override
    public void start(Stage stage) throws IOException {
        // Assurez-vous que le chemin du fichier FXML est correct.
        Parent root = FXMLLoader.load(getClass().getResource("/com/example/exament_javfx/hello-view.fxml"));
        stage.setTitle("Application de Calcul");
        stage.setScene(new Scene(root, 400, 300));
        stage.show();
    }

    public static void main(String[] args) {
        launch(args);
    }
}


