<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet 
    version="1.0" 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output method="html" indent="yes"/>

    <!-- Template for the root element -->
    <xsl:template match="/Company">
        <html>
            <head>
                <title>Project Details</title>
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }
                    th {
                        background-color: #f2f2f2;
                        text-align: left;
                    }
                </style>
            </head>
            <body>
                <h2>Project Details</h2>
                <table>
                    <tr>
                        <th>Project ID</th>
                        <th>Project Name</th>
                        <th>Project Manager</th>
                        <th>Deadline</th>
                        <th>Status</th>
                    </tr>
                    <xsl:for-each select="Projects/Project">
                        <tr>
                            <td><xsl:value-of select="ProjectID"/></td>
                            <td><xsl:value-of select="ProjectName"/></td>
                            <td><xsl:value-of select="ProjectManager"/></td>
                            <td><xsl:value-of select="Deadline"/></td>
                            <td><xsl:value-of select="Status"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
