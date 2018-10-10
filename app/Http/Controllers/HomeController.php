<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {		if ($request->session()->exists('login')) {		

return redirect()->route('game');

}else{
        return view('home'); }
   
 }

    public function game(Request $request)
    {
		if ($request->session()->exists('login')) {
	 
		$team_id=$request->session()->get('team_id');
 
        	$query =  DB::table('score_log');
		 
					if( $team_id) $query->where('team_id', $team_id);
		    $rows = $query->get();
			
			 $sum=0;
				foreach( $rows as $score){
						$sum= $sum+$score->challenge_score;

				}     

          $data['sum']=$sum;
		 	
		$results = DB::select( DB::raw("SELECT `team_id`, SUM(`challenge_score`) AS totalScore FROM(SELECT team_id, challenge_score FROM score_log m WHERE(SELECT COUNT(*) FROM score_log mT WHERE mT.team_id = m.team_id AND mT.challenge_score >= m.challenge_score) <= 3) tmp GROUP BY team_id order by totalScore desc") );

		
		$rank_numb=0;
		$tmp=0;
		foreach($results as $rank){
		$tmp=$tmp+1;
		  if ($rank->team_id==$team_id){
			$rank_numb=$rank_numb+$tmp;
		}
			
			
		}
		 
		$data['rank']=$rank_numb;
		return view('game',$data); 


	 

		
		} else {
				return redirect()->route('home');
		}
		
    }
}
