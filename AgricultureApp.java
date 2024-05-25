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
            gestionstock t=new gestionstock(primaryStage,connection);
            suiviculture c=new suiviculture(primaryStage,connection);
            planificationrecolte r=new planificationrecolte(primaryStage,connection);
            gestiondesfermes g=new gestiondesfermes(primaryStage,c.getScene(),t.getScene(),r.getScene());
            HomePage homePage = new HomePage(primaryStage,l.getScene(),s.getScene(),g.getScene());
            primaryStage.setScene(homePage.getScene());
            primaryStage.setTitle("Fallah Connect");
            primaryStage.show();
            connection.close();
        }catch(SQLException e){
            System.out.println(e.getMessage());
        }
    }
    public static void main(String[] args) {
        launch(args);
    }
}
