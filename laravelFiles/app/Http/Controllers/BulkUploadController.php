<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BulkUploadController extends Controller
{
    
    function bulk_upload_data(Request $request) {

        // File access and extraction

        if($request->hasFile("datafile")){
            
            $dataFile = $request->file("datafile");

            $bulkUploadFileName = $dataFile->getClientOriginalName();

            $dataFile->move("./assets/bulkupload_files",$bulkUploadFileName);

            $path = "./assets/bulkupload_files/".$bulkUploadFileName;

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
    
            $allData = $spreadsheet->getActiveSheet()->toArray();

            unset($allData[0]);

        }else{
            return [
                "result" => "failure",
                "message" => "File not uploaded"
            ];
        }

        // Flow separation by category type

        if($request->product_type=="1"){

            $chunks = array_chunk($allData,200);

            foreach($chunks as $chunk){


                foreach($chunk as $coinDataCsv){

                    $obverseImageName = $reverseImageName=  "";

                    $objectToCreate = [];
                    
                    $singleCoinEntity = [
                        'denomination_id' => $request->denomination_title,
                        'ruler_id' => $request->ruler,
                        'metal_id'  => $request->metal,
                        'minting_technique_id'  => $request->minting_technique,
                        'rarity_id'  => $request->rarity,
                        'calender_system_id'  => $request->calender_system,
                        'shape_id'  => $request->shape,
                        'obverse_image'  => $obverseImageName,
                        'reverse_image'  => $reverseImageName,
                        'catalogue_ref_no'  => $request->catalogue_ref_no,
                        'mintage'  => $request->mintage,
                        'remark'  => $request->remark,
                        'size'  => $request->size,
                        'obverse_desc'  => $request->obverse_desc,
                        'reverse_desc'  => $request->reverse_desc,
                        'denomination_unit'  => $request->denomination_unit,
                        'type'  => $request->type,
                        'ry'  => $request->ry,
                        'ulc_no'  => $request->ulc_no,
                        'issued_year'  => $request->issued_year,
                        'mint'  => $request->mint,
                        'note'  => $request->note,
                        'weight'  => $request->weight,
                        'theme'  => $request->theme,
                        'status'  => '0',
                        'created' => date('Y-m-d H:i:s'),
                    ];

                }

                
            }
            


        }elseif ($request->product_type=="2") {
            # code...
        }elseif ($request->product_type=="3"){

        }


    }
    
}
