import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.layout.*;
import javafx.scene.paint.Color;
import javafx.scene.text.Font;
import javafx.stage.Stage;
import java.sql.*;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.DateTimeException;

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
        Label datePlantationLabel = new Label("Date de plantation:");
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
            String url = "jdbc:mysql://localhost:3306/agri_connect";
            String user = "root";
            String pass = "";
            int id=0;
            String nom=nomCultureField.getText();
            String date=formatDate(datePlantationField.getText());
            String type=typeSolField.getText();
            String quantite=quantiteField.getText();
            String description=descriptionField.getText();
            try{
                Class.forName("com.mysql.cj.jdbc.Driver");
                this.connection = DriverManager.getConnection(url, user, pass);
                Statement stmt=connection.createStatement();
                String query="Insert into cultures (nom_culture,date_plantation,type_sol,quantite,description) values('"+nom+"','"+date+"','"+type+"','"+quantite+"','"+description+"')";
                stmt.executeUpdate(query);
                System.out.println("Culture ajouté");
                id++;
            } catch (SQLException e) {
                System.out.println(e.getMessage());
            } catch (ClassNotFoundException e) {
                throw new RuntimeException(e);
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

    public Scene getScene(){
        return scene;
    }
}
