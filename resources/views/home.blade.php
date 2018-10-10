@extends('layouts.app')

@section('content')

	<div  class="error">
		
		<span class="dracula">			
		
		</span>
	 
		
		<div class="page-ms">
			<p class="page-msg"> <img class="logo" src="{{asset('/img/redteam.png')}}" width="300px"  height="300px"></p>
			 	<p class="page-msg"> Let the games begin</p>
	
	@if ($errors->any())
    
        <ul>
            @foreach ($errors->all() as $error)
                <li class="page-msg">{{ $error }}</li>
            @endforeach
        </ul>
   
	@endif
		</div>
  
		 <div class="form">
 <div class="body">
                {{ Form::open(array('url' => 'submit')) }}
				<?php 
			 
				echo Form::text('teamname','',['placeholder'=>'Username' ,'required']);
			 
				echo Form::password('password',['placeholder'=>'Password','required']);
				
				?>
				{!! Form::submit( 'Login', [ 'name' => 'submitbutton'])!!}
 
				{!! Form::submit( 'Register', ['name' => 'submitbutton']) !!}
				
	 			{{ Form::close() }}
        </div>
		</div>
		
		
</div>
	
	
@endsection
