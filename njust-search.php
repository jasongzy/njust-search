<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
    <title>NJUST 师生校友搜索引擎</title>
    <link rel="stylesheet" href="https://cdnjs.loli.net/ajax/libs/mdui/1.0.1/css/mdui.min.css">
    <script src="https://cdnjs.loli.net/ajax/libs/mdui/1.0.1/js/mdui.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(":submit").click(function() {
                $("#load").show();
            });
        });
    </script>
    <style>
        .mdui-appbar .mdui-toolbar {
            height: 56px;
            font-size: 16px;
        }

        .mdui-toolbar>* {
            padding: 0 6px;
            margin: 0 2px;
            opacity: 0.5;
        }

        .mdui-toolbar>.mdui-typo-headline {
            padding: 0 16px 0 0;
        }

        .mdui-toolbar>i {
            padding: 0;
        }

        .mdui-toolbar>a:hover,
        a.mdui-typo-headline,
        a.active {
            opacity: 1;
        }

        .mdui-container {
            max-width: 980px;
        }

        .mdui-list-item {
            -webkit-transition: none;
            transition: none;
        }

        .mdui-list>.th {
            background-color: initial;
        }

        .mdui-list-item>a {
            width: 100%;
            line-height: 48px
        }

        .mdui-list-item {
            margin: 2px 0px;
            padding: 0;
        }

        .mdui-toolbar>a:last-child {
            opacity: 1;
        }

        @media screen and (max-width:980px) {
            .mdui-list-item .mdui-text-right {
                display: none;
            }

            .mdui-container {
                width: 100% !important;
                margin: 0px;
            }

            .mdui-toolbar>* {
                display: none;
            }

            .mdui-toolbar>a:last-child,
            .mdui-toolbar>.mdui-typo-headline,
            .mdui-toolbar>i:first-child {
                display: block;
            }
        }
    </style>
</head>

<body class="mdui-theme-primary-indigo mdui-theme-accent-deep-purple">
    <header class="mdui-appbar mdui-color-theme">
        <div class="mdui-toolbar mdui-container">
            <a class="mdui-typo-headline">NJUST</a>
            <div class="mdui-toolbar-spacer"></div>
            <a href="https://jasongzy.com" class="mdui-typo-subheading">@jasongzy</a>
            <a href="https://github.com/jasongzy" target="_blank" class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-tooltip="{content: '查看 GitHub'}">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36 36" enable-background="new 0 0 36 36" xml:space="preserve" class="mdui-icon" style="width: 24px;height:24px;">
                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#ffffff" d="M18,1.4C9,1.4,1.7,8.7,1.7,17.7c0,7.2,4.7,13.3,11.1,15.5
	c0.8,0.1,1.1-0.4,1.1-0.8c0-0.4,0-1.4,0-2.8c-4.5,1-5.5-2.2-5.5-2.2c-0.7-1.9-1.8-2.4-1.8-2.4c-1.5-1,0.1-1,0.1-1
	c1.6,0.1,2.5,1.7,2.5,1.7c1.5,2.5,3.8,1.8,4.7,1.4c0.1-1.1,0.6-1.8,1-2.2c-3.6-0.4-7.4-1.8-7.4-8.1c0-1.8,0.6-3.2,1.7-4.4
	c-0.2-0.4-0.7-2.1,0.2-4.3c0,0,1.4-0.4,4.5,1.7c1.3-0.4,2.7-0.5,4.1-0.5c1.4,0,2.8,0.2,4.1,0.5c3.1-2.1,4.5-1.7,4.5-1.7
	c0.9,2.2,0.3,3.9,0.2,4.3c1,1.1,1.7,2.6,1.7,4.4c0,6.3-3.8,7.6-7.4,8c0.6,0.5,1.1,1.5,1.1,3c0,2.2,0,3.9,0,4.5
	c0,0.4,0.3,0.9,1.1,0.8c6.5-2.2,11.1-8.3,11.1-15.5C34.3,8.7,27,1.4,18,1.4z"></path>
                </svg>
            </a>
            <!--<a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>-->
        </div>
    </header>

    <div class="mdui-container">
        <div class="mdui-container-fluid">
            <div class="mdui-col-md-6 mdui-col-offset-md-3">
                <center>
                    <h4 class="mdui-typo-display-2-opacity">NJUST 师生校友<br>搜索引擎<br></h4>
                </center>
                <form action="" method="post">
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <i class="mdui-icon material-icons">account_box</i>
                        <label class="mdui-textfield-label">关键词（学号、姓名）</label>
                        <input name="keyword" class="mdui-textfield-input" type="text" required value="<?php echo $_POST['keyword']; ?>" />
                        <div class="mdui-textfield-error">不能为空</div>
                    </div>
                    <br><br><br>
                    <button type="submit" class="mdui-center mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme">
                        <i class="mdui-icon material-icons">search</i>
                        搜索
                    </button>
                    <br>
                    <div id="load" style="display:none" class="mdui-typo">
                        <center>
                            <p>
                            <div class="mdui-spinner mdui-spinner-colorful"></div>
                            </p>
                            <p><strong>初次检索可能耗时久一些，请稍候...</strong></p>
                        </center>
                    </div>
                </form>

                <!-- <div class="mdui-typo"> -->
                <!-- <p> -->
                <br><br><br>
                <?php
                if (isset($_POST) && !empty($_POST['keyword'])) {
                    $data_str = exec('njustSearch_cookie.py ' . $_POST['keyword'] . '"');
                    $data_str = str_replace('\'', '"', $data_str);
                    // echo $data_str;
                    $data = json_decode($data_str, true);
                    if (count($data) != 0) {
                        echo '<div class="mdui-table-fluid"><table class="mdui-table"><thead><tr><th>姓名</th><th>学号/工号</th></tr></thead><tbody>';

                        foreach ($data as $item) {
                            echo '<tr>';
                            echo '<td>' . $item['name'] . '</td>';
                            echo '<td>' . $item['code'] . '</td>';
                            echo '</tr>';
                        }

                        echo '</tbody></table></div>';
                    } else {
                        echo '<div class="mdui-typo-headline"><center>无结果！</center></div>';
                    }
                }
                ?>
                <br><br><br>
                <!-- </p> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</body>

</html>