<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
        <div class="grid-container centered">
            <div class="grid-100">
                <div class="container">
                    <div class="grid-100">
                        <div class="heading">
                            <h1>Bring AJAX</h1>
                            <button type="button" class="button" onclick="sendAJAX()"> Bring on Content</button>
                            <ul id="ajax">

                            </ul>
                        </div>
                    </div>
<form action="">
    <input type="text" class="form-control form-control-lg" name="search_text" placeholder="Search..." id="search_text" aria-label=".form-control-lg example" autofocus autocomplete="off">
</form>
<br>
<div id="result_list"></div>
                </div>
            </div>
        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="userDisplay.js"></script>	

<script>
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'headerContent.html');
        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4){
                document.getElementById('ajax').innerHTML = xhr.responseText;
            }
        };
        function sendAJAX(){
            xhr.send();
            document.getElementById('load').style.display = 'none';
        }
    </script>
</body>
</html>