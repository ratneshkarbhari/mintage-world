<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\AwsS3;
use App\Models\ProductImage;
use App\Models\ProductVariation;

class Products extends Controller
{
    
    function delete_product_image(Request $request){

        $productImageId = $request->product_image_id;


        $productImageModel = new ProductImage();

        if ($productImageModel->where("image_id",$productImageId)->delete()) {
            return [
                "result" => "success",
                "message" => "Product Image deleted" 
            ];
        }else{
            return [
                "result" => "failure",
                "message" => "Product Image delete failed" 
            ];
        }
        
    }

    function create(Request $request){

        $uploadPath = './assets/images/products/';

        if($productToUpdate = Product::where("id",$request->pid)->first()){

            if($request->hasFile("featured_image")){

                $featuredImageFile = $request->file("featured_image");

                $featuredImageName = $featuredImageFile->getClientOriginalName();

                $s3 = new AwsS3();


                $featuredImageFile->move($uploadPath,$featuredImageName);

                if (!is_file(getenv("PRODUCT_IMAGE_BASE_URL").$featuredImageName)) {
                    
                    $s3->upload($featuredImageName,$uploadPath.$featuredImageName,"mint-product-img");
                    
                }else{

                    $featuredImageName = "no-image.jpg";

                }


            }else{
                $featuredImageName = $productToUpdate["img"];
            }

            if($request->hasFile("prodimages")){

                if(count($galleryImages = $request->file("prodimages"))>0){

                
                    
                    foreach ($galleryImages as $galleryImage) {
    
                        $galleryImageName = $galleryImage->getClientOriginalName();
    
                        $galleryImage->move($uploadPath,$galleryImageName);
    
                        $fileData = getimagesize($uploadPath.$galleryImageName);
    
                        if(!is_file(getenv("PRODUCT_EXTRA_IMAGE_BASE_URL").$galleryImageName)){
    
                            $s3 = new AwsS3();
    
    
                            $s3->upload("extra_images/".$galleryImageName,$uploadPath.$galleryImageName,"mint-product-img");
    
                            $galleryImageObj = [
                                "product_id" => $request->pid,
                                "image_type" => $galleryImage->getClientMimeType(),
                                "image_height" => $fileData[1],
                                "image_width" => $fileData[0],
                                "thumb_height" => 100,
                                "thumb_width" => 100,
                                "image_name" => $galleryImageName,
                            ];
    
                            ProductImage::create($galleryImageObj);
    
                        }
                        
                    }
    
    
    
                }

            }

            
            

            $objectToCreate = [
                "name1" => $request["name1"],
                "category" => $request["category"],
                "sub_cat" => $request["sub_cat"],
                "instock" => $request["instock"],
                "price" => $request["price"],
                "sku" => $request["sku"],
                "notes" => $request["notes"],
                "status" => $request["status"],
                "date_option" => $request["date_option"],
                "custom_url" => $request["custom_url"],
                "accesories_type" => $request["accessories_type"],
                "denomination" => $request["denomination"],
                "issue_year" => $request["issue_year"],
                "condition" => $request["condition"],
                "img" => $featuredImageName,
                "type_series" => $request["type_series"],
                "keywords" => $request["keywords"],
                "meta_title" => $request["meta_title"],
                "meta_keywords" => $request["meta_keywords"],
                "meta_content" => $request["meta_content"],
                "schema_code" => $request["schema_code"],
                "color" => $request["color"],
                "size" => $request["size"],
                "product_type" => $request["size"],
                "weight" => $request["weight"],
                "xbxh" => $request["xbxh"],
                "discount" => $request["discount"],
                "video_id" => $request["videoid"]
            ];

            if($createdPid = Product::insertGetId($objectToCreate)){

                    
                // handling variations

                $variationTitles = $request->variation_titles;
                $countVariations = count($request->variation_pids);

                for ($i=0; $i < $countVariations; $i++) { 


                      

                    $variationObj = [
                        "product_id" => $request->pid,
                        "variation_product_id" => $createdPid,
                        "variation_name" => $variationTitles[$i]
                    ];
    
                    ProductVariation::create($variationObj);
            
                    
                }

                


                return [
                    "result" => "success",
                    "message" => "successful"
                ];
            }


        

        }else{
        
            return [
                "result" => "failure",
                "message" => "Product id incorrect"
            ];

        }


        
        

    }

    function update(Request $request){

        $uploadPath = './assets/images/products/';

        if($productToUpdate = Product::where("id",$request->pid)->first()){

            if($request->hasFile("featured_image")){

                $featuredImageFile = $request->file("featured_image");

                $featuredImageName = $featuredImageFile->getClientOriginalName();

                $s3 = new AwsS3();


                $featuredImageFile->move($uploadPath,$featuredImageName);

                if (!is_file(getenv("PRODUCT_IMAGE_BASE_URL").$featuredImageName)) {
                    
                    $s3->upload($featuredImageName,$uploadPath.$featuredImageName,"mint-product-img");
                    
                }else{

                    $featuredImageName = "no-image.jpg";

                }


            }else{
                $featuredImageName = $productToUpdate["img"];
            }

            if($request->hasFile("prodimages")){

                if(count($galleryImages = $request->file("prodimages"))>0){

                
                    
                    foreach ($galleryImages as $galleryImage) {
    
                        $galleryImageName = $galleryImage->getClientOriginalName();
    
                        $galleryImage->move($uploadPath,$galleryImageName);
    
                        $fileData = getimagesize($uploadPath.$galleryImageName);
    
                        if(!is_file(getenv("PRODUCT_EXTRA_IMAGE_BASE_URL").$galleryImageName)){
    
                            $s3 = new AwsS3();
    
    
                            $s3->upload("extra_images/".$galleryImageName,$uploadPath.$galleryImageName,"mint-product-img");
    
                            $galleryImageObj = [
                                "product_id" => $request->pid,
                                "image_type" => $galleryImage->getClientMimeType(),
                                "image_height" => $fileData[1],
                                "image_width" => $fileData[0],
                                "thumb_height" => 100,
                                "thumb_width" => 100,
                                "image_name" => $galleryImageName,
                            ];
    
                            ProductImage::create($galleryImageObj);
    
                        }
                        
                    }
    
    
    
                }

            }

            
            

            $objectToUpdate = [
                "name1" => $request["name1"],
                "category" => $request["category"],
                "sub_cat" => $request["sub_cat"],
                "instock" => $request["instock"],
                "price" => $request["price"],
                "sku" => $request["sku"],
                "notes" => $request["notes"],
                "status" => $request["status"],
                "date_option" => $request["date_option"],
                "custom_url" => $request["custom_url"],
                "accesories_type" => $request["accessories_type"],
                "denomination" => $request["denomination"],
                "issue_year" => $request["issue_year"],
                "condition" => $request["condition"],
                "img" => $featuredImageName,
                "type_series" => $request["type_series"],
                "keywords" => $request["keywords"],
                "meta_title" => $request["meta_title"],
                "meta_keywords" => $request["meta_keywords"],
                "meta_content" => $request["meta_content"],
                "schema_code" => $request["schema_code"],
                "color" => $request["color"],
                "size" => $request["size"],
                "product_type" => $request["size"],
                "weight" => $request["weight"],
                "xbxh" => $request["xbxh"],
                "discount" => $request["discount"],
                "video_id" => $request["videoid"]
            ];


            // handling variations

            $variationPids = $request->variation_pids;
            $variationTitles = $request->variation_titles;
            $existingVariationIds = $request->existing_variation_ids;
            $countVariations = count($request->variation_pids);

            for ($i=0; $i < $countVariations; $i++) { 

                if($existingVariationIds[$i]=="x"){

                }else{

                    $variationObj = [
                        "product_id" => $request->pid,
                        "variation_product_id" => $variationPids[$i],
                        "variation_name" => $variationTitles[$i]
                    ];
    
                    ProductVariation::where("id",$existingVariationIds[$i])->update($variationObj);
    

                }
                
                
            }

            if(Product::find($request->pid)->update($objectToUpdate)){
                return [
                    "result" => "success",
                    "message" => "successful"
                ];
            }

        

        }else{
        
            return [
                "result" => "failure",
                "message" => "Product id incorrect"
            ];

        }


        
        

    }

    function delete(Request $request){

        $pid = $request->pid;

        if (Product::find($pid)->delete()) {
            return "success";
        } else {
            return "failure";
        }
        

    }
    
}
