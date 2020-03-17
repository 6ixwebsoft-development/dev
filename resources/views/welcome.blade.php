@extends('layouts.mainlayout')
@section('content')


<div class="slider_area">
    <div class="f-search">
        {{ Form::open(array('url' => '/')) }}
            <div class="row">
                <div class="col-md-7 text-center">
                    <!-- {{ Form::checkbox('simple_search', '1') }} -->
                    <input type="radio" name="fund_search" value="1" checked>{{ __('word.'.strtolower('Economically needy, sick or disabled'))}}</input>
                    
                </div>
                <div class="col-md-5 text-center">
                    <!-- {{ Form::checkbox('advance_search', '2') }} -->
                    <input type="radio" name="fund_search" value="2">
					{{ __('word.'.strtolower('Another purpose'))}}</input>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    {{ Form::submit(__('search'), ['class'=>'foundationSearch', '']) }}
                </div>
            </div>
        {{ Form::close() }} 
    </div>
    <div class="hero hero-slider">
    <ul class="slides">
        <li data-bg-image="frontend/images/banner-img-0.jpg"></li>
        <li data-bg-image="frontend/images/banner-img-1.jpg"></li>
        <li data-bg-image="frontend/images/banner-img-0.jpg"></li>
    </ul>       
</div> <!-- .hero-slider -->
    <!-- <div class="search_form">
        <div class="row">
            <div class="col-md-3 col-sm-5 background_form form_responsive_width">
                
                   <h2 class="contact_title">Search Grant</h2> 

                    {{ Form::open(array('url' => '/')) }}
                      
                        <div class="col-md-12 bottom_style">                     
                                
                            {{ Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email*']) }}
                        </div>   
                        <div class="col-md-12 bottom_style">                     
                             {{ Form::text('Year_born', 'Year born*', array('class' => 'datepicker_b form-control','id' => 'datepicker_b')) }}     
                            
                        </div>   
                     
                        <div class="col-md-12 bottom_style">                     
                           
                             {{ Form::select('size', array('H' => 'Home municipality *', 'abroad' => 'abroad'), 'H', ['class'=>'form-control', 'id'=>'multiselect', 'onclick'=>'multipleSelect()'])  }}  
                            
                        </div>   
                        <div class="col-md-12 bottom_style">                     
                                 
                            {{ Form::text('sex', null, ['class'=>'form-control', 'placeholder'=>'Sex']) }}
                        </div> 
                        <div class="col-md-12 bottom_style">
                         
                             {{ Form::label('collapsible', 'Which choices are right for you?', array('class' => 'collapsible form-control')) }}
                            <div class="content">
                                {{ Form::checkbox('unemployed') }}
                                 {{ Form::label('unemployed', 'Unemployed, long time', array('class' => 'label_style')) }}<br>
                                {{ Form::checkbox('healthy') }}
                                 {{ Form::label('healthy', ' Pretty healthy and working / studying now', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('diagnosis') }}
                                 {{ Form::label('diagnosis', 'letter Diagnosis', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('cancer') }}
                                 {{ Form::label('cancer', 'Cancer', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('diabetes') }}
                                 {{ Form::label('Diabetes', ' Diabetes', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('retirement') }}
                                 {{ Form::label('early retirement', ' Early Retirement', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('glasses') }}
                                 {{ Form::label('glasses', 'Glasses, can not afford', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('home') }}
                                 {{ Form::label('home', ' Home appliances, can not afford bed etc', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('heart') }}
                                 {{ Form::label('heart', ' Heart', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('Skin disease') }}
                                 {{ Form::label('disease', ' Skin disease', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('impairment') }}
                                 {{ Form::label('impairment', 'Impairment of hearing', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('clothes_shoes') }}
                                 {{ Form::label('clothes_shoes', 'Clothes & shoes, can not afford', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('clothes_shoes') }}
                                 {{ Form::label('pulmonary_disease', 'Pulmonary Disease', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('mental_illness') }}
                                 {{ Form::label('mental_illness', 'Mental illness', array('class' => 'label_style')) }}<br>
                                 {{ Form::checkbox('walker') }}
                                 {{ Form::label('walker', 'walker', array('class' => 'label_style')) }}
                                 <br>
                                 {{ Form::checkbox('wheelchair') }}
                                 {{ Form::label('wheelchair', 'wheelchair', array('class' => 'label_style')) }}
                                 <br>
                                 {{ Form::checkbox('physical_disability') }}
                                 {{ Form::label('physical_disability', 'Physical disability', array('class' => 'label_style')) }}
                                 <br>
                                 {{ Form::checkbox('sick') }}
                                 {{ Form::label('sick', 'Sick long time', array('class' => 'label_style')) }}
                                 <br>
                                 {{ Form::checkbox('Severe allergy') }}
                                 {{ Form::label('severe_allergy', 'Severe allergy', array('class' => 'label_style')) }}
                                 <br>
                                 {{ Form::checkbox('visual_impairment') }}
                                 {{ Form::label('visual_impairment', 'Visual Impairment', array('class' => 'label_style')) }}
                                 <br>
                                  {{ Form::checkbox('dental_care') }}
                                 {{ Form::label('dental_care', 'Dental care, can not afford', array('class' => 'label_style')) }}
                                 <br>
                            </div>
                        </div>
                         <div class="col-md-12 bottom_style">  
                         {{ Form::label('collapsible_p_y', 'Income per year excl. Contribution *', array('class' => 'collapsible_p_y form-control')) }}
                            <div class="content_p_y">                     
                                {{ Form::radio('income_p_b', 'value') }}
                                    Below SEK 180,000 before tax <br>
                                {{ Form::radio('income_p_o', 'value') }}
                                    Over SEK 180,000 before tax
                            </div>                        
                           
                        </div>
                        <div class="col-md-12 bottom_style">            
                            {{ Form::textarea('children', null, ['class'=>'form-control', 'placeholder'=>'Children']) }}
                            <i class="input_info">Here you tell about your underage children</i>
                        </div>

                      
                        <div class="col-md-12 bottom_style">                          
                            {{ Form::submit('Search', ['class'=>'btnRight', 'disabled']) }}
                        </div>
                                   
                    {{ Form::close() }} 
               
            </div>
        </div>
    </div> -->
</div>
<main class="main-content">
    <div class="fullwidth-block greet-section">
        <div class="container">
            <h2 class="section-title">{{ __('word.'.strtolower('Welcome to our website'))}}</h2>
            <small class="section-subtitle">Etiam suscipit leo tincidunt risus dignissim quisque semper mollis</small>

            <div class="row">
                <div class="col-md-3">
                    <div class="feature">
                        <i class="icon-phone-24"></i>
                        <h3 class="feature-title">24 {{ __('word.'.strtolower('hours Service'))}}</h3>
                        <p>Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incididunt labore dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature">
                        <i class="icon-hotel"></i>
                        <h3 class="feature-title">{{ __('word.'.strtolower('hospitality'))}}</h3>
                        <p>Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incididunt labore dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature">
                        <i class="icon-luggage"></i>
                        <h3 class="feature-title">{{ __('word.'.strtolower('praesent pellentesque'))}} </h3>
                        <p>Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incididunt labore dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature">
                        <i class="icon-credit-card-hand"></i>
                        <h3 class="feature-title">{{ __('word.'.strtolower('consectetur interdum'))}}</h3>
                        <p>Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incididunt labore dolore magna aliqua.</p>
                    </div>
                </div>
            </div> <!-- .row -->

            <div class="text-center">
                <p>Sollicitudin sit tortor pellentesque. <a href="#">Read more</a></p>
            </div>
        </div> <!-- .container -->
    </div> <!-- .fullwidth-block -->

    <div class="fullwidth-block" data-bg-color="#f1f1f1">
        <div class="container">
            <h2 class="section-title">{{ __('word.'.strtolower('our insurance offer'))}}</h2>
            <small class="section-subtitle">Phasellus vel felis in nulla mollis posuere eget rutrum eros</small>

            <div class="row">
                <div class="col-md-3">
                    <div class="offer caption-top">
                        <img src="frontend/dummy/offer-tall.jpg" alt="offer 1">
                        <div class="caption">
                            <h3 class="offer-title">Massa augue</h3>
                            <small>Conubia nostra per inceptos</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="offer caption-bottom">
                                <img src="frontend/dummy/offer-1.jpg" alt="offer 2">
                                <div class="caption">
                                    <h3 class="offer-title">Curabitur vehicula</h3>
                                    <small>Conubia nostra per inceptos</small>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="offer caption-bottom">
                        <img src="frontend/dummy/offer-wide.jpg" alt="offer 3">
                        <div class="caption">
                            <h3 class="offer-title">Vivamus rhoncus porttitor</h3>
                            <small>Conubia nostra per inceptos</small>
                        </div>
                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="offer caption-bottom">
                                <img src="frontend/dummy/offer-2.jpg" alt="offer 2">
                                <div class="caption">
                                    <h3 class="offer-title">Curabitur vehicula</h3>
                                    <small>Conubia nostra per inceptos</small>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="offer caption-bottom">
                                <img src="frontend/dummy/offer-3.jpg" alt="offer 2">
                                <div class="caption">
                                    <h3 class="offer-title">Curabitur vehicula</h3>
                                    <small>Conubia nostra per inceptos</small>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="offer caption-bottom">
                                <img src="frontend/dummy/offer-4.jpg" alt="offer 2">
                                <div class="caption">
                                    <h3 class="offer-title">Curabitur vehicula</h3>
                                    <small>Conubia nostra per inceptos</small>  
                                </div>
                            </div>
                        </div>
                    </div> <!-- .row -->
                </div> <!-- .col-md-8 -->
            </div> <!-- .row -->

        </div> <!-- .container -->
    </div> <!-- .offer-section -->

    <div class="fullwidth-block">
        <div class="container">
            <h2 class="section-title">{{ __('word.'.strtolower('latest news'))}}</h2>
            <div class="row news-list">
                <div class="col-md-4">
                    <div class="news">
                        <figure><img src="frontend/dummy/featured-image-1.jpg" alt=""></figure>
                        <div class="date"><img src="frontend/images/icon-calendar.png" alt="">03/09/2014</div>
                        <h2 class="entry-title"><a href="#">Donec laoreet non nec aliquam pellentesque interdum</a></h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="news">
                        <figure><img src="frontend/dummy/featured-image-2.jpg" alt=""></figure>
                        <div class="date"><img src="frontend/images/icon-calendar.png" alt="">03/09/2014</div>
                        <h2 class="entry-title"><a href="#">Donec laoreet non nec aliquam pellentesque interdum</a></h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="news">
                        <figure><img src="frontend/dummy/featured-image-3.jpg" alt=""></figure>
                        <div class="date"><img src="frontend/images/icon-calendar.png" alt="">03/09/2014</div>
                        <h2 class="entry-title"><a href="#">Donec laoreet non nec aliquam pellentesque interdum</a></h2>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .latest-news-section -->

    <div class="fullwidth-block" data-bg-color="#0f75bd">
        <div class="container">
            <div class="testimonial-slider">
                <ul class="slides">
                    <li>
                        <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam quod explicabo optio quia ex odit, sequi harum voluptatibus autem. Nam autem corporis deleniti fugiat omnis itaque, quis laudantium dolor facere.<cite>John Smith</cite></blockquote>
                    </li>
                    <li>
                        <blockquote>At doloremque, itaque molestias neque nesciunt placeat aspernatur veniam fugit enim, dolor, repudiandae a. Laborum optio dolorum qui maxime doloribus eligendi in enim minima quo? Quis tenetur eos, libero exercitationem.<cite>John Smith</cite></blockquote>
                    </li>
                    <li>
                        <blockquote>Ipsam nesciunt velit voluptatem? Voluptas amet, porro eaque asperiores magni rerum vitae nulla inventore, numquam facilis doloribus placeat iure suscipit adipisci dolores modi saepe deserunt nisi. Nam, illum aperiam velit.<cite>John Smith</cite></blockquote>
                    </li>
                </ul>
            </div>
        </div> <!-- .container -->
    </div> <!-- .fullwidth-block -->

    <div class="fullwidth-block">
        <div class="container">
            <h2 class="section-title">{{ __('word.'.strtolower('Our partners'))}}</h2>

            <div class="partners">
                <a href="#"><img src="frontend/dummy/money-logo.png" alt=""></a>
                <a href="#"><img src="frontend/dummy/nyt-logo.png" alt=""></a>
                <a href="#"><img src="frontend/dummy/forbes-logo.png" alt=""></a>
                <a href="#"><img src="frontend/dummy/wsj-logo.png" alt=""></a>
                <a href="#"><img src="frontend/dummy/bbs-logo.png" alt=""></a>
            </div> <!-- .partners -->
        </div> <!-- .container -->
    </div> <!-- .fullwidth-block -->

    <div class="fullwidth-block">
        <div class="map"></div>
    </div>
</main>
@endsection
