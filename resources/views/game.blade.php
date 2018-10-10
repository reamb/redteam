@extends('layouts.app')

@section('content')

<div class="head"> <div class="column"><img class="logo" src="{{asset('/img/redteam.png')}}" width="100px"  height="100px"> </div>
	<div class="column">  
	  Sup @if(Session::has('teamname'))
			{{ Session::get('teamname') }}
	      @endif 
 ,   	 <a href="{{ url('logout') }}">  [Logout]</a>   </div> 
<div class="column1">    Score	{{ $sum }},  Rank {{ $rank }}   </div>

</div>
	<div  class="error">
		
		<span class="dracula">			
		
		</span>

		<div class="page-ms">
		
			 	<p class="page-msg"> Hack'em all!   <br> targets:  <B> 192.168.8.200- 192.168.8.230</b></p>
	
	@if ($errors->any())
    
        <ul>
            @foreach ($errors->all() as $error)
                <li class="flag-error">{{ $error }}</li>
            @endforeach
        </ul>
   
	@endif


	@if(session()->has('message'))
		 <ul>
			    <li class="flag-msg">{{ session()->get('message') }}</li>
		</ul>
	@endif
		</div>
  
		 <div class="form">
 <div class="body">
                {{ Form::open(array('url' => 'score')) }}
				<?php 
			 
				echo Form::text('flag','',['placeholder'=>'flag here' ,'required']);
			 
	 
				
				?>
				{!! Form::submit( 'Flag', [ 'name' => 'submitbutton'])!!}
 
		 
				
	 			{{ Form::close() }}
        </div>
		</div>
		
		
</div>
	
	
@endsection
