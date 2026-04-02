# ⚽ ScoreClub — System Design & Brand Guide

Plataforma de palpites esportivos entre amigos, sem movimentação financeira direta.

---

## 🚀 Visão do Produto

**Objetivo:**
Criar ligas privadas onde usuários fazem palpites de placar e disputam rankings.

**Monetização:**
- Assinatura mensal/anual
- Planos: Free / Pro / Business

**Regras base:**
- ✅ Acertou placar → +3 pontos
- ⚠️ Acertou vencedor → +1 ponto
- ❌ Errou → 0 pontos

**Diferencial:**
- Social (ligas privadas)
- Ranking por rodada
- Histórico de acertos
- Estatísticas pessoais

---

## 🏗️ Arquitetura de Alto Nível

| Camada | Responsabilidade | Stack sugerida |
|--------|----------------|---------------|
| Frontend | UI, ranking, palpites | React / Next.js |
| Backend | API e regras | Node.js (Fastify / Nest) |
| Worker | Jobs assíncronos | Node + filas |
| Banco | Persistência | PostgreSQL |
| Cache | Ranking e jogos | Redis |
| Integração | Dados esportivos | ESPN API |
| Pagamento | Assinaturas | Stripe / Mercado Pago |
| Infra | Deploy | Docker + Traefik |

---

## 🔄 Fluxo Principal

1. Admin cria liga
2. Convida amigos
3. Usuários enviam palpites
4. Sistema busca resultado real
5. Calcula pontuação
6. Atualiza ranking

---

## 📊 Regras de Negócio

- Palpite bloqueia no início do jogo
- Empate precisa ser acertado corretamente
- Ranking por:
  1. Pontos
  2. Placar exato
  3. Tendência

---

## 🗄️ Modelo de Dados

### users
- id
- name
- email

### leagues
- id
- owner_user_id
- name

### matches
- id
- external_event_id
- home_team
- away_team
- score

### predictions
- id
- user_id
- match_id
- guess
- points

---

## 🔌 API (Exemplo)

```bash
POST /auth/login
GET /leagues
POST /leagues
GET /matches/today
POST /predictions
GET /ranking
```

---

## ⚙️ Jobs Assíncronos

- Importar jogos
- Atualizar resultados
- Calcular ranking
- Enviar notificações

---

## 🎨 Design System

### Cores (Light)

| Nome | Cor |
|------|----|
| Primary | #16A34A |
| Secondary | #1D4ED8 |
| Accent | #F59E0B |
| Background | #F6F8FB |
| Text | #0F172A |

### Cores (Dark)

| Nome | Cor |
|------|----|
| Background | #0B1220 |
| Surface | #111827 |
| Primary | #22C55E |
| Secondary | #60A5FA |
| Accent | #FBBF24 |
| Text | #E5EEFB |

---

## 🔤 Tipografia

- Principal: Inter
- Alternativa: Manrope

---

## 🧠 Roadmap

### Fase 1
- Ligas privadas
- Palpites
- Ranking

### Fase 2
- Notificações
- Estatísticas

### Fase 3
- App mobile
- Gamificação

---

## 💡 Insights

- Produto altamente social
- Crescimento orgânico via convites
- Ideal para SaaS B2C

---

## 🏁 Conclusão

ScoreClub é um produto com alto potencial de retenção, baseado em competição leve e interação social.

---

🔥 Próximo passo: criar MVP + landing page + autenticação + sistema de ligas.
