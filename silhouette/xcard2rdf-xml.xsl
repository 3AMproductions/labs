<?xml version="1.0" encoding="UTF-8"?>
<?altova_samplexml C:\Inetpub\wwwroot\3AM\xml\silhouette\jason.xcard.xml?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:vCard="http://www.w3.org/2001/vcard-rdf/3.0#">
<xsl:output method="xml" media-type="application/rdf+xml" encoding="UTF-8" indent="yes"/>
<xsl:template match="/">
<rdf:RDF>
	<rdf:Description xml:lang="en">
	<xsl:if test="xCard/vCard/URL">
		<xsl:attribute name="rdf:about">
			<xsl:value-of select="xCard/vCard/URL"/>
		</xsl:attribute>
	</xsl:if>
	<xsl:apply-templates></xsl:apply-templates>
	</rdf:Description>
	</rdf:RDF>
</xsl:template>
<xsl:template match="VERSION | JABBERID | DESC"/>
<xsl:template match="N">
	<vCard:N rdf:parseType="Resource">
		<xsl:apply-templates/>
	</vCard:N>
</xsl:template>

<!--
-->
<!--
TZ
LOGO
AGENT
ORG
SOUND
UID
URL
KEY
-->
<xsl:template match="MIDDLE">
<vCard:Other>
	<xsl:apply-templates/>
	</vCard:Other>
</xsl:template>
<xsl:template match="PHOTO">
	<vCard:PHOTO vCard:ENCODING="b" vCard:TYPE="{TYPE}">
		<xsl:apply-templates select="BINVAL"/>
	</vCard:PHOTO>
</xsl:template>
<xsl:template match="CTRY">
	<vCard:Country>
		<xsl:apply-templates/>
	</vCard:Country>
</xsl:template>
<xsl:template match="LABEL">
	<vCard:LABEL rdf:parseType="Resource" vCard:ENCODING="QUOTED-PRINTABLE">
		<xsl:apply-templates/>
	</vCard:LABEL>
</xsl:template>
<xsl:template match="LINE">
	<rdf:value rdf:parseType="Literal">
		<xsl:value-of select="."/>
		<xsl:text>=0D=0A</xsl:text>
	</rdf:value>
</xsl:template>
<xsl:template match="NUMBER | USERID">
	<rdf:value>
		<xsl:apply-templates/>
	</rdf:value>
</xsl:template>

<xsl:template match="ADR | TEL | EMAIL">
	<xsl:element name="vCard:{local-name(.)}">
		<xsl:attribute name="rdf:parseType">
			<xsl:text>Resource</xsl:text>
		</xsl:attribute>
		<xsl:apply-templates/>
	</xsl:element>
</xsl:template>
<xsl:template match="FAMILY | GIVEN | PREFIX | SUFFIX | POBOX | EXTADD | STREET | LOCALITY | REGION | PCODE">
<!-- this one needs to go lowercase -->
<xsl:element name="vCard:{local-name(.)}">
<xsl:apply-templates/>
</xsl:element>
</xsl:template>
<xsl:template match="FN | NICKNAME | BDAY | MAILER | GEO | TITLE | ROLE | CATEGORIES | NAME | SOURCE | NOTE | PRODID | REV | SORT-STRING | CLASS">
<xsl:element name="vCard:{local-name(.)}">
<xsl:apply-templates/>
</xsl:element>
</xsl:template>
<xsl:template match="HOME | WORK | POSTAL | PARCEL | DOM | INTL | PREF | VOICE | FAX | PAGER | MSG | CELL | VIDEO | BBS | MODEM | ISDN | PCS | INTERNET | X400">
	<!-- the fragment needs to be lowercase -->
	<rdf:type rdf:resource="http://www.w3.org/2001/vcard-rdf/3.0#{local-name(.)}">
	<xsl:apply-templates/>
	</rdf:type>
</xsl:template>
</xsl:stylesheet>
