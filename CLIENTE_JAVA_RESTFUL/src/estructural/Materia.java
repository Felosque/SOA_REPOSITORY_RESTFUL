/*
    CODIGO PROPIEDAD DE 
            FELIPE LONDOÑO: (https://github.com/Felosque)
            ALEJANDRO LUNA: (https://github.com/AlejoFront)
    
    Agradecimientos a la comunidad de INTERNET por todos sus ejemplos y hacer mucho más facil el apredizaje.
 */
package estructural;
import com.google.gson.Gson;

public class Materia{
    
    private int codigo;
    
    private String nombre;
    
    private int grado;
    
    private double intensidadHoraria;

    public Materia(int codigo, String nombre, int grado, double intensidadHoraria) {
        this.codigo = codigo;
        this.nombre = nombre;
        this.grado = grado;
        this.intensidadHoraria = intensidadHoraria;
    }

    public Materia() {
    }

    public int getCodigo() {
        return codigo;
    }

    public void setCodigo(int codigo) {
        this.codigo = codigo;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public int getGrado() {
        return grado;
    }

    public void setGrado(int grado) {
        this.grado = grado;
    }

    public double getIntensidadHoraria() {
        return intensidadHoraria;
    }

    public void setIntensidadHoraria(double intensidadHoraria) {
        this.intensidadHoraria = intensidadHoraria;
    }

    public String toJSON(){
        Gson gson = new Gson();
        String materia = gson.toJson(this);
        return materia;
    }
    
    
    @Override
    public String toString() {
        return "Materia{" + "codigo=" + codigo + ", nombre=" + nombre + ", grado=" + grado + ", intensidadHoraria=" + intensidadHoraria + '}';
    }
    
    

}
