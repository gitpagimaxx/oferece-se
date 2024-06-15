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
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $perfil = (new CommonController)->perfil(auth()->user()->id);

            $palavra = Request('buscar') ? Request('buscar') : '';
            $where = 'Status = 1 AND UserId = '. auth()->user()->id;
            if (Request('buscar') != '')
                $where = $where . " AND (Titulo LIKE '%".$palavra."%' OR Descricao LIKE '%".$palavra."%')"; 
                
            $ofertas = DB::table('oferta')
                ->select('id', 'Titulo', 'Descricao', 'Validade', 'created_at')
                ->whereRaw($where)
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            foreach ($ofertas as $oferta) {
                $oferta->qtdeItens = OfertaItem::where('OfertaId', $oferta->id)->count();
            }
            
            $qtdeRegistros = $ofertas->count();

            return view('dashboard.ofertas.index', compact('ofertas', 'qtdeRegistros', 'perfil', 'palavra'));

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

            $perfil = (new PerfilController)->perfil(auth()->user()->id);

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
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $entity = $request->all();
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
            (new CommonController)->registrarAcesso(auth()->user()->id);
            
            $entity = $request->all();
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
            return DB::table('oferta')
                ->select('id', 'Titulo', 'Descricao', 'Validade', 'created_at')
                ->where([ ['Status', '=', '1'], ['id', '=', $id] ])->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ofertaItem($id) 
    {
        try {
            return DB::table('oferta_item')
                ->select('id', 'OfertaId', 'Item', 'Valor', 'TextoWhatsApp', 'created_at')
                ->where([ ['Status', '=', '1'], ['OfertaId', '=', $id] ])
                ->orderBy('created_at', 'desc')
                ->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ofertaItemPorId($id) 
    {
        try {
            return DB::table('oferta_item')
            ->select('id', 'OfertaId', 'Item', 'Valor', 'TextoWhatsApp', 'created_at')
            ->where([ ['Status', '=', '1'], ['id', '=', $id] ])->first(); 

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
