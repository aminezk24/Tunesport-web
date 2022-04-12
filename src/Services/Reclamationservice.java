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
import java.sql.Timestamp;




/**
 *
 * @author ihebz
 */
public class Reclamationservice implements IService<Reclamation> {
        Connection cnx= MaConnexion.getInstance().getCnx();
        Statement stmt = null;
        ResultSet rs = null;

    /**
     *
     * @param r
     */
    @Override
        public void ajouter(Reclamation r){
        try {
            String sql="INSERT INTO Reclamation(id_r,desc_r,statu_r,date_r) VALUES('"+r.getId_r()+"','"+r.getDesc_r()+"','"+r.getStatu_r()+"','"+new Date(r.getDate_r().getTime())+"')";
            Statement ste = cnx.createStatement();
            ste.executeUpdate(sql);
            System.out.println("reclamation Ajoutée");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        
    }
        @Override
        public void supprimer(Reclamation r){
        try{
        String sql="DELETE FROM Reclamation WHERE id_r='"+r.getId_r()+"'";
           Statement ste = cnx.createStatement();
            ste.executeUpdate(sql);
            System.out.println("Reclamation Supprimer");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        
    }
                @Override
            public void modifier(Reclamation r){
        try{
        String sql="UPDATE Reclamation SET id_r ='"+r.getId_r()+"', desc_r='"+r.getDesc_r()+"',statu_r='"+r.getStatu_r()+"',date_r='"+new Date(r.getDate_r().getTime())+"' WHERE id_r="+r.getId_r();
        Statement ste = cnx.createStatement();
        ste.executeUpdate(sql);
        System.out.println("reclamation Modifier");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        }
       
        @Override
    public List<Reclamation> afficher() {
        List<Reclamation> Reclamation = new ArrayList<>();
          
        String sql ="select * from reclamation";
        try {
            Statement ste= cnx.createStatement();
            ResultSet rs =ste.executeQuery(sql);
            while(rs.next()){
                Reclamation r = new Reclamation();
                System.out.print(rs.getInt("id_r")+"__");
                System.out.print(rs.getString("desc_r")+"__");
                System.out.print(rs.getString("statu_r")+"__");
                Reclamation.add(r);
                //System.out.print(rs.getTimestamp("heur_r")+"__");
                System.out.println(rs.getDate("date_r")+"__");
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return Reclamation;
    }
        
    /**
     *
     * @param R
     * @param e
     * @return
     */
       // @Override
    public List<Reclamation> recherche(Reclamation e) {
        List<Reclamation> even = new ArrayList<>();
        String sql="SELECT * FROM reclamation WHERE id_r ='"+e.getId_r()+"'OR date_r='"+e.getDate_r()+"'";
        try {
            Statement ste= cnx.createStatement();
            ResultSet rs =ste.executeQuery(sql);
            while(rs.next()){
                Reclamation ee = new Reclamation();
                ee.setId_r(rs.getInt("id_r"));
                ee.setDesc_r(rs.getString("desc_r"));
                ee.setStatu_r(rs.getString("statu_r"));
                ee.setDate_r(rs.getDate("date_r"));
                even.add(ee);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return even;
    }
    
    
    
    
    @Override
    public List<Reclamation> trie() {
        List<Reclamation> Reclamation = new ArrayList<>();
        String sql ="SELECT * FROM reclamation ORDER BY id_r ASC";
        try {
            Statement ste= cnx.createStatement();
            ResultSet rs =ste.executeQuery(sql);
            while(rs.next()){
                Reclamation r = new Reclamation();
               // p.setId(rs.getInt("id"));
                r.setId_r(rs.getInt("id_r"));
                r.setDesc_r(rs.getString("desc_r"));
                r.setStatu_r(rs.getString("statu_r"));
                r.setDate_r(rs.getDate("date_r"));
               // r.setHeur_r(rs.getTimestamp("heur_r"));
                Reclamation.add(r);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return Reclamation;
    }
        
        
        
     
    
    
    
    public void pdf(Reclamation r) throws FileNotFoundException, DocumentException {
        try {
        String file_name="C:\\Users\\ihebz\\OneDrive\\Bureau\\pdf\\iheb.pdf";
        Document doc =new Document();
        PdfWriter.getInstance(doc, new FileOutputStream(file_name));
        doc.open();
        PreparedStatement ps=null;
        ResultSet rs=null;
         String querry="SELECT * FROM reclamation";

            ps=cnx.prepareStatement(querry);
            rs=ps.executeQuery();
            while(rs.next()) {
                Paragraph para=new Paragraph(rs.getInt("id_r")+" "+rs.getString("desc_r")+" "+rs.getString("statu_r"));
                doc.add(para);
                doc.add(new Paragraph(" "));

            }
            doc.close();


        }catch(Exception k){
            System.err.println(k);

        }

    }

    @Override
    public List<Reclamation> triedesc() {
       List<Reclamation> Reclamation = new ArrayList<>();
        String sql ="SELECT * FROM reclamation ORDER BY date_r ASC";
        try {
            Statement ste= cnx.createStatement();
            ResultSet rs =ste.executeQuery(sql);
            while(rs.next()){
                Reclamation e = new Reclamation();
               // p.setId(rs.getInt("id"));
                e.setId_r(rs.getInt("id_r"));
                e.setDesc_r(rs.getString("desc_r"));
                e.setStatu_r(rs.getString("statu_r"));
                e.setDate_r(rs.getDate("date_r"));
                Reclamation.add(e);
            }
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return Reclamation;
        
    }
    
    
}
