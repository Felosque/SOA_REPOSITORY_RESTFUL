    package serviciosWeb;

import estructural.Estudiante;
import estructural.ResponseInteger;

import java.util.ArrayList;

import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.QueryParam;

import javax.ws.rs.core.MediaType;

import javax.ws.rs.core.Response;

import servicios.ServicioEstudiante;


@Path("servicioWebEstudiante")
public class ServicioEstudianteSW {
    
    public ServicioEstudianteSW() {
        super();
    }

    @POST
    @Consumes("application/json")
    @Path("insertarEstudiante")
    public void insertarEstudiante(Estudiante pEstudiante) throws Exception {
        ServicioEstudiante.insertarEstudiante(pEstudiante);
    }

    @GET
    @Path("eliminarEstudiante")
    public void eliminarEstudiante(@QueryParam("documento") String pDocumento) throws Exception{
        ServicioEstudiante.eliminarEstudiante(pDocumento);
    }

    @PUT
    @Consumes("application/json")
    @Path("actualizarEstudiante")
    public void actualizarEstudiante(Estudiante pEstudiante) throws Exception{
        ServicioEstudiante.actualizarEstudiante(pEstudiante);
    }

    @GET
    @Produces("application/json")
    @Path("buscarEstudiante")
    public Estudiante buscarEstudiante(@QueryParam("documento") String pDocumento) throws Exception {
        return ServicioEstudiante.buscarEstudiante(pDocumento);
    }

    @GET
    @Produces("application/json")
    @Path("darEstudiantes")
    public ArrayList<Estudiante> darEstudiantes() throws Exception {
        return ServicioEstudiante.darEstudiantes();
    }
    
    //En la posición 0 devuelve la cantidad de hombres, en la 1 la cantidad de mujeres
    @GET
    @Produces("application/json")
    @Path("cantidadEstudiantesPorGenero")
    public ArrayList<ResponseInteger> cantidadEstudiantesPorGenero() throws Exception {
        ArrayList<ResponseInteger> response = ServicioEstudiante.cantidadEstudiantesPorGenero();
        return response;
    }

    @GET
    @Produces("application/json")
    @Path("darEstudiantesPorNombre")
    public ArrayList<Estudiante> darEstudiantesPorNombre(@QueryParam("nombre") String pNombre) throws Exception {
        return ServicioEstudiante.darEstudiantesPorNombre(pNombre);
    }

    @GET
    @Produces("application/json")
    @Path("darGradoEstudiante")
    public ResponseInteger darGradoEstudiante(@QueryParam("documento") String pDocumento) throws Exception {
        ResponseInteger response = new ResponseInteger(ServicioEstudiante.darGradoEstudiante(pDocumento));
        return response;
    }

    @GET
    @Produces("application/json")
    @Path("cantidadEstudiantesRegistrados")
    public ResponseInteger cantidadEstudiantesRegistrados(){
        ResponseInteger response = new ResponseInteger(ServicioEstudiante.cantidadEstudiantesRegistrados()); 
        return response;   
    }
    
}
