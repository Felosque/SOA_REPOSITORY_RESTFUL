package estructural;

import javax.xml.bind.annotation.XmlRootElement;


@XmlRootElement(name="ResponseDouble")
public class ResponseDouble {
    public ResponseDouble() {
        super();
    }
    
    private double respuesta;

    public ResponseDouble(double respuesta) {
        super();
        this.respuesta = respuesta;
    }

    public void setRespuesta(double respuesta) {
        this.respuesta = respuesta;
    }

    public double getRespuesta() {
        return respuesta;
    }

}
