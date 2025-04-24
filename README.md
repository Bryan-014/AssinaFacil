# 📘 Visão Geral do Assina Fácil

O Assina Fácil é uma plataforma digital voltada para a gestão de clientes, serviços e pagamentos, com foco em três perfis de usuários: Administrador, Revendedor e Cliente. A aplicação é dividida em dois ambientes principais para melhor segmentação e controle de acesso.

---

## 🏗️ Estrutura do Sistema

O sistema será composto por dois ambientes principais:

- **Painel Administrativo**: Interface exclusiva para o gestor do sistema (Administrador).
- **Painel do Cliente**: Área exclusiva para os clientes finais, acessada mediante login e senha individual.

---

## 👥 Atores do Sistema

### Cliente
- Criado a partir do cadastro feito por um Revendedor.
- Pode visualizar e efetuar seus pagamentos pendentes.
- Tem acesso ao seu histórico de pagamentos.

### Revendedor
- Gerencia seus próprios clientes.
- Tem acesso ao histórico completo de pagamentos dos clientes.

### Administrador
- Acesso total ao sistema.
- Gerencia os Revendedores.
- Possui todas as permissões de um Revendedor.

---

## ✅ Casos de Uso

### 🔐 Autenticação
- **Manter Autenticação**: Login e logout com chaves específicas para cada tipo de usuário.

### 👥 Gestão de Usuários
- **Manter Clientes**: O Revendedor pode cadastrar, editar, atualizar e excluir seus clientes.
- **Manter Revendedores**: O Administrador pode cadastrar, editar e excluir Revendedores.

### 🛠️ Gestão de Serviços
- **Manter Serviços**: O Revendedor pode gerenciar (cadastrar, editar, excluir) os serviços disponíveis.
- **Contratar Serviço**: O Cliente pode contratar novos serviços pela plataforma.
- **Cancelar Serviço**: O Cliente pode cancelar a contratação de um serviço.

### 💸 Pagamentos
- **Visualizar Pagamentos Pendentes**: O Cliente pode ver os pagamentos que ainda não foram realizados.
- **Efetuar Pagamento**: O Cliente pode realizar pagamentos via Pix.
- **Visualizar Histórico de Pagamentos (Cliente)**: Acesso ao histórico pessoal de pagamentos.
- **Visualizar Histórico Completo (Revendedor)**: Visualização completa dos pagamentos de todos os clientes do revendedor.
- **Notificações de Pagamento**:
  - O sistema notifica o **Revendedor** quando um cliente realiza um pagamento.
  - O sistema notifica o **Cliente** quando o prazo de pagamento estiver próximo do vencimento.

---

## ✅ Requisitos Funcionais

| Código | Descrição |
|--------|-----------|
| RF01 | Login com credenciais específicas para Clientes, Revendedores e Administradores |
| RF02 | Logout seguro para todos os usuários |
| RF03 | Cadastro de novos clientes pelo Revendedor |
| RF04 | Edição de dados dos clientes pelo Revendedor |
| RF05 | Exclusão de clientes pelo Revendedor |
| RF06 | Acesso restrito à plataforma apenas para clientes cadastrados por um Revendedor |
| RF07 | Cadastro de novos serviços pelo Revendedor |
| RF08 | Edição de serviços pelo Revendedor |
| RF09 | Exclusão de serviços pelo Revendedor |
| RF10 | Cliente pode visualizar serviços disponíveis |
| RF11 | Cliente pode contratar novos serviços |
| RF12 | Cliente pode visualizar pagamentos pendentes |
| RF13 | Cliente pode efetuar pagamentos via Pix |
| RF14 | Cliente pode visualizar seu histórico de pagamentos |
| RF15 | Cliente pode cancelar um serviço contratado |
| RF16 | Revendedor pode visualizar histórico completo dos pagamentos de seus clientes |
| RF17 | Revendedor pode visualizar lista de clientes com pagamentos pendentes |
| RF18 | Administrador pode cadastrar, editar e excluir Revendedores |
| RF19 | Apenas o Administrador tem acesso ao gerenciamento de Revendedores |
| RF20 | Revendedor é notificado quando um cliente efetua um pagamento |
| RF21 | Cliente é notificado quando o prazo de pagamento está próximo do vencimento |
