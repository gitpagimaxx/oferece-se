<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Perfil;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\CommonController;

class PerfilController extends Controller 
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $errorMessage = 'Ocorreu um erro ao registrar';
    public $commomController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $commomController = new CommonController;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        try {
            
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $perfil = $this->perfil(auth()->user()->id);

            return view('dashboard.perfil.index', compact('perfil'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Atualizar o perfil.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, $id)
    {
        try {
            $data = $request->all();

            $data['Buscador'] = isset($data['Buscador']) ? $data['Buscador'] : '0';
            $data['Delivery'] = isset($data['Delivery']) ? $data['Delivery'] : '0';
            $data['Avaliacoes'] = isset($data['Avaliacoes']) ? $data['Avaliacoes'] : '0';

            if ($request->hasFile('Logotipo'))
            {            
                $destinationPath = "images/avatars";
                if (!file_exists($destinationPath)) 
                    mkdir($destinationPath, 0777, true);

                $image = $request->file('Logotipo');
                $data['Logotipo'] = uniqid(date('HisYmd')).'.'.$image->extension();
                $img = Image::make($image->path());
                $img->resize(280, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$data['Logotipo']);
            }

            $response = Perfil::find($id)->update($data);

            return redirect('/dashboard/perfil');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detalharOfertaView($id) 
    {
        try {
            $whereOferta = [ ['Status', '=', '1'], ['id', '=', $id] ];
            $oferta = DB::table('oferta')
            ->select('id', 'Titulo', 'Descricao', 'Validade', 'created_at')
            ->where($whereOferta)->get();

            $whereOfertaItem = [ ['Status', '=', '1'], ['OfertaId', '=', $id] ];
            $ofertaItem = DB::table('oferta_item')
            ->select('OfertaId', 'Item', 'Valor', 'TextoWhatsApp')
            ->where($whereOfertaItem)->get();

            return view('dashboard.ofertas.detalhar-oferta', compact('oferta', 'ofertaItem'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criarOfertaView() 
    {
        try {
            return view('dashboard.ofertas.criar-oferta');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function perfil($userId)
    {
        try {
            // retornar o perfil
            $wherePerfil = [ ['Status', '=', '1'], ['UserId', '=', $userId] ];
            $perfil = DB::table('perfil')
            ->select('id', 'Nome', 'NomeUsuario', 'Logotipo', 'Telefone', 'WhatsApp', 
                'Localizacao', 'LinkMaps', 'HorarioAtendimento', 
                'Buscador', 'Delivery', 'Avaliacoes')
            ->where($wherePerfil)->get();

            return $perfil;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

/* 
'Nome',
'NomeUsuario',
'Logotipo',
'Telefone',
, 'WhatsApp',
, 'Localizacao',
, 'LinkMaps',
, 'HorarioAtendimento',
, 'Buscador',
 */
