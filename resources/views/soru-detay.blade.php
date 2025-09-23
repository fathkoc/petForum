<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expressmama.com - Sosyal I Expressmama Sosyal</title>
  @vite(entrypoints: 'resources/css/index.css')

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link href="https://fonts.cdnfonts.com/css/outfit" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <style>
/* === Modal Genel (overlay) === */
.modal{
  position: fixed;
  inset: 0;
  display: none;                /* Aç/kapa mantığınız nasıl ise koruyun */
  align-items: center;
  justify-content: center;
  padding: 24px;
  background: rgba(15,23,42,.45);         /* koyu yarı saydam */
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  z-index: 1050;
}
.modal.show,
.modal[open],
.modal[style*="display: block"]{
  display: flex;
}

/* === Kart === */
.modal-content{
  width: min(560px, 94vw);
  border-radius: 16px;
  background: #fff;
  border: 1px solid #eef2f7;
  box-shadow: 0 22px 60px rgba(0,0,0,.18);
  overflow: hidden;                        /* header köşeleri düzgün dursun */
  transform: translateY(8px) scale(.985);
  opacity: 0;
  animation: modalIn .26s ease forwards;
}
@keyframes modalIn{
  to{ transform: translateY(0) scale(1); opacity: 1; }
}

/* === Başlık === */
.modal-header{
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  padding: 18px 20px;
  background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
  color: #fff;
}
.modal-title{
  margin: 0;
  font-size: 1.1rem;
  font-weight: 750;
  letter-spacing: .2px;
}

/* === Kapat butonu === */
.close-btn{
  appearance: none;
  background: rgba(255,255,255,.15);
  border: 1px solid rgba(255,255,255,.35);
  color: #fff;
  width: 36px; height: 36px;
  border-radius: 10px;
  line-height: 1;
  font-size: 20px;
  cursor: pointer;
  transition: transform .08s ease, background .2s ease;
}
.close-btn:hover{ background: rgba(255,255,255,.25); }
.close-btn:active{ transform: scale(.96); }

/* === Form gövdesi === */
.modal-content .form-group{
  padding: 14px 20px 0;
}
.modal-content .form-group:last-of-type{
  padding-bottom: 6px;
}
.form-label{
  display: block;
  margin-bottom: 6px;
  font-weight: 650;
  color: #334155;      /* slate-700 */
}

/* === Alanlar === */
.form-select,
.form-textarea{
  width: 100%;
  border: 1px solid #e5e7eb;              /* gray-200 */
  border-radius: 12px;
  background: #fff;
  padding: 10px 12px;
  font-size: .96rem;
  color: #111827;                          /* gray-900 */
  transition: border-color .15s ease, box-shadow .15s ease;
}
.form-textarea{
  min-height: 120px;
  resize: vertical;
}
.form-select:focus,
.form-textarea:focus{
  outline: none;
  border-color: #93c5fd;                   /* blue-300 */
  box-shadow: 0 0 0 4px rgba(59,130,246,.12); /* blue-500/12 */
}

/* === Alt aksiyonlar === */
.modal-actions{
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  padding: 16px 20px 20px;
  border-top: 1px solid #f1f5f9;
}
.btn-cancel,
.btn-submit{
  appearance: none;
  border-radius: 10px;
  padding: 10px 14px;
  font-weight: 650;
  cursor: pointer;
  transition: transform .08s ease, filter .2s ease, box-shadow .18s ease;
}

/* İptal (outline) */
.btn-cancel{
  background: #fff;
  color: #334155;
  border: 1px solid #e5e7eb;
}
.btn-cancel:hover{
  background: #f8fafc;
}
.btn-cancel:active{ transform: scale(.98); }

/* Gönder (primary) */
.btn-submit{
  background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
  color: #fff;
  border: 1px solid #2563eb;
  box-shadow: 0 10px 26px rgba(37,99,235,.22);
}
.btn-submit:hover{ filter: brightness(1.03); }
.btn-submit:active{ transform: scale(.98); }

/* === Küçük ekranlar === */
@media (max-width: 420px){
  .modal{ padding: 16px; }
  .modal-content{ border-radius: 14px; }
  .modal-header{ padding: 16px; }
  .modal-content .form-group{ padding: 12px 16px 0; }
  .modal-actions{ padding: 14px 16px 16px; }
}

/* === (İsteğe bağlı) Dark mode desteği === */
@media (prefers-color-scheme: dark){
  .modal-content{
    background: #0b1220;
    border-color: #1f2937;
    box-shadow: 0 22px 60px rgba(0,0,0,.55);
  }
  .form-label{ color: #e5e7eb; }
  .form-select, .form-textarea{
    background: #0f172a;
    color: #e5e7eb;
    border-color: #1f2937;
  }
  .form-select:focus, .form-textarea:focus{
    border-color: #60a5fa;
    box-shadow: 0 0 0 4px rgba(59,130,246,.18);
  }
  .modal-actions{ border-top-color: #1f2937; }
  .btn-cancel{ background:#0f172a; color:#e5e7eb; border-color:#1f2937; }
  .btn-cancel:hover{ background:#111827; }
}
</style>

  <style>

    body {
  background:#f5f6fa;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Ana konteyner */
.qna-wrapper{
  max-width:1200px;
  margin:auto;
  padding:1.5rem;
  display:grid;
  grid-template-columns: 1fr;
  gap:2rem;
}
@media (min-width:992px){
  .qna-wrapper{
    grid-template-columns: 2fr 1fr;
  }
}

/* Başlık */
.qna-title{
  font-size:1.8rem;
  font-weight:600;
  color:#2c3e50;
  margin-bottom:.5rem;
}
.qna-meta{
  color:#6c757d;
  font-size:.9rem;
}

/* Ana soru kartı */
.qna-post{
  background:#fff;
  border-radius:12px;
  box-shadow:0 4px 12px rgba(0,0,0,.08);
  padding:1.5rem;
}
.qna-author{
  display:flex;
  align-items:center;
  margin-top:1rem;
}
.qna-author img{
  width:60px;height:60px;
  object-fit:cover;
  border-radius:50%;
  margin-right:.75rem;
  border:2px solid #e9ecef;
}
.qna-rank-badge{
  background:#e9f7ef;
  color:#198754;
  padding:.2rem .6rem;
  border-radius:6px;
  font-size:.8rem;
  font-weight:500;
  margin-left:.5rem;
}

/* Buton grubu */
.qna-actions{
  margin-top:1rem;
  display:flex;
  gap:.5rem;
}
.qna-actions .btn{
  border-radius:8px;
  padding:.45rem .9rem;
  font-weight:500;
}

/* Yorum alanı */
.comment-card{
  background:#fff;
  border-radius:10px;
  box-shadow:0 2px 6px rgba(0,0,0,.05);
  padding:1rem 1.25rem;
  margin-bottom:1rem;
}
.comment-card img{
 
  object-fit:cover;
  border-radius:50%;
  margin-right:.75rem;
}
.comment-meta{
  font-size:.85rem;
  color:#6c757d;
}

/* Cevap formu */
.answer-form textarea{
  min-height:120px;
  border-radius:8px;
}
.answer-form .btn-primary{
  margin-top:.75rem;
}

/* Sidebar */
.sidebar-widget{
  background:#fff;
  border-radius:12px;
  padding:1.25rem;
  margin-bottom:1.5rem;
  box-shadow:0 2px 6px rgba(0,0,0,.05);
}
.sidebar-widget h3{
  font-size:1.2rem;
  font-weight:600;
  margin-bottom:.75rem;
}
.popular-questions li{
  margin-bottom:.4rem;
}
.popular-questions a{
  text-decoration:none;
  color:#0d6efd;
}
.popular-questions a:hover{
  text-decoration:underline;
}



  </style>

  </head>

<body>
  <!--EN ÜST BİLGİ ALANI (MOBİLDE KAPALI)-->
  <div class="HeaderTop">
    <header class="top-header" style="background-color: #2E2E2E;">
      <div class="container">
        <div class="social-media"><a href="https://www.facebook.com/expressmama.co/" target="_blank"><i
              class="fab fa-facebook"></i> </a> <a href="https://www.instagram.com/expressmama.com.tr/" target="_blank">
            <i class="fab fa-instagram"></i> </a> <a href="https://www.youtube.com/channel/UC7a6kKxsTzj_LElBDRoxmlw"
            target="_blank"> <i class="fab fa-youtube"></i> </a> <a href="https://www.tiktok.com/@expressmama"
            target="_blank"> <i class="fab fa-tiktok"></i> </a> <a
            href="https://www.linkedin.com/company/expressmamacom" target="_blank"> <i class="fab fa-linkedin"></i> </a>
        </div>

        <div class="free-shipping"><i class="fas fa-truck"></i>&nbsp;200 TL Üzeri Ücretsiz Kargo</div>
        <a class="contact" href="https://wa.me/905332905540" target="_blank"><i class="fab fa-whatsapp"></i>
          <span>Sipariş &amp; Destek: 0533 290 55 40</span> </a>
      </div>
    </header>
  </div>
  <!--EN ÜST BİLGİ ALANI (MOBİLDE KAPALI)-->
<div class="search-box-container-web-design">
  <!--START LOGO-->
  <div class="header">
    <div class="logo">
      <a title="Expressmama.com Online Petshop" class="header-logo"href="{{ url('/') }}">
      <img src="https://static.ticimax.cloud/66297//uploads/editoruploads/jhkjhkhjkj.png?t=20240715143822" alt=""
        class="logo-web"></a>
        <a title="Expressmama.com Online Petshop" class="header-logo" href="{{ url('/') }}">
      <img src="https://static.ticimax.cloud/66297//uploads/editoruploads/jhkjhkhjkj.png?t=20240715143822" alt=""
        class="logo-mobil"></a>
    </div>
  </div>
  <!--FİNİSH LOGO-->

  <!--START ÜYE GİRİŞ KAYIT ALANI-->
  <div class="login-container">
    <div class="login">
      <a href="./login.html" style="text-decoration: none; color:#424040;">
        <i class="fa-solid fa-user"></i>
      </a>
      <div class="basked">
      <a href="./sepetim.html" style="text-decoration: none; color:#424040;">
        <i class="fa-solid fa-cart-shopping"></i>
      </a>
    </div> 
    </div>
  </div>
  <!--FİNİSH ÜYE GİRİŞ KAYIT ALANI-->

  <!-- START WEB ARAMA KUTUSU - SAĞ MENÜ YARDIM HESABIM ve SEPETİM -->
  <!-- Arama Kutusu -->
  
    

    <!-- Sağ Menü -->
    <div class="login-actions">
      <div class="help-container">
       
        <div class="help-popup">
          <div class="popup-header">
            <i class="fa-solid fa-face-smile-beam"></i> %100 Mutlu Müşteri Hizmeti
          </div>
          <div class="popup-content">
            <div class="phone-number">0533 290 55 40</div>
            <div class="working-hours">Pazartesi - Cumartesi 08:30 - 20:30</div>

            <a href="#" class="menu-item-help-popup">
              <div class="menu-icon"><i class="fa-solid fa-headset"></i></div>
              Canlı Yardım
            </a>

            <a href="#" class="menu-item-help-popup">
              <div class="menu-icon"><i class="fa-solid fa-tags"></i></div>
              İndirimli Ürünler
            </a>

            <a href="#" class="menu-item-help-popup">
              <div class="menu-icon"><i class="fa-solid fa-coins"></i></div>
              Para Puan Kazanımı
            </a>

          </div>
        </div>
      </div>
        @auth
      <div class="myaccount-container">
      
      <div class="myaccount-container">
          @endauth
  @auth

    <a href="#" class="login-action" id="myaccountToggle">
      <i class="fa-regular fa-user"></i> Hesabım
    </a>

    <div class="myaccount-popup" id="myaccountPopup">
      <div class="popup-header">
        <span id="user-name" class="popup-header-user-name">
          {{ Auth::user()->name }}
        </span>
      </div>

      <div class="popup-content">
        <a href="{{ route('account.profile') }}" class="menu-item-myaccount-popup">
          <div class="menu-icon"><i class="fa-solid fa-user"></i></div>
          Üyelik Bilgilerim
        </a>

        <a href="{{ route('account.topics') }}" class="menu-item-myaccount-popup">
  <div class="menu-icon"><i class="fa-solid fa-shield-dog"></i></div>
  Konularım
</a>

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit" class="menu-item-myaccount-popup" style="background:none;border:none;padding:0;cursor:pointer;">
            <div class="menu-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
            Çıkış Yap
          </button>
        </form>
      </div>
    </div>
  @endauth

  @guest
    <a href="https://www.expressmama.com/UyeGiris" class="login-action">
      <i class="fa-regular fa-user"></i> Giriş Yap
    </a>
  @endguest
</div>

      </div>
     
    </div>
  </div>
  <!-- FİNİSH WEB ARAMA KUTUSU - SAĞ MENÜ YARDIM HESABIM ve SEPETİM -->

  <!---START WEB HEADER KATEGORİLER--->
  <div class="main-menu-container">
    <nav class="main-menu">
      <a href="https://www.expressmama.com/kedi">Kedi Ürünleri</a>
      <a href="https://www.expressmama.com/köpek">Köpek Ürünleri</a>
      <a href="https://www.expressmama.com/kus">Kuş Ürünleri</a>

      <a href="https://www.expressmama.com/kemirgen">Kemirgen Ürünleri</a>
      <a href="https://www.expressmama.com/kampanyalar">Kampanyalar</a>
      <a href="https://www.expressmama.com/kus">Pati Kulüp</a>
      <a href="https://www.expressmama.com/kus">Yuva Arayanlar</a>
    </nav>
  </div>
  <!---FİNİSH WEB HEADER KATEGORİLER--->


  <!--START ARAMA KUTUSU SADECE MOBİLE ÖZEL-->
  <!--START MOBİL YAN MENÜ SADECE MOBİLE ÖZEL-->
  <div class="nav-menu-mobil-icon-container">
    <button class="menu-button" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></button>
    <div class="nav-menu-mobil" id="nav-menu-mobil">
      <div class="nav-menu-mobil-header">
        <div class="close-btn">
          <button onclick="toggleMenu()" style="background:none; border:none;">
            <i class="fa-solid fa-xmark" style="color: red; font-size:30px;"></i>
          </button>
        </div>
        <div class="nav-menu-mobil-logo">
          <img src="./logo-01.png" alt="" class="nav-menu-mobil-logo">
        </div>
        <div class="nav-menu-mobil-category">
          <div class="nav-menu-mobil-category-header">Alışveriş
            <div class="nav-menu-mobil-category-list">
              <ul>
                <li><a href="#"><i class="fa-solid fa-cat"></i>Kedi Ürünleri<i class="fa-solid fa-circle-chevron-right"
                      id="nav-menu-mobil-icon"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-dog"></i>Köpek Ürünleri<i class="fa-solid fa-circle-chevron-right"
                      id="nav-menu-mobil-icon"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-dove"></i>Kuş Ürünleri<i class="fa-solid fa-circle-chevron-right"
                      id="nav-menu-mobil-icon"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-otter"></i>Kemirgen Ürünleri<i
                      class="fa-solid fa-circle-chevron-right" id="nav-menu-mobil-icon"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-percent"></i>Kampanyalar<i
                      class="fa-solid fa-circle-chevron-right" id="nav-menu-mobil-icon"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="nav-menu-mobil-category-header">Paticiklerin Dünyası
            <div class="nav-menu-mobil-category-list">
              <ul>
                <li><a href="#"><i class="fa-solid fa-paw"></i>Yuva Arayanlar<i class="fa-solid fa-circle-chevron-right"
                      id="nav-menu-mobil-icon"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-blog"></i>Blog<i class="fa-solid fa-circle-chevron-right"
                      id="nav-menu-mobil-icon"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-comments"></i>Soru Cevap<i
                      class="fa-solid fa-circle-chevron-right" id="nav-menu-mobil-icon"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-address-book"></i>Rehber<i
                      class="fa-solid fa-circle-chevron-right" id="nav-menu-mobil-icon"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-camera"></i>Fotoğraf Yarışması<i
                      class="fa-solid fa-circle-chevron-right" id="nav-menu-mobil-icon"></i></a></li>
              </ul>
              <div class="nav-menu-mobil-footer">
                <div class="nav-menu-mobil-footer-list">
                  <ul>
                    <li><a href="#"><i class="fa-solid fa-circle-exclamation"></i>Yardım<i
                          class="fa-solid fa-circle-chevron-right" id="nav-menu-mobil-icon"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--FİNİSH ARAMA KUTUSU SADECE MOBİLE ÖZEL-->
  <!--FİNİSH MOBİL YAN MENÜ SADECE MOBİLE ÖZEL-->


  <!--START KATEGORİLER MOBİL 01-->
  <div class="category-grid-mobil">
    <div class="category-item-mobil">
      <span class="icon-mobil">&#10148;</span> Soru Cevap
    </div>
    <div class="category-item-mobil">
      <span class="icon-mobil">&#10148;</span> Foto Yarışması
    </div>
    <div class="category-item-mobil">
      <span class="icon-mobil">&#10148;</span> Yuva Arayanlar
    </div>
    <div class="category-item-mobil">
      <span class="icon-mobil">&#10148;</span> Rehber
    </div>
    <div class="category-item-mobil">
      <span class="icon-mobil">&#10148;</span> Kedi İlanları
    </div>
    <div class="category-item-mobil">
      <span class="icon-mobil">&#10148;</span> Köpek İlanları
    </div>
    <div class="category-item-mobil">
      <span class="icon-mobil">&#10148;</span> Kedi Cinsleri
    </div>
    <div class="category-item-mobil">
      <span class="icon-mobil">&#10148;</span> Köpek Cinsleri
    </div>
    <div class="category-item-mobil">
      <span class="icon-mobil">&#10148;</span> Kedi İsimleri
    </div>
    <div class="category-item-mobil">
      <span class="icon-mobil">&#10148;</span> Köpek İsimleri
    </div>
  </div>
  <!--FİNİSH KATEGORİLER MOBİL 01-->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
  <!--START BREADCRUMB-->
  <div class="qna-wrapper">
  
  <main>
    <div class="qna-post">
      <h1 class="qna-title">{{ $topic->title }}</h1>
      <div class="qna-meta">
        {{ $topic->created_at->timezone('Europe/Istanbul')->format('d.m.Y H:i') }}
      </div>

      <div class="qna-author">
        <img src="{{ $topic->user?->image_path ? asset('storage/'.$topic->user->image_path) : asset('storage/default/avatar.png') }}">
        <div>
          <strong>{{ $topic->user->name }}</strong>
          <div class="small text-muted">
            <i class="fa-solid fa-paw"></i> {{ $topic->user->points }} Pati Puan
            @if($topic->user?->rank)
              <span class="qna-rank-badge">{{ $topic->user->rank->name }}</span>
            @endif
          </div>
        </div>
      </div>

      <p class="mt-4">{{ $topic->content }}</p>


      {{-- SAHİPLENDİRME BİLGİLERİ --}}
@if($topic->category_id == 1)
  <div class="adoption-details mt-4 p-3 border rounded bg-light">
    <h5 class="fw-semibold mb-3">🐾 Sahiplendirme Bilgileri</h5>

    <ul class="list-unstyled mb-0">
      @if($topic->type)
        <li><strong>Tür:</strong> {{ ucfirst($topic->type) }}</li>
      @endif

      @if($topic->name)
        <li><strong>Adı:</strong> {{ $topic->name }}</li>
      @endif

      @if($topic->genus)
        <li><strong>Irk:</strong> {{ $topic->genus }}</li>
      @endif

      @if($topic->age)
        <li><strong>Yaş:</strong> 
          @switch($topic->age)
            @case(1) Yavru (0-6 Ay) @break
            @case(2) Genç (6 Ay-2 Yaş) @break
            @case(3) Yetişkin (2-7 Yaş) @break
            @case(4) Yaşlı (7+ Yaş) @break
            @default {{ $topic->age }}
          @endswitch
        </li>
      @endif

      @if($topic->gender)
        <li><strong>Cinsiyet:</strong> {{ $topic->gender == 1 ? 'Erkek' : 'Dişi' }}</li>
      @endif

      @if($topic->size)
        <li><strong>Boyut:</strong>
          @switch($topic->size)
            @case(1) Küçük Boy @break
            @case(2) Orta Boy @break
            @case(3) Büyük Boy @break
            @default {{ $topic->size }}
          @endswitch
        </li>
      @endif

      @if($topic->source)
        <li><strong>İlan Kimden:</strong>
          @switch($topic->source)
            @case(1) Barınaktan @break
            @case(2) Veteriner Hekimden @break
            @case(3) Geçici Evinden @break
            @case(4) Sokaktan @break
            @case(5) Sahibinden @break
            @default {{ $topic->source }}
          @endswitch
        </li>
      @endif

      @if($topic->city || $topic->district)
        <li><strong>Konum:</strong> {{ $topic->district ? $topic->district.',' : '' }} {{ $topic->city }}</li>
      @endif


      @if($topic->phone)
        <li><strong>Telefon:</strong> {{ $topic->phone }}</li>
      @endif
    </ul>
  </div>
@endif


      @if($topic->images->isNotEmpty())
        <div class="row g-3 mt-3">
          @foreach($topic->images as $img)
            <div class="col-6 col-md-4">
              <a href="{{ Storage::url($img->image_path) }}" target="_blank">
                <img src="{{ Storage::url($img->image_path) }}" class="img-fluid rounded">
              </a>
            </div>
          @endforeach
        </div>
      @endif

      <div class="qna-actions">
        @auth
          <button class="btn btn-outline-primary"
        data-topic-id="{{ $topic->id }}"
        onclick="voteAnswer(this,'like')">
  👍 {{ $topic->likes->count() }} Pati
        </button>

          <button class="btn btn-outline-danger" onclick="openReportModal({{ $topic->id }})">
            ⚠️ Şikayet Et
          </button>
        @else
          <a href="https://www.expressmama.com/UyeGiris" class="btn btn-outline-primary">👍 Beğenmek için Giriş Yap</a>
        @endauth
      </div>
    </div>

    <!-- Yorumlar -->
    <div class="mt-4">
      <h4 class="fw-semibold mb-3">{{ $topic->comments->count() }} Cevap</h4>

     @forelse($topic->comments as $comment)
    <div class="comment-card d-flex flex-column flex-md-row mb-4 p-3 shadow-sm rounded">
        {{-- Kullanıcı avatarı --}}
        <div class="me-md-3 mb-2 mb-md-0 text-center">
            <img src="{{ $comment->user?->image_path
                            ? asset('storage/'.$comment->user->image_path)
                            : asset('storage/default/avatar.png') }}"
                 alt="{{ $comment->user->name ?? 'Anonim' }}"
                 class="rounded-circle"
                 style="width:60px;height:60px;object-fit:cover;">
                 
        </div>

        {{-- Yorum içeriği --}}
        <div class="flex-fill">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div>
                    <strong>{{ $comment->user->name ?? 'Anonim' }}</strong>
                    <span class="comment-meta ms-2 text-muted small">
                        {{ $comment->created_at->timezone('Europe/Istanbul')->format('d.m.Y H:i') }}
                    </span>
                    <div class="small text-muted">
            <i class="fa-solid fa-paw"></i> {{ $topic->user->points }} Pati Puan
            @if($topic->user?->rank)
              <span class="qna-rank-badge">{{ $topic->user->rank->name }}</span>
            @endif
          </div>
                </div>
                
            </div>

            <p class="mt-2 mb-2">{{ $comment->content }}</p>

            {{-- Yorum resmi – geniş görünsün --}}
            @if($comment->image_path)
                <div class="mb-3">
                    <img src="{{ asset('storage/'.$comment->image_path) }}"
                         alt="Yorum görseli"
                         class="img-fluid rounded"
                         style="max-width:100%; border:1px solid #e5e7eb;">
                </div>
            @endif

            {{-- Pati & Şikayet butonları --}}
            <div class="d-flex gap-3">
                @auth
                    {{-- Pati (Like) --}}
                    <form method="POST" action="{{ route('comment.like.toggle', $comment->id) }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            🐾 {{ $comment->likes_count ?? $comment->likes()->count() }} Pati
                        </button>
                    </form>

                    {{-- Şikayet Et --}}
                    <form method="POST" action="{{ route('comment.report.store',$comment->id) }}" class="d-inline">
                        @csrf
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            ⚠️ Şikayet Et
                        </button>
                    </form>

@auth
  @if (Auth::id() === $comment->user_id)
    <form method="POST" action="{{ route('comment.delete', $comment->id) }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">
            Sil
        </button>
    </form>
  @endif
@endauth


                @else
                    <a href="https://www.expressmama.com/UyeGiris" class="btn btn-outline-primary btn-sm">
                        🐾 Giriş Yap
                    </a>
                    <a href="https://www.expressmama.com/UyeGiris" class="btn btn-outline-danger btn-sm">
                        ⚠️ Giriş Yap
                    </a>
                @endauth
            </div>
        </div>
    </div>
@empty
    <p class="text-muted">Henüz cevap yok. İlk sen yaz! 🐾</p>
@endforelse

    </div>

    <!-- Cevap Formu -->
    <div class="answer-form mt-4">
      <h5 class="fw-semibold">Cevap Yaz</h5>
      <form method="POST" action="{{ route('answer.store',$topic->id) }}" enctype="multipart/form-data">
        @csrf
        <textarea class="form-control" name="content" placeholder="Deneyimlerinizi paylaşın..." required></textarea>
        <input type="file" name="images[]" class="form-control mt-2" multiple accept="image/*">
        @auth
          <button type="submit" class="btn btn-primary mt-3">Cevabı Gönder</button>
        @else
          <a href="https://www.expressmama.com/UyeGiris" class="btn btn-outline-primary mt-3">Giriş Yap</a>
        @endauth
      </form>
    </div>
  </main>

  <!-- SAĞ: SIDEBAR -->
  <aside>
    <div class="sidebar-widget">
      <h3>SORUNUZ MU VAR?</h3>
      <p class="text-muted small mb-3">Uzmanlardan ve diğer üyelerden faydalı cevaplar almak için:</p>
      <a href="{{ auth()->check()? route('topic.create') : "https://www.expressmama.com/UyeGiris" }}"
         class="btn btn-danger w-100">Yeni Soru Sor</a>
    </div>

    <div class="sidebar-widget">
      <h3>Benzer Sorular</h3>
      <ul class="popular-questions list-unstyled">
        @forelse($similarTopics as $sim)
          <li><a href="{{ route('topic.detail',$sim->id) }}">🐾 {{ $sim->title }}</a></li>
        @empty
          <li class="text-muted">Benzer soru bulunamadı.</li>
        @endforelse
      </ul>
    </div>
  </aside>
</div>



    </aside>
  </div>
  <!--Start Şikayet Modal-->
  <div class="modal" id="reportModal">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Şikayet Et</h3>
        <button class="close-btn" onclick="closeReportModal()">×</button>
      </div>

      <div class="form-group">
        <label class="form-label">Sebep</label>
        <select class="form-select" id="reportReason">
          <option value="">Seçiniz</option>
          <option value="spam">Spam veya Reklam</option>
          <option value="inappropriate">Uygunsuz İçerik</option>
          <option value="harassment">Taciz veya Zorbalık</option>
          <option value="fake">Yanlış Bilgi</option>
          <option value="copyright">Telif Hakkı İhlali</option>
          <option value="other">Diğer</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Açıklama (İsteğe Bağlı)</label>
        <textarea class="form-textarea" id="reportDescription"
          placeholder="Şikayetinizin sebebini yazabilirsiniz..."></textarea>
      </div>

      <div class="modal-actions">
        <button class="btn-cancel" onclick="closeReportModal()">İptal</button>
        <button class="btn-submit" onclick="submitReport()">Şikayet Et</button>
      </div>
    </div>
  </div>
  <!--Finish Şikayet Modal-->




  <script src="./soru-detay.js"></script>

  <script>
// Temizle butonu fonksiyonu
function clearReplyInput() {
    const replyTextarea = document.querySelector('.reply-input');
    if (replyTextarea && confirm('Yazılan metni temizlemek istediğinizden emin misiniz?')) {
        replyTextarea.value = '';
        replyTextarea.focus();
    }
}

// Dinamik alıntı önizleme (isteğe bağlı)
function showQuotePreview(quoteText) {
    const previewDiv = document.getElementById('quote-preview');
    if (previewDiv) {
        previewDiv.innerHTML = quoteText.replace(/\n/g, '<br>');
        previewDiv.style.display = 'block';
    }
}

function hideQuotePreview() {
    const previewDiv = document.getElementById('quote-preview');
    if (previewDiv) {
        previewDiv.style.display = 'none';
    }
}

// Test fonksiyonları - Geliştirme sırasında konsol'da kullanabilirsiniz
window.testVotes = function() {
    console.log('Vote test başlatılıyor...');
    
    // Vote butonlarını otomatik test et
    setTimeout(() => {
        const likeButtons = document.querySelectorAll('.vote-btn');
        likeButtons.forEach((btn, index) => {
            if (btn.textContent.includes('👍')) {
                console.log(`Testing like button ${index}`);
                btn.click();
            }
        });
    }, 1000);
};

// Vote istatistiklerini göster
window.showVoteStats = function() {
    if (typeof voteData !== 'undefined') {
        console.table(voteData);
    } else {
        console.log('Vote data henüz yüklenmedi');
    }
};

document.addEventListener("DOMContentLoaded", function() {
    const viewElement = document.querySelector('.header-stats span:first-child'); // İlk span (görüntülenme)
    
    // localStorage'da mevcut değer var mı kontrol et
    let views = localStorage.getItem('pageViews');
    if (!views) {
        views = 0; // Başlangıç değeri
    } else {
        views = parseInt(views);
    }
    
    // Sayfa her yenilendiğinde 1 arttır
    views++;
    
    // Yeni değeri localStorage'a kaydet
    localStorage.setItem('pageViews', views);
    
    // HTML içeriğini güncelle
    viewElement.innerHTML = `<i class="fa fa-eye"></i> ${views}`; 
});

document.addEventListener("DOMContentLoaded", function() {
    const thumbSpan = document.querySelector('.thumb-count');
    const voteButton = document.querySelector('.vote-btn');

    // LocalStorage'daki değerleri yükle
    let spanCount = localStorage.getItem('thumbSpan') ? parseInt(localStorage.getItem('thumbSpan')) : 0;
    let buttonCount = localStorage.getItem('thumbButton') ? parseInt(localStorage.getItem('thumbButton')) : 9;

    // Sayfa yüklendiğinde değerleri göster
    thumbSpan.innerHTML = `<i class="fa-solid fa-thumbs-up"></i> ${spanCount}`;
    voteButton.innerHTML = `👍 ${buttonCount} Pati`;

    // Butona tıklama olayı
    window.voteAnswer = function(element, type) {
        if (type === 'like') {
            // Değerleri artır
            spanCount++;
            buttonCount++;

            // HTML'i güncelle
            thumbSpan.innerHTML = `<i class="fa-solid fa-thumbs-up"></i> ${spanCount}`;
            element.innerHTML = `👍 ${buttonCount} Pati`;

            // LocalStorage'a kaydet
            localStorage.setItem('thumbSpan', spanCount);
            localStorage.setItem('thumbButton', buttonCount);
        }
    };
});





</script>

<script>
// CSRF
const CSRF = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

// Beğeni: tıkla → toggle et → buton metnini güncelle
async function voteAnswer(btn, type) {
    if (type !== 'like') return;

    const topicId = btn.getAttribute('data-topic-id');
    try {
        const res = await fetch(`/topics/${topicId}/like-toggle`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': CSRF,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({}) // payload gerek yok
        });

        if (res.status === 401) {
            alert('Beğenmek için lütfen giriş yapın.');
            return;
        }

        const data = await res.json();
        // buton yazısını güncelle
        btn.textContent = `👍 ${data.likes_count} Pati`;

        // (isteğe bağlı) aktiflik stili
        if (data.liked) {
            btn.classList.add('active-like');
        } else {
            btn.classList.remove('active-like');
        }
    } catch (e) {
        console.error(e);
        alert('Bir hata oluştu. Lütfen tekrar deneyin.');
    }
}

// --- Şikayet Modal ---

let CURRENT_TOPIC_ID = null;

function openReportModal(topicId) {
    CURRENT_TOPIC_ID = topicId;
    document.getElementById('reportModal').style.display = 'block';
}

// modal kapat
function closeReportModal() {
    document.getElementById('reportModal').style.display = 'none';
    CURRENT_TOPIC_ID = null;
}

// şikayet gönder
async function submitReport() {
    const reason = document.getElementById('reportReason')?.value || '';
    const description = document.getElementById('reportDescription')?.value || '';

    if (!CURRENT_TOPIC_ID) return;

    try {
        const res = await fetch(`/topics/${CURRENT_TOPIC_ID}/report`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': CSRF,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ reason, description })
        });

        const data = await res.json();
        if (data.ok) {
            alert(data.message || 'Şikayet alındı.');
            closeReportModal();
            // alanları temizle
            document.getElementById('reportReason').value = '';
            document.getElementById('reportDescription').value = '';
        } else {
            alert('Şikayet gönderilemedi.');
        }
    } catch (e) {
        console.error(e);
        alert('Bir hata oluştu. Lütfen tekrar deneyin.');
    }
}
</script>

<script>
  document.addEventListener('click', (e) => {
    const toggle = document.getElementById('myaccountToggle');
    const popup  = document.getElementById('myaccountPopup');
    if (!toggle || !popup) return;

    if (e.target.closest('#myaccountToggle')) {
      e.preventDefault();
      popup.classList.toggle('show'); // CSS’inde .show ile görünür yap
    } else if (!e.target.closest('#myaccountPopup')) {
      popup.classList.remove('show');
    }
  });
</script>

</body>

</html>