<?php

namespace App\Http\Controllers;

use App\Posko;
use App\Rumahsinggah;
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

        $posko = Posko::join('mst_kecamatan', 'mst_kecamatan.ID_KEC', '=', 'poskos.kd_kec')->get();
        $rumah = Rumahsinggah::join('desa', 'rumahsinggahs.id_desa', '=', 'desa.id_desa')
            ->join('mst_kecamatan', 'desa.id_kecamatan', '=', 'mst_kecamatan.ID_KEC')
            ->get();
        $urlindonesia = 'https://api.kawalcorona.com/indonesia';
        $Client = new Client(['headers' => [
            'x-api-version' => '2',
            'Accept' => 'application/json'
        ]]);
        $response = $Client->get($urlindonesia);
        $indonesia = json_decode((string)$response->getBody()->getContents(), true);

        $urlprovinsi = 'https://api.kawalcorona.com/indonesia/provinsi';
        $Client = new Client(['headers' => [
            'x-api-version' => '2',
            'Accept' => 'application/json'
        ]]);
        $respon = $Client->get($urlprovinsi);
        $provinsi = json_decode((string)$respon->getBody()->getContents(), true);
//        return $provinsi;
        return view('depan.depan', compact('almt', 'menus', 'data', 'posts1', 'posts2', 'total','rumah','posko','indonesia','provinsi'));
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

