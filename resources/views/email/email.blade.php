
<!DOCTYPE html>
 
<html lang="es">
 
	<head>
		<title>Envio de email</title>
		<meta charset="utf-8" />
	</head>
	<body >

		<div style="margin: auto; width: 700px; height: 460px; border: 1px solid #337ab7; padding-bottom: 7%;">
		
			<table style="margin: auto; width: 650px">
				<thead>
					<tr>
						<th colspan="4" style="margin:auto; color:#337ab7; text-align: center;">
							<h1 style="color:#337ab7; font-weight:bold;">{{ $customer_business_name }}</h1>
							<p>Estimado {{ $user_name }}, GRACIAS por usar nuestro sistema de reservas online.</p>
						</th>			
					</tr>
					<tr>
						<th colspan="4" style="margin:auto; background-color:#337ab7; text-align: center;">
							<h3 style="color:#ffffff;margin: 0%; padding: 0.5% 0%;">El id de su reserva es: {!! $booking_id !!}</h3>
							<h2 style="color:#ffffff;margin: 0%; padding-bottom: 1%">Usted ha reservado</h2>
						<th>				
					</tr>	
				</thead>
				<tbody>				
					<tr>
						<td width="300px">
							<p style="font-size: 18px; background-color: #337ab7; color:#ffffff; text-align: center; margin: 0%">Deporte:</p>
						</td>
						<td colspan="3">
							<p style="text-align: center; color:black; margin: 0%"> {{ $sport }}</p>
						</td>						
					</tr>
					<tr>
						<td>
							<p style="font-size: 18px; background-color: #337ab7; color:#ffffff; text-align: center; margin: 0%">Escenario:</p>
						</td>
						<td colspan="3">
							<p style="text-align: center; margin: 0%; color:black;"> {{ $field_name }}</p>
						</td>						
					</tr>
					<tr>
						<td>
							<p style="font-size: 18px; background-color: #337ab7; color:#ffffff; text-align: center; margin: 0%">Detalles escenario:</p>
						</td>
						<td colspan="3">
							<p style="text-align: center; margin: 0%; color:black;"> {{ $field_details }}</p>
						</td>						
					</tr>	
					<tr>
						<td>
							<p style="font-size: 18px; background-color: #337ab7; color:#ffffff; text-align: center; margin: 0%">Fecha:</p>
						</td>
						<td colspan="3">
							<p style="text-align: center; margin: 0%;color:black;"> {{ $availability_date }}</p>
						</td>						
					</tr>	
					<tr>
						<td>
							<p style="font-size: 18px; background-color: #337ab7; color:#ffffff; text-align: center; margin: 0%">Hora inicio:</p>
						</td>
						<td colspan="3">
							<p style="text-align: center; margin: 0%; color:black;"> {{ $availability_ini_hour }}</p>
						</td>						
					</tr>
					<tr>
						<td>
							<p style="font-size: 18px; background-color: #337ab7; color:#ffffff; text-align: center; margin: 0%;">Hora finalización:</p>
						</td>
						<td colspan="3">
							<p style="text-align: center; margin: 0%; color:black;"> {{ $availability_fin_hour }}</p>
						</td>						
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="4" style="background-color: #f2dede">
							<h4 style="text-align: center; color:red;margin: 0%; padding: 0.5% 0%;">Recuerde:</h4>
						  	<ul>
							  @foreach($rules as $rule)
							  	<li>{!! $rule->rule !!}.</li>
							  @endforeach
					    	</ul>
						</td>						
					</tr>	
					<tr>
						<td colspan="4">
							<p style="text-align: center; font-size: 11px;">Contacto: 57 2 3333333 Cel 313 3333333 email contacto@email.com </p>
							<p style="text-align: center; font-size: 11px; margin: 0px">DeyappCo@ Todos los derechos reservados.</p>
						</td>
					</tr>					
				</tbody>
			</table>

		</div>

	</body>



</html>

