<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet 
    version="1.0" 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output method="html" indent="yes"/>

    <!-- Template for the root element -->
    <xsl:template match="/Company">
        <html>
            <head>
                <title>Projects and Team Members</title>
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }
                    th {
                        background-color: #f2f2f2;
                        text-align: left;
                    }
                    .team-table {
                        margin-left: 20px;
                        width: 95%;
                    }
                </style>
            </head>
            <body>
                <h2>Projects and Team Members</h2>
                <xsl:for-each select="Projects/Project">
                    <h3>
                        <xsl:value-of select="ProjectName"/> (ID: <xsl:value-of select="ProjectID"/>)
                    </h3>
                    <p>
                        <strong>Project Manager:</strong> <xsl:value-of select="ProjectManager"/><br/>
                        <strong>Deadline:</strong> <xsl:value-of select="Deadline"/><br/>
                        <strong>Status:</strong> <xsl:value-of select="Status"/>
                    </p>
                    <h4>Team Members:</h4>
                    <table class="team-table">
                        <tr>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Role</th>
                        </tr>
                        <xsl:for-each select="TeamMembers/Member">
                            <tr>
                                <td><xsl:value-of select="ID"/></td>
                                <td><xsl:value-of select="Name"/></td>
                                <td><xsl:value-of select="Role"/></td>
                            </tr>
                        </xsl:for-each>
                    </table>
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
