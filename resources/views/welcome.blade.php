<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>[NAMA GAME] | Kelompok 34</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
            background: #0b0b0f;
            color: #f2f2f2;
            line-height: 1.6;
        }
        section { max-width: 960px; margin: 0 auto; padding: 72px 24px; }
        .hero { min-height: 90vh; display: flex; flex-direction: column; justify-content: center; }
        .label { color: #7c9cff; letter-spacing: .2em; font-size: .8rem; text-transform: uppercase; }
        h1 { font-size: clamp(2.5rem, 8vw, 5rem); line-height: 1.05; margin: 16px 0; }
        h2 { font-size: 1.6rem; margin-bottom: 16px; }
        p { color: #b8b8c4; max-width: 640px; }
        .btn {
            display: inline-block; margin-top: 28px; padding: 12px 24px;
            border: 1px solid #7c9cff; color: #7c9cff; text-decoration: none; border-radius: 8px;
        }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px; margin-top: 24px; }
        .card { border: 1px dashed #333; border-radius: 12px; padding: 48px 16px; text-align: center; color: #666; }
        footer { text-align: center; padding: 32px; color: #666; font-size: .85rem; }
    </style>
</head>
<body>
    <section class="hero">
        <span class="label">Kelompok 34 · AR Boardgame</span>
        <h1>CIVIE CLASS 🃏🏙️</h1>
        <p>lorem ipsum dolor sit amet consectetur adipiscing elit</p>
        <a class="btn" href="#galeri">Lihat Galeri</a>
    </section>

    <section id="tentang">
        <h2>About</h2>
        <p>lorem ipsum dolor sit amet consectetur adipiscing elit...</p>
    </section>

    <section id="galeri">
        <h2>Galeri</h2>
        <p>Footage dan dokumentasi project.</p>
        <div class="grid">
            <div class="card">- - -</div>
            <div class="card">- - -</div>
            <div class="card">COMING SOON !!</div>
        </div>
    </section>

    <footer>AR BOARD GAME    · Kelompok 34</footer>
</body>
</html>