<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Categoria;

class CategoriaController extends Controller
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
}
