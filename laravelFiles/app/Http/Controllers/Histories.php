<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\Period;
use App\Models\Country;
use App\Models\Dynasty;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Histories extends Controller
{
    private function page_loader($viewName, $data)
    {
        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }

    function history()
    {

        $periods = Period::where("country_id",1)->where("category_id",1)->get();

        $histories = DB::select('SELECT history.id,dynasty.title, dynasty.image FROM dynasty JOIN history ON dynasty.id = history.dynasty_id JOIN period ON period.id = dynasty.period_id WHERE period.category_id = 1 AND period.country_id = 1 AND period.id=17 AND history.history!="" AND history.download_file!=""');

        $histories = json_decode(json_encode($histories),TRUE);

        $this->page_loader("history", [
            "title" => "History | History of Ancient India | Mintage World",
            "periods" => $periods,
            "histories" => $histories
        ]);

    }


    function history_detail($historyId)
    {

        $history = History::find($historyId);


        $dynasty = Dynasty::find($history["dynasty_id"]);

        $this->page_loader("history_detail", [
            "title" => "History | History of ".$dynasty["title"]." | Mintage World",
            "dynasty" => $dynasty,
            "history" => $history
        ]);
    }
}
