<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Get quotes
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request)
    {
        $quotes = Quote::all();
        $response = [
            'quotes' => $quotes,
        ];

        return response()->json($response, 200);
    }

    /**
     * Save quote
     *
     * @param QuoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function post(QuoteRequest $request)
    {
        $quote = new Quote();
        $quote->content = $request->input('content');
        $quote->save();

        return response()->json(['quote' => $quote], 201);
    }

    /**
     * Update quote
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function put(Request $request, $id)
    {
        $quote = Quote::find($id);
        if (!$quote) {
            return response()->json(['message' => 'Document not found'], 404);
        }
        $quote->content = $request->input('content');
        $quote->save();

        return response()->json(['quote' => $quote], 200);
    }

    /**
     * Delete quote
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request, $id)
    {
        $quote = Quote::find($id);
        if (!$quote) {
            return response()->json(['message' => 'Document not found'], 404);
        }
        $quote->delete();

        return response()->json(['quote' => $quote], 200);
    }
}
