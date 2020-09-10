/*
    CODIGO PROPIEDAD DE 
            FELIPE LONDOÑO: (https://github.com/Felosque)
            ALEJANDRO LUNA: (https://github.com/AlejoFront)
    
    Agradecimientos a la comunidad de INTERNET por todos sus ejemplos y hacer mucho más facil el apredizaje.
 */
package gui;

import estructural.Estudiante;
import java.awt.BorderLayout;
import java.awt.Dimension;
import java.util.ArrayList;
import javax.swing.JFrame;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.rmi.RemoteException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.*;
import model.ServicioLocalEstudiante;
import model.ServicioLocalMatricula;


/**
 *
 * @author felip
 */
public class GUIPrincipal extends JFrame implements ActionListener{
    
    
    private GUIPanelInicio panelInicio;
    
    public GUIPrincipal() {
       
        inicializarMenuBar();
        
        panelInicio = new GUIPanelInicio();
        add(panelInicio, BorderLayout.CENTER);
        setSize(new Dimension(500, 401));
    }
    
    public ArrayList<Estudiante> getEstudiantes()
    {
        return ServicioLocalEstudiante.darEstudiantes();
    }
    
    public Estudiante buscarEstudiante(String identificacion)
    {
        return ServicioLocalEstudiante.buscarEstudiante(identificacion);
    }
    
    public void registrarEstudiante(Estudiante pEstudiante)
    {
        ServicioLocalEstudiante.insertarEstudiante(pEstudiante);
    }
    
    public void actualizarEstudiante(Estudiante pEstudiante)
    {
        ServicioLocalEstudiante.actualizarEstudiante(pEstudiante);
    }
    
    public void borrarEstudiante(String pDocumento)   
    {
        ServicioLocalEstudiante.eliminarEstudiante(pDocumento);
    }
    
    public void uiVerLista() throws RemoteException
    {
        JDialogListarDatos dialogoVerLista = new JDialogListarDatos(this);
        dialogoVerLista.setVisible(true);
    }
    
    public void uiRegistrarUsuario()
    {
        JDialogPanelInfo agregarEstudiante = new JDialogPanelInfo(this, GUIConstantes.TIPO_ACCION.CREAR);
        agregarEstudiante.setVisible(true);
    }
    
    public void uiModificarEstudiante(Estudiante pEstudiante)
    {
        JDialogPanelInfo actualizarEstudiante = new JDialogPanelInfo(this, GUIConstantes.TIPO_ACCION.ACTUALIZAR);
        actualizarEstudiante.darPanel().refrescarInfo(pEstudiante);
        actualizarEstudiante.setVisible(true);
    }
    
    public void uiVisualizarEstudiante(Estudiante pEstudiante)
    {
        JDialogPanelInfo verEstudiante = new JDialogPanelInfo(this, GUIConstantes.TIPO_ACCION.LEER);
        verEstudiante.darPanel().refrescarInfo(pEstudiante);
        verEstudiante.setVisible(true);
    }
    
    public void uiBorrarEstudiante(Estudiante pEstudiante)      
    {
        JDialogPanelInfo eliminarEstudiante = new JDialogPanelInfo(this, GUIConstantes.TIPO_ACCION.ELIMINAR);
        eliminarEstudiante.darPanel().refrescarInfo(pEstudiante);
        eliminarEstudiante.setVisible(true);
    }
         
    
    private JMenuBar barraMenu;
    private JMenu menuArchivo, menuEstudiante, menuMatricula, menuAyuda;
    
    private JMenuItem mnSalir, mnAyuda;
    private JMenuItem mnEstMatricular, mnVerEstMatriculas, mnListarMatriculas, mnEstActualizarMateria, mnGraficaMateria, mnBorrarMatricula, mnVerPromedio;
    private JMenuItem mnEstListar, mnEstCrear, mnEstEliminar, mnEstActualizar, mnEstBuscar, mnEstGrafica;
    
    public void inicializarMenuBar()
    {
        barraMenu = new JMenuBar();
        setJMenuBar(barraMenu);
        
        //Menu de archivo
        menuArchivo = new JMenu("Archivo");
        barraMenu.add(menuArchivo);
        
        mnSalir = new JMenuItem("Salir");
        mnSalir.addActionListener(this);
        menuArchivo.add(mnSalir);
        
        //Menu de Estudiante
        menuEstudiante = new JMenu("Estudiante");
        barraMenu.add(menuEstudiante);
        
        mnEstListar = new JMenuItem("Listar Estudiantes");
        mnEstListar.addActionListener(this);
        menuEstudiante.add(mnEstListar);
        
        mnEstCrear = new JMenuItem("Agregar Estudiante");
        mnEstCrear.addActionListener(this);
        menuEstudiante.add(mnEstCrear);
        
        mnEstBuscar = new JMenuItem("Buscar Estudiante");
        mnEstBuscar.addActionListener(this);
        menuEstudiante.add(mnEstBuscar);
                
        mnEstActualizar = new JMenuItem("Actualizar Estudiante");
        mnEstActualizar.addActionListener(this);
        menuEstudiante.add(mnEstActualizar);
        
        mnEstEliminar = new JMenuItem("Eliminar Estudiante");
        mnEstEliminar.addActionListener(this);
        menuEstudiante.add(mnEstEliminar);
        
        mnEstGrafica = new JMenuItem("Estadisticas de Estudiantes");
        mnEstGrafica.addActionListener(this);
        menuEstudiante.add(mnEstGrafica);
        
        mnVerPromedio = new JMenuItem("Ver promedio Estudiante");
        mnVerPromedio.addActionListener(this);
        menuEstudiante.add(mnVerPromedio);
        
        menuMatricula = new JMenu("Matriculas");
        barraMenu.add(menuMatricula);
        
        mnEstMatricular = new JMenuItem("Matricular Estudiante");
        mnEstMatricular.addActionListener(this);
        menuMatricula.add(mnEstMatricular);
        
        mnVerEstMatriculas = new JMenuItem("Ver matriculas estudiante");
        mnVerEstMatriculas.addActionListener(this);
        menuMatricula.add(mnVerEstMatriculas);
        
        mnListarMatriculas = new JMenuItem("Listar matriculas");
        mnListarMatriculas.addActionListener(this);
        menuMatricula.add(mnListarMatriculas);
        
        mnEstActualizarMateria = new JMenuItem("Actualizar matricula");
        mnEstActualizarMateria.addActionListener(this);
        menuMatricula.add(mnEstActualizarMateria);
        
        mnBorrarMatricula = new JMenuItem("Borrar matricula");
        mnBorrarMatricula.addActionListener(this);
        menuMatricula.add(mnBorrarMatricula);
        
        mnGraficaMateria = new JMenuItem("Estadisticas de matriculas");
        mnGraficaMateria.addActionListener(this);
        menuMatricula.add(mnGraficaMateria);
        
        //Menú ayuda
        menuAyuda = new JMenu("Ayuda");
        barraMenu.add(menuAyuda);
        
        mnAyuda = new JMenuItem("Acerca de...");
        mnAyuda.addActionListener(this);
        menuAyuda.add(mnAyuda);
    }
   
    @Override
    public void actionPerformed(ActionEvent e) {
        if(e.getSource() == mnSalir){
            System.exit(0);
        }
        else if(e.getSource() == mnEstBuscar){
            String identificacion = JOptionPane.showInputDialog(this, "Digite el numero de identificación del estudiante que desea buscar:", "Buscar Estudiante", JOptionPane.WARNING_MESSAGE);
            if(identificacion != null){
                Estudiante estudiante;
                estudiante = this.buscarEstudiante(identificacion);
                if(estudiante != null){
                this.uiVisualizarEstudiante(estudiante);
                }
                else{
                    JOptionPane.showMessageDialog(this, "El estudiante no se ha encontrado en la base de datos.");
                }
            }
        }
        else if(e.getSource() == mnEstCrear){
            this.uiRegistrarUsuario();
        }
        else if(e.getSource() == mnEstEliminar){
            String identificacion = JOptionPane.showInputDialog(this, "Digite el numero de identificación del estudiante que desea eliminar:", "Eliminar Estudiante", JOptionPane.WARNING_MESSAGE);
            if(identificacion != null){
                Estudiante estudiante = this.buscarEstudiante(identificacion);
                if(estudiante != null){
                    this.uiBorrarEstudiante(estudiante);
                }
                else{
                    JOptionPane.showMessageDialog(this, "El estudiante no se ha encontrado en la base de datos.");
                }
            }
        }
        else if(e.getSource() == mnEstActualizar){
            String identificacion = JOptionPane.showInputDialog(this, "Digite el numero de identificación del estudiante que desea actualizar:", "Actualizar Estudiante", JOptionPane.WARNING_MESSAGE);
            if(identificacion != null){
                Estudiante estudiante = this.buscarEstudiante(identificacion);
                if(estudiante != null){
                    this.uiModificarEstudiante(estudiante);
                }
                else{
                    JOptionPane.showMessageDialog(this, "El estudiante no se ha encontrado en la base de datos.");
                }
            }
        }
        else if(e.getSource() == mnEstMatricular){
            JDialogPanelMatricula dialogoMatricula = new JDialogPanelMatricula(this);
            dialogoMatricula.setVisible(true);
        }
        else if(e.getSource() == mnVerEstMatriculas){
            try{
                JDialogBuscarMatriculaEstudiante dialogoMatricula = new JDialogBuscarMatriculaEstudiante(0);
                dialogoMatricula.setVisible(true);
            } catch (RemoteException ex) {

            }
        }
        else if(e.getSource() == mnBorrarMatricula){
            try{
                JDialogBuscarMatriculaEstudiante dialogoMatricula = new JDialogBuscarMatriculaEstudiante(1);
                dialogoMatricula.setVisible(true);
            } catch (RemoteException ex) {

            }
        }
        else if(e.getSource() == mnEstActualizarMateria){
            try{
                JDialogBuscarMatriculaEstudiante dialogoMatricula = new JDialogBuscarMatriculaEstudiante(2);
                dialogoMatricula.setVisible(true);
            } catch (RemoteException ex) {

            }
        }
        else if(e.getSource() == mnEstListar){
            try {
                this.uiVerLista();
            } catch (RemoteException ex) {
                Logger.getLogger(GUIPrincipal.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        else if(e.getSource() == mnGraficaMateria){
            JDialogGraficosMatricula dialog = new JDialogGraficosMatricula( ServicioLocalMatricula.darCantidadMateriasPorGradoCursado());
            dialog.setVisible(true);
        }
        else if(e.getSource() == mnListarMatriculas){
            JDialogListarMatriculasTodas dialog = new JDialogListarMatriculasTodas();
            dialog.setVisible(true);
        }
        else if(e.getSource() == mnEstGrafica){
            JDialogGraficos dialogoGrafica = new JDialogGraficos(ServicioLocalEstudiante.cantidadEstudiantesPorGenero());
            dialogoGrafica.setVisible(true);
        }
        else if(e.getSource() == mnVerPromedio){
            JDialogBuscarEstudiante dia;
            dia = new JDialogBuscarEstudiante(null, 3);
            dia.ponerPadreFrame(this);
            dia.setVisible(true);
        }
        else if(e.getSource() == mnAyuda){
            JOptionPane.showMessageDialog(this,"Desarrollado por:\n\n- Alejandro Luna Miranda\n- Luis Felipe Londoño\n\n\tUNIVERSIDAD DE IBAGUÉ\n\t\t©©©©©© 2020 ©©©©©©");
        }
    }
    
    public static void main(String arg[]){
        try{
            GUIPrincipal ven = new GUIPrincipal();
            ven.setTitle("Gestión estudiantil");
            ven.setVisible(true);
            ven.setSize(new Dimension(500, 400));
            ven.setLayout(new BorderLayout());
            ven.setDefaultCloseOperation(EXIT_ON_CLOSE);
            ven.setResizable(false);
            ven.setLocationRelativeTo(null);
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }
}