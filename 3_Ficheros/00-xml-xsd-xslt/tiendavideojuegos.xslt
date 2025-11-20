<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
   <xsl:template match="/">
      <html>
         <head>
            <title>Tiendas de Videojuegos</title>
            <style>
               table { border-collapse: collapse; width: 80%; margin: 20px auto; }
               th, td { border: 1px solid #555; padding: 8px; text-align: left; }
               th { background-color: #333; color: white; }
            </style>
         </head>
         <body>
            <h2 style="text-align:center;">Listado de Tiendas de Videojuegos</h2>
            <table>
               <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Ciudad</th>
                  <th>País</th>
                  <th>Código Postal</th>
               </tr>

               <!-- Iteramos sobre cada tienda -->
               <xsl:for-each select="tiendas/tienda">
                  <tr>
                     <td><xsl:value-of select="@id"/></td>
                     <td><xsl:value-of select="nombre"/></td>
                     <td><xsl:value-of select="direccion[1]/ciudad"/></td>
                     <td><xsl:value-of select="direccion[1]/pais"/></td>
                     <td><xsl:value-of select="direccion[1]/codigo_postal"/></td>
                  </tr>
               </xsl:for-each>
            </table>
         </body>
      </html>
   </xsl:template>
</xsl:stylesheet>
