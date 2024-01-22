<?php



class ProfileInfo extends Dbh {



    protected function getProfileInfo($userId) {

        $stmt = $this->connect()->prepare('SELECT * FROM profiles WHERE users_id = ?;');

    

        if(!$stmt->execute(array($userId))) {

            $stmt = null;

            header('Location: /?id=profile?error=stmtfailed');

            exit();

        }



        if($stmt->rowCount() == 0) {

            $stmt = null;

            header('Location: /?id=profile?error=profilenotfound');

            exit();

        }



        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);



        return $profileData;

    }



    protected function setNewProfileInfo($profileAbout, $profileTitle, $profileText, $userId) {

        $stmt = $this->connect()->prepare('UPDATE profiles SET about = ?, intro_title = ?, intro_text = ? WHERE users_id = ?;');

        



        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) {

            $stmt = null;

            header('Location: /?id=profile?error=stmtfailed');

            exit();

        }

        

        $stmt=null;

    }



    protected function setProfileInfo($profileAbout, $profileTitle, $profileText, $profileImage, $userId) {

        $stmt = $this->connect()->prepare('INSERT INTO profiles (about, intro_title, intro_text, image_url, users_id) VALUES (?, ?, ?, ?, ?);');

    

        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $profileImage, $userId))) {

            $stmt = null;

            header('Location: /?id=profile?error=stmtfailed');

            exit();

        }

        

        $stmt=null;

    }

    

}