<!DOCTYPE HTML>
<html>
    <head>
        <title>Your registration on Hertz</title>
        <style>
            body { 
                font-family: Verdana;
                line-height: normal;
            }
            .padding20 {
                padding-left: 20px;
            }            
            .heading2, .paragraf-gray {
                font-size: 10pt;
            }
            .paragraf-gray {
                font-size: 10pt;
            }.footer-gray {
                font-size: 8pt;
                color: #666;
            }
            .indention {
                width: 120px;
            }
        </style>
    </head>
    <body>
        <table cellpadding="0" cellspacing="0" width="940">
            <tr><td height="20"></td></tr>
            <tr><td class="heading2 padding20">
                    Hello <?php echo $user_name;?>,
            </td></tr>
            <tr><td height="20"></td></tr>
            <tr><td><p class="paragraf-gray padding20">Welcome to Hertz Administration Section at <a href="admin">www.hertzpageo.com/admin</a> ! You have been successfully registered.</p>
            </td></tr>
            <tr><td>

                    <p class="paragraf-gray padding20">
                        <b>Before you can begin using your account, you need to activate it using the below link.</b><br><br>
                            <a href="<?php echo 'users/confirm_account';?>/<?php echo $activation_key;?>">Confirm Email Address</a>.<br>
                    </p>
                   
                    <p class="paragraf-gray padding20">
                        <b>E-Mail:</b>    <?php echo $user_email;?><br>
                        <b>User Name:</b>    <?php echo $user_name;?><br>
                        <b>Login Url:</b> <a href="admin">www.hertzpageo.com/admin</a><br>
                    </p>
                    <p class="paragraf-gray padding20">You have received this email, as a request was initiated to register the account. If you have any questions, or there is a technical problem, you can contact your administrator.<br></p>
                    <p>
                        
                        The Hertz Team 
                    </p>
                   </td></tr>

        </table>
    </body>
</html>
