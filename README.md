# TunaTrack

TunaTrack is a parcel and fleet tracking platform built for shuttle and logistics businesses in Kenya. It helps operators manage companies, offices, vehicles, drivers, and parcel status updates in one place while giving customers a simple way to track shipments.

## Who it's for

- Shuttle and logistics operators
- Fleet managers and dispatch teams
- Businesses with multiple offices and vehicle pools
- Customer support teams that need real-time shipment visibility

## What it does

- Manage companies, client offices, and users
- Track vehicle registrations and driver assignments
- Support bulk import of users and vehicles
- Provide a Filament admin dashboard for operational workflows
- Surface parcel tracking information through a user-facing experience
- Audit key changes in the system for operational accountability

## Tech stack

- PHP 8.2
- Laravel 12
- Filament 3
- PostgreSQL
- Vite + Tailwind CSS
- Laravel Spatie Permission and auditing packages

## Repository structure

- [filament-app](./filament-app) — Laravel application and admin dashboard
- [index.html](./index.html) — marketing/landing page for TunaTrack
- [track.html](./track.html) — parcel tracking page
- [privacy.html](./privacy.html) and [terms.html](./terms.html) — policy pages

## Getting started

### Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+
- PostgreSQL

### Install

```bash
cd filament-app
cp .env.example .env
composer install
php artisan key:generate
npm install
```

### Configure the database

Update the database settings in `.env` to match your local PostgreSQL instance, then run:

```bash
php artisan migrate
php artisan db:seed
```

### Run the app

```bash
npm run dev
php artisan serve
```

Then open:

- http://localhost:8000
- or the Vite dev server for front-end assets when using the local build pipeline

## Roadmap

See [ROADMAP.md](./ROADMAP.md) for the planned roadmap and milestones.

## License

This project is licensed under the MIT License. See [LICENSE](./LICENSE) for details.
