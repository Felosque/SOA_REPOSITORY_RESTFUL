
package constantes;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

/*
    CODIGO PROPIEDAD DE 
            FELIPE LONDOÑO: (https://github.com/Felosque)
            ALEJANDRO LUNA: (https://github.com/AlejoFront)
 */
public class RequestJson {

    //Metodos HTTP 
    public static final String POST = "POST";
    public static final String GET = "GET";
    public static final String PUT = "PUT";
    public static final String DELETE = "DELETE";
    
    
    /**
     * Envia un paquete JSON a una URL por medio de un METODO HTTP
     * @param jsonObj Objeto json el cual será enviado. Si es nulo, no se envía nada.
     * @param pUrl Url a la que se dirige la petición
     * @param pMethod Metodo por el cual se envia la petición (GET, POST, PUT, DELETE)
     * @return retorna la respuesta HTTP del servidor
     */
    public static int sendRequest(String jsonObj, String pUrl, String pMethod){
            
        try {
            
            //Configuraciones iniciales para enviar tipo de dato JSON
            URL url = new URL(pUrl);
            HttpURLConnection conn = (HttpURLConnection)url.openConnection();
            conn.setRequestMethod(pMethod);
            conn.setRequestProperty("Content-Type", "application/json; charset=UTF-8");
            conn.setRequestProperty("Accept", "application/json");
            conn.setDoOutput(true);
            
            //Escritura del json sobre el protocolo HTTP si este es diferente a nulo
            OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());
            if(jsonObj != null){
                wr.write(jsonObj);
            }
            wr.flush();
            
            //Lectura de la respuesta del servidor, 
            StringBuilder sb = new StringBuilder();  
            int httpResult = conn.getResponseCode(); 
            if (httpResult == HttpURLConnection.HTTP_OK) {
                BufferedReader br = new BufferedReader(new InputStreamReader(conn.getInputStream(), "utf-8"));
                String line = null;  
                while ((line = br.readLine()) != null) {  
                    sb.append(line + "\n");  
                }
                br.close();
            }else{
                System.out.println(conn.getResponseMessage());  
            } 
            conn.disconnect();
            return httpResult;
           
        } catch (MalformedURLException ex) {
            ex.printStackTrace();
        }catch (IOException ex) {
               ex.printStackTrace();
        }catch (Exception ex){
            ex.printStackTrace();
        }
        return -1;
    } 
    
    /**
     * Metodo para obtener JSON de una URL
     * @param pUrl URL a la cual va dirigida la petición json
     * @param pMethod Metodo por el cual se hará la petición al servidor (GET, POST, PUT, DELETE)
     * @return retorna un String con lo que responda el servidor. Retorna null si no se pudo procesar la respuesta
     */
    public static String getRequest(String pUrl, String pMethod){
        
        try{
            
            //Configuraciones iniciales para recibir tipo de dato JSON
            URL url = new URL(pUrl);
            HttpURLConnection conn = (HttpURLConnection)url.openConnection();
            conn.setRequestMethod(pMethod);
            conn.setRequestProperty("Content-Type", "application/json; charset=UTF-8");
            conn.setRequestProperty("Accept", "application/json");
            conn.setDoOutput(true);
            
            //Lectura de respuesta del servidor.
            StringBuilder sb = new StringBuilder();  
            int HttpResult = conn.getResponseCode(); 
            if (HttpResult == HttpURLConnection.HTTP_OK) {
                BufferedReader br = new BufferedReader(new InputStreamReader(conn.getInputStream(), "utf-8"));
                String line = null;  
                while ((line = br.readLine()) != null) {  
                    sb.append(line + "\n");  
                }
                br.close();
                return sb.toString();
            } else {
                System.out.println(conn.getResponseMessage());  
            }  
            
        } catch (MalformedURLException ex) {
            ex.printStackTrace();
        }catch (IOException ex) {
               ex.printStackTrace();
        }catch (Exception ex){
            ex.printStackTrace();
        }
        
        return null;
    }
    
    
}
