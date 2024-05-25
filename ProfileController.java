import javafx.fxml.FXML;
import javafx.scene.control.Label;
import javafx.scene.layout.VBox;

public class ProfileController {

    @FXML
    private VBox profileView;

    @FXML
    private Label nameLabel;

    @FXML
    private Label surnameLabel;

    private User user;

    public void setUser(User user) {
        this.user = user;
        displayUserInfo();
    }

    private void displayUserInfo() {
        if (user != null) {
            nameLabel.setText("Name: " + user.getName());
            surnameLabel.setText("Surname: " + user.getSurname());
        }
    }

    public VBox getView() {
        return profileView;
    }
}
