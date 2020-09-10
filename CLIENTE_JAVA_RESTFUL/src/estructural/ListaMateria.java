/*
    CODIGO PROPIEDAD DE 
            FELIPE LONDOÑO: (https://github.com/Felosque)
            ALEJANDRO LUNA: (https://github.com/AlejoFront)
    
    Agradecimientos a la comunidad de INTERNET por todos sus ejemplos y hacer mucho más facil el apredizaje.
 */
package estructural;

import java.util.ArrayList;

/**
 * Esta clase funciona para poder convertir una lista JSON a un ArrayList de la clase Materia gracias
 * a la libreria de Gson creada por GOOGLE.
 */
public class ListaMateria {
    
    private ArrayList<Materia> Materia;  //Lamentablemente, este atributo tiene que tener su inicial en MAYUSCULA o GSON no lo reconoce (Problemas de compatibilidad con el servidor de aplicaciones)

    public ListaMateria() {
        this.Materia = new ArrayList<>();
    }
    
    public ArrayList<Materia> getMateria() {
        if(Materia == null) return new ArrayList<>();
        else return Materia;
    }

    public void setMateria(ArrayList<Materia> pMateria) {
        this.Materia = pMateria;
    }
    
}
