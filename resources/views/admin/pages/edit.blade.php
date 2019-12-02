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
<style>
  .cke{
    margin-bottom: 20px;
  }

</style> 
  <div class="row">
    
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
        	<div class="row">
	            <div class="col-sm-5">
	                 <h4 class="card-title mb-0">
                      Pages Management <small class="text-muted">Page Edit</small>
                  </h4>
	            </div><!--col-->

	           
          </div><!--row-->
          <hr>
        {!! Form::open(array('route' => array('admin.pages.update', $id))) !!}
          {{ method_field('PATCH') }}
         <div class="row">
            <div class="col-12">
                          <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @php
                              $j = 0;
                            @endphp
                            @foreach($languages as $language)
                              @if($j > 0)
                                 @php
                                  $active_tab = '';
                                 @endphp
                              @else
                                @php
                                  $active_tab = 'active';
                                @endphp
                              @endif


                              <a class="nav-link {{$active_tab}}" id="v-pills-{{$language->locale}}" data-toggle="pill" href="#{{$language->locale}}" role="tab" aria-controls="v-pills-profile" aria-selected="false">{{$language->language}}</a>
                               @php
                                $j++;
                              @endphp
                            @endforeach
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="tab-content " class="bottom_style" id="v-pills-tabContent">
                            @php
                              $i = 0;
                            @endphp
                            @foreach($languages as $language)
                              @if($i > 0)
                                 @php
                                  $active = '';
                                 @endphp
                              @else
                                @php
                                  $active = 'active show';
                                @endphp
                              @endif
                              <div class="tab-pane fade {{$active}}" id="{{$language->locale}}" role="tabpanel" aria-labelledby="v-pills-{{$language->locale}}">
                                @php
                                  $textarea_id = '';

                                  $iteration = 0;
                                  
                                @endphp
                                @foreach($page_translation as $key =>$value)
                                 @if($value->language_id == $language->id)
                                    <div class="form-group row">
                                      <div class="col-lg-2">
                                        {!! Form::label('title', __( 'Title' ) . ':*') !!}
                                      </div>
                                      <div class="col-lg-10">
                                        {!!  Form::text($language->id.'[title]', $value->title, ['class' => 'form-control', '', 'placeholder' => __( 'Title' ) ]); !!} 
                                      
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-lg-2">
                                        {!! Form::label('url', __( 'Url' ) . ':*') !!}
                                      </div>
                                      <div class="col-lg-10">
                                        {!!  Form::text($language->id.'[url]', $value->url, ['class' => 'form-control', '', 'placeholder' => __( 'Url' ) ]); !!} 
                                      
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-lg-2">
                                        {!! Form::label('short_description', __( 'Short description' ) . ':*') !!}
                                      </div>
                                      <div class="col-lg-10">
                                        {!!  Form::textarea($language->id.'[short_description]', $value->short_description, ['class' => 'form-control', 'id' => 'short_description'.$i, 'placeholder' => __( 'Short description' ) ]); !!} 
                                          <script>
                                             var s_count =  {!! $i !!}

                                             var s_id = 'short_description'+s_count;
                    
                                             CKEDITOR.replace(s_id);
                                          </script>
                                      </div>
                                    </div>
                                 @endif
                                @endforeach
                                <div class="form-group row">
                                  <div class="col-lg-2">
                                  {!! Form::label('Text', __( 'Text' ) . ':*') !!}
                                  </div>
                                  <div class="col-lg-10">
                                     <div class="input_text_{{$language->id}}">
                                @foreach($blocks[$language->id] as $key =>$value)
                                
                                 @if($value->language_id == $language->id)
                                    @php
                                      $textarea_id .= $language->id.$i;
                                    @endphp
                                    
                                          {!! Form::textarea($language->id.'[text][]', $value->text, ['class' => 'form-control textarea_content', 'style' => 'margin-bottom:28px', 'id'=>'page_text'.$textarea_id, 'placeholder' => __( 'text' ) ]); !!}
                                      
                                        @php
                                          if($key == ( count( $blocks[$language->id] ) -1 )){
                                          
                                        @endphp
                                           <a class="btn btn-primary add-more-btn" style="margin:10px" id="add_{!! $textarea_id !!}" onclick="add_block({!! $language->id !!})">Add</a> 
                                        @php
                                          }
                                        @endphp
                                         @php
                                          if($iteration != 0){
                                        @endphp
                                          <a class="btn btn-primary remove-btn" id="remove_{{$textarea_id}}" style="margin:10px" onclick="remove_block('cke_page_text{{$textarea_id}}', 'remove_{{$textarea_id}}', {!!$textarea_id!!})">remove</a>
                                        @php
                                          }
                                        @endphp
                                  <script>
                                       var textarea_id = 'page_text'+{!! $textarea_id !!}  
                                        CKEDITOR.replace(textarea_id);
                                        
                                       
                                  </script>
                                 
                                 @php
                                    $iteration++;
                                    
                                @endphp

                                @endif

                                @endforeach
                                 </div>
                                 </div>
                                </div>
                                @foreach($page_meta as $key => $value)
                                @if($value->language_id == $language->id)
                                  <div class="form-group row">
                                    <div class="col-lg-2">
                                      {!! Form::label('meta_title', __( 'Meta title' ) . ':*') !!}
                                    </div>
                                    <div class="col-lg-10">
                                      {!!  Form::text($language->id.'[meta_title]', $value->meta_title, ['class' => 'form-control', '', 'placeholder' => __( 'Meta title' ) ]); !!} 
                                    
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-lg-2">
                                      {!! Form::label('meta_keyword ', __( 'Meta Keyword' ) . ':*') !!}
                                    </div>
                                    <div class="col-lg-10">
                                      {!!  Form::text($language->id.'[meta_keyword]', $value->meta_keyword, ['class' => 'form-control', '', 'placeholder' => __( 'Meta keyword' ) ]); !!} 
                                    
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-lg-2">
                                      {!! Form::label('meta_description', __( 'Meta description' ) . ':*') !!}
                                    </div>
                                    <div class="col-lg-10">
                                      {!!  Form::textarea($language->id.'[meta_description]', $value->meta_description, ['class' => 'form-control', 'id' => 'meta_description'.$i, 'placeholder' => __( 'Meta description' ) ]); !!} 
                                        <script>
                                             var m_count =  {!! $i !!}

                                             var m_id = 'meta_description'+m_count;
                    
                                             CKEDITOR.replace(m_id);
                                        </script>

                                    
                                    </div>
                                  </div>
                                  @endif
                                @endforeach
                                
                              </div>
                              @php
                                $i++;
                              @endphp
                            @endforeach
                              
                            </div>
                        </div>
          </div>
         
          <div class="form-group row">

                <div class="col-lg-2">

                  {!! Form::label('status', __( 'Status' ),  [ 'class' => 'col-form-label'] ) !!}

                </div>

                <div class="col-lg-10">

                  <label class="col-form-label">

                      {!! Form::select('status', array('1' => 'Active', '2' => 'In Active'), '1', ['class' => 'form-control']) !!}

                  </label>

                </div>

              </div>
      



          <div class="card-footer clearfix">

            <div class="row">

                <div class="col">

                    <a class="btn btn-danger btn-sm" href="{!! url('/admin/pages'); !!}">Cancel</a>

                </div>

                <div class="col text-right">

                    <button type="submit" class="btn btn-primary">Save</button>

                </div>

            </div>

        </div>


        {!! Form::close() !!}
        </div>
      </div>
    </div>

  </div>
@endsection
   