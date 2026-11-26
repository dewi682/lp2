# Form Pembuatan Landingpage - PHP + Supabase + Vercel

Halaman:
- `/`        form untuk pelanggan
- `/admin`   daftar data masuk (login password), tombol chat WhatsApp, tandai sudah dihubungi, hapus, unduh CSV
- `/health`  cek konfigurasi & koneksi database (tidak menampilkan rahasia)

## 1. Supabase
1. Buat project di supabase.com
2. SQL Editor -> New query -> tempel isi `supabase.sql` -> Run
3. Project Settings -> API: salin **Project URL** dan **secret key / service_role key**
   (BUKAN anon/publishable key)

## 2. Vercel - Environment Variables
| Nama | Isi | Wajib |
|---|---|---|
| SUPABASE_URL | https://xxxx.supabase.co | ya |
| SUPABASE_SERVICE_ROLE_KEY | secret / service_role key | ya |
| ADMIN_PASSWORD | password panjang untuk /admin | ya, untuk admin |
| WA_ADMIN | nomor WA Anda, format 628xxxx | tidak (menampilkan tombol chat setelah submit) |

Setelah mengubah variable, lakukan **Redeploy**.

## 3. Deploy
Lewat GitHub: upload isi folder ini ke repo -> Vercel > Add New > Project > Import,
Framework Preset = Other, isi Environment Variables, Deploy.

Lewat CLI (di dalam folder ini):
    npm i -g vercel
    vercel login
    vercel
    vercel env add SUPABASE_URL
    vercel env add SUPABASE_SERVICE_ROLE_KEY
    vercel env add ADMIN_PASSWORD
    vercel --prod

## 4. Tes
1. Buka `https://domain-anda.vercel.app/health` -> database harus bertuliskan "OK".
2. Isi form di HP -> data muncul di `/admin`.

## Masalah umum
- health: "tabel belum dibuat" -> jalankan supabase.sql
- health: "key ditolak" -> pakai secret/service_role key
- health: variabel false -> variabel belum diisi / belum Redeploy
