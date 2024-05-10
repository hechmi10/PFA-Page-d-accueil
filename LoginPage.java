import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import javafx.geometry.Insets;
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
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javafx.geometry.Pos;

public class LoginPage {

    private Scene scene;
    private Connection connection;

    public LoginPage(Stage primaryStage,Connection connection) {
        // Initialize the JavaFX components
        BackgroundImage backgroundImage = new BackgroundImage(
                new Image("choose-bg.jpg", 1600, 900, false, true),
                BackgroundRepeat.NO_REPEAT,
                BackgroundRepeat.NO_REPEAT,
                BackgroundPosition.DEFAULT,
                BackgroundSize.DEFAULT
        );
        GridPane layout = new GridPane();
        layout.setPadding(new Insets(20));
        layout.setVgap(10);
        layout.setHgap(10);
        layout.setBackground(new Background(backgroundImage));
        layout.setAlignment(Pos.CENTER);
        Button homeButton = new Button("Home");
        Button signUpButton = new Button("Inscription");
        TextField loginEmailField = new TextField();
        TextField loginPasswordField = new PasswordField();
        Button loginSubmitButton = new Button("Se connecter");
        Label loginErrorLabel = new Label();
        Label emailLabel = new Label("Email:");
        Label passwordLabel = new Label("Password:");
        Label titleLabel = new Label("Connectez-vous");
        emailLabel.setStyle("-fx-font-weight:bold;-fx-font-size:20px;-fx-padding:10px 20px;-fx-text-fill:white;");
        passwordLabel.setStyle("-fx-font-weight:bold;-fx-font-size:20px;-fx-padding:10px;-fx-text-fill:white;");
        loginSubmitButton.setStyle("-fx-font-size: 20px; -fx-padding: 10px 20px;-fx-background-color: green;-fx-text-fill: white;");
        loginErrorLabel.setStyle("-fx-text-fill: red;-fx-font-size: 20px;");
        loginEmailField.setStyle("-fx-font-size: 20px;-fx-padding:10px 20px;");
        loginPasswordField.setStyle("-fx-font-size: 20px;-fx-padding:10px 20px;");
        titleLabel.setStyle("-fx-font-size:20px;-fx-font-weight: bold;-fx-text-fill: white;");
        layout.addRow(0, titleLabel);
        layout.addRow(1, emailLabel, loginEmailField);
        layout.addRow(2, passwordLabel, loginPasswordField);
        layout.addRow(3, loginSubmitButton);
        layout.addRow(4, loginErrorLabel);

        // Button event handler
        loginSubmitButton.setOnAction(event -> {
            String email = loginEmailField.getText();
            String password = loginPasswordField.getText();

            // Call the login method with the provided credentials
            boolean loginSuccess = login(email, password);

            if (loginSuccess) {
                // Clear fields after successful login
                loginEmailField.clear();
                loginPasswordField.clear();
                System.out.println("Connecté");
                loginErrorLabel.setText("");
            } else {
                loginErrorLabel.setText("Email ou mot de passe incorrect");
            }
        });
        this.connection=connection;
        scene = new Scene(layout, 800, 600);
    }

    // Method to perform login
    private boolean login(String email, String password) {
        // JDBC connection URL
        String url = "jdbc:mysql://localhost:3306/agri_connect";
        String user = "root";
        String pass = "";

        try {
            // Load and register the JDBC driver
            Class.forName("com.mysql.cj.jdbc.Driver");
            // Establish the connection
            connection = DriverManager.getConnection(url, user, pass);

            // Query to check if the user exists with the given email and password
            String query = "SELECT * FROM agriculteurs_inscription WHERE Email = ? AND MotDePasse = ?";
            PreparedStatement preparedStatement = connection.prepareStatement(query);
            preparedStatement.setString(1, email);
            preparedStatement.setString(2, password);
            ResultSet resultSet = preparedStatement.executeQuery();

            // If a row is found, user exists
            if (resultSet.next()) {
                return true;
            }
        } catch (ClassNotFoundException | SQLException e) {
            System.out.println(e.getMessage());
        } finally {
            // Close the connection
            try {
                if (connection != null) {
                    connection.close();
                }
            } catch (SQLException e) {
                System.out.println(e.getMessage());
            }
        }
        return false;
    }

    public Scene getScene() {
        return scene;
    }
}

