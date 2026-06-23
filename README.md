# Passaporte.io

Sistema web para gerenciamento e participação em eventos, desenvolvido como Trabalho de Conclusão de Curso (TCC) do curso Técnico em Desenvolvimento de Sistemas.

---

## Sobre o projeto

O Passaporte.io é uma plataforma que conecta organizadores e participantes de eventos. Organizadores podem criar e gerenciar eventos com controle total sobre capacidade, categorias e banner. Participantes descobrem eventos, inscrevem‑se e acompanham seus ingressos digitais.

A arquitetura segue princípios de segurança, integridade referencial e performance, conforme especificado nos requisitos do projeto.

---

## Funcionalidades

### Participante
- Cadastro e login
- Listagem de eventos com filtro por categoria
- Página de detalhes do evento
- Inscrição e cancelamento de inscrição
- Geração automática de código de ingresso (ticket_code)
- Histórico de inscrições

### Organizador
- Cadastro e login
- Criação, edição e exclusão de eventos
- Upload de banner (com validação de formato e tamanho)
- Vinculação automática do evento ao organizador logado
- Restrição de acesso: só pode gerenciar seus próprios eventos

### Sistema
- Controle de acesso por perfil (middleware `organizer` e `participant`)
- Proteção contra CSRF em todas as operações de escrita
- Prevenção de N+1 queries (eager loading)
- Integridade referencial com foreign keys
- Senhas criptografadas (bcrypt)
- Mensagens flash de feedback (sucesso/erro)

---

## Tecnologias

- **Back-end:** PHP 8.2, Laravel 12
- **Front-end:** Blade, Tailwind CSS, DaisyUI 4
- **Banco de dados:** SQLite (padrão) ou MySQL/PostgreSQL
- **Ferramentas:** Composer, Node, Git, VS Code

---

## Estrutura do banco de dados

- **users** (id, name, email, password, role)
- **categories** (id, name)
- **events** (id, user_id, category_id, title, description, date_time, location, capacity, banner_path, timestamps)
- **event_user** (id, user_id, event_id, ticket_code, status, timestamps)

Relacionamentos:
- Evento pertence a um organizador (`user_id`) e a uma categoria.
- Participantes se inscrevem via tabela pivô `event_user`, que contém o código do ingresso.

---

## Instalação e execução

### Pré‑requisitos
- PHP 8.2+
- Composer
- Node.js (para compilar assets, opcional)

### Passo a passo

1. **Clone o repositório**
   ```bash
   git clone https://github.com/marianarigueiro/passaporte-io.git
   cd passaporte-io

   composer install

   cp .env.example .env

   php artisan key:generate

   php artisan storage:link

   php artisan migrate --seed

   php artisan serve

   Acesse http://localhost:8000.

## Credenciais de teste
Após rodar os seeders, você terá dois usuários prontos para validação:

- Organizador
E‑mail: organizer@example.com
Senha: password

- Participante
E‑mail: participant@example.com
Senha: password

## Observações técnicas

O sistema utiliza eager loading nas listagens para evitar o problema N+1.

As validações de formulário retêm os dados antigos (old()) em caso de erro.

O upload de banner exige imagem válida de até 2 MB; o nome do arquivo é ofuscado para evitar conflitos.

A exclusão de evento é bloqueada se houver inscrições ativas, conforme regra de negócio.

As rotas administrativas são protegidas por middleware que verifica o perfil (organizer) e a propriedade do registro.

## Licença

Projeto acadêmico – uso livre para fins educacionais.

- Esses arquivos reescritos mantêm toda a funcionalidade original, agora com tema escuro profissional, responsivo e sem nenhum elemento que remeta a geração automática. Se precisar de ajustes adicionais, é só avisar.
