/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import com.google.gson.Gson;
import constantes.RequestJson;
import constantes.UtilitiesFunctions;
import estructural.Estudiante;
import estructural.ListaMatricula;
import estructural.Materia;
import estructural.Matricula;
import java.time.Clock;
import java.util.ArrayList;
import java.util.Date;
/**
 *
 * @author Estudiantes
 */
public class PruebasJson {
    
    
    public static void main(String[] args){
        
        /* RECIBIENDO PETICIÓN JSON
        String peti = RequestJson.recibirPeticion("http://localhost:7101/ProyectoServiciosWeb/resources/serviciosWebMatricula/darMatriculaCodigo?codigo=33", "GET");
        Gson gson = new Gson();
        Matricula matri = gson.fromJson(peti, Matricula.class);
        System.out.println("" + matri.toString());*/
        
        //Materia materias = ServicioLocalMateria.darMateriaPorCodigo(""+1);
        //System.out.println("" + materias.toString());
        ///System.out.println("" + ServicioLocalMateria.darMaterias());
        
        
        
        /*
        Estudiante estu = new Estudiante();
        try{
            estu.setApellidos("Magno");
            estu.setNombres("Felo");
            estu.setCorreo("Fabelo@adsd.com");
            estu.setDireccion("Mi CAllesita 31231");
            estu.setDocumentoIdentificacion("222");
            estu.setEps("Salud y vino");
            estu.setGenero(1);
            estu.setTelefono("111231");
            estu.setFechaNacimiento("1998-09-30T05:00:00-05:00");
        }catch(Exception ex){}
        
        //System.out.println("" + ServicioLocalEstudiante.darEstudiantesPorNombre("AS"));
        Estudiante estud = ServicioLocalEstudiante.buscarEstudiante(""+111);
        System.out.println(""+estud.toString());*/
        
        //System.out.println("" + ServicioLocalMatricula.darMatriculaCodigo(""+45).toString());
        
        ArrayList<Estudiante> estud = ServicioLocalEstudiante.darEstudiantesPorNombre("LU");
        for (int i = 0; i < estud.size(); i++) {
            System.out.println(""+ estud.get(i).toString());
        }
        //RECIBIR ARRAYLIST 
        /*
        ArrayList<Matricula> mat = ServicioLocalMatricula.darMatriculasPorEstado(""+2);
        if(!mat.isEmpty()){
            System.out.println(""+ mat.size());
            for (int i = 0; i < mat.size(); i++) {
                System.out.println(""+mat.get(i).toString());
            }
        }else{System.out.println("No hay datos");}*/
        
        /*CONVIRTIENDO OBJETO EN JSON
        Matricula er = new Matricula();
        er.setCodigo(42);
        er.setEstado(3);
        er.setFechaFinal("2021-09-30T05:00:00-05:00");
        er.setFechaInicio("2021-09-30T05:00:00-05:00");
        er.setFechaInscripcion("2021-09-30T05:00:00-05:00");
        er.setNotaDefinitiva(4.0);
        er.setPkEstudiante("333");
        er.setPkMateria(3);
        
        ServicioLocalMatricula.matricularEstudiante(er);*/
        
        //System.out.println(""+ er.toJSON());
        
        
        
        
        /* ENVIADO PETICIÓN JSON
        int estado = RequestJson.sendRequest(er.toJSON(), URLMatricula.matricularEstudiante);
        if(estado == 204){
            System.out.println("Se ha realizado correctamente");
        }else{
            System.out.println("Fallo todo ");
        }*/
        
//JSONParser parser = new JSONParser(peti, null, true)
        
        /*try {
            JSONObject obj = new JSONObject();
            obj.put("codigo", "" + new Integer(1));
            obj.put("estado", "" + new Integer(1));
            obj.put("fechaFinal", "2020-09-29T00:00:00-05:00");
            obj.put("fechaInicio", "2020-09-06T00:00:00-05:00");
            obj.put("fechaInscripcion", "2020-09-05T00:00:00-05:00");
            obj.put("notaDefinitiva", ""+new Double(4.0));
            obj.put("pkEstudiante", ""+new Integer(222));
            obj.put("pkMateria", ""+new Integer(3));
            System.out.print(obj);
            
            

            URL url = new URL("http://192.168.16.12:7101/ProyectoServiciosWeb/resources/serviciosWebMatricula/matricularEstudiante");
            
            byte[] postDataBytes = obj.toJSONString().getBytes("utf-8");
            HttpURLConnection conn = (HttpURLConnection)url.openConnection();
            System.out.println("CONEXÓN REALIZADA");
            conn.setRequestMethod("POST");
            conn.setRequestProperty("Content-Type", "application/json; utf-8");
            conn.setDoOutput(true);
            
            
            conn.getOutputStream().write(postDataBytes);
            conn.getOutputStream().flush();
            
            System.out.println("JSON ENVIADO");
            

        } catch (MalformedURLException ex) {
            ex.printStackTrace();
        }catch (IOException ex) {
               ex.printStackTrace();
        }catch (Exception ex){
            ex.printStackTrace();
        }
        
    }*/
    }
}
