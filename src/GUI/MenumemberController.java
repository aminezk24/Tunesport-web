/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author ihebz
 */
public class MenumemberController implements Initializable {

    @FXML
    private Button deconnecte_b;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }  
    
    
         @FXML
        private void goma(ActionEvent event) throws IOException{

        Parent home_parent=FXMLLoader.load(getClass().getResource("login.fxml"));
        Scene home_scene=new Scene(home_parent);
        Stage app_stage= (Stage) ((Node) event.getSource()).getScene().getWindow();
        app_stage.setScene(home_scene);
        app_stage.show();
        
        
        
        
    }
        
        
        @FXML
        private void tesla(ActionEvent event) throws IOException{

        Parent home_parent=FXMLLoader.load(getClass().getResource("recmem.fxml"));
        Scene home_scene=new Scene(home_parent);
        Stage app_stage= (Stage) ((Node) event.getSource()).getScene().getWindow();
        app_stage.setScene(home_scene);
        app_stage.show();
    
}
}
