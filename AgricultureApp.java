import javafx.application.Application;
import javafx.stage.Stage;
import javafx.scene.Scene;
import java.sql.*;
public class AgricultureApp extends Application {



    @Override
    public void start(Stage primaryStage) throws SQLException {
        try {
            Connection connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/agri_connect", "root", "");
            SignUpPage s = new SignUpPage(primaryStage, connection);
            LoginPage l=new LoginPage(primaryStage,connection);

            // Create an instance of the HomePage class
            HomePage homePage = new HomePage(primaryStage,l.getScene(),s.getScene());

            // Set the scene to the homepage
            primaryStage.setScene(homePage.getScene());

            // Set the title of the stage
            primaryStage.setTitle("FallahConn");

            // Display the stage
            primaryStage.show();
        }catch(SQLException e){
            System.out.println(e.getMessage());
        }
    }
    public static void main(String[] args) {
        launch(args);
    }
}
