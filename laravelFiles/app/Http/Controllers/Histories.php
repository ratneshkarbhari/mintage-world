<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Histories extends Controller
{
    private function page_loader($viewName,$data){
        echo view("components.header",$data);
        echo view("pages.".$viewName,$data);
        echo view("components.footer",$data);
    }

    function history(){


        $this->page_loader("history",[
            "title" => "History | History of Ancient India | Mintage World"
        ]);
        
    }

    

}
