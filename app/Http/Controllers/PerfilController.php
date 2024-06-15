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
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller 
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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

                $destinationThumbPath = "images/thumb";
                if (!file_exists($destinationThumbPath)) 
                    mkdir($destinationThumbPath, 0777, true);

                $image = $request->file('Logotipo');
                $data['Logotipo'] = uniqid(date('HisYmd')).'.'.$image->extension();
                $img = Image::make($image->path());
                $img->resize(280, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$data['Logotipo']);
                $img->resize(30, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationThumbPath.'/'.$data['Logotipo']);
            }

            $response = Perfil::find($id)->update($data);

            if ($response) {
                $this->message = 'Perfil atualizado com sucesso';
                $this->typeMessage = 'success';
            }
            
            return redirect('/dashboard/perfil')->with(['message' => $this->message, 'typeMessage' => $this->typeMessage]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function perfil($userId)
    {
        try {
            return DB::table('perfil')
                ->select('id', 'Nome', 'NomeUsuario', 'Logotipo', 'Telefone', 'WhatsApp', 
                    'Localizacao', 'LinkMaps', 'HorarioAtendimento', 
                    'Buscador', 'Delivery', 'Avaliacoes')
                ->where([ ['Status', '=', '1'], ['UserId', '=', $userId] ])->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function perfilPorNomeUsuario($nomeUsuario)
    {
        try {
            return DB::table('perfil')
                ->select('id', 'Nome', 'NomeUsuario', 'Logotipo', 'Telefone', 'WhatsApp', 
                    'Localizacao', 'LinkMaps', 'HorarioAtendimento', 
                    'Buscador', 'Delivery', 'Avaliacoes')
                ->where([ ['Status', '=', '1'], ['NomeUsuario', '=', $nomeUsuario] ])->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}