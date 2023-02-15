<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Categoria;
use App\Models\Oferta;
use App\Models\OfertaItem;
use App\Models\Avaliacao;
use App\Http\Controllers\CommonController;

class SiteController extends Controller
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $errorMessage = 'Ocorreu um erro ao registrar';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $where = [ ['Status', '=', '1'], ['UserId', '=', auth()->user()->id] ];
            $palavra = Request('buscar') ? Request('buscar') : null;

            if ($palavra) {
                
                $registros = DB::table('categoria')
                ->select('id', 'Nome', "Link", "created_at")
                ->where($where)
                ->orWhere([[ 'Nome', 'like', '%' . $palavra . '%' ]])
                ->orderBy('created_at', 'desc')
                ->paginate(10);

                //Pesquisa::create(['Palavra'=>Request('buscar'), 'Tela'=>'conhecimento']);

            } else {

                $registros = DB::table('categoria')
                ->select('id', 'Nome', "Link", "created_at")
                ->where($where)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                
            }

            Paginator::defaultView('pagination::bootstrap-4');

            //dd($registros);

            return view('dashboard.categorias.index', compact('registros'));

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function oferta($username, $idoferta) 
    {
        try {

             // registrar acesso
             (new CommonController)->registrarAcesso(0);

            $where = [ ['Status', '=', '1'], ['id', '=', $idoferta] ];
            $oferta = DB::table('oferta')
            ->select('Titulo', 'Descricao', 'Validade')
            ->where($where)->get();

            $whereOfertaItem = [ ['Status', '=', '1'], ['OfertaId', '=', $idoferta] ];
            $ofertaItem = DB::table('oferta_item')
            ->select('OfertaId', 'Item', 'Valor', 'TextoWhatsApp')
            ->where($whereOfertaItem)->get();

            $perfil = (new CommonController)->perfilPorNome($username);

            //dd($perfil);

            return view('site.ofertas', compact('oferta', 'ofertaItem', 'perfil'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function avaliar($username)
    {
        try {
            $perfil = $this->perfil($username);

            //return view("site.avaliacao", compact('perfil'));
            return view("site.avaliar", compact('perfil'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Registrar a avaliação.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registarAvaliacao(Request $request)
    {
        try {

            $perfil = $this->perfil($request->username);

            $dados = $request->all();
            $dadosAvaliacao['Nome'] = $request->nome;
            $dadosAvaliacao['Telefone'] = $request->telefone;
            $dadosAvaliacao['VendaId'] = $request->vendaid;
            $dadosAvaliacao['Atendimento'] = $request->atendimento;
            $dadosAvaliacao['Entrega'] = $request->entrega;
            $dadosAvaliacao['Observacao'] = $request->observacao;
            $response = Avaliacao::create($dadosAvaliacao);

            return redirect('/'.$request->username.'/obrigado')->with(['perfil'=>$perfil ?? '']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function avaliarObrigado($username)
    {
        try {
            $perfil = $this->perfil($username);

            return view("site.avaliacao-obrigado", compact('perfil'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function perfil($username)
    {
        try {
            // retornar o perfil
            $wherePerfil = [ ['Status', '=', '1'], ['NomeUsuario', '=', $username] ];
            $perfil = DB::table('perfil')
            ->select('Nome', 'NomeUsuario', 'Logotipo', 'Telefone', 'WhatsApp', 
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
