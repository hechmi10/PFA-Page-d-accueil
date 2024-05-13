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

import java.sql.*;
import java.sql.Statement;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.DateTimeException;

public class planificationrecolte {
    private Scene scene;
    private Connection connection;
    public planificationrecolte(Stage primaryStage, Connection connection) {
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

        TextField nomField = new TextField();
        TextField dateRecolteField = new TextField();
        TextField mainOeuvreField = new TextField();
        TextField equipementField = new TextField();

        Button submitButton = new Button("Soumettre");
        Label errorLabel = new Label();

        Label nomLabel = new Label("Nom de la culture :");
        Label dateRecolteLabel = new Label("Date de récolte prévue :");
        Label mainOeuvreLabel = new Label("Main-d'œuvre nécessaire :");
        Label equipementLabel = new Label("Équipement nécessaire :");
        Label titleLabel = new Label("Planification des récoltes");

        nomLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: white;");
        dateRecolteLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: white;");
        mainOeuvreLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: white;");
        equipementLabel.setStyle("-fx-font-weight: bold; -fx-text-fill: white;");
        titleLabel.setStyle("-fx-font-size: 20px; -fx-font-weight: bold; -fx-text-fill: white;");

        submitButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px; -fx-background-color: green; -fx-text-fill: white;");
        errorLabel.setStyle("-fx-text-fill: white;");

        layout.addRow(0, titleLabel);
        layout.addRow(1, nomLabel, nomField);
        layout.addRow(2, dateRecolteLabel, dateRecolteField);
        layout.addRow(3, mainOeuvreLabel, mainOeuvreField);
        layout.addRow(4, equipementLabel, equipementField);
        layout.addRow(5, submitButton);
        layout.addRow(6, errorLabel);

        submitButton.setOnAction(event -> {
            int id=0;
            String nom = nomField.getText();
            String dateRecolte =formatDate(dateRecolteField.getText());
            String mainOeuvre = mainOeuvreField.getText();
            String equipement = equipementField.getText();
            String url = "jdbc:mysql://localhost:3306/agri_connect";
            String user = "root";
            String pass = "";
            try {
                this.connection = DriverManager.getConnection(url, user, pass);
                Statement stmt=connection.createStatement();
                String query="Insert into planification_recoltes (nom,date_recolte_prevue,main_oeuvre,equipement,culture_id) values('"+nom+"','"+dateRecolte+"','"+mainOeuvre+"','"+equipement+"','"+id+"')";
                stmt.executeUpdate(query);
                System.out.println("Recolte planifié");
                id++;
            } catch (Exception e) {
                e.printStackTrace();
            }
        });

        this.scene = new Scene(layout, 800, 600);
    }
    private static String formatDate(String dateString) {
        try {
            SimpleDateFormat inputFormat = new SimpleDateFormat("dd/MM/yyyy");
            SimpleDateFormat outputFormat = new SimpleDateFormat("yyyy-MM-dd");
            java.util.Date date = inputFormat.parse(dateString);
            return outputFormat.format(date);
        } catch (ParseException e1) {
            e1.printStackTrace();
            return null;
        }catch (DateTimeException e2){
            e2.printStackTrace();
            return null;
        }
    }

    public Scene getScene() {
        return scene;
    }
}


