<?php
    include_once(__DIR__ . "/../autoloader.php");
    include_once(__DIR__ . "/../helpers/Cleaner.feed.php");


    class User
    {
        private $username;
        private $email;
        private $password;
        private $password_comp;
    
        //profile image
        private $profile_image;
        //social links
        //second email
        private $second_email;
        const PASSWORD_MIN_LENGTH = 6;
        //role
        private $role;

        public function getUsername()
        {
            return $this->username;
        }

        public function setUsername($username)
        {
            $username = Cleaner::cleanInput($username);
            $this->username = $username;
            return $this;
        }

        //emails setters and getters
        public function getEmail()
        {
            return $this->email;
        }
        
        public function setEmail($email)
        {
            $email = Cleaner::cleanInput($email);
            $this->email = $email;
            return $this;
        }

        public function getCompanyCode()
        {
            return $this->password_comp;
        }
        
        public function setCompanyCode($password_comp)
        {
            $password_comp = Cleaner::cleanInput($password_comp);
            $this->password_comp = $password_comp;
            return $this;
        }

        public function getSecondEmail()
        {
            return $this->second_email;
        }
        
        public function setSecondEmail($second_email)
        {
            $second_email = Cleaner::cleanInput($second_email);
            $this->second_email = $second_email;
            return $this;
        }

        //profile_image
        public function getProfileImage()
        {
            return $this->profile_image;
        }

        public function setProfileImage($profile_image)
        {
            $profile_image = Cleaner::cleanInput($profile_image);
            $this->profile_image = $profile_image;
            return $this;
        }

        //password
        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $password = Cleaner::cleanInput($password);
            if (strlen($password) < self::PASSWORD_MIN_LENGTH) {
                throw new Exception("Passwords must be " . self::PASSWORD_MIN_LENGTH . " characters or longer.");
            }
            $this->password = $password;
            return $this;
        }

    

        public function canLogin()
        {
            $conn = DB::getInstance();
            $statement = $conn->prepare("select * from users where email = :email");
            $statement->bindValue(':email', $this -> email);
            $statement->execute();
            $res = $statement->fetch(PDO::FETCH_ASSOC);

            if (!$res) {
                throw new Exception("No user was found with this email");
            }

            if (password_verify($this->password, $res["password"])) {
                return $res;
            }

            throw new Exception("This password does not match the given email");
        }

        public function register($referLink = "")
        {
            if (!$this->userExists()) {
                if (strlen($referLink) === 0) {
                    $regex = '/[a-zA-Z0-9_.+-]+@(company\.)?company\.be/';
                    if (!preg_match($regex, $this->email)) {
                        throw new Exception("Please use your company account to register");
                    }
                }
                $options = [
                'cost' => 15
                ];
                $password = password_hash($this->password, PASSWORD_DEFAULT, $options);

                $conn = DB::getInstance();
                $statement = $conn->prepare("insert into users (username, email, password, user_role, company) values (:username, :email, :password, 'user', :company);");
                $statement->bindValue(':username', $this->username);
                $statement->bindValue(':email', $this->email);
                $statement->bindValue(':password', $password);
                $statement->bindValue(':company', $this->password_comp);
                $statement->execute();
                $res = $conn->lastInsertId();
                return $res;
            } else {
                throw new Exception("This email address is already in use");
            }
        }

        public function userExists()
        {
            $conn = DB::getInstance();
            $statement = $conn->prepare("select * from users where email = :email");
            $statement->bindValue(':email', $this->email);
            $statement->execute();
            $res = $statement->fetch();
            return $res;
        }

        public function usernameExists()
        {
            $conn = DB::getInstance();
            $statement = $conn->prepare("select * from users where username = :username");
            $statement->bindValue(':username', $this->username);
            $statement->execute();
            $res = $statement->fetch();
            return $res;
        }

        

       


        public function getUser()
        {
            $conn = DB::getInstance();
            $statement = $conn->prepare("select username, education, bio, linkedin, website, instagram, github, second_email, profile_image from users where email = :email");
            $statement->bindValue(':email', $this->email);
            $statement->execute();
            $result = $statement->fetch();
            return $result;
        }
    }