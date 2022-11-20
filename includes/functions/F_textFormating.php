<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!class_exists('F_textFormating')) {
    class F_textFormating
    {
        public function setFormatingText($text)
        {
            $aux_text = $text;

            $aux_text = self::colorInjecting($aux_text);
            $aux_text = self::injectingBold($aux_text);

            return $aux_text;
        }

        public function colorInjecting($text)
        {
            $aux_text = null;

            if ($text != null) {
                $aux_text = $text;

                if (str_contains($aux_text, '{{') && str_contains($aux_text, '}}')) {
                    if (str_contains($aux_text, '{{p') && str_contains($aux_text, 'p}}')) {
                        $aux_text = str_replace('{{p', '<span class="primaryColor">', $aux_text);
                        $aux_text = str_replace('p}}', '</span>', $aux_text);
                    }
                    if (str_contains($aux_text, '{{yellow') && str_contains($aux_text, 'yellow}}')) {
                        $aux_text = str_replace('{{yellow', '<span class="yellowColor">', $aux_text);
                        $aux_text = str_replace('yellow}}', '</span>', $aux_text);
                    }
                    if (str_contains($aux_text, '{{green') && str_contains($aux_text, 'green}}')) {
                        $aux_text = str_replace('{{green', '<span class="greenColor">', $aux_text);
                        $aux_text = str_replace('green}}', '</span>', $aux_text);
                    }
                    if (str_contains($aux_text, '{{dblue') && str_contains($aux_text, 'dblue}}')) {
                        $aux_text = str_replace('{{dblue', '<span class="darkBlueColor">', $aux_text);
                        $aux_text = str_replace('dblue}}', '</span>', $aux_text);
                    }
                    if (str_contains($aux_text, '{{white') && str_contains($aux_text, 'white}}')) {
                        $aux_text = str_replace('{{white', '<span class="whiteColor">', $aux_text);
                        $aux_text = str_replace('white}}', '</span>', $aux_text);
                    }
                }
            }

            return $aux_text;
        }

        public function injectingBold($text)
        {
            $aux_text = null;

            if ($text != null) {
                $aux_text = $text;

                if (str_contains($aux_text, '{{') && str_contains($aux_text, '}}')) {
                    if (str_contains($aux_text, '{{b') && str_contains($aux_text, 'b}}')) {
                        $aux_text = str_replace('{{b', '<strong>', $aux_text);
                        $aux_text = str_replace('b}}', '</strong>', $aux_text);
                    }
                }
            }

            return $aux_text;
        }
    }
}
