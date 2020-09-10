package serviciosWeb;

import estructural.Matricula;
import estructural.ResponseDouble;
import estructural.ResponseInteger;

import java.util.ArrayList;
import java.util.Date;

import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.QueryParam;

import servicios.ServicioMatricula;

@Path("serviciosWebMatricula")
public class ServicioMatriculaSW {
    public ServicioMatriculaSW() {
        super();
    }

    @POST
    @Consumes("application/json")
    @Path("matricularEstudiante")
    public void matricularEstudiante(Matricula pMatricula) throws Exception {
        ServicioMatricula.matricularEstudiante(pMatricula);
    }

    @GET
    @Produces("application/json")
    @Path("darMatriculasEstudiante")
    public ArrayList<Matricula> darMatriculasEstudiante(@QueryParam("documento") String pDocumento) throws Exception {
        return ServicioMatricula.darMatriculasEstudiante(pDocumento);
    }
    
    @GET
    @Produces("application/json")
    @Path("darMatriculasPorEstado")
    public ArrayList<Matricula> darMatriculasPorEstado(@QueryParam("estado") String pEstado) throws Exception {
        return ServicioMatricula.darMatriculasPorEstado(pEstado);
    }

    @GET
    @Produces("application/json")
    @Path("darMatriculas")
    public ArrayList<Matricula> darMatriculas() throws Exception {
        return ServicioMatricula.darMatriculas();
    }

    @GET
    @Produces("application/json")
    @Path("darMatriculasPorFecha")
    public ArrayList<Matricula> darMatriculasPorFecha(@QueryParam("fecha") Date pFecha) throws Exception {
        return ServicioMatricula.darMatriculasPorFecha(pFecha);
    }

    @GET
    @Produces("application/json")
    @Path("darCantidadMateriasPorGradoCursado")
    public ArrayList<ResponseInteger> darCantidadMateriasPorGradoCursando() throws Exception {
        ArrayList<ResponseInteger> arr = ServicioMatricula.darCantidadMateriasPorGradoCursando();
        return arr;
    }

    @PUT
    @Consumes("application/json")
    @Path("actualizarMatricula")
    public void actualizarMatricula(Matricula pMatricula) throws Exception {
        ServicioMatricula.actualizarMatricula(pMatricula);
    }

    @GET
    @Produces("application/json")
    @Path("darPazYSalvoEstudiante")
    public boolean darPazYSalvoEstudiante(@QueryParam("grado") int pGrado,
                                          @QueryParam("matricula") String pMatricula) throws Exception {
        return ServicioMatricula.darPazYSalvoEstudiante(pGrado, pMatricula);
    }

    @DELETE
    @Path("borrarMatriculaCodigo")
    public void borrarMatriculaCodigo(@QueryParam("codigo") int pCodigo) throws Exception {
        ServicioMatricula.borrarMatriculaCodigo(pCodigo);
    }

    @GET
    @Produces("application/json")
    @Path("darMatriculaCodigo")
    public Matricula darMatriculaCodigo(@QueryParam("codigo") int pCodigo) throws Exception {
        return ServicioMatricula.darMatriculaCodigo(pCodigo);
    }

    @GET
    @Produces("application/json")
    @Path("darPromedioEstudiante")
    public ResponseDouble darPromedioEstudiante(@QueryParam("documento") String pDocumento) throws Exception {
        ResponseDouble dou = new ResponseDouble(ServicioMatricula.darPromedioEstudiante(pDocumento));
        return dou;
    }

    @GET
    @Produces("application/json")
    @Path("darMatriculasEstudianteGrado")
    public ArrayList<Matricula> darMatriculasEstudianteGrado(@QueryParam("documento") String pDocumento,
                                                             @QueryParam("grado") int Grado) throws Exception {
        return ServicioMatricula.darMatriculasEstudianteGrado(pDocumento, Grado);
    }

    @GET
    @Produces("application/json")
    @Path("cantidadMatriculasRegistradas")
    public ResponseInteger cantidadMatriculasRegistradas(){
        ResponseInteger inte = new ResponseInteger(ServicioMatricula.cantidadMatriculasRegistradas());
        return inte;
    }
    

    
}
