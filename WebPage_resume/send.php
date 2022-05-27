<?php
    require_once "Smtp.class.php";
    //******************** 配置信息 ********************************
    $smtpserver = "	smtp.qq.com";//SMTP服务器
    $smtpserverport =25;//SMTP服务器端口
    $smtpusermail = "15920323421@163.com";//SMTP服务器的用户邮箱
    // $smtpemailto = $_POST['toemail'];//发送给谁
    $smtpemailto = "WakingHoursHUC@outlook.com" # 发送给我
    $smtpuser = "2775753237@qq.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名

    $name = $_POST['contactName'] // 获取姓名
    $youEmail = $_POST['contactEmail'] // 获取你的邮箱
    $mailtitle = $_POST['contactSubject'];//邮件主题
    
    $smtppass = "zxxuuuecuyjkdgce";//SMTP服务器的授权码
    
    // $mailcontent = "<h1>".$_POST['contactMessage']."</h1>"; //邮件内容
    $mailcontent = "<p>name: ".$name."</p></br>"."<p>Email: ".$youEmail."</p></br></br>"
                "<p>".$_POST['contactMessage']."</p>";
    $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
    //************************ 配置信息 ****************************
    $smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $smtp->debug = false;//是否显示发送的调试信息
    $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

    echo "<div style='width:300px; margin:36px auto;'>";
    if($state==""){
        echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";
        echo "<a href='index.html'>点此返回</a>";
        exit();
    }
    echo "恭喜！邮件发送成功！！";
    echo "<a href='index.html'>点此返回</a>";
    echo "</div>";

?>