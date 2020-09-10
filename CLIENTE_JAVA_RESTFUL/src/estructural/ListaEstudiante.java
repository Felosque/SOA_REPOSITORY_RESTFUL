/*
    CODIGO PROPIEDAD DE 
            FELIPE LONDOÑO: (https://github.com/Felosque)
            ALEJANDRO LUNA: (https://github.com/AlejoFront)
    
    Agradecimientos a la comunidad de INTERNET por todos sus ejemplos y hacer mucho más facil el apredizaje.
 */
package estructural;

import java.util.ArrayList;

/**
 * Esta clase funciona para poder convertir una lista JSON a un ArrayList de la clase Estudiante gracias
 * a la libreria de Gson creada por GOOGLE.
 */
public class ListaEstudiante {
    
    private ArrayList<Estudiante> Estudiante; //Lamentablemente, este atributo tiene que tener su inicial en MAYUSCULA o GSON no lo reconoce (Problemas de compatibilidad con el servidor de aplicaciones)

    public ListaEstudiante() {
        this.Estudiante = new ArrayList<>();
    }
    
    public ArrayList<Estudiante> getEstudiantes() {
        if(Estudiante == null) return new ArrayList<>();
        else return Estudiante;
    }

    public void setEstudiantes(ArrayList<Estudiante> pEstudiante) {
        this.Estudiante = pEstudiante;
    }
    
}
