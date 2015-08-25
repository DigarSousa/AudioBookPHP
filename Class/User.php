<?php

include_once('Encryption.php');
include_once('../Config/Config.php');

class User
{
    // Attributes
    //=================================================================================================================
    private $name_;
    private $email_;
    private $password_;
    //=================================================================================================================

    // Contsructor
    //=================================================================================================================
    function __construct($name, $email, $password)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }
    //=================================================================================================================

    // Getters and Setters
    //=================================================================================================================
    // Name
    //----------------------------------------------------------------
    public function getName()
    {
        return $this->name_;
    }

    public function setName($name)
    {
        $this->name_ = $name;
    }
    //----------------------------------------------------------------

    // Email
    //----------------------------------------------------------------
    public function getEmail()
    {
        return $this->email_;
    }

    public function setEmail($email)
    {
        $this->email_ = $email;
    }
    //----------------------------------------------------------------

    // Password
    //----------------------------------------------------------------
    public function getPassword()
    {
        return $this->password_;
    }

    public function setPassword($password)
    {
        $this->password_ = Encryption::mdFive($password);
    }
    //----------------------------------------------------------------
    //=================================================================================================================

    // Public Methods
    //=================================================================================================================
    public function signUp()
    {
        if (!$this->accountExists()) {
            if ($this->prepareAndBindSignUp()) {
                $this->login();
                return true;
            }
        }
        return false;
    }

    public function login()
    {
        if ($this->prepareAndBindLogin()) {
            $this->openCache();
            return true;
        }
        return false;
    }
    //=================================================================================================================

    // Private Methods
    //=================================================================================================================

    private function accountExists()
    {

        $conn = openCon();
        $stmt = $conn->prepare("SELECT
									U.EMAIL,
									U.PASSWORD
								FROM
									USER U
								WHERE
									U.EMAIL LIKE :email ");

        if ($stmt) {

            //Selecting the data
            $stmt->bindValue(':email', $this->getEmail());
            $stmt->execute();

            //Getting the result
            if ($stmt->rowCount() > 0) {
                $conn = null;
                return true;
            }
        }
        $conn = null;
        return false;
    }

    private function prepareAndBindSignUp()
    {

        $conn = openCon();
        $stmt = $conn->prepare("  INSERT INTO
										USER
										(Name, Email, Password)
								  VALUES
										(:name, :email, :pass)");
        if ($stmt) {
            //Selecting the data
            $stmt->bindValue(':name', $this->getName());
            $stmt->bindValue(':email', $this->getEmail());
            $stmt->bindValue(':pass', $this->getPassword());
            $stmt->execute();
            $conn = null;
            return true;
        }
        return false;
    }

    private function prepareAndBindLogin()
    {
        $conn = openCon();
        $stmt = $conn->prepare("SELECT
									EMAIL,
									PASSWORD
								FROM
									USER
								WHERE
									EMAIL LIKE :email AND
									PASSWORD LIKE :pass ");

        if ($stmt) {

            //Selecting the data
            $stmt->bindValue(':email', $this->getEmail());
            $stmt->bindValue(':pass', $this->getPassword());
            $stmt->execute();

            //Getting the result
            if ($stmt->rowCount() > 0) {
                $conn = null;
                return true;
            }
        }

        $this->closeCache();
        $conn = null;
        return false;
    }

    private function openCache()
    {
        $_SESSION['user'] = $this;
        setcookie('user', 'user', time() + 3600); // Cookie for 1 hour
    }

    private function closeCache()
    {
        session_unset();
        setcookie('user', $this, time() - 3600);
    }
    //=================================================================================================================

}