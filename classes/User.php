<?php

class User
{
    private $email;
    private $password;
    private $firstname;
    private $lastname;
    private $company;


    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @return  self
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        if (strlen($password) < 5) {
            throw new Exception("Passwords must be longer than 5 characters.");
        }

        $this->password = $password;
        return $this;
    }

    public function canLogin()
    {

        // this function should check if a user can login with the password and user provided
        // use password_verify() to verify your user
        // this function should return true or false and nothing else
        $conn = DB::getInstance();
        $statement = $conn->prepare("select email, password from users where email = :email");
        $statement->bindValue("email", $this->email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $hash = $user['password'];
            if (password_verify($this->password, $hash)) {
                return true;
            } else {
                return false;
            }
        } else {

            throw new Exception("user does not exist");
        }


    }

   
    public function register()
    {
        $options = [
            'cost' => 13
        ];
        $password = password_hash($this->password, PASSWORD_DEFAULT, $options);

        $conn = DB::getInstance();
        $statement = $conn->prepare("insert into users (email, password,firstname,lastname,company) values (:email, :password,:firstname,:lastname,:company);");
        $statement->bindValue(':firstname', $this->firstname);
        $statement->bindValue(':lastname', $this->lastname);
        $statement->bindValue(':company', $this->company);
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':password', $password);
        return $statement->execute();
    }


    public static function getUser($email){
        $conn = DB::getInstance();
        $statement = $conn->prepare("select firstname, lastname, company from users where email = :email");
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }
}