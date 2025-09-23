<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expressmama.com - Sosyal I Expressmama Sosyal</title>
  @vite('resources/css/index.css')
  
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link href="https://fonts.cdnfonts.com/css/outfit" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

  <style>

.profile-card {
    border-radius: 16px;
    overflow: hidden;
}

.profile-card .card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #0d6efd 0%, #4a9ef8 100%);
}

.avatar-wrapper img {
    transition: transform .3s ease;
}

.avatar-wrapper img:hover {
    transform: scale(1.05);
}


body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .soru-cevap-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin: 0 auto;
            max-width: 1000px;
        }

        .soru-cevap-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #e9ecef;
            margin-bottom: 25px;
        }

        .soru-cevap-header span:first-child {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
        }

        .myaccount-popup{ display:none; }
.myaccount-popup.show{ display:block; }


        .soru-cevap-header i {
            color: #6c757d;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .soru-cevap-header i:hover {
            color: #007bff;
        }

        .soru-cevap-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .topic-item {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .topic-item:hover {
            background: #e3f2fd;
            border-color: #2196f3;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .topic-title {
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .topic-meta {
            font-size: 14px;
            color: #6c757d;
        }

        /* Özelleştirilmiş Pagination Stilleri */
        .custom-pagination {
            margin: 30px 0 0 0;
            padding: 0;
        }

        .custom-pagination .pagination {
            justify-content: center;
            gap: 8px;
        }

        .custom-pagination .page-item .page-link {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 10px 15px;
            color: #495057;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            background-color: white;
            min-width: 45px;
            text-align: center;
        }

        .custom-pagination .page-item .page-link:hover {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }

        .custom-pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }

        .custom-pagination .page-item.disabled .page-link {
            background-color: #f8f9fa;
            border-color: #dee2e6;
            color: #6c757d;
            cursor: not-allowed;
        }

        .custom-pagination .page-item.disabled .page-link:hover {
            transform: none;
            box-shadow: none;
            background-color: #f8f9fa;
            border-color: #dee2e6;
            color: #6c757d;
        }

        /* Önceki/Sonraki butonları için özel stiller */
        .custom-pagination .page-item:first-child .page-link,
        .custom-pagination .page-item:last-child .page-link {
            font-weight: 600;
            padding: 10px 18px;
        }

        /* Sayfa bilgisi metnini gizle */
        .pagination-info,
        .showing-results,
        p:contains("Showing") {
            display: none !important;
        }

        /* Laravel'in otomatik eklediği sayfa bilgisi metinlerini gizle */
        .d-flex.justify-content-between.flex-wrap.flex-sm-nowrap.align-items-center.py-4 p,
        .pagination-wrapper p {
            display: none !important;
        }

        /* Responsive tasarım */
        @media (max-width: 768px) {
            .custom-pagination .page-item .page-link {
                padding: 8px 12px;
                min-width: 38px;
                font-size: 14px;
            }
            
            .soru-cevap-container {
                margin: 0 10px;
                padding: 20px 15px;
            }
        }

        /* Ekstra güvenlik: Tüm "showing" metinlerini gizle */
        *:contains("showing"),
        *:contains("Showing"),
        *:contains("results"),
        *:contains("Results") {
            display: none !important;
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
      <a title="Expressmama.com Online Petshop" class="header-logo" href="{{ url('/') }}">
      <img src="https://static.ticimax.cloud/66297//uploads/editoruploads/jhkjhkhjkj.png?t=20240715143822" alt=""
        class="logo-web">
      </a>

      <a title="Expressmama.com Online Petshop" href="{{ url('/') }}">
      <img src="https://static.ticimax.cloud/66297//uploads/editoruploads/jhkjhkhjkj.png?t=20240715143822" alt=""
        class="logo-mobil">
      </a>
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


        <div>

        <!-- Üye Bilgileri Kartı -->

    <div class="profile-card card border-0 shadow-lg">
        <div class="card-header bg-primary text-white text-center py-4">
            <h4 class="mb-0 fw-semibold">Üye Bilgileri</h4>
        </div>

        <div class="card-body p-4">
            <div class="row g-4 align-items-start">

                {{-- SOL: Avatar + Upload --}}
                <div class="col-12 col-md-4 text-center">
                    <div class="avatar-wrapper mb-3">
                        <img id="avatarPreview"
                             src="{{ $user->image_path ? asset('storage/'.$user->image_path) :  asset('storage/default/avatar.png') }}"
                             alt="{{ $user->name }}"
                             class="rounded-circle img-fluid shadow-sm"
                             style="width:180px;height:180px;object-fit:cover;">
                    </div>

                    {{-- Yükleme formu --}}
                    <form method="POST" action="{{ route('account.avatar.update') }}"
                          enctype="multipart/form-data" class="d-grid gap-2">
                        @csrf
                        <input type="file" name="avatar" id="avatarInput"
                               class="form-control form-control-sm"
                               accept="image/png,image/jpeg,image/webp,image/gif" required>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">
                            Fotoğrafı Güncelle
                        </button>
                        <small class="text-muted">JPG / PNG / WEBP / GIF • Max 4 MB</small>
                        @error('avatar')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success mt-3 py-2 px-3 small">{{ session('success') }}</div>
                    @endif
                </div>

                {{-- SAĞ: Bilgiler --}}
                <div class="col-12 col-md-8">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <tbody>
                                <tr>
                                    <th class="text-muted fw-normal w-40">Ad Soyad</th>
                                    <td class="fw-semibold">{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted fw-normal">E-posta</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted fw-normal">Soyad</th>
                                    <td>{{ $user->lastName }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted fw-normal">Seviye / Rütbe</th>
                                    <td>
                                        @if($user->rank?->name)
                                            <span class="badge bg-success px-3 py-2">
                                                {{ $user->rank->name }}
                                            </span>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-muted fw-normal">Üyelik Tarihi</th>
                                    <td>{{ $user->created_at->timezone('Europe/Istanbul')->format('d.m.Y H:i') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


<!-- /Üye Bilgileri Kartı -->

        </div>

 <div class="homepage-section-footer-sosyal-forum">
    <div class="homepage-section-footer-sosyal-forum-header-text">
      <h2 id="footer-forum-header">Expressmama Sosyal Hayvan Severler Kulübü</h2>
    </div>
    <div class="homepage-section-footer-sosyal-forum-main-text">
      <h3 id="footer-forum-description">
        ExpressMama.com’da kedi veya köpek ırklarını inceleyebilir, sahiplenmek istediğiniz cinsler hakkında bilgi
        sahibi olabilir; ücretsiz sahiplendirme ilanlarıyla hayatınızı paylaşacağınız kedi veya köpeği
        sahiplenebilirsiniz.<br><br>
        Sahiplendikten sonra ExpressMama.com'daki kedi isimleri ve köpek isimleri sayfaları sayesinde evciliniz için en
        uygun ismi kolayca bulabilirsiniz.<br><br>
        Kedi veya köpeğinizle yaşarken karşılaştığınız soru veya sorunlarda, Soru-Cevap bölümünde soru sorarak diğer
        hayvanseverlerin deneyimlerinden faydalanabilirsiniz.
      </h3>
    </div>
  </div>
  <!--FİNİSH FOOTER ANASAYFA 01 06-->

  <!--START FOOTER 02 07-->
  <div class="homepage-section-container-footer">
    <div class="homepage-section-container-footer-menu-container">
      <div class="homepage-section-container-footer-menu-item">
        <h2 class="homepage-section-container-footer-menu-item-text" id="footer-hakkinda">Hakkımızda</h2>
      </div>
      <div class="homepage-section-container-footer-menu-item">
        <h2 class="homepage-section-container-footer-menu-item-text" id="footer-gizlilik">Yardım</h2>
      </div>
      <div class="homepage-section-container-footer-menu-item">
        <h2 class="homepage-section-container-footer-menu-item-text" id="footer-yardim">Rozetler & Pati Puan</h2>
      </div>
      <div class="homepage-section-container-footer-menu-item">
        <h2 class="homepage-section-container-footer-menu-item-text" id="footer-kariyer">İletişim</h2>
      </div>
    </div>
    <div class="homepage-section-container-footer-menu-container-two">
      <div class="homepage-section-container-footer-menu-item">
        <h2 class="homepage-section-container-footer-menu-item-text" id="footer-teslimat-kosullari">Teslimat Koşulları
        </h2>
      </div>
      <div class="homepage-section-container-footer-menu-item">
        <h2 class="homepage-section-container-footer-menu-item-text" id="footer-satis">Satış Sözleşmesi</h2>
      </div>
      <div class="homepage-section-container-footer-menu-item">
        <h2 class="homepage-section-container-footer-menu-item-text" id="footer-garanti">Garanti ve İade</h2>
      </div>
      <div class="homepage-section-container-footer-menu-item">
        <h2 class="homepage-section-container-footer-menu-item-text" id="footer-gizlilik">Gizlilik ve Çerez</h2>
      </div>
    </div>
  </div>
  <!--FİNİSH FOOTER 02 07-->

  <!--START SOSYAL MEDYA 08-->
  <div class="homepage-section-footer-social-media">
    <div class="homepage-section-footer-social-media-item">
      <i class="fa-brands fa-instagram" id="instagram-icon"></i>
    </div>
    <div class="homepage-section-footer-social-media-item">
      <i class="fa-brands fa-facebook" id="facebook-icon"></i>
    </div>
    <div class="homepage-section-footer-social-media-item">
      <i class="fa-brands fa-twitter" id="twitter-icon"></i>
    </div>
    <div class="homepage-section-footer-social-media-item">
      <i class="fa-brands fa-youtube" id="youtube-icon"></i>
    </div>
    <div class="homepage-section-footer-social-media-item">
      <i class="fa-brands fa-tiktok" id="tiktok-icon"></i>
    </div>
  </div>
  <!--FİNİSH SOSYAL MEDYA 08-->

  <!--START SİTE ÇALIŞMA BİLGİ 09-->
  <div class="homepage-section-footer-customer-service">
    <div class="homepage-section-footer-customer-service-item">
      <h3 id="customer-service-title">MUTLU MÜŞTERİ HİZMETLERİ</h3>
    </div>
    <div class="homepage-section-footer-customer-service-item">
      <h2 id="customer-service-number">0 533 290 5540</h2>
    </div>
    <div class="homepage-section-footer-customer-service-item">
      <h4 id="customer-service-online-date">Pazartesi - Cumartesi I 08:30 - 18:00</h4>
    </div>
  </div>
  <!--FİNİSH SİTE ÇALIŞMA BİLGİ 09-->

  <!--START SİTE FİRMA BİLGİ 10-->
  <div class="homepage-section-footer-company-alert">
    <div class="homepage-section-footer-company-alert-item-qr">
      <img src="https://static.ticimax.cloud/66297/uploads/footertasarim/9/b2a5ddef-43b1-45e0-afbd-b3beeff65c83.jpg"
        alt="expressmama.com-etbis">
    </div>
    <div class="homepage-section-footer-company-alert-item-company-text">
      <h4 id="company-alert-text">Mustafa Olgun Olgun Ticaret Expressmama.com</h4>
    </div>
    <div class="homepage-section-footer-company-alert-item-company-tax-office">
      <h5 id="company-alert-tax-office">Gaziler Vergi Dairesi - 6410023066 - 29852311898 </h5>
    </div>
    <div class="homepage-section-footer-company-alert-item-company-address">
      <h5 id="company-alert-address">Baruthane Mah. 787. Sok. No:2/1 55100 İlkadım/Samsun</h5>
    </div>
  </div>
  <!--FİNİSH FİRMA BİLGİ 10-->

  <!--START DATE BİLGİ 11-->
  <div class="homepage-section-footer-copyright">
    <h3 id="copyright-text">© 2023-2025 ExpressMama.com Tüm Hakları Saklıdır.</h3>
  </div>
  <!--FİNİSH DATE BİLGİ 11-->       

<script>
  document.addEventListener('click', (e) => {
    const toggle = document.getElementById('myaccountToggle');
    const popup  = document.getElementById('myaccountPopup');
    if (!toggle || !popup) return;

    if (e.target.closest('#myaccountToggle')) {
      e.preventDefault();
      popup.classList.toggle('show'); 
    } else if (!e.target.closest('#myaccountPopup')) {
      popup.classList.remove('show');
    }
  });
</script>

<script>

  const avatarInput = document.getElementById('avatarInput');
  const avatarPreview = document.getElementById('avatarPreview');

  if (avatarInput && avatarPreview) {
    avatarInput.addEventListener('change', (e) => {
      const file = e.target.files?.[0];
      if (!file) return;
      const url = URL.createObjectURL(file);
      avatarPreview.src = url;
    });
  }
</script>
