<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?=$this->e($title)?:'No title'?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body class="app">    
    <div class="container">
        <?=$this->section('content')?>
    </div>
</div>
<footer class="app-footer bd-footer">
    <div class="container-fluid">
        <?php if ($this->section('footer')): ?>
            <?=$this->section('footer')?>
        <?php else: ?>
            <p style="color:#777;text-align:center;font-size:11px;">
                &copy; <?=date('Y')?>. T <?=sprintf("%01.1f", (microtime(true) - REQUEST_TIME)*1000)?>ms; MP <?=round(memory_get_peak_usage()/1024)?>K
                <br>Built with <strong>Bit55/Midcore</strong>.
            </p>
        <?php endif ?>
    </div>
</footer>

</body>
</html>
