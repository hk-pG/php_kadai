<?php
$x = $_GET['a'];
$y = $_GET['b'];
$operator = $_GET['operator'];
$is_calc_success = true;


switch ($operator) {
    case '+':
        $z = $x + $y;
        break;

    case '-':
        $z = $x - $y;
        break;

    case '*':
        $z = $x * $y;
        $operator = '×';
        break;

    case '/':
        if ($y == 0) {
            $is_calc_success = false;
        } else {
            $z = $x / $y;
        }
        $operator = '÷';
        break;

    default:
        $z = $x + $y;
        break;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?= $is_calc_success ? "答えは" . $z : "計算に失敗しました" ?>
    </title>
    <link rel="stylesheet" href="./scss/kadai01.css" />
</head>

<body>
    <section class="result">

        <header>
            <div class="header-container">
                <h1>Calculator</h1>
                <a href="./kadai01.html">
                    <button class="btn header-btn">
                        もう一度計算する
                    </button>
                </a>
            </div>
        </header>


        <main>
            <canvas id="particle"></canvas>
        </main>

        <footer>
        </footer>

    </section>

    <script src="./particle/jquery-3.6.0.min.js"></script>
    <script src="./particle/particleText.min.js"></script>
    <script type="text/javascript">
        $(function() {

            //オプション付き
            $('#particle').particleText({
                text: '<?= $is_calc_success ? "$x$operator$y=$z" : "計算に失敗しました"  ?>', // 文字

                number: 800,

                colors: ['#000', '#f00'], // パーティクルの色を複数指定可能

                speed: 'high', // slow, middle, high の3つから選んでください。


            });
        });
    </script>
</body>

</html>