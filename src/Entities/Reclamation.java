/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Entities;

import java.sql.Date;
import java.sql.Timestamp;

/**
 *
 * @author ihebz
 */
public class Reclamation {
    private int id_r;
    private String desc_r,statu_r;
    private Date date_r;
    private Timestamp heur_r; 
    //private utilisateur user;

    public Reclamation(int id_r) {
        this.id_r = id_r;
    }
    public Reclamation(Date date_r){
        this.date_r = date_r;
    }

public Reclamation(){
}

public Reclamation(int id_r,String desc_r,String statu_r,Date date_r){
    this.id_r = id_r;
    this.desc_r = desc_r;
    this.statu_r = statu_r;
    this.heur_r = heur_r;
    this.date_r = date_r;
}

    public int getId_r() {
        return id_r;
    }
     
    public String getDesc_r() {
        return desc_r;
    }

    public String getStatu_r() {
        return statu_r;
    }

    public Timestamp getHeur_r() {
        return heur_r;
    }

    public Date getDate_r() {
        return date_r;
    }

    public void setId_r(int id_r) {
        this.id_r = id_r;
    }

    public void setDesc_r(String desc_r) {
        this.desc_r = desc_r;
    }

    public void setStatu_r(String statu_r) {
        this.statu_r = statu_r;
    }

    //public void setHeur_r(Timestamp heur_r) {
   //     this.heur_r = heur_r;
   // }

    public void setDate_r(Date date_r) {
        this.date_r = date_r;
    }

    @Override
    public String toString() {
        return "Reclamation{" + "id_r=" + id_r + ", desc_r=" + desc_r + ", statu_r=" + statu_r + ", heur_r=" + heur_r + ", date_r=" + date_r + '}';
    }

    












}
