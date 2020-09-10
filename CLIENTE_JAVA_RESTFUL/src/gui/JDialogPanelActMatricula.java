/*
    CODIGO PROPIEDAD DE 
            FELIPE LONDOÑO: (https://github.com/Felosque)
            ALEJANDRO LUNA: (https://github.com/AlejoFront)
    
    Agradecimientos a la comunidad de INTERNET por todos sus ejemplos y hacer mucho más facil el apredizaje.
 */
package gui;


import estructural.Estudiante;
import estructural.Matricula;
import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.Font;
import javax.swing.JDialog;
import javax.swing.JLabel;
import javax.swing.JPanel;



/**
 *
 * @author felip
 */
public class JDialogPanelActMatricula extends JDialog{

    private JLabel lbTitulo;
    
    public JDialogPanelActMatricula(Estudiante pEstudiante, Matricula pMateria, JDialogBuscarMatriculaEstudiante pe) {
        setSize(new Dimension(700, 400));
        setResizable(false);
        //setAlwaysOnTop(true);
        setLocationRelativeTo(null);
        
        //setDefaultCloseOperation(PROPERTIES);
        
        JPanel panelTitulo = new JPanel();
        lbTitulo = new JLabel("ACTUALIZAR MATRICULA");
        lbTitulo.setHorizontalAlignment(JLabel.CENTER);
        lbTitulo.setForeground(GUIConstantes.COLOR_PRINCIPAL);
        lbTitulo.setFont(new Font("TAHOMA", Font.BOLD, 50));
        panelTitulo.add(lbTitulo);
        add(panelTitulo, BorderLayout.NORTH);
        
        GUIPanelActMatricula panelActMatricula = new GUIPanelActMatricula(pEstudiante, pMateria, pe);
        add(panelActMatricula, BorderLayout.CENTER);
    }
    
}
