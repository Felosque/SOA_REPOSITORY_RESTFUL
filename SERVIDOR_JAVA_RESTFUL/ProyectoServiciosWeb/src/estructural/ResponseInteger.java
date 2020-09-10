package estructural;

import javax.xml.bind.annotation.XmlRootElement;


@XmlRootElement(name="RespuestaInteger")
public class ResponseInteger {
    public ResponseInteger() {
        super();
    }
    
    private int respuesta;

    public ResponseInteger(int respuesta) {
        super();
        this.respuesta = respuesta;
    }

    public void setRespuesta(int respuesta) {
        this.respuesta = respuesta;
    }

    public int getRespuesta() {
        return respuesta;
    }
}
