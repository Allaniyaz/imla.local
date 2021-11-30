<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Spell-check</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.css') }}">
    <style>
        * {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .nav-link {
            color: #d34c17;
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
          <a class="nav-link active h5" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Орфография</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Транслитерация</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Пайдалы Силтемелер</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">

        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row text-center">
                <div class="col-12 m-3">
                    <h2 class="h2 text-secondary text-center">Қарақалпақша орфографиялық тексериў</h2>
                </div>
                <div class="col-6">			
                    <textarea name="text" id="textUser" class="form-control" rows="19"></textarea>
                </div>
                <div class="col-6">
                    <textarea class="texteditor" id="textResponse"></textarea>
                </div>
                <div class="col-md-12">
                    <input class="btn btn-outline-success btn-lg m-2" type="button" value="Тексериў" name="" onclick="checkText()">
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-12 m-3">
                    <h2 class="h2 text-secondary text-center">Қарақалпақша Транслитератор</h2>
                </div>
                <br>
                <div class="col-9">
                    
                    <form action="trans.php" class="form" method="post">
                        <label for="select">Сайлаң</label>                        
                        <select name="method" class="form-control" id="select">
                            <option value="1">Кирилл -> Латын</option>
                            <option value="2">Латын -> Кирилл</option>
                            <option value="3">Гөне -> Таза (алфавит)</option>
                        </select>
                        <br>
                        <label for="received">Текстти киритиң:</label>
                        <textarea id="received" class="form-control" cols="40" rows="8"></textarea>
                        
                        <div class="mt-3 mb-3 text-center">
                            <button type="button" id="button" class="btn btn-outline-success">Транслитерация</button>
                        </div>
                        <label for="sended">Нәтийже:</label>
                        <textarea id="sended" class="form-control" cols="40" rows="8"></textarea>
                    </form>
    
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">fffffwww</div>
    </div>


</div>

<script type="text/javascript">
	$( document ).ready( function () {
		$('.texteditor').ckeditor();
		//$('.texteditor').attr('rows', '50');
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
</script>
<script src="{{ asset('/assets/js/trans.js') }}"></script>
</body>
</html>