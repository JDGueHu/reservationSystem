
<!DOCTYPE html>
 
<html lang="es">
 
	<head>
		<title>Envio de email</title>
		<meta charset="utf-8" />
	</head>
	<body >

		<div style="margin: auto; width: 700px; height: 400px; border: 1px solid #337ab7; padding-bottom: 7%;">
		
			<div style="width: 650px; margin:auto; color:#337ab7; text-align: center;">
				<h1 style="color:#337ab7; font-weight:bold;">Canchas sintéticas XXX</h1>
				<p>Estimado usuario, GRACIAS por usar nuestro sistema de reservas online.</p>
			</div>

			<div style="width: 650px; margin:auto; background-color:#337ab7; text-align: center;">
				
				<h3 style="color:#ffffff;margin: 0%; padding: 0.5% 0%;">El id de su reserva es: {!! $booking_id !!}</h3>
				<h2 style="color:#ffffff;margin: 0%; margin-bottom: 1.5%; padding-bottom: 1%">Usted ha reservado</h2>

			</div>

			<div style="width: 600px; margin:auto; margin-bottom: 57px;">

				<div style="width: 195px; float: left; border: 1px solid black; margin-left: 2px;">
					<p style="font-size: 18px; color:#337ab7; font-weight: bold; text-align: center; margin: 0.7% 0%;">Deporte:</p>
					<p style="text-align: center; color:black;margin: 0.7% 0%;"> {{ $sport }}</p>
				</div>
				<div style="width: 195px; float: left; border: 1px solid black; margin-left: 2px;">
					<p style="font-size: 18px; color:#337ab7; font-weight: bold; text-align: center; margin: 0.7% 0%;">Escenario:</p>
					<p style="text-align: center; margin: 0.7% 0%;color:black;"> {{ $field_name }}</p>
				</div>
				<div style="width: 195px; float: left; border: 1px solid black; margin-left: 2px;">
					<p style="font-size: 18px; color:#337ab7; font-weight: bold; text-align: center; margin: 0.7% 0%;">Detalles escenario:</p>
					<p style="text-align: center; margin: 0.7% 0%;color:black;"> {{ $field_details }}</p>
				</div>
				
			</div>

			<div style="width: 600px; margin:auto; margin-bottom: 112px;">

				<div style="width: 32.5%; float: left; border: 1px solid black; margin-left: 0.3%;">
					<p style="font-size: 18px; color:#337ab7; font-weight: bold; text-align: center; margin: 0.7% 0%;">Fecha:</p>
					<p style="text-align: center; margin: 0.7% 0%;color:black;"> {{ $availability_date }}</p>
				</div>
				<div style="width: 32.5%; float: left; border: 1px solid black; margin-left: 0.3%;">
					<p style="font-size: 18px; color:#337ab7; font-weight: bold; text-align: center; margin: 0.7% 0%;">Hora inicio:</p>
					<p style="text-align: center; margin: 0.7% 0%; color:black;"> {{ $availability_ini_hour }}</p>
				</div>
				<div style="width: 32.5%; float: left; border: 1px solid black; margin-left: 0.3%;">
					<p style="font-size: 18px; color:#337ab7; font-weight: bold; text-align: center; margin: 0.7% 0%;">Hora finalización:</p>
					<p style="text-align: center; margin: 0.7% 0%; color:black;"> {{ $availability_fin_hour }}</p>
				</div>
				
			</div>

			<div style="width: 600px; margin:auto; margin-bottom: 20px; background-color: #f2dede; padding-bottom: 1%">

				<h4 style="text-align: center; color:red;margin: 0%; padding: 0.5% 0%;">Recuerde:</h4>
			  	<ul>
				  @foreach($rules as $rule)
				  	<li>{!! $rule->rule !!}.</li>
				  @endforeach
			    </ul>

			</div>

			<div style="width: 600px; margin:auto; margin-bottom: 20px; padding-bottom: 1%">

				<p style="text-align: center; font-size: 10px;">Contacto: 57 2 3333333 Cel 313 3333333 email contacto@email.com </p>
				<p style="text-align: center; font-size: 10px; margin: 0px">DeyappCo@ Todos los derechos reservados.</p>

			</div>

		</div>
		
	</body>

</html>

