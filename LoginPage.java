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

    public LoginPage(Stage primaryStage, Connection connection) {
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
            User user = login(email, password);

            if (user != null) {
                loginEmailField.clear();
                loginPasswordField.clear();
                System.out.println("Connecté");
                loginErrorLabel.setText("");
                ProfileController profileController = new ProfileController();
                profileController.setUser(user);
                Scene profileScene = new Scene(profileController.getView(), 800, 600);
                primaryStage.setScene(profileScene);
            } else {
                loginErrorLabel.setText("Email ou mot de passe incorrect");
            }
        });
        this.connection = connection;
        scene = new Scene(layout, 800, 600);
    }

    // Method to perform login
    private User login(String email, String password) {
        String url = "jdbc:mysql://localhost:3306/agri_connect";
        String user = "root";
        String pass = "";

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            connection = DriverManager.getConnection(url, user, pass);

            String query = "SELECT Nom,Prènom FROM agriculteurs_inscription WHERE Email = ? AND MotDePasse = ?";
            PreparedStatement preparedStatement = connection.prepareStatement(query);
            preparedStatement.setString(1, email);
            preparedStatement.setString(2, password);
            ResultSet resultSet = preparedStatement.executeQuery();

            if (resultSet.next()) {
                String name = resultSet.getString("Nom");
                String surname = resultSet.getString("Prènom");
                return new User(email, name, surname);
            }
        } catch (ClassNotFoundException | SQLException e) {
            System.out.println(e.getMessage());
        } finally {
            try {
                if (connection != null) {
                    connection.close();
                }
            } catch (SQLException e) {
                System.out.println(e.getMessage());
            }
        }
        return null;
    }

    public Scene getScene() {
        return scene;
    }
}


