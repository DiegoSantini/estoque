# 📦 Sistema de Controle de Estoque

Sistema completo de **controle de estoque** desenvolvido com **Laravel**, **PHP** e **SQLite**.  
Gerencie **categorias, produtos e movimentações** com atualização automática de estoque.

---

## 🚀 Funcionalidades

- ✅ **CRUD de Categorias** - Organize seus produtos
- ✅ **CRUD de Produtos** - Cadastre e gerencie itens
- ✅ **Movimentações** - Registre entradas e saídas
- ✅ **Estoque Automático** - Cálculo em tempo real
- ✅ **Filtros Inteligentes** - Busque por categoria
- ✅ **Interface Moderna** - Design responsivo com Bootstrap


## ⚙️ Instalação e Configuração

### 📋 Pré-requisitos
- PHP 8.2 ou superior
- Composer
- Extensões PHP: sqlite3, pdo_sqlite

### 🔧 Passo a passo

**1. Clone o repositório**
```bash
git clone https://github.com/seu-usuario/estoque-laravel.git
cd estoque-laravel
```

**2. Instale as dependências**
```bash
composer install
```

**3. Configure o ambiente**
```bash
# Copie o arquivo de configuração
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate
```

**4. Configure o banco de dados**

Edite o arquivo `.env` com as seguintes configurações:
```env
DB_CONNECTION=sqlite
DB_DATABASE=/caminho/absoluto/para/projeto/database/database.sqlite
```

**5. Execute as migrações**
```bash
php artisan migrate
```

**6. Inicie o servidor**
```bash
php artisan serve
```

🎉 **Pronto!** Acesse: http://127.0.0.1:8000


## 🎯 Como Usar

1. **Categorias**: Acesse `/categorias` para criar e gerenciar categorias
2. **Produtos**: Vá para `/produtos` para cadastrar itens do estoque
3. **Movimentações**: Use `/movimentacoes` para registrar entradas e saídas

---
