<!DOCTYPE html>
<html lang="kk" data-bs-theme="light">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Қарақалпақ Имласы - Орфография ҳәм Транслитератор</title>

    <!-- Bootstrap 5.3 CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/bootstrap-icons.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
</head>
<body>

<!-- Theme Toggle Button -->
<button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
    <i class="bi bi-moon-stars-fill" id="themeIcon"></i>
</button>

<div class="container py-5">
    <!-- Header -->
    <div class="text-center mb-5 fade-in">
        <div class="logo-text mb-3">
            <i class="bi bi-stars"></i> Қарақалпақ Имласы
        </div>
        <h1 class="hero-title">Орфография, Транслитерация ҳәм Сөзлик</h1>
        <p class="text-muted">Қарақалпақ тилиниң заманагөй онлайн жәрдемшиси</p>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-pills mb-4 justify-content-center flex-wrap" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-spelling-tab" data-bs-toggle="pill" data-bs-target="#pills-spelling" type="button" role="tab" aria-controls="pills-spelling" aria-selected="true">
                <i class="bi bi-spell-check me-2"></i>Орфография
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-transliteration-tab" data-bs-toggle="pill" data-bs-target="#pills-transliteration" type="button" role="tab" aria-controls="pills-transliteration" aria-selected="false">
                <i class="bi bi-arrow-left-right me-2"></i>Транслитерация
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-explanation-tab" data-bs-toggle="pill" data-bs-target="#pills-explanation" type="button" role="tab" aria-controls="pills-explanation" aria-selected="false">
                <i class="bi bi-book me-2"></i>Түсиндирме сөзлик
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-usefullinks-tab" data-bs-toggle="pill" data-bs-target="#pills-usefullinks" type="button" role="tab" aria-controls="pills-usefullinks" aria-selected="false">
                <i class="bi bi-link-45deg me-2"></i>Пайдалы Силтемелер
            </button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="pills-tabContent">

        <!-- Spelling Tab -->
        <div class="tab-pane fade show active" id="pills-spelling" role="tabpanel" aria-labelledby="pills-spelling-tab">
            <div class="glass-card p-4 fade-in">
                <h3 class="section-title mb-4">
                    <i class="bi bi-pencil-square"></i>
                    Қарақалпақша орфографиялық тексериў
                </h3>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <label class="form-label fw-semibold mb-3">
                            <i class="bi bi-keyboard me-2"></i>Текстти киритиң:
                        </label>
                        <div class="textarea-wrapper">
                            <textarea name="text" id="textUser" class="form-control modern-textarea" placeholder="Бул жерге текстиңизди жазың..."></textarea>
                            <button type="button" class="copy-btn" onclick="copyToClipboard('textUser')" title="Көшириў">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>
                        <div class="mt-3 text-center">
                            <button type="button" class="btn modern-btn modern-btn-primary px-5 py-2" onclick="checkText()">
                                <i class="bi bi-check2-circle me-2"></i>Тексериў
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label fw-semibold mb-3">
                            <i class="bi bi-check-circle me-2"></i>Тексерилген текст:
                        </label>
                        <div class="textarea-wrapper">
                            <div class="modern-textarea result-display" id="textResponse" contenteditable="false">Нәтийже бул жерде көринеди...</div>
                            <button type="button" class="copy-btn" onclick="copyToClipboard('textResponse')" title="Көшириў">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transliteration Tab -->
        <div class="tab-pane fade" id="pills-transliteration" role="tabpanel" aria-labelledby="pills-transliteration-tab">
            <div class="glass-card p-4 fade-in">
                <h3 class="section-title mb-4">
                    <i class="bi bi-translate"></i>
                    Қарақалпақша Транслитератор
                </h3>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <form>
                            <div class="mb-4">
                                <label for="select" class="form-label fw-semibold">
                                    <i class="bi bi-list-ul me-2"></i>Транслитерация түрин сайлаң:
                                </label>
                                <select name="method" class="form-select modern-select" id="select">
                                    <option value="1">Кирилл → Латын</option>
                                    <option value="2">Латын → Кирилл</option>
                                    <option value="3">Гөне → Таза (алфавит)</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="received" class="form-label fw-semibold">
                                    <i class="bi bi-input-cursor-text me-2"></i>Текстти киритиң:
                                </label>
                                <div class="textarea-wrapper">
                                    <textarea id="received" class="form-control modern-textarea" style="min-height: 250px;" oninput="actions()" placeholder="Текстиңизди бул жерге жазың..."></textarea>
                                    <button type="button" class="copy-btn" onclick="copyToClipboard('received')" title="Көшириў">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="sended" class="form-label fw-semibold">
                                    <i class="bi bi-file-text me-2"></i>Нәтийже:
                                </label>
                                <div class="textarea-wrapper">
                                    <textarea id="sended" class="form-control modern-textarea" style="min-height: 250px;" placeholder="Нәтийже бул жерде көринеди..."></textarea>
                                    <button type="button" class="copy-btn" onclick="copyToClipboard('sended')" title="Көшириў">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dictionary Tab -->
        <div class="tab-pane fade" id="pills-explanation" role="tabpanel" aria-labelledby="pills-explanation-tab">
            <div class="glass-card p-4 fade-in">
                <h3 class="section-title mb-4">
                    <i class="bi bi-journal-text"></i>
                    Түсиндирме сөзлик
                </h3>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <form>
                            <div class="mb-4">
                                <label for="expWord" class="form-label fw-semibold">
                                    <i class="bi bi-search me-2"></i>Сөзди киритиң:
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control " name="expWord" id="expWord" placeholder="Излеўге тийисли сөзди киритиң...">
                                    <button type="button" class="btn modern-btn modern-btn-primary px-4" onclick="explanation()">
                                        <i class="bi bi-search me-2"></i>Излеў
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="expText" class="form-label fw-semibold">
                                    <i class="bi bi-info-circle me-2"></i>Мәниси:
                                </label>
                                <div class="textarea-wrapper">
                                    <div id="expText" class="modern-textarea result-display" style="min-height: 300px;" contenteditable="false">Сөздиң мәниси бул жерде көринеди...</div>
                                    <button type="button" class="copy-btn" onclick="copyToClipboard('expText')" title="Көшириў">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Useful Links Tab -->
        <div class="tab-pane fade" id="pills-usefullinks" role="tabpanel" aria-labelledby="pills-usefullinks-tab">
            <div class="glass-card p-4 fade-in">
                <h3 class="section-title mb-4">
                    <i class="bi bi-link-45deg"></i>
                    Пайдалы Силтемелер
                </h3>
                <div class="modern-alert">
                    <ul class="useful-links">
                        <li>
                            <i class="bi bi-globe2 me-2"></i>
                            <a href="http://shejire.uz" target="_blank">shejire.uz</a>
                            <span class="text-muted d-block ms-4 mt-1">Қарақалпақ руўлары</span>
                        </li>
                        <li>
                            <i class="bi bi-code-square me-2"></i>
                            <a href="http://www.shagalalab.com" target="_blank">shagalalab.com</a>
                            <span class="text-muted d-block ms-4 mt-1">Қарақалпақ тилиндеги бағдарламалар лабораториясы</span>
                        </li>
                        <li>
                            <i class="bi bi-book-half me-2"></i>
                            <a href="http://kitapxana.com" target="_blank">kitapxana.com</a>
                            <span class="text-muted d-block ms-4 mt-1">Қарақалпақ әдебиятының электрон китапханасы</span>
                        </li>
                        <li>
                            <i class="bi bi-translate me-2"></i>
                            <a href="https://from-to.uz" target="_blank">from-to.uz</a>
                            <span class="text-muted d-block ms-4 mt-1">Текстлерди Қарақалпақша-Өзбекше ҳәм Өзбекше-Қарақалпақша аўдармалайтуғын жәрдемшиңиз</span>
                        </li>
                        <li>
                            <i class="bi bi-telegram me-2"></i>
                            <a href="https://t.me/qrtrans_bot" target="_blank">@QrTrans_bot</a>
                            <span class="text-muted d-block ms-4 mt-1">Телеграм мессенджеринде Қарақалпақша Латын-Кирилл ҳәм Кирилл-Латын Транслитератор, Сөзлик, Имла ҳ.т.б. жумысларыңызда сизиң жәрдемшиңиз</span>
                        </li>
                        <li>
                            <i class="bi bi-telegram me-2"></i>
                            <a href="https://t.me/awdarma_bot" target="_blank">@awdarma_bot</a>
                            <span class="text-muted d-block ms-4 mt-1">Телеграм мессенджеринде көплеген тиллерден Қарақалпақ тилине аўдарыўшы, аудиофайлларды текстке аўдарыўшы жәрдемшиңиз</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 py-4">
        <p class="text-muted mb-0">
            <i class="bi bi-heart-fill text-danger me-1"></i>
            Қарақалпақ тилин дәмелеў үшин жасалды
        </p>
    </footer>

</div>

<!-- Bootstrap 5.3 JS Bundle -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<script type="text/javascript">
    // CSRF Token for AJAX requests
    window.csrfToken = "{{ csrf_token() }}";
</script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/trans.js') }}"></script>
</body>
</html>
