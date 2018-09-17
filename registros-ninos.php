<?php 
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=registros-ninos.xls");
header("Pragma: no-cache");
header ("Expires: 0");

$cnx = new mysqli('localhost', 'icpna', '874oRRQRtmN#','icpna');
$cnx->set_charset("utf8");
//$sql = 'SELECT * FROM registros WHERE formulario="ninos" ORDER BY fecha DESC';
$sql = 'SELECT * FROM registros WHERE programa="Programa para Niños" ORDER BY fecha DESC';
$result = $cnx->query($sql);

?>
    <table width="100%" border="1">
        <tr>
            <td><strong>NOMBRES</strong></td>
            <td><strong>APELLIDOS</strong></td>
            <td><strong>TIPO DE DOCUMENTO</strong></td>
            <td><strong>NUMERO DE DOCUMENTO</strong></td>
            <td><strong>CELULAR</strong></td>
            <td><strong>CORREO</strong></td>
            <td><strong>SEDE</strong></td>
            <td><strong>PROGRAMA</strong></td>
            <td><strong>PUBLICIDAD</strong></td>
            <td><strong>UTM_SOURCE</strong></td>
            <td><strong>UTM_MEDIUM</strong></td>
            <td><strong>UTM_CAMPAIGN</strong></td>
            <td><strong>UTM_TERM</strong></td>
            <td><strong>UTM_CONTENT</strong></td>
            <td><strong>GCLID</strong></td>
            <td><strong>FECHA</strong></td>
        </tr>
		
		<?php while ($list = $result->fetch_assoc()) { ?>
        <tr>
        	<td><?php echo  utf8_decode($list["nombres"]); ?></td>
			<td><?php echo  utf8_decode($list["apellidos"]); ?></td>
			<td><?php echo  utf8_decode($list["tipodocumento"]); ?></td>
			<td><?php echo  utf8_decode($list["numerodocumento"]); ?></td>
			<td><?php echo  utf8_decode($list["celular"]); ?></td>
			<td><?php echo  utf8_decode($list["correo"]); ?></td>
			<td><?php echo  utf8_decode($list["sedes"]); ?></td>
			<td><?php echo  utf8_decode($list["programa"]); ?></td>
            <td><?php echo  utf8_decode($list["pauta"]); ?></td>
			<td><?php echo  utf8_decode($list["utm_source"]); ?></td>
			<td><?php echo  utf8_decode($list["utm_medium"]); ?></td>
			<td><?php echo  utf8_decode($list["utm_campaign"]); ?></td>
			<td><?php echo  utf8_decode($list["utm_term"]); ?></td>
			<td><?php echo  utf8_decode($list["utm_content"]); ?></td>
			<td><?php echo  utf8_decode($list["gclid"]); ?></td>
			<td><?php echo  utf8_decode($list["fecha"]); ?></td>
        </tr>
        <?php } ?>

    </table>