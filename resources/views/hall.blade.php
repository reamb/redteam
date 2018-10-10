@extends('layouts.app')

@section('content')
 
<div class="outer">
  <div class="middle">
    <div class="inner">
								   <div class="divTable">
								<div class="divTableBody">
								<div class="divTableRow">
								<div class="divTableCell"> <img class="logo" src="{{asset('/img/redteam.svg.png')}}" width="90%" height="90%"> </div>
								<div class="divTableCell">
								  
								<table class="tg">
								  <tr>
								 
									<th class="tg-head">HALL OF FAME<br></th>
									 
								  </tr>
									@foreach ($results as $indexKey => $team)
									
									<tr>
										 
										<td class="tg-body">{{ $team->team_name }}</td>
										 
									</tr>

									 
									@endforeach
	

								
							 
								


								</table>


								</div>
								</div>
								</div>
								</div>
								<!-- DivTable.com -->

    </div>
  </div>
</div>










 
 
	
@endsection
