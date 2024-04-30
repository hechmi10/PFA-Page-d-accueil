import java.sql.*;
import javafx.application.Application;
import javafx.scene.Scene;
import javafx.stage.Stage;
public class AgricultureApp extends Application {

    private Connection connection;

    @Override
    public void start(Stage primaryStage) {
        try {
            Connection connection=DriverManager.getConnection("jdbc:mysql://localhost:3306/agri_connect","root","");
            LoginPage loginPage = new LoginPage(primaryStage);
            SignUpPage signupPage = new SignUpPage(primaryStage, connection);
            HomePage homePage = new HomePage(primaryStage, loginPage.getScene(), signupPage.getScene());
            primaryStage.setScene(homePage.getScene());
            primaryStage.setTitle("Fallah Connect");
            primaryStage.show();
        }catch(SQLException e){
            System.out.println(e.getMessage());
        }
    }
    public static void main(String[] args) {
        launch(args);
    }
}

