<?php 
require '../Parsedown.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" sizes="192x192" href="http://workplan.keron.co.ke/images/6ee76562-a83d-5719-5ef3-9401327c047e.webPlatform.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Kisumu Health Department | Docs</title>
    <style>
    .card{
        margin:20px;
    }
    hr.hr_fancy{
        background: url(../images/separator.png) repeat-y;
        height:2px;
        background-size: cover;
    
    }
}
    </style>
</head>
<body>
<?php
function adminecho(){
    echo "<div class='container'>
    <div class='row'>
    <div class='col-12 card'>
    <div class='card-body'>";
    $Parsedown = new Parsedown();
    $myfile = fopen("documentation_admin.md", "r") or die("Unable to open file!");
    echo $Parsedown->text(fread($myfile,filesize("documentation_admin.md")));
    fclose($myfile);
    echo "</div>
    </div>
    </div>
    </div>";
}

adminecho();

?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>