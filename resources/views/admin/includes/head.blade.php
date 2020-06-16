<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>
      
      <link href="{{ asset('css/coreui-icons.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet">

	  <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">

      <link href="{{ asset('css/all.css') }}" rel="stylesheet">
      <!-- <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet"> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />

      <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
     <!--  <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet"> -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
      <link href="{{ asset('css/all.css') }}" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <!-- <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet"> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
      <!-- <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css"> -->
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	  <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
		
      <!-- Styles -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('css/pace.min.css') }}" rel="stylesheet">
      <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
	   <script src="{{ asset('js/jquery-ui.js') }}" defer></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
  </head>