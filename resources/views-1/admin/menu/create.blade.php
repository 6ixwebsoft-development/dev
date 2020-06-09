@extends('admin.includes.adminlayout')

@section('breadcrumb')
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">
      <a href="#">Admin</a>
    </li>
    <li class="breadcrumb-item active">Dashboard</li>
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none">
      <div class="btn-group" role="group" aria-label="Button group">
        <a class="btn" href="#">
        <i class="icon-speech"></i>
        </a>
        <a class="btn" href="./">
        <i class="icon-graph"></i>  Dashboard</a>
        <a class="btn" href="#">
        <i class="icon-settings"></i>  Settings</a>
      </div>
    </li>
  </ol>
@endsection

@section('content') 
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>	
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
		<link src="{{ asset('css/bootstrap-iconpicker.min.css') }}"></link>
        <div class="container">
		 <form id="frmEdit" action="{{url('admin/menu/store')}}" method="post" class="form-horizontal">
		 @csrf()
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header"><h5 class="float-left">Header Menu</h5>
                            <div class="float-right">
                                <button id="btnReload" type="button" class="btn btn-outline-secondary">
                                    <i class="fa fa-play"></i> Load Data</button>
                            </div>
                        </div>
						<input type="hidden" name="menuplace" id="menuplace" value="header">
                        <div class="card-body">
                            <ul id="myEditor" class="sortableLists list-group">
                            </ul>
                        </div>
                    </div>
					
                    
                    <div class="card">
                    <div class="card-header">
                    <div class="float-right">
                    <button id="btnOutput" type="button" class="btn btn-success"><i class="fas fa-check-square"></i> Output</button>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="form-group"><textarea id="out" name="urldata" class="form-control" cols="50" rows="10"></textarea>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-primary mb-3">
                        <div class="card-header bg-primary text-white">Edit item</div>
                        <div class="card-body">
                           
                                
								 <div class="form-group">
                                    <label for="page">Select Pages</label>
                                    <select name="page" id="page" class="form-control item-menu" onChange="geturlbox();">
									 <option value="">--Select--</option> 
									 <option value="0">Chose Custom Link</option> 
										@foreach($pages as $pages)
                                        <option value="{{$pages->id}}">{{$pages->title}}</option>                                        
										@endforeach
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label for="text">Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control item-menu" name="text" id="textname" placeholder="Text">
                                        
                                    </div>
                                    <input type="hidden" name="icon" class="item-menu">
                                </div>
								
                                <div class="form-group" style="display:none;" id="customfeild">
                                    <label for="href">URL</label>
                                    <input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL"> 
                                </div>
                                <div class="form-group">
                                    <label for="target">Target</label>
                                    <select name="target" id="target" class="form-control item-menu">
                                        <option value="_self">Self</option>
                                        <option value="_blank">Blank</option>
                                        <option value="_top">Top</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Tooltip</label>
                                    <input type="text" name="title" class="form-control item-menu" id="title" placeholder="Tooltip">
                                </div>
                            
                        </div>
                        <div class="card-footer">
                            <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
                            <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
                        </div>
                    </div>
                  
                </div>
            </div>
            <hr>
        </div>

 <div class="card-footer clearfix">

            <div class="row">

               

                <div class="col text-right">

                    <button type="submit" class="btn btn-primary">Save</button>

                </div>

            </div>

        </div>


        </form>
        
		<script src="{{ asset('js/iconjs/bootstrap-iconpicker.min.js') }}" defer></script>
		<script src="{{ asset('js/iconjs/iconset/fontawesome5-3-1.min.js') }}"  defer></script>
		<script src="{{ asset('js/jquery-menu-editor.js') }}"  defer></script>
		
		  

@endsection