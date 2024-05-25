import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.text.Font;
import javafx.stage.Stage;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class suiviculture {

    private Scene scene;
    private Connection connection;

    public suiviculture(Stage primaryStage, Connection connection) {
        this.connection = connection;
        BorderPane root = new BorderPane();

        // Header Section
        VBox header = new VBox();
        header.setStyle("-fx-background-color: darkgreen; -fx-padding: 10px;");
        header.setAlignment(Pos.CENTER);
        Label titleLabel = new Label("Fallah Connect");
        titleLabel.setFont(Font.font("Arial", 24));
        header.getChildren().add(titleLabel);
        root.setTop(header);

        // Form Section
        VBox formContainer = new VBox();
        formContainer.setPadding(new Insets(20));
        BackgroundImage backgroundImage = new BackgroundImage(
                new Image("choose-bg.jpg", 1600, 900, false, true),
                BackgroundRepeat.NO_REPEAT,
                BackgroundRepeat.NO_REPEAT,
                BackgroundPosition.DEFAULT,
                BackgroundSize.DEFAULT
        );
        formContainer.setBackground(new Background(backgroundImage));
        formContainer.setAlignment(Pos.CENTER);
        formContainer.setSpacing(20);


        // Form Title
        Label formTitle = new Label("Remplissez le formulaire suivant pour enregistrer les détails de votre culture :");
        formTitle.setFont(Font.font("Arial", 20));
        formTitle.setTextFill(Color.WHITE);
        formContainer.getChildren().add(formTitle);

        // Form Fields
        GridPane formGrid = new GridPane();
        formGrid.setAlignment(Pos.CENTER);
        formGrid.setHgap(10);
        formGrid.setVgap(10);

        // Labels
        Label nomCultureLabel = new Label("Nom de la culture:");
        nomCultureLabel.setTextFill(Color.WHITE);
        Label datePlantationLabel = new Label("Date de plantation (dd/MM/yyyy):");
        datePlantationLabel.setTextFill(Color.WHITE);
        Label typeSolLabel = new Label("Type de sol:");
        typeSolLabel.setTextFill(Color.WHITE);
        Label quantiteLabel = new Label("Quantité:");
        quantiteLabel.setTextFill(Color.WHITE);
        Label descriptionLabel = new Label("Description:");
        descriptionLabel.setTextFill(Color.WHITE);

        // Text Fields
        TextField nomCultureField = new TextField();
        TextField datePlantationField = new TextField();
        TextField typeSolField = new TextField();
        TextField quantiteField = new TextField();
        TextField descriptionField = new TextField();

        // Add to Grid
        formGrid.addRow(0, nomCultureLabel, nomCultureField);
        formGrid.addRow(1, datePlantationLabel, datePlantationField);
        formGrid.addRow(2, typeSolLabel, typeSolField);
        formGrid.addRow(3, quantiteLabel, quantiteField);
        formGrid.addRow(4, descriptionLabel, descriptionField);

        formContainer.getChildren().add(formGrid);

        // Submit Button
        Button submitButton = new Button("Enregistrer");
        submitButton.setOnAction(event -> {
            String nom = nomCultureField.getText();
            String dateString = datePlantationField.getText();
            String type = typeSolField.getText();
            String quantite = quantiteField.getText();
            String description = descriptionField.getText();

            // Contrôles de saisie
            if (nom.isEmpty() || dateString.isEmpty() || type.isEmpty() || quantite.isEmpty() || description.isEmpty()) {
                showAlert(Alert.AlertType.ERROR, "Erreur", "Veuillez remplir tous les champs.");
                return;
            }

            // Vérification du type de sol
            if (!isValidSoilType(type)) {
                showAlert(Alert.AlertType.ERROR, "Erreur", "Type de sol invalide. Les types valides sont : argileux, sableux ou limoneux.");
                return;
            }

            // Enregistrement dans la base de données
            if (saveCulture(nom, dateString, type, quantite, description)) {
                showAlert(Alert.AlertType.INFORMATION, "Succès", "Culture enregistrée avec succès.");
            } else {
                showAlert(Alert.AlertType.ERROR, "Erreur", "Échec de l'enregistrement de la culture.");
            }
        });
        formContainer.getChildren().add(submitButton);

        root.setCenter(formContainer);

        // Footer Section
        HBox footer = new HBox();
        footer.setStyle("-fx-background-color: #333333; -fx-padding: 10px;");
        footer.setAlignment(Pos.CENTER);
        Label footerLabel = new Label("© 2024 All Rights Reserved. Design by Free Html Templates");
        footerLabel.setTextFill(Color.WHITE);
        footer.getChildren().add(footerLabel);
        root.setBottom(footer);
        this.scene = new Scene(root, 800, 600);
    }

    private boolean isValidSoilType(String type) {
        return type.equalsIgnoreCase("argileux") || type.equalsIgnoreCase("sableux") || type.equalsIgnoreCase("limoneux");
    }

    private boolean saveCulture(String nom, String dateString, String type, String quantite, String description) {
        // Vérification de la validité de la date
        SimpleDateFormat inputDateFormat = new SimpleDateFormat("dd/MM/yyyy");
        SimpleDateFormat outputDateFormat = new SimpleDateFormat("yyyy-MM-dd");
        inputDateFormat.setLenient(false); // Empêche la tolérance des dates invalides
        try {
            Date date = inputDateFormat.parse(dateString);
            dateString = outputDateFormat.format(date); // Formatage de la date
        } catch (ParseException e) {
            showAlert(Alert.AlertType.ERROR, "Erreur", "Format de date invalide. Veuillez utiliser le format dd/MM/yyyy.");
            return false;
        }

        try {
            String url = "jdbc:mysql://localhost:3306/agri_connect";
            String user = "root";
            String pass = "";

            Class.forName("com.mysql.cj.jdbc.Driver");
            this.connection = DriverManager.getConnection(url, user, pass);
            Statement stmt = connection.createStatement();
            String query = "INSERT INTO cultures (nom_culture, date_plantation, type_sol, quantite, description) VALUES('" + nom + "','" + dateString + "','" + type + "','" + quantite + "','" + description + "')";
            stmt.executeUpdate(query);
            return true;
        } catch (SQLException | ClassNotFoundException e) {
            e.printStackTrace();
            showAlert(Alert.AlertType.ERROR, "Erreur", "Échec de l'enregistrement de la culture.");
            return false;
        }
    }


    private void showAlert(Alert.AlertType alertType, String title, String message) {
        Alert alert = new Alert(alertType);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }

    public Scene getScene() {
        return scene;
    }
}