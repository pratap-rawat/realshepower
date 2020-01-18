<?php
class EmailComponent extends Component {

    public $components = array("Session","Security","Common");

    /**
    * send sign up activation email.
    */
    public function sendSignupActivationEmail($data) {

        /*if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return true;
        }*/

        App::import('Model');
        

        $signup_from_name = "Hertz Admin";
        $signup_from_email = "admin@hertz.com";
        $signup_email_subject = "User Account Activation Mail for www.hertzpageo.com/admin";

        App::uses('CakeEmail', 'Network/Email');

        App::import('Model', 'User');
        $user = new User;
        $activation_key = 'Vivek';
        $email = new CakeEmail('smtp');
        $email->viewVars(array(
        'activation_key' => $activation_key,
        'user_id' => 1,
        'user_email' => $data['email'],
        'user_name' => $data['username']
        )
        );

        //$email->template('user_registration', 'default')
    $email->template('user_registration', null)
        ->emailFormat('html')
        ->from(array($signup_from_email => $signup_from_name)) 
        ->to($data['email'])
        ->subject($signup_email_subject);

        $email->send();

        return $activation_key;
    }

    /**
    * send forgot password email
    */
    public function sendForgotPasswordEmail($data) {
        /*
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return true;
        }*/

        App::import('Model');
        
        $forgot_password_from_name = "Hertz Admin";
        $forgot_password_from_email = "admin@hertz.com";
        $forgot_password_subject = "User Account forgot password Mail for www.hertzpageo.com/admin";

        App::uses('CakeEmail', 'Network/Email');
        
        $email = new CakeEmail('default');
        $secret_email = $this->Common->encrypt_decrypt('encrypt',$data['User']['email']);
        //$secret_email =md5($data['User']['email']);
        //Security::encrypt($data['User']['email'], $key);
        $email->viewVars(array(
        'user_id' => $data['User']['id'],
        'user_email' => $secret_email,
        'user_name' => $data['User']['username']
        ));

        $email->template('forgot_password', 'default')
        ->emailFormat('html')
        ->from(array($forgot_password_from_email => $forgot_password_from_name)) 
        ->to($data['User']['email'])
        ->subject($forgot_password_subject);

        if($email->send()){
            return true;
        }else{
            return false;
        }
    }
}