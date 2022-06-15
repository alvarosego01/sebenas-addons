<?php

if (! defined('ABSPATH')) {
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
