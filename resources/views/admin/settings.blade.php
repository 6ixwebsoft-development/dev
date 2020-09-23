@include('admin.includes.head')
      <!-- header -->
  @include('admin.includes.header') 
      <!-- sidebar -->
      @include('admin.includes.sidebar')

      <main class="main">
       
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
        <div class="container-fluid">
          <h1>Admin Default Settings</h1>

          {!! Form::open(array('route' => array('admin.settings.update'))) !!}
            
            @foreach($settings as $setting)

              <div class="form-group row"  @if($setting->type == 'checkbox') style="display: none;" @endif>
                  <div class="col-lg-2">
                    {!! Form::label('language', $setting->setting . ':*', [ 'class' => 'col-form-label']) !!}
                  </div>

                  <div class="col-lg-10">
                    
                    @if($setting->type == 'checkbox')
                      {{-- <input type="{{$setting->type}}" name="{{$setting->system_name}}" value="{{$setting->value}}" > --}}
                    <div class="custom-control custom-switch">
                      @if($setting->value == 1)
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name='data[{{$setting->id}}][{{$setting->system_name}}]' checked="true" value='1'>
                      @else
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name='data[{{$setting->id}}][{{$setting->system_name}}]' value='1'>
                      @endif
                        <label class="custom-control-label" for="customSwitch1">Activate</label>
                    </div>
                    @else
                      <input type="{{$setting->type}}" name='data[{{$setting->id}}][{{$setting->system_name}}]' value="{{$setting->value}}">
                    @endif  
                  </div>
              </div>

            @endforeach
            <input type="submit" value="Save">
        {!! Form::close() !!}
        </div>
      </main>
      <style type="text/css">
        
        .toggle-button {
            margin: 5px 0;
            border-radius: 20px;
            border: 2px solid #D0D0D0;
            height: 24px;
            cursor: pointer;
            width: 50px;
            position: relative;
            display: inline-block;
            user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -moz-user-select: none;
        }

        .toggle-button span {
            position: absolute;
            left: 0;
            top: 0;
            border-radius: 100%;
            width: 26px;
            height: 26px;
            background-color: white;
            float: left;
            margin: -3px 0 0 -3px;
            border: 2px solid #D0D0D0;
            transition: left 0.3s;
        }
        .toggle-button-selected {
            background-color: #83B152;
            border: 2px solid #7DA652;
        }

        .toggle-button-selected span {
            left: 26px;
            top: 0;
            margin: 0;
            border: none;
            width: 24px;
            height: 24px;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
        }
      </style>
      <!-- aside -->
      @include('admin.includes.aside')
      <!-- footer -->
  @include('admin.includes.footer')
   