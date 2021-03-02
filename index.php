<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OKSEI PROJECTS</title>

    <style>
        *{
            margin: 0;
            border: 0;
            outline: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        h2{
            margin-bottom: 32px;
        }

        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .sections{
            display: flex;
            justify-content:safe;
            flex-wrap: wrap;
            max-width: 600px;
        }
        .section{
            max-width: 100px;
            width: 100%;
            margin: 16px;
            padding: 32px;
            background-color: #eee;
            border: 2px solid #ccc;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Выберите нужный проект</h2>
    <div class="sections">
        <?php
            function isDirForbidden($dirString){
                $forbidden = false;
                $fbn_extensions = array('.zip', '.ico', '.py', '.7z', '.php');
                if(($dirString == '.' ) || ($dirString == '..' )){
                    $forbidden = true;
                }
                foreach($fbn_extensions as $ext){
                    if(stripos ($dirString, $ext) !== false){
                        $forbidden = true;
                        break;
                    }
                }
                return $forbidden;
            }

            $dirs= scandir('./');
            
            foreach($dirs as $dir){
                if(isDirForbidden($dir)){continue;}
                echo "<div class='section' href='$dir'><p>$dir</p></div>";
            }
            
        ?>
    </div>
    <script>
        let links = document.querySelectorAll(".section[href]")
        for(let link of links){
            link.addEventListener("click", function(){
                window.location = this.getAttribute("href");
            });
        }
    </script>
</body>
</html>