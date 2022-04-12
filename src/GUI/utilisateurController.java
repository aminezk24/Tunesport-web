/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import Entities.Reclamation;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.fxml.Initializable;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import Entities.utilisateur;
import Services.Utilisateurservice;
import Services.IService;
import Tools.MaConnexion;
import java.io.IOException;
import java.sql.Connection;
import java.sql.Date;
import java.sql.ResultSet;
import java.time.LocalDate;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.scene.control.DatePicker;
import javafx.scene.control.TableView;
import Tools.MaConnexion;
import static com.itextpdf.text.pdf.PdfName.C;
import static com.itextpdf.text.pdf.PdfPKCS7.X509Name.C;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Optional;
//import java.time.Duration;
import javafx.util.Duration;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Pos;
import javafx.scene.Node;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.ButtonType;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.ListView;
import javafx.scene.control.RadioButton;
import javafx.scene.control.SortEvent;
import javafx.scene.control.TableColumn;
import javafx.scene.control.ToggleGroup;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.stage.Stage;
import org.controlsfx.control.Notifications;




/**
 * FXML Controller class
 *
 * @author ihebz
 */
public class utilisateurController implements Initializable {
    @FXML
    private TextField txtid;
    @FXML
    private TextField txtnom;
    @FXML
    private TextField txtprenom;
    @FXML
    private TextField txtemail;
    @FXML
    private TextField txtmdp;
    @FXML
    private DatePicker txtdate;
    @FXML
    private TextField txttel;
    @FXML
    private TextField txtrole;
    @FXML
    private Button ajouter_b;
    @FXML
    private Button supprimer_b;
    @FXML
    private Button modifier_b;
    @FXML
    private AnchorPane utilisateur;
    @FXML
    private Button login_b;
    @FXML
    private ListView list_u = new ListView();
    
    private int selectedindex_u=-1;
    
    Utilisateurservice s=new Utilisateurservice();
    private final ObservableList<utilisateur> list_util= FXCollections.observableArrayList(s.afficher()) ;
    private final ObservableList<utilisateur> list_tri_util= FXCollections.observableArrayList(s.trie()) ;
    private final ObservableList<utilisateur> list_tridesc_util= FXCollections.observableArrayList(s.triedesc()) ;
    @FXML
    private RadioButton id_rad_u;
    //@FXML
   // private ToggleGroup rech_u;
    @FXML
    private RadioButton nom_rad_u;
    @FXML
    private RadioButton date_rad_u;
    @FXML
    private Button rech_butt_u;
    @FXML
    private RadioButton id_tri_util;
    //@FXML
    //private ToggleGroup tri_u;
    @FXML
    private RadioButton date_tri_util;
    @FXML
    private TextField rech_util;
    @FXML
    private ToggleGroup trii_s;
    @FXML
    private ToggleGroup rech_til;
    
    /**
     * Initializes the controller class.
     * @param url
     * @param rb
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        list_u.refresh();
        list_u.setItems(list_util);
      
      txtid.setDisable(true);
    }    
    

    
    
    
    @FXML
    
    private void addutilisateur(ActionEvent event) throws SQLException {


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
        list_u.refresh();
        list_util.add(p);
                
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
      
    }}}}}

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

   /*private void setTxtlist(String toString) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }*/
    
      
    
    
    /*@FXML
    private void deletutilisateur(ActionEvent event){
                String id= txtid.getText();
         int idu=Integer.parseInt(id);
         
               utilisateur p=new utilisateur(idu);       
        
        Utilisateurservice se=new Utilisateurservice();

        se.supprimer(p);
        Notificationmanager(1);
       showEvent();
    }*/
    
    
    
    @FXML
    private void deletutilisateur(ActionEvent event) {

        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
            alert.setTitle("Confirmation Message");
            alert.setHeaderText(null);
            alert.setContentText("Voulez vous supprimer user ?");

            Optional<ButtonType> buttonType = alert.showAndWait();

            if (buttonType.get() == ButtonType.OK) {

                 String id= txtid.getText();
                int idu=Integer.parseInt(id);
                 list_util.remove(selectedindex_u);
               utilisateur p=new utilisateur(idu);

        Utilisateurservice se=new Utilisateurservice();
        se.supprimer(p);
        list_u.refresh();
        
        txtid.clear();
        txtnom.clear();
        txtprenom.clear();
        txtemail.clear();
        txtmdp.clear();
        txtdate.setValue(null);
        txttel.clear();
        txtrole.clear();
       
        

            } else {

                return;

            }

        Notificationmanager(1);
      
    }

    
    
    
    
    
    
    
    
    
    @FXML
    private void modifutilisateur(ActionEvent event){



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




       // String id= txtid.getText();
        // int idu=Integer.parseInt(id);
         String nom= txtnom.getText();
        String prenom= txtprenom.getText();
        String email= txtemail.getText();
        String mdp= txtmdp.getText();
        String date=String.valueOf(txtdate.getValue());
        String tel=txttel.getText();
        int telu=Integer.parseInt(tel);
        String role= txtrole.getText();

 


       

         java.sql.Date ddu=java.sql.Date.valueOf(date);


  
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
            alert.setTitle("Confirmation Message");
            alert.setHeaderText(null);
            alert.setContentText("Voulez vous modifier user ?");

            Optional<ButtonType> buttonType = alert.showAndWait();

            if (buttonType.get() == ButtonType.OK) {
      
        String id= txtid.getText();
        int ideu=Integer.parseInt(id);
        utilisateur p=new utilisateur(ideu,telu,nom,prenom,email,mdp,role,ddu);
        Utilisateurservice es = new Utilisateurservice();
        Utilisateurservice se=new Utilisateurservice();

       es.modifier(p);
       
       list_util.remove(selectedindex_u);
       list_util.add(p);
       txtid.clear();
       txtnom.clear();
        txtprenom.clear();
        txtemail.clear();
        txtmdp.clear();
        txtdate.setValue(null);
        txttel.clear();
        txtrole.clear();
       Notificationmanager(2);

 } else {

                return;

            }
            
      
      
    }
        }
        
    }}}
    
    
    private TableView<utilisateur> view_u;
    // @FXML
   // private TableColumn<utilisateur,Integer> colid;
    private TableColumn<utilisateur,String> colnom;
    private TableColumn<utilisateur,String> colprenom;
    private TableColumn<utilisateur,String> colemail;
    private TableColumn<utilisateur,String> colmdp;
    private TableColumn<utilisateur,Date> coldate;
    private TableColumn<utilisateur,Integer> coltel;
    private TableColumn<utilisateur,String> colrole;
    
    
    public ObservableList<utilisateur> getutilisateurlist() {
    ObservableList<utilisateur> utilisateurList = FXCollections.observableArrayList();
    Connection cnx= MaConnexion.getInstance().getCnx();
    String query ="SELECT * FROM utilisateur";
    Statement st;
    ResultSet rs;
    try{
        st = cnx.createStatement();
        rs = st.executeQuery(query);
        utilisateur rec;
        while(rs.next()){
            rec = new utilisateur(rs.getInt("tel"),rs.getString("nom"),rs.getString("prenom"),rs.getString("email"),rs.getString("mdp"),rs.getString("role"),rs.getDate("date"));
            utilisateurList.add(rec);
    }
    }catch(Exception ex){
        ex.printStackTrace();
    }
    return utilisateurList;
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



  
    
    
    
    @FXML
    private void log(ActionEvent event) throws IOException{

        Parent home_parent=FXMLLoader.load(getClass().getResource("login.fxml"));
        Scene home_scene=new Scene(home_parent);
        Stage app_stage= (Stage) ((Node) event.getSource()).getScene().getWindow();
        app_stage.setScene(home_scene);
        app_stage.show();
    }

    @FXML
    private void clicked_u(MouseEvent event) {
        utilisateur selecteditem=(utilisateur) list_u.getSelectionModel().getSelectedItem();
        selectedindex_u=list_u.getSelectionModel().getSelectedIndex(); 
        txtid.setText(""+selecteditem.getId());
        txtnom.setText(selecteditem.getNom());
        txtprenom.setText(selecteditem.getPrenom());
        txtemail.setText(selecteditem.getEmail());
        txtmdp.setText(selecteditem.getMdp());
        
        txtdate.setValue(selecteditem.getDate().toLocalDate());
        
        txttel.setText(""+selecteditem.getTel());
        txtrole.setText(selecteditem.getRole());
    }

    @FXML
    private void recherche_u(ActionEvent event) {
         if(id_rad_u.isSelected()){
        String idd= rech_util.getText();
        int idev=Integer.parseInt(idd);
        utilisateur p=new utilisateur(idev);
        Utilisateurservice se=new Utilisateurservice();
        se.rechercher(p);
        list_u.setItems(FXCollections.observableArrayList(se.rechercher(p)));
        } 
    
        if(date_rad_u.isSelected()){
       java.sql.Date ddee=java.sql.Date.valueOf(rech_util.getText());
        utilisateur E=new utilisateur(ddee);
        Utilisateurservice se=new Utilisateurservice();
        se.rechercher(E);

      list_u.setItems(FXCollections.observableArrayList(se.rechercher(E)));
        }
        if(nom_rad_u.isSelected()){
        String nom= rech_util.getText();
        utilisateur E=new utilisateur(nom);
        Utilisateurservice se=new Utilisateurservice();
        se.rechercher(E);
         list_u.setItems(FXCollections.observableArrayList(se.rechercher(E)));
        }
    }

    @FXML
    private void tri_id_u(ActionEvent event) {
        Utilisateurservice se = new Utilisateurservice();
        list_u.refresh();
        list_u.setItems(list_tri_util);
        list_u.refresh();
    }

    @FXML
    private void tri_date_u(ActionEvent event) {
        list_u.refresh();
        list_u.setItems(list_tridesc_util);
        list_u.refresh();
    }
    
    
    
    
    
    
    
}
