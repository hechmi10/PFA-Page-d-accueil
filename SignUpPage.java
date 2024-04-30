import javafx.geometry.Insets;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.layout.*;
import javafx.stage.Stage;
import javafx.geometry.Pos;
import java.sql.*;
import javafx.scene.layout.Background;
import javafx.scene.layout.BackgroundImage;
import javafx.scene.layout.BackgroundRepeat;
import javafx.scene.layout.BackgroundSize;
import javafx.scene.layout.BackgroundPosition;
public class SignUpPage {
    private Connection connection;
    private Scene scene;
    public SignUpPage(Stage primaryStage,Connection connection) {
        BackgroundImage backgroundImage= new BackgroundImage(new Image("choose-bg.jpg",  1600, 900, false, true), BackgroundRepeat.NO_REPEAT, BackgroundRepeat.NO_REPEAT, BackgroundPosition.DEFAULT,
                BackgroundSize.DEFAULT);
        GridPane layout = new GridPane();
        layout.setPadding(new Insets(20));
        layout.setBackground(new Background(backgroundImage));
        layout.setVgap(10);
        layout.setHgap(10);
        layout.setAlignment(Pos.CENTER);
        layout.setBackground(new Background(backgroundImage));
        TextField signUpCinField = new TextField();
        TextField signUpNomField = new TextField();
        TextField signUpPrenomField=new TextField();
        TextField signUpEmailField=new TextField();
        TextField signUpPasswordField=new PasswordField();
        TextField signUpNumTelField=new TextField();
        Button homeButton=new Button("Acceuil");
        Button loginButton=new Button("Connexion");
        Button signUpSubmitButton = new Button("S'inscrire");
        Label signUpErrorLabel = new Label();
        Label CinLabel = new Label("Cin");
        Label NomLabel = new Label("Nom");
        Label PrenomLabel = new Label("Prenom");
        Label EmailLabel = new Label("Email");
        Label PasswordLabel = new Label("Password");
        Label TelLabel = new Label("Tel");
        Label titleLabel = new Label("Inscrivez-vous");
        layout.addRow(0,titleLabel);
        layout.addRow(1, CinLabel, signUpCinField);
        layout.addRow(2, NomLabel, signUpNomField);
        layout.addRow(3,PrenomLabel,signUpPrenomField);
        layout.addRow(4,PasswordLabel,signUpPasswordField);
        layout.addRow(5,EmailLabel,signUpEmailField);
        layout.addRow(6,TelLabel,signUpNumTelField);
        layout.addRow(7,signUpSubmitButton);
        layout.addRow(8, signUpErrorLabel);
        CinLabel.setStyle("-fx-font-weight: bold;-fx-text-fill: white;");
        NomLabel.setStyle("-fx-font-weight:bold;-fx-text-fill: white;");
        PrenomLabel.setStyle("-fx-font-weight:bold;-fx-text-fill: white;");
        PasswordLabel.setStyle("-fx-font-weight:bold;-fx-text-fill: white;");
        EmailLabel.setStyle("-fx-font-weight:bold;-fx-text-fill: white;");
        TelLabel.setStyle("-fx-font-weight:bold;-fx-text-fill: white;");
        signUpSubmitButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white;");
        signUpErrorLabel.setStyle("-fx-text-fill: white;");
        signUpCinField.setStyle("-fx-font-size: 20px;-fx-padding:10px 20px;");
        signUpNomField.setStyle("-fx-font-size: 20px;-fx-padding:10px 20px;");
        signUpPrenomField.setStyle("-fx-font-size: 20px;-fx-padding:10px 20px;");
        signUpEmailField.setStyle("-fx-font-size: 20px;-fx-padding:10px 20px;");
        signUpPasswordField.setStyle("-fx-font-size: 20px;-fx-padding:10px 20px;");
        signUpNumTelField.setStyle("-fx-font-size: 20px;-fx-padding:10px 20px;");
        titleLabel.setStyle("-fx-font-size:20px;-fx-font-weight: bold;-fx-text-fill: white;");
        loginButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white;");
        homeButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white;");
        scene = new Scene(layout, 1200, 600);
        this.connection=connection;
        LoginPage l=new LoginPage(primaryStage);
        signUpSubmitButton.setOnAction(event->primaryStage.setScene(l.getScene()));
    }

    public void signUp(String Cin, String MotDePasse) throws SQLException{
        try {
            Statement statement= connection.createStatement();
            String hashedPassword = hashPassword(MotDePasse);
            System.out.println("Signed up with Cin: " + Cin);
        } catch (IllegalArgumentException e) {
            System.out.println(e.getMessage());
        }
    }
    public Scene getScene() {
        return scene;
    }
    public String hashPassword(String password) {
        // Implement your password hashing logic here
        return password;
    }

}

