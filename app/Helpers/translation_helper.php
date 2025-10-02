
<?php

if (!function_exists('translate_dynamic_content')) {
    /**
     * Smart translation function that combines manual translations with Google Translate fallback
     */
    function translate_dynamic_content($text, $target_language = 'hi', $source_language = 'en') {
        // Return original text if same language or empty
        if (empty($text) || $target_language === $source_language) {
            return $text;
        }

        // Manual translations for common terms
        $manual_translations = [
            'en_to_hi' => [
                'Success Stories' => 'सफलता की कहानियां',
                'Beneficiaries' => 'लाभार्थी',
                'Join Us' => 'हमसे जुड़ें',
                'Home' => 'होम',
                'About' => 'हमारे बारे में',
                'Contact' => 'संपर्क',
                'Founders & Members' => 'संस्थापक और सदस्य',
                'Media' => 'मीडिया',
                'NGO Works' => 'एनजीओ के काम',
                'Student' => 'छात्र',
                'Volunteer' => 'स्वयंसेवक',
                'Donor' => 'दानकर्ता',
                'Name' => 'नाम',
                'Email' => 'ईमेल',
                'Phone' => 'फोन',
                'Address' => 'पता',
                'Submit' => 'जमा करें',
                'Read More' => 'और पढ़ें',
                'View Details' => 'विवरण देखें',
                'Education' => 'शिक्षा',
                'Current Position' => 'वर्तमान पद',
                'Company' => 'कंपनी',
                'Achievements' => 'उपलब्धियां',
                'Story' => 'कहानी'
            ]
        ];

        // Check for manual translation first
        if ($target_language === 'hi' && isset($manual_translations['en_to_hi'][$text])) {
            return $manual_translations['en_to_hi'][$text];
        }

        // For longer content, return original text (Google Translate integration can be added later)
        return $text;
    }
}

if (!function_exists('get_site_language')) {
    /**
     * Get current site language from URI
     */
    function get_site_language() {
        $uri = service('uri');
        $segment = $uri->getSegment(1);
        return ($segment === 'hi') ? 'hi' : 'en';
    }
}

if (!function_exists('translate_url')) {
    /**
     * Generate translated URL
     */
    function translate_url($path = '', $language = 'en') {
        $base = rtrim(base_url(), '/');
        if ($language === 'hi') {
            return $base . '/hi' . ($path ? '/' . ltrim($path, '/') : '');
        }
        return $base . ($path ? '/' . ltrim($path, '/') : '');
    }
}
