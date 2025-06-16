<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class RenewPlanService
{
    /**
     * Renova o plano atualizando o campo data_vencimento para 3 dias no futuro.
     *
     * @param int $planId
     * @return bool
     */
    public function renew(int $userId): bool
    {
        $plan = User::find($userId);

        if (!$plan) {
            // Você pode optar por lançar uma exceção se o plano não existir
            return false;
        }

        try {
            // Define data_vencimento para 30 dias a partir de hoje
            $plan->data_vencimento = Carbon::now()->addDays(30);
            $plan->save();

            return true;
        } catch (\Exception $e) {
            // Loga o erro para análise
            Log::error("Erro ao renovar o plano (ID: $userId): " . $e->getMessage());
            return false;
        }
    }
}
