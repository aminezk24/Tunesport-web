/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import Entities.Reclamation;
import Services.Reclamationservice;
import Tools.MaConnexion;
import java.io.IOException;
import java.net.URL;
import java.sql.Connection;
import java.sql.Date;
import java.sql.ResultSet;
import java.sql.Statement;
import java.sql.Timestamp;
import java.util.Optional;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
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
import javafx.scene.control.ButtonType;
import javafx.scene.control.DatePicker;
import javafx.scene.control.ListView;
import javafx.scene.control.RadioButton;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.ToggleGroup;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.stage.Stage;
import javafx.util.Duration;
import org.controlsfx.control.Notifications;


/**
 * FXML Controller class
 *
 * @author ihebz
 */
public class ReclamationController implements Initializable {
    
    @FXML
    private TextField txtid_r;
    @FXML
    private TextField txtdesc_r;
    @FXML
    private TextField txtstatu_r;
    @FXML
    private DatePicker txtdate_r;
   // @FXML
   // private Timestamp txtheur_r;
    @FXML
    private AnchorPane Reclamation;
    @FXML
    private Button ajouter_r;
    @FXML
    private Button supprimer_r;
    @FXML
    private Button modifier_r;
     @FXML
    private ListView list_r = new ListView();
    
    private int selectedindex_r=-1;
    
    Reclamationservice s=new Reclamationservice();
    private final ObservableList<Reclamation> list_rec= FXCollections.observableArrayList(s.afficher()) ;
    private final ObservableList<Reclamation> tri_rec= FXCollections.observableArrayList(s.trie()) ;
    private final ObservableList<Reclamation> tri_desc_rec= FXCollections.observableArrayList(s.triedesc()) ;
    @FXML
    private Button dec_b;
    @FXML
    private RadioButton id_rad;
    @FXML
    private ToggleGroup rech_u;
    @FXML
    private RadioButton nom_rad;
    @FXML
    private TextField rech_txt_r;

    @FXML
    private RadioButton date_rad;
    @FXML
    private Button rech_butt;
    @FXML
    private RadioButton id_tri_u;
    @FXML
    private ToggleGroup tri_u;
    @FXML
    private RadioButton date_tri_u;

    /**
     * Initializes the controller class.
     * @param url
     * @param rb
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        list_r.refresh();
        list_r.setItems(list_rec);
        // TODO
      //   showEvent();
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
        list_r.refresh();
        list_rec.add(r);
        Notificationmanager(0); 

            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Alert");
            alert.setHeaderText(null);
            alert.setContentText("Success reclamation Ajouté!");
            alert.showAndWait();
            
        }  }  }  }
    
    
    
    
    
    
    
    @FXML
    private void deletreclamation(ActionEvent event){
                String id_r= txtid_r.getText();
         int idr=Integer.parseInt(id_r);
         list_rec.remove(selectedindex_r);
               Reclamation r=new Reclamation(idr);       
        
        Reclamationservice se=new Reclamationservice();

        se.supprimer(r);
        list_r.refresh();
        
        txtid_r.clear();
        txtdesc_r.clear();
        txtstatu_r.clear();
        txtdate_r.setValue(null);
        Notificationmanager(1);
       /*FXMLLoader loader = new FXMLLoader(getClass().getResource("FXML.fxml"));
        try {
            Parent root = loader.load();
            utilisateurController ac = loader.getController();
            ac.setTxtlist(se.afficher().toString());
            txtid.getScene().setRoot(root);
        } catch (IOException ex) {
            System.out.println(ex.getMessage());
        } */
       
    }
    
    
    
    
    /*@FXML
    private void modifreclamation(ActionEvent event){
         String idr=txtid_r.getText();
        int id_r=Integer.parseInt(idr);  
        String desc_r= txtdesc_r.getText();
        String statu_r= txtstatu_r.getText();
        String date_r=String.valueOf(txtdate_r.getValue());
        java.sql.Date ddr=java.sql.Date.valueOf(date_r);
        Reclamation r=new Reclamation(id_r,desc_r,statu_r,ddr);         
        Reclamationservice es = new Reclamationservice();
        Reclamationservice se=new Reclamationservice();

       es.modifier(r);
       Notificationmanager(2);
       showEvent();
    }*/
    
    
    @FXML
    private void modifreclamation(ActionEvent event) {

        if (txtdesc_r.getText().isEmpty()
                | txtstatu_r.getText().isEmpty()
                | txtdate_r.getValue().toString().isEmpty()
 ) {

            Alert alert = new Alert(Alert.AlertType.ERROR);

            alert.setTitle("Error Message");
            alert.setHeaderText(null);
            alert.setContentText("Veuillez remplir tous les champs!");
            alert.showAndWait();

        }  else{
        
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
            
            
            
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
            alert.setTitle("Confirmation Message");
            alert.setHeaderText(null);
            alert.setContentText("Voulez vous modifier cette reclamation ?");

            Optional<ButtonType> buttonType = alert.showAndWait();
            
             if (buttonType.get() == ButtonType.OK) {

               Reclamation r=new Reclamation(id_r,desc_r,statu_r,ddr);
               Reclamationservice es = new Reclamationservice();
               Reclamationservice se=new Reclamationservice();

            es.modifier(r);
            list_rec.remove(selectedindex_r);
       list_rec.add(r);
       txtid_r.clear();
        txtdesc_r.clear();
        txtstatu_r.clear();
        txtdate_r.setValue(null);
       Notificationmanager(2);
            } else {

                return;

            }
           

             
        }
        }}}
    
    
    
    
    
    
    
    private TableView<Reclamation> view_r;
    private TableColumn<Reclamation,Integer> colid_r;
    private TableColumn<Reclamation,String> coldesc_r;
    private TableColumn<Reclamation,String> colstatu_r;
    private TableColumn<Reclamation,Date> coldate_r;
   // @FXML
   // private TableColumn<Reclamation,Timestamp> colheur_r;
    
    
    
    
    
    
    
    
    
    
    
   
    
    
    
    
    
    
    
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
    
    
    
    @FXML
    private void nog(ActionEvent event) throws IOException{

        Parent home_parent=FXMLLoader.load(getClass().getResource("login.fxml"));
        Scene home_scene=new Scene(home_parent);
        Stage app_stage= (Stage) ((Node) event.getSource()).getScene().getWindow();
        app_stage.setScene(home_scene);
        app_stage.show();
    }

    @FXML
    private void click_r(MouseEvent event) {
        Reclamation selecteditem=(Reclamation) list_r.getSelectionModel().getSelectedItem();
        selectedindex_r=list_r.getSelectionModel().getSelectedIndex(); 
        txtid_r.setText(""+selecteditem.getId_r());
        txtdesc_r.setText(selecteditem.getDesc_r());
        txtstatu_r.setText(selecteditem.getStatu_r());;
        txtdate_r.setValue(selecteditem.getDate_r().toLocalDate());
    }

    @FXML
    private void recherche_u(ActionEvent event) {
        if(id_rad.isSelected()){
        String idd= rech_txt_r.getText();
        int idev=Integer.parseInt(idd);
        Reclamation E=new Reclamation(idev);
        Reclamationservice se=new Reclamationservice();
        se.recherche(E);
        list_r.setItems(FXCollections.observableArrayList(se.recherche(E)));
        } 
    
        if(date_rad.isSelected()){
       java.sql.Date ddee=java.sql.Date.valueOf(rech_txt_r.getText());
        Reclamation E=new Reclamation(ddee);
        Reclamationservice se=new Reclamationservice();
        se.recherche(E);

      list_r.setItems(FXCollections.observableArrayList(se.recherche(E)));
        }
    }
    

    @FXML
    private void tri_id_u(ActionEvent event) {
        Reclamationservice se = new Reclamationservice();
        list_r.refresh();
        list_r.setItems(tri_rec);
        list_r.refresh();

    }

    @FXML
    private void tri_date_u(ActionEvent event) {
                list_r.refresh();
        list_r.setItems(tri_desc_rec);
        list_r.refresh();
    }

   
    
    
    
    
    
}
