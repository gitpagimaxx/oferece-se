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
use App\Models\Ofertas;

class DashboardController extends Controller
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

    public function index()
    {
        try {
            (new CommonController)->registrarAcesso(auth()->user()->id);

            $ofertas = DB::table('oferta')
            ->selectRaw('id, Titulo, Descricao, Validade, created_at')
            ->whereRaw('Status = 1 AND UserId =  '.auth()->user()->id)
            -> orderBy('id', 'desc')
            ->get();
            $qtdeOfertas = $ofertas->count();

            $avaliacao = DB::table('avaliacao')
            ->selectRaw('id, Nome, Telefone, Atendimento, Entrega, Publicar, created_at')
            ->whereRaw('Status = 1 AND PerfilId =  '.auth()->user()->id)
            -> orderBy('id', 'desc')
            ->get();
            $qtdeAvaliacao = $avaliacao->count();

            $clientes = DB::table('cliente')
            ->selectRaw('id, Nome, Telefone, CEP, Endereco, Numero, Bairro, Cidade, Estado, Referencia, UserId, created_at')
            ->whereRaw('Status = 1 AND UserId =  '.auth()->user()->id)
            -> orderBy('id', 'desc')
            ->get();
            $qtdeClientes = $clientes->count();

            return view('dashboard.dashboard', compact('ofertas', 'qtdeOfertas', 'avaliacao', 'qtdeAvaliacao', 'clientes', 'qtdeClientes'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}