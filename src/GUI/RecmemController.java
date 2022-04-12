/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import Entities.Reclamation;
import Services.Reclamationservice;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Pos;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.DatePicker;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import javafx.util.Duration;
import org.controlsfx.control.Notifications;

/**
 * FXML Controller class
 *
 * @author ihebz
 */
public class RecmemController implements Initializable {

    @FXML
    private TextField txtid_r;
    @FXML
    private TextField txtdesc_r;
    @FXML
    private TextField txtstatu_r;
    @FXML
    private Button ajouter_rt;
    @FXML
    private DatePicker txtdate_r;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void addreclamation(ActionEvent event) {
        if (txtdesc_r.getText().isEmpty()
                | txtstatu_r.getText().isEmpty()
                | txtdate_r.getEditor().getText().isEmpty() )
        
        {

            Alert alert = new Alert(Alert.AlertType.ERROR);

            alert.setTitle("Error Message");
            alert.setHeaderText(null);
            alert.setContentText("Veuillez remplir tous les champs!");
            alert.showAndWait();

        }
        
        else{
        
        if(!txtdesc_r.getText().matches("^[a-zA-Z]+$") )
         {
             
             Alert alert1 = new Alert(Alert.AlertType.ERROR);
            alert1.setTitle("Valider description");
            alert1.setHeaderText(null);
            alert1.setContentText("Merci de bien vouloir vérifier description ");
            alert1.showAndWait();
         
         
         }
        
        else{
        
        if(!txtstatu_r.getText().matches("^[a-zA-Z]+$") )
         {
             
             Alert alert1 = new Alert(Alert.AlertType.ERROR);
            alert1.setTitle("Valider statut");
            alert1.setHeaderText(null);
            alert1.setContentText("Merci de bien vouloir vérifier statut ");
            alert1.showAndWait();
         
         
         }
        
        
        else {
           
            String idr=txtid_r.getText();
        int id_r=Integer.parseInt(idr);
        String desc_r= txtdesc_r.getText();
        String statu_r= txtstatu_r.getText();
        String date_r=String.valueOf(txtdate_r.getValue());
        java.sql.Date ddr=java.sql.Date.valueOf(date_r); 
            
            Reclamation r=new Reclamation(id_r,desc_r,statu_r,ddr);
        Reclamationservice se=new Reclamationservice();
        se.ajouter(r);
        Notificationmanager(0);

            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Alert");
            alert.setHeaderText(null);
            alert.setContentText("Success reclamation Ajouté!");
            alert.showAndWait();
            
        }  }  }
    }
    
    
    
    
    @FXML
        private void semsa(ActionEvent event) throws IOException{

        Parent home_parent=FXMLLoader.load(getClass().getResource("login.fxml"));
        Scene home_scene=new Scene(home_parent);
        Stage app_stage= (Stage) ((Node) event.getSource()).getScene().getWindow();
        app_stage.setScene(home_scene);
        app_stage.show();
    
}
    
    
    
    
    
    public void Notificationmanager(int mode) {
           Notifications not = Notifications.create()
                 .graphic(null)
                 .hideAfter(Duration.seconds(10))
                 .position(Pos.BOTTOM_RIGHT)
                 .onAction(new EventHandler<ActionEvent>(){
         @Override
         public void handle (ActionEvent event) {
             System.out.println("clicked on notification");
         }
         }) ;
           not.darkStyle();
          switch(mode) {
  case 0:

   not.title("Success");
                 not.text("Ajout terminer" );
                 not.showInformation();
    break;
  case 1:

    not.title("Success ");
                 not.text("Suppression terminer");
                 not.showWarning();
    break;
    case 2:

                 not.text("Modification terminer");
                 not.title("Success");
                 not.showInformation();
    break;


  default:

}

    }
    
    
}
