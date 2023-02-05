<?php
abstract class EmailLevels
{
    const ENTERPRISE_EMAIL = 1;
    const EDUCATION_EMAIL = 2;
    const GOVERNMENT_EMAIL = 3;
}

abstract class Email
{
    protected $enterprise;
    protected $domain;
    protected $level;

    public function __construct($enterprise, $domain, $level)
    {
        $this->$enterprise;
        $this->domain = $domain;
        $this->level = $level;
    }

    public abstract function validateEmail($email);

}
trait validateEmailBehavs
{

    public function validateEmail($email)
    {
        $parts = explode('@', $email);

        if (sizeof($parts) != 2) {
            throw new Exception("the `{$email}` email isn't valid. the email should has one of `@` (no more no less)");
        }

        $username = $parts[0];
        $domain = $parts[1];

        if ($this instanceof UsernameValidator) {

                $this->validateUserName($username);
            }

            if ($domain != $this->domain) {
                throw new Exception("`{$this->enterprise}` email should ended with `{$this->domain}`");
            }
        }

}
interface UsernameValidator
{

    public function validateUserName($username);
}

class Gmail extends Email implements UsernameValidator{
    use validateEmailBehavs;

    public function __construct()
    {
        parent::__construct("Google", "gmail.com", EmailLevels::ENTERPRISE_EMAIL);
    }

    public function validateUserName($username)
    {
        $username_length = strlen($username);

        if ($username_length < 5 || $username_length > 30) {
            throw new Exception("Username should be at least of 5 charachter & at maximum 10 characters.");
        }
    }
}
class Ptuk extends Email
{
    use validateEmailBehavs;

    public function __construct()
    {
        parent::__construct("Palestine Technical University Kadoorie", "ptuk.edu.ps", EmailLevels::EDUCATION_EMAIL);
    }
}

// $email = new Email(); (BUG: you can't create object from Email)
try {
    $myEmail = "fadi.hijazi@gmail.com";

    $gmail_email = new Gmail();
    $gmail_email->validateEmail($myEmail);
    echo "GmailEmail Validation Passed.", "\n";

} catch (Exception $e) {

    $message = $e->getMessage();
    echo "[Exp]: {$message}", "\n";
}

try {
    $myEmail = "fadi@ptuk.edu.ps";

    $ptuk_email = new Ptuk();
    $ptuk_email->validateEmail($myEmail);
    echo "PtukEmail Validation Passed.", "\n";

} catch (Exception $e) {

    $message = $e->getMessage();
    echo "[Exp]: {$message}";
}