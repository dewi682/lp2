<?php
// Form Pembuatan Landingpage - PHP + Supabase (REST) di Vercel
// Halaman: /  (form)   /admin  (data masuk)   /health  (cek koneksi)

date_default_timezone_set('Asia/Jakarta');

const LOGO_DATA    = 'data:image/png;base64,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';
const FAVICON_DATA = 'data:image/png;base64,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';
const TABLE        = 'landingpage_requests';

/* ------------------------------------------------------------------ */
/* Helper umum                                                         */
/* ------------------------------------------------------------------ */
function env($k)
{
    $v = getenv($k);
    return $v === false ? '' : trim($v);
}

function e($s)
{
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

function security_headers($noindex = false)
{
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: DENY');
    header('Referrer-Policy: same-origin');
    if ($noindex) {
        header('X-Robots-Tag: noindex, nofollow');
        header('Cache-Control: no-store');
    }
}

/**
 * Panggil Supabase REST API.
 * Return: [kode_http, data_json, pesan_error]
 */
function sb($method, $path, $body = null, $extra = [])
{
    $base = rtrim(env('SUPABASE_URL'), '/');
    $base = preg_replace('#/rest/v1$#', '', $base);
    $key  = env('SUPABASE_SERVICE_ROLE_KEY');

    if ($base === '' || $key === '') {
        return [0, null, 'Variabel SUPABASE_URL / SUPABASE_SERVICE_ROLE_KEY belum diisi.'];
    }
    if (strpos($base, 'https://') !== 0) {
        return [0, null, 'SUPABASE_URL harus diawali https://'];
    }

    $headers = array_merge([
        'apikey: ' . $key,
        'Accept: application/json',
        'Content-Type: application/json',
    ], $extra);
    // Key lama (JWT, awalan eyJ) wajib juga dikirim sebagai Bearer. Key baru (sb_secret_) tidak.
    if (strpos($key, 'eyJ') === 0) {
        $headers[] = 'Authorization: Bearer ' . $key;
    }

    $ch = curl_init($base . '/rest/v1/' . $path);
    curl_setopt_array($ch, [
        CURLOPT_CUSTOMREQUEST  => $method,
        CURLOPT_HTTPHEADER     => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 12,
        CURLOPT_CONNECTTIMEOUT => 6,
    ]);
    if ($body !== null) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
    }
    $res  = curl_exec($ch);
    $code = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err  = curl_error($ch);
    curl_close($ch);

    if ($res === false) {
        return [0, null, $err !== '' ? $err : 'Koneksi ke Supabase gagal.'];
    }
    $data = json_decode($res, true);
    $ok   = $code >= 200 && $code < 300;
    $msg  = '';
    if (!$ok) {
        $msg = (is_array($data) && isset($data['message'])) ? $data['message'] : substr((string)$res, 0, 200);
    }
    return [$code, $data, $msg];
}

function redirect($to)
{
    header('Location: ' . $to, true, 303);
    exit;
}

/* ------------------------------------------------------------------ */
/* Tampilan bersama                                                    */
/* ------------------------------------------------------------------ */
function css()
{
    return <<<'CSS'
:root{--ink:#111;--muted:#666;--line:#e3e3e3;--bg:#f4f4f2;--card:#fff;--err:#c62828;--ok:#1b7f3b;--wa:#1faa59}
*{box-sizing:border-box}
html{-webkit-text-size-adjust:100%}
body{margin:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;background:var(--bg);color:var(--ink);line-height:1.5;padding-bottom:env(safe-area-inset-bottom,0px)}
.banner{background:#111;text-align:center;padding:calc(22px + env(safe-area-inset-top,0px)) 16px 22px}
.banner img{width:140px;max-width:42vw;height:auto;display:block;margin:0 auto}
.wrap{max-width:520px;margin:0 auto;padding:22px 16px 40px}
.wrap.wide{max-width:900px}
h1{font-size:1.4rem;line-height:1.25;margin:0 0 4px}
.sub{color:var(--muted);margin:0 0 20px;font-size:.95rem}
.card{background:var(--card);border:1px solid var(--line);border-radius:16px;padding:20px 16px}
.field{margin-bottom:20px}
.lbl{display:block;font-weight:600;margin-bottom:8px}
.req{color:var(--err)}
input[type=text],input[type=tel],input[type=password],input[type=search]{width:100%;font-size:16px;padding:14px;border:1.5px solid var(--line);border-radius:12px;background:#fff;color:var(--ink);-webkit-appearance:none;appearance:none}
input:focus{outline:none;border-color:var(--ink);box-shadow:0 0 0 3px rgba(0,0,0,.08)}
.opts{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.opt{position:relative;display:block}
.opt input{position:absolute;opacity:0;pointer-events:none}
.opt span{display:flex;align-items:center;justify-content:center;min-height:52px;border:1.5px solid var(--line);border-radius:12px;font-weight:600;cursor:pointer;background:#fff}
.opt input:checked+span{background:var(--ink);color:#fff;border-color:var(--ink)}
.opt input:focus-visible+span{box-shadow:0 0 0 3px rgba(0,0,0,.2)}
.err{color:var(--err);font-size:.88rem;margin-top:6px}
.alert{background:#fdecea;color:var(--err);border-radius:12px;padding:12px 14px;margin-bottom:16px;font-size:.92rem}
.note{color:var(--muted);font-size:.8rem;text-align:center;margin:12px 0 0}
.btn{display:flex;align-items:center;justify-content:center;width:100%;font-size:17px;font-weight:700;padding:15px;border:0;border-radius:12px;background:var(--ink);color:#fff;cursor:pointer;min-height:54px;text-decoration:none;font-family:inherit}
.btn:active{transform:scale(.99)}
.btn:disabled{opacity:.6}
.btn.wa{background:var(--wa)}
.btn.ghost{background:#fff;color:var(--ink);border:1.5px solid var(--line)}
.btn.sm{width:auto;font-size:14px;padding:10px 14px;min-height:42px;border-radius:10px}
.hp{position:absolute;left:-9999px;height:0;overflow:hidden}
.done{text-align:center;padding:12px 4px}
.done .tick{width:64px;height:64px;border-radius:50%;background:#e7f6ec;color:var(--ok);display:flex;align-items:center;justify-content:center;font-size:34px;margin:0 auto 14px}
.done h2{margin:0 0 6px}
.done p{margin:0 0 16px;color:var(--muted)}
.done .btn{margin-top:10px}
.topbar{display:flex;flex-wrap:wrap;gap:8px;align-items:center;justify-content:space-between;margin-bottom:14px}
.stats{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-bottom:14px}
.stat{background:#fff;border:1px solid var(--line);border-radius:12px;padding:10px;text-align:center}
.stat b{display:block;font-size:1.3rem}
.stat small{color:var(--muted)}
.item{background:#fff;border:1px solid var(--line);border-radius:14px;padding:14px;margin-bottom:10px}
.item h3{margin:0;font-size:1.05rem}
.item .meta{color:var(--muted);font-size:.88rem;margin:2px 0 8px}
.badges{display:flex;flex-wrap:wrap;gap:6px;margin-bottom:10px}
.badge{font-size:.76rem;font-weight:700;padding:3px 9px;border-radius:99px;background:#eee}
.badge.ok{background:#e7f6ec;color:var(--ok)}
.badge.new{background:#fff4d6;color:#8a6100}
.actions{display:flex;flex-wrap:wrap;gap:8px}
.actions form{margin:0}
.empty{text-align:center;color:var(--muted);padding:30px 10px}
CSS;
}

function page_head($title, $noindex = false)
{
    security_headers($noindex);
    header('Content-Type: text/html; charset=UTF-8');
    echo '<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">';
    echo '<meta name="theme-color" content="#111111">';
    if ($noindex) {
        echo '<meta name="robots" content="noindex,nofollow">';
    }
    echo '<title>' . e($title) . '</title>';
    echo '<link rel="icon" type="image/png" href="' . FAVICON_DATA . '">';
    echo '<style>' . css() . '</style></head><body>';
    echo '<header class="banner"><img src="' . LOGO_DATA . '" alt="Supporter Entrepreneur Hub" width="140" height="140"></header>';
}

function page_foot()
{
    echo '</body></html>';
}

/* ------------------------------------------------------------------ */
/* Halaman: FORM                                                       */
/* ------------------------------------------------------------------ */
function normalize_wa($raw)
{
    $wa = preg_replace('/\D+/', '', (string)$raw);
    if (strpos($wa, '0') === 0) {
        $wa = '62' . substr($wa, 1);
    } elseif (strpos($wa, '8') === 0) {
        $wa = '62' . $wa;
    }
    return $wa;
}

function page_form()
{
    $errors = [];
    $old = ['nama' => '', 'no_whatsapp' => '', 'nama_usaha' => '', 'punya_domain' => '', 'nama_hosting' => ''];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['website'])) { // honeypot: bot terisi, pura-pura sukses
            redirect('/?sukses=1');
        }

        $old['nama']         = trim((string)($_POST['nama'] ?? ''));
        $old['no_whatsapp']  = trim((string)($_POST['no_whatsapp'] ?? ''));
        $old['nama_usaha']   = trim((string)($_POST['nama_usaha'] ?? ''));
        $old['punya_domain'] = (string)($_POST['punya_domain'] ?? '');
        $old['nama_hosting'] = trim((string)($_POST['nama_hosting'] ?? ''));

        if ($old['nama'] === '' || mb_strlen($old['nama']) > 100) {
            $errors['nama'] = 'Nama wajib diisi (maksimal 100 karakter).';
        }
        $wa = normalize_wa($old['no_whatsapp']);
        if (!preg_match('/^62\d{8,13}$/', $wa)) {
            $errors['no_whatsapp'] = 'Masukkan nomor WhatsApp yang valid, contoh 08123456789.';
        }
        if ($old['nama_usaha'] === '' || mb_strlen($old['nama_usaha']) > 150) {
            $errors['nama_usaha'] = 'Nama usaha wajib diisi (maksimal 150 karakter).';
        }
        if (!in_array($old['punya_domain'], ['ya', 'tidak'], true)) {
            $errors['punya_domain'] = 'Pilih salah satu.';
        }
        if ($old['punya_domain'] === 'ya') {
            if ($old['nama_hosting'] === '' || mb_strlen($old['nama_hosting']) > 100) {
                $errors['nama_hosting'] = 'Nama hosting wajib diisi (maksimal 100 karakter).';
            }
        } else {
            $old['nama_hosting'] = ''; // tidak punya domain: tidak perlu hosting
        }

        if (!$errors) {
            list($code, , $msg) = sb('POST', TABLE, [
                'nama'         => $old['nama'],
                'no_whatsapp'  => $wa,
                'nama_usaha'   => $old['nama_usaha'],
                'punya_domain' => $old['punya_domain'],
                'nama_hosting' => $old['nama_hosting'] !== '' ? $old['nama_hosting'] : null,
            ], ['Prefer: return=minimal']);

            if ($code >= 200 && $code < 300) {
                redirect('/?sukses=1');
            }
            error_log('Supabase insert gagal: HTTP ' . $code . ' ' . $msg);
            $errors['umum'] = 'Maaf, data belum berhasil disimpan. Silakan coba lagi sebentar lagi.';
        }
    }

    $sukses = isset($_GET['sukses']);
    $waAdmin = preg_replace('/\D+/', '', env('WA_ADMIN'));

    page_head('Form Pembuatan Landingpage');
    echo '<main class="wrap"><h1>Form Pembuatan Landingpage</h1>';
    echo '<p class="sub">Isi data singkat di bawah ini. Kami akan menghubungi Anda lewat WhatsApp.</p><div class="card">';

    if ($sukses) {
        echo '<div class="done"><div class="tick">&#10003;</div><h2>Terima kasih!</h2>';
        echo '<p>Data Anda sudah kami terima. Kami akan segera menghubungi Anda.</p>';
        if ($waAdmin !== '') {
            $txt = rawurlencode('Halo, saya baru saja mengisi form pembuatan landingpage.');
            echo '<a class="btn wa" href="https://wa.me/' . e($waAdmin) . '?text=' . $txt . '">Chat via WhatsApp</a>';
        }
        echo '<a class="btn ghost" href="/">Isi form lagi</a></div>';
    } else {
        ?>
<form method="post" action="/" id="f">
  <?php if (isset($errors['umum'])): ?><div class="alert"><?= e($errors['umum']) ?></div><?php endif; ?>
  <div class="hp" aria-hidden="true"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>

  <div class="field">
    <label class="lbl" for="nama">Nama <span class="req">*</span></label>
    <input type="text" id="nama" name="nama" value="<?= e($old['nama']) ?>" autocomplete="name" required maxlength="100">
    <?php if (isset($errors['nama'])): ?><div class="err"><?= e($errors['nama']) ?></div><?php endif; ?>
  </div>

  <div class="field">
    <label class="lbl" for="wa">No WhatsApp <span class="req">*</span></label>
    <input type="tel" id="wa" name="no_whatsapp" value="<?= e($old['no_whatsapp']) ?>" inputmode="tel" autocomplete="tel" placeholder="08123456789" required maxlength="20">
    <?php if (isset($errors['no_whatsapp'])): ?><div class="err"><?= e($errors['no_whatsapp']) ?></div><?php endif; ?>
  </div>

  <div class="field">
    <label class="lbl" for="usaha">Nama usaha <span class="req">*</span></label>
    <input type="text" id="usaha" name="nama_usaha" value="<?= e($old['nama_usaha']) ?>" autocomplete="organization" required maxlength="150">
    <?php if (isset($errors['nama_usaha'])): ?><div class="err"><?= e($errors['nama_usaha']) ?></div><?php endif; ?>
  </div>

  <div class="field">
    <span class="lbl">Apa memiliki domain? <span class="req">*</span></span>
    <div class="opts">
      <label class="opt"><input type="radio" name="punya_domain" value="ya" <?= $old['punya_domain'] === 'ya' ? 'checked' : '' ?> required><span>Ya</span></label>
      <label class="opt"><input type="radio" name="punya_domain" value="tidak" <?= $old['punya_domain'] === 'tidak' ? 'checked' : '' ?>><span>Tidak</span></label>
    </div>
    <?php if (isset($errors['punya_domain'])): ?><div class="err"><?= e($errors['punya_domain']) ?></div><?php endif; ?>
  </div>

  <div class="field" id="hostWrap"<?= $old['punya_domain'] === 'ya' ? '' : ' hidden' ?>>
    <label class="lbl" for="host">Nama hosting <span class="req">*</span></label>
    <input type="text" id="host" name="nama_hosting" value="<?= e($old['nama_hosting']) ?>" placeholder="Contoh: Niagahoster, Hostinger, Rumahweb" maxlength="100"<?= $old['punya_domain'] === 'ya' ? ' required' : '' ?>>
    <?php if (isset($errors['nama_hosting'])): ?><div class="err"><?= e($errors['nama_hosting']) ?></div><?php endif; ?>
  </div>

  <button class="btn" type="submit" id="send">Kirim</button>
  <p class="note">Dengan mengirim, Anda setuju dihubungi melalui WhatsApp.</p>
</form>
<script>
(function () {
  var f = document.getElementById('f'), b = document.getElementById('send');
  f.addEventListener('submit', function () { b.disabled = true; b.textContent = 'Mengirim...'; });
  var w = document.getElementById('hostWrap'), h = document.getElementById('host');
  function sync() {
    var c = document.querySelector('input[name=punya_domain]:checked');
    var ya = !!c && c.value === 'ya';
    w.hidden = !ya;
    h.required = ya;
  }
  var rs = document.querySelectorAll('input[name=punya_domain]');
  for (var i = 0; i < rs.length; i++) { rs[i].addEventListener('change', sync); }
  sync();
  window.addEventListener('pageshow', function () { b.disabled = false; b.textContent = 'Kirim'; sync(); });
})();
</script>
        <?php
    }
    echo '</div></main>';
    page_foot();
}

/* ------------------------------------------------------------------ */
/* Halaman: ADMIN                                                      */
/* ------------------------------------------------------------------ */
function admin_secret()
{
    return 'adm|' . env('ADMIN_PASSWORD');
}

function admin_ok()
{
    if (env('ADMIN_PASSWORD') === '') {
        return false;
    }
    $c = isset($_COOKIE['adm']) ? (string)$_COOKIE['adm'] : '';
    $p = explode('.', $c, 2);
    if (count($p) !== 2 || (int)$p[0] < time()) {
        return false;
    }
    return hash_equals(hash_hmac('sha256', $p[0], admin_secret()), $p[1]);
}

function admin_cookie($value, $expires)
{
    setcookie('adm', $value, [
        'expires'  => $expires,
        'path'     => '/',
        'secure'   => true,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
}

function csv_cell($v)
{
    $v = (string)$v;
    if ($v !== '' && strpos('=+-@', $v[0]) !== false) {
        $v = "'" . $v; // cegah formula injection di Excel
    }
    return $v;
}

function fmt_time($iso)
{
    $t = strtotime((string)$iso);
    return $t ? date('d M Y, H:i', $t) . ' WIB' : '-';
}

function page_admin()
{
    $pw = env('ADMIN_PASSWORD');

    if ($pw === '') {
        page_head('Admin', true);
        echo '<main class="wrap"><div class="card"><h2 style="margin-top:0">Admin belum aktif</h2>';
        echo '<p>Tambahkan environment variable <b>ADMIN_PASSWORD</b> di Vercel, lalu Redeploy.</p></div></main>';
        page_foot();
        return;
    }

    $msg = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $act = (string)($_POST['act'] ?? '');

        if ($act === 'login') {
            if (hash_equals($pw, (string)($_POST['password'] ?? ''))) {
                $exp = time() + 12 * 3600;
                admin_cookie($exp . '.' . hash_hmac('sha256', (string)$exp, admin_secret()), $exp);
                redirect('/admin');
            }
            usleep(700000);
            $msg = 'Password salah.';
        } elseif (admin_ok()) {
            if ($act === 'logout') {
                admin_cookie('', time() - 3600);
                redirect('/admin');
            }
            $id = (int)($_POST['id'] ?? 0);
            if ($id > 0 && $act === 'status') {
                $st = ((string)($_POST['status'] ?? '') === 'dihubungi') ? 'dihubungi' : 'baru';
                sb('PATCH', TABLE . '?id=eq.' . $id, ['status' => $st], ['Prefer: return=minimal']);
            } elseif ($id > 0 && $act === 'delete') {
                sb('DELETE', TABLE . '?id=eq.' . $id, null, ['Prefer: return=minimal']);
            }
            redirect('/admin');
        }
    }

    if (!admin_ok()) {
        page_head('Admin Login', true);
        echo '<main class="wrap"><h1>Admin</h1><p class="sub">Masuk untuk melihat data yang masuk.</p><div class="card">';
        if ($msg !== '') {
            echo '<div class="alert">' . e($msg) . '</div>';
        }
        echo '<form method="post" action="/admin"><input type="hidden" name="act" value="login">';
        echo '<div class="field"><label class="lbl" for="p">Password</label>';
        echo '<input type="password" id="p" name="password" autocomplete="current-password" required></div>';
        echo '<button class="btn" type="submit">Masuk</button></form></div></main>';
        page_foot();
        return;
    }

    // Ambil data
    list($code, $rows, $err) = sb('GET', TABLE . '?select=*&order=created_at.desc&limit=1000');
    if ($code < 200 || $code >= 300 || !is_array($rows)) {
        $rows = null;
    }

    // Export CSV
    if (isset($_GET['export']) && $rows !== null) {
        security_headers(true);
        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="landingpage-' . date('Ymd-His') . '.csv"');
        echo "\xEF\xBB\xBF";
        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID', 'Waktu', 'Nama', 'No WhatsApp', 'Nama Usaha', 'Punya Domain', 'Nama Hosting', 'Status']);
        foreach ($rows as $r) {
            fputcsv($out, [
                $r['id'] ?? '', fmt_time($r['created_at'] ?? ''), csv_cell($r['nama'] ?? ''),
                csv_cell($r['no_whatsapp'] ?? ''), csv_cell($r['nama_usaha'] ?? ''),
                $r['punya_domain'] ?? '', csv_cell($r['nama_hosting'] ?? ''), $r['status'] ?? 'baru',
            ]);
        }
        fclose($out);
        exit;
    }

    page_head('Admin - Data Masuk', true);
    echo '<main class="wrap wide"><div class="topbar"><h1>Data Masuk</h1><div class="actions">';
    echo '<a class="btn ghost sm" href="/admin?export=1">Unduh CSV</a>';
    echo '<form method="post" action="/admin"><input type="hidden" name="act" value="logout"><button class="btn ghost sm" type="submit">Keluar</button></form>';
    echo '</div></div>';

    if ($rows === null) {
        echo '<div class="alert">Tidak bisa mengambil data: ' . e($err) . '<br>Buka <a href="/health">/health</a> untuk diagnosa.</div></main>';
        page_foot();
        return;
    }

    $total = count($rows);
    $baru = 0;
    $tanpaDomain = 0;
    foreach ($rows as $r) {
        if (($r['status'] ?? 'baru') !== 'dihubungi') { $baru++; }
        if (($r['punya_domain'] ?? '') === 'tidak') { $tanpaDomain++; }
    }
    echo '<div class="stats"><div class="stat"><b>' . $total . '</b><small>Total</small></div>';
    echo '<div class="stat"><b>' . $baru . '</b><small>Belum dihubungi</small></div>';
    echo '<div class="stat"><b>' . $tanpaDomain . '</b><small>Belum punya domain</small></div></div>';

    if ($total === 0) {
        echo '<div class="empty">Belum ada data masuk.</div>';
    } else {
        echo '<div class="field"><input type="search" id="q" placeholder="Cari nama / usaha / nomor"></div><div id="list">';
        foreach ($rows as $r) {
            $id    = (int)($r['id'] ?? 0);
            $nama  = (string)($r['nama'] ?? '');
            $usaha = (string)($r['nama_usaha'] ?? '');
            $wa    = (string)($r['no_whatsapp'] ?? '');
            $dom   = (string)($r['punya_domain'] ?? '');
            $host  = (string)($r['nama_hosting'] ?? '');
            $st    = (string)($r['status'] ?? 'baru');
            $sudah = ($st === 'dihubungi');
            $txt   = rawurlencode('Halo kak ' . $nama . ', terima kasih sudah mengisi form pembuatan landingpage untuk ' . $usaha . '.');

            echo '<div class="item" data-s="' . e(strtolower($nama . ' ' . $usaha . ' ' . $wa)) . '">';
            echo '<h3>' . e($usaha) . '</h3>';
            echo '<div class="meta">' . e($nama) . ' &middot; +' . e($wa) . ' &middot; ' . e(fmt_time($r['created_at'] ?? '')) . '</div>';
            echo '<div class="badges"><span class="badge">' . ($dom === 'ya' ? 'Punya domain' . ($host !== '' ? ' &middot; Hosting: ' . e($host) : '') : 'Belum punya domain') . '</span>';
            echo '<span class="badge ' . ($sudah ? 'ok' : 'new') . '">' . ($sudah ? 'Sudah dihubungi' : 'Baru') . '</span></div>';
            echo '<div class="actions">';
            echo '<a class="btn wa sm" href="https://wa.me/' . e($wa) . '?text=' . $txt . '" target="_blank" rel="noopener">Chat WhatsApp</a>';
            echo '<form method="post" action="/admin"><input type="hidden" name="act" value="status"><input type="hidden" name="id" value="' . $id . '">';
            echo '<input type="hidden" name="status" value="' . ($sudah ? 'baru' : 'dihubungi') . '">';
            echo '<button class="btn ghost sm" type="submit">' . ($sudah ? 'Tandai baru' : 'Tandai sudah dihubungi') . '</button></form>';
            echo '<form method="post" action="/admin" onsubmit="return confirm(\'Hapus data ini?\')"><input type="hidden" name="act" value="delete"><input type="hidden" name="id" value="' . $id . '">';
            echo '<button class="btn ghost sm" type="submit">Hapus</button></form>';
            echo '</div></div>';
        }
        echo '</div>';
        echo '<script>(function(){var q=document.getElementById("q");q.addEventListener("input",function(){var v=q.value.toLowerCase().trim();var a=document.querySelectorAll("#list .item");for(var i=0;i<a.length;i++){a[i].style.display=(a[i].getAttribute("data-s").indexOf(v)>-1)?"":"none";}});})();</script>';
    }
    echo '</main>';
    page_foot();
}

/* ------------------------------------------------------------------ */
/* Halaman: HEALTH (diagnosa)                                          */
/* ------------------------------------------------------------------ */
function page_health()
{
    security_headers(true);
    header('Content-Type: application/json; charset=UTF-8');

    $res = [
        'php'                          => PHP_VERSION,
        'curl'                         => function_exists('curl_init'),
        'SUPABASE_URL'                 => env('SUPABASE_URL') !== '',
        'SUPABASE_SERVICE_ROLE_KEY'    => env('SUPABASE_SERVICE_ROLE_KEY') !== '',
        'ADMIN_PASSWORD'               => env('ADMIN_PASSWORD') !== '',
        'WA_ADMIN_opsional'            => env('WA_ADMIN') !== '',
        'database'                     => 'belum dicek',
    ];

    if ($res['curl'] && $res['SUPABASE_URL'] && $res['SUPABASE_SERVICE_ROLE_KEY']) {
        list($code, , $err) = sb('GET', TABLE . '?select=id,nama_hosting&limit=1');
        if ($code >= 200 && $code < 300) {
            $res['database'] = 'OK - tabel ' . TABLE . ' bisa diakses';
        } elseif ($code === 400) {
            $res['database'] = 'GAGAL - kolom nama_hosting belum ada. Jalankan ulang supabase.sql di Supabase SQL Editor.';
        } elseif ($code === 404) {
            $res['database'] = 'GAGAL - tabel belum dibuat. Jalankan supabase.sql di Supabase SQL Editor.';
        } elseif ($code === 401 || $code === 403) {
            $res['database'] = 'GAGAL - key ditolak. Pakai secret / service_role key, bukan anon key.';
        } else {
            $res['database'] = 'GAGAL - HTTP ' . $code . ' ' . $err;
        }
    }
    echo json_encode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

/* ------------------------------------------------------------------ */
/* Router                                                              */
/* ------------------------------------------------------------------ */
$page = isset($_GET['page']) ? (string)$_GET['page'] : '';
if ($page === '') {
    $path = parse_url(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/', PHP_URL_PATH);
    $path = rtrim((string)$path, '/');
    if ($path === '/admin') {
        $page = 'admin';
    } elseif ($path === '/health') {
        $page = 'health';
    } else {
        $page = 'form';
    }
}

if ($page === 'admin') {
    page_admin();
} elseif ($page === 'health') {
    page_health();
} else {
    page_form();
}
