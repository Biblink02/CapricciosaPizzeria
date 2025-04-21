# CapricciosaPizzerie  
_A restaurant website built with Laravel11, Inertia+Vue3 and Filament3_

---

## ✨ Why this project matters
CapricciosaPizzerie is a full‑stack app with a customer‑facing site and back‑office—built for a pizzeria but adaptable to any SaaS or content‑heavy platform.

* **Domain‑driven modeling** – Suppliers, Ingredients, Dishes, Menus, Events, Allergens and more are first‑class models with UUIDs, validation rules and observers.  
* **Modern PHP 8.2** – strict types, enums (e.g. `Lang`) and readonly properties drive safety.  
* **Vue3 + PrimeVue + Tailwind4** – typed Single File Components with i18n and accessibility baked in.  
* **Filament3 Admin** – a no‑code CMS for content editors, generated resources cover every entity.  
* **Clean DevEx** – Pint, ESLint, Prettier, TypeScript, and PHPUnit keep the codebase consistent and green.  
* **Hard‑won extras** – JSON‑LD SEO, multilingual content, image optimisation, sitemap generation and real‑time Google Analytics hooks.

---

## 🏗️  Tech stack

| Layer         | Technology                                        | Highlight                                                      |
|---------------|---------------------------------------------------|----------------------------------------------------------------|
| **Backend**   | Laravel11, PHP8.2, Jetstream(+Fortify+Sanctum)    | Auth, API tokens, two‑factor, rate‑limiting                    |
| **Admin**     | Filament3                                         | Declarative resources, role‑based dashboards                   |
| **Front‑end** | Inertia+Vue3, PrimeVue, TailwindCSS4, Vite        | SSR‑ready SPA with high Lighthouse scores                      |
| **Data**      | MySQL/MariaDB, Eloquent, UUID PKs                 | 30+ migrations & seeders                                       |
| **Tooling**   | Composer, npm, TypeScript, ESLint, Pint, Prettier | Consistent style across PHP & TS                               |
| **Ops**       | Artisan CLI, Docker‑ready, CI friendly            | Custom commands: `app:convert-to-webp`, `app:generate-sitemap` |

---

## 🌍  Internationalisation & Accessibility

* **Full i18n** – Italian (_default_) and English JSON catalogs with lazy language detection.  
* **Semantic HTML & ARIA** – navigation, dialogs and forms meet WCAG2.1 AAstandards(FE components reference the translations to build correct labels).  
* **Structured data** – JSON‑LD Restaurant schema injected at runtime to improve rich‑search results.  

---

## ⚙️  Local setup

```bash
# Prerequisites: PHP 8.2+, Node 20+, Composer 2, MySQL/MariaDB
git clone https://github.com/your‑handle/capricciosa‑pizzerie.git
cd capricciosa‑pizzerie

cp .env.example .env          # edit DB creds, mail, GA, etc.

./run.local.sh
```

---

## 🛠️ Useful artisan commands

| Command                   | Purpose                                                                                   |
|---------------------------|-------------------------------------------------------------------------------------------|
| `app:convert-to-webp`     | Converts every JPEG/PNG attached to **Events** and **Suppliers** to WebP, updating the DB |
| `app:generate-sitemap`    | Builds `public/sitemap.xml` for SEO‑ready deployment                                      |
| `optimize`/`config:cache` | Zero‑downtime cache warm‑ups                                                              |

---

## 📁  High‑level folder map

```text
app/        Domain logic (Actions, Models, Enums, Observers, Console, Filament)
resources/  Vue3 SFCs, Tailwind, i18n JSON, Blade root
database/   Migrations, Seeders, Factories
routes/     Web, API & CLI entry points
tests/      Feature & Unit test suites
```

---

## 📜  License

This code is released under the **MIT license** and is free to adapt for educational or commercial use (attribution appreciated).


