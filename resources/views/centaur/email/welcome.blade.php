<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2> Escrow Custodian Services</h2>

<p>Hi {{ $name }},</p>

<p>You’re almost there. Confirm your account below to finish creating your Escrow account.</p>

		

		
		

		<p>To activate your account, <a href="{{ route('auth.activation.attempt', urlencode($code)) }}">click here.</a></p>
		<p>Or point your browser to this address: <br /> {!! route('auth.activation.attempt', urlencode($code)) !!} </p>
		<p>Thank you!</p>
	</body>
</html>