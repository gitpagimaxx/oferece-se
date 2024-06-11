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
use App\Models\Avaliacao;

class AvaliacaoController extends Controller
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
            
            $perfil = $this->obterDadosPerfil(auth()->user()->id);

            $where = [ ['Status', '=', '1'], ['PerfilId', '=', $perfil[0]->id] ];
            $avaliacoes = DB::table('avaliacao')
            ->select('id', 'Nome', 'Telefone', 'Atendimento', 'Entrega', 'Publicar', 'created_at')
            ->where($where)
            ->paginate(10); 

            $qtdeRegistros = $avaliacoes->count();

            return view('dashboard.avaliacao.index', compact('avaliacoes', 'qtdeRegistros'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function avaliacaoDetalhar($id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $where = [ ['Status', '=', '1'], ['id', '=', $id] ];
            $avaliacao = DB::table('avaliacao')
            ->select('id', 'Nome', 'Telefone', 'Atendimento', 'Observacao', 'Entrega', 'Publicar', 'created_at')
            ->where($where)->get(); 

            return view('dashboard.avaliacao.detalhar', compact('avaliacao', 'id'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function avaliacaoPublicar(Request  $request, $id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $entity = Avaliacao::find($id)->update($request->all()); //dd($entity);
            
            return redirect('/dashboard/avaliacao/detalhar/'.$id);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function obterDadosPerfil($userId) 
    {
        try {
            $where = [ ['Status', '=', '1'], ['UserId', '=', $userId] ];
            return DB::table('perfil')
            ->select('id', 'Nome')
            ->where($where)->get();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function avaliacao($id, $palavraChave)
    {
        try {
            $where = [ ['Status', '=', '1'], ['id', '=', $id] ];
            
            $registros = DB::table('avaliacao')
            ->select('id', 'Nome', 'Telefone', 'Atendimento', 'Observacao', 'Entrega', 'Publicar', 'created_at')
            ->where($where)->get(); 

            return view('dashboard.avaliacao.detalhar', compact('registros'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

