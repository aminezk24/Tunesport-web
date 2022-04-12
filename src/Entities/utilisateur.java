/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Entities;

import java.sql.Date;


public class utilisateur {
    private int id,tel;
    public String nom;
    public String prenom;
    public String email;
    private String mdp,role;
    private Date date;
    //private List<Reclamation> list;

    public utilisateur() {
    }

  public utilisateur(Date date){
        this.date = date;
                }
  public utilisateur(String nom){
        this.nom = nom;
                }

    public utilisateur(int tel, String nom, String prenom, String email, String mdp, String role, Date date) {
       // this.id = id;
        this.tel = tel;
        this.nom = nom;
        this.prenom = prenom;
        this.email = email;
        this.mdp = mdp;
        this.role = role;
        this.date = date;
    }
    

    public utilisateur(int id, int tel, String nom, String prenom, String email, String mdp, String role, Date date) {
        this.id = id;
        this.tel = tel;
        this.nom = nom;
        this.prenom = prenom;
        this.email = email;
        this.mdp = mdp;
        this.role = role;
        this.date = date;
    }

    public utilisateur(int id) {
        this.id = id;
    }
    
    
    
    
    
    public utilisateur( String nom, String prenom) {
        
        this.nom = nom;
        this.prenom = prenom;
    }


    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public int getTel() {
        return tel;
    }

    public String getEmail() {
        return email;
    }

    public String getMdp() {
        return mdp;
    }

    public String getRole() {
        return role;
    }

    public Date getDate() {
        return date;
    }

    public void setTel(int tel) {
        this.tel = tel;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setMdp(String mdp) {
        this.mdp = mdp;
    }

    public void setRole(String role) {
        this.role = role;
    }

    public void setDate(Date date) {
        this.date = date;
    }
    
    

    @Override
    public String toString() {
        return "utilisateur{" + " nom=" + nom + ", prenom=" + prenom + ",email=" + email + ",mdp=" + mdp + ",tel=" + tel + ",date=" + date + ",role=" + role + '}';
    }
    
    
   
    
}
