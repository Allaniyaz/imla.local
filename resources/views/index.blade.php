<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Қарақалпақ Имласы</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.css') }}">
    <style>
        * {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .nav-link {
            color: #d34c17;
        }
        ul.useful-links {
            list-style: none;
        }
    </style>
	<script type="text/javascript" src="{{ asset('/assets/js/jquery-3.3.1.min.js') }}"></script> 
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/assets/js/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('/assets/js/ckeditor/adapters/jquery.js') }}"></script>
</head>
<body>



<div class="container mt-3">

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active h5" id="pills-spelling-tab" data-toggle="pill" href="#pills-spelling" role="tab" aria-controls="pills-spelling" aria-selected="true">Орфография</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5" id="pills-transliteration-tab" data-toggle="pill" href="#pills-transliteration" role="tab" aria-controls="pills-transliteration" aria-selected="false">Транслитерация</a>
        </li>
        <li class="nav-item">
            <a class="nav-link h5" id="pills-explanation-tab" data-toggle="pill" href="#pills-explanation" role="tab" aria-controls="pills-explanation" aria-selected="false">Түсиндирме сөзлик</a>
          </li>
        <li class="nav-item">
          <a class="nav-link h5" id="pills-usefullinks-tab" data-toggle="pill" href="#pills-usefullinks" role="tab" aria-controls="pills-usefullinks" aria-selected="false">Пайдалы Силтемелер</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">

        <div class="tab-pane fade show active" id="pills-spelling" role="tabpanel" aria-labelledby="pills-spelling-tab">
            <div class="row text-center">
                <div class="col-12 m-3">
                    <h2 class="h2 text-secondary text-center">Қарақалпақша орфографиялық тексериў</h2>
                </div>
                <div class="col-6">			
                    <textarea name="text" id="textUser" class="form-control" rows="19" oninput="checkText()"></textarea>
                </div>
                <div class="col-6">
                    <textarea class="texteditor textResponse" id="textResponse"></textarea>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-transliteration" role="tabpanel" aria-labelledby="pills-transliteration-tab">
            <div class="row">
                <div class="col-12 m-3">
                    <h2 class="h2 text-secondary text-center">Қарақалпақша Транслитератор</h2>
                </div>
                <br>
                <div class="col-9">
                    
                    <form>
                        <label for="select">Сайлаң</label>                        
                        <select name="method" class="form-control" id="select">
                            <option value="1">Кирилл -> Латын</option>
                            <option value="2">Латын -> Кирилл</option>
                            <option value="3">Гөне -> Таза (алфавит)</option>
                        </select>
                        <br>
                        <label for="received">Текстти киритиң:</label>
                        <textarea id="received" class="form-control" cols="40" rows="8" oninput="actions()"></textarea>
                        <label for="sended">Нәтийже:</label>
                        <textarea id="sended" class="form-control" cols="40" rows="8"></textarea>
                    </form>
    
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-explanation" role="tabpanel" aria-labelledby="pills-explanation-tab">
            <div class="row">
                <div class="col-12 m-3">
                    <h2 class="h2 text-secondary text-center">Түсиндирме сөзлик</h2>
                </div>
                <br>
                <div class="col-9">
                    <form>
                        <label for="expWord">Сөзди киритиң:</label>
                        <div class="d-flex">
                            <input type="text" class="form-control w-25 mr-2" name="expWord" id="expWord">
                            <button type="button" class="btn btn-outline-secondary" onclick="explanation()">Излеў</button>
                        </div>
                        <br><br>
                        <label for="expText">Мәниси:</label>
                        <textarea id="expText" name="expText" class="form-control" cols="30" rows="8"></textarea>
                    </form>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-usefullinks" role="tabpanel" aria-labelledby="pills-usefullinks-tab">
            <div class="alert alert-success mt-5">
                <ul class="useful-links">
                    <li class="mb-3 mt-2"><a href="http://www.shagalalab.com">shejire.uz</a> - Қарақалпақ руўлары</li>
                    <li class="mb-3"><a href="http://www.shagalalab.com">shagalalab.com</a> - Қарақалпақ тилиндеги бағдарламалар лабораториясы</li>
                    <li class="mb-3"><a href="http://kitapxana.com">kitapxana.com</a> - Қарақалпақ әдебиятының электрон китапханасы</li>
                    <li class="mb-3"><a href="https://from-to.uz">from-to.uz</a> - Текстлерди Қарақалпақша-Өзбекше ҳәм Өзбекше-Қарақалпақша аўдармалайтуғын жәрдемшиңиз</li>
                    <li class="mb-3"><a href="https://t.me/qrtrans_bot">@QrTrans_bot</a> - Телеграм мессенджеринде Қарақалпақша Латын-Кирилл ҳәм Кирилл-Латын Транслитератор, Сөзлик, Имла ҳ.т.б. жумысларыңызда сизиң жәрдемшиңиз</li>
                    <li><a href="https://t.me/awdarma_bot">@awdarma_bot</a> - Телеграм мессенджеринде көплеген тиллерден Қарақалпақ тилине аўдарыўшы, аудиофайлларды текстке аўдарыўшы жәрдемшиңиз</li>
                </ul>
            </div>
        </div>
    </div>


</div>

<script type="text/javascript">
	$( document ).ready( function () {
		$('.texteditor').ckeditor();
		//$('.texteditor').attr('rows', '50');
        $('#expText').ckeditor();
	});

	function checkText() {
		//$('#textResponse').val($('#textUser').val());
		$.ajax({
			url: "/check",
			type: "POST",
			data: { 
                "_token": "{{ csrf_token() }}",
                text: $('#textUser').val(), 
            },
			success: function(data) {
				$('#textResponse').val(data);
			}
		});
	}

    function explanation() {
        $.ajax({
            url: "/explanation",
            type: "POST",
            data: { 
                '_token': "{{ csrf_token() }}",
                word: $('#expWord').val()
            },
            success: function(data) {
                $('#expText').val(data);
            }
        });
    }
</script>
<script src="{{ asset('/assets/js/trans.js') }}"></script>
</body>
</html>