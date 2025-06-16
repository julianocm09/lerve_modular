<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class DeleteUserService
{
    /**
     * Exclui um usuário pelo ID
     */
    public function delete(int $userId): bool
    {
        $user = User::find($userId);

        if (!$user) {
            return false; // ou lançar uma exceção
        }

        try {
            $user->delete();
            return true;
        } catch (\Exception $e) {
            Log::error("Erro ao excluir usuário ID $userId: " . $e->getMessage());
            return false;
        }
    }
}
