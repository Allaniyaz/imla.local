<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;
use App\Models\Word;
use App\Models\Tusindirme;


class HomepageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function check(Request $request)
    {
        $request->validate([
            'text' => 'required|string'
        ]);

		$text = $request->text;
		$cols = explode("\n", $text);
        
		foreach($cols as $c) 
		{
			$str = $c;
			$original = $str;
			
			$str = explode(" ", $str);

			$sum_arr = [];
			for($i=0; $i<count($str); $i++) 
			{
				$response = $deleted = "";

				if($str[$i] != "")
				{
					$word = $str[$i];
					$word_sum = $this->calc_sum($word);
					$equal_str = Word::where('title', mb_strtolower($word))->where('checksum', $word_sum)->get();


					if($equal_str->count() > 0) {

						$response .= "<span style='color: green;'>{$str[$i]}</span> ";

					} else {

						$word = preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);
						while(!empty($word))
						{
							$deleted .= array_pop($word);
							$x = implode("", $word);
							$x_sum = $this->calc_sum($x);
							$exist_w = Word::where('title', mb_strtolower($x))->where('checksum', $x_sum)->get();

							if($exist_w->count() > 0) {
								$response .= "<span style='color: green;'>{$x}</span>";
								break;
							}
						}
						$del = preg_split('//u', $deleted, null, PREG_SPLIT_NO_EMPTY); // string to array of strings with 1 symbols
						$del = array_reverse($del); /// reversing array
						$response .= "<span style='color: red;'>".implode("", $del)."</span> ";
					}
					echo $response;
				}
			}
			echo "<br>";
		}
    }

	public function explanation(Request $request)
	{
		$request->validate([
            'word' => 'required|string'
        ]);

		$word = $request->word;

		$data = Tusindirme::where('word', mb_strtolower($word))->/* where('checksum', $this->calc_sum($word))-> */first();

		if($data) {
			echo $data->meaning;
		} else {
			echo "Кеширесиз, сиз излеген сөз базада табылмады.";
		} 
	}

    public function calc_sum($word) 
    {
		$letters = Letter::all()->toArray();
        
		$word = preg_split('//u', mb_strtolower($word), null, PREG_SPLIT_NO_EMPTY);
		$sum_word = 0;	

		$read = 0;
        
        $start = microtime();
        for($k = 0; $k < count($word); $k++) 
		{
			if($word[$k] == 'í') $word[$k] = 'ı';
			for($j=$read; $j<count($letters); $j++) {
				if($word[$k] == $letters[$j]['title']) {
					$sum_word += intval($letters[$j]['checksum']);
					break;
				}
			}
		}

        return $sum_word;
    }
}
