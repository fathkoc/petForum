<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expressmama.com - Sosyal I Expressmama Sosyal</title>
  @vite('resources/css/sor.css')
  @vite('resources/css/index.css')
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link href="https://fonts.cdnfonts.com/css/outfit" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

  <style>


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
      <a title="Expressmama.com Online Petshop" class="header-logo" href="http://127.0.0.1:8000/">
      <img src="https://static.ticimax.cloud/66297//uploads/editoruploads/jhkjhkhjkj.png?t=20240715143822" alt=""
        class="logo-web">
      </a>

      <a title="Expressmama.com Online Petshop" href="http://127.0.0.1:8000/">
      <img src="https://static.ticimax.cloud/66297//uploads/editoruploads/jhkjhkhjkj.png?t=20240715143822" alt=""
        class="logo-mobil">
      </a>
    </div>
  </div>
  <!--FİNİSH LOGO-->

  <!--START ÜYE GİRİŞ KAYIT ALANI-->
  <!-- <div class="login-container">
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
  </div> -->
  <!--FİNİSH ÜYE GİRİŞ KAYIT ALANI-->

  <!-- START WEB ARAMA KUTUSU - SAĞ MENÜ YARDIM HESABIM ve SEPETİM -->
  <!-- Arama Kutusu -->
  
    

    <!-- Sağ Menü -->
    <div class="login-actions">
      <!-- <div class="help-container">
       
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
        </div> -->
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
    <!-- <div class="question-answer-wrapper">
        <div class="breadcrumb-line">
            <div class="question-answer-container">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="question-answer-breadcrump">
                            <li class="breadcrump-item">
                                <a href="https://sosyal.expressmama.com" title="expressmama sosyal"
                                    class="breadcrump-link">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrump-item active">
                                <i class="fa-solid fa-angle-right" id="question-answer-breadcrump-icon"></i>
                                <a href="https://sosyal.expressmama.com¨/soru-cevap" title="Soru Cevap"
                                    class="breadcrump-link">Soru
                                    Cevap</a>
                            </li>
                            <li class="breadcrump-item active">
                                <i class="fa-solid fa-angle-right"
                                    id="question-answer-breadcrump-icon-new-question-icon"></i>
                                <a href="https://sosyal.expressmama.com¨/soru-cevap" title="Soru Cevap"
                                    class="breadcrump-link">Yeni
                                    Soru Sor</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="ask-new-question-header-container">
        <div class="ask-new-question-header">
            <div class="ask-new-question-header-block">
                <div class="ask-new-question-header-block-title">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <h2 class="container-title">Yeni Soru Sor</h2>
                   <form action="{{ route('topic.create') }}" method="post" role="form" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    <fieldset>
        <!-- Konu Seçimi -->
        <div class="form-group">
            <label for="category-select" class="col-md-1 control-label">Konu</label>
<div>
  <select name="category" id="category-select" class="form-control" required>
    <option value="" disabled {{ old('category') ? '' : 'selected' }}>Kategori seçiniz</option>
    @foreach ($categorys as $category)
      <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
        {{ $category->name }}
      </option>
    @endforeach
  </select>
</div>

        </div>

        <!-- Başlık -->
        <div class="form-group">
            <label for="inputTitle" class="col-md-1 control-label">Başlık</label>
            <div>
                <textarea
                    name="title"
                    class="form-control"
                    placeholder="Sorunuzun özetini anlaşılır bir şekilde buraya yazmalısınız. Soru cümlesi olmalıdır."
                    id="inputTitle"
                    rows="3"
                    maxlength="255"
                ></textarea>
            </div>
        </div>

        <!-- Soru İçeriği -->
        <div class="form-group">
            <label for="inputDescription" class="col-md-1 control-label">Soru</label>
            <div>
                <div class="md-editör" id="1753537654648">
                    <textarea
                        name="content"
                        class="form-control md-input"
                        placeholder="Sorunuzu detaylı anlatırsanız, diğer üyeler ve uzmanlardan daha doğru cevaplar alabilirsiniz."
                        data-iconlibrary="fa"
                        data-provide="markdown"
                        data-hidden-buttons='["cmdCode","cmdPreview"]'
                        maxlength="2000"
                        rows="5"
                        style="resize: none;"
                    ></textarea>
                </div>
            </div>
        </div>

        <!-- Sahiplendirme Bilgileri -->
        <div class="adoption-container d-none">
            <div class="adoption-header"></div>
            <div class="adoption-content">
                
                <!-- Pet Türü -->
                <div class="form-group">
                    <label for="pet-type">Pet Türü Seçiniz</label>
                    <select class="form-control" name="animal" id="form-header-select">
                        <option value="kedi">Kedi</option>
                        <option value="köpek">Köpek</option>
                        <option value="kuş">Kuş</option>
                        <option value="kemirgen">Kemirgen</option>
                        <option value="sürüngen">Sürüngen</option>
                        <option value="akvaryum">Akvaryum</option>
                    </select>
                </div>
    

                <!-- Irk -->
                <div class="form-group">
                    <label for="pet-types">Irk</label>
                    <input
                        type="text"
                        id="pet-types"
                        name="genus"
                        class="form-control"
                        placeholder="Örneğin: British Shorthair, Golden Retriever"
                    >
                </div>

                <!-- Yaş -->
                <div class="form-group">
                    <label for="pet-age">Yaş</label>
                    <select class="form-control" name="age" id="form-header-select">
                        <option value="" selected>Seçiniz</option>
                        <option value="1">Yavru (0-6 Aylık)</option>
                        <option value="2">Genç (6 Aylık - 2 Yaş)</option>
                        <option value="3">Yetişkin (2 - 7 Yaş)</option>
                        <option value="4">Yaşlı (7 Yaş ve üzeri)</option>
                    </select>
                </div>

                <!-- Cinsiyet -->
                <div class="form-group">
                    <label for="pet-gender">Cinsiyet</label>
                    <select name="gender" class="form-control" id="form-header-select">
                        <option value="" selected>Seçiniz</option>
                        <option value="1">Erkek</option>
                        <option value="2">Dişi</option>
                    </select>
                </div>


                <!-- İlan Kaynağı -->
                <div class="form-group">
                    <label for="pet-source">İlan Kimden</label>
                    <select class="form-control" name="type" id="form-header-select">
                        <option value="0" selected>Seçiniz</option>
                        <option value="Barınaktan">Barınaktan</option>
                        <option value="Veteriner Hekimden">Veteriner Hekimden</option>
                        <option value="Sokaktan">Sokaktan</option>
                        <option value="Sahibinden">Sahibinden</option>
                    </select>
                </div>

                <!-- Şehir ve İlçe -->
                <div class="form-group">
                    <label for="city">Şehir</label>
                    <select id="city" name="city" class="form-select" required>
                        <option value="">İl Seçiniz</option>
                        @foreach($iller as $il)
                            <option value="{{ $il['sehir_adi'] }}">{{ ucfirst($il['sehir_adi']) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="district">İlçe</label>
                    <select id="district" name="district" class="form-select" required>
                        <option value="">Önce il seçiniz</option>
                    </select>
                </div>

                <!-- Ad Soyad -->
                <div class="form-group">
                    <label for="owner-name">Ad Soyad</label>
                    <textarea
                        type="text"
                        placeholder="Ad Soyad Giriniz"
                        id="form-header-select"
                        class="form-control md-input"
                        name="name"
                    ></textarea>
                </div>

                <!-- Telefon -->
                <div class="form-group">
                    <label for="owner-phone">Telefon</label>
                    <textarea
                        type="text"
                        placeholder="0(5**) *** ** **"
                        id="form-header-select"
                        class="form-control md-input"
                        name="phone"
                    ></textarea>
                </div>

                <!-- Uyarılar -->
                <div class="adoption-warning">
                    <div class="adoption-list">
                        <p><i class="fa-solid fa-circle-exclamation"></i> Sadece <b>ücretsiz sahiplendirmeler</b> için ilan verilebilir.</p>
                        <p><i class="fa-solid fa-circle-exclamation"></i> Evcil hayvan arıyorsanız "arıyorum" içerikli ilanlar açmak yerine sahiplendirme ilanlarına bakabilirsiniz.</p>
                        <p><i class="fa-solid fa-circle-exclamation"></i> Sahiplendirmek istediğiniz her evsiz hayvan için <b>ayrı ayrı ilan vermelisiniz.</b></p>
                        <p><i class="fa-solid fa-circle-exclamation"></i> Kurallara uygun olmayan ilanlar veren üyelerin <b>üyelikleri yeniden açılmamak üzere iptal edilir.</b></p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Fotoğraf Yükleme -->
        <div class="row bottom-margin-15">
            <div class="form-group mt-4">
                <input type="file" name="images[]" id="images" class="form-control" accept="image/*" multiple>
                <small class="form-text text-muted">Birden fazla fotoğraf seçebilirsiniz.</small>
            </div>
        </div>

        <!-- Gönder Butonu -->
        <div class="form-group row mt-4">
            <div class="col-md-2 col-md-offset-1">
                <button type="submit" class="btn btn-primary">Gönder Yayınla!</button>
            </div>
        </div>
    </fieldset>
</form>



  


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
    
     <script src="https://cdn.ckeditor.com/ckeditor5/41.0.1/classic/ckeditor.js"></script>
    
     @vite(['resources/css/sor.css', 'resources/js/sor.js'])
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

        <script src="./sor.js"></script>

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

  const el = document.querySelector('.header .logo a');
const r = el.getBoundingClientRect();
console.log(document.elementFromPoint(r.left + r.width/2, r.top + r.height/2));

</script>

<script>
    const allDistricts = @json($ilceler);

    document.getElementById('city').addEventListener('change', function () {
        const city = this.value;
        const districtSelect = document.getElementById('district');
        districtSelect.innerHTML = '<option value="">İlçe Seçiniz</option>';

        allDistricts
          .filter(i => i.sehir_adi === city)
          .forEach(d => {
              const opt = document.createElement('option');
              opt.value = d.ilce_adi;
              opt.textContent = d.ilce_adi;
              districtSelect.appendChild(opt);
          });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const categorySel = document.getElementById('category-select');
  const adoptionBox = document.querySelector('.adoption-container');
  const adoptionFields = adoptionBox.querySelectorAll('input, select, textarea');

  function apply(show) {
    if (show) {
      adoptionBox.classList.remove('d-none');
    } else {
      adoptionBox.classList.add('d-none');
    }
    adoptionFields.forEach(el => el.disabled = !show);
  }

  function toggle() {
    apply(categorySel.value === '1');
  }

  // İlk yüklemede ve değişimde çalıştır
  toggle();
  categorySel.addEventListener('change', toggle);
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const categorySel = document.getElementById('category-select');
  const imagesInput = document.getElementById('images');

  function toggleImagesRequired() {
    const must = categorySel.value === '1';
    if (must) {
      imagesInput.required = true;
      imagesInput.disabled = false;
    } else {
      imagesInput.required = false;
      // İstersen disable da edebilirsin; genelde gerekmez
      // imagesInput.disabled = true;
    }
  }

  toggleImagesRequired();
  categorySel.addEventListener('change', toggleImagesRequired);
});
</script>


</body>

</html>