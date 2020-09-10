package serviciosWeb;

import conexion.Conexion;

import estructural.Materia;

import estructural.ResponseInteger;

import java.sql.ResultSet;
import java.sql.SQLException;

import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.QueryParam;

import servicios.ServicioMateria;
import servicios.ServicioMatricula;

@Path("serviciosWebMateria")
public class ServicioMateriaSW {
   
    public ServicioMateriaSW() {
        super();
    }

    @GET
    @Produces("application/json")
    @Path("darMateriaPorCodigo")
    public Materia darMateriaPorCodigo(@QueryParam("codigo") int pCodigo) throws Exception {
        return ServicioMateria.darMateriaPorCodigo(pCodigo);
    }

    @GET
    @Produces("application/json")
    @Path("darMateriasPorGrado")
    public ArrayList<Materia> darMateriasPorGrado(@QueryParam("grado") int pGrado) throws Exception {
        return ServicioMateria.darMateriasPorGrado(pGrado);
    }

    @GET
    @Produces("application/json")
    @Path("darMaterias")
    public ArrayList<Materia> darMaterias() throws Exception {
        return ServicioMateria.darMaterias();
    }

    @GET
    @Produces("application/json")
    @Path("cantidadMateriasRegistradas")
    public ResponseInteger cantidadMateriasRegistradas() throws Exception{
        ResponseInteger respuesta = new ResponseInteger(ServicioMateria.cantidadMateriasRegistradas());
        return respuesta;
    }
}
