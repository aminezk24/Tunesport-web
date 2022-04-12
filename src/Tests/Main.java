/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Tests;

import Services.Reclamationservice;
import Services.Utilisateurservice;
import Entities.Reclamation;
import Entities.utilisateur;
import static java.sql.DriverManager.println;
import java.time.LocalDateTime;
import static jdk.nashorn.internal.runtime.Debug.id;
import Tools.MaConnexion;
import java.util.Date;
import java.sql.Timestamp;

/**
 *
 * @author Fayechi
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws Exception {
        MaConnexion mc = MaConnexion.getInstance();
        java.sql.Date d=java.sql.Date.valueOf("2021-11-12");
        java.sql.Timestamp ts=java.sql.Timestamp.valueOf("2021-11-12 10:22:21");
        
          //Personne p = new Personne("Ben Ahmed", "Ali");
          //utilisateur p = new utilisateur(88,2587469,"iheb","rrrrrr","rrrrrrr","rrrrrr","rrrrrrr",d);
          utilisateur p3 = new utilisateur(846621,"qaqa","zeze","koliol@gmail.com","www","cxcx",d);
          //utilisateur p3 = new utilisateur(9);
          Utilisateurservice ps=new Utilisateurservice();
          ps.ajouter(p3);
          //Utilisateurservice.sendMail("ihebzouaoui888@gmail.com");
          //Utilisateurservice.sendMail("ihebzouaoui888@gmail.c
          //ps.modifier(p3);
          //ps.supprimer(2);
          //ps.rechercher(p3);
          //ps.afficher();
          //ps.trie();
          //ps.pdf(p3);
          
          
          
          Reclamation r = new Reclamation(9,"rrr","rrrrr",d);
         // Reclamation r2 = new Reclamation(7,"WW","WW","WWWW","WWWWWW");
          Reclamationservice ks=new Reclamationservice();
          
          //ks.ajouter(r);
          //ks.supprimer(7);
          //ks.modifier(r);
          //ks.rechercher(r);
          //ks.afficher();
          //ks.trie();
          //ks.pdf(r);
          
    }
    
}
