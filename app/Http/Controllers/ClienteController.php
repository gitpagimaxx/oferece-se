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
use App\Models\Cliente;

class ClienteController extends Controller
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

            $palavra = Request('buscar') ? Request('buscar') : '';
            $where = 'Status = 1 AND UserId = '. auth()->user()->id;
            if (Request('buscar') != '')
                $where = $where . " AND (Nome LIKE '%".$palavra."%' OR Telefone LIKE '%".$palavra."%')";

            $clientes = DB::table('cliente')
            ->select('id', 'Nome', 'Telefone', 'CEP', 'Endereco', 'Numero', 'Bairro', 'Cidade', 'Estado', 'Referencia', 'UserId', 'created_at')
            ->whereRaw($where)
            ->orderBy('created_at', 'desc')
            ->paginate(10); 

            $qtdeRegistros = $clientes->count();

            return view('dashboard.clientes.index', compact('clientes', 'qtdeRegistros', 'palavra'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detalharView($id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $where = [ ['Status', '=', '1'], ['id', '=', $id] ];
            $cliente = DB::table('cliente')
            ->select('id', 'Nome', 'Telefone', 'CEP', 'Endereco', 'Numero', 'Complemento', 'Bairro', 'Cidade', 'Estado', 'Referencia', 'UserId', 'created_at')
            ->where($where)
            ->get();

            return view('dashboard.clientes.detalhar', compact('cliente', 'id'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function adicionarView()
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            return view('dashboard.clientes.adicionar');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function adicionar(Request $request)
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $response = Cliente::create($request->all()); 
            return redirect('/dashboard/clientes/detalhar/'.$response->id);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function alterarView($id)
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $entity = $this->clientePorId($id);
            return view('dashboard.clientes.alterar', compact('entity', 'id'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function alterar(Request $request, $id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);
            
            $response = Cliente::find($id)->update($request->all());

            return redirect('/dashboard/clientes/detalhar/'.$id);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function excluirView($id)
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $entity = $this->clientePorId($id);
            return view('dashboard.clientes.excluir', compact('entity', 'id'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function excluir($id) 
    {
        try {

            // registrar acesso
            (new CommonController)->registrarAcesso(auth()->user()->id);
            
            $response = Cliente::find($id)->update(array('Status' => false));

            return redirect('/dashboard/clientes');

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

    public function clientePorId($id) 
    {
        try {
            $where = [ ['Status', '=', '1'], ['id', '=', $id] ];
            return $cliente = DB::table('cliente')
            ->select('id', 'Nome', 'Telefone', 'CEP', 'Endereco', 'Numero', 'Complemento', 
                'Bairro', 'Cidade', 'Estado', 'Referencia', 'UserId', 'created_at')
            ->where($where)
            ->get();

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

