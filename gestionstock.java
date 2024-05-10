import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.layout.Background;
import javafx.scene.layout.BackgroundImage;
import javafx.scene.layout.BackgroundPosition;
import javafx.scene.layout.BackgroundRepeat;
import javafx.scene.layout.BackgroundSize;
import javafx.scene.layout.GridPane;
import javafx.stage.Stage;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.Statement;

public class gestionstock {
    private Scene scene;
    private Connection connection;
    public gestionstock(Stage primaryStage, Connection connection) {
        BackgroundImage backgroundImage = new BackgroundImage(
                new Image("choose-bg.jpg", 1600, 900, false, true),
                BackgroundRepeat.NO_REPEAT,
                BackgroundRepeat.NO_REPEAT,
                BackgroundPosition.DEFAULT,
                BackgroundSize.DEFAULT
        );

        GridPane layout = new GridPane();
        layout.setPadding(new Insets(20));
        layout.setBackground(new Background(backgroundImage));
        layout.setVgap(10);
        layout.setHgap(10);
        layout.setAlignment(Pos.CENTER);

        TextField productNameField = new TextField();
        TextField quantityField = new TextField();
        TextField purchaseDateField = new TextField();
        TextField supplierField = new TextField();

        Button submitButton = new Button("Enregistrer");
        Label errorLabel = new Label();

        Label productNameLabel = new Label("Nom du produit :");
        Label quantityLabel = new Label("Quantité :");
        Label purchaseDateLabel = new Label("Date d'achat :");
        Label supplierLabel = new Label("Fournisseur :");
        Label titleLabel = new Label("Enregistrement des stocks");

        productNameLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: white;");
        quantityLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: white;");
        purchaseDateLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: white;");
        supplierLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: white;");
        titleLabel.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: white;");

        submitButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px; -fx-background-color: green; -fx-text-fill: white;");
        errorLabel.setStyle("-fx-text-fill: red;");

        layout.addRow(0, titleLabel);
        layout.addRow(1, productNameLabel, productNameField);
        layout.addRow(2, quantityLabel, quantityField);
        layout.addRow(3, purchaseDateLabel, purchaseDateField);
        layout.addRow(4, supplierLabel, supplierField);
        layout.addRow(5, submitButton);
        layout.addRow(6, errorLabel);

        submitButton.setOnAction(event -> {
            int id=0;
            String productName = productNameField.getText();
            String quantity = quantityField.getText();
            String purchaseDate = purchaseDateField.getText();
            String supplier = supplierField.getText();
            String url = "jdbc:mysql://localhost:3306/agri_connect";
            String user = "root";
            String pass = "";

            try {
                Class.forName("com.mysql.cj.jdbc.Driver");
                this.connection = DriverManager.getConnection(url, user, pass);
                Statement stmt=connection.createStatement();
                String query="Insert into stocks values('"+id+"','"+productName+"','"+quantity+"','"+purchaseDate+"','"+supplier+"')";
                stmt.executeUpdate(query);
                System.out.println("Recolte planifié");
                id++;
                errorLabel.setText(""); // Clear error message if no exception occurs
            } catch (Exception e) {
                errorLabel.setText("Erreur lors de l'enregistrement");
                e.printStackTrace();
            }
        });

        this.scene = new Scene(layout, 800, 600);
    }

    public Scene getScene() {
        return scene;
    }
}

