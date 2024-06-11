<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acessos;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    //
    public function registrarAcesso($user)
    {
        $ip = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $entity = [
            'IP' => $ip,
            'Link' => $url,
            'Source' => $_SERVER['REQUEST_URI'],
            'UserId' => $user
        ];

        Acessos::create($entity); 
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

    function perfilPorNome($nomeUsuario)
    {
        try {
            // retornar o perfil
            $wherePerfil = [ ['Status', '=', '1'], ['NomeUsuario', '=', $nomeUsuario] ];
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
