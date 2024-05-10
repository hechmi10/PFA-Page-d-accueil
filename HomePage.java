import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.layout.*;
import javafx.stage.Stage;

public class HomePage {

    private Scene scene;

    public HomePage(Stage primaryStage, Scene loginScene, Scene signUpScene,Scene gestionScene) {
        // Background image
        BackgroundImage backgroundImage = new BackgroundImage(
                new Image("slider-bg.jpg", 1550, 900, false, true),
                BackgroundRepeat.NO_REPEAT, BackgroundRepeat.NO_REPEAT, BackgroundPosition.DEFAULT,
                BackgroundSize.DEFAULT);

        // Create a layout with VBox
        VBox layout = new VBox(20);
        layout.setPadding(new Insets(50));
        layout.setBackground(new Background(backgroundImage));
        layout.setAlignment(Pos.CENTER); // Center align the content

        // Title
        Label titleLabel = new Label("Welcome to Fallah Connect");
        titleLabel.setStyle("-fx-font-size: 24px; -fx-font-weight: bold; -fx-text-fill: white;");

        // Buttons
        Button loginButton = new Button("Connexion");
        Button signUpButton = new Button("Inscription");
        Button gestionButton=new Button("Gestion des fermes");

        // Apply green background color to buttons
        loginButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white;");
        signUpButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white;");
        gestionButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white;");
        // Add components to layout
        layout.getChildren().addAll(titleLabel, loginButton, signUpButton,gestionButton);

        // Create scene
        scene = new Scene(layout, 800, 600);

        // Set event handlers for buttons
        loginButton.setOnAction(event -> primaryStage.setScene(loginScene));
        signUpButton.setOnAction(event -> primaryStage.setScene(signUpScene));
        gestionButton.setOnAction(event -> primaryStage.setScene(gestionScene));
    }

    public Scene getScene() {
        return scene;
    }
}


