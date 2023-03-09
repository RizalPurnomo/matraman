<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Test</title>
	<style type="text/css">
		table {
			page-break-inside: auto
		}

		div {
			page-break-inside: avoid;
		}

		/* This is the key */
		thead {
			display: table-header-group
		}

		tfoot {
			display: table-footer-group
		}
	</style>
</head>

<body>
	<table>
		<thead>
			<tr>
				<th>heading</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td>notes</td>
			</tr>
		</tfoot>
		<tr>
			<td>
				<div>Long<br />cell<br />should'nt<br />be<br />cut</div>
			</td>
		</tr>
		<tr>
			<td>
				<div>Long<br />cell<br />should'nt<br />be<br />cut</div>
			</td>
		</tr>
		<!-- 500 more rows -->
		<tr>
			<td>x</td>
		</tr>
		</tbody>
	</table>
</body>

</html>
