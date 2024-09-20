<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet 
    version="1.0" 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output method="html" indent="yes"/>

    <!-- Define colors for statuses -->
    <xsl:variable name="colorOnTrack" select="'green'"/>
    <xsl:variable name="colorBehindSchedule" select="'red'"/>

    <!-- Template for the root element -->
    <xsl:template match="/Company">
        <html>
            <head>
                <title>Project Status Overview</title>
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                </style>
            </head>
            <body>
                <h2>Project Status Overview</h2>
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
                            <td>
                                <xsl:choose>
                                    <xsl:when test="Status = 'Behind Schedule'">
                                        <span style="color:{$colorBehindSchedule};">
                                            <xsl:value-of select="Status"/>
                                        </span>
                                    </xsl:when>
                                    <xsl:when test="Status = 'On Track'">
                                        <span style="color:{$colorOnTrack};">
                                            <xsl:value-of select="Status"/>
                                        </span>
                                    </xsl:when>
                                    <xsl:otherwise>
                                        <xsl:value-of select="Status"/>
                                    </xsl:otherwise>
                                </xsl:choose>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
