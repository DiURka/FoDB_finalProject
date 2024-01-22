<?php

class ProfileInfoView extends ProfileInfo {

    public function fetchAbout($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        return $profileInfo[0]['about'];
    }

    public function fetchTitle($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        return $profileInfo[0]['intro_title'];
    }

    public function fetchText($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        return $profileInfo[0]['intro_text'];
    }

    public function fetchImage($userId) {
        $profileInfo = $this->getProfileInfo($userId);

        return $profileInfo[0]['image_url'];
    }

}