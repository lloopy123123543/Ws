<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
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

    public function showAll() {

        $ads = Ad::all();

        return response()->json($ads, 200);
    }


    public function add(Request $request) {
        $card_text = $request->input('card_text');
        $card= new Card();
        $card->card_text = $card_text;
        $card->save();

        return response()->json($card, 201);
    }

    public function edit(Request $request, $card_id) {
        $card_text = $request->input('card_text');

        $card = Card::find($card_id);
        $card->card_text = $card_text;
        $card->save();

        return response()->json($card, 201);
    }

    public function delete($card_id) {

        $card = Card::find($card_id);
        $card->delete();

        return response('delete complete', 200);
    }
    public function like($card_id) {
        $card = Card::find($card_id);

        $card->card_likes = $card['card_likes'] + 1;
        $card->save();


        return response()->json($card, 201);
    }


    public function likeDelete($card_id){
        $card = Card::find($card_id);
        if($card['card_likes']>0){
            $card->card_likes = $card['card_likes'] - 1;
            $card->save();
            return response()->json(['messege'=>'lIKE IS DELETED'],200);
        }
        else{

            return response()->json(['error'=>'lIKE IS NOT DELETED'],422);
        }



    }
//    public function deleteAll(Request $request) {
//
//        $cards = Card::all();
//        $cards -> delete();
//
//        return response('delete complete', 200);
//    }


}
