# Script para publicar alterações no GitHub via git push

Write-Host "Digite a mensagem do commit:" -ForegroundColor Cyan
$msg = Read-Host

git add .

if ($msg -eq "") {
    Write-Host "Mensagem do commit não pode ser vazia. Abortando." -ForegroundColor Red
    exit
}

git commit -m "$msg"

git push origin main

Write-Host "Publicação concluída!" -ForegroundColor Green
Pause
