import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.shape.Rectangle;
import javafx.scene.text.Font;
import javafx.scene.text.FontWeight;
import javafx.scene.text.TextAlignment;
import javafx.stage.Stage;

public class gestiondesfermes {
    private Scene scene;

    public gestiondesfermes(Stage primaryStage, Scene cultureScene, Scene stockScene, Scene recolteScene) {
        BorderPane root = new BorderPane();

        // Header
        HBox header = new HBox();
        header.setStyle("-fx-background-color: darkgreen; -fx-padding: 10px;");
        Label titleLabel = new Label("Fallah Connect");
        titleLabel.setFont(Font.font("Arial", FontWeight.BOLD, 20));
        header.getChildren().add(titleLabel);
        header.setAlignment(Pos.CENTER);
        root.setTop(header);

        // Navigation
        VBox navigation = new VBox();
        navigation.setStyle("-fx-background-color: #343a40; -fx-padding: 10px;");
        navigation.setAlignment(Pos.CENTER);
        navigation.setSpacing(10);

        // Main Content
        VBox mainContent = new VBox();
        Image backgroundImage = new Image("slider-bg.jpg", 1550, 900, false, true);
        BackgroundImage background = new BackgroundImage(backgroundImage,
                BackgroundRepeat.NO_REPEAT, BackgroundRepeat.NO_REPEAT, BackgroundPosition.DEFAULT,
                BackgroundSize.DEFAULT);
        mainContent.setBackground(new Background(background));
        mainContent.setAlignment(Pos.CENTER);
        mainContent.setSpacing(20);

        // Title
        Label title = new Label("Gestion des fermes");
        title.setTextFill(Color.WHITE);
        title.setFont(Font.font("Arial", FontWeight.BOLD, 24));
        mainContent.getChildren().add(title);

        // Farm Management Options
        GridPane optionsGrid = new GridPane();
        optionsGrid.setAlignment(Pos.CENTER);
        optionsGrid.setHgap(20);
        optionsGrid.setVgap(20);

        // Option 1: Suivi des cultures
        Rectangle option1Icon = new Rectangle(100, 100, Color.DARKGREEN);
        Label option1Label = new Label("Suivi des cultures");
        option1Label.setFont(Font.font("Arial", FontWeight.BOLD, 16));
        option1Label.setTextFill(Color.WHITE);
        option1Label.setTextAlignment(TextAlignment.CENTER);
        Button option1Btn = new Button("Formulaire");
        option1Btn.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white;");
        // Option 2: Gestion des stocks
        Rectangle option2Icon = new Rectangle(100, 100, Color.SPRINGGREEN);
        Label option2Label = new Label("Gestion des stocks");
        option2Label.setFont(Font.font("Arial", FontWeight.BOLD, 16));
        option2Label.setTextFill(Color.WHITE);
        option2Label.setTextAlignment(TextAlignment.CENTER);
        Button option2Btn = new Button("Formulaire");
        option2Btn.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white;");
        // Option 3: Placeholder for additional options
        Rectangle option3Icon = new Rectangle(100, 100, Color.LIGHTGREEN);
        Label option3Label = new Label("Planification des récoltes");
        option3Label.setFont(Font.font("Arial", FontWeight.BOLD, 16));
        option3Label.setTextFill(Color.WHITE);
        option3Label.setTextAlignment(TextAlignment.CENTER);
        Button option3Btn = new Button("Formulaire");
        option3Btn.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white;");
        option1Btn.setOnAction(event -> primaryStage.setScene(cultureScene));
        option2Btn.setOnAction(event -> primaryStage.setScene(stockScene));
        option3Btn.setOnAction(event -> primaryStage.setScene(recolteScene));

        optionsGrid.addRow(0, option1Icon, option2Icon, option3Icon);
        optionsGrid.addRow(1, option1Label, option2Label, option3Label);
        optionsGrid.addRow(2, option1Btn, option2Btn, option3Btn);

        mainContent.getChildren().add(optionsGrid);
        this.scene = new Scene(root, 800, 600);
        root.setCenter(mainContent);
        primaryStage.setTitle("Fallah Connect");
        primaryStage.setScene(this.scene);
        primaryStage.show();
    }

    public Scene getScene() {
        return scene;
    }
}
