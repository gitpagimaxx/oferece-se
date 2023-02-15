<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Categoria;
use App\Models\Oferta;
use App\Models\OfertaItem;
use App\Http\Controllers\CommonController;

class OfertaController extends Controller
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $errorMessage = 'Ocorreu um erro ao registrar';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

            $perfil = (new CommonController)->perfil(auth()->user()->id);
            
            $whereOferta = [ ['Status', '=', '1'], ['UserId', '=', auth()->user()->id] ];
            $ofertas = DB::table('oferta')
            ->select('id', 'Titulo', 'Descricao', 'Validade', 'created_at')
            ->where($whereOferta)
            ->paginate(10); 

            $qtdeRegistros = $ofertas->count();

            return view('dashboard.ofertas.index', compact('ofertas', 'qtdeRegistros', 'perfil'));

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

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $perfil = (new CommonController)->perfil(auth()->user()->id);

            $oferta = $this->oferta($id);
            $ofertaItem = $this->ofertaItem($id);

            return view('dashboard.ofertas.detalhar-oferta', compact('oferta', 'ofertaItem', 'id', 'perfil'));

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

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            return view('dashboard.ofertas.adicionar-oferta');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Criar oferta.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adicionarOferta(Request $request) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $entity = $request->all(); //dd($entity);
            $response = Oferta::create($entity); 
            return redirect('/dashboard/ofertas/detalhar/'.$response->id);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function alterarOfertaView($id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);
            
            $oferta = $this->oferta($id);
            return view('dashboard.ofertas.alterar-oferta', compact('id', 'oferta'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function alterarOferta(Request $request, $id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);
            
            $entity = $request->all(); //dd($entity);
            $response = Oferta::find($id)->update($entity);

            return redirect('/dashboard/ofertas/detalhar/'.$id);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excluirOfertaView($id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);
            
            $oferta = $this->oferta($id);

            return view('dashboard.ofertas.excluir-oferta', compact('id', 'oferta'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function excluirOferta($id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $entity = Oferta::find($id)->update(array('Status' => false)); 
            
            return redirect('/dashboard/ofertas');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adicionarOfertaItemView($id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            return view('dashboard.ofertas.adicionar-oferta-item', compact('id'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adicionarOfertaItem(Request $request) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);
            
            $entity = $request->all();
            $response = OfertaItem::create($entity); 
            
            return redirect('/dashboard/ofertas/detalhar/'.$response->OfertaId);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alterarOfertaItemView($id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);
            
            $ofertaItem = $this->ofertaItemPorId($id);

            return view('dashboard.ofertas.alterar-oferta-item', compact('id', 'ofertaItem'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function alterarOfertaItem(Request $request, $id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $entity = $request->all(); //dd($entity);
            $response = OfertaItem::find($id)->update($entity);
            
            return redirect('/dashboard/ofertas/detalhar/'.$entity['OfertaId']);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excluirOfertaItemView($id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);
            
            $ofertaItem = $this->ofertaItemPorId($id);
            return view('dashboard.ofertas.excluir-oferta-item', compact('id', 'ofertaItem'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function excluirOfertaItem($id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $entity = OfertaItem::find($id);
            $entity = OfertaItem::find($id)->update(array('Status' => false)); 
            
            return redirect('/dashboard/ofertas/detalhar/'.$entity->OfertaId);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function oferta($id) 
    {
        try {

            $whereOferta = [ ['Status', '=', '1'], ['id', '=', $id] ];
            $oferta = DB::table('oferta')
            ->select('id', 'Titulo', 'Descricao', 'Validade', 'created_at')
            ->where($whereOferta)->get();

            return $oferta;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ofertaItem($id) 
    {
        try {

            $whereOfertaItem = [ ['Status', '=', '1'], ['OfertaId', '=', $id] ];
            $ofertaItem = DB::table('oferta_item')
            ->select('id', 'OfertaId', 'Item', 'Valor', 'TextoWhatsApp', 'created_at')
            ->where($whereOfertaItem)->get();

            return DB::table('oferta_item')
            ->select('id', 'OfertaId', 'Item', 'Valor', 'TextoWhatsApp', 'created_at')
            ->where($whereOfertaItem)->get();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ofertaItemPorId($id) 
    {
        try {
            
            return DB::table('oferta_item')
            ->select('id', 'OfertaId', 'Item', 'Valor', 'TextoWhatsApp', 'created_at')
            ->where(['Status', '=', '1'], ['id', '=', $id] )->get();

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
