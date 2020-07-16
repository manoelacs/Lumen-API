<?php


namespace App\Http\Middleware;


use App\User;
use Firebase\JWT\JWT;
use Laravel\Lumen\Http\Request;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        try {
            if (!$request->hasHeader('Authorization')){
                new \Exception('sem autorization');
            }

            $authotizationHeader = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $authotizationHeader);
            $dadosAutenticacao = JWT::decode($token, env('JWT_KEY'), ['HS256']);

            $user = User::where('email', $dadosAutenticacao->email)->first();
            if (is_null($user)){
                throw new \Exception('Usuario não encontrado');
            }
            return $next($request);
        }
        catch (\Exception $exception){
            return response()->json(
                'Não autorizado',
                401
            );

        }


    }

}
