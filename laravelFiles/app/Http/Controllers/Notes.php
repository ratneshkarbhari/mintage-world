<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Period;
use App\Models\Country;
use App\Models\Dynasty;
use Illuminate\Support\Str;
use App\Models\Denomination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use PhpParser\Node\Stmt\Echo_;

class Notes extends Controller
{

    private function page_loader($viewName, $data)
    {

        echo view("components.header", $data);
        echo view("pages." . $viewName, $data);
        echo view("components.footer", $data);
    }

    function get_all_data() {
        
        $allNotes = Note::orderBy("id","desc")->get();

        $allNotes = json_encode(["data"=>$allNotes], JSON_INVALID_UTF8_IGNORE);

        echo $allNotes;

    }

    function create(Request $request) {


        $uploadPath = './assets/images/note/';

        if($request->hasFile("obverse_image")){

            $obverseImageFile = $request->file("obverse_image");

            $obverseImageName = $obverseImageFile->getClientOriginalName();

            $s3 = new AwsS3();


            $obverseImageFile->move($uploadPath,$obverseImageName);

            if (!is_file(getenv("NOTE_BASE_URL").$obverseImageName)) {

                $obverseImageNameS3Path = "note/list/".$obverseImageName;
                
                $s3->upload($obverseImageNameS3Path,$uploadPath.$obverseImageName,"mintage2","us-east-1");
                
            }


        }else{
            $obverseImageName = "noimage.jpg";
        }

        if($request->hasFile("reverse_image")){

            $reverseImageFile = $request->file("reverse_image");

            $reverseImageName = $reverseImageFile->getClientOriginalName();

            $s3 = new AwsS3();


            $reverseImageFile->move($uploadPath,$reverseImageName);

            if (!is_file(getenv("NOTE_BASE_URL").$reverseImageName)) {

                $reverseImageNameS3Path = "note/list/".$reverseImageName;
                
                $s3->upload($reverseImageNameS3Path,$uploadPath.$reverseImageName,"mintage2","us-east-1");
                
            }


        }else{
            $reverseImageName = "noimage.jpg";
        }
    
        $data = [
            'denomination_id' => $request->denomination,
            'rarity_id'  => $request->rarity,
            'shape_id'  => $request->shape,
            'dynasty_id' => $request->dynasty ,
            'obverse_image'  => $obverseImageName,
            'reverse_image'  => $reverseImageName,
            'catalogue_ref_no'  => $request->catalogue_ref_no,
            'vignette'  => $request->vignette,
            'signatory'  => $request->signatory,
            'inset'  => $request->inset,
            'underprint'  => $request->underprint,
            'paper_type'  => $request->paper_type,
            'prefix'  => $request->prefix,
            'language_panel'  => $request->language_panel,
            'color'  => $request->color,
            'currency_type'  => $request->currency_type,
            'remark'  => $request->remark,
            'size'  => $request->size,
            'obverse_description'  => $request->obverse_description,
            'reverse_description'  => $request->reverse_description,
            'issued_year'  => $request->issued_year,
            'note'  => $request->note,
            'theme'  => $request->theme,
            'watermark'  => $request->watermark,
            'denomination_unit'  => $request->denomination_unit,
            'status'  => '0',
            'modified' => date('Y-m-d H:i:s'),
        ];


        $noteModel = new Note();


        if($noteModel->insert($data)){


            return [
                "result" => "success",
                
            ];
            

        }else{

            return [
                "result" => "failure",
                "message"=> "Note create failed"
            ];

        }


    }

    function note_countries()
    {



        if (!Cache::get('note_countries')) {

            $countryModel = new Country();


            $data = $countryModel->where("category_id", 2)->get();

            Cache::put('note_countries', $data);
        }

        $data = Cache::get("note_countries");

        $footer_content = "<h1> Different Currencies of the World Countries</h1>
                         <p>Mintage World is a unique online portal where you can access information about world currency in a very systematic manner. Different currencies of the world are classified on the website based on country name at the first level. World banknotes are further classified based on various time periods and governing bodies. You won't find many websites where you can deeply research about rare banknotes of the world, category-wise. Researchers, students and notaphilists can make the most of this wonderful online platform to increase their knowledge base. The best part is that the website is extremely user-friendly. Navigation through the website is extremely smooth. All you have to do is apply the required filters and narrow-down your search based on what information you are looking for!</p><p>By closely studying world paper money, one can learn about various interesting historical and economical aspects of a particular country. Many of these rare world banknotes are sold by auction houses for impressive amounts. Apart from knowledge, the hobby can also become a new source of income. But the most important requirement for pursuing this hobby is research. Without having sound knowledge for various kinds of world banknotes, you won't be able to build a good collection. Apart from that, without research you wouldn't be able to analyse the market value of banknotes of the world.</p><p>The moment you add interesting banknotes from around the world to your collection, you can look up on Mintage World to find relevant information. Apart from high resolution images, we also offer detailed obverse and reverse descriptions for your perusal. Other important information like security features, date of issue, etc is also mentioned. </p><p>The website is simply perfect for someone who loves collecting different currencies of the world! So what are you waiting for? Start building your collection right away!</p>";


        $this->page_loader("countries_notes", [
            "title" => "Notes From Around the World, now at Your Fingertips",
            "info_title" => "Notes",
            "countries" => $data,
            "breadCrumbData" => [
                [
                    // "slug" => "notes/",
                    "label" => "Notes"
                ]
                
            ],
            "url_prefix" => "note/",
            "image_base_url" => getenv("COUNTRY_FLAG_IMAGE_BASE_URL"),
            "footer_content" => $footer_content
        ]);
    }

    function note_country_periods($slug){

        
        $slugParts = explode("-",$slug);

        $countryId = $slugParts[0];

        $countryName = ucfirst($slugParts[1]);

        if(!Cache::get('note-'.$slugParts[1].'-periods')){

            $periodModel = new Period();

            $periods = $periodModel->where("country_id",$countryId)->where("category_id",2)->orderBy("order_by","asc")->get();


            Cache::put('note-'.$slugParts[1].'-periods',$periods);

        }

        $periods = Cache::get('note-'.$slugParts[1].'-periods');

        $country = Country::find($countryId);

        $this->page_loader("periods_notes",[
            "title" => "Notes of ".$countryName,
            "info_title" => "Periods : ".$countryName,
            "periods" => $periods,
            "breadCrumbData" => [
                [
                    "slug" => "notes/",
                    "label" => "Notes"
                ],
                [
                    "label" => $country["name"]
                ]
                
            ],
            "url_prefix" => "note/dynasty/",
            "image_base_url" => getenv("PERIOD_IMAGE_BASE_URL"),
            "parent" => $country,
            "footer_content" =>$country["footer_content"]
        ]);

    }


    function note_dynasties($periodId){

        if(!Cache::get('note-dynasties-'.$periodId)){

            $dynastyModel = new Dynasty();

            $dynasties = $dynastyModel->where("period_id",$periodId)->get();


            Cache::put('note-dynasties-'.$periodId,$dynasties);

        }

        $dynasties = Cache::get('note-dynasties-'.$periodId);

        $period = Period::find($periodId);

        $country = Country::find($period["country_id"]);

        $this->page_loader("dynasties_notes",[
            "title" => $period["title"]." notes | notes of ".$period["title"]." ".$country["name"]." | ".$period["title"]." Period notes | Mintage World",
            "info_title" => "Dynasties : ".$period["title"],
            "dynasties" => $dynasties,
            "breadCrumbData" => [
                [
                    "slug" => "notes/",
                    "label" => "Notes"
                ],
                [
                    "slug" => "note/".$country["id"]."-".Str::slug($country["name"]),
                    "label" => $country["name"]
                ],

                [
                    "label" => $period["title"]
                ]
                
            ],
            "footer_content" =>$period["footer_content"]
        ]);


    }

    function note_denominations($dynastyId){

        $dynastyIdParts = explode("-",$dynastyId);

        $dynastyId = $dynastyIdParts[0];

        if(!Cache::get('note-denominations-'.$dynastyId)){

                
            $denominationQuery = 'SELECT note.denomination_unit as unit,denomination.id,note.obverse_image, note.denomination_unit, denomination.title FROM note JOIN dynasty dy ON note.dynasty_id=dy.id JOIN denomination on denomination.id = note.denomination_id WHERE note.dynasty_id = '.$dynastyId.' GROUP BY note.denomination_unit';

            $denominations = DB::select($denominationQuery);

            $denominations = json_decode(json_encode($denominations),TRUE);


            Cache::put('note-denominations-'.$dynastyId,$denominations);

        }

        $dynasty = Dynasty::find($dynastyId);

        $denominations = Cache::get('note-denominations-'.$dynastyId);

        $period = Period::find($dynasty["period_id"]);

        $country = Country::find($period["country_id"]);

        $siblingDynasties = Dynasty::where("period_id",$dynasty["period_id"])->get();


        


        $this->page_loader("denominations_notes",[      
            "title" => $period["title"]." notes | notes of ".$period["title"]." ".$country["name"]." | ".$period["title"]." Period notes | Mintage World",
            "info_title" => "Denominations : ".$period["title"],
            "denominations" => $denominations,
            "dynasty" => $dynasty,
            "sibling_dyanasties" => $siblingDynasties,
            "breadCrumbData" => [
                [
                    "slug" => "notes/",
                    "label" => "Notes"
                ],
                [
                    "slug" => "note/".$country["id"]."-".strtolower($country["name"]),
                    "label" => $country["name"]
                ],

                [
                    "slug" => "note/dynasty/".$period["id"]."-".Str::slug($period["title"]),
                    "label" => $period["title"]
                ]
                ,[
                    "label" => $dynasty["title"]
                ]
            ],
            "footer_content" =>$period["footer_content"]
        ]);

    }

    function note_list($dynastyId,$denominationUnit){



        // echo $dynastyId.",".$denominationUnit;

        $denominationUnitParts = explode("-",$denominationUnit);

        $denominationUnit = $denominationUnitParts[0];

        if(!Cache::get('notes-'.$denominationUnit."-".$dynastyId)){

            $query = 'SELECT note.denomination_id, note.id, note.obverse_image, note.reverse_image, note.denomination_unit, denomination.title as denomination_title , note.issued_year, note.catalogue_ref_no, note.size, note.signatory, note.color, note.prefix, note.inset, dynasty.title, denomination.title, shape.title 
            FROM note 
            JOIN dynasty ON note.dynasty_id = dynasty.id 
            JOIN denomination ON note.denomination_id = denomination.id JOIN shape ON note.shape_id = shape.id WHERE note.denomination_unit = '.$denominationUnit.' AND note.dynasty_id = '.$dynastyId;
            
            $notes = DB::select($query);

            $notes = json_decode(json_encode($notes),TRUE);


            Cache::put('notes-'.$denominationUnit."-".$dynastyId,$notes);

        }



        $notes = Cache::get('notes-'.$denominationUnit."-".$dynastyId);

        $denominationUnit = $notes[0]["denomination_unit"];

        $denominationId = $notes[0]["denomination_id"];

        $dynasty = Dynasty::find($dynastyId);

        $period = Period::find($dynasty["period_id"]);

        $country = Country::find($period["country_id"]);

        $denomination = Denomination::find($denominationId);
        $governors = $issuedYears = [];


        foreach($notes as $note){

            $governors[] = $note["signatory"];
            $issuedYears[]  = $note["issued_year"];

        }

        $this->page_loader("note_list",[
            "title" => $denominationUnit." ".$denomination["title"],
            "info_title" => "Notes : ".$denominationUnit." ".$denomination["title"],
            "dynasty" => $dynasty,
            "notes" => json_decode(json_encode($notes),TRUE),
            "dynastyRulers" => [],
            "governors" => array_unique($governors),
            "issued_years" => array_unique($issuedYears),
            "breadCrumbData" => [
                [
                    "slug" => "notes/",
                    "label" => "Notes"
                ],
                [
                    "slug" => "note/".$country["id"]."-".Str::slug($country["name"]),
                    "label" => $country["name"]
                ],

                [
                    "slug" => "note/dynasty/".$period["id"]."-".Str::slug($period["title"]),
                    "label" => $period["title"]
                ]
                ,[
                    "slug" => "note/note/".$dynasty["id"]."-".Str::slug($dynasty["title"]),
                    "label" => $dynasty["title"]
                ],
                [
                    "label" => $denominationUnit." ".$denomination["title"]
                ]
            ],
            
            "footer_content" => ""
        ]);


    }


    function note_detail($noteId){

        if(!Cache::get('note-'.$noteId)){

            $note = Note::find($noteId);

            Cache::put('note-'.$noteId,$note);
            
        }

        $noteModel = new Note();

        $note = $noteModel->with("denomination")->with("feedback.member")->find($noteId);


        $denomination = Denomination::find($note["denomination_id"]);

        $dynasty = Dynasty::find($note["dynasty_id"]);

        $period = Period::find($dynasty["period_id"]);

        $country = Country::find($period["country_id"]);

        $more_notes = Note::where("dynasty_id",$dynasty["id"])->where("denomination_unit",$note["denomination_unit"])->get();

        if($note["issued_year"]==""){
            $note["issued_year"] = $note["catalogue_ref_no"];
        }


        $feedback_entries = [];

        foreach($note['feedback'] as $feedback){
            if($feedback['status']==1){
                $feedback_entries[] = $feedback;
            }
        }
        

        $this->page_loader("note_detail",[
            "title" => $note["catalogue_ref_no"],
            "note" => $note,
            "feedback_entries" => $feedback_entries,
            "denomination" => $denomination,
            "dynasty" => $dynasty,
            "more_notes" => $more_notes,
            "breadCrumbData" => [
                [
                    "slug" => "notes/",
                    "label" => "Notes"
                ],
                [
                    "slug" => "note/".$country["id"]."-".Str::slug($country["name"]),
                    "label" => $country["name"]
                ],

                [
                    "slug" => "note/dynasty/".$period["id"]."-".Str::slug($period["title"]),
                    "label" => $period["title"]
                ]
                ,[
                    "slug" => "note/note/".$dynasty["id"]."-".Str::slug($dynasty["title"]),
                    "label" => $dynasty["title"]
                ],
                [
                    "label" => $note["denomination_unit"]." ".$denomination["title"],
                    "slug"=> "note/list/".$dynasty["id"]."/".$note["denomination_unit"]."-".strtolower($note["denomination"]["title"])
                ],
                [
                    "label" => $note["issued_year"]
                ]
            ],
            "footer_content" => ""
        ]);




    }

    function note_info_filter_exe(Request $request){

        $governors = $request->governors;
        $issuedYears = $request->issuedYears;
        $denominationUnit = $request->denomination_unit;

        $hasFilterParams = FALSE;

        

        $dynastyId = $request->dynasty_id;

        
        $query = 'SELECT note.obverse_image,note.id,denomination.title , note.issued_year
        FROM note JOIN denomination ON note.denomination_id = denomination.id   JOIN shape ON note.shape_id = shape.id WHERE 1';




        if(!empty($governors)){

            $hasFilterParams = TRUE;

            $governorString = "'".implode("','", $governors)."'";


            $query.=' AND note.signatory IN ('.$governorString.')';

        }



        if(!empty($issuedYears)){
            $hasFilterParams = TRUE;
            $query.=' AND note.issued_year IN ('.implode(",",$issuedYears).')';
        }



        if($hasFilterParams){

    
            $notes = json_decode(json_encode(DB::select($query)),TRUE);

        }else {

            if (!Cache::get('notes-'.$dynastyId)) {


                $query = 'SELECT note.denomination_id, note.id, note.obverse_image, note.reverse_image, note.denomination_unit, denomination.title, note.issued_year as denomination_title , note.issued_year, note.catalogue_ref_no, note.size, note.signatory, note.color, note.prefix, note.inset, dynasty.title, denomination.title, shape.title 
                FROM note 
                JOIN dynasty ON note.dynasty_id = dynasty.id 
                JOIN denomination ON note.denomination_id = denomination.id JOIN shape ON note.shape_id = shape.id WHERE note.denomination_unit = '.$denominationUnit.' AND note.dynasty_id = '.$dynastyId;
                

                $notes = DB::select($query);

            
    
                $notes = json_decode(json_encode($notes),TRUE);
    
        
    
                Cache::put('notes-'.$dynastyId,$notes);    
                
            }


            $notes = Cache::get("notes-".$dynastyId);


        }


        $noteHtml = '';

        if (count($notes)>0) {
            
            foreach($notes as $note){

                if($note["obverse_image"]!=""){

                    $noteHtml.='<div class="col-lg-3 col-md-6 col-sm-12 info-item-grid-outer-box"><a href="'.url("note/detail/".$note["id"]).'">
                    <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="'.getenv("NOTE_BASE_URL").$note["obverse_image"].'" alt="Medieval"><div class="info-meta text-center"><h2 class="info-item-grid-title">'.$note["title"].'</h2><span>'.$note["issued_year"].'</span></div></div>
                    </a></div>';

                }else{

                    $noteHtml.='<div class="col-lg-3 col-md-6 col-sm-12 info-item-grid-outer-box"><a href="'.url("note/detail/".$note["id"]).'">
                    <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="'.getenv("API_DEFAULT_IMG_PATH").'" alt="Medieval"><div class="info-meta text-center"><h2 class="info-item-grid-title">'.$note["title"].'</h2><span>'.$note["issued_year"].'</span></div></div>
                    </a></div>';

                }
    
            }
            
        } else {
            
            $noteHtml = '<h4>No such note found for these filters</h4>';
            
        }
        

        return $noteHtml;
        
    }

    function update(Request $request){

        $noteId = $request->id;

        if ($noteToEdit = Note::find($noteId)) {
            
            $uploadPath = './assets/images/note/';


            if($request->hasFile("obverse_image")){

                $obverseImageFile = $request->file("obverse_image");

                $obverseImageName = $obverseImageFile->getClientOriginalName();

                $s3 = new AwsS3();


                $obverseImageFile->move($uploadPath,$obverseImageName);

                if (!is_file(getenv("NOTE_BASE_URL").$obverseImageName)) {
                    
                    $imgName =  "note/list/".$obverseImageName;


                    $s3->upload($imgName,$uploadPath.$obverseImageName,"mintage2","us-east-1");
                    
                }else{

                    $obverseImageName = "noimage.jpg";

                }


            }else{
                $obverseImageName = $noteToEdit["obverse_image"];
            }

            if($request->hasFile("reverse_image")){

                $reverseImageFile = $request->file("reverse_image");

                $reverseImageName = $reverseImageFile->getClientOriginalName();

                $s3 = new AwsS3();


                $reverseImageFile->move($uploadPath,$reverseImageName);

                if (!is_file(getenv("NOTE_BASE_URL").$reverseImageName)) {

                    $imgName =  "note/list/".$reverseImageName;
                    
                    $s3->upload($imgName,$uploadPath.$reverseImageName,"mintage2","us-east-1");
                    
                }else{

                    $reverseImageName = "noimage.jpg";

                }


            }else{
                $reverseImageName = $noteToEdit["reverse_image"];
            }
            

            $objectToUpdate = [

                	
                "denomination_id"=>$request->denomination_id,	
                "dynasty_id"=>$request->dynasty_id,
                "shape_id"=>$request->shape_id,
                "rarity_id"=>$request->rarity_id,
                "inset"=>$request->inset,
                "currency_type"=>$request->currency_type,
                "obverse_image"=>$obverseImageName,
                "reverse_image"=>$reverseImageName,
                "catalogue_ref_no"=>$request->catalogue_ref_no,
                "language_panel"=>$request->language_panel,
                "paper_type"=>$request->paper_type,
                "remark"=>$request->remark,
                "size"=>$request->size,
                "obverse_description"=>$request->obverse_desc,
                "reverse_description"=>$request->reverse_desc,
                "vignette"=>$request->vignette,
                "color"=>$request->color,
                "denomination_unit"=>$request->denomination_unit,
                "signatory"=>$request->signatory,
                "prefix"=>$request->prefix,
                "issued_year"=>$request->issued_year,                "underprint"=>$request->underprint,
                "note"=>$request->note,
                "text"=>$request->text,
                "theme"=>$request->theme,
                "watermark"=>$request->watermark,
                "status"=>$request->status,
                "created"=>$request->created,
                "modified"=>$request->modified,
                "sort_by"=>$request->sort_by,
                "meta_title"=>$request->meta_title,
                "meta_desc"=>$request->meta_desc,
                "meta_key"=>$request->meta_key,
                // "footer_content" => $request->footer_content

            ];

            // echo(json_encode($objectToUpdate));

            if ($noteToEdit->update($objectToUpdate)) {
                
                return [
                    "result" => "success",
                    "message" => "Note updated"
                ];
                
            } else {
                
                return [
                    "result" => "failure",
                    "message" => "Note update failed"
                ];
                
            }
            

            
        } else {
            return [
                "result" => "failure",
                "message" => "Note not found"
            ];
        }
        

    }


}
