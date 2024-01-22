<?php

class ProfileInfoContr extends ProfileInfo {
    
    private $userId;
    private $name;

    public function __construct($userId, $name) {
        $this->userId = $userId;
        $this->name = $name;
    }

    public function defaultProfileInfo() {
        $profileAbout = "Tell people about yourself! Your interests, hobbies, or favorite TV show!";
        $profileTitle = "Hi! I am ".$this->name;
        $profileText = "Welcome to my profile page! Soon I'll be able to tell you more about myself, and what you can find on my profile page.";
        $profileImage = "assets/images/profile.png";

        $this->setProfileInfo($profileAbout, $profileTitle, $profileText, $profileImage, $this->userId);
    }

    public function updateProfileInfo($about, $introTitle, $introText) {
        // Error handlers
        if($this->emptyInputCheck($about, $introTitle, $introText) == true) {
            header("Location: /?id=settings");
            exit();
        }

        // Update profile info
        $this->setNewProfileInfo($about, $introTitle, $introText, $this->userId);
    }

    private function emptyInputCheck($about, $introTitle, $introText) {
        $result;
        if(empty($about) || empty($introTitle) || empty($introText)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

}