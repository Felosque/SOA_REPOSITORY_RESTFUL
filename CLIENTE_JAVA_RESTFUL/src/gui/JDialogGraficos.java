/*
    CODIGO PROPIEDAD DE 
            FELIPE LONDOÑO: (https://github.com/Felosque)
            ALEJANDRO LUNA: (https://github.com/AlejoFront)
    
    Agradecimientos a la comunidad de INTERNET por todos sus ejemplos y hacer mucho más facil el apredizaje.
 */
package gui;

import java.awt.BorderLayout;
import java.awt.Dimension;
import java.util.List;
import javax.swing.JDialog;

/**
 *
 * @author felip
 */
public class JDialogGraficos extends JDialog {

    public JDialogGraficos(List<Integer> generoEstudiantes) {
        
        
        setResizable(false);
        setLocationRelativeTo(null);
        
        GUIPanelGrafica panelGrafica = new GUIPanelGrafica(generoEstudiantes, 1);
        add(panelGrafica, BorderLayout.CENTER);
        
        this.setSize(new Dimension(616, 439));
    }
    
    
    
}
