/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Services;

import com.itextpdf.text.Document;
import com.itextpdf.text.DocumentException;
import com.itextpdf.text.Paragraph;
import com.itextpdf.text.pdf.PdfWriter;
import Entities.Reclamation;
import Entities.utilisateur;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import Tools.MaConnexion;
import java.sql.Date;


import java.util.Properties;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.mail.Authenticator;
import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.PasswordAuthentication;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.AddressException;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;

/**
 *
 * @author Fayechi
 */
public class Utilisateurservice  implements IService<utilisateur>{

    
    Connection cnx= MaConnexion.getInstance().getCnx();
    
    
   
     
    
    
    
    
    
    public int existeMail(utilisateur p) throws SQLException {
        Statement s = cnx.createStatement();
        ResultSet rs = s.executeQuery("SELECT COUNT(*) from utilisateur WHERE email = '" + p.getEmail() + "'");
        int size = 0;
        rs.next();
        size = rs.getInt(1);
        return size;
    }
    
    
    
    
    
    
    
    
    
    
    
    @Override
    public void ajouter(utilisateur p) {
        try {
   
        
        
            
             if(existeMail(p)==0){
             //if(p!=null && p.getEmail().equals(p.email)){

            String sql="INSERT into utilisateur(nom,prenom,email,mdp,role,tel,date) VALUES('"+p.getNom()+"','"+p.getPrenom()+"','"+p.getEmail()+"','"+p.getMdp()+"','"+p.getRole()+"','"+p.getTel()+"','"+new Date(p.getDate().getTime())+"')";       
            Statement ste = cnx.createStatement();
            ste.executeUpdate(sql);
            sendMail(p.getEmail());
            System.out.println("utilisateur Ajoutée");
             }else{
                System.out.println("email existe déja");
             }
            //  }else{
                //  System.out.println("email existe déja");
             // }
          
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        } catch (Exception ex) {
            Logger.getLogger(Utilisateurservice.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }
   
  @Override
    public void supprimer(utilisateur p){
        try{
        String sql="DELETE FROM utilisateur WHERE id ='"+p.getId()+"'";
           Statement ste = cnx.createStatement();
            ste.executeUpdate(sql);
            System.out.println("utilisateur Supprimer");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        
    }
    
    @Override
    public void modifier(utilisateur p){
        try{
        String sql="UPDATE utilisateur SET nom='"+p.getNom()+"',prenom='"+p.getPrenom()+"',email='"+p.getEmail()+"',mdp='"+p.getMdp()+"',role='"+p.getRole()+"',date='"+new Date(p.getDate().getTime())+"',tel='"+p.getTel()+"' WHERE id="+p.getId();
        Statement ste = cnx.createStatement();
        ste.executeUpdate(sql);
        System.out.println("utilisateur Modifier");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        }
    
    
     /* @Override
        public void rechercher(int e) {
        try {
            String sql="select * from utilisateur where id ='"+e+"'";
            Statement ste = cnx.createStatement();
            ResultSet rst=ste.executeQuery(sql);
            rst.last();
            int nbrrow=rst.getRow();
            if(nbrrow!=0){
                 System.out.println("utilisateur trouvée");
            }else{
                 System.out.println("utilisateur non trouvée");
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        
    }*/
    
    
    @Override
    public List<utilisateur> afficher() {
        List<utilisateur> utilisateur = new ArrayList<>();
        String sql ="select * from utilisateur";
        try {
            Statement ste= cnx.createStatement();
            ResultSet rs =ste.executeQuery(sql);
            while(rs.next()){
                utilisateur e = new utilisateur();
               // p.setId(rs.getInt("id"));
                e.setId(rs.getInt("id"));
                e.setNom(rs.getString("nom"));
                e.setPrenom(rs.getString("prenom"));
                e.setEmail(rs.getString("email"));
                e.setMdp(rs.getString("mdp"));
                e.setDate(rs.getDate("date"));
                e.setTel(rs.getInt("tel"));
                e.setRole(rs.getString("role"));

                utilisateur.add(e);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return utilisateur;
    }



    
    
    
    
     /**
     *
     * @param e
     * @return
     */
    //@Override
    public List<utilisateur> rechercher(utilisateur e) {
        List<utilisateur> even = new ArrayList<>();
        String sql="SELECT * FROM utilisateur WHERE id ='"+e.getId()+"'OR nom='"+e.getNom()+"'OR date='"+e.getDate()+"'";
        try {
            Statement ste= cnx.createStatement();
            ResultSet rs =ste.executeQuery(sql);
            while(rs.next()){
                utilisateur ee = new utilisateur();
                ee.setId(rs.getInt("id"));
                ee.setNom(rs.getString("nom"));
                ee.setPrenom(rs.getString("prenom"));
                ee.setEmail(rs.getString("email"));
                ee.setMdp(rs.getString("mdp"));
                ee.setDate(rs.getDate("date"));
                ee.setTel(rs.getInt("tel"));
                ee.setRole(rs.getString("role"));
                even.add(ee);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return even;
    }
    
    
    
    
    @Override
    public List<utilisateur> trie() {
        List<utilisateur> Utilisateur = new ArrayList<>();
        String sql ="SELECT * FROM utilisateur ORDER BY id ASC";
        try {
            Statement ste= cnx.createStatement();
            ResultSet rs =ste.executeQuery(sql);
            while(rs.next()){
                utilisateur p = new utilisateur();
               // p.setId(rs.getInt("id"));
                p.setId(rs.getInt("id"));
                p.setNom(rs.getString("nom"));
                p.setPrenom(rs.getString("prenom"));
                p.setEmail(rs.getString("email"));
                p.setTel(rs.getInt("tel"));
                p.setDate(rs.getDate("date"));
                p.setRole(rs.getString("role"));
                Utilisateur.add(p);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return Utilisateur;
    }
    
    
    
    public static void sendMail(String recepient) throws Exception{
        System.err.println("preparing to send email");
        Properties properties = new Properties();
        
        properties.put("mail.smtp.auth", "true"); 
        properties.put("mail.smtp.starttls.enable", "true");
        properties.put("mail.smtp.host", "smtp.gmail.com");
        properties.put("mail.smtp.port", "587");
        
        String myAccountEmail = "ihebzouaoui888@gmail.com";
        String password = "iheb1234";
        
        Session session = Session.getInstance(properties, new  Authenticator() {
        @Override
        protected PasswordAuthentication getPasswordAuthentication(){
            return new PasswordAuthentication(myAccountEmail, password);
        }
      });
        
         Message message = prepareMessage(session, myAccountEmail,recepient);
         
         Transport.send(message);
         System.out.println("message sent successfully");
    }
         
         
         private static Message prepareMessage(Session session,String myAccountEmail,String recepient) {
        try {
            Message message = new MimeMessage(session);
            message.setFrom(new InternetAddress(myAccountEmail));
            message.setRecipient(Message.RecipientType.TO, new InternetAddress(recepient));
            message.setSubject("welcome");
            message.setText("hey there,\n bienvenue a tunesport");
            return message;
        } catch (Exception ex) {
            Logger.getLogger(Utilisateurservice.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
              }
    
    
    
   
    
    
    public void pdf(utilisateur p) throws FileNotFoundException, DocumentException {
        try {
        String file_name="C:\\Users\\ihebz\\OneDrive\\Bureau\\pdf\\iheb.pdf";
        Document doc =new Document();
        PdfWriter.getInstance(doc, new FileOutputStream(file_name));
        doc.open();
        PreparedStatement ps=null;
        ResultSet rs=null;
         String querry="SELECT * FROM utilisateur";

            ps=cnx.prepareStatement(querry);
            rs=ps.executeQuery();
            while(rs.next()) {
                Paragraph para=new Paragraph(rs.getString("nom")+" "+rs.getString("prenom")+" "+rs.getString("email")+" "+rs.getString("mdp")+" "+rs.getInt("tel")+" "+rs.getString("role"));
                doc.add(para);
                doc.add(new Paragraph(" "));

            }
            doc.close();


        }catch(Exception k){
            System.err.println(k);

        }

    }

    @Override
    public List<utilisateur> triedesc() {
        List<utilisateur> utilisateur = new ArrayList<>();
        String sql ="SELECT * FROM utilisateur ORDER BY date ASC";
        try {
            Statement ste= cnx.createStatement();
            ResultSet rs =ste.executeQuery(sql);
            while(rs.next()){
                utilisateur e = new utilisateur();
               // p.setId(rs.getInt("id"));
                e.setId(rs.getInt("id"));
                e.setNom(rs.getString("nom"));
                e.setPrenom(rs.getString("prenom"));
                e.setEmail(rs.getString("email"));
                e.setMdp(rs.getString("mdp"));
                e.setTel(rs.getInt("tel"));
                e.setRole(rs.getString("role"));
                e.setDate(rs.getDate("date"));
                utilisateur.add(e);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return utilisateur;
    }
}



