# Refatoração Laravel - Form Requests e Resources

## Form Requests Criados

### Autenticação
- `LoginRequest` - Validação de login

### Usuários
- `StoreUserRequest` - Validação para criar usuário
- `UpdateUserRequest` - Validação para atualizar usuário

### Eventos
- `StoreEventRequest` - Validação para criar evento
- `UpdateEventRequest` - Validação para atualizar evento

### Projetos
- `StoreProjectRequest` - Validação para criar projeto
- `UpdateProjectRequest` - Validação para atualizar projeto

### Apoiadores
- `StoreSponsorRequest` - Validação para criar apoiador
- `UpdateSponsorRequest` - Validação para atualizar apoiador

### Doações
- `StoreDonationRequest` - Validação para criar doação

## Resources Criados

- `UserResource` - Formatação de dados do usuário
- `EventResource` - Formatação de dados do evento
- `ProjectResource` - Formatação de dados do projeto
- `SponsorResource` - Formatação de dados do apoiador
- `DonationResource` - Formatação de dados da doação

## Controllers Atualizados

### AuthController
- Usa `LoginRequest` e `UserResource`
- Retorna token no formato esperado pelo frontend
- Inclui `expires_in` e `token_type`

### UserController
- Usa `StoreUserRequest`, `UpdateUserRequest` e `UserResource`
- Remove validação manual
- Retorna recursos formatados

### EventController
- Usa `StoreEventRequest`, `UpdateEventRequest` e `EventResource`
- Adiciona geração automática de slug
- Método `showBySlug` para busca por slug

### ProjectController
- Usa `StoreProjectRequest`, `UpdateProjectRequest` e `ProjectResource`
- Adiciona geração automática de slug

### SponsorController
- Usa `StoreSponsorRequest`, `UpdateSponsorRequest` e `SponsorResource`

### DonationController (Novo)
- Usa `StoreDonationRequest` e `DonationResource`
- Métodos `index` e `store`

## Rotas Atualizadas

### Rotas Públicas
- `GET /api/events` - Listar eventos
- `GET /api/events/{id}` - Ver evento
- `GET /api/events/slug/{slug}` - Buscar evento por slug
- `GET /api/sponsors` - Listar apoiadores
- `GET /api/users` - Listar usuários

### Rotas Protegidas
- Todas as operações de criação, atualização e exclusão
- Doações (listagem e criação)

## Benefícios

1. **Separação de Responsabilidades**: Validação separada dos controllers
2. **Reutilização**: Form Requests podem ser reutilizados
3. **Consistência**: Resources garantem formato consistente das respostas
4. **Manutenibilidade**: Código mais limpo e organizado
5. **Testabilidade**: Cada componente pode ser testado isoladamente

## Formato de Resposta Padronizado

Todas as respostas agora seguem o padrão camelCase para compatibilidade com o frontend JavaScript:

```json
{
  "id": 1,
  "firstName": "João",
  "secondName": "Silva",
  "coverImage": "http://localhost:8000/storage/events/image.jpg",
  "createdAt": "2024-01-01T00:00:00.000000Z"
}
```