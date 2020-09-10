/*
    CODIGO PROPIEDAD DE 
            FELIPE LONDOÑO: (https://github.com/Felosque)
            ALEJANDRO LUNA: (https://github.com/AlejoFront)
    
    Agradecimientos a la comunidad de INTERNET por todos sus ejemplos y hacer mucho más facil el apredizaje.
 */
package gui;

import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.Font;
import java.rmi.RemoteException;
import javax.swing.JDialog;
import javax.swing.JLabel;
import javax.swing.JPanel;

/**
 *
 * @author felip
 */
public class JDialogListarDatos extends JDialog {

    private JLabel lbTitulo;
    
    public JDialogListarDatos(GUIPrincipal gui) throws RemoteException {

        //super(null, TOOLKIT_MODAL);
        //setDefaultCloseOperation(DISPOSE_ON_CLOSE);
        setTitle("Gestión Estudiantil - Lista de estudiantes");
        setSize(new Dimension(1000, 500));
        setResizable(false);
        setLocationRelativeTo(null);

        JPanel panelTitulo = new JPanel();
        lbTitulo = new JLabel("LISTA DE ESTUDIANTES");
        lbTitulo.setHorizontalAlignment(JLabel.CENTER);
        lbTitulo.setForeground(GUIConstantes.COLOR_PRINCIPAL);
        lbTitulo.setFont(new Font("TAHOMA", Font.BOLD, 50));
        panelTitulo.add(lbTitulo);
        add(panelTitulo, BorderLayout.NORTH);
        
        
        GUIListarDatos panelListar = new GUIListarDatos(gui);
        add(panelListar, BorderLayout.CENTER);
        
    }

    JDialogListarDatos() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
    
    
    
    
}
