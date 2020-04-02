<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Alamat;
use App\Mainmenu;
use App\Post;
use App\Info;
use App\Sosmed;
use App\Map;
use App\Slider;
use App\M_Galeri;
use App\M_Opini;
use App\M_Resensi;
use App\M_Youtube;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class IndexDepanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $almt = Alamat::findOrFail(1);

        $menus = Mainmenu::with('children')->where('parent', '=', 0)->orderBy('urutan')->get();

        $posts1 = Post::where('status', 'publish')->orderBy('tgl_buat', 'desc')->skip(0)->take(3)->get();

        $posts2 = Post::where('status', 'publish')->orderBy('tgl_buat', 'desc')->skip(3)->take(3)->get();

        $data = DB::table('v_covid')->get();

        $total = DB::table('v_jumlah')->first();


        return view('depan.depan', compact('almt', 'menus', 'data', 'posts1', 'posts2', 'total'));
//        return response()->json($data);
    }

    public function get_rujukan()
    {
        $url = 'http://infocovid19.jatimprov.go.id/index.php/home/getListRujukan';
        $Client = new Client(['headers' => [
            'x-api-version' => '2',
            'Accept' => 'application/json'
        ]]);
        $response = $Client->get($url);
        $result = json_decode((string)$response->getBody()->getContents(), true);

        // $data = json_encode($result);

        return response()->json($result);
    }

    public function get_map()
    {
        $url = 'https://corona.banyuwangikab.go.id/front/data_sebaran';
        $Client = new Client(['headers' => [
            'x-api-version' => '2',
            'Accept' => 'application/json'
        ]]);
        $response = $Client->get($url);
        $result = json_decode((string)$response->getBody()->getContents(), true);

        // $data = json_encode($result);

        return response()->json($result);
    }
}

