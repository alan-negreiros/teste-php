---
# Instalação e Execução do Projeto no Windows

  

Este documento descreve detalhadamente todos os passos realizados para configurar o ambiente (PHP e MariaDB), inicializar o banco de dados e rodar a aplicação a partir do zero no Windows.

  

  

## 🛠️ Passo 1: Verificação de Pré-requisitos Existentes

  

1. Executar testes para identificar se o PHP e o MySQL já estão disponíveis no sistema:

-  `php -v`

-  `mysql --version`

2. Verificar a disponibilidade de gerenciadores de pacotes no Windows:

-  `winget --version`

## 🐘 Passo 2: Instalação do PHP 8.3

  

1.  **Instalação:** Instalando a versão portátil do PHP 8.3 via `winget`:

```powershell

winget install PHP.PHP.8.3 --accept-source-agreements --accept-package-agreements

```

Caminho de instalação:`
C:\Users\ {Usuario}\AppData\Local\Microsoft\WinGet\Packages\PHP.PHP.8.3_Microsoft.Winget.Source_8wekyb3d8bbwe`

`Usuario = Nome do perfil utilizado no sistema operacional para instalação`
  

---

  

## 🗄️ Passo 3: Instalação e Execução do MariaDB (MySQL)

  

Configuração para o MariaDB rodar como um processo local de usuário.

  

1.  **Instalação:** Instalamos o MariaDB Server via `winget`:

```powershell

winget install -e --id MariaDB.Server --silent --custom "/qn PASSWORD=" --accept-source-agreements --accept-package-agreements

```

*Caminho de instalação:*  `C:\Program Files\MariaDB 12.3`

---

  

## 🚀 Como Executar o Projeto

  

Se você fechar o terminal e quiser subir o projeto novamente, basta abrir um terminal do PowerShell na pasta do projeto e executar este comando:

  

1.  **Iniciar o Servidor de Banco de Dados e Iniciar o Servidor Web PHP:**

```powershell

Start-Process "C:\Program Files\MariaDB 12.3\bin\mariadbd.exe" -ArgumentList '--datadir=C:\Users\Alan\Desktop\teste-php\db-data','--port=3306','--console'; Start-Process "C:\Users\Alan\AppData\Local\Microsoft\WinGet\Packages\PHP.PHP.8.3_Microsoft.Winget.Source_8wekyb3d8bbwe\php.exe" -ArgumentList '-S','localhost:8000' -WorkingDirectory 'C:\Users\Alan\Desktop\teste-php'

```
```
2. Abra o navegador e acesse: http://localhost:8000/