# Passaporte

Sistema web para gerenciamento e participação em eventos, desenvolvido como Trabalho de Conclusão de Curso (TCC) do curso Técnico em Desenvolvimento de Sistemas.

---

## 📌 Sobre o projeto

O **Passaporte** é uma plataforma para criação, organização e participação em eventos.

O sistema permite que organizadores criem eventos e que participantes possam se inscrever, visualizar detalhes e gerenciar suas inscrições.

O objetivo é facilitar a divulgação e o controle de eventos acadêmicos, culturais e sociais.

---

## 🚀 Funcionalidades

### 👤 Participante
- Cadastro e login
- Visualização de eventos disponíveis
- Página de detalhes do evento
- Inscrição em eventos
- Cancelamento de inscrição
- Visualização de perfil

### 🧑‍💼 Organizador
- Criação de eventos
- Edição de eventos
- Exclusão de eventos
- Upload de banner
- Gerenciamento de categorias

### ⚙️ Sistema
- Controle de acesso por perfil (organizador/participante)
- Relacionamento entre usuários e eventos
- Geração de código de inscrição
- Upload e armazenamento de imagens
- Dashboard do usuário

---

## 🛠️ Tecnologias utilizadas

### Back-end
- PHP 8.2
- Laravel 12

### Front-end
- Blade
- Tailwind CSS
- DaisyUI

### Banco de dados
- SQLite

### Ferramentas
- Visual Studio Code
- Git
- GitHub

---

## 🗄️ Banco de dados

### users
- id
- name
- email
- password
- role

### categories
- id
- name

### events
- id
- user_id
- category_id
- title
- description
- date_time
- location
- capacity
- banner_path

### event_user
- id
- user_id
- event_id
- ticket_code
- status

---

## 📦 Instalação

```bash
git clone https://github.com/SEU-USUARIO/passaporte-io.git
