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
public class JDialogGraficosMatricula extends JDialog {

    public JDialogGraficosMatricula(List<Integer> datin) {
         
        setResizable(false);
        setLocationRelativeTo(null);

        GUIPanelGrafica panelGrafica = new GUIPanelGrafica(datin, 2);
        add(panelGrafica, BorderLayout.CENTER);

        this.setSize(new Dimension(616, 439));
    }
    
    
    
}
