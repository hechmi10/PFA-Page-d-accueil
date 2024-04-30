import javafx.geometry.Insets;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javafx.scene.layout.Background;
import javafx.scene.layout.BackgroundImage;
import javafx.scene.layout.BackgroundRepeat;
import javafx.scene.layout.BackgroundSize;
import javafx.scene.layout.BackgroundPosition;
import javafx.geometry.Pos;

public class HomePage {

    private Scene scene;

    public HomePage(Stage primaryStage,Scene loginScene,Scene signUpScene) {
        BackgroundImage backgroundImage = new BackgroundImage(
                new Image("slider-bg.jpg", 1600, 900, false, true),
                BackgroundRepeat.NO_REPEAT, BackgroundRepeat.NO_REPEAT, BackgroundPosition.DEFAULT,
                BackgroundSize.DEFAULT
        );
        VBox layout = new VBox(20);
        layout.setPadding(new Insets(50));
        layout.setAlignment(Pos.CENTER);
        layout.setBackground(new Background(backgroundImage));
        Button loginButton=new Button("Connexion");
        Button signUpButton=new Button("Inscription");
        Button homeButton= new Button("Acceuil");
        Label titleLabel = new Label("Fallah Connect");
        titleLabel.setStyle("-fx-font-size:20px;-fx-font-weight: bold;-fx-text-fill: white;");
        homeButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white");
        loginButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white");
        signUpButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white");
        layout.getChildren().addAll(titleLabel,homeButton,loginButton,signUpButton);
        scene = new Scene(layout, 1200, 700);
        loginButton.setOnAction(event -> primaryStage.setScene(loginScene));
        signUpButton.setOnAction(event -> primaryStage.setScene(signUpScene));
    }

    public Scene getScene() {
        return scene;
    }
}

