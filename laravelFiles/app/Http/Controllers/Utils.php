<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Note;
use App\Models\Stamp;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\DB;

class Utils extends Controller
{

    public function universal_search() {
        
        $searchQuery = $_GET["q"];

        $coinModel = new Coin();
        $noteModel = new Note();
        $stampModel = new Stamp();


        $coinQuery = 'SELECT denomination.title, coin.obverse_image, coin.id FROM `coin` JOIN denomination ON denomination.id = coin.denomination_id JOIN ruler ON coin.ruler_id = ruler.id JOIN dynasty on ruler.dynasty_id = dynasty.id JOIN period ON dynasty.period_id = period.id  WHERE denomination.title LIKE "%'.$searchQuery.'%" OR coin.obverse_desc LIKE "%'.$searchQuery.'%"  OR coin.reverse_desc LIKE "%'.$searchQuery.'%" OR dynasty.title LIKE "%'.$searchQuery.'%" OR period.title LIKE "%'.$searchQuery.'%"';        
        
        $coins = DB::select($coinQuery);

        $coins = json_decode(json_encode($coins),TRUE);
        

        echo $noteQuery = 'SELECT note.id, note.obverse_image, denomination.title FROM `note` JOIN denomination ON denomination.id = note.denomination_id WHERE note.obverse_description LIKE "%'.$searchQuery.'%" AND denomination.title LIKE "%'.$searchQuery.'%" AND note.reverse_description LIKE "%'.$searchQuery.'%"'; 
        
    }

}
