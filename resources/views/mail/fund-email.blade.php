<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<title>Globalgrant</title>
	</head>
	<body>	
		@foreach($e_message as $fund_detail)
			<p><b>Purpose: </b>{{ strip_tags($fund_detail->purpose) }}</p>
			<p><b>Who Can Apply: </b>{{ strip_tags($fund_detail->who_can_apply) }}</p>
			<p><b>Applications: </b>{{ strip_tags($fund_detail->details) }}</p>
			<p><b>Contact Details:</b></p>
			<p>{{ strip_tags($fund_detail->address1) }}</p>
			<p>{{ strip_tags($fund_detail->address2) }}</p>
			<p>{{ strip_tags($fund_detail->address3) }}</p>
			<p>PHONE: {{ strip_tags($fund_detail->phone_no) }}</p>
			<p>MOBILE: {{ strip_tags($fund_detail->mobile_no) }}</p>
			<p>E_MAIL: {{ strip_tags($fund_detail->email) }}</p>
			<p>Website: <a href="{{ strip_tags($fund_detail->website)}}" target="blank">{{ strip_tags($fund_detail->website)}}</a></p>
			<p style="border: 1px solid #ddd;"></p><br>
		@endforeach
	</body>
</html>