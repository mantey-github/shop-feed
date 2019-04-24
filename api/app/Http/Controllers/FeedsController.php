<?php

namespace App\Http\Controllers;

use App\Feed;
use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class FeedsController extends Controller
{
    /** Gets all feeds
     * Method: GET
     * @param Request $request
     * @return JsonResponse
     */
    public function getFeeds(Request $request): JsonResponse
    {
        $feeds = Feed::all();

        return response()->json([
            'feeds' => $feeds,
        ], 200);

    }

    /** Gets feed as a CSV file
     * Method: GET
     * @param Request $request
     * @return JsonResponse
     */
    public function getFeed(Request $request)
    {
        $feeds = Feed::where('id', $request->feed_id)->get(); //We get feed as a collection so we can loop through it values

        if ($feeds->isEmpty()) {
            return response()->json(['errors' => 'No feed found.']);
        }

        $feed_to_csv = array();
        $feed_header = array('Product Name', 'Product Brand', 'Product Pricing', 'Product Currency');

        array_push($feed_to_csv, $feed_header);

        foreach ($feeds as $feed) {
            $feed_data = [
                $feed->product_name,
                $feed->product_brand,
                $feed->product_pricing,
                $feed->product_currency,
            ];

            array_push($feed_to_csv, $feed_data);
        }

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="sample.csv"');

        $csv_feed_file = fopen('php://output', 'wb');
        foreach ($feed_to_csv as $line) {
            fputcsv($csv_feed_file, $line, ',');
        }
        fclose($csv_feed_file);

    }


}
