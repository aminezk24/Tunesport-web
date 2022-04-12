/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import Entities.utilisateur;
import Services.Utilisateurservice;
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
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import javafx.util.Duration;
import org.controlsfx.control.Notifications;

/**
 * FXML Controller class
 *
 * @author ihebz
 */
public class SinscriController implements Initializable {

    @FXML
    private Button ajouter_b;
    @FXML
    private PasswordField txtmdp;
    @FXML
    private DatePicker txtdate;
    @FXML
    private TextField txtid;
    @FXML
    private TextField txtnom;
    @FXML
    private TextField txtprenom;
    @FXML
    private TextField txtemail;
    @FXML
    private TextField txttel;
    @FXML
    private TextField txtrole;
    @FXML
    private Button deco_tun;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }   
    @FXML
        private void sima(ActionEvent event) throws IOException{

        Parent home_parent=FXMLLoader.load(getClass().getResource("login.fxml"));
        Scene home_scene=new Scene(home_parent);
        Stage app_stage= (Stage) ((Node) event.getSource()).getScene().getWindow();
        app_stage.setScene(home_scene);
        app_stage.show();
    }

    @FXML
    private void addutilisateur(ActionEvent event) {
        
  if (txtnom.getText().isEmpty()
                | txtprenom.getText().isEmpty()
                | txtemail.getText().isEmpty()
                | txtmdp.getText().isEmpty()
                | txttel.getText().isEmpty() 
                | txtrole.getText().isEmpty()) {
  

            Alert alert = new Alert(Alert.AlertType.ERROR);

            alert.setTitle("Error Message");
            alert.setHeaderText(null);
            alert.setContentText("Veuillez remplir tous les champs!");
            alert.showAndWait();

        } 
        else{
        
      
        if(!txtnom.getText().matches("^[a-zA-Z]+$") )
         {
             
             Alert alert1 = new Alert(Alert.AlertType.ERROR);
            alert1.setTitle("Valider votre Nom");
            alert1.setHeaderText(null);
            alert1.setContentText("Merci de bien vouloir vérifier votre Nom ");
            alert1.showAndWait();
         
         
         }
        else{
        if(!txtprenom.getText().matches("^[a-zA-Z]+$") )
         {
             
             Alert alert1 = new Alert(Alert.AlertType.ERROR);
            alert1.setTitle("Valider votre Prenom");
            alert1.setHeaderText(null);
            alert1.setContentText("Merci de bien vouloir vérifier votre Prenom ");
            alert1.showAndWait();
         
         
         }


else if(!txtemail.getText().matches("^[a-zA-Z0-9][a-zA-Z0-9._]*@[a-zA-Z0-9]+([.][a-zA-Z]+)+$"))
         {
             Alert alert1 = new Alert(Alert.AlertType.ERROR);
            alert1.setTitle("Valider votre Email");
            alert1.setHeaderText(null);
            alert1.setContentText("Merci de bien vouloir vérifier votre Email ");
            alert1.showAndWait();

}

else{
        if(!txtmdp.getText().matches("^[a-zA-Z]+$") )
         {
             
             Alert alert1 = new Alert(Alert.AlertType.ERROR);
            alert1.setTitle("Valider votre Prenom");
            alert1.setHeaderText(null);
            alert1.setContentText("Merci de bien vouloir vérifier votre mot de pass ");
            alert1.showAndWait();
         
         
         }



else if(!txttel.getText().matches("^([1-9][0-9]{0,10}|1000)$")){    
          Alert alert1 = new Alert(Alert.AlertType.ERROR);
            alert1.setTitle("Valider le numéro de téléphone");
            alert1.setHeaderText(null);
            alert1.setContentText("Veuillez verifier que les chiffres qui composent le numéro soient entre 1 et 9 ");
            alert1.showAndWait();}



else{








       // String idu=txtid.getText();
        //int id=Integer.parseInt(idu);
        String nom= txtnom.getText();
        String prenom= txtprenom.getText();
        String email= txtemail.getText();
        String mdp= txtmdp.getText();
        String date=String.valueOf(txtdate.getValue());
        String tel=txttel.getText();
       int telu=Integer.parseInt(tel);
        String role= txtrole.getText();

        //String datefinev=String.valueOf(txtdatefinevent.getValue());
        //String descev=txtdescevent.getText();

        java.sql.Date ddu=java.sql.Date.valueOf(date);
        //java.sql.Date dfe=java.sql.Date.valueOf(datefinev);

        utilisateur p=new utilisateur(telu,nom,prenom,email,mdp,role,ddu);
        Utilisateurservice se=new Utilisateurservice();


Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Alert");
            alert.setHeaderText(null);
            alert.setContentText("Success user Ajouté!");
            alert.showAndWait();

        se.ajouter(p);
 
                
        Notificationmanager(0);
             
       /*FXMLLoader loader = new FXMLLoader(getClass().getResource("FXML.fxml"));
        try {
            Parent root = loader.load();
            utilisateurController ac = loader.getController();
            ac.setTxtlist(se.afficher().toString());
            txtnom.getScene().setRoot(root);
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } */ 
    }
}
        }}}




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
       