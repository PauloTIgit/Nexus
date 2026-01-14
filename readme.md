# 🚀 Nexus Framework — v4

![Status](<https://img.shields.io/badge/status-ativo%20(v4)-brightgreen>)
![PHP](https://img.shields.io/badge/PHP-8.1%2B-blue)
![Architecture](https://img.shields.io/badge/Architecture-MVC%20Modular-purple)
![License](https://img.shields.io/badge/license-Proprietário-red)

**Nexus** é um **microframework PHP moderno**, projetado para desenvolvedores que constroem **sistemas sob medida**, **APIs escaláveis** e **aplicações web profissionais**.  
Seu foco está em **produtividade**, **organização arquitetural** e **manutenção a longo prazo**, evitando a complexidade desnecessária de frameworks monolíticos.

---

## 🎯 Objetivos do Framework

- 🔹 Acelerar o desenvolvimento de aplicações PHP profissionais
- 🔹 Padronizar a arquitetura em projetos sob medida
- 🔹 Facilitar manutenção, evolução e escalabilidade
- 🔹 Separação clara entre **Web**, **API** e **Domínio**
- 🔹 Código limpo, previsível e orientado a boas práticas

---

## 🧱 Arquitetura

O **Nexus Framework** adota uma arquitetura **MVC Modular**, baseada em princípios consolidados de engenharia de software:

- **Clean Architecture**
- **SOLID**
- **Object Calisthenics**
- **DDD pragmático**

A estrutura foi desenhada para garantir **baixo acoplamento**, **alta coesão** e **evolução contínua** do código.

---

## 🛠️ Stack Tecnológica

- **PHP 8.1+**
- **MySQL / MariaDB**
- **Tailwind CSS**
- **Arquitetura MVC personalizada**
- **Microframework artesanal**
- **Configuração por ambiente (.env)**

---

## 📂 Estrutura de Diretórios — v4

```bash
/
├── api/
│   └── v1/
│       ├── app/
│       │   ├── Controller/
│       │   ├── DTO/
│       │   ├── Model/
│       │   ├── Repository/
│       │   ├── Service/
│       │   └── Route/
│       └── src/
│           ├── logs/
│           └── uploads/
│
├── web/
│   ├── app/
│   │   ├── Controller/
│   │   ├── Model/
│   │   ├── Route/
│   │   ├── View/
│   │   └── Components/
│   └── src/
│       ├── css/
│       ├── js/
│       ├── images/
│       └── fonts/
│
├── resource/
│   ├── data/
│   │   └── schema.sql
│   ├── config/
│   └── env.php
│
├── storage/
│   ├── cache/
│   └── logs/
│
├── vendor/
│
├── .env
├── composer.json
└── index.php
```

## 🧩 Camadas do Sistema

O **Nexus Framework v4** adota uma arquitetura **MVC Modular**, baseada em princípios consolidados de engenharia de software:

### 📌 Controller

- **Recebe e valida requisições**
- **Converte dados de entrada**
- **Delegação total para a camada de Service**

### 📌 Service

- **Implementa regras de negócio**
- **Orquestra fluxos da aplicação**
- **Comunica-se com Repository e DTOs**

### 📌 Repository

- **Centraliza acesso a dados**
- **Isola queries SQL**
- **Facilita manutenção e testes**

### 📌 DTO (Data Transfer Object)

- **Padroniza transporte de dados**
- **Evita acoplamento entre camadas**
- **Garante consistência de dados**

### 📌 View & Components

- **Views desacopladas da lógica**
- **Componentes reutilizáveis**
- **Integração nativa com Tailwind CSS**

## ⚙️ Configuração de Ambiente

- **Pré-requisitos**
- **PHP 8.1+**
- **MySQL ou MariaDB**
- **Apache ou Nginx**
- **XAMPP ou DOCKER**

## 🔐 Licença

Este projeto é proprietário.
O uso, redistribuição ou modificação do **Nexus Framework** depende de autorização expressa do autor.

## 🧠 Público-Alvo

- **Desenvolvedores PHP**
- **Freelancers e agências**
- **Empresas que desenvolvem software sob medida**
- **Projetos que exigem controle total da arquitetura**

## 👨‍💻 Autor

Paulo Fernando Ferreira Pires
Empreendedor & Desenvolvedor Full Stack
Especialista em arquitetura PHP e sistemas sob medida

🌐 https://www.paulodevelop.com

## 🔮 Roadmap

- [] **CLI oficial do Nexus (nexus make:controller)**
- [] **Middleware HTTP**
- [] **Autenticação JWT nativa**
- [] **Camada de Events & Listeners**
- [] **Documentação oficial**
