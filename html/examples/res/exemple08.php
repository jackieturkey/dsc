<?php
//zend by 旺旺ecshop2011所有  禁止倒卖 一经发现停止任何服务
echo "<style type=\"text/css\">\n<!--\ntable\n{\n    padding: 0;\n    border: solid 1mm LawnGreen;\n    font-size: 12pt;\n    background: #FFFFFF;\n    text-align: center;\n    vertical-align: middle;\n}\n\ntd\n{\n    padding: 1mm;\n    border: solid 1mm black;\n}\n\ntd.div\n{\n    width: 110px;\n    height: 110px;\n    text-align: left;\n    padding: 0\n}\n\ntd.div div\n{\n    margin: auto;\n    background: yellow;\n    border: solid 2px blue;\n    color: red;\n    width: 100px;\n    height: 65px;\n    text-align: center;\n}\n\n-->\n</style>\n<page backcolor=\"#AACCFF\" backleft=\"5mm\" backright=\"5mm\" backtop=\"10mm\" backbottom=\"10mm\" >\n    <table>\n        <tr>\n            <td class=\"div\"><div style=\"rotate: 0;\">Hello ! ceci <b>est</b> un test !<br><img src=\"./res/logo.png\" style=\"width: 80px;\" alt=\"logo\"></div></td>\n            <td class=\"div\"><div style=\"rotate: 270;\">Hello ! ceci <b>est</b> un test !<br><img src=\"./res/logo.png\" style=\"width: 80px;\" alt=\"logo\"></div></td>\n        </tr>\n        <tr>\n            <td class=\"div\"><div style=\"rotate: 90;\">Hello ! ceci <b>est</b> un test !<br><img src=\"./res/logo.png\" style=\"width: 80px;\" alt=\"logo\"></div></td>\n            <td class=\"div\"><div style=\"rotate: 180;\">Hello ! ceci <b>est</b> un test !<br><img src=\"./res/logo.png\" style=\"width: 80px;\" alt=\"logo\"></div></td>\n        </tr>\n    </table>\n    <br>\n    <table cellspacing=\"4\">\n        <tr>\n            <td>a A1</td>\n            <td>aa A2</td>\n            <td>aaa A3</td>\n            <td>aaaa A4</td>\n        </tr>\n        <tr>\n            <td rowspan=\"2\">B1</td>\n            <td style=\"font-size: 16pt\">B2</td>\n            <td colspan=\"2\">B3</td>\n        </tr>\n        <tr>\n            <td>C1</td>\n            <td>C2</td>\n            <td>C3</td>\n        </tr>\n        <tr>\n            <td colspan=\"2\">D1</td>\n            <td colspan=\"2\">D2</td>\n        </tr>\n    </table>\n    <hr>\n    <table>\n        <tr>\n            <td colspan=\"2\">CoucouCoucou !</td>\n            <td>B</td>\n            <td>CC</td>\n        </tr>\n        <tr>\n            <td>AA</td>\n            <td colspan=\"2\">CoucouCoucou !</td>\n            <td>CC</td>\n        </tr>\n        <tr>\n            <td>AA</td>\n            <td>B</td>\n            <td colspan=\"2\">CoucouCoucou !</td>\n        </tr>\n    </table>\n    <hr>\n    <table style=\"background: #FFFFFF\">\n        <tr>\n            <td>AA</td>\n            <td>AA</td>\n            <td>AA</td>\n            <td rowspan=\"2\">AA</td>\n        </tr>\n        <tr>\n            <td>AA</td>\n            <td rowspan=\"2\" colspan=\"2\" >CoucouCoucou !</td>\n        </tr>\n        <tr>\n            <td>AA</td>\n            <td>CC</td>\n        </tr>\n        <tr>\n            <td colspan=\"2\">D1</td>\n            <td colspan=\"2\">D2</td>\n        </tr>\n    </table>\n    <hr>\n</page>";

?>
