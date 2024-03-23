module com.example.exament_javfx {
    requires javafx.controls;
    requires javafx.fxml;


    opens com.example.exament_javfx to javafx.fxml;
    exports com.example.exament_javfx;
}