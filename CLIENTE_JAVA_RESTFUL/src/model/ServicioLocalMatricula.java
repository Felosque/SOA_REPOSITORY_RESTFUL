/*
    CODIGO PROPIEDAD DE 
            FELIPE LONDOÑO: (https://github.com/Felosque)
            ALEJANDRO LUNA: (https://github.com/AlejoFront)
    
    Agradecimientos a la comunidad de INTERNET por todos sus ejemplos y hacer mucho más facil el apredizaje.
 */
package model;

import com.google.gson.Gson;
import com.google.gson.JsonObject;
import com.google.gson.JsonSyntaxException;
import com.google.gson.reflect.TypeToken;
import constantes.RequestJson;
import estructural.ListaMatricula;
import estructural.Matricula;
import java.util.ArrayList;
/**
 *
 * @author felip
 */
public class ServicioLocalMatricula {
   
    private static final String defaultURL = "http://192.168.16.12:7101/ProyectoServiciosWeb/resources/serviciosWebMatricula/";
    
    public static final String matricularEstudiante = defaultURL + "matricularEstudiante";
    public static final String darMatriculas = defaultURL + "darMatriculas";
    public static final String darMatriculasEstudiante = defaultURL + "darMatriculasEstudiante";
    public static final String darMatriculasPorEstado = defaultURL + "darMatriculasPorEstado";
    public static final String darMatriculasPorFecha = defaultURL + "darMatriculasPorFecha";
    public static final String darCantidadMateriasPorGradoCursado = defaultURL + "darCantidadMateriasPorGradoCursado";
    public static final String actualizarMatricula = defaultURL + "actualizarMatricula";
    public static final String darPazYSalvoEstudiante = defaultURL + "darPazYSalvoEstudiante";
    public static final String borrarMatriculaCodigo = defaultURL + "borrarMatriculaCodigo";
    public static final String darMatriculaCodigo = defaultURL + "darMatriculaCodigo";
    public static final String darPromedioEstudiante = defaultURL + "darPromedioEstudiante";
    public static final String darMatriculasEstudianteGrado  = defaultURL + "darMatriculasEstudianteGrado";
    public static final String cantidadMatriculasRegistradas = defaultURL + "cantidadMatriculasRegistradas";
    
    
    private ServicioLocalMatricula() {
        
    }
    
    public static int matricularEstudiante(Matricula pMatricula){
        return RequestJson.sendRequest(pMatricula.toJSON(), matricularEstudiante, RequestJson.POST);
    }
    
    public static int actualizarMatricula(Matricula pMatricula){
            return RequestJson.sendRequest(pMatricula.toJSON(), actualizarMatricula, RequestJson.PUT);
    }
    
    public static int borrarMatriculaCodigo(String pCodigo){
        String peticion = borrarMatriculaCodigo + "?codigo=" + pCodigo;
        return RequestJson.sendRequest(null, peticion, RequestJson.DELETE);
    }
    
    public static ArrayList<Matricula> darMatriculasEstudiante(String pDocumento){
        String peticion = darMatriculasEstudiante + "?documento=" + pDocumento;
        String matriculasJSON = RequestJson.getRequest(peticion, RequestJson.GET);
        Gson gson = new Gson();
        ListaMatricula matriculas = new ListaMatricula();
        try{
            matriculas = gson.fromJson(matriculasJSON, ListaMatricula.class);
            return matriculas.getMatricula();
        }catch(JsonSyntaxException ex){
            ArrayList<Matricula> matricula = new ArrayList<>();
            StringBuilder matriculaJSON = new StringBuilder(matriculasJSON);
            String miMatri = matriculaJSON.substring(13, matriculaJSON.length() - 2);
            Matricula matri = gson.fromJson(miMatri, Matricula.class);
            matricula.add(matri);
            return matricula;
        }
    }
    
    public static ArrayList<Matricula> darMatriculasPorEstado(String pEstado){
        String peticion = darMatriculasPorEstado + "?estado=" + pEstado;
        String matriculasJSON = RequestJson.getRequest(peticion, RequestJson.GET);
        Gson gson = new Gson();
        ListaMatricula matriculas = new ListaMatricula();
        try{
            matriculas = gson.fromJson(matriculasJSON, ListaMatricula.class);
            return matriculas.getMatricula();
        }catch(JsonSyntaxException ex){
            ArrayList<Matricula> matricula = new ArrayList<>();
            StringBuilder matriculaJSON = new StringBuilder(matriculasJSON);
            String miMatri = matriculaJSON.substring(13, matriculaJSON.length() - 2);
            Matricula matri = gson.fromJson(miMatri, Matricula.class);
            matricula.add(matri);
            return matricula;
        }
    }
    
    public static ArrayList<Matricula> darMatriculasEstudianteGrado(String pDocumento, String pGrado){
        String peticion = darMatriculasEstudianteGrado + "?documento=" + pDocumento + "&grado=" + pGrado;
        String matriculasJSON = RequestJson.getRequest(peticion, RequestJson.GET);
        Gson gson = new Gson();
        ListaMatricula matriculas = new ListaMatricula();
        try{
            matriculas = gson.fromJson(matriculasJSON, ListaMatricula.class);
            return matriculas.getMatricula();
        }catch(JsonSyntaxException ex){
            ArrayList<Matricula> matricula = new ArrayList<>();
            StringBuilder matriculaJSON = new StringBuilder(matriculasJSON);
            String miMatri = matriculaJSON.substring(13, matriculaJSON.length() - 2);
            Matricula matri = gson.fromJson(miMatri, Matricula.class);
            matricula.add(matri);
            return matricula;
        }
    }
    
    public static Matricula darMatriculaCodigo(String pCodigo){
        String peticion = darMatriculaCodigo + "?codigo=" + pCodigo;
        String matriculaJSON = RequestJson.getRequest(peticion, RequestJson.GET);
        Gson gson = new Gson();
        Matricula matri = gson.fromJson(matriculaJSON, Matricula.class);
        return matri;
    }
    
    public static double darPromedioEstudiante(String pDocumento){
        String peticion = darPromedioEstudiante + "?documento=" + pDocumento;
        String cantidadJSON = RequestJson.getRequest(peticion, RequestJson.GET);
        JsonObject jobj = new Gson().fromJson(cantidadJSON, JsonObject.class);
        String cantidad = jobj.get("respuesta").getAsString();
        return Double.parseDouble(cantidad);
    }
    
    public static ArrayList<Matricula> darMatriculas(){
        String peticion = darMatriculas;
        String matriculasJSON = RequestJson.getRequest(peticion, RequestJson.GET);
        Gson gson = new Gson();
        ListaMatricula matriculas = new ListaMatricula();
        try{
            matriculas = gson.fromJson(matriculasJSON, ListaMatricula.class);
            return matriculas.getMatricula();
        }catch(JsonSyntaxException ex){
            ArrayList<Matricula> matricula = new ArrayList<>();
            StringBuilder matriculaJSON = new StringBuilder(matriculasJSON);
            String miMatri = matriculaJSON.substring(13, matriculaJSON.length() - 2);
            Matricula matri = gson.fromJson(miMatri, Matricula.class);
            matricula.add(matri);
            return matricula;
        }
    }
    
    
    public static ArrayList<Integer> darCantidadMateriasPorGradoCursado(){
        String peticion = darCantidadMateriasPorGradoCursado;
        String matriculasJSON = RequestJson.getRequest(peticion, RequestJson.GET);
        Gson gson = new Gson();
        ArrayList<Integer> materiasPorGrado = gson.fromJson(matriculasJSON, new TypeToken<ArrayList<Integer>>(){}.getType());
        return materiasPorGrado;
    }

    public static int cantidadMatriculasRegistradas(){
        String peticion = cantidadMatriculasRegistradas;
        String cantidadJSON = RequestJson.getRequest(peticion, RequestJson.GET);
        JsonObject jobj = new Gson().fromJson(cantidadJSON, JsonObject.class);
        String cantidad = jobj.get("respuesta").getAsString();
        return Integer.parseInt(cantidad);
    }
    
}
