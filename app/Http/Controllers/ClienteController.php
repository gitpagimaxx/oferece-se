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
    public $message = 'Ocorreu um erro';
    public $typeMessage = 'danger';

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

            $this->registrarAcesso();

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
            $this->registrarAcesso();
            $where = [ ['Status', '=', '1'], ['id', '=', $id] ];
            $entity = $this->clientePorId($id);

            return view('dashboard.clientes.detalhar', compact('entity', 'id'));

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
            $this->registrarAcesso();
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
            $this->registrarAcesso();
            $response = Cliente::create($request->all()); 
            
            if ($response) {
                $this->message = 'Cliente cadastrado com sucesso';
                $this->typeMessage = 'success';
            }

            return redirect('/dashboard/clientes/detalhar/'.$response->id)->with(['message' => $this->message, 'typeMessage' => $this->typeMessage]);

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
            $this->registrarAcesso();
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

            $this->registrarAcesso();
            
            $response = Cliente::find($id)->update($request->all());
            
            if ($response) {
                $this->message = 'Cliente alterado com sucesso';
                $this->typeMessage = 'success';
            }

            return redirect('/dashboard/clientes/detalhar/'.$id)->with(['message' => $this->message, 'typeMessage' => $this->typeMessage]);

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

            $this->registrarAcesso();

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

            $this->registrarAcesso();
            
            $response = Cliente::find($id)->update(array('Status' => false));

            return redirect('/dashboard/clientes');

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
            ->first();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function registrarAcesso()
    {
        try {
            (new CommonController)->registrarAcesso(auth()->user()->id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

