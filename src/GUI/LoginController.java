/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import Entities.utilisateur;
import Tools.MaConnexion;
import static com.itextpdf.text.pdf.PdfName.AND;
import java.awt.event.MouseEvent;
import java.io.File;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.control.PasswordField;
import javafx.stage.Stage;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.media.Media;
import javafx.scene.media.MediaPlayer;
import sun.security.util.Password;

/**
 * FXML Controller class
 *
 * @author ihebz
 */
public class LoginController implements Initializable {
Connection cnx= MaConnexion.getInstance().getCnx();
    /**
     * Initializes the controller class.
     * @param url
     * @param rb
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
    
    @FXML
    private Button cancelbutton;
    @FXML
    private Label loginmessage;
    @FXML
    private TextField emailtext;
    @FXML
    private PasswordField passwordtext;
    @FXML
    private TextField roletext;
    @FXML
    private Button inscrirebutton;
    
    MediaPlayer mediaPlayer;
    
    
  /*  void playm(MouseEvent event){
        String fileName="msn-new-email-sound.mp3";
        playHiSound(fileName);
    }*/
    
    private void playHiSound(){
        String path = "C:\\Users\\ihebz\\OneDrive\\Bureau\\projet\\JavaApplication3A10\\src\\musique\\Ry Cooder - King of the Street.WAV";
        Media media = new Media(new File(path).toURI().toString());
        mediaPlayer = new MediaPlayer(media);
        mediaPlayer.setCycleCount(MediaPlayer.INDEFINITE);
        mediaPlayer.play();
        
    }
    
    private void playHiSound2(){
        String path = "C:\\Users\\ihebz\\OneDrive\\Bureau\\projet\\JavaApplication3A10\\src\\musique\\AcDc -_Whole Lotta Rosie.wav";
        Media media = new Media(new File(path).toURI().toString());
        mediaPlayer = new MediaPlayer(media);
        mediaPlayer.setCycleCount(MediaPlayer.INDEFINITE);
        mediaPlayer.play();
        
    }
    
    
    
    
   /* public boolean validadmin(String ts,String m) throws SQLException {
        Statement s = cnx.createStatement();
        ResultSet rs = s.executeQuery("SELECT role from utilisateur WHERE email = '" + ts + "' AND mdp = '" + m +"'");
        boolean t;
        String b="admin";
        if(rs.getString("role")==("admin")){
                    t=true;
           }else{t=false;}
    return t;
        
    }*/
    
    
        public boolean validadmin(String ts,String m) {
        
       // Connection cnx= MaConnexion.getInstance().getCnx();
        
       // System.out.println(Password);
        String queryCheck = "SELECT role from utilisateur WHERE email = '"
                + ts + "' AND mdp = '"
               + m + "'";
         boolean t=true ;
    try {
            Statement ste = cnx.createStatement();
        ResultSet rs = ste.executeQuery(queryCheck);
            //Object role=queryCheck;
            //ResultSet rs = statement.executeQuery(q1);
           if(rs.getString("role").equals("admin")){
                    t=true;
           }else{t=false;}
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        
        return t;
    }
    
        
        
        
            public void validateLogin() {
        
        Connection cnx= MaConnexion.getInstance().getCnx();
        
       // System.out.println(Password);
        String queryCheck = "SELECT * from utilisateur WHERE email = '"
                + emailtext.getText() + "' AND mdp = '"
               + passwordtext.getText() + "'";
    try {
            Statement ste = cnx.createStatement();
        ResultSet rs = ste.executeQuery(queryCheck);
            //ResultSet rs = statement.executeQuery(q1);
            if (rs.next() != false) {               
                loginmessage.setText("welcome");
                
      
                
                
            }else{loginmessage.setText("error");
            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        
        
    }
    
    
    
    
    public void loginButtonOnAction(ActionEvent e) throws IOException, SQLException{
        if(emailtext.getText().isEmpty()==false && passwordtext.getText().isEmpty()==false){
           loginmessage.setText("you try to login!");
          validateLogin();
          if(loginmessage.getText()=="welcome"){
              
              playHiSound();
              if(roletext.getText().equals("member")){
              //if(validadmin(emailtext.getText(),passwordtext.getText())==true){
               


        Parent home_parent=FXMLLoader.load(getClass().getResource("menumember.fxml"));
        Scene home_scene=new Scene(home_parent);
        Stage app_stage= (Stage) ((Node) e.getSource()).getScene().getWindow();
        app_stage.setScene(home_scene);
        app_stage.show();
              }else{
                  playHiSound();
                  Parent home_parent=FXMLLoader.load(getClass().getResource("menu.fxml"));
        Scene home_scene=new Scene(home_parent);
        Stage app_stage= (Stage) ((Node) e.getSource()).getScene().getWindow();
        app_stage.setScene(home_scene);
        app_stage.show();
              }
     
          
          
        }else{
            loginmessage.setText("Error");
           
        }
        }
    }
    
    public void cancelbuttonOnAction(ActionEvent e){
        Stage stage = (Stage) cancelbutton.getScene().getWindow();
        stage.close();
    }
    
    @FXML
    private void inscrirebuttonOnAction(ActionEvent event) throws IOException{
        
        playHiSound2();

        Parent home_parent=FXMLLoader.load(getClass().getResource("sinscri.fxml"));
        Scene home_scene=new Scene(home_parent);
        Stage app_stage= (Stage) ((Node) event.getSource()).getScene().getWindow();
        app_stage.setScene(home_scene);
        app_stage.show();
    }
    
    /*public void validateLogin(){
        MaConnexion connectNow = new MaConnexion();
        //Connection connection = connectNow.
        //Connection cnx= MaConnexion.getInstance().getCnx();
    }*/
    
    
    
    
    
    

    
    
    

    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
