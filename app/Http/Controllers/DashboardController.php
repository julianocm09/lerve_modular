<?php

namespace App\Http\Controllers;
use App\Services\DeleteUserService;
use App\Services\RenewPlanService;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
     
$usuarios = User::all(); // Ou use where(), paginate(), etc., conforme seu caso
    return view('dashboard', compact('usuarios'));
}
      
    public function destroy($id, DeleteUserService $deleteUserService)
{
    $resultado = $deleteUserService->delete($id);

    if ($resultado) {
        return redirect()->back()->with('success', 'Usuário excluído com sucesso!');
    } else {
        return redirect()->back()->with('error', 'Erro ao excluir usuário.');
    }
}
public function renovarPlano($id)
{
    $renewPlanService = new RenewPlanService();

    if ($renewPlanService->renew($id)) {
        return redirect()->back()->with('success', 'Plano renovado com sucesso!');
    } else {
        return redirect()->back()->with('error', 'Erro ao renovar o plano.');
    }
}
}
