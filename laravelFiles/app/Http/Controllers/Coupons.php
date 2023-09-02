<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class Coupons extends Controller
{

    function apply_exe(Request $request)
    {

        if (isset($request->code)) {

            $code = $request->code;
        } else {

            $code = session("code");
        }

        $couponData = Coupon::where("code", $code)->first();

        if ($couponData) {

            if ($couponData["type"] == "PERCENTAGE") {
                $discount = ($couponData["value"] / 100) * session("subtotal");
            } else {
                if ($couponData["value"] > session("subtotal")) {
                    return ["message" => "subtotal-low"];
                } else {
                    $discount = $couponData["value"];
                }
            }

            // print_r(["discount" => $discount, "code" => $code, "type" => $couponData["type"], "value" => $couponData["value"]]);
            // exit;

            session(["discount" => $discount, "code" => $code, "type" => $couponData["type"], "value" => $couponData["value"]]);


            return ["message" => "coupon-applied", "discount" => $discount];
        } else {

            return ["message" => "invalid-coupon"];
        }
    }
}
