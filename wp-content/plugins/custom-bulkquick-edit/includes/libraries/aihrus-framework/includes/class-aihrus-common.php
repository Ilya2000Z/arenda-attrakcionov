<?php
/**
 * Axelerant Framework
 * Copyright (C) 2015 Axelerant
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */


if (class_exists('Aihrus_Common') ) {
    return;
}


abstract class Aihrus_Common
{
    public static $donate_button;
    public static $donate_link;
    public static $markdown_helper;
    public static $scripts_called = false;
    public static $value_check;


    public function __construct()
    {
        self::set_notice_key();

        self::$donate_button = <<<EOD
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="WM4F995W9LHXE">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
EOD;

        self::$donate_link = '<a href="https://store.axelerant.com/donate/"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" alt="PayPal - The safer, easier way to pay online!" /></a>';

        add_action('admin_init', array( static::$class, 'check_notices' ), 9999);
    }


    public static function set_notice( $notice_name, $frequency_limit = false )
    {
        $notice_key = self::get_notice_key();

        $frequency_limit = intval($frequency_limit);
        if (! empty($frequency_limit) ) {
            $fl_key  = $notice_key . '_' . $notice_name;
            $proceed = get_transient($fl_key);
            if (false === $proceed ) {
                delete_transient($fl_key);
                set_transient($fl_key, time(), $frequency_limit);
            } else {
                return;
            }
        }

        $notices = get_transient($notice_key);
        if (false === $notices ) {
            $notices = array();
        }

        $notices[] = $notice_name;

        self::delete_notices();
        set_transient($notice_key, $notices, HOUR_IN_SECONDS);
    }


    public static function delete_notices()
    {
        $notice_key = self::get_notice_key();

        delete_transient($notice_key);
    }


    public static function check_notices()
    {
        $notice_key = self::get_notice_key();

        $notices = get_transient($notice_key);
        if (false === $notices ) {
            return;
        }

        $notices = array_unique($notices);
        foreach ( $notices as $notice ) {
            if (function_exists($notice) ) {
                add_action('admin_notices', $notice);
            } elseif (is_array($notice) ) {
                add_action('admin_notices', $notice);
            } else {
                add_action('admin_notices', array( static::$class, $notice ));
            }
        }

        self::delete_notices();
    }


    public static function get_notice_key()
    {
        if (is_null(static::$notice_key) ) {
            self::set_notice_key();
        }

        return static::$notice_key;
    }


    public static function set_notice_key()
    {
        static::$notice_key = static::SLUG . 'notices';
    }


    public static function version( $version )
    {
        $version .= '-' . static::ID . '-' . static::VERSION;

        return $version;
    }


    /**
     * flatten an arbitrarily deep multidimensional array
     * into a list of its scalar values
     * (may be inefficient for large structures)
     * (will infinite recurse on self-referential structures)
     * (could be extended to handle objects)
     *
     * @ref http://in1.php.net/manual/en/function.array-values.php#41967
     */
    public static function array_values_recursive( $ary )
    {
        $lst = array();
        foreach ( array_keys($ary) as $k ) {
            $v = $ary[ $k ];
            if (is_scalar($v) ) {
                $lst[] = $v;
            } elseif (is_array($v) ) {
                $lst = array_merge(
                    $lst,
                    self::array_values_recursive($v)
                );
            }
        }

        return $lst;
    }


    public static function notice_donate( $disable_donate = null, $item_name = null )
    {
        if ($disable_donate ) {
            return;
        }

        $text = sprintf(esc_html__('Please donate $5 towards ongoing free support and development of the "%1$s" plugin. %2$s'), $item_name, self::$donate_button);

        aihr_notice_updated($text);
    }


    public static function get_scripts()
    {
        if (static::$scripts_called ) {
            return;
        }

        foreach ( static::$scripts as $script ) {
            echo $script;
        }

        static::$scripts_called = true;
    }


    public static function get_styles()
    {
        if (empty(self::$styles) ) {
            return;
        }

        if (empty(self::$styles_called) ) {
            echo '<style>';

            foreach ( self::$styles as $style ) {
                echo $style;
            }

            echo '</style>';

            self::$styles_called = true;
        }
    }


    public static function create_nonce( $action )
    {
        $uid   = get_current_user_id();
        $check = $uid . $action;

        $nonce = wp_create_nonce($check);

        return $nonce;
    }


    public static function verify_nonce( $nonce, $action )
    {
        $uid    = get_current_user_id();
        $check  = $uid . $action;
        $valid  = false;

        $active = wp_verify_nonce($nonce, $check);

        if (false != $active ) {
            $valid = true;
        }

        return $valid;
    }


    /**
     * If incoming link is empty, then get_site_url() is used instead.
     */
    public static function create_link( $link, $title = null, $target = null, $return_as_tag = true )
    {
        if (empty($link) ) {
            $link = get_site_url();
        }

        if (preg_match('#^\d+$#', $link) ) {
            $permalink = get_permalink($link);
            $tag_title = get_the_title($link);
            if (empty($title) ) {
                $title = $tag_title;
            }

            $tag  = '<a href="';
            $tag .= $permalink;
            $tag .= '" title="';
            $tag .= $tag_title;
            $tag .= '">';
            $tag .= $title;
            $tag .= '</a>';
        } else {
            $orig_link = empty($title) ? $link : $title;
            $do_http   = true;

            if (0 === strpos($link, '/') ) {
                $do_http = false;
            }

            if ($do_http && 0 === preg_match('#https?://#', $link) ) {
                $link = 'http://' . $link;
            }

            $permalink = $link;

            $tag  = '<a href="';
            $tag .= $permalink;
            $tag .= '">';
            $tag .= $orig_link;
            $tag .= '</a>';
        }

        if (! empty($target) && is_string($target) ) {
            $tag = links_add_target($tag, $target);
        }

        if ($return_as_tag ) {
            return $tag;
        } else {
            return array(
            'link' => $permalink,
            'tag' => $tag,
            );
        }
    }


    public static function add_media( $post_id, $media_src, $media_name = null, $featured_image = true )
    {
        include_once ABSPATH . 'wp-admin/includes/image.php';

        if (empty($media_name) ) {
            $media_name = basename($media_src);
        }

        $wp_filetype = wp_check_filetype($media_name, null);
        $attachment  = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_status' => 'inherit',
        'post_title' => $media_name,
        );

        $file_contents = self::file_get_contents($media_src);
        $file_move     = wp_upload_bits($media_name, null, $file_contents);
        $file_name     = $file_move['file'];

        $image_id = wp_insert_attachment($attachment, $file_name, $post_id);
        $metadata = wp_generate_attachment_metadata($image_id, $file_name);
        wp_update_attachment_metadata($image_id, $metadata);

        if ($featured_image ) {
            update_post_meta($post_id, '_thumbnail_id', $image_id);
        }

        return $image_id;
    }


    /**
     * Thank you Tobylewis
     *
     * @ref http://wordpress.org/support/topic/plugin-flickr-shortcode-importer-file_get_contents-with-url-isp-does-not-support?replies=2#post-2878241
     */
    public static function file_get_contents_curl( $url )
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }


    /**
     * file_get_contents support on some shared systems is turned off
     */
    public static function file_get_contents( $url )
    {
        if (function_exists('file_get_contents') ) {
            return file_get_contents($url);
        } elseif (function_exists('curl_init') ) {
            return self::file_get_contents_curl($url);
        } else {
            $text  = esc_html__('cURL is not installed and file_get_contents is not accessible. Unable to retrieve URL %1$s.');
            $error = sprintf($text, $url);

            aihr_notice_error($error);

            return;
        }
    }


    public static function get_image_src( $image, $strip_protocol = true )
    {
        $doc = new DOMDocument();
        $doc->loadHTML($image);
        $xpath = new DOMXPath($doc);
        $src   = $xpath->evaluate('string(//img/@src)');

        if ($strip_protocol ) {
            $src = self::strip_protocol($src);
        }

        return $src;
    }


    public static function clean_string( $string )
    {
        if (! is_string($string) ) {
            return $string;
        }

        return trim(strip_shortcodes(strip_tags($string)));
    }


    /**
     * Truncate HTML, close opened tags. UTF-8 aware, and aware of unpaired tags
     * (which don't need a matching closing tag)
     *
     * @param  string  $html
     * @param  int     $max_length      Maximum length of the characters of the string
     * @param  string  $indicator       Suffix to use if string was truncated.
     * @param  boolean $force_indicator Suffix to use if string was truncated.
     * @return string
     *
     * @ref http://pastie.org/3084080
     */
    public static function truncate( $html, $max_length, $indicator = '&hellip;', $force_indicator = false )
    {
        $output_length = 0; // number of counted characters stored so far in $output
        $position      = 0; // character offset within input string after last tag/entity
        $tag_stack     = array(); // stack of tags we've encountered but not closed
        $output        = '';
        $truncated     = false;

        /**
         * these tags don't have matching closing elements, in HTML (in XHTML they
         * theoretically need a closing /> )
         *
         * @see http://www.netstrider.com/tutorials/HTMLRef/a_d.html
         * @see http://www.w3schools.com/tags/default.asp
         * @see http://stackoverflow.com/questions/3741896/what-do-you-call-tags-that-need-no-ending-tag
         */
        $unpaired_tags = array(
        'doctype',
        '!doctype',
        'area',
        'base',
        'basefont',
        'bgsound',
        'br',
        'col',
        'embed',
        'frame',
        'hr',
        'img',
        'input',
        'link',
        'meta',
        'param',
        'sound',
        'spacer',
        'wbr',
        );

        $func_strcut = function_exists('mb_strcut') ? 'mb_strcut' : 'substr';
        $func_strlen = function_exists('mb_strlen') ? 'mb_strlen' : 'strlen';

        // loop through, splitting at HTML entities or tags
        while ( $output_length < $max_length && preg_match('{</?([a-z]+)[^>]*>|&#?[a-zA-Z0-9]+;}', $html, $match, PREG_OFFSET_CAPTURE, $position) ) {
            list( $tag, $tag_position ) = $match[0];

            // get text leading up to the tag, and store it – up to max_length
            $text = $func_strcut($html, $position, $tag_position - $position);
            if ($output_length + $func_strlen($text) > $max_length ) {
                $output       .= $func_strcut($text, 0, $max_length - $output_length);
                $truncated     = true;
                $output_length = $max_length;
                break;
            }

            // store everything, it wasn't too long
            $output        .= $text;
            $output_length += $func_strlen($text);

            if ('&' == $tag[0] ) {
                // Handle HTML entity by copying straight through
                $output .= $tag;
                $output_length++; // only counted as one character
            } else {
                // Handle HTML tag
                $tag_inner = $match[1][0];
                if ('/' == $tag[1] ) {
                    // This is a closing tag.
                    $output .= $tag;
                    // If input tags aren't balanced, we leave the popped tag
                    // on the stack so hopefully we're not introducing more
                    // problems.

                    if (end($tag_stack) == $tag_inner ) {
                        array_pop($tag_stack);
                    }
                } elseif ('/' == $tag[ $func_strlen($tag) - 2 ] || in_array(strtolower($tag_inner), $unpaired_tags) ) {
                    // Self-closing or unpaired tag
                    $output .= $tag;
                } else {
                    // Opening tag.
                    $output     .= $tag;
                    $tag_stack[] = $tag_inner; // push tag onto the stack
                }
            }

            // Continue after the tag we just found
            $position = $tag_position + $func_strlen($tag);
        }

        // Print any remaining text after the last tag, if there's room

        if ($output_length < $max_length && $position < $func_strlen($html) ) {
            $output .= $func_strcut($html, $position, $max_length - $output_length);
        }

        $truncated = $func_strlen($html) - $position > $max_length - $output_length;

        // add terminator if it was truncated in loop or just above here
        if ($truncated || $force_indicator ) {
            $output .= $indicator;
        }

        // Close any open tags
        while ( ! empty($tag_stack) ) {
            $output .= '</'.array_pop($tag_stack).'>';
        }

        return $output;
    }


    public static function strip_protocol( $link )
    {
        if (! empty($link) ) {
            $link = preg_replace('#https?:#', '', $link);
        }

        return $link;
    }


    /**
     *
     *
     * @ref http://wpbandit.com/code/check-a-users-role-in-wordpress/
     */
    public static function check_user_role( $roles = array(), $user_id = null )
    {
        // Get user by ID, else get current user
        if ($user_id ) {
            $user = get_userdata($user_id);
        } else {
            $user = wp_get_current_user();
        }

        // No user found, return
        if (empty($user) ) {
            return false;
        }

        // Append administrator to roles, if necessary
        if (! in_array('administrator', $roles) ) {
            $roles[] = 'administrator';
        }

        // Loop through user roles
        foreach ( $user->roles as $role ) {
            // Does user have role
            if (in_array($role, $roles) ) {
                return true;
            }
        }

        // User not in roles
        return false;
    }


    public static function activation()
    {
        if (! current_user_can('activate_plugins') ) {
            return;
        }
    }


    public static function deactivation()
    {
        if (! current_user_can('activate_plugins') ) {
            return;
        }
    }


    public static function uninstall()
    {
        if (! current_user_can('activate_plugins') ) {
            return;
        }
    }


    public static function version_check()
    {
        $good_version = true;

        return $good_version;
    }


    public static function get_archive_slug( $cpt )
    {
        $post_type    = get_post_type_object($cpt);
        $archive_slug = $post_type->has_archive;
        if (true === $archive_slug ) {
            $archive_slug = $post_type->name;
        }

        return $archive_slug;
    }


    /**
     * Generate date archive rewrite rules for a given custom post type
     *
     * @param  string $cpt slug of the custom post type
     * @return rules returns a set of rewrite rules for Wordpress to handle
     */
    public static function rewrite_rules_date_archives( $cpt, $wp_rewrite )
    {
        $rules        = array();
        $slug_archive = self::get_archive_slug($cpt);
        if (false === $slug_archive ) {
            return $rules;
        }

        $dates = array(
        array(
        'rule' => '([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})',
        'vars' => array( 'year', 'monthnum', 'day' ),
        ),
        array(
        'rule' => '([0-9]{4})/([0-9]{1,2})',
        'vars' => array( 'year', 'monthnum' ),
        ),
        array(
        'rule' => '([0-9]{4})',
        'vars' => array( 'year' ),
        ),
        );

        foreach ( $dates as $data ) {
            $query = 'index.php?post_type=' . $cpt;
            $rule  = $slug_archive . '/' . $data['rule'];

            $i = 1;
            foreach ( $data['vars'] as $var ) {
                $query .= '&' . $var . '=' . $wp_rewrite->preg_index($i);
                $i++;
            }

            $rules[ $rule . '/?$' ]                               = $query;
            $rules[ $rule . '/feed/(feed|rdf|rss|rss2|atom)/?$' ] = $query . '&feed=' . $wp_rewrite->preg_index($i);
            $rules[ $rule . '/(feed|rdf|rss|rss2|atom)/?$' ]      = $query . '&feed=' . $wp_rewrite->preg_index($i);
            $rules[ $rule . '/page/([0-9]{1,})/?$' ]              = $query . '&paged=' . $wp_rewrite->preg_index($i);
        }

        return $rules;
    }


    public static function markdown2html( $markdown )
    {
        include_once AIHR_DIR_LIB . 'parsedown/Parsedown.php';

        if (is_null(self::$markdown_helper) ) {
            self::$markdown_helper = new Parsedown();
        }

        if (is_readable($markdown) ) {
            $markdown = self::file_get_contents($markdown);
        } else {
            return;
        }

        $html = self::$markdown_helper->text($markdown);

        return $html;
    }


    public static function rewrite_rules_feed( $wp_rewrite, $slug )
    {
        $rules = array(
        "feed/({$slug})" => 'index.php?feed=' . $wp_rewrite->preg_index(1),
        "({$slug}).xml" => 'index.php?feed=' . $wp_rewrite->preg_index(1),
        );

        return $rules;
    }


    public static function define_options_validate( $parts )
    {
        $validate = '';
        if (empty($parts['validate']) ) {
            return $validate;
        }

        $validation_info = array(
        'absint' => __('<a href="http://codex.wordpress.org/Function_Reference/absint">absint</a>.'),
        'ids' => __('Digit-only characters to make a multiple or single entries. Regex <code>#^\d+(,\s?\d+)*$#</code>.'),
        'intval' => __('<a href="php.net/manual/en/function.intval.php">intval</a>.'),
        'is_true' => __('Values like true, \'true\', 1, \'on\', and \'yes\' are <strong>true</strong>; otherwise <strong>false</strong>.'),
        'min1' => __('An <a href="php.net/manual/en/function.intval.php">intval</a> greater than zero.'),
        'nozero' => __('A non-zero <a href="php.net/manual/en/function.intval.php">intval</a>.'),
        'order' => __('SQL ordering "ASC" or "DESC". Regex <code>#^desc|asc$#i</code>.'),
        'slash_sanitize_title' => __('<a href="http://codex.wordpress.org/Function_Reference/sanitize_title">sanitize_title</a>.'),
        'slug' => __('Word-only characters including a hyphen to make a single term. Regex <code>#^[\w-]+$#</code>.'),
        'term' => __('Word-only characters to make a single term. Regex <code>#^\w+$#</code>.'),
        'terms' => __('Word-only characters including hyphens and spaces to make a multiple or single terms. Regex <code>#^(([\w- ]+)(,\s?)?)+$#</code>.'),
        'twp_update_license' => esc_html__('Current license.'),
        'url' => __('<a href="http://php.net/manual/en/filter.filters.validate.php">filter_var( $url, FILTER_VALIDATE_URL )</a>.'),
        'wp_kses_data' => __('<a href="http://codex.wordpress.org/Function_Reference/wp_kses_data">wp_kses_data</a>.'),
        'wp_kses_post' => __('<a href="http://codex.wordpress.org/Function_Reference/wp_kses_post">wp_kses_post</a>.'),
        );

        $validations = ! empty($parts['validate']) ? $parts['validate'] : array();
        if (! empty($validations) ) {
            $validate = esc_html__('Validatation: ');

            $validates   = array();
            $validations = explode(',', $validations);
            foreach ( $validations as $validation ) {
                if (! empty($validation_info[ $validation ]) ) {
                    $validates[] = $validation_info[ $validation ];
                } else {
                    $validates[] = 'TBD ' . $validation;
                }

                self::$value_check = $validation;
            }

            $validate .= implode(', ', $validates);
        }

        return $validate;
    }


    public static function define_options_choices( $parts )
    {
        $choices = '';
        if (empty($parts['choices']) ) {
            return $choices;
        }

        $choices = $parts['choices'];
        $choices = array_keys($parts['choices']);
        if ('' == $choices[0] ) {
            $choices[0] = 'false';
        }

        $choices = implode(', ', $choices);

        return $choices;
    }


    public static function define_options_value( $setting, $parts )
    {
        $value = $parts['std'];

        switch ( $parts['type'] ) {
        case 'checkbox':
            if (Aihrus_Settings::is_false($value) ) {
                 $value = 'false';
            } elseif (Aihrus_Settings::is_true($value) ) {
                $value = 'true';
            } elseif (empty($value) ) {
                $value = esc_html__('TBD empty ') . $parts['type'];
            }
            break;

        case 'select':
            if (empty($value) ) {
                $value = esc_html__('Pick an option');
            }
            break;

        case 'text':
        case 'textarea':
            if (empty($value) ) {
                if ('absint' == self::$value_check ) {
                    $value = 10;
                } elseif ('ids' == self::$value_check ) {
                    $value = '3,1,2';
                } elseif ('intval' == self::$value_check ) {
                    $value = 10;
                } elseif ('min1' == self::$value_check ) {
                    $value = 5;
                } elseif ('nozero' == self::$value_check ) {
                        $value = 10;
                } elseif ('slug' == self::$value_check ) {
                    $value = 'slug-name';
                } elseif ('term' == self::$value_check ) {
                        $value = 'termname';
                } elseif ('terms' == self::$value_check ) {
                    if (preg_match('#category|categories#i', $setting) ) {
                            $value = esc_html__('Category A, Another category, 123');
                    } else {
                        $value = esc_html__('Tag A, Another tag, 123');
                    }
                } else {
                    $value = esc_html__('You decide…');
                }
            }
            break;

        default:
            break;
        }

        self::$value_check = null;

        return $value;
    }
}


?>
