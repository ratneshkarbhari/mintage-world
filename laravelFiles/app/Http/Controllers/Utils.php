<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Media;
use App\Models\Note;
use App\Models\Product;
use App\Models\Stamp;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\DB;

class Utils extends Controller
{


    private function page_loader($viewName, $data)
    {
        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }

    function universal_search()
    {

        if(empty($_GET)){
            return redirect()->to(url("/"));
        }else{

            $query = str_replace("/","",$_GET["q"]);

            $productModel = new Product();

            $searchResults = $productModel
            ->where ( 'name1', 'LIKE', '%' . $query . '%' )
            ->orWhere ( 'dynasty_ruler', 'LIKE', '%' . $query . '%' )
            ->orWhere ( 'keywords', 'LIKE', '%' . $query . '%' )
            ->orWhere ( 'denomination', 'LIKE', '%' . $query . '%' )
            ->orWhere ( 'metal', 'LIKE', '%' . $query . '%' )
            ->orWhere ( 'condition', 'LIKE', '%' . $query . '%' )
            ->orWhere ( 'meta_keywords', 'LIKE', '%' . $query . '%' )
            ->orWhere ( 'dynasty_ruler', 'LIKE', '%' . $query . '%' )
            ->paginate(12)->appends([
                "q" => $query
            ]);

            $total = $searchResults->total();

            $currentPage = $searchResults->currentPage();
            $perPage = $searchResults->perPage();
    
            $from = ($currentPage - 1) * $perPage + 1;
            $to = min($currentPage * $perPage, $total);
    
            $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";
    
            if(!isset($grand_parent_category)){
                $grand_parent_category = NULL;
            }
            
    

            $this->page_loader("universal_search", [
                "title" => "Universal Search",
                "results" => $searchResults,
                "total" => $total,
                "query" => $_GET["q"],
                "pagination_string" => $paginationInfoString
            ]);

        }

    }



    function send_email($to,$toName,$subject,$message){

        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://www.ultrasofttoys.com/public/mintage-email-api/send_email.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS,
        //             "postvar1=value1&postvar2=value2&postvar3=value3");

        // In real life you should use something like:
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
                    http_build_query([
                    'recipient_email' => $to,
                    'recipient_name' => $toName,
                    'subject' => $subject,
                    'message' => $message                    
                ]));

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);


        curl_close($ch);
        
        
        return TRUE;


    }


    function detailed_search(Request $request)  {


        $searchType = $request->product_type;

        $itemTables = [

            1 => "coin",
            2 => "note",
            3 => "stamp",
            4 => "media",
            5 => "products"
   
        ];
        
        $searchTerm = $request->term;

        if(in_array($searchType,[1,2,3])){

            $searchItem = $itemTables[$searchType];
            
            if($searchType==1){

                $coinModel = new Coin();
                $searchItem = $itemTables[$searchType];
            

                $searchResults = $coinModel
                ->whereHas('denomination', function ($query)  use ($searchTerm) {
                    return $query->where('title', 'LIKE', '%' . $searchTerm);
                })                
                ->orWhere ( 'obverse_desc', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'reverse_desc', 'LIKE', '%' . $searchTerm . '%' )

                ->whereHas('metal', function ($query)  use ($searchTerm) {
                    return $query->where('title', 'LIKE', '%' . $searchTerm);
                })               
                

                ->whereHas('shape', function ($query)  use ($searchTerm) {
                    return $query->where('title', 'LIKE', '%' .$searchTerm);
                })               
                

                
                // ->whereHas('dynasty', function ($query)  use ($searchTerm) {
                //     return $query->where('title', 'LIKE', '%' .$searchTerm);
                // })      
                
                // ->orWhere ( 'ruler', 'LIKE', '%' . $searchTerm . '%' )
                // ->orWhere ( 'period', 'LIKE', '%' . $searchTerm . '%' )
                // ->orWhere ( 'country', 'LIKE', '%' . $searchTerm . '%' )
                ->paginate(12)->appends([
                    "term" => $searchTerm,
                    "product_type" => 1
                ]);
    

            }elseif ($searchType==2) {
                
                $noteModel = new Note();
                $searchItem = $itemTables[$searchType];
            

                $searchResults = $noteModel
                ->whereHas('denomination', function ($query)  use ($searchTerm) {
                    return $query->where('title', 'LIKE', '%' . $searchTerm);
                })                
                // ->orWhere ( 'obverse_desc', 'LIKE', '%' . $searchTerm . '%' )
                // ->orWhere ( 'reverse_desc', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'language_panel', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'vignette', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'color', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'signatory', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'underprint', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'meta_title', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'meta_desc', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'meta_key', 'LIKE', '%' . $searchTerm . '%' )


                ->paginate(12)->appends([
                    "term" => $searchTerm,
                    "product_type" => 2
                ]);
    
                
            }elseif ($searchType==3) {
                
                $stampModel = new Stamp();
                $searchItem = $itemTables[$searchType];
            

                $searchResults = $stampModel
                 
                ->where ( 'stamp_name', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'issued_date', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'theme', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'printed_at', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'type', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'color', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'printing_process', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'description', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'meta_title', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'meta_desc', 'LIKE', '%' . $searchTerm . '%' )
                ->orWhere ( 'meta_key', 'LIKE', '%' . $searchTerm . '%' )


                ->paginate(12)->appends([
                    "term" => $searchTerm,
                    "product_type" => 3

                ]);
                
            }

            $templateName = "detail_search.".$searchItem;


        }elseif($searchType==4){

            $mediaModel = new Media();

            

            $searchResults = $mediaModel
            ->where("status",1)
            ->where ( 'title', 'LIKE', '%' . $searchTerm . '%' )
            ->orWhere ( 'description', 'LIKE', '%' . $searchTerm . '%' )
            ->orWhere ( 'custom_url', 'LIKE', '%' . $searchTerm . '%' )
            ->orderBy("id", "desc")
            ->paginate(12)->appends([

                "term" => $searchTerm,
                "product_type" => 4

                
            ]);

            $searchItem = "media";

            $templateName = "detail_search.".$searchItem;

        }elseif ($searchType==5) {

            $productModel = new Product();

            $searchResults = $productModel
            ->where ( 'name1', 'LIKE', '%' . $searchTerm . '%' )
            ->orWhere ( 'dynasty_ruler', 'LIKE', '%' . $searchTerm . '%' )
            ->orWhere ( 'keywords', 'LIKE', '%' . $searchTerm . '%' )
            ->orWhere ( 'denomination', 'LIKE', '%' . $searchTerm . '%' )
            ->orWhere ( 'metal', 'LIKE', '%' . $searchTerm . '%' )
            ->orWhere ( 'condition', 'LIKE', '%' . $searchTerm . '%' )
            ->orWhere ( 'meta_keywords', 'LIKE', '%' . $searchTerm . '%' )
            ->orWhere ( 'dynasty_ruler', 'LIKE', '%' . $searchTerm . '%' )
            ->paginate(12)->appends([
                
                "term" => $searchTerm,
                "product_type" => 5

                
            ]);

            
            $searchItem = "shopping";

            $templateName = "detail_search.".$searchItem;
            
        }

        // dd($searchResults);

        $total = $searchResults->total();

        $currentPage = $searchResults->currentPage();
        $perPage = $searchResults->perPage();

        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        $paginationInfoString = "Showing {$from} to {$to} of {$total} entries";

        if(!isset($grand_parent_category)){
            $grand_parent_category = NULL;
        }


        $this->page_loader($templateName, [
            "type" => "products",
            "title" => "Detailed Search",
            "results" => $searchResults,
            "total" => count($searchResults),
            "search_item" => $searchItem,
            "pagination_string" => $paginationInfoString
        ]);

    }


}
