-- Jalankan di Supabase > SQL Editor > New query > Run
-- Aman dijalankan berulang kali (tidak menghapus data yang sudah ada).
create table if not exists public.landingpage_requests (
  id           bigint generated always as identity primary key,
  nama         text not null,
  no_whatsapp  text not null,
  nama_usaha   text not null,
  punya_domain text not null check (punya_domain in ('ya', 'tidak')),
  nama_hosting text,
  status       text not null default 'baru' check (status in ('baru', 'dihubungi')),
  created_at   timestamptz not null default now()
);

-- Jika tabel lama sudah ada, tambahkan kolom baru:
alter table public.landingpage_requests
  add column if not exists status text not null default 'baru';
alter table public.landingpage_requests
  add column if not exists nama_hosting text;

create index if not exists landingpage_requests_created_idx
  on public.landingpage_requests (created_at desc);

-- Kunci akses publik. Hanya server (PHP) dengan secret/service_role key yang bisa baca/tulis.
alter table public.landingpage_requests enable row level security;
