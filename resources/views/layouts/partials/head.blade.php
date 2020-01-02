<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<title>Globalgrant</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|" rel="stylesheet" type="text/css">
		<!-- <link href="frontend/fonts/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
		<!-- <link href="frontend/fonts/lineo-icon/style.css" rel="stylesheet" type="text/css"> -->
		<!-- <link rel="stylesheet" type="text/css" href="frontend/css/style.css" /> -->
		<!-- <link rel="stylesheet" type="text/css" href="frontend/css/custom.css" /> -->
		{!! Html::style('frontend/fonts/font-awesome.min.css') !!}
		{!! Html::style('frontend/fonts/lineo-icon/style.css') !!}
		{!! Html::style('frontend/css/style.css') !!}
		{!! Html::style('frontend/css/custom.css') !!}
		<link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
		<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<!-- <link rel="stylesheet" type="text/css" href="frontend/css/bootstrap.css" /> -->
		{!! Html::style('frontend/css/bootstrap.css') !!}
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
<link href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css" rel="stylesheet"/>
	</head>