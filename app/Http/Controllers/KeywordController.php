<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function index()
    {
        return view('keywords.index');
    }

    public function store(Request $request)
    {
        $keywords = $request->input('keywords');
        $response = $this->callSEMrushAPI($keywords);
        $audience = data_get($response, 'audience');
        $keyWord = $this->saveKeywords($keywords, $audience);
        return view('keywords.index', ['response' => $response, 'keyword_id' => $keyWord->id]);
    }

    public function saveKeywords($keywords, $audience)
    {
        return Keyword::create([
            'keyword' => $keywords,
             'intended_audience' => $audience
        ]);
    }

    private function callSEMrushAPI($keywords)
    {
        // I don't have API key and the response I get makes no scence so kept it that way.
        try {
            $url = 'https://api.semrush.com/?type=phrase_this&key=<your_api_key>&export_columns=Ph,Nq,Cp,Co,Nr,Td&display_limit=10&phrase=' . $keywords;
            $ch  = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec
            ($ch);
            curl_close($ch);
            $dummyResponseAudience = data_get($output,' body.audience', 'dummy');
        } catch (\Exception $e) {

            $dummyResponseAudience = "Date;Database;Keyword;Search Volume;CPC;Competition201903;bo;seo;390;0.44;0.03201903;hu;seo;1900;0.82;0.45201903;th;seo;5400;0.96;0.49201903;cr;seo;590;0.43;0.14";

        }

        return ['audience' => $dummyResponseAudience];

    }
}