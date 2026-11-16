<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AR BOARD GAME | Kelompok 34</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Cormorant+Garamond:ital,wght@0,500;0,700;1,500&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
:root{
  --paper:#e8e3d6; --ink:#111; --red:#e10600; --dark:#141210; --bone:#d9d2c0;
  --heavy:"Archivo Black","Arial Black",Impact,sans-serif;
  --serif:"Cormorant Garamond",Georgia,serif;
  --mono:"Space Mono",ui-monospace,Menlo,monospace;
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{background:var(--paper);color:var(--ink);font-family:var(--mono);line-height:1.6;overflow-x:hidden}

/* tekstur kertas / grain di seluruh halaman */
body::after{
  content:"";position:fixed;inset:0;pointer-events:none;z-index:50;opacity:.22;mix-blend-mode:multiply;
  background-image:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='220' height='220'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 .6 0'/></filter><rect width='100%' height='100%' filter='url(%23n)'/></svg>");
}

.slide{position:relative;min-height:100vh;padding:28px clamp(18px,4vw,48px);overflow:hidden}
.tiny{font-size:.68rem;letter-spacing:.14em;text-transform:uppercase;font-weight:700;color:var(--red)}
.row{display:flex;justify-content:space-between;gap:16px;position:relative;z-index:3}

/* ===== efek halftone ===== */
.halftone{
  position:absolute;inset:0;
  background:radial-gradient(circle,var(--ink) 34%,transparent 40%) 0 0/8px 8px;
  -webkit-mask-image:radial-gradient(ellipse 46% 52% at 50% 62%,#000 20%,transparent 72%);
          mask-image:radial-gradient(ellipse 46% 52% at 50% 62%,#000 20%,transparent 72%);
}
.halftone::before{
  content:"";position:absolute;left:30%;right:30%;top:48%;bottom:4%;background:var(--ink);
  -webkit-mask-image:radial-gradient(ellipse at 50% 70%,#000 35%,transparent 75%);
          mask-image:radial-gradient(ellipse at 50% 70%,#000 35%,transparent 75%);
}

/* ===== 1. HERO ===== */
.hero{display:flex;flex-direction:column;justify-content:space-between}
.hero h1{
  position:absolute;left:0;right:0;top:46%;transform:translateY(-50%);z-index:4;text-align:center;
  font-family:var(--heavy);color:var(--red);font-size:clamp(3.4rem,15vw,12rem);letter-spacing:-.04em;line-height:.9;
}
.hero h1 small{display:block;font-family:var(--mono);font-size:clamp(.7rem,1.4vw,1rem);letter-spacing:.3em;margin-top:18px;color:var(--ink);font-weight:400}
.hero .btn{
  position:absolute;left:50%;bottom:84px;transform:translateX(-50%);z-index:5;
  padding:12px 26px;border:1.5px solid var(--ink);color:var(--ink);text-decoration:none;font-size:.75rem;letter-spacing:.2em;text-transform:uppercase;
  background:var(--paper);
}
.hero .btn:hover{background:var(--ink);color:var(--paper)}

/* ===== 2. TENTANG ===== */
.about{background:#efebe0;display:grid;grid-template-rows:auto 1fr;padding:0}
.about .top{padding:40px clamp(18px,4vw,48px) 36px;text-align:center;position:relative}
.about .rule{display:flex;align-items:center;gap:18px;justify-content:center;color:var(--red);font-size:1.4rem}
.about .rule::before,.about .rule::after{content:"";height:2px;background:var(--red);flex:1;max-width:260px}
.about p.lead{max-width:620px;margin:22px auto 0;font-size:.74rem;letter-spacing:.06em;text-transform:uppercase;color:var(--red);font-weight:700}
.about h2{font-family:var(--heavy);color:var(--red);font-size:clamp(3rem,11vw,8rem);line-height:.9;letter-spacing:-.03em;margin-top:26px}
.about .tag{position:absolute;left:clamp(18px,4vw,48px);top:120px;width:64px;height:150px;background:var(--red);padding:10px;display:none}
.about .tag i{display:block;height:100%;background:repeating-linear-gradient(90deg,#111 0 2px,transparent 2px 5px,#111 5px 6px,transparent 6px 10px)}
@media(min-width:760px){.about .tag{display:block}}
.about .bottom{position:relative;background:var(--ink);min-height:360px;overflow:hidden}
.about .bottom .ph{position:absolute;inset:0}

/* ===== foto / placeholder (duotone halftone) ===== */
.photo{position:relative;background:#26231f;overflow:hidden}
.photo img{width:100%;height:100%;object-fit:cover;display:block;filter:grayscale(1) contrast(1.55) brightness(.95)}
.photo::after{
  content:"";position:absolute;inset:0;mix-blend-mode:multiply;pointer-events:none;
  background:radial-gradient(circle,rgba(0,0,0,0) 38%,rgba(0,0,0,.6) 42%) 0 0/4px 4px;
}
.photo .ph-text{position:absolute;inset:0;display:grid;place-items:center;text-align:center;padding:12px;color:#8a8478;font-size:.7rem;letter-spacing:.18em;text-transform:uppercase;z-index:2}

/* ===== 3. GALERI (bingkai ornamen) ===== */
.gallery{background:var(--dark);color:var(--bone);text-align:center}
.gallery .tiny{color:#b9b19d}
.gallery h2{font-family:var(--serif);font-weight:700;font-size:clamp(2rem,6vw,4rem);letter-spacing:.02em;margin:10px 0 6px}
.gallery h2 em{color:var(--red);font-style:italic}
.gallery .sub{color:#8a8478;font-size:.74rem;letter-spacing:.12em;text-transform:uppercase}
.orn{font-size:1.5rem;color:var(--bone);letter-spacing:.5em;margin:18px 0 34px}
.frames{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:34px;max-width:1100px;margin:0 auto}
.frame{border:1px solid var(--bone);padding:10px;position:relative;background:var(--dark)}
.frame::before{content:"";position:absolute;inset:5px;border:1px solid rgba(217,210,192,.45);pointer-events:none;z-index:3}
.frame .photo{aspect-ratio:4/5}
.frame figcaption{font-family:var(--heavy);font-size:.78rem;letter-spacing:.16em;text-transform:uppercase;margin-top:14px;color:var(--bone)}
.frame small{display:block;color:#8a8478;font-family:var(--mono);font-size:.66rem;letter-spacing:.1em;margin:2px 0 6px}

/* ===== 4. TIM / PENUTUP ===== */
.team{display:flex;flex-direction:column;justify-content:space-between;background:var(--paper)}
.team .big{font-family:var(--heavy);color:var(--red);font-size:clamp(3rem,13vw,10rem);line-height:.88;letter-spacing:-.04em;margin:14vh 0 0}
.team .big span{display:block;color:var(--ink)}
.credits{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:22px;margin:56px 0 28px;border-top:2px solid var(--ink);padding-top:20px}
.credits h3{font-size:.62rem;letter-spacing:.2em;text-transform:uppercase;color:var(--red);margin-bottom:6px}
.credits p{font-size:.85rem}
footer{display:flex;justify-content:space-between;flex-wrap:wrap;gap:8px}
footer span{font-size:.64rem;letter-spacing:.14em;text-transform:uppercase}
</style>
</head>
<body>

<!-- ============ 1. HERO ============ -->
<section class="slide hero">
  <div class="row">
    <span class="tiny">Kelompok 34</span>
    <span class="tiny">AR Boardgame</span>
    <span class="tiny">2026</span>
  </div>

  <div class="halftone"></div>

  <h1>[CIVIE<br>CLASS]<small>—“Self-reverence, self-knowledge, and self-control lead to sovereign power.”</small></h1>
  <a class="btn" href="#tentang">Start ↓</a>

  <div class="row">
    <span class="tiny">Civie</span>
    <span class="tiny">Class</span>
  </div>
</section>

<!-- ============ 2. TENTANG GAME ============ -->
<section class="slide about" id="about">
  <div class="top">
    <div class="rule"><span>✦</span></div>
    <i class="tag"><i></i></i>
    <p class="lead">“When you have to make a choice and don't make it, that in itself is already a choice.”</p>
    <h2>ABOUT<br>GAME</h2>
  </div>
  <div class="bottom">
    <div class="photo ph">
      <!-- Ganti baris di bawah dengan: <img src="URL_GAMBAR" alt="..."> -->
      <div class="ph-text">[ photo / board illustration ]</div>
    </div>
  </div>
</section>

<!-- ============ 3. GALERI ============ -->
<section class="slide gallery" id="galeri">
  <span class="tiny">Dokumentasi</span>
  <h2>Galeri <em>Project</em></h2>
  <p class="sub">Footage &amp; visual archive</p>
  <div class="orn">❦ ❦ ❦</div>

  <div class="frames">
    <!-- Nanti bagian kartu ini diganti perulangan dari database (tabel items) -->
    <figure class="frame">
      <div class="photo"><div class="ph-text">[ Photo 1 ]</div></div>
      <figcaption>Title<small>lorem ipsum</small></figcaption>
    </figure>
    <figure class="frame">
      <div class="photo"><div class="ph-text">[ Photo 2 ]</div></div>
      <figcaption>Title<small>lorem ipsum</small></figcaption>
    </figure>
    <figure class="frame">
      <div class="photo"><div class="ph-text">[ Photo 3 ]</div></div>
      <figcaption>Title<small>lorem ipsum</small></figcaption>
    </figure>
  </div>
</section>

<!-- ============ 4. TIM ============ -->
<section class="slide team" id="tim">
  <div class="row">
    <span class="tiny">Team</span>
    <span class="tiny">✦</span>
    <span class="tiny">Kelompok 34</span>
  </div>

  <h2 class="big">WE ARE<span>CIVIE CLASS.</span></h2>

  <div>
    <div class="credits">
      <div><h3>Member 1</h3><p>[lorem] · [ipsum]</p></div>
      <div><h3>Member 2</h3><p>[lorem] · [ipsum]</p></div>
      <div><h3>Member 3</h3><p>[lorem] · [ipsum]</p></div>
      <div><h3>Member 4</h3><p>[lorem] · [ipsum]</p></div>
    </div>
    <footer>
      <span>AR BOARD GAME</span>
      <span>S1 Terapan Teknologi Rekayasa Multimedia</span>
    </footer>
  </div>
</section>

</body>
</html>