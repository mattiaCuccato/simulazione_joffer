<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    
    //VIEW ALL OFFERS
    public function view_offers(){
        return Offer::all();
    }

    //VIEW ALL OFFERS WITH DESC RAL
    public function view_offers_ral_desc(){
        return Offer::orderBy('ral', 'DESC')->get();
    }

    //VIEW ALL OFFERS WITH ASC RAL
    public function view_offers_ral_asc(){
        return Offer::orderBy('ral', 'ASC')->get();
    }

    //DETAIL OFFER
    public function detail_offer($id){
        return Offer::find($id);
    }

    //INSERT NEW OFFER
    public function insert_offer(Request $request){
        $data = json_decode($request->getContent());
        $newOffer = new Offer();

        $newOffer->program_language = $data->program_language;
        $newOffer->icon = $data->icon;
        $newOffer->company = $data->company;
        $newOffer->ral = $data->ral;
        $newOffer->experience = $data->experience;
        $newOffer->location = $data->location;
        $newOffer->description = $data->description;

        $newOffer->save();
        return $newOffer;
    }

    //MODIFY OFFER
    public function update_offer(Request $request, $id){
        $data = json_decode($request->getContent());
        $offer = Offer::find($id);

        $offer->program_language = $data->program_language;
        $offer->icon = $data->icon;
        $offer->company = $data->company;
        $offer->ral = $data->ral;
        $offer->experience = $data->experience;
        $offer->location = $data->location;
        $offer->description = $data->description;
        
        $offer->save();
        return $offer;
    }

    //DELETE OFFER
    public function delete_offer($id){
        return Offer::destroy($id);
    }
}
