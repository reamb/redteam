<?php
namespace App\Http\Controllers;

 
use Auth;
use Carbon\Carbon;
use App\Teams; 
use DB;
use App\Mail\SentActivatoin;
use App\Mail\SentVerification;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class databaseController extends Controller
{	
 
	public function logout(Request $request)
    {
	
	if ($request->session()->exists('login')) {
			$request->session()->forget('login');	
			$request->session()->forget('teamname');	
			$request->session()->forget('team_id');	
			return redirect()->route('home');
	} else {return redirect()->route('home');}
}


	public function hall()
    { 
		$results = DB::select( DB::raw("SELECT  teams.teamname as team_name,`team_id`, SUM(`challenge_score`) AS totalScore FROM(SELECT team_id, challenge_score FROM score_log m WHERE(SELECT COUNT(*) FROM score_log mT WHERE mT.team_id = m.team_id AND mT.challenge_score >= m.challenge_score) <= 3) tmp, teams where tmp.team_id=teams.id GROUP BY team_id order by totalScore desc limit 10") );
		$data=$results;
		return view('hall')->with('results',$results); 
	 
}


	public function score(Request $request)
    {
	
	if ($request->session()->exists('login')) {
			 
		$data = $request->validate([
 
					'flag' => 'required',
					 
				
					],
					[	
						'teamname.unique' => 'Team name already registered.',
					]);

			$teamname=$request->session()->get('teamname');

			$query =  DB::table('teams');
			 

		 
			if( $teamname) $query->where('teamname', $teamname);
 
			$rows = $query->get();
		     
            $team_id=$rows[0]->id;
			//dd($team_id);
			$request->session()->put('team_id', $team_id);
		    
			$query =  DB::table('flags');
		 
			if( $request->flag) $query->where('flag',  $request->flag);
 
			$rows1 = $query->get();	
			
		
	       
			if(count($rows1)==0) {

			return Redirect::back()->withErrors(['Incorrect flag.']);

			} else {
					$challenge_id=$rows1[0]->id;
					$challenge_score=$rows1[0]->score;
					$query =  DB::table('score_log');
		 
					if( $request->flag) $query->where('team_id', $team_id);
					if( $request->flag) $query->where('challenge_id',$challenge_id);
					
					$rows = $query->get();	
					if(count($rows)==0){
					 
						DB::table('score_log')->insert(
								 array(
										'team_id'     =>  $team_id, 
										'challenge_id'   =>   $challenge_id,
										'score_date' =>  Carbon::now('Asia/Ulaanbaatar'),
										'challenge_score' =>  $challenge_score
								 )
							);

					return Redirect::back()->with('message', 'Congratz! you found the flag.');
					}else{
					return Redirect::back()->withErrors(['you already submitted this flag.']);
						};

			}


}





}



    public function store(Request $request)
    {
		if ($request->session()->exists('login')) {
			return redirect()->route('game');
		}

	switch($request->submitbutton) {

    case 'Register': 
	    $data = $request->validate([
 
	    'teamname' => 'required|unique:teams|max:255',
		'password' => 'required'
 	
		],
		[	
			'teamname.unique' => 'Team name already registered.',
		]);

        //storing data in database
        $team = new Teams;
	  
        $team->teamname = $request->teamname;
        $team->password = $request->password;
 
        if ($team -> save()) {	$request->session()->put('login', true); 
		$request->session()->put('teamname', $request->teamname);}

		$query =  DB::table('teams');
		if( $request->teamname) $query->where('teamname', $request->teamname);

		$rows = $query->get();
		 
		$team_id=$rows[0]->id;
		
		
		$request->session()->put('team_id', $team_id);
		

			return redirect()->route('game');
    break;

    case 'Login': 
        
		 $data = $request->validate([
 
	    'teamname' => 'required|max:255',
		'password' => 'required'
 	
		],
		[	 'username.unique' => 'Team name already registered.',
 			
		]);
			$userdata = array(
					'email' => $request->teamname ,
					'password' => $request->password
				);
	
			$query =  DB::table('teams');
			 

		 
			if( $request->teamname) $query->where('teamname', $request->teamname);

			// Conditionally add another where
			if($request->password) $query->where('password', $request->password);

			$rows = $query->get();
			if (count($rows) == 1) {
		 
			$request->session()->put('login', true);
			$request->session()->put('teamname', $request->teamname);
		 	 
			$query =  DB::table('teams');
			 

		 
			if( $request->teamname) $query->where('teamname', $request->teamname);
 
			$rows = $query->get();
		     
            $team_id=$rows[0]->id;
			
			
			$request->session()->put('team_id', $team_id);
			
			return redirect()->route('game');
	 
			
			}else{

			return Redirect::back()->withErrors(['Invalid username or password.']);
	
			}
		
		
    break;
}

echo $request->submitbutton;
       	
 
 
 
    }


}
