<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use App\Models\Card;
use http\Env\Response;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function ShowAll()
    {
        $ads = Ad::all();
        return response()->json($ads);
    }


    public function ShowData($ad_id)
    {
        $ads = Ad::find($ad_id);

        return response()->json($ads);
    }


    public function proverka(\Illuminate\Http\Request $request, $ad_id)
    {
        $ads = Ad::find($ad_id);
        $keys = $request->input('key');
        if ($ads->key != $keys) {
            return response()->json('something wrong');

        }
        else{
            return response()->json('Ключ, подтвержден');
        }



    }

    public function add(\Illuminate\Http\Request $request)
    {
        if (!$request->input('Title_ad')) {
            return response('Title not found', 200);
        }
        $Title_ad = $request->input('Title_ad');
        $Info_ad = $request->input('Info_ad');
        $Contact_name = $request->input('Contact_name');
        $contact_phone = $request->input('contact_phone');
        $date_end = $request->input('date_end');
        $key = rand(1, 9000);
        $ad = new Ad();
        $ad->Title_ad = $Title_ad;
        $ad->Info_ad = $Info_ad;
        $ad->Contact_name = $Contact_name;
        $ad->contact_phone = $contact_phone;
        $ad->date_end = $date_end;
        $ad->key = $key;
        $ad->save();

        $ad_response = [
            'id' => $ad['id'],
            'key' => $ad['key'],
        ];

        return response()->json($ad, 201);
    }

    public function edit(\Illuminate\Http\Request $request, $ad_id){
        $ads = Ad::find($ad_id);
        $Title_ad = $request->input('Title_ad');
        $Info_ad = $request->input('Info_ad');
        $Contact_name = $request->input('Contact_name');
        $contact_phone = $request->input('contact_phone');
        $date_end = $request->input('date_end');
        $ads->Title_ad = $Title_ad;
        $ads->Info_ad = $Info_ad;
        $ads->Contact_name = $Contact_name;
        $ads->contact_phone= $contact_phone;
        $ads->date_end = $date_end;
        $ads->save();
        return response()->json($ads, 201);
    }

}




//       $Title_ad = $request->input('Title_ad');
//       $Info_ad = $request->input('Info_ad');
//       $Contact_name = $request->input('Contact_name');
//       $contact_phone = $request->input('contact_phone');
//       $date_end = $request->input('date_end');
//       $ad = Card::find($ad_id);
//       $ad->Title_ad=$Title_ad;
//       $ad->Info_ad=$Info_ad;
//       $ad->Contact_name=$Contact_name;
//       $ad->contact_phone=$contact_phone;
//       $ad->date_end=$date_end;
//       $ad->save();

//       return response()->json($ad, 201);
//
//     }

//    public function showAll() {
//        $ad = Ad::all()->where('deleted_at', null )
//            ->where('date_end', '>', date('c'));
//
//        return response()->json($ad);
//    }

//    public function delete($ad_id){
//        $ad = Ad::find('$ad_id');
//        $ad->deleted_at = date('');
//        $ad->save();
//    }


//    public function restore(Request $request, $ad_id){
//        $ad_key = $request->input('ad_key');
//
//        $ad = Ad::all($ad_id);
//
//        if($ad->key != $ad_key) {
//            return response()->json(['error'=>'key is incorrect'], 422);
//        }
//        $ad->restore();
//
//        return response()->json($ad,201);
//    }


