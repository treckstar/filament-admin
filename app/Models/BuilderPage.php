<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Sushi\Sushi;

class BuilderPage extends Model
{
    use Sushi;

    /**
     * Model Rows
     *
     * @return void
     */
    public function getRows()
    {
        //API
        //$pages = Http::get('https://cdn.builder.io/api/v3/content/page?apiKey=19cddabf97044071abf90661d43a23de')->json();
        $builderPages = Http::get('https://cdn.builder.io/api/v3/content/page?apiKey=19cddabf97044071abf90661d43a23de&fields=id,name,published,previewUrl,createdDate,screenshot,data.url&limit=100')->json();

        //$builderPages = Arr::flatten($builderPages);

        //dd($builderPages);

        //filtering some attributes
        $pages = Arr::map($builderPages['results'], function ($item) {
            // dd($item, [
            //     'id' => $item['id'],
            //     'name' => $item['name'],
            //     'published' => $item['published'],
            //     'previewUrl' => $item['data']['url'],
            //     'createdDate' => $item['createdDate'],
            //     'screenshot' => $item['screenshot'],
            // ]);
            return [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'published' => $item['published'],
                    'previewUrl' => $item['data']['url'],
                    'createdDate' => $item['createdDate'],
                    'screenshot' => $item['screenshot'],
                ];
        });

        //dd($pages);

        return $pages;
    }
}
