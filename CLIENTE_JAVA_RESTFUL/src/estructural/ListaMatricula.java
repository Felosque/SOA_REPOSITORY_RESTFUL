/*
    CODIGO PROPIEDAD DE 
            FELIPE LONDOÑO: (https://github.com/Felosque)
            ALEJANDRO LUNA: (https://github.com/AlejoFront)
    
    Agradecimientos a la comunidad de INTERNET por todos sus ejemplos y hacer mucho más facil el apredizaje.
 */
package estructural;

import java.util.ArrayList;

/**
 * Esta clase funciona para poder convertir una lista JSON a un ArrayList de la clase Matricula gracias
 * a la libreria de Gson creada por GOOGLE.
 */
public class ListaMatricula {

    private ArrayList<Matricula> Matricula;  //Lamentablemente, este atributo tiene que tener su inicial en MAYUSCULA o GSON no lo reconoce (Problemas de compatibilidad con el servidor de aplicaciones)

    public ListaMatricula() {
        this.Matricula = new ArrayList<>();
    }
    
    public ArrayList<Matricula> getMatricula() {
        if(Matricula == null) return new ArrayList<>();
        else return Matricula;
    }

    public void setMatricula(ArrayList<Matricula> Matricula) {
        this.Matricula = Matricula;
    }
    
}
