<?php
class auth{
    // method to bind email template variables
    private function bindTemplateVars($template, $variables) {
        foreach ($variables as $key => $value) {
            $template = str_replace('{{' . $key . '}}', $value, $template);
        }
        return $template;
    }

    // Signup function
    public function signup($conf, $ObjFncs, $lang, $ObjSendMail){
        // Signup 
        if(isset($_POST['signup'])){
            $errors = array(); 

            $fullname = $_SESSION['fullname'] = ucwords(strtolower($_POST['fullname']));
            $email = $_SESSION['email'] = strtolower($_POST['email']);
            $password = $_SESSION['password'] = $_POST['password'];

            // Validate fullname
            if (empty($fullname) || !preg_match("/^[a-zA-Z ]*$/", $fullname)) {
                $errors['fullname_error'] = "Only letters and white spaces are allowed in fullname";
            }

            // Verify email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['mailFormat_error'] = "Invalid email format. Please re-enter your email.";
            }

            // Check if email domain is valid
            $domain = substr(strrchr($email, "@"), 1);
            if (!in_array($domain, $conf['valid_domain'])) {
                $errors['mailDomain_error'] = "Invalid email domain. Enter a valid email address.";
            }

            // Verify password length
            if (strlen($password) < $conf['valid_password_length']) {
                $errors['password_length_error'] = "Password must be at least " . $conf['valid_password_length'] . " characters long";
            }


            if (!count($errors)) {

                $mail_variables = [
                    'site_name' => $conf['site_name'],
                    'fullname' => $fullname,
                    'activation_code' => $conf['activation_code']
                ];

                // Send verification email
                $ObjSendMail->Send_Mail($conf, [
                    'name_from' => $conf['site_name'],
                    'mail_from' => $conf['site_email'],
                    'name_to' => $fullname,
                    'mail_to' => $email,
                    'subject' => $this->bindTemplateVars($lang['ver_reg_subj'], $mail_variables),
                    'body' => nl2br($this->bindTemplateVars($lang['ver_reg_body'], $mail_variables))
                ]);

                // die($fullname." ".$email." ".$password);
                // Clear session variables after successful signup
                $ObjFncs->setMsg('msg', 'You have successfully signed up! Please check your email for verification instructions.', 'success');

                unset($_SESSION['fullname']);
                unset($_SESSION['email']);
                unset($_SESSION['password']);
            } else {
                $ObjFncs->setMsg('errors', $errors, 'alert alert-danger');
                $ObjFncs->setMsg('msg', 'Please fix the errors below and try again.', 'danger');
            }
        }
    }
    public function signin(){
    }
}
?>