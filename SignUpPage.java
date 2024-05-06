import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.layout.Background;
import javafx.scene.layout.BackgroundImage;
import javafx.scene.layout.BackgroundPosition;
import javafx.scene.layout.BackgroundRepeat;
import javafx.scene.layout.BackgroundSize;
import javafx.scene.layout.GridPane;
import javafx.stage.Stage;

public class SignUpPage {
    private Connection connection;
    private Scene scene;

    public SignUpPage(Stage primaryStage, Connection connection) {
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
        layout.setBackground(new Background(backgroundImage));
        TextField signUpCinField = new TextField();
        TextField signUpNomField = new TextField();
        TextField signUpPrenomField = new TextField();
        TextField signUpEmailField = new TextField();
        TextField signUpPasswordField = new PasswordField();
        TextField signUpNumTelField = new TextField();
        Button homeButton = new Button("Acceuil");
        Button loginButton = new Button("Connexion");
        Button signUpSubmitButton = new Button("S'inscrire");
        Label signUpErrorLabel = new Label();
        Label CinLabel = new Label("Cin");
        Label NomLabel = new Label("Nom");
        Label PrenomLabel = new Label("Prenom");
        Label EmailLabel = new Label("Email");
        Label PasswordLabel = new Label("Password");
        Label TelLabel = new Label("Tel");
        Label titleLabel = new Label("Inscrivez-vous");
        layout.addRow(0, titleLabel);
        layout.addRow(1, CinLabel, signUpCinField);
        layout.addRow(2, NomLabel, signUpNomField);
        layout.addRow(3, PrenomLabel, signUpPrenomField);
        layout.addRow(4, PasswordLabel, signUpPasswordField);
        layout.addRow(5, EmailLabel, signUpEmailField);
        layout.addRow(6, TelLabel, signUpNumTelField);
        layout.addRow(7, signUpSubmitButton);
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
        scene = new Scene(layout, 800, 600);
        this.connection = connection;

        // Create a LoginPage instance to switch back to the login page
        LoginPage l = new LoginPage(primaryStage, connection);

        // Set action for signUpSubmitButton
        signUpSubmitButton.setOnAction(event -> {
            String cin = signUpCinField.getText();
            String nom = signUpNomField.getText();
            String prenom = signUpPrenomField.getText();
            String email = signUpEmailField.getText();
            String password = signUpPasswordField.getText();
            String numTel = signUpNumTelField.getText();

            try {
                // Call signUp method to perform signup
                signUp(cin,nom,prenom, password,email,numTel);
                // Switch back to login page after successful signup
                primaryStage.setScene(l.getScene());
            } catch (SQLException e) {
                signUpErrorLabel.setText("Erreur lors de l'inscription");
                e.printStackTrace();
            }
        });
    }

    public void signUp(String Cin,String Nom,String Prenom, String MotDePasse,String Email,String NumTel) throws SQLException {
        try {
            // Create a Statement object for executing SQL queries
            Statement statement = connection.createStatement();

            // Hash the password before storing it
            String hashedPassword = hashPassword(MotDePasse);
            // Perform database operations here (e.g., insert user details)
            // Example query to insert user details into a table
            if(Cin.length()==8) {
                String query = "INSERT INTO agriculteurs_inscription (Cin,Nom,Prènom,MotDePasse,Email,NumTel) VALUES ('" + Cin + "','" + Nom + "','" + Prenom + "', '" + hashedPassword + "','" + Email + "','" + NumTel + "')";
                statement.executeUpdate(query);
                System.out.println("Signed up with Cin: " + Cin);
            }else{
                System.out.println("Erreur Cin");
            }

            // Close the Statement object
            statement.close();
        } catch (SQLException e) {
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


