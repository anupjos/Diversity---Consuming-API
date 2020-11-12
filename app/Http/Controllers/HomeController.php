<?php

namespace App\Http\Controllers;

use PDF;
use Redirect;
use \Datetime;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	private $fullName = ['Leonardo' => 'Leonardo Wilhelm DiCaprio',
			'Beyonce' => 'Beyoncé Giselle Knowles-Carter',
			'Tom'	  => 'Thomas Jeffrey Hanks'
	];

	private $description = [
		'Leonardo' => 'Leonardo Wilhelm DiCaprio is an American actor, producer, political activist, philanthropist and environmentalist. He has often played unconventional roles, particularly in biopics and period films. As of 2019, his films have grossed US$7.2 billion worldwide, and he has placed eight times in annual rankings of the highest-paid actors in the world.',
		'Beyonce' => 'Beyoncé Giselle Knowles-Carter is an American singer and actress. Her contributions to music, dance, and fashion have established her as one of the most influential artists in the history of popular music. Born and raised in Houston, Texas, Beyoncé performed in various singing and dancing competitions as a child.',
		'Tom'	  => 'Thomas Jeffrey Hanks is an American actor and filmmaker. Known for both his comedic and dramatic roles, Hanks is one of the most popular and recognizable film stars worldwide, and is regarded as an American cultural icon.Hanks\'s films have grossed more than $4.9 billion in North America and more than $9.96 billion worldwide, making him the fourth-highest-grossing actor in North America.'
	];

	//get the details of the selected personnel
    public function getDetail($name){
    	if($name){
    		$description = $this->description[$name];
    	}
    	return view('detail', compact('name','description'));
    }

    // Get the results
    public function getResults($name){
    	$result = [];
    	if($name){
    		try {
    			$client = new Client();
    			//Call DiversityAPI to get the results (https://diversitydata.io/?ref=public-apis)
				$urlString = 'https://api.diversitydata.io/?fullname=' . urlencode($this->fullName[$name]);
				$res = $client->request('GET', $urlString);
				if ($res->getStatusCode() == 200) { // OK
			        $result = json_decode($res->getBody()->getContents(),true);
	    		}
			} 
			catch (\Exception $e) {
				return $e->getMessage();
			}
    	}
    	return view('results', compact('name','result'));
    }

    // Generate the PDFs
    public function generatePDF($name) {
      	if($name){
      		try{
      			$client = new Client();
    			//Call DiversityAPI to get the results (https://diversitydata.io/?ref=public-apis)
				$urlString = 'https://api.diversitydata.io/?fullname=' . urlencode($this->fullName[$name]);
				$res = $client->request('GET', $urlString);
				if ($res->getStatusCode() == 200) { // OK
			        $result = json_decode($res->getBody()->getContents(),true);
				    view()->share('result',$result);
				    $pdf = PDF::loadView('pdfView');
				   	$path = public_path('files');
				   	$now = new DateTime(); 
    				$fileName = 'result-'.$now->getTimestamp().'.pdf';
				    $pdf->save($path . '/'.$fileName);//save into public folder

				    return $pdf->download($fileName);
	    		}
      		}
    		catch (\Exception $e) {
				return $e->getMessage();
			}	
      	}
    }
}
