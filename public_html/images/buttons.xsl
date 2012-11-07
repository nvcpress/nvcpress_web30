<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format">
<xsl:output method="xml" indent="yes" encoding="utf-8" doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>
<xsl:strip-space elements="*"/>
	<!--MENU-->
	<xsl:template match="MENU" mode="top">
		<div class="menu-area">
			<ul class="menu">
				<xsl:apply-templates select="MENU-ITEM"  mode="top"/>
			</ul>
		</div>
		<div class="clear"></div>
	</xsl:template>

	<!--MENU-ITEM-->
	<xsl:template match="MENU-ITEM"  mode="top">
		<xsl:variable name="position"><xsl:value-of select="position()" /></xsl:variable>
   		<xsl:choose>
			<!--active-->
           	<xsl:when test="MENU-ITEM[@ID=/LAYOUT/@ID] or @ID=/LAYOUT/@ID">
				<li class="active"><a href="{@HREF}" class="menu-link"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></a></li>
            </xsl:when>
            <!--inactive-->            
            <xsl:otherwise>
				<li><a href="{@HREF}" class="menu-link"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></a></li>
            </xsl:otherwise>
        </xsl:choose>
	</xsl:template>
</xsl:stylesheet>