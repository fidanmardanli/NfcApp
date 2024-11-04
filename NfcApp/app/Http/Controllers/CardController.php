<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function index()
    {
        $cards = DB::table('cards')->get();
        return response()->json($cards);
    }

    public function store(Request $request)
    {
        $cardId = DB::table('cards')->insertGetId([
            'cardNumber' => $request->cardNumber,
            'cardType' => $request->cardType,
            'isActive' => $request->isActive,
            'validTo' => $request->validTo,
            'created_at' => now(),
        ]);

        $card = DB::table('cards')->where('id', $cardId)->first();
        return response()->json($card, 201);
    }

    public function show($id)
    {
        $card = DB::table('cards')->where('id', $id)->first();
        return response()->json($card);
    }

    public function update(Request $request, $id)
    {
        DB::table('cards')->where('id', $id)->update([
            'cardNumber' => $request->cardNumber,
            'cardType' => $request->cardType,
            'isActive' => $request->isActive,
            'validTo' => $request->validTo,
            'updated_at' => now(),
        ]);

        $card = DB::table('cards')->where('id', $id)->first();
        return response()->json($card);
    }

    public function destroy($id)
    {
        DB::table('cards')->where('id', $id)->delete();
        return response()->json(['message' => 'Card deleted successfully.']);
    }

    public function deactivate($id)
    {
        DB::table('cards')->where('id', $id)->update(['isActive' => false]);
        $card = DB::table('cards')->where('id', $id)->first();
        return response()->json($card);
    }

    public function checkValidity($id)
    {
        $card = DB::table('cards')->where('id', $id)->first();
        $isValid = $card->isActive && ($card->validTo ? Carbon::parse($card->validTo)->isFuture() : true);
        return response()->json(['isValid' => $isValid]);
    }
}
